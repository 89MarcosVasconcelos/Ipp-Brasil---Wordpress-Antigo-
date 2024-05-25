<?php
defined( 'ABSPATH' ) or die();

$next_post = get_next_post();
$prev_post = get_previous_post();
$post_type = get_post_type_object( get_post()->post_type );

if ( ! $next_post && ! $prev_post ) {
	return;
}
?>

<nav class="navigation post-navigation" role="navigation">
	<ul class="nav-links">
		<?php if ( is_attachment() ): ?>
			<?php previous_post_link( '<li>%link</li>', sprintf( '<span class="meta-nav">%s</span> %%title', esc_html__( 'Published In', 'nanofit' ) ) ); ?>
		<?php else: ?>

			<?php if ( $prev_post ): ?>
				<li class="prev-post">
					<a href="<?php echo get_permalink( $prev_post ) ?>">
						<span class="meta-nav"><?php esc_html_e( 'Previous Post', 'nanofit' ) ?></span>
						<span class="post-title"><?php echo nanofit_cleanup( $prev_post->post_title ) ?></span>
					</a>
				</li>
			<?php else: ?>
				<li class="prev-post disabled"></li>
			<?php endif ?>

			<?php if ( $next_post ): ?>
				<li class="next-post">
					<a  href="<?php echo get_permalink( $next_post ) ?>">
						<span class="meta-nav"><?php esc_html_e( 'Next Post', 'nanofit' ) ?></span>
						<span class="post-title"><?php echo nanofit_cleanup( $next_post->post_title ) ?></span>
					</a>
				</li>
			<?php else: ?>
				<li class="next-post disabled"></li>
			<?php endif ?>

		<?php endif; ?>
	</ul><!-- .nav-links -->
</nav><!-- .navigation -->