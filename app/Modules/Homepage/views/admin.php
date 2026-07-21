<?php
defined( 'ABSPATH' ) || exit;

/**
 * Homepage Admin View
 *
 * Displays all built homepage section settings in a tabbed interface.
 * Only sections that are fully implemented are shown here.
 * Sections under development are not listed until they are ready.
 *
 * @package    OpaReklama\SoldisLanding
 * @author     OPA Reklama
 * @copyright  Copyright (c) OPA Reklama. All Rights Reserved.
 */
?>
<div class="wrap soldis-admin-wrap">
	<header class="soldis-admin-header">
		<div class="soldis-admin-header-content">
			<h1><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Homepage Settings', 'soldis-landing' ); ?></h1>
			<p class="soldis-admin-subtitle"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Manage all landing page sections — only completed sections are shown', 'soldis-landing' ); ?></p>
		</div>
		<div class="soldis-admin-header-badge">
			<strong><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Module', 'soldis-landing' ); ?></strong> &mdash; <?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Homepage', 'soldis-landing' ); ?>
		</div>
	</header>

	<form action="options.php" method="post" id="soldis-homepage-form">
		<?php
		defined( 'ABSPATH' ) || exit;

// Security nonces for all active section groups
		settings_fields( 'soldis_hero_group' );
		settings_fields( 'soldis_whysoldis_group' );
		settings_fields( 'soldis_benefits_group' );
		settings_fields( 'soldis_process_group' );
		settings_fields( 'soldis_investment_group' );
		settings_fields( 'soldis_faq_group' );
		?>

		<div class="soldis-tabs">
			<ul class="soldis-tab-nav">
				<li class="active" data-tab="hero"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Hero', 'soldis-landing' ); ?></li>
				<li data-tab="why-soldis"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Kodėl SOLDIS?', 'soldis-landing' ); ?></li>
				<li data-tab="benefits"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Ką Jūs gaunate?', 'soldis-landing' ); ?></li>
				<li data-tab="process"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Kaip parduodame?', 'soldis-landing' ); ?></li>
				<li data-tab="investment"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Kodėl investuojame?', 'soldis-landing' ); ?></li>
				<li data-tab="faq"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'DUK', 'soldis-landing' ); ?></li>
			</ul>

			<div class="soldis-tab-content">

				<!-- Hero Section -->
				<div class="soldis-tab-pane active" id="tab-hero">
					<?php defined( 'ABSPATH' ) || exit;

$this->hero_admin->display_admin_view(); ?>
				</div>

				<!-- Kodėl SOLDIS? -->
				<div class="soldis-tab-pane" id="tab-why-soldis">
					<?php defined( 'ABSPATH' ) || exit;

$this->whysoldis_admin->display_admin_view(); ?>
				</div>

				<!-- Ką Jūs gaunate? -->
				<div class="soldis-tab-pane" id="tab-benefits">
					<?php defined( 'ABSPATH' ) || exit;

$this->benefits_admin->display_admin_view(); ?>
				</div>

				<!-- Kaip parduodame? -->
				<div class="soldis-tab-pane" id="tab-process">
					<?php defined( 'ABSPATH' ) || exit;

$this->process_admin->display_admin_view(); ?>
				</div>

				<!-- Kodėl investuojame? -->
				<div class="soldis-tab-pane" id="tab-investment">
					<?php defined( 'ABSPATH' ) || exit;

$this->investment_admin->display_admin_view(); ?>
				</div>

				<!-- DUK / FAQ -->
				<div class="soldis-tab-pane" id="tab-faq">
					<?php defined( 'ABSPATH' ) || exit;

$this->faq_admin->display_admin_view(); ?>
				</div>

			</div><!-- /.soldis-tab-content -->
		</div><!-- /.soldis-tabs -->

		<?php defined( 'ABSPATH' ) || exit;

submit_button( __( 'Save Homepage Settings', 'soldis-landing' ) ); ?>
	</form>
</div>

