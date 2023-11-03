<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading   = get_field('heading') && is_page() ? get_field('heading') : get_field('faq_heading', 'option');
    $cta       = get_field('cta') && is_page() ? get_field('cta') : get_field('faq_cta', 'option');
    $variant   = get_field('variant') && is_page() ? get_field('variant') : get_field('faq_variant', 'option');

    $background = get_field('background') && is_page() ? get_field('background') : get_field('faq_background', 'option');
?>


<section class="module module--faq <?= esc_attr( $variant ) ?> <?= $className ?>">
    <?php if( !empty( $background['mobile'] ) && !empty( $background['desktop'] ) ): ?>
        <?= responsive_image( $background['mobile'], $background['desktop'], 'bg' )?>
    <?php endif ?>
    <div class="wrapper">
        <h2 class="module-title"><?= $heading ?></h2>

        <div class="faq-list">
            <?php if( have_rows('faqs') ): ?>
                <?php while( have_rows('faqs') ): the_row(); ?>
                    <?php 
                        $question = get_sub_field('question');
                        $answer   = get_sub_field('answer');
                    ?>
                    <div class="faq-list__item">
                        <h3 class="faq-question"><?= esc_html( $question ) ?></h3>
                        <div class="faq-answer"><?= $answer ?></div>
                    </div>
                <?php endwhile ?>
            <?php else: ?>
                <?php while( have_rows('faq_faqs', 'option') ): the_row(); ?>
                    <?php 
                        $question = get_sub_field('question');
                        $answer   = get_sub_field('answer');
                    ?>
                    <div class="faq-list__item">
                        <h3 class="faq-question"><?= esc_html( $question ) ?></h3>
                        <div class="faq-answer"><?= $answer ?></div>
                    </div>
                <?php endwhile ?>
            <?php endif?>
        </div>

        <?php if( !empty( $cta ) ): ?>
            <div class="cta">
                <a href="<?= esc_url( $cta['url'] ) ?>" class="cta"><?= esc_html( $cta['title'] ) ?></a>
            </div>
        <?php endif ?>
    </div>

    <div class="decor-top"></div>
</section>

