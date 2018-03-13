

<section class="section-page section-page--gallery bg-light">

        <div class="full-section-relative z-content">
            <div class="carousel-wrap jl-gallery__wrap">

<?php
    $args = array('post_type' => 'trabajos');
	$the_query = new WP_Query($args); 
    $counter = 0; 
	while ($the_query -> have_posts()) : $the_query -> the_post(); 

        $attachments = get_posts( array(
            'post_type'   => 'attachment',
            'numberposts' => -1,
            'post_parent' => $post->ID
        ) );
         
        if ( $attachments ) {
        $counter++;
        ?>
        <div class="carousel-cell">
                <?php if ( $counter < 4) { ?>
                    <div class="jl-gallery wow fadeInRight" data-wow-delay="0.3s">
                <?php } else { ?>
                    <div class="jl-gallery">
                <?php } ?>
        <?php 
            foreach ( $attachments as $attachment ) { 
        ?>
            <a class="" href="<?php echo wp_get_attachment_url($attachment->ID, 'full') ?>" data-sub-html="<?php echo apply_filters( 'the_title', $attachment->post_title ); ?>">
                <img class="img-responsive" src="<?php echo wp_get_attachment_image_src($attachment->ID, 'medium')[0];?>"  srcset="<?php echo wp_get_attachment_image_srcset( $attachment->ID); ?>">
            </a>

            <?php }  ?>
                </div>
            <div class="jl-gallery__title">
                <?php the_title('<h3>', '</h3>') ?>
                <div class="jl-gallery__show">
                    ver galería 
                </div>
            </div>
        </div>


<?php }

	endwhile;
?>

 </div>

            <div class="carousel-nav">
                <button class="cBtn-previous" disabled>
                    <svg 
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="0.706cm" height="1.235cm" aria-labelledby="cBtn-previous">
                        <title id="cBtn-previous">Anterior</title>
                        <path fill-rule="evenodd"  stroke="rgb(255, 255, 255)" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none"
                        d="M18.000,3.000 L4.000,17.000 L18.000,31.000 "/>
                    </svg>

                </button>
                <button class="cBtn-next"> 

                    <svg 
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="0.706cm" height="1.129cm" aria-labelledby="cBtn-next">
                        <title id="cBtn-next">Siguiente</title>
                        <path fill-rule="evenodd"  stroke="rgb(255, 255, 255)" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none"
                        d="M3.000,1.415 L17.130,15.500 L3.000,29.585 "/>
                    </svg>

                </button>
            </div>
        </div>
</section>