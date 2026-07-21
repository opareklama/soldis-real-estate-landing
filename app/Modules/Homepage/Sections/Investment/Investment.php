<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Investment;

/**
 * The Investment section manager.
 */
class Investment {

	/**
	 * Get Investment options with fallbacks.
	 * 
	 * @return array
	 */
	public function get_options() {
		$defaults = array(
			'enable_investment' => '1',
			'eyebrow'           => 'MŪSŲ SKIRTUMAS',
			'heading'           => 'Kodėl investuojame iki 500 € į reklamą?',
			'description'       => "Mes tikime, kad geriausi rezultatai pasiekiami tada, kai nekilnojamasis turtas matomas tinkamiems žmonėms.\n\nTodėl investuojame savo lėšas į profesionalią reklamą ir aktyvią pirkėjų paiešką.",
			'pad_top_d'         => '80',
			'pad_bot_d'         => '80',
			'pad_top_t'         => '100',
			'pad_bot_t'         => '100',
			'pad_top_m'         => '80',
			'pad_bot_m'         => '80',
			'blocks'            => array(
				array( 'enabled' => '1', 'title' => 'Profesionali reklama', 'desc' => 'Kuriame individualią reklamos strategiją kiekvienam objektui, kad pasiektume kuo daugiau potencialių pirkėjų.', 'icon' => 'sparkles' ),
				array( 'enabled' => '1', 'title' => 'Facebook ir Instagram kampanijos', 'desc' => 'Investuojame į mokamą reklamą socialiniuose tinkluose ir pasiekiame tikslinę auditoriją.', 'icon' => 'globe' ),
				array( 'enabled' => '1', 'title' => 'Didesnis matomumas', 'desc' => 'Jūsų turtą mato daugiau žmonių, todėl padidėja tikimybė greičiau surasti tinkamą pirkėją.', 'icon' => 'eye' ),
				array( 'enabled' => '1', 'title' => 'Mūsų investicija', 'desc' => 'Iki 500 € reklamai investuojame savo lėšomis, nes tikime savo pardavimo strategija.', 'icon' => 'currency-euro' ),
			),
			'callout_enable'    => '1',
			'callout_title'     => 'Mes investuojame pirmi.',
			'callout_desc'      => 'Kai agentūra investuoja savo pinigus į Jūsų turto reklamą, tai parodo pasitikėjimą savo darbu ir siekį pasiekti geriausią rezultatą.',
		);

		$options = get_option( 'soldis_investment_settings', array() );
		$options = wp_parse_args( $options, $defaults );
		
		if ( empty( $options['blocks'] ) ) $options['blocks'] = $defaults['blocks'];

		return $options;
	}
}
