<?php 
    $className      = !empty($block['className']) ? $block['className'] : null;
    $subtitle       = get_field('compare_subtitle', 'option') && !is_page() > 0 ? get_field('compare_subtitle', 'option') : get_field('subtitle');
    $heading        = get_field('compare_heading', 'option') && !is_page() > 0 ? get_field('compare_heading', 'option') : get_field('heading');
    $intro          = get_field('compare_intro', 'option') && !is_page() > 0 ? get_field('compare_intro', 'option') : get_field('intro');
    $background     = get_field('compare_background', 'option') && !is_page() > 0 ? get_field('compare_background', 'option') :  get_field('background');
    $main           = get_field('compare_main_table', 'option') && !is_page() > 0 ? get_field('compare_main_table', 'option') :  get_field('main_table');
    $cta            = get_field('compare_cta', 'option') && !is_page() > 0 ? get_field('compare_cta', 'option') : get_field('cta');
    $type = get_field('food_type');
?>


<section class="module module--comparison-table <?= $background ?> <?= $className ?> <?= $type ?>">
    
    <div class="wrapper">
        <h4 class="module-subtitle"><?= $subtitle ?></h4>
        <h2 class="module-title"><?= $heading ?></h2>
        <?= $intro ?>

        <div class="comparison-table">
            <div class="comparison-table__bare">
                <?= responsive_image( $main['mobile'], $main['desktop'], 'table'); ?>
            </div>
            <div class="comparison-table__others">
                <div class="other-products">
                    <div class="other-toggle">
                        <div class="other-choices">
                            <div class="toggle js-toggle"></div>
                            <ul>
                                <li>Select</li>
                                <?php if( have_rows('compare') ): ?>
                                    <?php while( have_rows('compare') ): the_row(); ?>
                                        <?php 
                                            $title = get_sub_field('title');
                                            $slug = strtolower( trim( preg_replace('/[^A-Za-z0-9-]+/', '-', $title ) ) ); 
                                        ?>
                                        <li class="<?= $slug ?>"><?= $title ?></li>
                                    <?php endwhile ?>
                                <?php else: ?>
                                    <?php while( have_rows('compare_compare', 'option') ): the_row(); ?>
                                        <?php 
                                            $title = get_sub_field('title');
                                            $slug = strtolower( trim( preg_replace('/[^A-Za-z0-9-]+/', '-', $title ) ) ); 
                                        ?>
                                        <li class="<?= $slug ?>"><?= $title ?></li>
                                    <?php endwhile ?>
                                <?php endif ?>
                            </ul>
                        </div>
                    </div>
                    <?php $i = 0; ?>
                    <?php if( have_rows('compare') ): ?>
                        <?php while( have_rows('compare') ): the_row(); ?>
                            <?php $slug = strtolower( trim( preg_replace('/[^A-Za-z0-9-]+/', '-', get_sub_field('title') ) ) ); ?>
                            <div class="other-products__item <?= $i == 0 ? 'active' : '' ?> <?= $slug ?>">
                                <img data-src="<?= get_sub_field('product') ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
                            </div>
                            <?php $i += 1; ?>
                        <?php endwhile ?>
                        
                    <?php else: ?>
                        <?php while( have_rows('compare_compare', 'option') ): the_row(); ?>
                            <?php $slug = strtolower( trim( preg_replace('/[^A-Za-z0-9-]+/', '-', get_sub_field('title') ) ) ); ?>
                            <div class="other-products__item <?= $i == 0 ? 'active' : '' ?> <?= $slug ?>">
                                <img data-src="<?= get_sub_field('product') ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
                            </div>
                            <?php $i += 1; ?>
                        <?php endwhile ?>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <?php if( !empty( $cta ) ): ?>
            <div class="cta">
                <a href="<?= $cta['url'] ?>" class="btn btn-tertiary"><?= $cta['title'] ?></a>
            </div>
        <?php endif ?>
    </div>

    <div class="decor-top-right"></div>
    <div class="decor-bottom-left"></div>
</section>

