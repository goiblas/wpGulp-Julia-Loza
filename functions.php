<?php

function load_scripts() {

	if ( ! is_admin() ) {
		
		wp_enqueue_script('js_theme_query',  get_template_directory_uri() . '/js/jquery.min.js', array( 'jquery' ));
		wp_enqueue_script('js_theme_lg',  get_template_directory_uri() . '/js/lightgallery.js', array( 'jquery'));
		wp_enqueue_script('js_theme_lg_fullscreen',  get_template_directory_uri() . '/js/lg-fullscreen.js', array( 'jquery'));
		wp_enqueue_script('js_theme_lg_thumbnail',  get_template_directory_uri() . '/js/lg-thumbnail.js', array( 'jquery'));
		wp_enqueue_script('js_theme_lg_autoplay',  get_template_directory_uri() . '/js/lg-autoplay.js', array( 'jquery'));
		wp_enqueue_script('js_theme_lg_zoom',  get_template_directory_uri() . '/js/lg-zoom.js', array( 'jquery'));
		wp_enqueue_script('js_theme_carousel',  get_template_directory_uri() . '/js/flickity.pkgd.min.js', array( 'jquery'));
		wp_enqueue_script('js_theme_app',  get_template_directory_uri() . '/js/app.js', array( 'jquery'));

	}
}

add_action( 'wp_enqueue_scripts', 'load_scripts' );

// add styles
function add_styles() {
	wp_enqueue_style( 'lg_style',  get_template_directory_uri() . '/css/lightgallery.css');
	wp_enqueue_style( 'main_style',  get_template_directory_uri() . '/style.css');
	wp_enqueue_style( 'google_font_poiret',  'https://fonts.googleapis.com/css?family=Poiret+One');
}

add_action('wp_enqueue_scripts', 'add_styles');

// add critical style
function hook_critical_css() {
    $critical_css = file_get_contents( get_template_directory_uri() . '/critical.css' );
    echo '<style>' . $critical_css . '</style>';
}
add_action('wp_head','hook_critical_css');




// add defer attribute to scripts
function add_defer_attribute($tag, $handle) {

   $TERM = 'js_theme';
	if ( strpos($handle, $TERM) !== false) {
		return str_replace(array('type=\'text/javascript\'', ' src'), array('', 'defer src'), $tag);
	}

   return $tag;
}


add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
