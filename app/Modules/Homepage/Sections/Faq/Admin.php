<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Faq;

/**
 * The FAQ Admin manager.
 */
class Admin {

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
			'soldis_faq_group',
			'soldis_faq_settings',
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

		if ( isset( $input['enable_faq'] ) ) {
			$sanitized['enable_faq'] = sanitize_text_field( $input['enable_faq'] );
		} else {
			$sanitized['enable_faq'] = '0';
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
		);

		foreach ( $text_fields as $field ) {
			if ( isset( $input[ $field ] ) ) {
				$sanitized[ $field ] = sanitize_text_field( $input[ $field ] );
			}
		}

		$textarea_fields = array(
			'description',
		);

		foreach ( $textarea_fields as $field ) {
			if ( isset( $input[ $field ] ) ) {
				$sanitized[ $field ] = sanitize_textarea_field( $input[ $field ] );
			}
		}

		// Items Repeater
		$sanitized['items'] = array();
		if ( isset( $input['items'] ) && is_array( $input['items'] ) ) {
			foreach ( $input['items'] as $item ) {
				$sanitized_item = array(
					'enabled'  => isset( $item['enabled'] ) ? sanitize_text_field( $item['enabled'] ) : '0',
					'question' => isset( $item['question'] ) ? sanitize_text_field( $item['question'] ) : '',
					'answer'   => isset( $item['answer'] ) ? wp_kses_post( $item['answer'] ) : '',
					'open'     => isset( $item['open'] ) ? sanitize_text_field( $item['open'] ) : '0',
				);
				$sanitized['items'][] = $sanitized_item;
			}
		}

		return $sanitized;
	}

	/**
	 * Display the admin view content.
	 */
	public function display_admin_view() {
		$options = $this->model->get_options();
		require SOLDIS_LANDING_PATH . 'app/Modules/Homepage/Sections/Faq/views/admin.php';
	}
}
