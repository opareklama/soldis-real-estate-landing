<?php

defined( 'ABSPATH' ) || exit;

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\WhySoldis;

/**
 * The WhySoldis section manager.
 */
class WhySoldis {

	/**
	 * Get WhySoldis options with fallbacks.
	 * 
	 * @return array
	 */
	public function get_options() {
		$defaults = array(
			'enable_whysoldis' => '1',
			'eyebrow'          => 'KODĖL SOLDIS',
			'heading'          => 'Kodėl SOLDIS?',
			'description'      => "Dauguma agentūrų prašo pasitikėti pažadais.\n\nMes savo darbu tikime tiek,\nkad dalį rizikos prisiimame patys.\n\nJeigu nepavyksta pasiekti sutarto rezultato,\nkompensuojame Jūsų sugaištą laiką ir perduodame visą profesionaliai paruoštą pardavimo medžiagą.",
			'enable_animation' => '1',
			'pad_top_d'        => '100',
			'pad_bot_d'        => '100',
			'pad_top_t'        => '80',
			'pad_bot_t'        => '80',
			'pad_top_m'        => '60',
			'pad_bot_m'        => '60',
			'cards'            => array(
				array( 'enabled' => '1', 'title' => 'Pardavimo garantija', 'desc' => "Jeigu per 25 dienas neparduodame už sutartą rinkos kainą,\nkompensuojame Jūsų sugaištą laiką.", 'icon' => 'shield' ),
				array( 'enabled' => '1', 'title' => 'Jokių ilgalaikių įsipareigojimų', 'desc' => "Sutartis sudaroma vienam mėnesiui.\nGalite ją nutraukti bet kada.\nBe baudų ir netesybų.", 'icon' => 'document-text' ),
				array( 'enabled' => '1', 'title' => 'Profesionalus marketingas', 'desc' => "Kiekvienam objektui kuriame individualią reklamos strategiją,\nnaudojame profesionalias nuotraukas,\nvideo ir mokamą reklamą.", 'icon' => 'speakerphone' ),
				array( 'enabled' => '1', 'title' => 'Rezultatas svarbiausia', 'desc' => "Mūsų tikslas –\nparduoti Jūsų turtą už rinkos kainą\ngreitai ir sklandžiai.", 'icon' => 'target' ),
			),
			'callout_enable'   => '1',
			'callout_icon'     => 'check-circle',
			'callout_title'    => "Mes tikime savo darbu tiek,\nkad dalį rizikos prisiimame patys.",
			'callout_desc'     => "Todėl klientui suteikiame realią pardavimo garantiją,\no ne tik pažadus.",
		);

		$options = get_option( 'soldis_whysoldis_settings', array() );
		$options = wp_parse_args( $options, $defaults );
		
		if ( empty( $options['cards'] ) ) $options['cards'] = $defaults['cards'];

		return $options;
	}
}

