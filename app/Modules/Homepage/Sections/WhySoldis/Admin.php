<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\WhySoldis;

/**
 * The WhySoldis Admin manager.
 */
class Admin {

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
			'soldis_whysoldis_group',
			'soldis_whysoldis_settings',
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

		if ( isset( $input['enable_whysoldis'] ) ) {
			$sanitized['enable_whysoldis'] = sanitize_text_field( $input['enable_whysoldis'] );
		} else {
			$sanitized['enable_whysoldis'] = '0';
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
			'callout_icon',
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

		// Cards Repeater
		$sanitized['cards'] = array();
		if ( isset( $input['cards'] ) && is_array( $input['cards'] ) ) {
			foreach ( $input['cards'] as $card ) {
				$sanitized_card = array(
					'enabled'  => isset( $card['enabled'] ) ? sanitize_text_field( $card['enabled'] ) : '0',
					'title'    => isset( $card['title'] ) ? sanitize_text_field( $card['title'] ) : '',
					'desc'     => isset( $card['desc'] ) ? sanitize_textarea_field( $card['desc'] ) : '',
					'icon'     => isset( $card['icon'] ) ? sanitize_text_field( $card['icon'] ) : 'check-circle',
				);
				$sanitized['cards'][] = $sanitized_card;
			}
		}

		return $sanitized;
	}

	/**
	 * Display the admin view content.
	 */
	public function display_admin_view() {
		$options = $this->model->get_options();
		require SOLDIS_LANDING_PATH . 'app/Modules/Homepage/Sections/WhySoldis/views/admin.php';
	}
}
