<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading        = get_field('testi_heading', 'option');
?>

<section class="module module--testimonial-slider <?= $className ?>">
    <div class="wrapper">
        <h2 class="module-title"><?= $heading ?></h2>

        <?php if( have_rows('testi_testimonials', 'option') ): ?>
            <div class="testimonials-slider js-testimonial-slider owl-carousel">
                <?php while( have_rows('testi_testimonials', 'option') ): the_row() ?>
                <?php 
                    $photo      = get_sub_field('photo');
                    $title      = get_sub_field('title');
                    $quote      = get_sub_field('quote');
                    $name       = get_sub_field('name');
                ?>
                    <div class="testimonials-slider__item">
                        <div class="testimonials-slider__photo">
                            <img data-src="<?= $photo ?>" src="<?= get_template_directory_uri() ?>/img/placeholde.png" alt="">
                        </div>
                        <div class="testimonials-slider__quote">
                            <div class="icons">
                                <div class="icons-item">
                                    <?= get_template_part('img/icon-1.svg') ?>
                                    <p>Fewer vet visits</p>
                                </div>

                                <div class="icons-item">
                                    <?= get_template_part('img/icon-2.svg') ?>
                                    <p>Increased vitality</p>
                                </div>

                                <div class="icons-item">
                                    <?= get_template_part('img/icon-3.svg') ?>
                                    <p>Clear skin & shiny coat</p>
                                </div>
                            </div>
                            <h3><?= $title ?></h3>
                            <?= $quote ?>
                            <p class="name"><?= $name ?></p>
                        </div>
                    </div>
                <?php endwhile ?>
            </div>
        <?php endif ?>
    </div>
</section>

