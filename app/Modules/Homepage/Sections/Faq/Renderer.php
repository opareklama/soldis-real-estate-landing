<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Faq;

/**
 * The FAQ Frontend manager.
 */
class Renderer {

	/**
	 * The model instance.
	 *
	 * @var Faq
	 */
	protected $model;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->model = new Faq();
	}

	/**
	 * Run frontend logic.
	 */
	public function run() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
		add_action( 'wp_head', array( $this, 'render_dynamic_css' ) );
	}

	/**
	 * Enqueue assets.
	 */
	public function enqueue_assets() {
		$options = $this->model->get_options();
		
		if ( empty( $options['enable_faq'] ) ) {
			return; // Don't load if disabled
		}

		// CSS
		wp_enqueue_style(
			'soldis-faq-css',
			SOLDIS_LANDING_URL . 'resources/css/faq.css',
			array(),
			SOLDIS_LANDING_VERSION
		);

		// JS
		wp_enqueue_script(
			'soldis-faq-js',
			SOLDIS_LANDING_URL . 'resources/js/faq.js',
			array(),
			SOLDIS_LANDING_VERSION,
			true
		);
	}

	/**
	 * Render dynamic CSS.
	 */
	public function render_dynamic_css() {
		$options = $this->model->get_options();
		
		if ( empty( $options['enable_faq'] ) ) {
			return;
		}

		$pad_top_d = ! empty( $options['pad_top_d'] ) ? intval( $options['pad_top_d'] ) : 80;
		$pad_bot_d = ! empty( $options['pad_bot_d'] ) ? intval( $options['pad_bot_d'] ) : 80;
		
		$pad_top_t = ! empty( $options['pad_top_t'] ) ? intval( $options['pad_top_t'] ) : 100;
		$pad_bot_t = ! empty( $options['pad_bot_t'] ) ? intval( $options['pad_bot_t'] ) : 100;
		
		$pad_top_m = ! empty( $options['pad_top_m'] ) ? intval( $options['pad_top_m'] ) : 80;
		$pad_bot_m = ! empty( $options['pad_bot_m'] ) ? intval( $options['pad_bot_m'] ) : 80;
		
		echo "<style>
			#faq {
				padding-top: {$pad_top_d}px;
				padding-bottom: {$pad_bot_d}px;
			}
			@media (max-width: 1024px) {
				#faq {
					padding-top: {$pad_top_t}px;
					padding-bottom: {$pad_bot_t}px;
				}
			}
			@media (max-width: 768px) {
				#faq {
					padding-top: {$pad_top_m}px;
					padding-bottom: {$pad_bot_m}px;
				}
			}
		</style>";
	}

	/**
	 * Render the section HTML.
	 */
	public function render() {
		$options = $this->model->get_options();

		if ( empty( $options['enable_faq'] ) ) {
			return;
		}

		require SOLDIS_LANDING_PATH . 'app/Modules/Homepage/Sections/Faq/views/frontend.php';
	}
}
