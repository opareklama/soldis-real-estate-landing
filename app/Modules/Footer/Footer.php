<?php

namespace OpaReklama\SoldisLanding\Modules\Footer;

defined( 'ABSPATH' ) || exit;



/**
 * The Footer module.
 * 
 * Mirrors the Header module architecture exactly.
 * Manages its own options, assets, admin panel, and frontend rendering.
 * 
 * @package    OpaReklama\SoldisLanding
 * @subpackage OpaReklama\SoldisLanding\Modules\Footer
 * @author     OPA Reklama <dev@opareklama.lt>
 * @copyright  Copyright (c) OPA Reklama. All Rights Reserved.
 */
class Footer {

	/**
	 * The admin instance.
	 *
	 * @var Admin
	 */
	protected $admin;

	/**
	 * Initialize the module.
	 */
	public function __construct() {
		$this->admin = new Admin( $this );
	}

	/**
	 * Run the module.
	 */
	public function run() {
		$this->admin->run();
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'wp_head',            array( $this, 'render_inline_css' ) );
		add_action( 'wp_footer',          array( $this, 'render_frontend' ) );
	}

	/**
	 * Get merged options with defaults.
	 * 
	 * Pulls footer-specific settings from DB, merges with defaults.
	 * Injects Global Settings data for shared fields (logo, contact, social).
	 * 
	 * @return array
	 */
	public function get_options() {
		$defaults = array(
			// Core
			'enable_footer'  => '1',

			// Visibility toggles
			'show_logo'      => '1',
			'show_desc'      => '1',
			'show_contact'   => '1',
			'show_nav'       => '1',
			'show_social'    => '1',
			'show_privacy'   => '1',
			'show_terms'     => '0',
			'show_copyright' => '1',
			'show_credit'    => '1',

			// Footer-specific content
			'description'    => 'Patikimas nekilnojamojo turto partneris Lietuvoje.',
			'copyright_text' => '© ' . gmdate( 'Y' ) . ' SOLDIS. Visos teisės saugomos.',
			'privacy_label'  => 'Privatumo politika',
			'privacy_url'    => '#',
			'terms_label'    => 'Naudojimo sąlygos',
			'terms_url'      => '#',
			'credit_text'    => 'Designed & Developed by OPA Reklama',
			'credit_url'     => 'https://opareklama.lt/',

			// Logo link for footer
			'logo_link_type'   => 'home',
			'logo_custom_url'  => '',

			// Independent Footer navigation
			'nav' => array(
				array( 'label' => 'Pradžia',    'url' => '#hero',       'target' => '_self', 'enabled' => '1' ),
				array( 'label' => 'Apie mus',   'url' => '#why-soldis', 'target' => '_self', 'enabled' => '1' ),
				array( 'label' => 'Ką gaunate', 'url' => '#benefits',   'target' => '_self', 'enabled' => '1' ),
				array( 'label' => 'Procesas',   'url' => '#process',    'target' => '_self', 'enabled' => '1' ),
				array( 'label' => 'Kodėl mes',  'url' => '#investment', 'target' => '_self', 'enabled' => '1' ),
				array( 'label' => 'DUK',        'url' => '#faq',        'target' => '_self', 'enabled' => '1' ),
				array( 'label' => 'Kontaktai',  'url' => '#contact',    'target' => '_self', 'enabled' => '1' ),
			),
		);

		$saved   = get_option( 'soldis_footer_settings', array() );
		$options = wp_parse_args( $saved, $defaults );

		// Ensure nav is a valid array (guard against a corrupted single empty element)
		if ( empty( $options['nav'] ) || ! is_array( $options['nav'] ) || ( count( $options['nav'] ) === 1 && empty( $options['nav'][0]['label'] ) ) ) {
			$options['nav'] = $defaults['nav'];
		}

		// Inject Global Settings for shared data (logo, contact, social, colors)
		$options['global'] = get_option( 'soldis_global_settings', array() );

		return $options;
	}

	/**
	 * Enqueue frontend assets.
	 */
	public function enqueue_assets() {
		$options = $this->get_options();

		if ( empty( $options['enable_footer'] ) ) {
			return;
		}

		wp_enqueue_style(
			'soldis-landing-footer',
			SOLDIS_LANDING_URL . 'resources/css/footer.css',
			array(),
			SOLDIS_LANDING_VERSION,
			'all'
		);

		wp_enqueue_script(
			'soldis-landing-footer',
			SOLDIS_LANDING_URL . 'resources/js/footer.js',
			array(),
			SOLDIS_LANDING_VERSION,
			true // in footer
		);
	}

	/**
	 * Render dynamic inline CSS.
	 */
	public function render_inline_css() {
		$options = $this->get_options();

		if ( empty( $options['enable_footer'] ) ) {
			return;
		}

		// No dynamic CSS needed at this time — footer uses CSS variables set by Global Settings.
		// This hook is reserved for future footer-specific overrides.
	}

	/**
	 * Render the frontend footer view.
	 */
	public function render_frontend() {
		$options = $this->get_options();

		if ( empty( $options['enable_footer'] ) ) {
			return;
		}

		require SOLDIS_LANDING_PATH . 'app/Modules/Footer/views/frontend.php';
	}
}

