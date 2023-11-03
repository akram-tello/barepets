<section class="module module--text-banner module--vet-testi bg-purple">
    <div class="decor-top"></div>
    <div class="decor-bot"></div>
    <div class="floating-kibbles absolute top-right">
        <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?= get_template_directory_uri() ?>/img/floating-kibbles.png" alt="Floating Kibbles">
    </div>
    <div class="wrapper">
        <h2 class="module-title text-center"><?php the_field('module_title'); ?></h2>
        <?php if( have_rows('vet_testimonials') ): ?>
            <div class="vet--testi-holder flex">
                <?php while( have_rows('vet_testimonials') ): the_row(); ?>
                    <div class="vet--testimonials">
                        <p class="quote-text"><?php the_sub_field('testimonials'); ?></p>
                        <h3><?php the_sub_field('vet_name'); ?></h3>
                        <p class="subtitle"><?php the_sub_field('job_title'); ?></p>
                        <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?php the_sub_field('vet_image'); ?>" alt="<?php the_sub_field('vet_name'); ?>">
                    </div>
                <?php endwhile ?>
            </div>
        <?php endif ?>
    </div>
</section>

