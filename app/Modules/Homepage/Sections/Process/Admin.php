<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Process;

defined( 'ABSPATH' ) || exit;



/**
 * The Process Admin manager.
 */
class Admin {

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
	 * Run admin logic.
	 */
	public function run() {
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	/**
	 * Register settings.
	 */
	public function register_settings() {
		register_setting(
			'soldis_process_group',
			'soldis_process_settings',
			array(
				'type'              => 'array',
				'sanitize_callback' => array( $this, 'sanitize_settings' ),
			)
		);
	}

	/**
	 * Sanitize settings.
	 */
	public function sanitize_settings( $input ) {
		$sanitized = array();

		if ( isset( $input['enable_process'] ) ) {
			$sanitized['enable_process'] = sanitize_text_field( $input['enable_process'] );
		} else {
			$sanitized['enable_process'] = '0';
		}

		$text_fields = array(
			'eyebrow',
			'heading',
			'pad_top_d',
			'pad_bot_d',
			'pad_top_t',
			'pad_bot_t',
			'pad_top_m',
			'pad_bot_m',
			'callout_title',
		);

		foreach ( $text_fields as $field ) {
			if ( isset( $input[ $field ] ) ) {
				$sanitized[ $field ] = sanitize_text_field( $input[ $field ] );
			}
		}

		$textarea_fields = array(
			'description',
			'callout_desc',
		);

		foreach ( $textarea_fields as $field ) {
			if ( isset( $input[ $field ] ) ) {
				$sanitized[ $field ] = sanitize_textarea_field( $input[ $field ] );
			}
		}

		if ( isset( $input['callout_enable'] ) ) {
			$sanitized['callout_enable'] = sanitize_text_field( $input['callout_enable'] );
		} else {
			$sanitized['callout_enable'] = '0';
		}

		// Steps Repeater
		$sanitized['steps'] = array();
		if ( isset( $input['steps'] ) && is_array( $input['steps'] ) ) {
			foreach ( $input['steps'] as $step ) {
				$sanitized_step = array(
					'enabled'  => isset( $step['enabled'] ) ? sanitize_text_field( $step['enabled'] ) : '0',
					'title'    => isset( $step['title'] ) ? sanitize_text_field( $step['title'] ) : '',
					'desc'     => isset( $step['desc'] ) ? sanitize_textarea_field( $step['desc'] ) : '',
					'icon'     => isset( $step['icon'] ) ? sanitize_text_field( $step['icon'] ) : 'document-text',
				);
				$sanitized['steps'][] = $sanitized_step;
			}
		}

		return $sanitized;
	}

	/**
	 * Display the admin view content.
	 */
	public function display_admin_view() {
		$options = $this->model->get_options();
		require SOLDIS_LANDING_PATH . 'app/Modules/Homepage/Sections/Process/views/admin.php';
	}
}

