<section class="section-page section-page--contact bg-light">
        <div class="canvas-map__wrap z-content">
            <div id="map" class="canvas-map"></div>
        </div>

        <div class="wrapper-form-contact">

            <div class="g-wrap z-content wow fadeInUp" data-wow-delay="0.3s">
                <?php the_title('<h2>', '</h2>'); ?>
            </div>

            <div class="g-wrap contact-form z-content wow fadeInUp" data-wow-delay="0.6s">
                <?php the_content(); ?>
            </div>
            <div class="fb-link-footer z-content">
                <a href="https://www.facebook.com/julia.lozasainz" target="_blank" rel="noopener">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/iFacebook.svg" alt="Sígueme en facebook">
                    </a>
            </div>

        </div>
</section>
