<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Investment;

/**
 * The Investment renderer manager.
 */
class Renderer {

	/**
	 * The model instance.
	 *
	 * @var Investment
	 */
	protected $model;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->model = new Investment();
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
		if ( empty( $options['enable_investment'] ) ) {
			return;
		}

		wp_enqueue_style(
			'soldis-investment',
			SOLDIS_LANDING_URL . 'resources/css/investment.css',
			array(),
			SOLDIS_LANDING_VERSION,
			'all'
		);

		wp_enqueue_script(
			'soldis-investment',
			SOLDIS_LANDING_URL . 'resources/js/investment.js',
			array(),
			SOLDIS_LANDING_VERSION,
			true
		);

		// Add dynamic inline CSS for padding
		$custom_css = "
			.soldis-investment-section {
				padding-top: {$options['pad_top_d']}px;
				padding-bottom: {$options['pad_bot_d']}px;
			}
			@media (max-width: 1024px) {
				.soldis-investment-section {
					padding-top: {$options['pad_top_t']}px;
					padding-bottom: {$options['pad_bot_t']}px;
				}
			}
			@media (max-width: 767px) {
				.soldis-investment-section {
					padding-top: {$options['pad_top_m']}px;
					padding-bottom: {$options['pad_bot_m']}px;
				}
			}
		";

		wp_add_inline_style( 'soldis-investment', $custom_css );
	}

	/**
	 * Render the section.
	 */
	public function render() {
		$options = $this->model->get_options();

		if ( empty( $options['enable_investment'] ) ) {
			return;
		}

		require SOLDIS_LANDING_PATH . 'app/Modules/Homepage/Sections/Investment/views/frontend.php';
	}
}
