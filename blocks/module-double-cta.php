<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $top_decor = get_field('top_decor');
    $left_cta = get_field('left_cta');
    $left_button = $left_cta['button'];
    $right_cta = get_field('right_cta');
    $right_button = $right_cta['button'];
?>


<section class="module module--double-cta <?= $className ?>">
    <div class="decor-top">
        <img data-src="<?= $top_decor ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" />
    </div>
    <div class="bg-column left-content-bg"></div>
    <div class="bg-column right-content-bg"></div>
    <div class="wrapper">
        <div class="cta-column left-cta">
            <h3><?= $left_cta['heading'] ?></h3>
            <p><?= $left_cta['description'] ?></p>
            <div class="button-wrapper">
                <a href="<?= $left_button['url'] ?>"><?= $left_button['label'] ?></a>
            </div>
        </div>
        <div class="cta-column right-cta">
            <h3><?= $right_cta['heading'] ?></h3>
            <p><?= $right_cta['description'] ?></p>
            <div class="button-wrapper">
                <a href="<?= $right_button['url'] ?>"><?= $right_button['label'] ?></a>
            </div>
        </div>
    </div>
</section>