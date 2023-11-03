<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $content_image = get_field('content_image');
    $guarantee_left = get_field('guarantee_left');
    $guarantee_right = get_field('guarantee_right');
    $guarantee_steps = $guarantee_right['steps'];
?>

<section class="module module--guarantee-content <?= $className ?>">
    <div class="wrapper">
        <div class="content-image">
            <img data-src="<?= $content_image ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
        </div>
        <div class="guarantee-column guarantee-left">
            <h3><?= $guarantee_left['heading'] ?></h3>
            <div class="content">
                <?= $guarantee_left['content'] ?>
            </div>
        </div>
        <div class="guarantee-column guarantee-right">
            <h4><?= $guarantee_right['heading'] ?></h4>
            <?php if( have_rows('guarantee_right') ): ?>
                <?php while( have_rows('guarantee_right') ) : the_row(); ?>

                    <?php if( have_rows('steps') ): ?>
                        <div class="steps-list">
                        <?php while( have_rows('steps') ) : the_row(); ?>

                            <div class="step-item">
                                <h3><?= get_sub_field('heading') ?></h3>
                                <?= get_sub_field('description') ?>
                            </div>
                            
                        <?php endwhile; ?> 
                        </div>  
                    <?php endif; ?>

                <?php endwhile; ?>                
            <?php endif; ?>
            <div class="guarantee-steps">

            </div>
        </div>
    </div>
</section>