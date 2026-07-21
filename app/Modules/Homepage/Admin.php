<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage;

use OpaReklama\SoldisLanding\Modules\Homepage\Sections\Hero\Admin as HeroAdmin;
use OpaReklama\SoldisLanding\Modules\Homepage\Sections\WhySoldis\Admin as WhySoldisAdmin;
use OpaReklama\SoldisLanding\Modules\Homepage\Sections\Benefits\Admin as BenefitsAdmin;
use OpaReklama\SoldisLanding\Modules\Homepage\Sections\Process\Admin as ProcessAdmin;
use OpaReklama\SoldisLanding\Modules\Homepage\Sections\Investment\Admin as InvestmentAdmin;
use OpaReklama\SoldisLanding\Modules\Homepage\Sections\Faq\Admin as FaqAdmin;

/**
 * The Homepage admin manager.
 */
class Admin {

	/**
	 * Hero Admin Instance
	 * 
	 * @var HeroAdmin
	 */
	protected $hero_admin;

	/**
	 * WhySoldis Admin Instance
	 * 
	 * @var WhySoldisAdmin
	 */
	protected $whysoldis_admin;

	/**
	 * Benefits Admin Instance
	 * 
	 * @var BenefitsAdmin
	 */
	protected $benefits_admin;
	protected $process_admin;
	protected $investment_admin;
	protected $faq_admin;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->hero_admin = new HeroAdmin();
		$this->whysoldis_admin = new WhySoldisAdmin();
		$this->benefits_admin = new BenefitsAdmin();
		$this->process_admin    = new ProcessAdmin();
		$this->investment_admin = new InvestmentAdmin();
		$this->faq_admin        = new FaqAdmin();
	}

	/**
	 * Run admin logic.
	 */
	public function run() {
		add_action( 'admin_menu', array( $this, 'register_menus' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		
		// Initialize Section Admins (which register their own settings)
		$this->hero_admin->run();
		$this->whysoldis_admin->run();
		$this->benefits_admin->run();
		$this->process_admin->run();
		$this->investment_admin->run();
		$this->faq_admin->run();
	}

	/**
	 * Register the admin menus.
	 */
	public function register_menus() {
		add_submenu_page(
			'soldis-landing',
			__( 'Homepage Settings', 'soldis-landing' ),
			__( 'Homepage', 'soldis-landing' ),
			'manage_options',
			'soldis-landing-homepage',
			array( $this, 'display_admin_page' )
		);
	}

	/**
	 * Enqueue admin assets.
	 */
	public function enqueue_assets( $hook ) {
		if ( strpos( $hook, 'soldis-landing-homepage' ) === false ) {
			return;
		}

		wp_enqueue_media();

		// Use the shared premium admin CSS (horizontal tabs)
		wp_enqueue_style(
			'soldis-landing-admin',
			SOLDIS_LANDING_URL . 'resources/css/admin.css',
			array(),
			SOLDIS_LANDING_VERSION,
			'all'
		);

		// Use the shared admin JS (tab switching, repeater)
		wp_enqueue_script(
			'soldis-landing-admin',
			SOLDIS_LANDING_URL . 'resources/js/admin.js',
			array( 'jquery', 'jquery-ui-sortable' ),
			SOLDIS_LANDING_VERSION,
			true
		);
	}

	/**
	 * Display the admin page.
	 */
	public function display_admin_page() {
		require SOLDIS_LANDING_PATH . 'app/Modules/Homepage/views/admin.php';
	}
}
