<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading        = get_field('heading');
    $content        = get_field('content');
    $background     = get_field('background');
?>


<section class="module module--rte <?= $className ?>">
    <?php if( !empty( $background['mobile'] ) && !empty( $background['desktop'] ) ): ?>
    <?= responsive_image( $background['mobile'], $background['desktop'], 'bg' )?>
    <?php endif ?>
    <div class="wrapper">
        <h2 class="module-title"><?= $heading ?></h2>
        <?= $content ?>
    </div>
</section>

