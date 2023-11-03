<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading        = get_field('heading');
    $content        = get_field('intro_text');
    $cta            = get_field('cta');
    $background     = get_field('background');
    $alignment      = get_field('alignment');
?>


<section class="module module--page-header <?= $className ?>">
    <?php if( !empty( $background['mobile'] ) && !empty( $background['desktop'] ) ): ?>
        <?= responsive_image( $background['mobile'], $background['desktop'], 'bg' )?>
    <?php endif ?>
    <div class="page-header align-<?= $alignment['vertical'] ?>">
        <div class="wrapper align-<?= $alignment['horizontal'] ?>">
            <h2 class="module-title"><?= $heading ?></h2>
            <?= $content ?>
            <?php if( !empty( $cta ) ): ?>
                <a href="<?= $cta['url'] ?>" class="btn btn--primary"><?= $cta['title'] ?></a>
            <?php endif ?>
        </div>
    </div>
</section>

