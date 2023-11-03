<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading = get_field('heading');
    $logo_group = get_field('logo_group');
?>


<section class="module module--featured-on <?= $className ?>">
    <div class="wrapper">
        <?php if($heading) : ?>
        <h4 class="module-heading"><?= $heading ?></h4>
        <?php else : ?>
        <h4 class="module-heading">As Featured On</h4>
        <?php endif; ?>
        <div class="featured-logo-group js-logo-group owl-carousel">
            <?php if($logo_group['logo_1']) : ?>
            <div class="logo-item logo_1">
                <div class="logo-wrapper"><img data-src="<?= $logo_group['logo_1'] ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt=""></div>
            </div>
            <?php endif; ?>
            <?php if($logo_group['logo_2']) : ?>
            <div class="logo-item logo_2">
                <div class="logo-wrapper"><img data-src="<?= $logo_group['logo_2'] ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt=""></div>
            </div>
            <?php endif; ?>
            <?php if($logo_group['logo_3']) : ?>
            <div class="logo-item logo_3">
                <div class="logo-wrapper"><img data-src="<?= $logo_group['logo_3'] ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt=""></div>
            </div>
            <?php endif; ?>
            <?php if($logo_group['logo_4']) : ?>
            <div class="logo-item logo_4">
                <div class="logo-wrapper"><img data-src="<?= $logo_group['logo_4'] ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt=""></div>
            </div>
            <?php endif; ?>
            <?php if($logo_group['logo_5']) : ?>
            <div class="logo-item logo_5">
                <div class="logo-wrapper"><img data-src="<?= $logo_group['logo_5'] ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt=""></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="decor-top"></div>
</section>