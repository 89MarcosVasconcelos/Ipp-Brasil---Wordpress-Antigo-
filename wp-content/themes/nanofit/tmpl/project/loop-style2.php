<?php
defined( 'ABSPATH' ) or die();

$options          = array( 'itemSelector' => '.project' );
$meta_information = (array)nanofit_option( 'projects__meta' );
?>

	<?php if ( have_posts() ): ?>
		<?php get_template_part( 'tmpl/project/filter' ) ?>
		
		<div class="content-inner" data-grid="<?php echo esc_attr( json_encode( $options ) ) ?>" data-columns="<?php echo esc_attr( nanofit_option( 'projects__gridColumns' ) ) ?>">
			<?php while ( have_posts() ): the_post(); ?>

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

						<?php if ( nanofit_option( 'projects__readmore' ) == 'on' ): ?>
							<a class="project-readmore button white" href="<?php the_permalink() ?>"><span><?php esc_html_e( 'View Detail', 'nanofit' ) ?></span></a>
						<?php endif ?>
					</div>
				</article>

			<?php endwhile ?>
		</div>

		<?php nanofit_pagination() ?>
	<?php else: ?>
		<!-- Show empty message -->
	<?php endif ?>
