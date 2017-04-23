<?php
/*
Plugin Name: Responsive Images
Plugin URI: http://www.github.com/pnomolos/responsive-images/
Description: A plugin that allows you to specify a content-area width and changes
  image dimensions to be percentage-based
Author: Philip Schalm
Version: 1.0
Author URI: http://www.github.com/pnomolos/
*/


// Derive the current path and load up Sanity
$plugin_path = dirname(__FILE__).'/';
if(class_exists('SanityPluginFramework') != true)
	require_once($plugin_path.'framework/sanity.php');


// Sad but needed global stuff for output buffering
// as WP doesn't offer any way of doing deferred rendering 
// into the head tag
$global_ResponsiveImages_stylesheet_output = '';
function global_ResponseImages_output_callback($content) {
	global $global_ResponsiveImages_stylesheet_output;
	$marker = '</head>';
	if (strpos($content, ResponsiveImages::$stylesheet_marker) !== FALSE) {
		$marker = ResponsiveImages::$stylesheet_marker;
	}
	return str_replace($marker, $global_ResponsiveImages_stylesheet_output . "\n" . $marker, $content);
}


/*
*		Define your plugin class which extends the SanityPluginFramework
*		Make sure you skip down to the end of this file, as there are a few
*		lines of code that are very important.
*/

class ResponsiveImages extends SanityPluginFramework {
	
	/*
	*	Some required plugin information
	*/
	public $version = '1.0';
	public $options = array();
	public $image_sizes = array();
	
	public static $attachment_regex = '/<div[^>]+"attachment_\d[^>]+>.*?<\/div>/s';
	public static $img_regex = '/(<img[^>]+width=")(\d+)("[^>]+>)/';
	public static $stylesheet_marker = '<!-- ResponsiveImagesStylesheet -->';
	public static $class_name_prefix = 'responsive-image-width-';
	public static $class_prefix = 'responsive-image responsive-image-width-';
	public static $content_widths = array('all', 800, 480, 360, 240);
	/*
	*		Required __construct() function that initalizes the Sanity Framework
	*/
	function __construct() {
		$this->options = get_option('ResponsiveImages');
		parent::__construct(__FILE__);
	}

	/*
	*		Run during the activation of the plugin
	*/
	function activate() {
		
	}
	
	function get_option($option, $context = null) {
		$context = $context ? $context : $this->options;
		$array_options = preg_split('/\[|\]/', $option);
		if (count($array_options) > 1 and isset($context[$array_options[0]])) {
			return $this->get_option($array_options[1], $context[$array_options[0]]);
		}
		else if (isset($context[$option]))
			return $context[$option];
		else
			return false;
	}
	
	/*
	*		Run during the initialization of Wordpress
	*/
	function initialize() {
		add_action('admin_menu', array($this, 'register_menu'));
		add_action('admin_init', array($this, 'register_settings'));
		if ($this->get_option('content-widths[all]')) {
			add_filter('the_content', array($this, 'filter_image_size'), 999);
			add_action('wp_head', array($this, 'wp_head'), 999);
			add_action('wp_footer', array($this, 'wp_footer'), 1);
		}
	}
	
	function wp_head() { ob_start('global_ResponseImages_output_callback'); echo self::$stylesheet_marker; }
	function wp_footer() { $this->generate_stylesheet(); ob_end_flush(); }
	
	function generate_stylesheet() {
		global $global_ResponsiveImages_stylesheet_output;
		$stylesheet = '';
		$media_rules = array();
		$image_widths = array_unique($this->image_sizes);
		asort($image_widths);
		foreach ($image_widths as $image_width) {
			foreach (self::$content_widths as $content_width) {
				if (!isset($media_rules[$content_width])) {
					$media_rules[$content_width] = array();
				}
				if ($this->get_option('content-widths[' . $content_width . ']')) {
					$media_rules[$content_width][$image_width] = 
						min(100, ((float)$image_width * 100.0) / $this->get_option('content-widths[' . $content_width . ']'));
				}
			}
		}
		$this->data['media_rules'] = $media_rules;
		$global_ResponsiveImages_stylesheet_output = '<style type="text/css">' . $this->render('stylesheet') . '</style>';
	}
	
	function filter_image_size($html) {
		$html = preg_replace_callback(self::$attachment_regex, array($this, 'filter_image_size_caption_callback'), $html);
		$html = preg_replace_callback(self::$img_regex, array($this, 'filter_image_size_callback'), $html);
		return $html;
	}
	
	function filter_image_size_callback($matches) {
		$width = $matches[2];
		$matches = preg_replace('/(width|height)="\d+"/','',$matches);
//		$new_width = ((float)$width * 100.0) / (float)$this->get_option('default-width');
		return $this->classify_tag($matches[0], $width);
	}
	
	function filter_image_size_caption_callback($matches) {
		$html = $matches[0];
		$_matches = array();
		preg_match('/<img[^>]+width="(\d+)"/', $html, $_matches);
		$image_width = $_matches[1];
		preg_match('/<div[^>]+width\s*:\s*(\d+)px/', $html, $_matches);
		$div_width = $_matches[1];
		$new_image_width = ((float)$image_width * 100.0) / (float)$div_width;
//		$new_div_width = ((float)$div_width * 100.0) / $this->get_option('default-width');
		$html = preg_replace(self::$img_regex, '${1}' . $new_image_width . '%${3}', $html);
		$html = preg_replace('/height="\d+"/','',$html);
		$html = preg_replace('/(<div[^>]+)width\s*:\s*(\d+)px;?/', '${1}', $html);
		$html = $this->classify_tag($html, $div_width); //preg_replace('/(<div[^>]+width\s*:\s*)(\d+)px/', '${1}' . $new_div_width . '%', $html);
		return $html;
	}
	
	function classify_tag($html, $width) {
		$this->register_width($width);
		$matches = array();
		preg_match('/.*?(<(\w+)[^>]+>)/s', $html, $matches);
		if (count($matches)) {
			$tag = $matches[2];
			$str = $matches[1] . (preg_match('/\/\s*>/', $matches[1]) ? '' : '</' . $tag . '>');
			$xml = simplexml_load_string($str);
			$class = self::$class_prefix . $width;
			if ($xml['class'])
				$xml['class'] .= ' ' . $class;
			else
				$xml['class'] = $class;
			$xml = preg_replace(array('/<\/\w+>/','/\/>/'),array('','>'), $xml->asXml());
			$html = preg_replace('/(.*?)<\w+[^>]+>/s', '$1' . $xml, $html, 1);
		}
		return $html;
	}
	
	function register_width($width) {
		$this->image_sizes[] = $width;
	}
	
	
	/* Admin-related stuff */
	function register_menu() {
		add_submenu_page('options-general.php', 'Responsive Images', 'Responsive Images', 'administrator', __FILE__, array($this, 'display_settings'));
	}
	
	function register_settings() {
		register_setting('ResponsiveImages', 'ResponsiveImages');
	}
	
	function display_settings() {
		echo $this->render('settings');
	}
	
}

// Initalize the your plugin
$ResponsiveImages = new ResponsiveImages();

// Add an activation hook
register_activation_hook(__FILE__, array(&$ResponsiveImages, 'activate'));

// Run the plugins initialization method
add_action('init', array(&$ResponsiveImages, 'initialize'));

?>