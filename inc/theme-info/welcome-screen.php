<?php
/**
 * Welcome Screen Class
 * Sets up the welcome screen page, hides the menu item
 * and contains the screen content.
 */
class viewpoint_Welcome {

	/**
	 * Constructor
	 * Sets up the welcome screen
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'viewpoint_welcome_register_menu' ) );
		add_action( 'load-themes.php', array( $this, 'viewpoint_activation_admin_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'viewpoint_welcome_scripts' ) );

		add_action( 'viewpoint_welcome', array( $this, 'viewpoint_welcome_intro' ), 				10 );
		add_action( 'viewpoint_welcome', array( $this, 'viewpoint_welcome_tabs' ), 				20 );
		add_action( 'viewpoint_welcome', array( $this, 'viewpoint_welcome_getting_started' ), 	30 );
		add_action( 'viewpoint_welcome', array( $this, 'viewpoint_welcome_support' ), 				40 );
		add_action( 'viewpoint_welcome', array( $this, 'viewpoint_welcome_changelog' ), 		50 );

	} // end constructor

	/**
	 * Adds an admin notice upon successful activation.
	 */
	public function viewpoint_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) { // input var okay
			add_action( 'admin_notices', array( $this, 'viewpoint_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 */
	public function viewpoint_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Thanks for choosing the viewpoint Theme! Find out more about what you can do with this theme on the %stheme info screen%s.', 'viewpoint' ), '<a href="' . esc_url( admin_url( 'themes.php?page=viewpoint-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=viewpoint-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with viewpoint', 'viewpoint' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css
	 * @return void
	 */
	public function viewpoint_welcome_scripts() {
		global $viewpoint_version;

		wp_enqueue_style( 'viewpoint-theme-info', get_template_directory_uri() . '/inc/theme-info/css/welcome.css', $viewpoint_version );
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_style( 'thickbox' );
	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 */
	public function viewpoint_welcome_register_menu() {
		add_theme_page( 'Theme Info', 'Theme Info', 'read', 'viewpoint-welcome', array( $this, 'viewpoint_welcome_screen' ) );
	}

	/**
	 * The welcome screen
	 */
	public function viewpoint_welcome_screen() {
		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>
		<div class="wrap about-wrap">

			<?php
			/**
			 * @hooked viewpoint_welcome_intro - 10
			 * @hooked viewpoint_welcome_getting_started - 20
			 * @hooked viewpoint_welcome_addons - 30
			 */
			do_action( 'viewpoint_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Welcome screen intro
	 */
	public function viewpoint_welcome_intro() {
		require_once( get_template_directory() . '/inc/theme-info/sections/intro.php' );
	}

	/**
	 * Welcome screen intro
	 */
	public function viewpoint_welcome_tabs() {
		require_once( get_template_directory() . '/inc/theme-info/sections/tabs.php' );
	}

	/**
	 * Welcome screen getting started section
	 */
	public function viewpoint_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/theme-info/sections/start.php' );
	}

	/**
	 * Welcome screen support theme
	 */
	public function viewpoint_welcome_support() {
		require_once( get_template_directory() . '/inc/theme-info/sections/support.php' );
	}

	/**
	 * Welcome screen changelog
	 */
	public function viewpoint_welcome_changelog() {
		require_once( get_template_directory() . '/inc/theme-info/sections/changelog.php' );
	}

	/**
	 * Display the changelog file from the theme
	 */
	public function viewpoint_changlog() {

		WP_Filesystem();
		global $wp_filesystem;

		$file = $wp_filesystem->get_contents( get_template_directory_uri() . '/changelog.txt' );
		$readme = nl2br( $file );

		return $readme;

	}

}

$GLOBALS['viewpoint_Welcome'] = new viewpoint_Welcome();
