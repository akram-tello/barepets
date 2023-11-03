<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading        = get_field('heading');
    $content        = get_field('intro');
?>


<section class="module module--image-carousel <?= $className ?>">
    <div class="wrapper">
        <h2 class="module-title"><?= $heading ?></h2>
        <?= $content ?>
    </div>

    <?php if( have_rows('images') ): ?>
        <div class="image-carousel js-image-carousel owl-carousel">
            <?php while( have_rows('images') ): the_row(); ?>
                <?php $img = get_sub_field('image'); ?>
                <?php $link = get_sub_field('link');  ?>
                <div class="image-carousel__item">
                    <?= $link ? '<a href="' . $link . '" target="_blank">' : '' ?>
                    <img data-src="<?= $img['url'] ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="<?= $img['alt'] ? $img['alt'] : 'Image Carousel Item' ?>">
                    <?= $link ? '</a>' : '' ?>
                </div>
            <?php endwhile ?>
        </div>
    <?php endif ?>
</section>

