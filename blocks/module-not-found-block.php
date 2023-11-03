<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading = get_field('heading');
    $subheading = get_field('subheading');
    $description = get_field('description');
    $button = get_field('button');
    $background = get_field('background');
?>

<section class="module module--not-found-block <?= $className ?>">

    <?php if( !empty( $background['mobile'] ) && !empty( $background['desktop'] ) ): ?>
        <?= responsive_image( $background['mobile'], $background['desktop'], 'bg' )?>
    <?php endif ?>

    <div class="not-found-block">
        <div class="wrapper">

            <div class="content-wrapper">
            <?php if($subheading) : ?>
                <h4 class="subheading"><?= $subheading ?></h4>
            <?php endif; ?>
            <?php if($heading) : ?>
                <h1 class="module-title"><?= $heading ?></h1>
            <?php else : ?>
                <h1 class="module-title">Heading</h1>
            <?php endif; ?>
            <?php if($description) : ?>
                <p class="description"><?= $description ?></p>
            <?php endif; ?>
            <?php if($button['label'] && $button['url']) : ?>
                <div class="button-wrap">
                    <a class="button" href="<?= $button['url'] ?>"><?= $button['label'] ?></p>
                </div>
            <?php endif; ?>
            </div>

        </div>

    </div>

</section>