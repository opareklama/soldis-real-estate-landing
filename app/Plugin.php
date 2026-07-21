<?php

namespace OpaReklama\SoldisLanding;

use OpaReklama\SoldisLanding\Admin\Admin;
use OpaReklama\SoldisLanding\Modules\Header\Header;
use OpaReklama\SoldisLanding\Modules\Footer\Footer;

/**
 * The core plugin class.
 */
class Plugin {

	/**
	 * The admin instance.
	 *
	 * @var Admin
	 */
	protected $admin;

	/**
	 * The header module instance.
	 *
	 * @var Header
	 */
	protected $header;

	/**
	 * The global settings module instance.
	 *
	 * @var Modules\GlobalSettings\GlobalSettings
	 */
	protected $global_settings;

	/**
	 * The homepage module instance.
	 *
	 * @var Modules\Homepage\Homepage
	 */
	protected $homepage;

	/**
	 * The footer module instance.
	 *
	 * @var Footer
	 */
	protected $footer;

	/**
	 * Initialize the plugin.
	 */
	public function __construct() {
		$this->admin           = new Admin();
		$this->global_settings = new Modules\GlobalSettings\GlobalSettings();
		$this->header          = new Header();
		$this->homepage        = new Modules\Homepage\Homepage();
		$this->footer          = new Footer();
	}

	/**
	 * Run the plugin logic.
	 */
	public function run() {
		$this->register_hooks();
		$this->global_settings->run();
		$this->header->run();
		$this->homepage->run();
		$this->footer->run();
	}

	/**
	 * Register all hooks for the plugin.
	 */
	private function register_hooks() {
		// Admin hooks
		add_action( 'admin_menu', array( $this->admin, 'register_menus' ) );
		add_action( 'admin_enqueue_scripts', array( $this->admin, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this->admin, 'enqueue_scripts' ) );
	}
}
