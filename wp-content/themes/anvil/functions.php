<?php
/**
 * Forge Saas functions and definitions
 *
 * @package Forge Saas
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'forge_saas_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function forge_saas_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Forge Saas, use a find and replace
	 * to change 'forge_saas' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'forge_saas', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size ( 'wpf-home-featured', 1000, 400, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'forge_saas' ),
		'footer' => __( 'Footer Menu', 'forge_saas'),
	) );

	/**
	 * Enable support for Post Formats
	 */
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // forge_saas_setup
add_action( 'after_setup_theme', 'forge_saas_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function forge_saas_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'forge_saas_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'forge_saas_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function forge_saas_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'forge_saas' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'forge_saas' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Features Sidebar', 'forge_saas' ),
		'id'            => 'features',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Solutions Sidebar', 'forge_saas' ),
		'id'            => 'solutions',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Press Releases Sidebar', 'forge_saas' ),
		'id'            => 'press',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Technical Tips Sidebar', 'forge_saas' ),
		'id'            => 'technical',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	

}
add_action( 'widgets_init', 'forge_saas_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function forge_saas_scripts() {
	wp_enqueue_style( 'forge_saas-style', get_stylesheet_uri() );
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/stylesheets/css/foundation.css' );
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/stylesheets/css/normalize.css' );
    wp_register_style( 'styles', get_template_directory_uri() . '/stylesheets/css/styles.css' );
    wp_enqueue_style( 'styles' ); 

	wp_enqueue_style( 'app', get_template_directory_uri() . '/stylesheets/css/app.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/stylesheets/css/jquery.fancybox.css' );
	wp_enqueue_style( 'foundation-ie8', get_template_directory_uri() . '/stylesheets/css/ie8-foundation.css' );
    wp_enqueue_style( 'symbolset-css', get_template_directory_uri() . '/webfonts/ss-social-circle.css');
    wp_enqueue_style( 'googlefonts', '//fonts.googleapis.com/css?family=Cabin:400italic,700,400');

// register all theme javascripts
    wp_register_script( 'forge_modernizr', get_template_directory_uri() . '/js/vendor/custom.modernizr.js' ); 
	wp_enqueue_script( 'forge_modernizr', array(), '20130115', true );
	wp_enqueue_script('jquery');
    wp_register_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js' ); 
	wp_enqueue_script( 'foundation', 'jQuery', '20130115', true );
	
	wp_enqueue_script( 'flexslider',  get_template_directory_uri().'/js/jquery.flexslider-min.js',  array('jquery'), '', true );
	wp_enqueue_script( 'fancybox',  get_template_directory_uri().'/js/jquery.fancybox.js',  array('jquery'), '', true );
	wp_enqueue_script( 'dropmenu',  get_template_directory_uri().'/js/jquery.dropmenu.js',  array('jquery'), '', true );
    wp_enqueue_script('symbolset-js', get_template_directory_uri() . '/webfonts/ss-social.js',  array('jquery'), '', true);
    wp_register_script('tweet', get_bloginfo('url').'/twitter/jquery.tweet.js', array('jquery'), '', true);
	
	wp_enqueue_script( 'forge_saas-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'site_js',  get_template_directory_uri().'/js/site-js.js',  array('jquery'), '', true );


	wp_enqueue_script( 'classie',  get_template_directory_uri().'/js/classie.js',  array('jquery'), '', true );
	wp_enqueue_script( 'sidebar',  get_template_directory_uri().'/js/mlpushmenu.js',  array('jquery'), '', true );
	wp_enqueue_style( 'mobilemenu', get_template_directory_uri() . '/stylesheets/css/mobile-menu.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'forge_saas-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'forge_saas_scripts' );

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).' &#91; &hellip; &#93; ';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

// Automatically add Flex-video
function forge_embed_filter( $output, $data, $url ) {
 
	$return = '<div class="flex-video">'.$output.'</div>';
	return $return;
 
}
add_filter('oembed_dataparse', 'forge_embed_filter', 90, 3 );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom taxonomy helper functions file.
 */
require get_template_directory() . '/inc/term-functions.php';

/**
 * Load custom post types.
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * WooCommerce Support.
 */

add_theme_support( 'woocommerce' );

/*
class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<div class="top sans">';
           $append = '</div>';
           $description  = ! empty( $item->title ) ? '<div class="bottom">'.esc_attr( $item->attr_title ).'</div>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a><div class="hidden"><div class="back"></div></div>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		function start_lvl(&$output, $depth) {
		    $indent = str_repeat("\t", $depth);
		    $output .= "\n$indent<ul class=\"sub-menu level-".$depth."\"><span></span>\n";
		}
}
*/

/*
// remove the default content wrappers for all WooCommerce pages. 
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

//add custom wrapper for WooCommerce pages. 
add_action('woocommerce_before_main_content', 'anvil_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'anvil_wrapper_end', 10);

function anvil_wrapper_start() {
	echo'<div id="primary" class="content-area"><div class="row">';
}

function anvil_wrapper_end() {
	echo '</div></div>';
}
*/



// filter the Gravity Forms button type
add_filter("gform_submit_button", "form_submit_button", 10, 2);
function form_submit_button($button, $form){
    return "<button class='button' id='gform_submit_button_{$form["id"]}'><span>" .__( "Submit", 'forge_saas' ) ." »</span></button>";
}





class mobile_walker extends Walker_Nav_Menu{		
	//start of the sub menu wrap
	function start_lvl(&$output, $depth) {
		$output .= '<div class="mp-level">
						<a class="mp-back" href="#">back</a>
						<ul class="sub-menu">';
	}
 
	//end of the sub menu wrap
	function end_lvl(&$output, $depth) {
		$output .= '
					</ul>
				</div>';
	}
 
	//add the description to the menu item output
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
		$class_names = $value = '';
 
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
 
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
 
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
 
		$item_output = $args->before;

		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		if(strlen($item->description)>2){ $item_output .= '<br /><span class="sub">' . $item->description . '</span>'; }
		$item_output .= '</a>';
		$item_output .= $args->after;
 
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
 
        if ( !$element )
                return;

        $id_field = $this->db_fields['id'];

        //display this element
        if ( is_array( $args[0] ) )
                $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
       
        //Adds the 'parent' class to the current item if it has children               
        if( ! empty( $children_elements[$element->$id_field] ) ){
                array_push($element->classes,'parent');
                // array_push($children_elements, $element);
        }

       
        $cb_args = array_merge( array(&$output, $element, $depth), $args);
       
        call_user_func_array(array(&$this, 'start_el'), $cb_args);

        $id = $element->$id_field;

        // descend only when the depth is right and there are childrens for this element
        if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

        		$kidCount = 0;

                foreach( $children_elements[ $id ] as $child ){

                        if ( !isset($newlevel) ) {

                                $newlevel = true;
                                //start the child delimiter
                                $cb_args = array_merge( array(&$output, $depth), $args);
                                call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                        }

                        if($kidCount++ == 0){
                        	
			        		array_pop($element->classes);
			                $cb_args = array_merge( array(&$output, $element, $depth), $args);
					        call_user_func_array(array(&$this, 'start_el'), $cb_args);
                        }

                        $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
                }
                

        		// array_pop($element->classes);
          //       $cb_args = array_merge( array(&$output, $element, $depth), $args);
		        // call_user_func_array(array(&$this, 'start_el'), $cb_args);

		    
                unset( $children_elements[ $id ] );
        }

        if ( isset($newlevel) && $newlevel ){
                //end the child delimiter
                $cb_args = array_merge( array(&$output, $depth), $args);
                call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
        }

        //end this element
        $cb_args = array_merge( array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'end_el'), $cb_args);
    }
}


/**
 * Custom post type date archives
 */

/**
 * Custom post type specific rewrite rules
 * @return wp_rewrite             Rewrite rules handled by Wordpress
 */
function cpt_rewrite_rules($wp_rewrite) {
    $pressrules = cpt_generate_date_archives('press', $wp_rewrite);// Generate the archives for press
    $tipsrules = cpt_generate_date_archives('technical-tips', $wp_rewrite);// Generate the archives for technical tips   
    $wp_rewrite->rules = $pressrules + $tipsrules + $wp_rewrite->rules;
    return $wp_rewrite;
}
add_action('generate_rewrite_rules', 'cpt_rewrite_rules');

/**
 * Generate date archive rewrite rules for a given custom post type
 * @param  string $cpt        slug of the custom post type
 * @return rules              returns a set of rewrite rules for Wordpress to handle
 */
function cpt_generate_date_archives($cpt, $wp_rewrite) {
    $rules = array();

    $post_type = get_post_type_object($cpt);
    $slug_archive = $post_type->has_archive;
    if ($slug_archive === false) return $rules;
    if ($slug_archive === true) {
        $slug_archive = $post_type->name;
    }

    $dates = array(
        array(
            'rule' => "([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})",
            'vars' => array('year', 'monthnum', 'day')),
        array(
            'rule' => "([0-9]{4})/([0-9]{1,2})",
            'vars' => array('year', 'monthnum')),
        array(
            'rule' => "([0-9]{4})",
            'vars' => array('year'))
        );

    foreach ($dates as $data) {
        $query = 'index.php?post_type='.$cpt;
        $rule = $slug_archive.'/'.$data['rule'];

        $i = 1;
        foreach ($data['vars'] as $var) {
            $query.= '&'.$var.'='.$wp_rewrite->preg_index($i);
            $i++;
        }

        $rules[$rule."/?$"] = $query;
        $rules[$rule."/feed/(feed|rdf|rss|rss2|atom)/?$"] = $query."&feed=".$wp_rewrite->preg_index($i);
        $rules[$rule."/(feed|rdf|rss|rss2|atom)/?$"] = $query."&feed=".$wp_rewrite->preg_index($i);
        $rules[$rule."/page/([0-9]{1,})/?$"] = $query."&paged=".$wp_rewrite->preg_index($i);
    }
    return $rules;
}

/**
 * Get a montlhy archive list for a custom post type
 * @param  string  $cpt  Slug of the custom post type
 * @param  boolean $echo Whether to echo the output
 * @return array         Return the output as an array to be parsed on the template level
 */
function get_cpt_archives( $cpt, $echo = false )
{
    global $wpdb; 
    $sql = $wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_type = %s AND post_status = 'publish' GROUP BY YEAR(wp_posts.post_date), MONTH(wp_posts.post_date) ORDER BY wp_posts.post_date DESC", $cpt);
    $results = $wpdb->get_results($sql);

    if ( $results )
    {
        $archive = array();
        foreach ($results as $r)
        {
            $year = date('Y', strtotime( $r->post_date ) );
            $month = date('F', strtotime( $r->post_date ) );
            $month_num = date('m', strtotime( $r->post_date ) );
            $link = get_bloginfo('siteurl') . '/' . $cpt . '/' . $year . '/' . $month_num;
            $this_archive = array( 'month' => $month, 'year' => $year, 'link' => $link );
            array_push( $archive, $this_archive );
        }

        if( !$echo )
            return $archive;
        foreach( $archive as $a )
        {
            echo '<li><a href="' . $a['link'] . '">' . $a['month'] . ' ' . $a['year'] . '</a></li>';
        }
    }
    return false;
}

function fs_add_query_vars($vars) {
	$vars[] = "resource_id";
return $vars;
}
 
// hook fs_add_query_vars function into query_vars
add_filter('query_vars', 'fs_add_query_vars');

function fs_rewrite_endpoint(){
  // Use EP_PERMALINK | EP_PAGES for pages and posts both
  add_rewrite_endpoint( 'resource_id', EP_PAGES );
}
add_filter('init','fs_rewrite_endpoint');


add_filter('gform_replace_merge_tags', 'replace_site_url', 10, 7);
function replace_site_url($text, $form, $entry, $url_encode, $esc_html, $nl2br, $format) {
    
    $custom_merge_tag = '{site_url}';
    
    if(strpos($text, $custom_merge_tag) === false)
        return $text;
    
    $site_url = site_url();
    $text = str_replace($custom_merge_tag, $site_url, $text);
    
    return $text;
}
