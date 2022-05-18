<?php
/**
 * Enqueue scripts and styles.
 */
function bellaworks_scripts() {
	wp_enqueue_style( 'bellaworks-style', get_stylesheet_uri() );

	wp_deregister_script('jquery');
		//wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2', true);
		//wp_enqueue_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, '3.5.1', false);
    wp_enqueue_script('jquery', false, array(), false, false);
	

	wp_enqueue_script( 
			'bellaworks-blocks', 
			get_template_directory_uri() . '/assets/js/vendors.min.js', 
			array(), '20120206', 
			true 
		);

  wp_enqueue_script( 
      'bellaworks-matchheight', 
      get_template_directory_uri() . '/assets/js/vendors/blocks.js', 
      array(), '20220514', 
      true 
    );

	wp_enqueue_script( 
			'bellaworks-custom', 
			get_template_directory_uri() . '/assets/js/custom.js', 
			array(), '20120206', 
			true 
		);

  wp_localize_script( 'bellaworks-custom', 'frontajax', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' )
  ));

	wp_enqueue_script( 
		'font-awesome', 
		'https://use.fontawesome.com/8f931eabc1.js', 
		array(), '20180424', 
		true 
	);



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bellaworks_scripts' );