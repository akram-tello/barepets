<?php 
    $className      = !empty($block['className']) ? $block['className'] : null;
    $background     = get_field('banner_background', 'option') && !is_page() ? get_field('banner_background', 'option') : get_field('background');
?>


<section class="module module--text-banner <?= $className ?> bg-<?= $background ?>">
    <div class="decor-top"></div>
    <div class="decor-bot"></div>
    <div class="wrapper">
        <div class="text-banner">
            <?php if( have_rows('text_banner') ): ?>
                <?php while( have_rows('text_banner') ): the_row(); ?>
                    <?php 
                        $title  = get_sub_field('title');
                        $desc   = get_sub_field('desc');
                        $valign = get_sub_field('valign');
                    ?>
                    <div class="text-banner__item <?= $valign ?>">
                        <div>
                            <h3><?= $title ?></h3>
                            <?= $desc ?>
                        </div>
                    </div>
                <?php endwhile ?>
            <?php else: ?>
                <?php while( have_rows('banner_text_banner', 'option') ): the_row(); ?>
                    <?php 
                        $title  = get_sub_field('title');
                        $desc   = get_sub_field('desc');
                        $valign = get_sub_field('valign');
                    ?>
                    <div class="text-banner__item <?= $valign ?>">
                        <div>
                            <h3><?= $title ?></h3>
                            <?= $desc ?>
                        </div>
                    </div>
                <?php endwhile ?>
            <?php endif ?>
        </div>
    </div>
</section>

