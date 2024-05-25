<?php
defined( 'ABSPATH' ) or die();
?>
						</main>
						<!-- /.main-content -->

						<?php get_sidebar() ?>
					</div>
					<!-- /.content-body-inner -->
				</div>
				<!-- /.content-body -->			
			</div>
			<!-- /.site-content -->

			<div id="site-footer" class="site-footer">
				<?php get_template_part( 'tmpl/footer-content' ) ?>	
				<?php get_template_part( 'tmpl/footer-widgets' ) ?>
				<?php get_template_part( 'tmpl/footer-copyright' ) ?>
			</div>
			<!-- /#site-footer -->

			<?php get_template_part( 'tmpl/off-canvas' ) ?>
		</div>
		<!-- /.site-wrapper -->
		<?php wp_footer() ?>
	</body>
</html>
