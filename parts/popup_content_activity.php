<?php 
$thumbId = get_post_thumbnail_id($post);
$img = wp_get_attachment_image_src($thumbId,'full');
$image_style = ($img) ? ' style="background-image:url('.$img[0].')"':'';
$content = $post->post_content;
apply_filters('the_content',$content);
?>
<div class="popup-content activity">
  <a href="javascript:void(0)" id="closeModalBtn"><span>close</span></a>
  <div class="middle-content">
    <h2 class="title"><?php echo $post->post_title ?></h2>
    <?php if ($img) { ?>
    <div class="photo">
      <figure <?php echo $image_style ?>>
        <img src="<?php echo THEMEURI ?>images/image-helper.png" alt="">
      </figure>
    </div>
    <?php } ?>
    <div class="description"><?php echo $content ?></div>
  </div>
</div>
