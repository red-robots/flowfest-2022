<?php 

get_header(); 
?>
<div id="primary" class="home-content content-area-full">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

      <?php if( get_the_content() ) { ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
      <?php } ?>

			<?php 
      $cards = get_field('homepage_cards');
      $cards_chunked = array();
      if($cards) {
        $cards_chunked = array_chunk($cards,2);
      }

      $i=1; //if(have_rows('homepage_cards')): ?>
      <?php if ($cards_chunked) { ?>
				<section class="homepage-cards">
          <?php foreach ($cards_chunked as $items) { 
            $group_class = ( $i % 2==0 ) ? 'even ':'odd'; ?>
            <div class="card-row <?php echo $group_class ?>">
              <?php $n=1; foreach ($items as $item) {
                $title = $item['title'];
                $img = $item['image'];
                $link = $item['link'];
                $cardTitle = (isset($link['title']) && $link['title']) ? $link['title'] : '';
                $cardLink = (isset($link['url']) && $link['url']) ? $link['url'] : 'javascript:void(0)';
                $cardTarget = (isset($link['target']) && $link['target']) ? $link['target'] : '_self';
                $image_style = ($img) ? ' style="background-image:url('.$img['url'].')"':'';
                $card_class = ($img) ? 'has-image':'no-image'; 
                $card_class .= ( $n % 2==0 ) ? ' even ':' odd';
                ?>
                <div class="card <?php echo $card_class ?>">
                  <a href="<?php echo $cardLink; ?>" target="<?php echo $cardTarget ?>" class="cardlink">
                    <figure <?php echo $image_style ?>>
                      <img src="<?php echo THEMEURI ?>images/rectangle.png" alt="">
                    </figure>
                    <div class="card-info">
                      <h2><?php echo $title; ?></h2>
                    </div>
                  </a>
                </div>
              <?php $n++; } ?>
            </div>
          <?php $i++; } ?>
				</section>
			<?php } ?>

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
