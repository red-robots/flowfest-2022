	</div><!-- #content -->

	<?php  
	$footlogo = get_field("footlogo","option");
	$address = get_field("address","option");
	$phone = get_field("phone","option");
	$fax = get_field("fax","option");
	$email = get_field("email","option");
	$contacts = array($address,$phone,$fax,$email);
	$other_info = get_field("other_info","option");
	$social_media = get_field("social_links","option");
	$social_icons = social_icons();
	$footer_logos = get_field("footer_logos","option");
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper	foot-flex">
			<div class="footer-logo">
				<img src="<?php bloginfo('template_url'); ?>/images/whitewater.png">
			</div>
			<nav class="footer">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
			</nav>
			<div class="empty">&nbsp;</div>
		</div><!-- wrapper -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
