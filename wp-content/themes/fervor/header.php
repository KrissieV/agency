<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fervor
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,900" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Roboto:200,400,700" rel="stylesheet">


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js"></script>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.js"></script>-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fervor' ); ?></a>

	<header id="masthead" class="site-header container-fluid" role="banner">
		<div class="row">
			<div class="site-branding col-xs-4 col-sm-3 col-md-2">
				<a href="/" class="logo">
					<?php include (TEMPLATEPATH . '/assets/img/fervor-logo.svg'); ?>
				</a>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation col-xs-8 pull-right" role="navigation">
				<button id="nav-icon" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					
						<span></span>
						<span></span>
						<span></span>
						<span></span>
				</button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
