<?php
defined( 'ABSPATH' ) or die();

$sliding_menuLable      = nanofit_option( 'sliding__menuLable' );

?>

<?php // if ( has_nav_menu( 'sliding' ) ): ?>
	<a href="javascript:;" data-target="off-canvas-right" class="off-canvas-toggle">
		<span><?php echo nanofit_cleanup( $sliding_menuLable ) ?></span>
	</a>
<?php // endif; ?>