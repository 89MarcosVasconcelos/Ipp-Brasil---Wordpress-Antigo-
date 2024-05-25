<?php
defined( 'ABSPATH' ) or die();
?>
	
	<?php if ( nanofit_has_sidebar() && is_active_sidebar( nanofit_sidebar_id() ) ): ?>
		<aside class="main-sidebar">
			<div class="main-sidebar-inner">
				<?php dynamic_sidebar( nanofit_sidebar_id() ) ?>
			</div>
		</aside>
		<!-- /.sidebar -->
	<?php endif ?>
