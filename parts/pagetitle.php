<?php 
	$reg = get_field('register_link', 'option');
 ?>
 <section class="pagetitle">
 	<div class="wrapper pagetitle-flex">
	 	<div class="reg">
	 		<?php if($reg) { ?><a href="<?php echo $reg; ?>">Register</a><?php } ?>
	 	</div>
	 	<h1><?php the_title(); ?></h1>
	 	<div class="empty">&nbsp;</div>
 	</div>
 </section>