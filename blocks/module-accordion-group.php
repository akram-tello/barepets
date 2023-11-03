<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $accordion_groups = get_field('accordion_groups');
?>

<section class="module module--accordion-group <?= $className ?>">
    <div class="wrapper flex flex-wrap">

        <div class="accordion-group-left">
            <div class="navigation">
                <div class="button-wrapper">
                    <a href="#all" class="active" data-target="all">All</a>
                </div>
                <?php if(have_rows('accordion_groups')) : ?>
                    <?php while(have_rows('accordion_groups')) : the_row(); ?>

                        <?php $heading = get_sub_field('heading'); ?>

                        <div class="button-wrapper">
                            <a href="#<?= str_replace(' ', '-', strtolower($heading)) ?>" data-target="<?= str_replace(' ', '-', strtolower($heading)) ?>"><?= $heading ?></a>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="mobile-accordion-nav">
                <div class="navigation-carousel js-navigation-carousel owl-carousel">
                    <div class="button-wrapper">
                        <a href="#all" class="active" data-target="all">All</a>
                    </div>
                    <?php if(have_rows('accordion_groups')) : ?>
                        <?php while(have_rows('accordion_groups')) : the_row(); ?>

                            <?php $heading = get_sub_field('heading'); ?>

                            <div class="button-wrapper">
                                <a href="#<?= str_replace(' ', '-', strtolower($heading)) ?>" data-target="<?= str_replace(' ', '-', strtolower($heading)) ?>"><?= $heading ?></a>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="accordion-group-right">
            <div id="all" class="anchor-link"></div>
            <?php if(have_rows('accordion_groups')) : ?>
                <?php while(have_rows('accordion_groups')) : the_row(); ?>

                    <?php $heading = get_sub_field('heading'); ?>

                    <div class="group-wrapper">
                        <div id="<?= str_replace(' ', '-', strtolower($heading)) ?>" class="anchor-link"></div>
                        <h3 class="group-title"><?= $heading ?></h3>
                        <?php if(have_rows('accordion_subgroup')) : ?>
                            <?php while(have_rows('accordion_subgroup')) : the_row(); ?>

                                <?php
                                    $title = get_sub_field('title');
                                    $content = get_sub_field('content');
                                ?>

                                <div class="accordion-wrapper">
                                    <div class="title-wrapper">
                                        <div class="accordion-icon">
                                            <span class="icon-part icon-vertical"></span>
                                            <span class="icon-part icon-horizontal"></span>
                                        </div>
                                        <h4><?= $title ?></h4>
                                    </div>
                                    <div class="accordion-content">
                                        <?= $content ?>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div>
</section>