<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
?>

<section class="module module--text-scroller <?= $className ?>">
    <div class="text-scroller js-text-scroller owl-carousel">
        <?php if( have_rows('scroller') ): ?>
            <?php while( have_rows('scroller') ): the_row(); ?>
                <div class="text-scroller__item">
                    <p><?= esc_html( get_sub_field('text') ); ?></p>
                </div>
            <?php endwhile ?>
        <?php else: ?>
            <?php while( have_rows('scroller', 'option') ): the_row(); ?>
                <div class="text-scroller__item">
                    <p><?= esc_html( get_sub_field('text') ); ?></p>
                </div>
            <?php endwhile ?>
        <?php endif ?>
    </div>
</section>

