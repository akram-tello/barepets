<section class="module module--featured-subscription module-core-values relative">
    <div class="kibbles-core absolute">
        <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?= get_template_directory_uri() ?>/img/kibbles-core.png" alt="Kibbles">
    </div>
    <div class="wrapper">
        <p class="module-subheading"><?php the_field('module_title'); ?></p>
        <h2 class="module-title"><?php the_field('module_subheading'); ?></h2>

        <?php if( have_rows('core_values') ): ?>
            <div class="core-values-list">
                <div class="core-values-col flex flex-wrap ">
                    <?php while( have_rows('core_values') ): the_row(); ?>
                        <div class="core-values-holder flex">
                            <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('subtitle'); ?>">
                            <div class="core-values-text">
                                <p class="subtitle"><?php the_sub_field('subtitle'); ?></p>
                                <?php the_sub_field('content'); ?>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        <?php endif ?>
    </div>

    <div class="decor-top-curve"></div>
    <div class="kibbles-core kibbles-core-1 absolute">
        <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?= get_template_directory_uri() ?>/img/kibbles-core-1.png" alt="Kibbles">
    </div>
</section>