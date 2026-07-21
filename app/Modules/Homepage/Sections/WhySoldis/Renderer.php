<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\WhySoldis;

defined( 'ABSPATH' ) || exit;



/**
 * The WhySoldis renderer manager.
 */
class Renderer {

	/**
	 * The model instance.
	 *
	 * @var WhySoldis
	 */
	protected $model;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->model = new WhySoldis();
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
		if ( empty( $options['enable_whysoldis'] ) ) {
			return;
		}

		wp_enqueue_style(
			'soldis-why-soldis',
			SOLDIS_LANDING_URL . 'resources/css/why-soldis.css',
			array(),
			SOLDIS_LANDING_VERSION,
			'all'
		);

		// Add dynamic inline CSS for padding
		$custom_css = "
			.soldis-why-section {
				padding-top: {$options['pad_top_d']}px;
				padding-bottom: {$options['pad_bot_d']}px;
			}
			@media (max-width: 1024px) {
				.soldis-why-section {
					padding-top: {$options['pad_top_t']}px;
					padding-bottom: {$options['pad_bot_t']}px;
				}
			}
			@media (max-width: 767px) {
				.soldis-why-section {
					padding-top: {$options['pad_top_m']}px;
					padding-bottom: {$options['pad_bot_m']}px;
				}
			}
		";

		wp_add_inline_style( 'soldis-why-soldis', $custom_css );
	}

	/**
	 * Render the section.
	 */
	public function render() {
		$options = $this->model->get_options();

		if ( empty( $options['enable_whysoldis'] ) ) {
			return;
		}

		require SOLDIS_LANDING_PATH . 'app/Modules/Homepage/Sections/WhySoldis/views/frontend.php';
	}
}

