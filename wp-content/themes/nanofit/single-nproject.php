<?php
defined( 'ABSPATH' ) or die();

$featured_background_types = (array) nanofit_option( 'header__titlebar__backgroundFeatured' );
$current_post_type         = nanofit_current_post_type();
$show_featured_image       = ! in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail();

add_filter( 'nanofit_sidebar_id', 'nanofit_single_project_sidebar' );
add_filter( 'nanofit_sidebar_position', 'nanofit_single_project_sidebar_position' );
?>
	<?php get_header() ?>
		<?php if ( have_posts() ): the_post(); ?>

			<article <?php post_class( 'project' ) ?>>
				<?php if ( $show_featured_image ): ?>
					<div class="project-featured-image"><?php the_post_thumbnail( 'post-thumbnail' ) ?></div>
				<?php endif ?>
				
				<div class="project-content">
					<?php the_content() ?>
				</div>

				<?php if ( nanofit_option( 'project__tags' ) == 'on' ): ?>
					<div class="project-tags wrap"><?php echo get_the_term_list( get_the_ID(), 'nproject-tag' ) ?></div>
				<?php endif ?>
			</article>

			<?php if ( nanofit_option( 'project__related' ) == 'on' ): ?>
				<?php get_template_part( 'tmpl/project/related' ) ?>
			<?php endif ?>
		<?php endif ?>
	<?php get_footer() ?>
