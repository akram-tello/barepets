<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading        = get_field('heading');
    $subheading     = get_field('sub_heading');
?>

<section class="module module--testimonial <?= $className ?>">
    <?= get_template_part('img/icon-badge.svg'); ?>
    <div class="decor"></div>
    <div class="wrapper">
        <h2 class="module-title"><?= $heading ?></h2>

        <div class="testimonials js-testimonial owl-carousel">
            <?php while( have_rows('testimonial') ): the_row(); ?>
                <?php 
                    $thumb      = get_sub_field('thumb');
                    $name       = get_sub_field('name');
                    $quote      = get_sub_field('quote');
                    $photo      = get_sub_field('photo');
                    $pet        = get_sub_field('pet');
                ?>
                <div class="testimonials--item">
                    <div class="testimonial-content">
                        <div class="testimonial--thumb">
                            <?= image( $thumb['id'], 'a4x3' ) ?>
                        </div>
                        <div class="testimonial--text">
                            <p class="name"><?= $name ?></p>
                            <?= $quote ?>
                            
                            <div class="pet">
                                <?php if( !empty( $photo ) ): ?>
                                    <div class="pet--photo"><img data-src="<?= $photo['url'] ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="<?= $photo['alt'] ?>"></div>
                                <?php endif ?>
                                <div class="pet--name">
                                    <?= get_template_part('img/icon-stars.svg'); ?>
                                    <p>Approved by <?= $pet ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
</section>

