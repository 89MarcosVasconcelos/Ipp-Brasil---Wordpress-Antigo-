<?php
defined( 'ABSPATH' ) or die();

$post_permalink = get_permalink();
$post_target    = '_self';
$post_image     = nanofit_get_image_resized( array(
	'post_id' => get_the_ID(),
	'size'    => nanofit_option( 'blog__archive__imagesize' ),
	'crop'    => nanofit_option( 'blog__archive__imagesizeCrop' ) == 'crop'
) );

if ( get_post_format() == 'link' ) {
	$post_permalink = get_post_meta( get_the_ID(), '_post_link', true );
	$post_target    = get_post_meta( get_the_ID(), '_post_link_target', true );
}
?>
	
	
	<?php if ( has_post_thumbnail() ): ?>
		<div class="post-image">
			<a class="featured-image" href="<?php echo esc_url( $post_permalink ) ?>" target="<?php echo esc_attr( $post_target ) ?>">
				<?php echo nanofit_cleanup( $post_image['thumbnail'] ); ?>
			</a>
		</div>
	<?php endif ?>
	
