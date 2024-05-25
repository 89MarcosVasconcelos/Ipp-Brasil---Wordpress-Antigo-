<?php
defined( 'ABSPATH' ) or die();

// The menu settings
$primary_menu_args = array(
	'theme_location'  => 'primary',
	'container'       => false,
	'menu_class'      => 'menu menu-primary',
	'fallback_cb'     => 'nanofit_page_menu',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0
);

$contact_info           = nanofit_option( 'header__info__text' );
$header_nav_extras      = nanofit_option( 'header__extras' );
$sliding_sidebarLable   = nanofit_option( 'sliding__sidebarLable' );

$header_classes         = array( 'site-header' );
$header_classes[]       = sprintf( 'header-%s', nanofit_option( 'header__style' ) );

$header_style = nanofit_option( 'header__style' );

$current_post = get_queried_object();

if ($current_post instanceof WP_Post) {
	/**
	 * Override layout and alignment settings for the specific entry
	 */
	$_header_style = get_field( 'headerStyles', $current_post->ID );
}

if ( isset( $_header_style ) && $_header_style != 'default' ) {
	$header_style = $_header_style;
}

$header_classes = array(
	"site-header",
	"header-{$header_style}"
);

if ( nanofit_option( 'header__width' ) === 'on' ) {
	$header_classes[] = 'header-full';
}

if ( nanofit_option( 'header__shadow' ) === 'on' ) {
	$header_classes[] = 'header-shadow';
}

if ( nanofit_option( 'header__transparent' ) === 'on' ) {
	$header_classes[] = 'header-transparent';
}

?>

<?php if ( nanofit_option( 'header__topbar' ) === 'on' ): ?>
	<?php get_template_part( 'tmpl/header-topbar' ); ?>
<?php endif ?>

<div id="site-header" class="<?php echo esc_attr( join( ' ', $header_classes ) ) ?>">
	<div class="site-header-inner wrap">
		<div class="header-brand">
			<a href="<?php echo esc_attr( site_url() ) ?>">
				<?php nanofit_logo( nanofit_option( 'header__logo' ) ) ?>
			</a>	
		</div>

		<nav class="navigator" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
			<?php if ( is_active_sidebar( 'off-canvas-left' ) ): ?>
				<a href="javascript:;" data-target="off-canvas-left" class="off-canvas-toggle">
					<span><?php echo nanofit_cleanup( $sliding_sidebarLable ) ?></span>
				</a>
			<?php endif; ?>
			
			<?php if ( has_nav_menu( 'primary' ) ): ?>
				<?php wp_nav_menu( $primary_menu_args ) ?>
			<?php endif ?>
		</nav>
		
		<div class="extras">
			<?php if ( ! empty( $contact_info ) ): ?>
				<div class="header-info-text">
					<?php echo do_shortcode( $contact_info ) ?>
				</div>
			<?php endif ?>

			<?php if ( ! empty( $header_nav_extras ) ): ?>
				<ul class="navigator menu-extras">
					<?php foreach ( $header_nav_extras as $type ): ?>
						<?php get_template_part( 'tmpl/header-icon', $type ); ?>
					<?php endforeach ?>
				</ul>
			<?php endif ?>

			<?php nanofit_social_icons( array( 'location' => 'nav' ) ) ?>

			<?php if ( has_nav_menu( 'sliding' ) ): ?>
				<?php get_template_part( 'tmpl/header-sliding-toggle' ) ?>
			<?php endif ?>	
		</div>
	</div>
	<!-- /.site-header-inner -->
</div>
<!-- /.site-header -->

<?php if ( nanofit_option( 'header__sticky' ) === 'on' ): ?>
	<?php get_template_part( 'tmpl/header-sticky' ); ?>
	<?php endif ?>