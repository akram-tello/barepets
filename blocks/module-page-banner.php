<?php 
    $className  = !empty($block['className']) ? $block['className'] : null;
    $heading    = get_field('heading');
    $heading_element = get_field('heading_element');
    $description = get_field('description');
    $content_width = get_field('content_width');
    $background = get_field('background');
    $text_align = get_field('text_align');
    $mobile_text_align = get_field('mobile_text_align');
    $text_color = get_field('text_color');
    $decoration = get_field('decoration');

    if(!empty($mobile_text_align['horizontal'])) {
        $mobile_align_horizontal = $mobile_text_align['horizontal'];
    } else {
        $mobile_align_horizontal = $text_align['horizontal'];
    }

    if(!empty($mobile_text_align['vertical'])) {
        $mobile_align_vertical = $mobile_text_align['vertical'];
    } else {
        $mobile_align_vertical = $text_align['vertical'];
    }
?>


<section class="module module--page-banner <?= $className ?>">
    <?php if( !empty( $decoration['decor_top'] ) ): ?>
        <div class="decor decor-top">
            <img data-src="<?= $decoration['decor_top'] ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" />
        </div>
    <?php endif ?>
    <?php if( !empty( $background['mobile'] ) && !empty( $background['desktop'] ) ): ?>
        <?= responsive_image( $background['mobile'], $background['desktop'], 'bg' )?>
    <?php endif ?>
    <div class="page-banner align-<?= $text_align['vertical'] ?> mobile_align-<?= $mobile_align_vertical ?>">
        <div class="wrapper align-<?= $text_align['horizontal'] ?> mobile_align-<?= $mobile_align_horizontal ?> text-color-<?= $text_color ?>">
            <?php if($heading) : ?>
                <<?= $heading_element ?> class="module-title align-<?= $text_align['horizontal'] ?> mobile_align-<?= $mobile_align_horizontal ?>" style="max-width: <?= $content_width ?>;"><?= $heading ?></<?= $heading_element ?>>
            <?php endif; ?>
            <?php if($description) : ?>
                <p class="align-<?= $text_align['horizontal'] ?> mobile_align-<?= $mobile_align_horizontal ?>" style="max-width: <?= $content_width ?>;"><?= $description ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php if( !empty( $decoration['decor_bottom'] ) ): ?>
        <div class="decor decor-bottom">
            <img data-src="<?= $decoration['decor_bottom'] ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" />
        </div>
    <?php endif ?>
</section>

