<?php
defined( 'ABSPATH' ) or die();

$sliding_menu_options = array(
	'theme_location'  => 'sliding',
	'container'       => false,
	'menu_class'      => 'menu menu-sliding',
	'fallback_cb'     => false,
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0
);

?>

<?php if ( is_active_sidebar( 'off-canvas-left' ) ): ?>
	<div id="off-canvas-left" class="off-canvas off-canvas-left">
		<div class="off-canvas-wrap wrap">
			<a href="javascript:;" data-target="off-canvas-left" class="off-canvas-toggle">
				<span></span>
			</a>
			<?php dynamic_sidebar( 'off-canvas-left' ) ?>
		</div>
	</div>
<?php endif ?>


	<div id="off-canvas-right" class="off-canvas sliding-menu">
		<div class="off-canvas-wrap">
			<a href="javascript:;" data-target="off-canvas-right" class="off-canvas-toggle">
				<span></span>
			</a>
			<?php wp_nav_menu( $sliding_menu_options ) ?>
		</div>
	</div>