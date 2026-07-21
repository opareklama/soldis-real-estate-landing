<?php

namespace OpaReklama\SoldisLanding\Modules\GlobalSettings;

/**
 * The Global Settings admin manager.
 */
class Admin {

	/**
	 * The GlobalSettings module instance.
	 * 
	 * @var GlobalSettings
	 */
	protected $module;

	/**
	 * Constructor.
	 * 
	 * @param GlobalSettings $module
	 */
	public function __construct( GlobalSettings $module ) {
		$this->module = $module;
	}

	/**
	 * Run admin logic.
	 */
	public function run() {
		add_action( 'admin_menu', array( $this, 'register_menus' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	/**
	 * Register settings.
	 */
	public function register_settings() {
		register_setting( 'soldis_global_group', 'soldis_global_settings' );
	}

	/**
	 * Register the admin menus.
	 */
	public function register_menus() {
		add_submenu_page(
			'soldis-landing',
			__( 'Global Settings', 'soldis-landing' ),
			__( 'Global Settings', 'soldis-landing' ),
			'manage_options',
			'soldis-landing-global',
			array( $this, 'display_admin_page' )
		);
	}

	/**
	 * Enqueue admin assets.
	 */
	public function enqueue_assets( $hook ) {
		if ( strpos( $hook, 'soldis-landing-global' ) === false ) {
			return;
		}

		wp_enqueue_media(); // Needed for logo upload

		wp_enqueue_style(
			'soldis-landing-admin',
			SOLDIS_LANDING_URL . 'resources/css/admin.css',
			array(),
			SOLDIS_LANDING_VERSION,
			'all'
		);

		wp_enqueue_script(
			'soldis-landing-admin',
			SOLDIS_LANDING_URL . 'resources/js/admin.js',
			array( 'jquery' ),
			SOLDIS_LANDING_VERSION,
			true
		);
	}

	/**
	 * Display the admin page.
	 */
	public function display_admin_page() {
		$options = $this->module->get_options();
		require SOLDIS_LANDING_PATH . 'app/Modules/GlobalSettings/views/admin.php';
	}
}
