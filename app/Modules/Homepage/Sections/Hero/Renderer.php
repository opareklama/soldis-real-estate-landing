<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Hero;

defined( 'ABSPATH' ) || exit;



/**
 * The Hero section renderer.
 */
class Renderer {

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
	 * Run renderer logic.
	 */
	public function run() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Enqueue assets.
	 */
	public function enqueue_assets() {
		$options = $this->module->get_options();
		
		// Only enqueue if Hero is enabled
		if ( empty( $options['enable_hero'] ) ) {
			return;
		}

		wp_enqueue_style(
			'soldis-hero',
			SOLDIS_LANDING_URL . 'resources/css/hero.css',
			array(),
			SOLDIS_LANDING_VERSION,
			'all'
		);

		if ( ! empty( $options['enable_animation'] ) ) {
			wp_enqueue_script(
				'soldis-hero',
				SOLDIS_LANDING_URL . 'resources/js/hero.js',
				array(),
				SOLDIS_LANDING_VERSION,
				true
			);
		}
	}

	/**
	 * Render the section.
	 */
	public function render() {
		$options = $this->module->get_options();
		
		if ( empty( $options['enable_hero'] ) ) {
			return;
		}

		// CSS Variables for padding and background
		$bg_css = '';
		if ( $options['bg_type'] === 'solid' ) {
			$bg_css = "background-color: {$options['bg_color']};";
		} elseif ( $options['bg_type'] === 'gradient' ) {
			$bg_css = "background: {$options['bg_gradient']};";
		} elseif ( $options['bg_type'] === 'image' && ! empty( $options['bg_image'] ) ) {
			$bg_css = "background-image: url('{$options['bg_image']}'); background-size: cover; background-position: center;";
		}

		$style = "
			<style>
				.soldis-hero-section {
					--soldis-hero-pad-top-d: {$options['pad_top_d']}px;
					--soldis-hero-pad-bot-d: {$options['pad_bot_d']}px;
					--soldis-hero-pad-top-t: {$options['pad_top_t']}px;
					--soldis-hero-pad-bot-t: {$options['pad_bot_t']}px;
					--soldis-hero-pad-top-m: {$options['pad_top_m']}px;
					--soldis-hero-pad-bot-m: {$options['pad_bot_m']}px;
					--soldis-hero-content-w: {$options['content_width']}%;
					--soldis-hero-image-w: {$options['image_width']}%;
					{$bg_css}
				}
			</style>
		";

		echo $style;

		require SOLDIS_LANDING_PATH . 'app/Modules/Homepage/Sections/Hero/views/frontend.php';
	}
}

