<section class="module module--about-info relative">
    <div class="bg-blob absolute">
    <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?= get_template_directory_uri() ?>/img/bg-blob.png" alt="BG Blob">
    </div>
    <section class="module module-mission-vision">
        <div class="wrapper">
            <div class="two-col-text flex">
                <div class="col--text w-6/12 p-4">
                    <?php the_field('our_mission'); ?>
                </div>
                <div class="col--text w-6/12 p-4">
                    <?php the_field('our_vision'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="module module-timeline-chart relative">
        <div class="wrapper">
            <?php while( have_rows('chart_timeline') ): the_row(); ?>
                <div class="chart-timeline">
                    <div class="chart-img relative">
                        <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?= get_template_directory_uri() ?>/img/chart-images.png" alt="Chart Timeline">

                        <div class="chart-desc chart-desc1 absolute">
                            <p><?php the_sub_field('2021_timeline'); ?></p>
                        </div>
                        <div class="chart-desc chart-desc2 absolute">
                            <p><?php the_sub_field('2023_timeline'); ?></p>
                        </div>
                        <div class="chart-desc chart-desc3 absolute">
                            <p><?php the_sub_field('2025_timeline'); ?></p>
                        </div>
                        <div class="chart-desc chart-desc4 absolute">
                            <p><?php the_sub_field('2027_timeline'); ?></p>
                        </div>
                    </div>

                    <div class="dotted-img absolute">
                        <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?= get_template_directory_uri() ?>/img/dotted-images.svg" alt="Dotted Images">
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </section>
</section>