<?php

defined( 'ABSPATH' ) || exit;

namespace OpaReklama\SoldisLanding\Modules\Homepage;

use OpaReklama\SoldisLanding\Modules\Homepage\Sections\Hero\Renderer as HeroRenderer;
use OpaReklama\SoldisLanding\Modules\Homepage\Sections\WhySoldis\Renderer as WhySoldisRenderer;
use OpaReklama\SoldisLanding\Modules\Homepage\Sections\Benefits\Renderer as BenefitsRenderer;
use OpaReklama\SoldisLanding\Modules\Homepage\Sections\Process\Renderer as ProcessRenderer;
use OpaReklama\SoldisLanding\Modules\Homepage\Sections\Investment\Renderer as InvestmentRenderer;
use OpaReklama\SoldisLanding\Modules\Homepage\Sections\Faq\Renderer as FaqRenderer;

/**
 * The Homepage renderer orchestrator.
 */
class Renderer {

	/**
	 * Hero Renderer Instance
	 * 
	 * @var HeroRenderer
	 */
	protected $hero_renderer;

	/**
	 * WhySoldis Renderer Instance
	 * 
	 * @var WhySoldisRenderer
	 */
	protected $whysoldis_renderer;

	/**
	 * Benefits Renderer Instance
	 * 
	 * @var BenefitsRenderer
	 */
	protected $benefits_renderer;
	protected $process_renderer;
	protected $investment_renderer;
	protected $faq_renderer;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->hero_renderer      = new HeroRenderer();
		$this->whysoldis_renderer = new WhySoldisRenderer();
		$this->benefits_renderer  = new BenefitsRenderer();
		$this->process_renderer   = new ProcessRenderer();
		$this->investment_renderer = new InvestmentRenderer();
		$this->faq_renderer        = new FaqRenderer();
	}

	/**
	 * Run renderer logic.
	 */
	public function run() {
		$this->hero_renderer->run();
		$this->whysoldis_renderer->run();
		$this->benefits_renderer->run();
		$this->process_renderer->run();
		$this->investment_renderer->run();
		$this->faq_renderer->run();
	}

	/**
	 * Render the homepage shortcode.
	 */
	public function render_homepage( $atts ) {
		ob_start();
		
		echo '<div class="soldis-homepage-wrapper">';
		
		// Render Hero
		$this->hero_renderer->render();

		// Render WhySoldis
		$this->whysoldis_renderer->render();

		// Render Benefits
		$this->benefits_renderer->render();

		// Render Process
		$this->process_renderer->render();

		// Render Investment
		$this->investment_renderer->render();

		// Render FAQ
		$this->faq_renderer->render();

		// Future sections (About, Timeline, FAQ, Contact) will be called here sequentially
		
		echo '</div>';

		return ob_get_clean();
	}
}

