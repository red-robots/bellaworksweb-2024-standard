<?php
/**
 * Enqueue scripts and styles.
 */
function bellaworks_scripts() {
	wp_enqueue_style(
		'bellaworks-style',
		get_stylesheet_uri(),
		array(),
		'1.2'
	 );

	 wp_deregister_script('jquery');
	 wp_register_script('jquery', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', false, '3.6.3', false);
	 wp_enqueue_script('jquery');

	wp_enqueue_script(
			'jquery-migrate','https://code.jquery.com/jquery-migrate-1.4.1.min.js',
			array(), '20200713',
			false
		);



	wp_enqueue_script(
			'bellaworks-blocks',
			get_template_directory_uri() . '/assets/js/vendors.js',
			array(), '20120206',
			true
		);

	wp_enqueue_script(
		'bellaworks-animation',
		'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js',
		array(), '2.3.4', true
		);

  // wp_enqueue_script(
  //   'bellaworks-custom-tinymce',
  //   get_template_directory_uri() . '/assets/js/custom-tinymce.js',
  //   array(), '20120206',
  //   true
  // );

 wp_enqueue_script(
		'bellaworks-custom',
		get_template_directory_uri() . '/assets/js/custom.js',
		array(), '20120206',
		true
	);

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