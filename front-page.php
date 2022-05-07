<?php 

get_header(); 
?>
<div id="primary" class="home-content content-area-full">
	<main id="main" class="site-main wrapper" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

      <?php if( get_the_content() ) { ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
      <?php } ?>

			<?php $i=1; if(have_rows('homepage_cards')): ?>
				<section class="home-cards-new">
          <div class="cards">
					<?php while(have_rows('homepage_cards')): the_row(); 
							$title = get_sub_field('title');
							$img = get_sub_field('image');
							$link = get_sub_field('link');
              $cardTitle = (isset($link['title']) && $link['title']) ? $link['title'] : '';
              $cardLink = (isset($link['url']) && $link['url']) ? $link['url'] : 'javascript:void(0)';
              $cardTarget = (isset($link['target']) && $link['target']) ? $link['target'] : '_self';
              $image_style = ($img) ? ' style="background-image:url('.$img['url'].')"':'';
						?>
						<div class="card <?php echo ($img) ? 'has-image':'no-image' ?>">
							<a href="<?php echo $cardLink; ?>" target="<?php echo $cardTarget ?>">
								<figure <?php echo $image_style ?>>
                  <img src="<?php echo THEMEURI ?>images/image-helper.png" alt="">
								</figure>
								<div class="card-info">
									<h2><?php echo $title; ?></h2>
								</div>
							</a>
						</div>
					<?php $i++; endwhile; ?>
          </div>
				</section>
			<?php endif; ?>

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
