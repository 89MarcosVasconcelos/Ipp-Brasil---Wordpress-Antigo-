<?php
defined( 'ABSPATH' ) or die();

$queried_object = get_queried_object();
?>
	<div class="post-video post-image">
		<?php if ( is_single() && $queried_object instanceOf WP_Post && $queried_object->ID === get_the_ID() ): ?>
			<div class="post-video-player">
				<?php echo wp_oembed_get( get_post_meta( get_the_ID(), '_post_video_oembed', true ), array( 'width' => '760' ) ); ?>
			</div>
		<?php elseif ( has_post_thumbnail() ): ?>
			<div class="post-video-thumbnail">
				<a class="featured-image" href="<?php echo esc_url( get_permalink() ) ?>">
					<?php if ( nanofit_option( 'blog__archive__readmore' ) === 'on' ): ?>
						<?php get_template_part( 'tmpl/post/content-readmore' ) ?>
					<?php endif ?>
					<?php
						$post_image = nanofit_get_image_resized( array(
							'post_id' => get_the_ID(),
							'size'    => nanofit_option( 'blog__archive__imagesize' ),
							'crop'    => nanofit_option( 'blog__archive__imagesizeCrop' ) == 'crop'
						) );
						
						echo nanofit_cleanup( $post_image['thumbnail'] );
					?>
				</a>
			</div>
		<?php endif ?>
	</div>