<?php
defined( 'ABSPATH' ) or die();


$layout    = nanofit_option( 'header__titlebar' );
$alignment = nanofit_option( 'header__titlebar__align' );

$current_post = get_queried_object();

if ($current_post instanceof WP_Post) {
	/**
	 * Override layout and alignment settings for the specific entry
	 */
	$_layout = get_field( 'titlebarLayout', $current_post->ID );
	$_alignment = get_field( 'titlebarAlign', $current_post->ID );
}

if ( isset( $_layout ) && $_layout != 'default' ) {
	$layout = $_layout;
}

if ( isset( $_alignment ) && $_alignment != 'default' ) {
	$alignment = $_alignment;
}

if ( ( is_front_page() && nanofit_option( 'header__titlebar__home' ) == 'off' ) || $layout == 'none' ) {
	return;
}

$classes = array(
	"content-header",
	"content-header-{$alignment}"
);

if ( is_singular() ) {
	$featured_background_types = (array) nanofit_option( 'header__titlebar__backgroundFeatured' );
	$current_post_type         = nanofit_current_post_type();


	if ( in_array( $current_post_type, $featured_background_types ) && has_post_thumbnail( $current_post->ID ) ) {
		$classes[] = 'content-header-featured';
	}
}

?>

<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
	<div class="content-header-inner wrap">
		<?php if ( is_single( $post ) && $post->post_type == 'nproject' ): ?>
			<?php if ( $client_image_id = get_field( 'projectClientLogo', get_post() ) ): ?>
				<div class="project-client-info">
					<?php if ( $accent_color = get_field( 'projectAccentColor' ) ): ?>
						<span class="project-client-color" style="background-color: <?php echo esc_attr( $accent_color ) ?>;">
							<?php echo esc_html( $accent_color ) ?>
						</span>
					<?php endif ?>

					<?php
						$image = nanofit_get_image_resized( array(
							'image_id' => $client_image_id,
							'size'     => 'full'
						) );

						echo wp_kses_post( $image['thumbnail'] );
					?>
				</div>
			<?php endif ?>
		<?php endif ?>
				
		<?php if ( function_exists( 'bcn_display' ) && in_array( $layout, array( 'both', 'breadcrumbs' ) ) ): ?>
			<div class="breadcrumbs">
				<div class="breadcrumbs-inner">
					<?php bcn_display() ?>
				</div>
			</div>
		<?php endif ?>
		
		<div class="page-title-wrap">
			<?php if ( in_array( $layout, array( 'both', 'title' ) ) ): ?>
				<div class="page-title">
					<?php nanofit_header_page_title() ?>
				</div>

				<?php if ( is_single( $post ) && $post->post_type == 'post' ): ?>
					<?php if ( nanofit_option( 'blog__single__postMeta' ) == 'on' ): ?>
						<div class="metaData">
							<?php get_template_part( 'tmpl/post/content-meta' ) ?>

							<div class="metaBottom">
								<div class="post-categories">
									<span><?php esc_html_e( 'In:', 'nanofit' ) ?></span>
									<?php the_category( _x( ', ', 'Used between list items, there is a space after the comma.', 'nanofit' ) ) ?>
								</div>

								<?php if ( nanofit_option( 'blog__single__postTags' ) == 'on' ): ?>
									<div class="post-tags"><?php the_tags( '', '' ); ?></div>
								<?php endif ?>
							</div>
						</div>
				<?php endif ?>

				<?php wp_reset_postdata() ?>

			<?php endif ?>
		<?php endif ?>
	    </div>

		<?php if ( nanofit_option( 'header__titlebar__scrolldown' ) == 'on' ): ?>
		<div  class="down-arrow">
			<a href="javascript:;">
				<span><?php esc_html_e( 'Scroll Down', 'nanofit' ) ?></span>
			</a>
		</div>
	<?php endif ?>
	</div>

	<?php if ( is_single( $post ) && $post->post_type == 'post' ): ?>
		<?php if ( nanofit_option( 'blog__single__postNav' ) == 'on' ): ?>
			<?php get_template_part( 'tmpl/post/content-navigator' ) ?>
		<?php endif ?>
	<?php endif ?>

	<?php if ( is_single( $post ) && $post->post_type == 'nproject' ): ?>
		<?php if ( nanofit_option( 'project__pagination' ) == 'on' ): ?>
			<?php get_template_part( 'tmpl/post/content-navigator' ) ?>
		<?php endif ?>
	<?php endif ?>
</div>
