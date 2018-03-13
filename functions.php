<?php

// add styles
function add_styles() {
	wp_enqueue_style( 'lg_style',  get_template_directory_uri() . '/css/lightgallery.css');
	wp_enqueue_style( 'google_font_poiret',  'https://fonts.googleapis.com/css?family=Poiret+One');
	wp_enqueue_style( 'main_style',  get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'add_styles');


// custom post type
add_action( 'init', 'register_type_galeria', 0);

function register_type_galeria() {
	register_post_type('trabajos', array(
		'public'				=>	true,
		'publicly_queryable'	=>	true,
		'show_ui'				=>	true,
		'show_in_menu'			=>	true,
		'menu_icon'             => 'dashicons-images-alt2',
		'menu_position'			=>	4,
		'rewrite'				=>	array('slug' =>	'trabajos', 'with_front' => false),	
		'supports'				=>	array('title','editor','author','thumbnail'/*,'excerpt','comments'*/),
		'labels'	=>	array(
				'name'					=>  'Trabajos',
				'singular_name'			=>	'Trabajo',
				'add_new'				=>	'Añadir trabajo',
				'all_items'				=>	'Todos los trabajos',
				'add_new_item'			=>	'Añadir nuevo',
				'edit_item'				=>	'Editar trabajo',
				'new_item'				=>	'Nuevo trabajo',
				'view_item'				=>	'Ver trabajo',
				'search_items'			=>	'Buscar trabajo',
				'not_found'				=>	'No encontradas',
				'not_found_in_trash'	=>	'No encontrados en la papelera',
				'menu_name'				=>	'trabajos')
				
	));
	
}