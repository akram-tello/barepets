<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading        = get_field('feed_title');
    $content        = get_field('feed_intro');
    $chart          = get_field('feeding_chart');
    $background     = get_field('feed_background');
    $type = get_field('food_type');
?>


<section class="module module--feeding-guide bg-<?= $background ?> <?= $className ?> <?= $type ?>">
    <div class="wrapper">
        <div class="feeding--chart">
            <div class="feeding-text">
                <h2 class="module-title"><?= $heading ?></h2>
                <?= $content ?>
            </div>
            <div class="feeding-chart">
                <?= responsive_image( $chart['mobile'], $chart['desktop'], 'chart') ?>
            </div>
        </div>
    </div>

    <div class="decor-top"></div>
    <div class="decor-bot"></div>
</section>

