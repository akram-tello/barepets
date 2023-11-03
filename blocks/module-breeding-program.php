<section class="module module--text-banner module--breeding-program bg-purple">
    <div class="decor-top"></div>
    <div class="floating-kibbles absolute top-right">
     <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?= get_template_directory_uri() ?>/img/floating-kibbles.png" alt="Floating Kibbles">
    </div>
    <div class="wrapper">
        <h2 class="module-title text-center"><?php the_field('title'); ?></h2>
        <div class="list-of-breeding flex flex-wrap mt-10">

            <?php while( have_rows('breeding_list') ): the_row(); ?>
                <div class="list--holder flex w-6/12">
                    <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
                    <div class="core-values-text">
                        <h3 style="color:<?php the_sub_field('title_color'); ?>"><?php the_sub_field('title'); ?></h3>
                        <p><?php the_sub_field('description'); ?></p>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>

    <div class="program-dogs absolute bottom-right">
        <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?= get_template_directory_uri() ?>/img/program-dogs.png" alt="Program">
    </div>
</section>