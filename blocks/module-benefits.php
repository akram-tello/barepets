<?php 
    $heading = get_field('benefit_heading');
    $intro = get_field('benefit_intro');
    $background = get_field('benefit_background');
    global $product;
    $id = $product->get_id();   
?>

<?php if($heading) : ?>

<section class="module module--benefits">
    <?= !empty($background['mobile']) && !empty($background['desktop']) ? responsive_image( $background['mobile'], $background['desktop'], 'bg' ) : null ?>
    <div class="wrapper">
        <h2 class="module-title"><?= $heading ?></h2>
        <?= $intro ?>

        <?php if( have_rows('benefits') ): ?>
            <div class="benefits">
                <?php while( have_rows('benefits') ): the_row(); ?>
                <div class="benefits--holder">
                    <div class="benefits--item">
                        <?php 
                            $tagline = get_sub_field('tagline');
                            $title   = get_sub_field('title');
                            $color   = get_sub_field('title_color');
                            $desc    = get_sub_field('description');
                            $photo   = get_sub_field('photo');
                        ?>

                        <div class="benefits-info">
                            <p class="tagline"><?= $tagline ?></p>
                            <h3 class="color-<?= $color ?>"><?= $title ?></h3>
                        </div>

                        <div class="benefits-overlay bg-<?= $color ?> <?= $photo ? 'with-photo' : null ?>">
                            <?php if( $photo ): ?>
                                <img src="<?= get_template_directory_uri()?>/img/placeholder.png" data-src="<?= $photo ?>" alt="">
                            <?php endif ?>

                            <?= $desc ?>
                        </div>
                    </div>
                    <div class="benefits-shop-now">
                        <a href="#product-<?= $id ?>">SHOP NOW</a>
                    </div>
                </div>    
                <?php endwhile ?>
            </div>
        <?php endif ?>

        <picture>
            <source media="(max-width: 767px)" srcset="<?= get_template_directory_uri() ?>/img/benefits-mobile.png" />
            <source media="(min-width: 768px)" srcset="<?= get_template_directory_uri() ?>/img/benefits-desktop.png" />
            <img data-src="<?= get_template_directory_uri() ?>/img/benefits-desktop.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" />
        </picture>
    </div>

    <?php if( have_rows('benefit_foods') ): ?>
        <div class="foods-wrapper">
            <div class="foods">
                <?php while( have_rows('benefit_foods') ): the_row(); ?>
                    <?php 
                        $photo = get_sub_field('icon');
                        $title = get_sub_field('title');
                    ?>
                    <div class="foods-items">
                        <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?= $photo ?>" alt="">
                        <p><?= $title ?></p>
                    </div>
                <?php endwhile ?>
            </div>
        </div>
    <?php endif ?>
</section>

<?php endif; ?>