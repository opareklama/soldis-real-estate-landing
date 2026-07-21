<?php

defined( 'ABSPATH' ) || exit;

namespace OpaReklama\SoldisLanding\Modules\GlobalSettings;

/**
 * The Global Settings module.
 */
class GlobalSettings {

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
		add_action( 'wp_head', array( $this, 'render_inline_css' ) );
	}

	/**
	 * Get merged options with defaults.
	 */
	public function get_options() {
		$defaults = array(
			'company_name'       => 'SOLDIS',
			'company_tagline'    => 'Patikimas nekilnojamojo turto partneris',
			'logo_type'          => 'text',
			'logo_image'         => '',
			'logo_text'          => 'SOLDIS',
			'logo_font_family'   => 'system-ui, -apple-system, sans-serif',
			'logo_font_size'     => '24',
			'logo_font_weight'   => '700',
			'logo_letter_spacing'=> '0',
			'logo_text_color'    => '#1d2327',
			'logo_hover_color'   => '#0073aa',
			'phone'              => '+370 612 34567',
			'mobile'             => '',
			'email'              => 'info@soldis.lt',
			'address'            => 'Vilnius, Lithuania',
			'gmaps_url'          => '',
			'business_hours'     => "I–V: 08:00–18:00\nVI: 09:00–14:00\nVII: Closed",
			'facebook'           => 'https://facebook.com/',
			'instagram'          => 'https://instagram.com/',
			'linkedin'           => 'https://linkedin.com/',
			'youtube'            => 'https://youtube.com/',
			'tiktok'             => '',
			'twitter'            => '',
			'color_primary'      => '#0a2540',
			'color_secondary'    => '#c79a3b',
			'color_accent'       => '#a67c3d', /* Darker gold for hover states etc */
			'color_bg'           => '#ffffff',
			'color_surface'      => '#f8f3e9', /* Light gold background */
			'color_heading'      => '#0a2540',
			'color_body'         => '#475569',
			'color_border'       => '#e5e7eb',
			'font_heading'       => 'Inherit',
			'font_body'          => 'Inherit',
			'container_width'    => '1200',
			'border_radius'      => '12',
		);
		$options = get_option( 'soldis_global_settings', array() );
		return wp_parse_args( $options, $defaults );
	}

	/**
	 * Render global inline CSS.
	 */
	public function render_inline_css() {
		$options = $this->get_options();

		echo "<style id='soldis-global-dynamic-css'>
			:root {
				/* Layout */
				--soldis-container-width: {$options['container_width']}px;
				--soldis-border-radius: {$options['border_radius']}px;
				
				/* Typography */
				--soldis-font-heading: {$options['font_heading']};
				--soldis-font-body: {$options['font_body']};
				
				/* Colors */
				--soldis-color-primary: {$options['color_primary']};
				--soldis-color-secondary: {$options['color_secondary']};
				--soldis-color-accent: {$options['color_accent']};
				--soldis-color-bg: {$options['color_bg']};
				--soldis-color-surface: {$options['color_surface']};
				--soldis-color-heading: {$options['color_heading']};
				--soldis-color-body: {$options['color_body']};
				--soldis-color-border: {$options['color_border']};
				
				/* Logo Typography */
				--soldis-logo-font-family: {$options['logo_font_family']};
				--soldis-logo-font-size: {$options['logo_font_size']}px;
				--soldis-logo-font-weight: {$options['logo_font_weight']};
				--soldis-logo-letter-spacing: {$options['logo_letter_spacing']}px;
				--soldis-logo-color: {$options['logo_text_color']};
				--soldis-logo-hover-color: {$options['logo_hover_color']};
			}
			
			body {
				background-color: var(--soldis-color-bg);
				color: var(--soldis-color-body);
				font-family: var(--soldis-font-body);
			}
			h1, h2, h3, h4, h5, h6 {
				color: var(--soldis-color-heading);
				font-family: var(--soldis-font-heading);
			}
		</style>";
	}
}

