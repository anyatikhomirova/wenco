<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Forge Saas
 */
?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
						
<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

<script type="text/javascript" src="twitter/jquery.tweet.js"></script>


</head>

<body <?php body_class(); ?>>

	<div id="page" class="hfeed site">
		<?php do_action( 'before' ); ?>
		<header class="top-banner panel callout">
		
			<div class="row">
	
				<div class="large-6 columns">
	
					<h4><?php the_field('top_bar_content', 'options'); ?></h4>
				
				</div>
				
				<div class="large-6 columns">
	
					<?php if(get_field('social_media', 'options')): ?>	
	
					<ul class="social-menu menu right">
						<?php while(has_sub_field('social_media', 'options')): ?>
							
							<li><a class="ss-icon ss-social-circle" target="_blank" href="<?php the_sub_field('link', 'options'); ?>"><?php the_sub_field('social_media'); ?></a></li>
					
						<?php endwhile;?>
					</ul>
					
					<?php endif; ?>	
	
				</div>
	
			</div>

		</header>

		<header id="masthead" class="site-header panel" role="banner">
			
			<div class="row">
			
				<div class="site-branding large-4 columns">
			
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php $image = wp_get_attachment_image_src( get_field('site_logo', 'options'), 'medium' ); ?>
						<img src="<?php echo $image[0]; ?>" />
					</a>
								
				</div>								
					
				<nav id="site-navigation" class="navigation-main large-8 columns" role="navigation">
	
					<a class="menu-toggle show-for-small" href="#mobile-nav"><?php _e( 'Show Menu', 'forge_saas' ); ?></a>
	
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'items_wrap' => '<ul id="main-nav" class="nav menu dropmenu">%3$s</ul>' ) ); ?>

					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'items_wrap' => '<ul id="mobile-nav" class="nav menu"><a href="javascript:jQuery.pageslide.close()" class="mobile-menu-close button">Close</a>%3$s</ul>' ) ); ?>
				
				</nav><!-- #site-navigation -->
			
			</div>

		</header><!-- #masthead -->

		<div id="main" class="site-main">
