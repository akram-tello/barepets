<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $subtitle       = get_field('subtitle');
    $heading        = get_field('heading');
    $featured       = get_field('featured_image');
?>


<section class="module module--how-it-works <?= $className ?>">
    <div class="wrapper">
        <div class="process">
            <div class="process--text">
                <p class="module-subtitle"><?= $subtitle ?></p>
                <h2 class="module-title"><?= $heading ?></h2>
                <?php if( !empty( $featured['desktop'] ) ): ?>
                    <img data-src="<?= $featured['desktop'] ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" class="featured">
                <?php endif ?>
            </div>
            <div class="process--steps">
                <div class="steps js-steps owl-carousel">
                    <?php $i = 1; ?>
                    <?php while( have_rows('process') ): the_row(); ?>
                        <?php 
                            $title      = get_sub_field('title');
                            $desc       = get_sub_field('description');
                            $img        = get_sub_field('photo');
                            $cta        = get_sub_field('cta');
                        ?>

                        <div class="steps--item">
                            <div class="steps--heading">
                                <div class="steps-counter"><span><?= $i ?></span></div>
                                <div class="steps-text">
                                    <h3><?= $title ?></h3>
                                    <?= $desc ?>        
                                </div>
                            </div>
                            <div class="steps--image">
                                <img data-src="<?= $img ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
                                <?php if( $cta ): ?>
                                    <div class="cta">
                                        <a href="<?= $cta['url'] ?>" class="btn btn-primary"><?= $cta['title'] ?></a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endwhile ?>
                </div>
                <?php if( !empty( $featured['mobile'] ) ): ?>
                    <img data-src="<?= $featured['mobile'] ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" class="featured">
                <?php endif ?>

            </div>
        </div>

    </div>

    <div class="decor-top-curve"></div>
    <div class="decor-bottom-curve"></div>

    <img data-src="<?= get_template_directory_uri() ?>/img/decor-top-right-how.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" class="decor-top-right">
    <?= get_template_part('img/icon-badge-white.svg'); ?>

</section>

