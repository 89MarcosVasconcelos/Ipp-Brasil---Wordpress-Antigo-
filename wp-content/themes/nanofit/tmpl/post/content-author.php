<?php
defined( 'ABSPATH' ) or die();

if ( ! ( $author_id = get_the_author_meta( 'ID' ) ) ) {
	$author_id = get_query_var( 'author' );
}

$author_description = get_the_author_meta( 'description', $author_id );
?>

<?php if ( ! empty( $author_description ) ): ?>
<div class="post-author-box" itemprop="author" itemscope="itemscope" itemtype="https://schema.org/Person">
	<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
	<div class="post-author-content">
		<div class="author-data">
			<span><?php esc_html_e( 'Author:', 'nanofit' ) ?></span>
			<span class="author-name">
				<?php the_author_posts_link() ?>
			</span>	
		</div>
		<div class="author-description">
			<?php echo nanofit_cleanup( $author_description ) ?>
		</div>
	</div>
</div>

<?php endif ?>