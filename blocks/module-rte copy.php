<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading        = get_field('heading');
    $content        = get_field('content');
    $background     = get_field('background');
?>


<section class="module module--benefits <?= $className ?>">
    <div class="wrapper">
        <h2 class="module-title"><?= $heading ?></h2>
        <?= $content ?>
    </div>
</section>

