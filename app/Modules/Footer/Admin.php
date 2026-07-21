<?php

defined( 'ABSPATH' ) || exit;

namespace OpaReklama\SoldisLanding\Modules\Footer;

/**
 * The Footer admin manager.
 * 
 * Mirrors Header\Admin.php architecture exactly.
 * 
 * @package    OpaReklama\SoldisLanding
 * @subpackage OpaReklama\SoldisLanding\Modules\Footer
 * @author     OPA Reklama <dev@opareklama.lt>
 * @copyright  Copyright (c) OPA Reklama. All Rights Reserved.
 */
class Admin {

	/**
	 * The Footer module instance.
	 *
	 * @var Footer
	 */
	protected $footer;

	/**
	 * Constructor.
	 *
	 * @param Footer $footer
	 */
	public function __construct( Footer $footer ) {
		$this->footer = $footer;
	}

	/**
	 * Run admin logic.
	 */
	public function run() {
		add_action( 'admin_menu',             array( $this, 'register_menus' ) );
		add_action( 'admin_enqueue_scripts',  array( $this, 'enqueue_assets' ) );
		add_action( 'admin_init',             array( $this, 'register_settings' ) );
	}

	/**
	 * Register WordPress settings.
	 */
	public function register_settings() {
		register_setting(
			'soldis_footer_group',
			'soldis_footer_settings',
			array(
				'sanitize_callback' => array( $this, 'sanitize_settings' ),
			)
		);
	}

	/**
	 * Sanitize settings before saving.
	 *
	 * @param array $input Raw input from form submission.
	 * @return array Sanitized settings.
	 */
	public function sanitize_settings( $input ) {
		if ( ! is_array( $input ) ) {
			return array();
		}

		// Checkbox fields — if missing from POST, set to '0'
		$checkboxes = array(
			'enable_footer',
			'show_logo',
			'show_desc',
			'show_contact',
			'show_nav',
			'show_social',
			'show_privacy',
			'show_terms',
			'show_copyright',
			'show_credit',
		);
		foreach ( $checkboxes as $key ) {
			$input[ $key ] = isset( $input[ $key ] ) ? '1' : '0';
		}

		// Text fields
		$text_fields = array(
			'description',
			'copyright_text',
			'privacy_label',
			'privacy_url',
			'terms_label',
			'terms_url',
			'credit_text',
			'credit_url',
			'logo_link_type',
			'logo_custom_url',
		);
		foreach ( $text_fields as $key ) {
			if ( isset( $input[ $key ] ) ) {
				$input[ $key ] = sanitize_text_field( $input[ $key ] );
			}
		}

		// URL fields — extra sanitization
		$url_fields = array( 'privacy_url', 'terms_url', 'credit_url', 'logo_custom_url' );
		foreach ( $url_fields as $key ) {
			if ( ! empty( $input[ $key ] ) ) {
				$input[ $key ] = esc_url_raw( $input[ $key ] );
			}
		}

		// Navigation repeater
		if ( ! empty( $input['nav'] ) && is_array( $input['nav'] ) ) {
			$clean_nav = array();
			foreach ( $input['nav'] as $item ) {
				if ( empty( $item['label'] ) ) {
					continue; // Skip empty rows
				}
				$clean_nav[] = array(
					'label'   => sanitize_text_field( $item['label'] ?? '' ),
					'url'     => esc_url_raw( $item['url'] ?? '#' ),
					'target'  => in_array( $item['target'] ?? '', array( '_self', '_blank' ), true ) ? $item['target'] : '_self',
					'enabled' => isset( $item['enabled'] ) ? '1' : '0',
				);
			}
			$input['nav'] = $clean_nav;
		} else {
			$input['nav'] = array();
		}

		return $input;
	}

	/**
	 * Register admin submenu page.
	 */
	public function register_menus() {
		add_submenu_page(
			'soldis-landing',
			__( 'Footer Settings', 'soldis-landing' ),
			__( 'Footer', 'soldis-landing' ),
			'manage_options',
			'soldis-landing-footer',
			array( $this, 'display_admin_page' )
		);
	}

	/**
	 * Enqueue admin assets.
	 *
	 * @param string $hook Current admin page hook.
	 */
	public function enqueue_assets( $hook ) {
		if ( strpos( $hook, 'soldis-landing-footer' ) === false ) {
			return;
		}

		// Reuse the global admin CSS (tabs, repeater, form styles)
		wp_enqueue_style(
			'soldis-footer-admin-css',
			SOLDIS_LANDING_URL . 'resources/css/admin.css',
			array(),
			SOLDIS_LANDING_VERSION,
			'all'
		);

		// Reuse the global admin JS (tab switching, repeater add/remove)
		wp_enqueue_script(
			'soldis-footer-admin-js',
			SOLDIS_LANDING_URL . 'resources/js/admin.js',
			array( 'jquery' ),
			SOLDIS_LANDING_VERSION,
			false
		);
	}

	/**
	 * Display the admin page.
	 */
	public function display_admin_page() {
		$options = $this->footer->get_options();
		require SOLDIS_LANDING_PATH . 'app/Modules/Footer/views/admin.php';
	}
}

