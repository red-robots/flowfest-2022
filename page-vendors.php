<?php
/**
 * Template Name: Vendors
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

get_header(); 

$CS = get_field('coming_soon'); 
$vendors = get_field('vendors'); 
// echo '<pre>';
// print_r($CS);
// echo '</pre>';

?>

	<div id="primary" class="content-area-full default-template">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php if( $CS[0] == 'soon' ) { ?>
						<section class="coming-soon">
							<div>Coming Soon</div>
						</section>
					<?php } else { ?>
						<div class="entry-content vendorz">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
						<?php if( $vendors ) { ?>
							<section class="vendors">
								<?php foreach( $vendors as $v ) { 
									// echo '<pre>';
									// print_r($v);
									// echo '</pre>';
									?>
									<div class="ven">
										<img src="<?php echo $v['url'] ?>" alt="<?php echo $v['alt'] ?>">
									</div>
								<?php } ?>
							</section>
						<?php } ?>
					<?php } ?>

				</article><!-- #post-## -->

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
