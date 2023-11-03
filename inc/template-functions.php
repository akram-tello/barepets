<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package starter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function starter_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'starter_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function starter_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'starter_pingback_header' );

/** RESPONSIVE IMAGE **/
/**  @param: id | image id's **/
/**  @param: class | image classes **/
/**  @return: image tag **/
function responsive_image( $mobile, $desktop, $class ) { ?>
	<?php 
		$alt = get_post_meta( $desktop, '_wp_attachment_image_alt', true) ? get_post_meta( $desktop, '_wp_attachment_image_alt', true) : get_post_meta( $mobile, '_wp_attachment_image_alt', true);
	?>
	<picture>
		<source media="(max-width: 767px)" srcset="<?= wp_get_attachment_image_url( $mobile, 'full' ) ?>" />
		<source media="(min-width: 768px)" srcset="<?= wp_get_attachment_image_url( $desktop, 'full' ) ?>" />
		<img data-src="<?= wp_get_attachment_image_url( $desktop, 'full' ) ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" class="<?= $class ?>" alt="<?= $alt ?>" />
	</picture>

<?php }

/** RESPONSIVE IMAGE **/
/**  @param: id | image id's **/
/**  @param: aspect | 'a16x9 | a1x1 | a4x3' **/
/**  @return: image tag **/
function image( $id, $aspect ) { ?>
	<div class="aspect <?= $aspect ?>">
		<img data-src="<?= wp_get_attachment_image_url( $id, 'full' ) ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="<?= get_post_meta( $id, '_wp_attachment_image_alt', true) ?>">
	</div>
<?php }

/** GET PHONE **/
function get_phone() {
	return get_field('phone_number', 'option') ? '<a href="tel:' . get_field('phone_number', 'option') . '">' . get_field('phone_number', 'option') . '</a>' : null;
}

/** GET EMAIL **/
function get_theme_email() {
	return get_field('email', 'option') ? '<a href="mailto:' . get_field('email', 'option') . '">' . get_field('email', 'option') . '</a>' : null;
  }

/** GET ADDRESS **/
function get_address() {
	return get_field('address', 'option') ? get_field('address', 'option') : null;
}

/** GET FOOTER LOGO **/
function get_footer_logo() {
	return get_field('footer_logo', 'option') ? '<img src="' . get_template_directory_uri() . '/img/placeholder.png" data-src="' . get_field('footer_logo', 'option')['url'] . '" alt="Logo of ' . get_bloginfo('name') . '">' : null;
}

/** GET HEADER LOGO **/
function get_header_logo() {
	return get_field('site_logo', 'option') ? '<img src="' . get_template_directory_uri() . '/img/placeholder.png" data-src="' . get_field('site_logo', 'option')['url'] . '" alt="Logo of ' . get_bloginfo('name') . '">' : the_custom_logo();
}

/**
* Load an inline SVG.
*
* @param string $filename The filename of the SVG you want to load.
*
* @return string The content of the SVG you want to load.
*/
function svg( $filename ) {
 
    // Add the path to your SVG directory inside your theme.
    $svg_path = '/img/';
 
    // Check the SVG file exists
    if ( file_exists( get_stylesheet_directory_uri() . $svg_path . $filename ) ) {
 
        // Load and return the contents of the file
        return file_get_contents( get_stylesheet_directory_uri() . $svg_path . $filename );
    }
 
    // Return a blank string if we can't find the file.
    return '';
}

/**
 * @snippet       Show Cart @ WooCommerce Checkout
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 6
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

//  add_action( 'woocommerce_checkout_before_customer_details', 'bbloomer_cart_on_checkout_page', 11 );

//  function bbloomer_cart_on_checkout_page() {
// 	 echo do_shortcode( '[woocommerce_cart]' );
//  }

/**
 * Remove WooCommerce breadcrumbs 
 */
add_action( 'init', 'my_remove_breadcrumbs' );
 
function my_remove_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

// Remove product images from the shop loop
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

add_action( 'woocommerce_before_shop_loop_item_title','wc_template_loop_product_replaced_thumb', 10 );

function wc_template_loop_product_replaced_thumb() {
	$shop_image = get_field('shop_page_image'); ?>
	<div class="shop--image">
	<img data-src="<?= $shop_image ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
	</div>
<?php }

/** REMOVE WOOCOMMERCE TABS */
add_filter( 'woocommerce_product_tabs', '__return_empty_array', 98 );

/** REMOVE WOOCOMMERCE RELATED PRODUCTS */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/** REMOVE QUANTITY FIELD FOR ALL */
function custom_remove_all_quantity_fields( $return, $product ) {return true;}
add_filter( 'woocommerce_is_sold_individually','custom_remove_all_quantity_fields', 10, 2 );

/** REMOVE SINGLE PRODUCTS */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

add_action( 'woocommerce_single_product_summary', 'custom_title', 5);

function custom_title() { 
	global $product;
	$rating  = $product->get_average_rating();
	$count   = $product->get_rating_count();
	$star    = ceil((int)$rating);	
    $type	 = get_field('food_type');

?>
	<div class="product-info__title">
		<div class="product-info__title--header <?= $type ?>">
			<div class="rating">

				<?php for( $i = 1; $i <= $star; $i++ ): ?>
					<svg id="star_rate_black_24dp" xmlns="http://www.w3.org/2000/svg" width="14.884" height="15" viewBox="0 0 14.884 15">
						<path id="Path_32" data-name="Path 32" d="M13.858,9.692,12.469,5.12a.941.941,0,0,0-1.8,0l-1.4,4.571h-4.2A.943.943,0,0,0,4.517,11.4l3.438,2.456L6.6,18.211A.943.943,0,0,0,8.077,19.24L11.562,16.6l3.485,2.654a.943.943,0,0,0,1.473-1.029L15.17,13.866l3.438-2.456A.942.942,0,0,0,18.06,9.7h-4.2Z" transform="translate(-4.12 -4.447)" fill="#f9cf4f"/>
					</svg>
				<?php endfor ?>
				<span><?= $count ?> <?= $count > 2 ? 'Review' : 'Reviews' ?></span>

			</div>
			<div class="price"><?= $product->get_price_html() ?></div>
		</div>

		<div class="product-info__title-text ">
			<h1 class="module-title"><?= $product->get_title(); ?></h1>
		</div>
	</div>

	<div class="product-info__description <?= $type ?>">
		<?= $product->get_description(); ?>
	</div>

<?php }


/** SINGLE PRODUCT HOOKS */
add_action( 'woocommerce_after_single_product', 'modules', 15);

function modules() {
    get_template_part('blocks/module', 'additional');
    get_template_part('blocks/module', 'badges');
    get_template_part('blocks/module', 'benefits');
    get_template_part('blocks/module', 'text-scroller');
    get_template_part('blocks/module', 'ingredient');
    get_template_part('blocks/module', 'feeding-guide');
    get_template_part('blocks/module', 'comparison-table');
    get_template_part('blocks/module', 'text-banner');
	get_template_part('blocks/module', 'testimonial-slider');
	get_template_part('blocks/module', 'logos-label');
	get_template_part('blocks/module', 'reviews');
    get_template_part('blocks/module', 'text-with-media');
    get_template_part('blocks/module', 'faqs');
}

// Remove SHOP show all results
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

// remove SHOP default sorting
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// remove SHOP title
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

add_action( 'woocommerce_shop_loop_item_title','wc_template_loop_product_replaced_title', 10 );

function wc_template_loop_product_replaced_title() {
	$shop_product_title = get_field('shop_product_title'); ?>
	<h2 class="woocommerce-loop-product__title">
		<?= $shop_product_title ?>
	</h2>
<?php }



/**
*Add View Product to Shop Page
*/
add_action('woocommerce_after_shop_loop_item', 'wptechnic_custom_button_view_product', 10 );
function wptechnic_custom_button_view_product() {
    global $product;

    // Ignore for Variable and Group products
    //if( $product->is_type('variable') || $product->is_type('grouped') ) return;

    // Display the custom button
    echo '<a style="margin-left:5px" class="button button-border" href="' . esc_attr( $product->get_permalink() ) . '">' . __('View product') . '</a>';
}

// REMOVE P tags in Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

// REDIRECT TO NOT FOUND PAGE
function redirect_404_to_custom_page() {
    if (is_404()) {
        wp_redirect(home_url('/not-found/'), 301);
        exit;
    }
}
add_action('template_redirect', 'redirect_404_to_custom_page');
