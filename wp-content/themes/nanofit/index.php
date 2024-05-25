<?php
defined( 'ABSPATH' ) or die();

add_filter( 'nanofit_body_class', 'nanofit_blog_body_class' );
add_filter( 'nanofit_sidebar_id', 'nanofit_blog_sidebar' );
add_filter( 'nanofit_sidebar_position', 'nanofit_blog_sidebar_position' );
?>

	<?php get_header() ?>
		<?php if ( have_posts() ): ?>
			<?php get_template_part( 'tmpl/post/loop', nanofit_option( 'blog__archive__style' ) ) ?>
		<?php else: ?>
			<?php get_template_part( 'tmpl/post/content', 'none' ) ?>
		<?php endif ?>
	<?php get_footer(); ?>
