<?php
defined( 'ABSPATH' ) or die();
?>

	<?php get_header() ?>
		<?php if ( have_posts() ): the_post(); ?>
			<div class="content" role="main">
				<?php the_content() ?>

				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nanofit' ) . '</span>',
					'after'  => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
				?>
			</div>
			<!-- /.content -->

			<?php nanofit_comments_list() ?>
		<?php endif ?>
	<?php get_footer() ?>
