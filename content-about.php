
<?php 
    function get_first_image_post($post_id){
        $attachments = get_posts( array(
            'post_type'   => 'attachment',
            'numberposts' => -1,
            'post_status' => null,
            'post_parent' => $post_id
        ));
        
        if ( $attachments ) {
            return wp_get_attachment_image( $attachments[0]->ID, 'full' ); 
        }
    }

    $content = get_the_content();
    $content = preg_replace("/<img[^>]+\>/i", " ", $content);          
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]>', $content);
?>

<div class="section-page section-page--about">
    <section class="about">
        <div class="about__wrap">
            <div class="about__image z-content">
                <?php echo get_first_image_post($post->ID); ?>
            </div>
            <div class="about__content">
                <div class="z-content">
                    <?php echo the_title('<h2>', '</h2>' ); ?>
                    <?php echo $content ?>
                </div>
                <div class="about__lighted">
                    <div class="z-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus necessitatibus</p>
                        <div class="about__mark">
                            <img src="<?php echo get_template_directory_uri() ?>/img/colegiada_LR_065.svg" alt="Colegiada LR 065">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
