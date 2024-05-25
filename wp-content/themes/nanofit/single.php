<?php
defined( 'ABSPATH' ) or die();

add_filter( 'nanofit_sidebar_id', 'nanofit_single_sidebar' );
add_filter( 'nanofit_sidebar_position', 'nanofit_single_sidebar_position' );
?>

<?php if ( have_posts() ): the_post(); ?>

	<?php get_header() ?>
		<!-- The main content -->
		<?php get_template_part( 'tmpl/post/content', 'single' ) ?>

		<?php nanofit_related_posts() ?>
		<?php nanofit_comments_list() ?>

	<?php get_footer() ?>

<?php endif ?>	
