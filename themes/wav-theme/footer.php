<?php
/**
 * The template for displaying the footer.
 *
 * @package WAV_Starter_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
				<p>Copy Right 2018 Wild About Vancouver<p>
				</div><!-- .site-info -->
				
				<?php	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
					return;
				}
				?>

				<div id="secondary" class="widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div><!-- #secondary -->

			</footer><!-- #colophon -->

		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
