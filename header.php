<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site cf">
	<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>

	<header id="masthead" class="site-header floral-pattern" role="banner">
		<div class="wrapper head-flex">
			
        <div id="site-logo" class="logo">
          <?php if( get_custom_logo() ) { ?>
            <?php the_custom_logo(); ?>
          <?php } else { ?>
          <a href="<?php bloginfo('url'); ?>">
      		 <img src="<?php bloginfo('template_url'); ?>/images/logo.png">
          </a>
          <?php } ?>
        </div>


			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->


			<div class="right-head">&nbsp;</div>

		</div><!-- wrapper -->
	</header><!-- #masthead -->

	<?php if( !is_front_page()) { get_template_part('parts/pagetitle'); } ?>
	<?php get_template_part('parts/banner'); ?>

	<div id="content" class="site-content">
