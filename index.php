<?php
get_header(); ?>

<div id="preloader" class="anima-entry preload-wrap">
	<div class="logo-preload">loading</div>
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



// contact
?>
<div class="section-page section-page--contact bg-light">
	Contacto
</div>





<?php
// get posts
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
?>
	<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<?php

		endwhile;
	endif;
?>


<?php $the_query = new WP_Query( 'page_id=6' ); 
// Formulario de contacto
 while ($the_query -> have_posts()) : $the_query -> the_post(); 
    the_content();
    endwhile;
	
?>


<?php //get_footer(); ?>
