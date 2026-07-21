<?php

namespace OpaReklama\SoldisLanding\Foundation;

defined( 'ABSPATH' ) || exit;



/**
 * Fired during plugin deactivation.
 */
class Deactivator {

	/**
	 * Deactivate the plugin.
	 */
	public static function deactivate() {
		// Add deactivation logic here.
		flush_rewrite_rules();
	}
}

