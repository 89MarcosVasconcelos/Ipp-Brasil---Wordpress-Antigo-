<?php
defined( 'ABSPATH' ) or die();
?>
	
	<?php if ( have_posts() ): ?>
		<?php while ( have_posts() ): the_post(); ?>
			<article id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
				<header class="post-header">
					<?php get_template_part( 'tmpl/post/content-title' ) ?>

					<?php if ( nanofit_option( 'blog__archive__postMeta' ) == 'on' ): ?>
						<?php get_template_part( 'tmpl/post/content-meta' ) ?>
					<?php endif ?>	
				</header>

				<?php get_template_part( 'tmpl/post/content-featured', get_post_format() ) ?>

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
					<div class="post-categories">
						<span><?php esc_html_e( 'In:', 'nanofit' ) ?></span>
						<?php the_category( _x( ', ', 'Used between list items, there is a space after the comma.', 'nanofit' ) ) ?>
					</div>
				</footer>
			</article>
		<?php endwhile ?>
	<?php else: ?>
		<?php get_template_part( 'tmpl/post/content-none' ) ?>
	<?php endif ?>
	
	<?php nanofit_pagination() ?>	