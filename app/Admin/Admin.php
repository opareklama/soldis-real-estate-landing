<?php

namespace OpaReklama\SoldisLanding\Admin;

defined( 'ABSPATH' ) || exit;



/**
 * The admin manager.
 */
class Admin {

	/**
	 * Register the admin menus.
	 */
	public function register_menus() {
		add_menu_page(
			__( 'SOLDIS Landing Dashboard', 'soldis-landing' ),
			__( 'SOLDIS Landing', 'soldis-landing' ),
			'manage_options',
			'soldis-landing',
			array( $this, 'display_dashboard' ),
			'dashicons-admin-generic', // Can be updated with custom SVG later
			30
		);

		add_submenu_page(
			'soldis-landing',
			__( 'Dashboard', 'soldis-landing' ),
			__( 'Dashboard', 'soldis-landing' ),
			'manage_options',
			'soldis-landing',
			array( $this, 'display_dashboard' )
		);
	}

	/**
	 * Display the dashboard view.
	 */
	public function display_dashboard() {
		require_once SOLDIS_LANDING_PATH . 'app/Admin/views/dashboard.php';
	}

	/**
	 * Enqueue admin styles.
	 */
	public function enqueue_styles( $hook ) {
		if ( strpos( $hook, 'soldis-landing' ) === false ) {
			return;
		}

		wp_enqueue_style(
			'soldis-landing-admin',
			SOLDIS_LANDING_URL . 'resources/css/admin.css',
			array(),
			SOLDIS_LANDING_VERSION,
			'all'
		);
	}

	/**
	 * Enqueue admin scripts.
	 */
	public function enqueue_scripts( $hook ) {
		if ( strpos( $hook, 'soldis-landing' ) === false ) {
			return;
		}

		wp_enqueue_script(
			'soldis-landing-admin',
			SOLDIS_LANDING_URL . 'resources/js/admin.js',
			array( 'jquery' ),
			SOLDIS_LANDING_VERSION,
			false
		);
	}
}

