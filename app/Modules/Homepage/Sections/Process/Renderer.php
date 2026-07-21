<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Process;

defined( 'ABSPATH' ) || exit;



/**
 * The Process renderer manager.
 */
class Renderer {

	/**
	 * The model instance.
	 *
	 * @var Process
	 */
	protected $model;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->model = new Process();
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
		if ( empty( $options['enable_process'] ) ) {
			return;
		}

		wp_enqueue_style(
			'soldis-process',
			SOLDIS_LANDING_URL . 'resources/css/process.css',
			array(),
			SOLDIS_LANDING_VERSION,
			'all'
		);

		wp_enqueue_script(
			'soldis-process',
			SOLDIS_LANDING_URL . 'resources/js/process.js',
			array(),
			SOLDIS_LANDING_VERSION,
			true
		);

		// Add dynamic inline CSS for padding
		$custom_css = "
			.soldis-process-section {
				padding-top: {$options['pad_top_d']}px;
				padding-bottom: {$options['pad_bot_d']}px;
			}
			@media (max-width: 1024px) {
				.soldis-process-section {
					padding-top: {$options['pad_top_t']}px;
					padding-bottom: {$options['pad_bot_t']}px;
				}
			}
			@media (max-width: 767px) {
				.soldis-process-section {
					padding-top: {$options['pad_top_m']}px;
					padding-bottom: {$options['pad_bot_m']}px;
				}
			}
		";

		wp_add_inline_style( 'soldis-process', $custom_css );
	}

	/**
	 * Render the section.
	 */
	public function render() {
		$options = $this->model->get_options();

		if ( empty( $options['enable_process'] ) ) {
			return;
		}

		require SOLDIS_LANDING_PATH . 'app/Modules/Homepage/Sections/Process/views/frontend.php';
	}
}

