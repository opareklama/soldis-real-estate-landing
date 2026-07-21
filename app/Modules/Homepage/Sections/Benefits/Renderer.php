<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Benefits;

/**
 * The Benefits renderer manager.
 */
class Renderer {

	/**
	 * The model instance.
	 *
	 * @var Benefits
	 */
	protected $model;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->model = new Benefits();
	}

	/**
	 * Run renderer logic.
	 */
	public function run() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Enqueue frontend assets.
	 */
	public function enqueue_assets() {
		$options = $this->model->get_options();

		// Only enqueue if enabled
		if ( empty( $options['enable_benefits'] ) ) {
			return;
		}

		wp_enqueue_style(
			'soldis-benefits',
			SOLDIS_LANDING_URL . 'resources/css/benefits.css',
			array(),
			SOLDIS_LANDING_VERSION,
			'all'
		);

		wp_enqueue_script(
			'soldis-benefits',
			SOLDIS_LANDING_URL . 'resources/js/benefits.js',
			array(),
			SOLDIS_LANDING_VERSION,
			true
		);

		// Add dynamic inline CSS for padding
		$custom_css = "
			.soldis-benefits-section {
				padding-top: {$options['pad_top_d']}px;
				padding-bottom: {$options['pad_bot_d']}px;
			}
			@media (max-width: 1024px) {
				.soldis-benefits-section {
					padding-top: {$options['pad_top_t']}px;
					padding-bottom: {$options['pad_bot_t']}px;
				}
			}
			@media (max-width: 767px) {
				.soldis-benefits-section {
					padding-top: {$options['pad_top_m']}px;
					padding-bottom: {$options['pad_bot_m']}px;
				}
			}
		";

		wp_add_inline_style( 'soldis-benefits', $custom_css );
	}

	/**
	 * Render the section.
	 */
	public function render() {
		$options = $this->model->get_options();

		if ( empty( $options['enable_benefits'] ) ) {
			return;
		}

		require SOLDIS_LANDING_PATH . 'app/Modules/Homepage/Sections/Benefits/views/frontend.php';
	}
}
