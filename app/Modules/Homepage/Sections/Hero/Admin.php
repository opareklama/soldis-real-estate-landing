<?php

defined( 'ABSPATH' ) || exit;

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Hero;

/**
 * The Hero Admin settings.
 */
class Admin {

	/**
	 * Module Instance
	 * 
	 * @var Hero
	 */
	protected $module;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->module = new Hero();
	}

	/**
	 * Run admin logic.
	 */
	public function run() {
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	/**
	 * Register the settings.
	 */
	public function register_settings() {
		// Registering option group for the homepage form to submit to.
		register_setting( 'soldis_hero_group', 'soldis_hero_settings' );
	}

	/**
	 * Display the hero admin view.
	 * (Called by Homepage Admin)
	 */
	public function display_admin_view() {
		$options = $this->module->get_options();
		require SOLDIS_LANDING_PATH . 'app/Modules/Homepage/Sections/Hero/views/admin.php';
	}
}

