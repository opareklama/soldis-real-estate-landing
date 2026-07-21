<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Faq;

/**
 * The FAQ section manager.
 */
class Faq {

	/**
	 * Get FAQ options with fallbacks.
	 * 
	 * @return array
	 */
	public function get_options() {
		$defaults = array(
			'enable_faq'  => '1',
			'eyebrow'     => 'DUK',
			'heading'     => 'Dažniausiai užduodami klausimai',
			'description' => 'Atsakymai į svarbiausius klausimus apie nekilnojamojo turto pardavimą.',
			'pad_top_d'   => '80',
			'pad_bot_d'   => '80',
			'pad_top_t'   => '100',
			'pad_bot_t'   => '100',
			'pad_top_m'   => '80',
			'pad_bot_m'   => '80',
			'items'       => array(
				array( 'enabled' => '1', 'question' => 'Kiek kainuoja Jūsų paslaugos?', 'answer' => 'Mūsų paslaugų kaina priklauso nuo objekto ir sutartų pardavimo sąlygų. Niekada neprašome jokių išankstinių mokėjimų – atlygis mokamas tik po sėkmingo sandorio.', 'open' => '1' ),
				array( 'enabled' => '1', 'question' => 'Per kiek laiko vidutiniškai parduodate turtą?', 'answer' => 'Vidutiniškai pardavimo procesas trunka nuo 2 iki 8 savaičių, priklausomai nuo rinkos situacijos, objekto vietos ir nustatytos kainos. Dėl aktyvios reklamos dažnai randame pirkėją greičiau nei įprasta rinkos norma.', 'open' => '0' ),
				array( 'enabled' => '1', 'question' => 'Kas įskaičiuota į 500 € reklamos biudžetą?', 'answer' => 'Biudžetas skiriamas profesionalioms nuotraukoms, 3D turams, skelbimų iškėlimui portaluose bei mokamoms Facebook ir Instagram kampanijoms. Šią sumą investuojame mes, todėl Jums nieko papildomai mokėti nereikia.', 'open' => '0' ),
				array( 'enabled' => '1', 'question' => 'Ar man reikės tvarkyti dokumentus pačiam?', 'answer' => 'Ne, mes pasirūpiname visais su pardavimu susijusiais dokumentais, įskaitant notarines sutartis, pažymas bei bankų reikalavimus.', 'open' => '0' ),
			),
		);

		$options = get_option( 'soldis_faq_settings', array() );
		$options = wp_parse_args( $options, $defaults );
		
		if ( empty( $options['items'] ) ) $options['items'] = $defaults['items'];

		return $options;
	}
}
