<?php
defined( 'ABSPATH' ) or die();

$classes = array( 'footer-copyright' );

if ( nanofit_option( 'footer__copyright__full' ) == 'on' ) {
	$classes[] = 'footer-copyright-full';
}
?>

<?php if ( nanofit_option( 'footer__copyright' ) == 'on' ): ?>
	<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
		<div class="footer-copyright-inner wrap">
			<?php if ( nanofit_option( 'global__misc__gotop' ) == 'on' ): ?>
				<div class="go-to-top">
					<a href="javascript:;"><span><?php echo esc_html__( 'Go to Top', 'nanofit' ) ?></span></a>
				</div>
			<?php endif ?>

			<div class="copyright-bar">
				<div class="copyright-content">
					<?php echo nanofit_cleanup( nanofit_option( 'footer__copyright__content' ) ) ?>
				</div>

				<?php nanofit_social_icons( array( 'location' => 'footer' ) ) ?>
			</div>
		</div>
	</div>
	<?php endif ?>