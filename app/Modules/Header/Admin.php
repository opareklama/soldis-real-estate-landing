<?php

namespace OpaReklama\SoldisLanding\Modules\Header;

defined( 'ABSPATH' ) || exit;



/**
 * The Header admin manager.
 */
class Admin {

	/**
	 * The Header module instance.
	 * 
	 * @var Header
	 */
	protected $header;

	/**
	 * Constructor.
	 * 
	 * @param Header $header
	 */
	public function __construct( Header $header ) {
		$this->header = $header;
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
		register_setting( 'soldis_header_group', 'soldis_header_settings', array(
			'sanitize_callback' => array( $this, 'sanitize_settings' )
		) );
	}

	/**
	 * Sanitize settings before saving.
	 */
	public function sanitize_settings( $input ) {
		if ( ! is_array( $input ) ) {
			return $input;
		}

		// Handle Checkboxes (if missing from POST, explicitly set to '0')
		$input['enable_header']  = isset( $input['enable_header'] ) ? '1' : '0';
		$input['cta_enable']     = isset( $input['cta_enable'] ) ? '1' : '0';
		$input['style_glass']    = isset( $input['style_glass'] ) ? '1' : '0';
		$input['logo_same_size'] = isset( $input['logo_same_size'] ) ? '1' : '0';

		// Handle Navigation Checkboxes
		if ( ! empty( $input['nav'] ) && is_array( $input['nav'] ) ) {
			foreach ( $input['nav'] as $index => $item ) {
				$input['nav'][ $index ]['enabled'] = isset( $item['enabled'] ) ? '1' : '0';
			}
		}

		return $input;
	}

	/**
	 * Register the admin menus.
	 */
	public function register_menus() {
		add_submenu_page(
			'soldis-landing',
			__( 'Header Settings', 'soldis-landing' ),
			__( 'Header', 'soldis-landing' ),
			'manage_options',
			'soldis-landing-header',
			array( $this, 'display_admin_page' )
		);
	}

	/**
	 * Enqueue admin assets.
	 */
	public function enqueue_assets( $hook ) {
		if ( strpos( $hook, 'soldis-landing-header' ) === false ) {
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
		$options = $this->header->get_options();
		require SOLDIS_LANDING_PATH . 'app/Modules/Header/views/admin.php';
	}
}

