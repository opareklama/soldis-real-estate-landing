<?php

namespace OpaReklama\SoldisLanding\Foundation;

defined( 'ABSPATH' ) || exit;

/**
 * The GitHub Updater class.
 * Provides production-grade automatic updates from GitHub Releases.
 */
class Updater {

	/**
	 * GitHub Repository URL
	 * @var string
	 */
	protected $github_repo = 'opareklama/soldis-real-estate-landing';

	/**
	 * The plugin basename
	 * @var string
	 */
	protected $plugin_slug;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->plugin_slug = plugin_basename( SOLDIS_LANDING_PATH . 'soldis-landing.php' );
	}

	/**
	 * Initialize the updater.
	 */
	public function run() {
		add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'check_update' ) );
		add_filter( 'plugins_api', array( $this, 'plugin_info' ), 10, 3 );
		add_filter( 'upgrader_source_selection', array( $this, 'rename_github_zip_directory' ), 10, 3 );
	}

	/**
	 * Fetch latest release from GitHub API with caching.
	 */
	public function get_github_release() {
		$transient_key = 'soldis_landing_github_release';

		// Bypass cache ONLY ONCE per request if user clicked "Check again"
		static $bypassed = false;
		if ( ! empty( $_GET['force-check'] ) && ! $bypassed ) {
			delete_transient( $transient_key );
			$bypassed = true;
		}

		$release = get_transient( $transient_key );

		if ( false !== $release ) {
			return $release;
		}

		$url = 'https://api.github.com/repos/' . $this->github_repo . '/releases/latest';

		$request = wp_remote_get( $url, array(
			'timeout' => 10,
			'headers' => array(
				'Accept' => 'application/vnd.github.v3+json',
			),
		) );

		if ( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) !== 200 ) {
			// Fail gracefully, cache false for a short time to avoid slamming GitHub API
			set_transient( $transient_key, null, HOUR_IN_SECONDS );
			return null;
		}

		$body = json_decode( wp_remote_retrieve_body( $request ) );

		if ( ! $body || empty( $body->tag_name ) ) {
			set_transient( $transient_key, null, HOUR_IN_SECONDS );
			return null;
		}

		// Clean semantic version (remove 'v' prefix if present)
		$version = ltrim( $body->tag_name, 'v' );

		// Validate Semantic Versioning
		if ( ! preg_match( '/^\d+\.\d+\.\d+$/', $version ) ) {
			set_transient( $transient_key, null, HOUR_IN_SECONDS );
			return null;
		}

		// Ignore pre-releases (GitHub API 'latest' usually ignores them, but just to be sure)
		if ( ! empty( $body->prerelease ) || ! empty( $body->draft ) ) {
			set_transient( $transient_key, null, HOUR_IN_SECONDS );
			return null;
		}

		$release_data = array(
			'version'      => $version,
			'download_url' => $body->zipball_url, // Using native GitHub zipball
			'url'          => $body->html_url,
			'changelog'    => $body->body,
			'checked_at'   => current_time( 'mysql' ),
		);

		// Cache for 6 hours
		set_transient( $transient_key, $release_data, 6 * HOUR_IN_SECONDS );

		return $release_data;
	}

	/**
	 * Inject update data into WordPress transient.
	 */
	public function check_update( $transient ) {
		if ( empty( $transient->checked ) ) {
			return $transient;
		}

		$release = $this->get_github_release();

		if ( ! $release ) {
			return $transient;
		}

		if ( version_compare( SOLDIS_LANDING_VERSION, $release['version'], '<' ) ) {
			$obj              = new \stdClass();
			$obj->slug        = 'soldis-landing';
			$obj->plugin      = $this->plugin_slug;
			$obj->new_version = $release['version'];
			$obj->url         = $release['url'];
			$obj->package     = $release['download_url'];

			$transient->response[ $this->plugin_slug ] = $obj;
		} else {
			// Ensure it's not marked as needing an update
			if ( isset( $transient->response[ $this->plugin_slug ] ) ) {
				unset( $transient->response[ $this->plugin_slug ] );
			}
		}

		return $transient;
	}

	/**
	 * Provide plugin information for the "View version details" modal.
	 */
	public function plugin_info( $res, $action, $args ) {
		if ( 'plugin_information' !== $action ) {
			return $res;
		}

		if ( empty( $args->slug ) || 'soldis-landing' !== $args->slug ) {
			return $res;
		}

		$release = $this->get_github_release();

		if ( ! $release ) {
			return $res;
		}

		$res = new \stdClass();
		$res->name          = 'SOLDIS Real Estate Landing Engine';
		$res->slug          = 'soldis-landing';
		$res->version       = $release['version'];
		$res->author        = '<a href="https://www.opareklama.lt/">OPA Reklama</a>';
		$res->homepage      = 'https://github.com/opareklama/soldis-real-estate-landing';
		$res->download_link = $release['download_url'];
		$res->sections      = array(
			'description' => 'A modular, high-performance WordPress landing page engine designed specifically for the SOLDIS Real Estate project.',
			'changelog'   => wpautop( esc_html( $release['changelog'] ) ),
		);

		return $res;
	}

	/**
	 * Fix GitHub directory structure.
	 * GitHub zipballs extract into `repo-name-commitHash/`. 
	 * We need it to be `soldis-landing/` so WordPress updates it correctly.
	 */
	public function rename_github_zip_directory( $source, $remote_source, $upgrader ) {
		global $wp_filesystem;

		// If the extracted folder contains our GitHub repo name, it's our plugin
		if ( strpos( $source, 'opareklama-soldis-real-estate-landing' ) === false ) {
			return $source;
		}

		// Correct the folder name to 'soldis-landing/'
		$corrected_source = trailingslashit( $remote_source ) . 'soldis-landing/';

		if ( $wp_filesystem->move( $source, $corrected_source, true ) ) {
			return $corrected_source;
		}

		return $source;
	}
}
