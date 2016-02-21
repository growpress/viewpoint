<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package viewpoint
 */

?>

	</div><!-- #content -->

	<div class="footer-wrap" role="contentinfo">
		<footer id="colophon" class="site-footer">
			<div class="row">
				<div class="large-4 columns widget-area">
				<?php if ( is_active_sidebar( 'footer-first' ) ) { ?>

					<?php dynamic_sidebar( 'footer-first' ); ?>

				<?php } ?>
				</div><!-- .widget-area -->

				<div class="large-4 columns widget-area">
				<?php if ( is_active_sidebar( 'footer-second' ) ) { ?>

					<?php dynamic_sidebar( 'footer-second' ); ?>

				<?php } ?>
				</div><!-- .widget-area -->

				<div class="large-4 columns widget-area">
				<?php if ( is_active_sidebar( 'footer-third' ) ) { ?>

					<?php dynamic_sidebar( 'footer-third' ); ?>

				<?php } ?>
				</div><!-- .widget-area -->
			</div><!-- .row -->
			
			<div class="row">
				<div class="large-12 columns">
					<div class="site-copyright">
					<?php
						$footer_copyright = get_theme_mod( 'footer_copyright', customizer_library_get_default( 'footer_copyright' ));

						echo wp_kses( $footer_copyright,
							array(
								'strong' => array(),
								'a' => array(
								'href' => array(),
								'title' => array()
								),
							)
						);
					?>
					</div><!-- .site-copyright -->
				</div><!-- .columns -->
			</div><!-- .row -->
		</footer><!-- #colophon -->
	</div><!-- .footer-wrap -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
