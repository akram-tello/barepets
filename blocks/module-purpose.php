<section class="module module--how-it-works module--purpose">
    <div class="kibbles-purpose absolute">
        <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?= get_template_directory_uri() ?>/img/kibbles-purpose.png" alt="Kibbles Purpose">
    </div>
    <div class="wrapper">
        <div class="module-top-heading text-center">
            <h2 class="module-title"><?php the_field('module_title'); ?></h2>
            <p class="module-subheading"><?php the_field('module_subheading'); ?></p>
            <p><?php the_field('module_content'); ?></p>
        </div>
        <div class="module-purpose-logos text-center mt-6">
            <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?php the_field('module_logos'); ?>" alt="" class="m-auto">
        </div>
    </div>

    <div class="decor-top-curve"></div>

    <div class="kibbles-purpose kibbles-purpose-1 absolute">
        <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?= get_template_directory_uri() ?>/img/bubbles-purpose.png" alt="Bubbles Purpose">
    </div>
</section>