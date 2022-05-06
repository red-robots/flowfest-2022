<?php 

get_header(); 
?>
<div id="primary" class="content-area-full">
	<main id="main" class="site-main wrapper" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

			<?php $i=1; if(have_rows('homepage_cards')): ?>
				<section class="home-cards">
					<?php while(have_rows('homepage_cards')): the_row(); 
							$title = get_sub_field('title');
							$img = get_sub_field('image');
							$link = get_sub_field('link');
						?>
						<div class="card">
							<a href="<?php echo $link; ?>">
								<div class="img">
									<img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
								</div>
								<div class="overlay o<?php echo $i; ?>">
									<h2><?php echo $title; ?></h2>
								</div>
							</a>
						</div>
					<?php $i++; endwhile; ?>
				</section>
			<?php endif; ?>

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
