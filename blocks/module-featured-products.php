<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $subtitle       = get_field('subtitle');
    $heading        = get_field('heading');
?>


<section class="module module--featured-products <?= $className ?>">
    <img data-src="<?= get_template_directory_uri() ?>/img/icon-kibble.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" class="kibble kibble-1">
    <img data-src="<?= get_template_directory_uri() ?>/img/icon-kibble.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" class="kibble kibble-2">
    <img data-src="<?= get_template_directory_uri() ?>/img/icon-kibble.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" class="kibble kibble-3">
    <img data-src="<?= get_template_directory_uri() ?>/img/icon-kibble.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" class="kibble kibble-4">
    <picture>
		<source media="(max-width: 767px)" srcset="<?= get_template_directory_uri() ?>/img/decor-featured-products-divider-mobile.png" />
		<source media="(min-width: 768px)" srcset="<?= get_template_directory_uri() ?>/img/decor-featured-products-divider-desktop.png" />
		<img data-src="<?= get_template_directory_uri() ?>/img/decor-featured-products-divider-desktop.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" class="decor" alt="Decor" aria-hidden="true" />
	</picture>

    <div class="wrapper">
        <h4 class="module-subheading"><?= $subtitle ?></h4>
        <h2 class="module-title"><?= $heading ?></h2>

        <div class="featured-products">
            <?php $i = 1; ?>
            <?php while( have_rows('products') ): the_row() ?>
                <div class="featured-products__item">
                    <?php 
                        $type  = get_sub_field('type');
                        $title = get_sub_field('product_name');
                        $desc  = get_sub_field('description');
                        $prod  = get_sub_field('featured_product');
                        $photo = get_sub_field('product_photo');

                        $product = wc_get_product( $prod );
                        $rating  = $product->get_average_rating();
                        $count   = $product->get_rating_count();
                        $star    = ceil((int)$rating);


                    ?>

                    <div class="product">
                        <div class="product--item product--photo">
                            <img data-src="<?= $photo ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="<?= $title ?>">
                            <?php $i == 1 ? get_template_part('img/icon-badge-green.svg') : get_template_part('img/icon-badge.svg') ?>
                        </div>
                        <div class="product--item product--info">
                            <img data-src="<?= get_template_directory_uri() ?>/img/decor-kibble.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="" class="kibble kibble-1">
                            <div class="product--header">
                                <div>
                                    <h4 class="module-subheading"><?= $type == 'dry' ? 'Dry Kibble' : 'Wet Food' ?></h4>
                                </div>
                                <div>
                                    <p><?= $product->get_price_html() ?></p>
                                </div>
                            </div>

                            <h3><?= $title ?></h3>
                            <div class="rating">
                                <?php for( $i = 1; $i <= $star; $i++ ): ?>
                                    <svg id="star_rate_black_24dp" xmlns="http://www.w3.org/2000/svg" width="14.884" height="15" viewBox="0 0 14.884 15">
                                        <path id="Path_32" data-name="Path 32" d="M13.858,9.692,12.469,5.12a.941.941,0,0,0-1.8,0l-1.4,4.571h-4.2A.943.943,0,0,0,4.517,11.4l3.438,2.456L6.6,18.211A.943.943,0,0,0,8.077,19.24L11.562,16.6l3.485,2.654a.943.943,0,0,0,1.473-1.029L15.17,13.866l3.438-2.456A.942.942,0,0,0,18.06,9.7h-4.2Z" transform="translate(-4.12 -4.447)" fill="#f9cf4f"/>
                                    </svg>
                                <?php endfor ?>
                                <span><?= $count ?> <?= $count > 2 ? 'Review' : 'Reviews' ?></span>
                            </div>
                            <?= $desc ?>

                            <div class="cta">
                                <a href="<?= get_permalink( $prod ) ?>" class="btn btn-primary"><?= __('Switch to Bare') ?></a>
                            </div>

                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endwhile ?>
        </div>
    </div>
</section>

