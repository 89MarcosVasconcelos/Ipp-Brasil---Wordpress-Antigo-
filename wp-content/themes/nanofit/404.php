<?php
defined( 'ABSPATH' ) or die();
?>

<?php get_header() ?>
<div class="content-404">
	<?php get_search_form(); ?>
	<div class="content-404-inner">
		<p><?php esc_html_x( 'The page you were looking for is not here. Maybe you want to perform a search?', 'frontend', 'nanofit' ); ?></p>
	</div>
</div>
<!-- /.content-inner -->
<?php get_footer() ?>