<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter
 */

?>
	<footer id="colophon" class="site-footer">
		<div class="footer-main">
			<div class="wrapper">
				<div class="footer-items">
					<div class="footer-content">
						<div class="footer-logo">
							<?= get_footer_logo(); ?>
							<p><?= get_bloginfo('description') ?></p>
						</div>
						<div class="footer-menu">
							<nav id="site-navigation" class="footer-navigation">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'footer',
										'menu_id'        => 'footer-menu',
									)
								);
								?>
							</nav><!-- #site-navigation -->
						</div>
					</div>

					<div class="footer-forms">
						<?= get_template_part('img/trust.svg'); ?>

						<div class="social-media">
							<ul>
								<?php while( have_rows('social_media', 'option') ): the_row(); ?>
									<li><a href="<?= get_sub_field('link') ?>">
										<?php $name = 'icon-' . get_sub_field('platform') . '-white.svg'; ?>
										<?= get_template_part('img/' . $name) ?>
									</a></li>
								<?php endwhile ?>
							</ul>
						</div>

						<div class="newsletter">
							<?= do_shortcode( get_field('newsletter', 'option') ); ?>
						</div>
					</div>
				</div>

				<nav id="site-navigation" class="copyright-navigation">
					<div class="social-media">
						<ul>
							<?php while( have_rows('social_media', 'option') ): the_row(); ?>
								<li><a href="<?= get_sub_field('link') ?>">
									<?php $name = 'icon-' . get_sub_field('platform') . '-white.svg'; ?>
									<?= get_template_part('img/' . $name) ?>
								</a></li>
							<?php endwhile ?>
						</ul>
					</div>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'copyright',
							'menu_id'        => 'copyright-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
		<div class="site-info">
			<a href="<?= home_url(); ?>" class="site-info__logo">
				<span>the bare</span>
				<span>
					<img data-src="<?= get_template_directory_uri() ?>/img/dog-bottom.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
				</span>
				<span>bottom</span>
			</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
