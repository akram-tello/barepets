<section class="module module--breeders-form bg-inline">
    <div class="wrapper">
        <div class="flex">
            <div class="module--content w-6/12 pr-8">
                <?php the_field('content'); ?>

                <div class="badge-breeder-img mt-8">
                    <div class="flex flex-wrap justify-between items-center">
                        <?php while( have_rows('badge_images') ): the_row(); ?>
                            <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?php the_sub_field('image_badge'); ?>" alt="Badges">
                        <?php endwhile ?>
                    </div>
                </div>

                <div class="breeder-img text-center mt-6">
                    <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?php the_field('bottom_image'); ?>" alt="Golden Retriever">
                </div>
            </div>
            <div class="module--form w-6/12 pl-8">
                <div class="module--content">
                    <h3><?php the_field('form_title'); ?></h3>
                    <?php $form = get_field('form_shortcode'); ?>
                    <?php echo do_shortcode($form); ?>
                </div>
            </div>
        </div>
    </div>
</section>