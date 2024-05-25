<?php
defined( 'ABSPATH' ) or die();

$featured_background_types = (array) nanofit_option( 'header__titlebar__backgroundFeatured' );
$current_post_type         = nanofit_current_post_type();
$show_featured_image       = ! in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail();
?>

<article id="post-<?php the_ID() ?>" <?php post_class( 'post' ) ?>>
	<div class="post-thumbnail"><?php the_post_thumbnail( 'post-thumbnail' ) ?></div>
	<div class="post-content" itemprop="text">
		<?php the_content() ?>

		<?php
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nanofit' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		) );
		?>
	</div>

	<?php if ( nanofit_option( 'blog__single__postAuthor' ) == 'on' ): ?>
		<?php get_template_part( 'tmpl/post/content-author' ) ?>
	<?php endif ?>
</article>
<!-- /#post-<?php echo get_the_ID() ?> -->