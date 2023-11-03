<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading = get_field('heading');
    $description = get_field('description');
    $form = get_field('form');
    $graphic = get_field('graphic');
?>


<section class="module module--retailer-form <?= $className ?>">
    <div class="wrapper">
        <div class="form-column">
            <h3><?= $heading ?></h3>
            <div class="description">
                <p><?= $description ?></p>
            </div>
            <div class="form-wrapper">
                <?= do_shortcode($form); ?>
            </div>
        </div>
        <div class="graphic">
            <img data-src="<?= $graphic ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
        </div>
    </div>
</section>