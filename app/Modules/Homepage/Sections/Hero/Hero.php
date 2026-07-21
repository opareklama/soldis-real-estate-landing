<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Hero;

/**
 * The Hero section manager.
 */
class Hero {

	/**
	 * Get Hero options with fallbacks.
	 * 
	 * @return array
	 */
	public function get_options() {
		$defaults = array(
			'enable_hero'      => '1',
			'eyebrow'          => 'Premium Real Estate in Lithuania',
			'heading'          => 'Find Your Perfect Property With SOLDIS',
			'highlight'        => 'SOLDIS',
			'description'      => 'Discover premium homes, apartments and investment opportunities across Lithuania with trusted real estate experts.',
			'btn_primary_label'  => 'View Properties',
			'btn_primary_url'    => '#properties',
			'btn_primary_target' => '_self',
			'btn_secondary_enable'=> '1',
			'btn_secondary_label'=> 'Contact Us',
			'btn_secondary_url'  => '#contact',
			'btn_secondary_target'=> '_self',
			'hero_image'       => '',
			'hero_alt'         => 'Luxury Real Estate',
			'hero_image_enable'=> '1',
			'bg_type'          => 'gradient',
			'bg_color'         => '#f8fafc',
			'bg_gradient'      => 'linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%)',
			'bg_image'         => '',
			'bg_overlay_color' => '#ffffff',
			'bg_overlay_opacity'=> '0.8',
			'content_width'    => '50',
			'image_width'      => '50',
			'valign'           => 'center',
			'stack_tablet'     => 'content_first',
			'stack_mobile'     => 'content_first',
			'pad_top_d'        => '120',
			'pad_bot_d'        => '120',
			'pad_top_t'        => '80',
			'pad_bot_t'        => '80',
			'pad_top_m'        => '60',
			'pad_bot_m'        => '60',
			'enable_animation' => '1',
			'hide_desktop'     => '0',
			'hide_tablet'      => '0',
			'hide_mobile'      => '0',
			'trust_items'      => array(
				array( 'enabled' => '1', 'title' => 'Trusted Partner', 'desc' => 'Reliable & Transparent', 'url' => '', 'icon' => 'shield' ),
				array( 'enabled' => '1', 'title' => 'Premium Properties', 'desc' => 'Carefully Selected', 'url' => '', 'icon' => 'home' ),
				array( 'enabled' => '1', 'title' => 'Investment Opportunities', 'desc' => 'High ROI Potential', 'url' => '', 'icon' => 'trending-up' ),
			),
			'glass_cards'      => array(
				array( 'enabled' => '1', 'title' => 'Premium Homes', 'subtitle' => 'Modern & Luxury Properties', 'icon' => 'home' ),
				array( 'enabled' => '1', 'title' => 'Trusted Partner', 'subtitle' => '15+ Years of Experience', 'icon' => 'user' ),
				array( 'enabled' => '1', 'title' => 'Investment', 'subtitle' => 'High ROI Opportunities', 'icon' => 'trending-up' ),
			),
			'ratings_enable'   => '1',
			'ratings_text'     => 'Trusted by 250+ clients across Lithuania',
			'ratings_score'    => '4.9/5',
			'bottom_stats'     => array(
				array( 'enabled' => '1', 'title' => '250+', 'subtitle' => 'Properties Sold', 'icon' => 'home', 'color' => 'blue' ),
				array( 'enabled' => '1', 'title' => '15+', 'subtitle' => 'Years Experience', 'icon' => 'users', 'color' => 'gold' ),
				array( 'enabled' => '1', 'title' => '98%', 'subtitle' => 'Client Satisfaction', 'icon' => 'smile', 'color' => 'blue' ),
				array( 'enabled' => '1', 'title' => 'All Lithuania', 'subtitle' => 'We Cover All Major Cities', 'icon' => 'map-pin', 'color' => 'gold' ),
			),
		);

		$options = get_option( 'soldis_hero_settings', array() );
		$options = wp_parse_args( $options, $defaults );
		
		// Fallbacks for arrays if empty (meaning they were saved as empty arrays)
		if ( empty( $options['trust_items'] ) ) $options['trust_items'] = $defaults['trust_items'];
		if ( empty( $options['glass_cards'] ) ) $options['glass_cards'] = $defaults['glass_cards'];
		if ( empty( $options['bottom_stats'] ) ) $options['bottom_stats'] = $defaults['bottom_stats'];

		return $options;
	}
}
