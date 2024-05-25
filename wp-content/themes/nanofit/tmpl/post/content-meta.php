<?php
defined( 'ABSPATH' ) or die();
?>

<div class="post-meta">
	<?php echo get_avatar( get_the_author_meta( 'ID' ), 45 ); ?>
	<div class="post-meta-data">
		<div class="post-author">
			<span><?php esc_html_e( 'Posted by', 'nanofit' ) ?></span>
			<span class="post-name">
				<?php the_author_posts_link() ?>
			</span>	
		</div>
		<div class="post-date">
			<span><?php esc_html_e( 'on', 'nanofit' ) ?></span>
			<span><?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?></span>
		</div>
	</div>
</div>