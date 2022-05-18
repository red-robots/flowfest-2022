<?php
/**
 * Template Name: Schedule
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

  <div id="primary" class="content-area-full content-default-template">
    <main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
        <?php if ( get_the_content() ) {  ?>
          <div class="wrapper"><?php get_template_part( 'parts/content', 'page' ); ?></div>
        <?php } ?>
      <?php endwhile; ?>

	
			<?php 
      $info = get_scheduled_activity();
      if($info) { 
        $e_date = get_field('event_date',$info->ID);
        $eventDate = ($e_date) ? date(l,strtotime($e_date)) : '';
        ?>
      <section class="schedule-activities">
        <div class="wrapper">
          <div class="schedule-title">
            <h3><?php echo $info->post_title ?></h3>
            <p class="dayName"><?php echo $eventDate ?></p>
          </div>

          <?php if( $activities = get_field('activities',$info->ID) ) { 
            $postTypes['festival'] = 'Festival Activities';
            $postTypes['practices'] = 'Practices';
            $postTypes['workshops'] = 'Workshops';
            $postTypes['other'] = 'Other';
          ?>
          <div class="activities">
            <?php foreach ($activities as $a) { 
              $time = (isset($a['time']) && $a['time']) ? $a['time'] : '';
              $custom_title = $a['custom_title'];
              $item = $a['activity'];
              $postid = (isset($item->ID) && $item->ID) ? $item->ID : '';
              $show_popup = (isset($a['popup_info'][0]) && $a['popup_info'][0]=='Yes') ? true:false;
              $cpt = ($postid) ? get_post_type($postid) : 'other';
              //$postTypeName = (isset($postTypes[$cpt]) && $postTypes[$cpt]) ? $postTypes[$cpt] : 'Other';
              $postTypeName = array_search($cpt, $postTypes);
            ?>
            <div class="item" data-postid="<?php echo $postid ?>" data-posttype="<?php echo $cpt ?>">
              <?php if ($time) { ?>
              <span class="time"><?php echo $time ?></span>
              <?php } else { ?>
              <span class="time-NA"></span>
              <?php } ?>

              <?php if ($custom_title) { ?>
                
                <?php if ( $item ) { ?>
                  <?php if ($show_popup) { ?>
                    <span class="name"><a class="popupinfo" href="javascript:void(0)" data-id="<?php echo $postid ?>"><?php echo $custom_title ?></a></span>
                  <?php } else { ?>
                    <span class="name"><?php echo $custom_title ?></span>
                  <?php } ?>
                <?php } ?>

              <?php } else { ?>

                <?php if ( $item ) { ?>
                  <?php if ($show_popup) { ?>
                    <span class="name"><a class="popupinfo" href="javascript:void(0)" data-id="<?php echo $postid ?>"><?php echo $item->post_title ?></a></span>
                  <?php } else { ?>
                    <span class="name"><?php echo $custom_title ?></span>
                  <?php } ?>
                <?php } ?>

              <?php } ?>
              <div class="border-bottom"></div>
            </div>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      </section>
			<?php } ?>
			

		</main><!-- #main -->
	</div><!-- #primary -->

  <script>
    jQuery(document).ready(function($){
      adjustBorderBottom();
      $(window).on('orientationchange resize',function(){
        adjustBorderBottom();
      });
      function adjustBorderBottom() {
        $('.activities .item').each(function(){
          var target = $(this);
          var time_span = ( target.find('.time').length ) ? target.find('.time').width() + 10 : 0;
          var name_span = ( target.find('.name').length ) ? target.find('.name').width() : 0;
          var border_bottom = target.width();
          var new_border_width = border_bottom - (time_span+name_span+10);
          target.find('.border-bottom').css({
            'width':new_border_width+'px',
            'left':time_span+'px'
          });
        });
      }
      
    });
  </script>
<?php
get_footer();