<?php
get_header(); ?>

<?php // preload ?>

<div id="preloader" class="anima-entry preload-wrap">
   <div class="logo-preload">
		<video autoplay="autoplay" loop>
			<source src="<?php echo get_template_directory_uri(); ?>/img/loading-julia.mp4" type="video/mp4" />
		</video>
    </div>
</div>

<div class="bglines">
	<div class="bglines__item"></div>
	<div class="bglines__item"></div>
	<div class="bglines__item"></div>
	<div class="bglines__item"></div>
	<div class="bglines__item"></div>
	<div class="bglines__item"></div>
</div>

<?php 


	// header slider
	get_template_part( 'content', 'header');

	// About me
	$the_query = new WP_Query( 'page_id=2' ); 

	while ($the_query -> have_posts()) : $the_query -> the_post(); 
		get_template_part('content','about');
	endwhile;

	// Porfolio
	get_template_part('content', 'gallery');

	// Formulario de contacto
	$the_query = new WP_Query( 'page_id=6' ); 
	while ($the_query -> have_posts()) : $the_query -> the_post(); 

		get_template_part( 'content', 'contact' );

	endwhile;
	
 //get_footer(); ?>
