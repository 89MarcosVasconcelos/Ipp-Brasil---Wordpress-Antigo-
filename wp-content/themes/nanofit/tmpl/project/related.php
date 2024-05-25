<?php

/**
 * Prevent direct access to this file
 */
defined( 'ABSPATH' ) or die();

$options          = array( 'itemSelector' => '.project' );
$meta_information = (array)nanofit_option( 'projects__meta' );

/**
 * Ignore render related box when it's disabled
 */
if ( ! is_singular( 'nproject' ) ) {
	return;
}

// Query args
$args = array(
	'post_type'      => 'nproject',
	'posts_per_page' => nanofit_option( 'project__related__count', 4 ),
	'post__not_in'   => array( get_the_ID() )
);

$related_item_type = nanofit_option( 'project__related__type' );

// Filter by tags
if ( 'tag' == $related_item_type ) {
	if ( ! ( $terms = get_the_terms( get_the_ID(), nProjects::TYPE_TAG ) ) )
		return;

	$args['tax_query'] = array(
		'taxonomy' => nProjects::TYPE_TAG,
		'field'    => 'term_id',
		'terms'    => wp_list_pluck( $terms, 'term_id' )
	);
}
// Filter by categories
elseif ( 'category' == $related_item_type ) {
	if ( ! ( $terms = get_the_terms( get_the_ID(), nProjects::TYPE_CATEGORY ) ) )
		return;

	$args['tax_query'] = array(
		'taxonomy' => nProjects::TYPE_CATEGORY,
		'field'    => 'term_id',
		'terms'    => wp_list_pluck( $terms, 'term_id' )
	);
}
// Show random items
elseif ( 'random' == $related_item_type ) {
	$args['orderby'] = 'rand';
}
// Show latest items
elseif ( 'recent' == $related_item_type ) {
	$args['order'] = 'DESC';
	$args['orderby'] = 'date';
}

// Create the query instance
$query = new WP_Query( $args );
$widget_title = nanofit_option( 'project__related__title' );

if ( $query->have_posts() ): ?>

	<div class="projects-related wrap projects-style2">
		<?php if ( ! empty( $widget_title ) ): ?>
			<h3 class="projects-related-title">
				<?php echo esc_html( $widget_title ) ?>
			</h3>
		<?php endif ?>

		<div class="projects-related-wrap" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( nanofit_option( 'projects__related__gridColumns' ) ) ?>">
			<?php while ( $query->have_posts() ): $query->the_post(); ?>

				<article <?php post_class( 'project' ) ?> itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
					<div class="project-inner">
						<figure class="project-thumbnail">
							<div class="project-client-info">
								<?php if ( $accent_color = get_field( 'projectAccentColor' ) ): ?>
									<span class="project-client-color" style="background-color: <?php echo esc_attr( $accent_color ) ?>;">
										<?php echo esc_html( $accent_color ) ?>
									</span>
								<?php endif ?>
								
								<?php if ( $client_image_id = get_field( 'projectClientLogo', get_post() ) ): ?>
									<?php
										$image = nanofit_get_image_resized( array(
											'image_id' => $client_image_id,
											'size'     => 'full'
										) );

										echo wp_kses_post( $image['thumbnail'] );
									?>		
								<?php endif ?>
							</div>
							<a href="<?php the_permalink() ?>">
								<?php
									$image = nanofit_get_image_resized( array(
										'post_id' => get_the_ID(),
										'size'    => nanofit_option( 'projects__imagesize' ),
										'crop'    => nanofit_option( 'projects__imagesizeCrop' ) == true
									) );

									echo nanofit_cleanup( $image['thumbnail'] );
								?>
							</a>
						</figure>

						<h2 class="project-title" itemprop="name headline">
							<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
						</h2>

						<?php if ( nanofit_option( 'projects__excerpt' ) == 'on' ): ?>
							<div class="project-summary">
								<?php the_excerpt() ?>
							</div>
						<?php endif ?>
					</div>
				</article>

			<?php endwhile ?>
		</div>
	</div>

<?php endif ?>
