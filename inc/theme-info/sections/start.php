<?php
/**
 * Welcome screen getting started template
 */
?>
<?php
$viewpoint = wp_get_theme( 'viewpoint' );
$viewpoint_uri = $viewpoint->get( 'ThemeURI' );

// get theme customizer url
$url 	= admin_url() . 'customize.php?';
$url 	.= 'url=' . urlencode( site_url() . '?viewpoint-customizer=true' );
$url 	.= '&return=' . urlencode( admin_url() . 'themes.php?page=viewpoint-welcome' );
$url 	.= '&viewpoint-customizer=true';
?>
<div id="getting_started" class="col one-col panel">

	<div class="getting-started-intro">

		<h3><?php _e( 'Getting Started With viewpoint', 'viewpoint' ); ?> </h3>
		<p><?php _e( 'We\'ve purposely kept viewpoint clean and fast but packed full of customization options so setup is a breeze. Here are some common tasks to get you started:', 'viewpoint' ); ?></p>

	</div><!-- .getting-started-intro -->

	<div class="getting-started-content">

		<div class="content-section">

			<!-- Install Recommended Plugins -->
			<h3><?php _e( '1. Install Recommended Plugins' ,'viewpoint' ); ?></h3>
			<p><?php _e( 'Although viewpoint works fine as a standalone WordPress theme, there are a few recommended plugins.', 'viewpoint' ); ?></p>
			<p>
				<?php
					printf( 'Once the plugins are installed, be sure to <a href="%s"> activate them </a>:',
					esc_url( self_admin_url( 'plugins.php' ) )
					);
				?>
			</p>

			<?php
				$plugins = array();
				/**
				 * List our plugins
				 */
				$plugins = array (
					array(
						'name' => 'Rescue Shortcodes',
						'slug' => 'rescue-shortcodes',
						'dir'	 => 'rescue-shortcodes'
					),
					array(
						'name' => 'Jetpack',
						'slug' => 'jetpack',
						'dir'	 => 'jetpack'
					),
					array(
						'name' => 'Mailbag',
						'slug' => 'mailbag',
						'dir'	 => 'mailbag'
					),
					array(
						'name' => 'Give',
						'slug' => 'give',
						'dir'	 => 'give'
					),
				);

				/**
				 * Loop through plugins
				 */
				foreach ( $plugins as $plugin ) {

					$plugin_name = $plugin['name'];
					$plugin_slug = $plugin['slug'];
					$plugin_dir  = $plugin_slug . '/' . $plugin['dir'] . '.php';

					echo "<p>";

					/**
					 * Plugin Button
					 */
					if ( ! is_plugin_active( $plugin_dir ) ) {

		 			  printf( '<a href="%s" class="button button-primary" aria-label="%s">%s</a>',
							esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin='. $plugin_slug .'' ), 'install-plugin_'. $plugin_slug .'' ) ),
							esc_attr( sprintf( __( 'Install plugin %s', 'viewpoint' ), $plugin_name ) ),
							esc_attr( sprintf( __( '%s (Not active)', 'viewpoint' ), $plugin_name ) )
						);

					} else {

						printf( '<a href="%s" class="button" aria-label="%s">%s<span class="dashicons dashicons-yes"></span></a>',
							esc_url( self_admin_url( 'plugins.php?plugin_status=active' ) ),
							esc_attr( sprintf( __( '%s is Installed', 'viewpoint' ), $plugin_name ) ),
							esc_attr( sprintf( __( '%s Installed!', 'viewpoint' ), $plugin_name ) )
						);

					};

					/**
					 * Plugin Details
					 */
					printf( '&nbsp;<a href="%s" class="thickbox button button-secondary" aria-label="%s" data-title="%s">%s</a>',
						esc_url( network_admin_url( 'plugin-install.php?tab=plugin-information&plugin=' . $plugin_slug .
							'&TB_iframe=true&width=770&height=680' ) ),
						esc_attr( sprintf( __( 'More information about %s', 'viewpoint' ), $plugin_name ) ),
						esc_attr( $plugin_name ),
						__( 'View details', 'viewpoint' )
					);

					echo "</p><hr>";

				} ?>

		</div><!-- .content-section -->

		<hr>

		<div class="content-section">

			<h3><?php _e( '2. Import Demo Content' ,'viewpoint' ); ?></h3>
			<p><?php _e( 'The quickest way to setup your site to mirror the demo is to install the supplied demo content:', 'viewpoint' ); ?></p>

			<p><b><?php _e('Importing the Demo XML File','viewpoint'); ?></b></p>

			<section class="callout-green">
				<?php
				printf(
				 	__('The demo XML file is available on the <a href="%s">theme information page</a>. Import the XML file at: <code>Tools > Import > WordPress</code>','viewpoint'),
					esc_url( $viewpoint_uri )
				);
				?>
			</section>

			<p><b><?php _e('Importing the Demo Widgets WIE File','viewpoint'); ?></b></p>
			<p>
				<?php
	 			  printf( 'Install the <a href="%s" class="thickbox" aria-label="%s">%s</a> plugin to import the widget demo WIE file.',
					esc_url( network_admin_url( 'plugin-install.php?tab=plugin-information&plugin=widget-importer-exporter&TB_iframe=true&width=770&height=680' ) ),
						esc_attr( sprintf( __( 'Install plugin %s', 'viewpoint' ), 'Widget Importer &amp; Exporter' ) ),
						esc_attr( sprintf( __( 'Widget Importer &amp; Exporter', 'viewpoint' ) ) )
					);
				?>
			</p>
			<section class="callout-green">
			<?php
			printf(
				__('The demo WIE file is available on the <a href="%s">theme information page</a>. Once the Widget Importer &amp; Exporter plugin is activated, import the WIE file at: <code>Tools > Widget Importer &amp; Exporter</code>','viewpoint'),
				esc_url( $viewpoint_uri )
			);
			?>
			</section>

		</div><!-- .content-section -->

		<hr>

		<div class="content-section">

			<h3><?php _e( '3. Assign Menus' ,'viewpoint' ); ?></h3>
			<p><?php _e( 'viewpoint includes a Primary Menu located in the header of the theme and a Social Menu in the top mini header. The primary navigation is perfect for your key pages like the blog and contact page.', 'viewpoint' ); ?></p>
			<p><b>
				<?php _e('Assign the navigation menus to their locations:','viewpoint'); ?></b>
			</p>
			<p><a href="<?php echo esc_url( self_admin_url( 'nav-menus.php' ) ); ?>" class="button"><?php _e( 'Configure Menu', 'viewpoint' ); ?></a></p>

		</div><!-- .content-section -->

		<hr>

		<div class="content-section">

			<h3><?php _e( '4. Assign the Home and Blog Pages', 'viewpoint' ); ?></h3>

			<p><?php _e( 'Assign both your "Home" Front Page and "Blog" Posts page in your Reading settings.', 'viewpoint' ); ?></p>

			<p><a href="<?php echo esc_url( self_admin_url( 'options-reading.php' ) ); ?>" class="button button"><?php _e( 'Reading Settings', 'viewpoint' ); ?></a></p>

		</div><!-- .content-section -->

		<hr>

		<div class="content-section">

			<h3><?php _e( '5. Customize Theme Settings' ,'viewpoint' ); ?></h3>
			<p><?php _e( 'Using the WordPress Customizer you can modify viewpoint\' appearance to match your own style.', 'viewpoint' ); ?></p>
			<p><a href="<?php echo esc_url( $url ); ?>" class="button"><?php _e( 'Open the Customizer', 'viewpoint' ); ?></a></p>

		</div><!-- .content-section -->

		<hr>

		<div class="content-section">

			<h3><?php _e( 'View Full Documentation', 'viewpoint' ); ?></h3>
			<p><?php _e( 'You can read detailed information on viewpoint\' features and review additional instructions in the documentation:', 'viewpoint' ); ?></p>
			<p><a href="http://docs.rescuethemes.com/collection/232-viewpoint" class="button" target="_blank"><?php _e( 'View documentation &rarr;', 'viewpoint' ); ?></a></p>

		</div><!-- .content-section -->

	</div><!-- .getting-started-content -->

</div><!-- #getting_started -->
