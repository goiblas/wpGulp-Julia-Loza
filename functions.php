<?php

function wpgt_scripts() {
	// Frontend scripts.
	if ( ! is_admin() ) {
		// Enqueue vendors first.
		wp_enqueue_script( 'wpgt_vendorsJs', get_template_directory_uri() . '/js/vendors.js' );

		// Enqueue custom JS after vendors.
		wp_enqueue_script( 'wpgt_customJs', get_template_directory_uri() . '/js/app.js' );

		// Minified and Concatenated styles.
		wp_enqueue_style( 'wpgt_style', get_template_directory_uri() . '/style.css' );
	}
}
// Hook.
add_action( 'wp_enqueue_scripts', 'wpgt_scripts' );


function hook_critical_css() {
    $critical_css = file_get_contents( get_template_directory_uri() . '/critical.css' );
    echo '<style>' . $critical_css . '</style>';
}
add_action('wp_head','hook_critical_css');