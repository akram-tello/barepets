<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package starter
 */

get_header();

global $post;
$other_args = array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 3, 'post__not_in' => array( $post->ID ));
$other_query = new WP_Query( $other_args );
?>

	<main id="primary" class="site-main single-blog">
		<div class="wrapper">
			<div class="other-articles">
				<div class="other-wrapper">

					<h4>Other Articles</h4>
					<?php if ( $other_query->have_posts() ) : $count = 0; ?>
						<?php while ( $other_query->have_posts() ) : $other_query->the_post(); $count++; ?>
							<?php
							$categories = get_the_category();
							$category = $categories[0]->cat_name;
							$category_link = esc_url( get_category_link( $categories[0]->term_id ) );
							?>
							<div class="other-article-item">
								<?php if($count === 1) : ?>
									<div class="featured-image">
										<img data-src="<?= get_the_post_thumbnail_url(get_the_ID(),'full') ?>" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
									</div>
								<?php endif; ?>
								<div class="info">
									<span class="category"><?= $category ?></span>
									<span class="date"><?= get_the_date('M, d h:i A'); ?></span>
								</div>
								<div class="title">
									<h5><a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a></h5>
								</div>
							</div>
						<?php endwhile; ?>
					<?php else : ?>
						<p>Sorry, no posts matched your criteria.</p>
					<?php endif; ?>
					<?php wp_reset_postdata(); // Restore original Post Data. ?>
					
					<div class="view-all-wrapper">
						<a href="<?= home_url( '/blog/' ) ?>"><span>view all</span><?= get_template_part('img/icon-view-all-arrow.svg')  ?></a>
						
					</div>
				</div>
			</div>
			<div class="current-blog">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					/*the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'starter' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'starter' ) . '</span> <span class="nav-title">%title</span>',
						)
					);*/

					// If comments are open or we have at least one comment, load up the comment template.
					/*if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;*/

				endwhile; // End of the loop.
				?>
			</div>
		</div>

	</main><!-- #main -->

	<section class="article-newsletter">
		<div class="decor-top"></div>
		<div class="wrapper">
			<div class="wrapper">
				<div class="newsletter">
					<div class="newsletter--text">
						<h3 class="heading">sign up and get featured to our newsletter</h3>
						<p class="description">Get an additional 10% OFF when you sign up to our newsletter. Share your experiences, swap stories, and discover the Bare difference together!</p>
					</div>
					<div class="newsletter--form">
						<?= do_shortcode( '[contact-form-7 id="10443dd" title="Newsletter Block"]' ) ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="module module--text-scroller">
    <div class="text-scroller js-text-scroller owl-carousel">
		<div class="text-scroller__item">
			<p>simple. honest. nutritious.</p>
		</div>
		<div class="text-scroller__item">
			<p>simple. honest. nutritious.</p>
		</div>
		<div class="text-scroller__item">
			<p>simple. honest. nutritious.</p>
		</div>
		<div class="text-scroller__item">
			<p>simple. honest. nutritious.</p>
		</div>
		<div class="text-scroller__item">
			<p>simple. honest. nutritious.</p>
		</div>
		<div class="text-scroller__item">
			<p>simple. honest. nutritious.</p>
		</div>
    </div>
	</section>

<?php
//get_sidebar();
get_footer();
