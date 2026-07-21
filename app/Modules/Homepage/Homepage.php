<?php

defined( 'ABSPATH' ) || exit;

namespace OpaReklama\SoldisLanding\Modules\Homepage;

/**
 * The Homepage module orchestrator.
 */
class Homepage {

	/**
	 * The admin instance.
	 *
	 * @var Admin
	 */
	protected $admin;

	/**
	 * The renderer instance.
	 *
	 * @var Renderer
	 */
	protected $renderer;

	/**
	 * Initialize the module.
	 */
	public function __construct() {
		$this->admin    = new Admin();
		$this->renderer = new Renderer();
	}

	/**
	 * Run the module.
	 */
	public function run() {
		$this->admin->run();
		$this->renderer->run();
		
		add_shortcode( 'soldis_homepage', array( $this->renderer, 'render_homepage' ) );
		add_filter( 'template_include', array( $this, 'load_canvas_template' ), 99 );
	}

	/**
	 * Load blank canvas template if shortcode is present.
	 */
	public function load_canvas_template( $template ) {
		if ( is_singular() && has_shortcode( get_post()->post_content, 'soldis_homepage' ) ) {
			$canvas = SOLDIS_LANDING_PATH . 'app/Modules/Homepage/views/canvas.php';
			if ( file_exists( $canvas ) ) {
				return $canvas;
			}
		}
		return $template;
	}
}

