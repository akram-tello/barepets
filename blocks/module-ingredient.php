<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $subtitle       = get_field('ing_subtitle');
    $heading        = get_field('ing_title');
    $photo          = get_field('ing_featured_photo');
?>


<section class="module module--ingredients <?= $className ?>">
    
    <div class="wrapper">
        <p class="module-subtitle"><?= $subtitle ?></p>
        <h2 class="module-title"><?= $heading ?></h2>

        <img data-src="<?= $photo ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" class="featured">

        <?php if( have_rows('ing_ingredients') ): ?>
            <div class="ingredients">
                <?php while( have_rows('ing_ingredients') ): the_row(); ?>
                    <div class="ingredients--item">
                        <?php 
                            $icon   = get_sub_field('icon');
                            $tag    = get_sub_field('tagline');
                            $title  = get_sub_field('title');
                            $desc   = get_sub_field('description');
                        ?>

                        <div class="ingredients-wrapper">
                            <div class="tagline">
                                <div class="tagline-icon"><img data-src="<?= $icon ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt=""></div>
                                <div class="tagline-tag"><?= $tag ?></div>
                            </div>

                            <h3><?= $title ?></h3>
                            <p><?= $desc ?></p>
                        </div>
                    </div>
                <?php endwhile ?>
            </div>
        <?php endif ?>


    </div>
</section>

