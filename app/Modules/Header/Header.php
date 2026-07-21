<?php

namespace OpaReklama\SoldisLanding\Modules\Header;

defined( 'ABSPATH' ) || exit;



/**
 * The Header module.
 */
class Header {

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
		add_action( 'wp_head', array( $this, 'render_inline_css' ) );
		add_action( 'wp_body_open', array( $this, 'render_frontend' ) );
	}

	/**
	 * Get merged options with defaults.
	 */
	public function get_options() {
		$defaults = array(
			'enable_header'    => '1',
			'logo_type'        => 'text',
			'logo_image'       => '',
			'logo_text'        => '',
			'logo_link_type'   => 'home',
			'logo_custom_url'  => '',
			'logo_same_size'   => '0',
			'logo_width_desktop' => '150',
			'logo_width_tablet'  => '130',
			'logo_width_mobile'  => '110',
			'logo_height_desktop' => 'auto',
			'logo_height_tablet'  => 'auto',
			'logo_height_mobile'  => 'auto',
			'logo_font_family' => 'system-ui, -apple-system, sans-serif',
			'logo_font_size'   => '24',
			'logo_font_weight' => '700',
			'logo_letter_spacing' => '0',
			'logo_text_color'  => '#1d2327',
			'logo_hover_color' => '#0073aa',
			'nav'              => array(
				array( 'label' => 'Pradžia', 'url' => '#pradzia', 'section_id' => 'pradzia', 'target' => '_self', 'enabled' => '1', 'css_class' => '' ),
				array( 'label' => 'Apie mus', 'url' => '#apie-mus', 'section_id' => 'apie-mus', 'target' => '_self', 'enabled' => '1', 'css_class' => '' ),
				array( 'label' => 'Paslaugos', 'url' => '#paslaugos', 'section_id' => 'paslaugos', 'target' => '_self', 'enabled' => '1', 'css_class' => '' ),
				array( 'label' => 'Procesas', 'url' => '#procesas', 'section_id' => 'procesas', 'target' => '_self', 'enabled' => '1', 'css_class' => '' ),
				array( 'label' => 'DUK', 'url' => '#duk', 'section_id' => 'duk', 'target' => '_self', 'enabled' => '1', 'css_class' => '' ),
				array( 'label' => 'Kontaktai', 'url' => '#kontaktai', 'section_id' => 'kontaktai', 'target' => '_self', 'enabled' => '1', 'css_class' => '' ),
			),
			'header_contact_enable' => '1',
			'header_contact_phone'  => '+370 612 34567',
			'header_contact_email'  => 'info@soldis.lt',
			'cta_enable'       => '1',
			'cta_style'        => 'primary',
			'cta_text'         => 'Gauti pasiūlymą',
			'cta_url'          => '#kontaktai',
			'cta_target'       => '_self',
			'cta_rel'          => '',
			'cta_icon'         => '',
			'cta_icon_pos'     => 'right',
			'style_bg'         => '#ffffff',
			'style_sticky_bg'  => '#ffffff',
			'style_text'       => '#1d2327',
			'style_hover'      => '#0073aa',
			'style_cta'        => '#0073aa',
			'style_glass'      => '0',
			'container_width'  => '1200',
			'height_desktop'   => '80',
			'height_tablet'    => '70',
			'height_mobile'    => '60',
			'font_size'        => '16',
			'cta_radius'       => '6',
			'cta_pad_y'        => '10',
			'cta_pad_x'        => '24',
			'cta_shadow'       => '0',
		);
		$options = get_option( 'soldis_header_settings', array() );
		$options = wp_parse_args( $options, $defaults );

		$global_options = get_option( 'soldis_global_settings', array() );

		// Deep merge / fallback for critical elements that might be saved as empty strings
		if ( empty( $options['cta_text'] ) ) {
			$options['cta_text'] = $defaults['cta_text'];
		}
		
		// If nav is completely empty or just one empty element, fallback to defaults
		if ( empty( $options['nav'] ) || ! is_array( $options['nav'] ) || ( count( $options['nav'] ) === 1 && empty( $options['nav'][0]['label'] ) ) ) {
			$options['nav'] = $defaults['nav'];
		}

		// Inject Global Fallbacks for omitted fields
		$options['global'] = $global_options; // Pass global options to frontend for logo rendering
		
		if ( empty( $options['style_cta'] ) && ! empty( $global_options['color_primary'] ) ) {
			$options['style_cta'] = $global_options['color_primary'];
		}
		if ( empty( $options['container_width'] ) && ! empty( $global_options['container_width'] ) ) {
			$options['container_width'] = $global_options['container_width'];
		}
		if ( empty( $options['cta_radius'] ) && isset( $global_options['border_radius'] ) ) {
			$options['cta_radius'] = $global_options['border_radius'];
		}

		return $options;
	}

	/**
	 * Enqueue frontend assets.
	 */
	public function enqueue_assets() {
		$options = $this->get_options();
		if ( empty( $options['enable_header'] ) ) {
			return;
		}
		wp_enqueue_style(
			'soldis-landing-header',
			SOLDIS_LANDING_URL . 'resources/css/header.css',
			array(),
			SOLDIS_LANDING_VERSION,
			'all'
		);

		wp_enqueue_script(
			'soldis-landing-header',
			SOLDIS_LANDING_URL . 'resources/js/header.js',
			array(),
			SOLDIS_LANDING_VERSION,
			true // in footer
		);
	}

	/**
	 * Render inline CSS.
	 */
	public function render_inline_css() {
		$options = $this->get_options();
		if ( empty( $options['enable_header'] ) ) {
			return;
		}

		$glass = ! empty( $options['style_glass'] ) ? 'backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); background-color: rgba(255,255,255,0.8);' : '';

		// Resolve dimensions based on same_size toggle
		$w_t = ! empty( $options['logo_same_size'] ) ? $options['logo_width_desktop'] : $options['logo_width_tablet'];
		$w_m = ! empty( $options['logo_same_size'] ) ? $options['logo_width_desktop'] : $options['logo_width_mobile'];
		$h_t = ! empty( $options['logo_same_size'] ) ? $options['logo_height_desktop'] : $options['logo_height_tablet'];
		$h_m = ! empty( $options['logo_same_size'] ) ? $options['logo_height_desktop'] : $options['logo_height_mobile'];

		echo "<style id='soldis-header-dynamic-css'>
			:root {
				--soldis-container-width: {$options['container_width']}px;
				--soldis-header-height-desktop: {$options['height_desktop']}px;
				--soldis-header-height-tablet: {$options['height_tablet']}px;
				--soldis-header-height-mobile: {$options['height_mobile']}px;
				--soldis-header-bg: {$options['style_bg']};
				--soldis-header-sticky-bg: {$options['style_sticky_bg']};
				--soldis-header-text: {$options['style_text']};
				--soldis-primary-color: {$options['style_hover']};
				--soldis-cta-bg: {$options['style_cta']};
				--soldis-nav-font-size: {$options['font_size']}px;
				--soldis-cta-radius: {$options['cta_radius']}px;
				--soldis-cta-pad-y: {$options['cta_pad_y']}px;
				--soldis-cta-pad-x: {$options['cta_pad_x']}px;
				--soldis-cta-shadow: " . ( empty( $options['cta_shadow'] ) ? 'none' : '0 4px 14px rgba(0,0,0,0.1)' ) . ";
				--soldis-logo-w-d: " . ( $options['logo_width_desktop'] === 'auto' ? 'auto' : $options['logo_width_desktop'] . 'px' ) . ";
				--soldis-logo-w-t: " . ( $w_t === 'auto' ? 'auto' : $w_t . 'px' ) . ";
				--soldis-logo-w-m: " . ( $w_m === 'auto' ? 'auto' : $w_m . 'px' ) . ";
				
				--soldis-logo-h-d: " . ( $options['logo_height_desktop'] === 'auto' ? 'auto' : $options['logo_height_desktop'] . 'px' ) . ";
				--soldis-logo-h-t: " . ( $h_t === 'auto' ? 'auto' : $h_t . 'px' ) . ";
				--soldis-logo-h-m: " . ( $h_m === 'auto' ? 'auto' : $h_m . 'px' ) . ";
			}
			" . ( $glass ? ".soldis-header { {$glass} }" : "" ) . "
		</style>";
	}

	/**
	 * Render the frontend header view.
	 */
	public function render_frontend() {
		$options = $this->get_options();
		if ( empty( $options['enable_header'] ) ) {
			return;
		}
		require SOLDIS_LANDING_PATH . 'app/Modules/Header/views/frontend.php';
	}
}

