<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Investment;

/**
 * The Investment Admin manager.
 */
class Admin {

	/**
	 * The model instance.
	 *
	 * @var Investment
	 */
	protected $model;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->model = new Investment();
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
			'soldis_investment_group',
			'soldis_investment_settings',
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

		if ( isset( $input['enable_investment'] ) ) {
			$sanitized['enable_investment'] = sanitize_text_field( $input['enable_investment'] );
		} else {
			$sanitized['enable_investment'] = '0';
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

		// Blocks Repeater
		$sanitized['blocks'] = array();
		if ( isset( $input['blocks'] ) && is_array( $input['blocks'] ) ) {
			foreach ( $input['blocks'] as $block ) {
				$sanitized_block = array(
					'enabled'  => isset( $block['enabled'] ) ? sanitize_text_field( $block['enabled'] ) : '0',
					'title'    => isset( $block['title'] ) ? sanitize_text_field( $block['title'] ) : '',
					'desc'     => isset( $block['desc'] ) ? sanitize_textarea_field( $block['desc'] ) : '',
					'icon'     => isset( $block['icon'] ) ? sanitize_text_field( $block['icon'] ) : 'sparkles',
				);
				$sanitized['blocks'][] = $sanitized_block;
			}
		}

		return $sanitized;
	}

	/**
	 * Display the admin view content.
	 */
	public function display_admin_view() {
		$options = $this->model->get_options();
		require SOLDIS_LANDING_PATH . 'app/Modules/Homepage/Sections/Investment/views/admin.php';
	}
}
