<?php

/* Logos */
	function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_stylesheet_directory_uri().'/images/logo.png) !important;
        	   height: 108px !important; background-size: 300px !important; width:auto !important; }
    </style>
    <script type="text/javascript">window.onload = function(){document.getElementById("login").getElementsByTagName("a")[0].href = "'. site_url() . '";document.getElementById("login").getElementsByTagName("a")[0].title = "Go to site";}</script>';
	}

	add_action('login_head', 'my_custom_login_logo');


	function change_wp_login_url()
	{
		echo bloginfo('url');
	}add_filter('login_headerurl', 'change_wp_login_url');

	function change_wp_login_title()
	{
		echo get_option('blogname');
	}add_filter('login_headertitle', 'change_wp_login_title');

	function custom_admin_logo() {
		echo '<style type="text/css">#header-logo { background-image: url('.get_bloginfo('template_directory').'/images/logo-admin.png) !important; background-size:auto;}</style>';
	}
	add_action('admin_head', 'custom_admin_logo');


 /**
 * Enqueue scripts and styles
 */

function child_scripts() {

	wp_dequeue_style( 'styles' );
	wp_deregister_style( 'styles' );
	wp_enqueue_style( 'mainstyle', get_stylesheet_directory_uri() . '/stylesheets/css/main-style.css', array(), 'v1.0.0' );

	wp_register_script( 'wenco-landing', get_bloginfo( 'stylesheet_directory' ) . '/js/landing.js', array( 'jquery' ), 'v1.0.0' );

	if ( is_page_template( 'page-landing-page.php' ) ) {
		wp_enqueue_script( 'wenco-landing' );
	}

}
add_action( 'wp_enqueue_scripts', 'child_scripts' , 20);


add_filter("gform_confirmation_11", "confirmation_callout_resource_redirect", 10, 4);
add_filter("gform_confirmation_12", "confirmation_callout_resource_redirect", 10, 4);
add_filter("gform_confirmation_13", "confirmation_callout_resource_redirect", 10, 4);
add_filter("gform_confirmation_14", "confirmation_callout_resource_redirect", 10, 4);
function confirmation_callout_resource_redirect($confirmation, $form, $lead, $ajax){

	$resource_url = rgar( $lead, '5' );
	if($resource_url)
	{
		$confirmation = array("redirect" => $resource_url);
	}
	else{
		$confirmation = "There was an issue with your submission";
	}


	return $confirmation;
}

function custom_mtypes( $m ){
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter( 'upload_mimes', 'custom_mtypes' );

// Tells ACF to save each field group in the theme's acf-json folder so we can 
// version control all the field groups
function wenco_acf_json_save_point( $path ) {
	return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'wenco_acf_json_save_point' );