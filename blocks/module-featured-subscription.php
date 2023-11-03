<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $subtitle       = get_field('subtitle');
    $heading        = get_field('heading');
    $photo          = get_field('featured_image');
    $name           = get_field('product_name');
?>


<section class="module module--featured-subscription <?= $className ?>">
    <div class="wrapper">
        <p class="module-subheading"><?= $subtitle ?></p>
        <h2 class="module-title"><?= $heading ?></h2>

        <div class="subscription">
            <div class="subscription--photo">
                <img data-src="<?= $photo ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
            </div>
            <div class="subscription--info">
                <h3><?= $name ?></h3>

                <div class="variations">
                    <?php $a = 1; ?>
                    <?php while( have_rows('subscriptions') ): the_row() ?>
                        <?php 
                            $label = get_sub_field('custom_label');
                            $prod  = get_sub_field('product');
                        ?>
                        <div class="variation--labels variations--item">
                            <label class="js-variations <?= $a == 1 ? 'active' : '' ?>" data-slug="<?= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $label))); ?>">
                                <span class="label"><i></i><?= $label ?></span>
                                <span class="price"><?= wc_get_product($prod)->get_price_html(); ?></span>
                            </label>
                        </div>
                        <?php $a++ ?>
                    <?php endwhile ?>

                    <?php $b = 1; ?>
                    <?php while( have_rows('subscriptions') ): the_row() ?>
                        <?php 
                            $label = get_sub_field('custom_label');
                            $prod  = get_sub_field('product');
                        ?>
                        <div class="variation--buttons variations--item <?= $b == 1 ? 'active' : '' ?> <?= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $label))); ?>">
                            <a href="<?= do_shortcode( '[add_to_cart_url id=' . $prod . ']' ) ?>" class="btn btn-lightpurple">Subscribe for only <?= wc_get_product($prod)->get_price_html(); ?> </a>
                        </div>
                        <?php $b++; ?>
                    <?php endwhile ?>
                </div>
            </div>
        </div>
    </div>

    <div class="decor-top-curve"></div>
    <img data-src="<?= get_template_directory_uri() ?>/img/decor-top-right-subscription.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" class="decor-top-right">
</section>

