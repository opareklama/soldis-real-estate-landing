<?php

defined( 'ABSPATH' ) || exit;

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
		register_setting( 'soldis_global_group', 'soldis_global_settings', array(
			'sanitize_callback' => array( $this, 'sanitize_settings' )
		) );
	}

	/**
	 * Sanitize settings.
	 */
	public function sanitize_settings( $input ) {
		if ( ! is_array( $input ) ) return array();
		
		$sanitized = array();
		
		// Text fields
		$text_fields = array( 'logo_text', 'phone', 'email', 'address', 'company_name', 'company_code', 'vat_code' );
		foreach ( $text_fields as $field ) {
			if ( isset( $input[ $field ] ) ) {
				$sanitized[ $field ] = sanitize_text_field( $input[ $field ] );
			}
		}

		// URL fields
		$url_fields = array( 'logo_image', 'facebook_url', 'instagram_url', 'linkedin_url', 'youtube_url' );
		foreach ( $url_fields as $field ) {
			if ( isset( $input[ $field ] ) ) {
				$sanitized[ $field ] = esc_url_raw( $input[ $field ] );
			}
		}

		// Select/Radio
		if ( isset( $input['logo_type'] ) ) {
			$sanitized['logo_type'] = in_array( $input['logo_type'], array( 'image', 'text', 'image_text' ) ) ? $input['logo_type'] : 'image';
		}

		// Colors (Hex)
		$color_fields = array( 'color_primary', 'color_secondary', 'color_accent', 'color_bg', 'color_text' );
		foreach ( $color_fields as $field ) {
			if ( isset( $input[ $field ] ) ) {
				$sanitized[ $field ] = sanitize_hex_color( $input[ $field ] );
			}
		}

		// Typography / Layout
		$other_fields = array( 'font_family_heading', 'font_family_body', 'container_width', 'border_radius' );
		foreach ( $other_fields as $field ) {
			if ( isset( $input[ $field ] ) ) {
				$sanitized[ $field ] = sanitize_text_field( $input[ $field ] );
			}
		}

		return $sanitized;
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

