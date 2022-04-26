<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site cf">
	<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper head-flex">

			
			
	            <div class="logo">
	            	<a href="<?php bloginfo('url'); ?>">
	            		<img src="<?php bloginfo('template_url'); ?>/images/logo.png">
	            	</a>
	            </div>



			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->


			<div class="right-head">&nbsp;</div>

		</div><!-- wrapper -->
	</header><!-- #masthead -->

	<?php if( !is_front_page()) {get_template_part('parts/pagetitle');} ?>
	<?php get_template_part('parts/banner'); ?>

	<div id="content" class="site-content wrapper">
