<?php
/**
 * Template Name: Workshops
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>


			<?php endwhile; // End of the loop.
			?>

			<?php 
				$date_now = date('Y-m-d H:i:s');
				$wp_query = new WP_Query();
				$wp_query->query(array(
					'post_type'=>'workshops',
					'posts_per_page' => -1,
					'order'          => 'ASC',
				    'orderby'        => 'meta_value',
				    'meta_key'       => 'date_and_time',
				    'meta_type'      => 'DATETIME',
				));
				if ($wp_query->have_posts()) : ?>
					<section class="tile-wrapper">
				    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						<?php include(locate_template('parts/tile.php')); ?>
					<?php endwhile; ?>
					</section>
				<?php endif; ?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
