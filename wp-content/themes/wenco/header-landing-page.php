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
<!--<script type="text/javascript" src="//use.typekit.net/kyr1wil.js"></script>-->
<script type="text/javascript" src="//use.typekit.net/fyr4qwp.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<!--  /TYPEKIT -->

<?php wp_head(); ?>

<script type="text/javascript" src="twitter/jquery.tweet.js"></script>


</head>

<body <?php body_class(); ?>>



<div id="container" class="container">

  <?php do_action( 'before' ); ?>

  <div id="main" class="site-main">
