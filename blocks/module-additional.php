<?php if( have_rows('additional_details') ): ?>
<section class="module--additional">
    <div class="additional">
        <span class="js-additional-trigger">about this food</span>
        <div class="faq-list">

            <?php while( have_rows('additional_details') ): the_row(); ?>
                <?php 
                    $question = get_sub_field('title');
                    $answer   = get_sub_field('content');
                ?>
                <div class="faq-list__item">
                    <h3 class="faq-question"><?= esc_html( $question ) ?></h3>
                    <div class="faq-answer"><?= $answer ?></div>
                </div>
            <?php endwhile ?>

        </div>
    </div>
</section>
<?php endif ?>