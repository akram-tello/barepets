<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading = get_field('heading');
?>


<section class="module module--sample-block <?= $className ?>">
    <div class="wrapper">
        <h2 class="module-title"><?= $heading ?></h2>
    </div>
</section>

