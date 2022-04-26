<?php 
	$img = get_field('tile_image');
	$dateTime = get_field('date_and_time');
	$date = DateTime::createFromFormat('Y-m-d H:i:s', $dateTime);

 ?>
<div class="tile">
	<div class="img">
		<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
	</div>
	<div class="info">
		<div class="title">
			<h2><?php the_title(); ?></h2>
		</div>
		<div class="time">
			<?php echo $date->format('g:i a'); ?>
		</div>
	</div>
</div>