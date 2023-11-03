<?php 
    $className  = !empty($block['className']) ? $block['className'] : null;
    $bg         = get_field('background') && is_page() ? get_field('background') : get_field('twm_background', 'option');
    $subtitle   = get_field('subtitle') && is_page() ? get_field('subtitle') : get_field('twm_subtitle', 'option');
    $heading    = get_field('heading') && is_page() ? get_field('heading') : get_field('twm_heading', 'option');
    $content    = get_field('content') && is_page() ? get_field('content') : get_field('twm_content', 'option');
    $cta        = get_field('cta') && is_page() ? get_field('cta') : get_field('twm_cta', 'option');
    $alignment  = get_field('alignment') && is_page() ? get_field('alignment') : get_field('twm_alignment', 'option');
    $media      = get_field('media') && is_page() ? get_field('media') : get_field('twm_media', 'option');
    $poster     = get_field('video_placeholder') && is_page() ? get_field('video_placeholder') : get_field('twm_video_placeholder', 'option');
?>


<section class="module module--text-with-media bg-<?= $bg ?> <?= $className ?>">
    <div class="wrapper">
        <div class="text-with-media align-<?= $alignment ?>">
            <div class="text-content">
                <?php if( $subtitle ): ?>
                    <p class="module-subheading"><?= $subtitle ?></p>
                <?php endif ?>
                <h2 class="module-title"><?= $heading ?></h2>
                <?= $content ?>
                <?php if( !empty( $cta ) ): ?>
                    <a href="<?= $cta['url'] ?>" class="btn btn-secondary"><?= $cta['title'] ?></a>
                <?php endif ?>
            </div>
            <div class="text-media">
                <?php if( $media['type'] == 'video' ): ?>
                    <div class="video-wrapper">
                        <video width="320" height="240" controls poster="<?= $poster ?>">
                            <source src="<?= $media['url'] ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>

                        <img data-src="<?= $poster ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
                        <?= get_template_part('img/icon-play.svg') ?>
                    </div>
                <?php elseif( $media['type'] == 'image' ): ?>
                    <?= image( $media['ID'], 'a4x3' ) ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>

