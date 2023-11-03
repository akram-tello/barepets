<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading        = get_field('prod_heading');
    $type           = get_field('prod_typ');
?>

<?php if( have_rows('prod_logo', 'option') ): ?>
<section class="module module--logo-carousel module--logo-carousel-label <?= $type ?> <?= $className ?>">
    <div class="wrapper">
        <h2 class="module-heading"><?= $heading ?></h2>
        <div class="logo-carousel js-logo-carousel-label owl-carousel">
            <?php while( have_rows('prod_logo', 'option') ): the_row(); ?>
                <div class="logo-item">
                    <?php 
                        $logo  = get_sub_field('logo');
                        $link  = get_sub_field('link');
                        $title = get_sub_field('title');
                    ?>

                    <?php if( !empty( $link ) ): ?>
                        <a href="<?= $link ?>" target="_blank">
                    <?php endif ?>
                        <span>
                            <img data-src="<?= $logo['url'] ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="<?= $title ? $title : $logo['alt'] ?>">
                            <?= $title ? '<p>' . $title  . '</p>' : null ?>
                        </span>
                    <?php if( !empty( $link ) ): ?>
                        </a>
                    <?php endif ?>
                </div>
            <?php endwhile ?>    
        </div>
    </div>

    <div class="decor-top"></div>
    <div class="decor-bot"></div>
</section>
<?php endif  ?>