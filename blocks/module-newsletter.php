<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $subheading     = get_field('subheading');
    $heading        = get_field('heading');
    $code           = get_field('shortcode');
    $background     = get_field('background');
?>


<section class="module module--newsletter <?= $className ?>">
    <?php if( !empty( $background['mobile'] ) && !empty( $background['desktop'] ) ): ?>
        <?= responsive_image( $background['mobile'], $background['desktop'], 'background' )?>
    <?php endif; ?>
    <?= get_template_part('img/icon-badge.svg') ?>
    <div class="newsletter--wrapper">
        <div class="wrapper">
            <div class="newsletter">
                <div class="newsletter--text">
                    <p class="module-subheading"><?= $subheading ?></p>
                    <h2 class="module-title"><?= $heading ?></h2>
                </div>
                <div class="newsletter--form">
                    <?= do_shortcode( $code ) ?>
                </div>
            </div>
        </div>
    </div>
</section>

