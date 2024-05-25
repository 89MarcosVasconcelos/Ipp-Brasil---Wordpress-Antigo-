<?php
defined( 'ABSPATH' ) or die();

global $wp_query;

$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
$index = 1 + ( ( $paged - 1 ) * $wp_query->query_vars['posts_per_page'] );
?>

<?php get_header() ?>

<?php if ( have_posts() ): ?>
	<?php get_search_form() ?>

	<div class="search-results">
		<?php while ( have_posts() ): the_post(); ?>
			<article <?php post_class( 'post' ) ?> id="post-<?php echo esc_attr( get_the_ID() ) ?>">
				<a href="<?php the_permalink() ?>">
					<span class="post-index">
						<?php echo (int) $index++ ?>
					</span>
					<p class="post-title">
						<span class="post-title-inner"><?php the_title() ?></span>
						<span class="post-date"><?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?></span>		
					</p>
					
				</a>
			</article>
		<?php endwhile ?>
	</div>
	
	<?php nanofit_pagination() ?>
	<?php else: ?>
		<div class="search-no-results">
			<p><?php esc_html_x( 'Sorry, no posts matched your criteria. Please try another search', 'frontend', 'nanofit' ) ?></p>
		</div>

		<?php get_search_form() ?>
		
		<p class="titleTag"><?php esc_html_e( 'Search for tagged:', 'nanofit' ) ?></p>
		<div class="wp-block-tag-cloud">
			<?php
			$tags = get_tags();
			foreach ( $tags as $tag ) :
				$tag_link = get_tag_link( $tag->term_id );
				?>
				<a href='<?php echo esc_attr( $tag_link ); ?>' title='<?php echo esc_attr( $tag->name ); ?>' class='<?php echo esc_attr( $tag->slug ) ?>'><?php echo esc_html( $tag->name ) ?></a>
				
				<?php
			endforeach;
			?>
		</div>
	<?php endif ?>

	<?php get_footer() ?>