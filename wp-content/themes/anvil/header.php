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
<!--[if IE 8]> 				 <html class="no-js lt-ie9" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 9]> 				 <html class="no-js lt-ie10" <?php language_attributes(); ?> > <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
						
<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--  TYPEKIT  -->
<script type="text/javascript" src="//use.typekit.net/kyr1wil.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<!--  /TYPEKIT -->

<?php wp_head(); ?>

<script type="text/javascript" src="twitter/jquery.tweet.js"></script>


</head>

<body <?php body_class(); ?>>



<div id="container" class="container">
<!-- Push Wrapper -->
	<div class="mp-pusher" id="mp-pusher">

		<?php do_action( 'before' ); ?>

		
		<nav class="mp-menu" id="mobile-nav">
			<div class="mp-level">
				<!-- <h2 class="icon icon-world">All Categories</h2> -->
					
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 
				'items_wrap' => '<ul id="mobile-menu" ><a href="" id="mobile-menu-close" class="button">Close</a>%3$s</ul>',
				'walker' => new mobile_walker(),
				'container' => '' ) ); ?>

			</div>
		</nav>
	
		<header id="masthead" class="site-header panel" role="banner">
			
			<div class="row">
			
				<div class="site-branding large-3 columns">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php $image = wp_get_attachment_image_src( get_field('site_logo', 'options'), 'medium' ); ?>
						<!--[if gte IE 9]><!-->
							<img height="100" src="<?php echo get_stylesheet_directory_uri();?>/images/logo.svg" onerror="this.src=<?php echo $image[0]; ?>;this.onerror=null;" />
						<!--<![endif]-->
    					<!--[if lt IE 9]><img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.png" /><![endif]-->						
					</a>
				</div>
		
				<div class="site-tagline large-9 columns">

					<div class="header-inputs">
						<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
							<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'forge_saas' ); ?>" />
							<input type="submit" class="submit" id="searchsubmit" value="" />
						</form>
						<?php do_action('icl_language_selector'); ?>
					</div>
						
				
				</div>


					
				<nav id="site-navigation" class="navigation-main large-9 columns" role="navigation">
	
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'items_wrap' => '<ul id="main-nav" class="nav menu dropmenu">%3$s</ul>',/*  'walker' => 'description_walker' */ ) ); ?>
				</nav><!-- #site-navigation -->

				
				<a id="mobile-trigger" class="button menu-trigger"><?php _e( 'Show Menu', 'forge_saas' ); ?></a>
			
			
				<div class="clear-fix"></div>
			</div>


		</header><!-- #masthead -->

		<div id="main" class="site-main">
