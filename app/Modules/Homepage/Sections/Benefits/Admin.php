<?php

defined( 'ABSPATH' ) || exit;

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Benefits;

/**
 * The Benefits Admin manager.
 */
class Admin {

	/**
	 * The model instance.
	 *
	 * @var Benefits
	 */
	protected $model;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->model = new Benefits();
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
			'soldis_benefits_group',
			'soldis_benefits_settings',
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

		if ( isset( $input['enable_benefits'] ) ) {
			$sanitized['enable_benefits'] = sanitize_text_field( $input['enable_benefits'] );
		} else {
			$sanitized['enable_benefits'] = '0';
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

		if ( isset( $input['enable_animation'] ) ) {
			$sanitized['enable_animation'] = sanitize_text_field( $input['enable_animation'] );
		} else {
			$sanitized['enable_animation'] = '0';
		}

		if ( isset( $input['callout_enable'] ) ) {
			$sanitized['callout_enable'] = sanitize_text_field( $input['callout_enable'] );
		} else {
			$sanitized['callout_enable'] = '0';
		}

		// Benefits Repeater
		$sanitized['benefits'] = array();
		if ( isset( $input['benefits'] ) && is_array( $input['benefits'] ) ) {
			foreach ( $input['benefits'] as $benefit ) {
				$sanitized_benefit = array(
					'enabled'  => isset( $benefit['enabled'] ) ? sanitize_text_field( $benefit['enabled'] ) : '0',
					'title'    => isset( $benefit['title'] ) ? sanitize_text_field( $benefit['title'] ) : '',
					'desc'     => isset( $benefit['desc'] ) ? sanitize_textarea_field( $benefit['desc'] ) : '',
					'icon'     => isset( $benefit['icon'] ) ? sanitize_text_field( $benefit['icon'] ) : 'document-text',
				);
				$sanitized['benefits'][] = $sanitized_benefit;
			}
		}

		return $sanitized;
	}

	/**
	 * Display the admin view content.
	 */
	public function display_admin_view() {
		$options = $this->model->get_options();
		require SOLDIS_LANDING_PATH . 'app/Modules/Homepage/Sections/Benefits/views/admin.php';
	}
}

