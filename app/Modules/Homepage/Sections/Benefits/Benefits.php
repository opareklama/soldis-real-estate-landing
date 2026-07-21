<?php

defined( 'ABSPATH' ) || exit;

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Benefits;

/**
 * The Benefits section manager.
 */
class Benefits {

	/**
	 * Get Benefits options with fallbacks.
	 * 
	 * @return array
	 */
	public function get_options() {
		$defaults = array(
			'enable_benefits'  => '1',
			'eyebrow'          => 'JŪSŲ NAUDA',
			'heading'          => 'Ką Jūs gaunate dirbdami su SOLDIS?',
			'description'      => "Parduodami savo turtą su SOLDIS, gaunate ne tik nekilnojamojo turto brokerį.\n\nGaunate visą profesionalų pardavimo procesą – nuo objekto paruošimo iki sėkmingo sandorio.",
			'enable_animation' => '1',
			'pad_top_d'        => '100',
			'pad_bot_d'        => '100',
			'pad_top_t'        => '80',
			'pad_bot_t'        => '80',
			'pad_top_m'        => '60',
			'pad_bot_m'        => '60',
			'benefits'         => array(
				array( 'enabled' => '1', 'title' => 'Pardavimą be ilgalaikių įsipareigojimų', 'desc' => 'Sutartis sudaroma tik vienam mėnesiui ir gali būti nutraukta bet kada.', 'icon' => 'document-text' ),
				array( 'enabled' => '1', 'title' => 'Pardavimo garantiją', 'desc' => 'Jeigu per sutartą laikotarpį nepavyksta pasiekti sutarto rezultato, kompensuojame Jūsų sugaištą laiką.', 'icon' => 'shield-check' ),
				array( 'enabled' => '1', 'title' => 'Nemokamą turto vertinimą', 'desc' => 'Tiksliai įvertiname Jūsų turto rinkos vertę prieš pradedant pardavimą.', 'icon' => 'chart-bar' ),
				array( 'enabled' => '1', 'title' => 'Profesionalų objekto paruošimą', 'desc' => 'Paruošiame profesionalias nuotraukas, aprašymus ir visą pardavimo medžiagą.', 'icon' => 'camera' ),
				array( 'enabled' => '1', 'title' => 'Iki 500 € reklamai', 'desc' => 'Investuojame į Facebook, Instagram ir kitus reklamos kanalus, kad pasiektume tinkamus pirkėjus.', 'icon' => 'currency-euro' ),
				array( 'enabled' => '1', 'title' => 'Pilną pagalbą iki sandorio', 'desc' => 'Padedame viso proceso metu – nuo pirmo skambučio iki sėkmingo sandorio pas notarą.', 'icon' => 'users' ),
			),
			'callout_enable'   => '1',
			'callout_title'    => 'Viskas vienoje vietoje.',
			'callout_desc'     => 'Jums nereikia rūpintis reklama, dokumentais ar pirkėjų paieška. Mes pasirūpiname visu procesu.',
		);

		$options = get_option( 'soldis_benefits_settings', array() );
		$options = wp_parse_args( $options, $defaults );
		
		if ( empty( $options['benefits'] ) ) $options['benefits'] = $defaults['benefits'];

		return $options;
	}
}

