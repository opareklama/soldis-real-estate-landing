<?php

namespace OpaReklama\SoldisLanding\Foundation;

defined( 'ABSPATH' ) || exit;



/**
 * Fired during plugin activation.
 */
class Activator {

	/**
	 * Activate the plugin.
	 */
	public static function activate() {
		// Minimum PHP Version Check
		if ( version_compare( PHP_VERSION, '7.4', '<' ) ) {
			deactivate_plugins( plugin_basename( SOLDIS_LANDING_PATH . 'soldis-landing.php' ) );
			wp_die( __( 'SOLDIS Landing requires PHP 7.4 or higher.', 'soldis-landing' ) );
		}

		// Minimum WordPress Version Check
		if ( version_compare( get_bloginfo( 'version' ), '5.8', '<' ) ) {
			deactivate_plugins( plugin_basename( SOLDIS_LANDING_PATH . 'soldis-landing.php' ) );
			wp_die( __( 'SOLDIS Landing requires WordPress 5.8 or higher.', 'soldis-landing' ) );
		}

		// Seed Default Global Settings
		$default_global = array(
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
			'color_primary'      => '#0F4C81',
			'color_secondary'    => '#D4AF37',
			'color_accent'       => '#16A34A',
			'color_bg'           => '#FFFFFF',
			'color_surface'      => '#F8FAFC',
			'color_heading'      => '#0F172A',
			'color_body'         => '#475569',
			'color_border'       => '#E2E8F0',
			'font_heading'       => 'Inherit',
			'font_body'          => 'Inherit',
			'container_width'    => '1200',
			'border_radius'      => '12',
		);
		add_option( 'soldis_global_settings', $default_global );

		// Seed Default Header Settings if not exists
		$default_header = array(
			'enable_header'    => '1',
			'logo_type'        => 'text',
			'logo_text'        => '', // Fallbacks will handle this
			'logo_link_type'   => 'home',
			'nav'              => array(
				array( 'label' => 'Pradžia', 'url' => '#pradzia', 'section_id' => 'pradzia', 'target' => '_self', 'enabled' => '1', 'css_class' => '' ),
				array( 'label' => 'Apie mus', 'url' => '#apie-mus', 'section_id' => 'apie-mus', 'target' => '_self', 'enabled' => '1', 'css_class' => '' ),
				array( 'label' => 'Paslaugos', 'url' => '#paslaugos', 'section_id' => 'paslaugos', 'target' => '_self', 'enabled' => '1', 'css_class' => '' ),
				array( 'label' => 'Procesas', 'url' => '#procesas', 'section_id' => 'procesas', 'target' => '_self', 'enabled' => '1', 'css_class' => '' ),
				array( 'label' => 'DUK', 'url' => '#duk', 'section_id' => 'duk', 'target' => '_self', 'enabled' => '1', 'css_class' => '' ),
				array( 'label' => 'Kontaktai', 'url' => '#kontaktai', 'section_id' => 'kontaktai', 'target' => '_self', 'enabled' => '1', 'css_class' => '' ),
			),
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
			'style_glass'      => '0',
			'height_desktop'   => '80',
			'height_tablet'    => '70',
			'height_mobile'    => '60',
			'font_size'        => '16',
			'cta_pad_y'        => '10',
			'cta_pad_x'        => '24',
			'cta_shadow'       => '0',
			'logo_width_desktop' => '150',
			'logo_width_tablet'  => '130',
			'logo_width_mobile'  => '110',
			'logo_height_desktop' => 'auto',
			'logo_height_tablet'  => 'auto',
			'logo_height_mobile'  => 'auto',
			'logo_same_size'   => '0',
		);
		add_option( 'soldis_header_settings', $default_header );

		// Seed Default Hero Settings if not exists
		$default_hero = array(
			'enable_hero'      => '1',
			
			// Content
			'eyebrow'          => 'Premium Real Estate in Lithuania',
			'heading'          => 'Find Your Perfect Property With SOLDIS',
			'highlight'        => 'SOLDIS',
			'description'      => 'Discover premium homes, apartments and investment opportunities across Lithuania with trusted real estate experts.',
			
			// Buttons
			'btn_primary_label'  => 'View Properties',
			'btn_primary_url'    => '#properties',
			'btn_primary_target' => '_self',
			'btn_secondary_enable'=> '1',
			'btn_secondary_label'=> 'Contact Us',
			'btn_secondary_url'  => '#contact',
			'btn_secondary_target'=> '_self',
			
			// Image
			'hero_image'       => '',
			'hero_alt'         => 'Luxury Real Estate',
			'hero_image_enable'=> '1',
			
			// Background
			'bg_type'          => 'gradient', // solid, gradient, image
			'bg_color'         => '#f8fafc',
			'bg_gradient'      => 'linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%)',
			'bg_image'         => '',
			'bg_overlay_color' => '#ffffff',
			'bg_overlay_opacity'=> '0.8',
			
			// Layout
			'content_width'    => '50',
			'image_width'      => '50',
			'valign'           => 'center',
			'stack_tablet'     => 'content_first',
			'stack_mobile'     => 'content_first',
			
			// Spacing
			'pad_top_d'        => '120',
			'pad_bot_d'        => '120',
			'pad_top_t'        => '80',
			'pad_bot_t'        => '80',
			'pad_top_m'        => '60',
			'pad_bot_m'        => '60',
			
			// Animation & Visibility
			'enable_animation' => '1',
			'hide_desktop'     => '0',
			'hide_tablet'      => '0',
			'hide_mobile'      => '0',
			
			// Repeaters
			'trust_items'      => array(
				array( 'enabled' => '1', 'title' => 'Trusted Partner', 'desc' => '', 'url' => '', 'icon' => 'shield' ),
				array( 'enabled' => '1', 'title' => 'Premium Properties', 'desc' => '', 'url' => '', 'icon' => 'home' ),
				array( 'enabled' => '1', 'title' => 'Investment Opportunities', 'desc' => '', 'url' => '', 'icon' => 'trending-up' ),
			),
			'glass_cards'      => array(
				array( 'enabled' => '1', 'title' => '10+', 'subtitle' => 'Years Experience', 'icon' => 'award' ),
				array( 'enabled' => '1', 'title' => '500+', 'subtitle' => 'Properties Sold', 'icon' => 'check-circle' ),
			),
		);
		add_option( 'soldis_hero_settings', $default_hero );

		// Add activation logic here (e.g., flush rewrite rules, create custom tables).
		flush_rewrite_rules();
	}
}

