<?php
defined( 'ABSPATH' ) or die();
?>

<article id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
	<div class="post-inner">
		<?php get_template_part( 'tmpl/post/content-featured', get_post_format() ) ?>

		<header class="post-header">
			<div class="post-categories">
				<?php the_category( _x( ' ', 'Used between list items, there is a space after the comma.', 'nanofit' ) ) ?>
			</div>
			<?php get_template_part( 'tmpl/post/content-title' ) ?>
		</header>

		<div class="post-content">
			<?php
			nanofit_the_content( false );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nanofit' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		</div>

		<footer class="post-footer">
			<?php if ( nanofit_option( 'blog__archive__postMeta' ) == 'on' ): ?>
				<?php get_template_part( 'tmpl/post/content-meta' ) ?>
			<?php endif ?>	

			<?php if ( nanofit_option( 'blog__archive__readmore' ) === 'on' ): ?>
				<?php get_template_part( 'tmpl/post/content-readmore' ) ?>
			<?php endif ?>
		</footer>
	</div>
</article>