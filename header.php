<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Font Awesome Icons -->
	<script src="https://use.fontawesome.com/872d49b404.js"></script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'starter' ); ?></a>

	<?php if( have_rows('announcements', 'option') ): ?>
		<aside class="announcements">
			<div class="wrapper">
				<div class="announcement js-announcement owl-carousel">
					<?php while( have_rows('announcements', 'option') ): the_row(); ?>
						<div class="announcement--item">
							<p><?= get_sub_field('announcement') ?></p>
						</div>
					<?php endwhile ?>
				</div>
			</div>
		</aside>
	<?php endif ?>
	<header id="masthead" class="site-header">
		<div class="site-branding wrapper">
			<div class="header--main">
				<div class="header--mobile">
					<span class="mobile-menu js-mobile-open"><?= svg('icon-facebook.svg') ?></span>
				</div>
				<div class="header--branding">
					<div class="header-logo"><a href="<?= home_url() ?>"><?= get_header_logo(); ?></a></div>
					<div class="header-menu">
						<nav id="site-navigation" class="main-navigation">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</nav><!-- #site-navigation -->
					</div>
				</div>

				<div class="header---buttons">
					<nav id="button-navigation" class="button-navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'button',
								'menu_id'        => 'button-menu',
							)
						);
						?>

						<div class="cart--counter">
							<a class="cart--icon" aria-current="page" href="/cart"><?= get_template_part('img/cart-header.svg') ?> 
								<span class="items-count"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
							</a>
						</div>
					</nav><!-- #site-navigation -->
					
				</div>
			</div>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div class="mobile-navigation">
		<span class="js-mobile-close"></span>
		<?= get_header_logo(); ?>
		<nav id="site-navigation" class="mobile-nav">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'mobile',
					'menu_id'        => 'mobile-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->

		<div class="socials">
			<div class="socials-login">
				<a href="/my-account"><?= get_template_part('img/icon-puppy.svg') ?><span>Account</span></a>
			</div>
			<div class="socials-media">
				<ul>
					<?php while( have_rows('social_media', 'option') ): the_row(); ?>
						<li><a href="<?= get_sub_field('link') ?>">
							<?php $name = 'icon-' . get_sub_field('platform') . '.svg'; ?>
							<?= get_template_part('img/' . $name) ?>
						</a></li>
					<?php endwhile ?>
				</ul>
			</div>
		</div>
	</div>

<div id="page" class="site">
	
