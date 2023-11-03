<?php 
    $heading = get_field('heading', 194);
    $link = get_field('button', 194);
?>

<section class="module module--featured-products module-subscription-model">
    <div class="wrapper">
        <h2 class="module-title"><?= $heading ?></h2>
        <div class="cta text-center">
            <a href="<?= $link ?>" class="btn btn-primary">Try Bare</a>
        </div>
    </div>
</section>

<section class="module module--featured-subscription module--work">
    <div class="wrapper">
        <div class="model--holder">
            <?php while( have_rows('subscription_model', 194) ): the_row(); 
            $photo          = get_sub_field('image');
            $content          = get_sub_field('content');
            ?>
                <div class="model--list">
                    <img src="<?= get_template_directory_uri()?>/img/placeholder.png" data-src="<?= $photo ?>" alt="">

                    <div class="model-content">
                        <?= $content ?>
                    </div>
                </div>
            <?php endwhile ?>
        </div>

        <div class="module--faq model--faq">
            <?php 
            $heading   = get_field('heading') && is_page() ? get_field('heading') : get_field('faq_heading', 'option');
            $cta       = get_field('cta') && is_page() ? get_field('cta') : get_field('faq_cta', 'option');
            ?>
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
                    <a href="<?= esc_url( $cta['link'] ) ?>" class="cta"><?= esc_html( $cta['title'] ) ?></a>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="decor-top-curve"></div>
</section>