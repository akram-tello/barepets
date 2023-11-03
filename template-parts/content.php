<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package starter
 */

?>

<?php
$categories = get_the_category();
$tags = get_the_tags();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php starter_post_thumbnail(); ?>

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		/*if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				starter_posted_on();
				starter_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; */?>
	</header><!-- .entry-header -->

	<div class="article-info">
		<div class="date">
			<p class="label">Date</p>
			<p class="info"><?= get_the_date('d F Y') ?></p>
		</div>
		<?php if($categories) : ?>
		<div class="category">
			<p class="label">Category</p>
			<p class="info">
			<?php foreach($categories as $key => $category) : ?>
				<?php if ($key === array_key_last($categories)) : ?>
				<span><?= $category->name ?></spam>
				<?php else : ?>
				<span><?= $category->name ?>, </spam>
				<?php endif; ?>
			<?php endforeach; ?>
			</p>
		</div>
		<?php endif; ?>
	</div>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'starter' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'starter' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<div class="tags">
		<div class="label">Tags</div>
		<?php if($tags) { ?>
		<div class="tag-list">
			<?php foreach($tags as $key => $tag) { ?>
				<?php if ($key === array_key_last($tags)) : ?>
				<span><?= $tag->name ?></span>
				<?php else : ?>
				<span><?= $tag->name ?>, </span>
				<?php endif; ?>
			<?php } ?>
		</div>
		<?php } ?>
	</div>

	<!-- <footer class="entry-footer">
		<?php starter_entry_footer(); ?>
	</footer> -->
</article><!-- #post-<?php the_ID(); ?> -->