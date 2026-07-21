<?php

namespace OpaReklama\SoldisLanding\Modules\Homepage\Sections\Process;

/**
 * The Process section manager.
 */
class Process {

	/**
	 * Get Process options with fallbacks.
	 * 
	 * @return array
	 */
	public function get_options() {
		$defaults = array(
			'enable_process'   => '1',
			'eyebrow'          => 'KAIP TAI VYKSTA',
			'heading'          => 'Kaip parduodame Jūsų turtą?',
			'description'      => "Aiškus ir skaidrus procesas nuo pirmojo pokalbio iki sėkmingo sandorio.\n\nKiekviename etape pasirūpiname viskuo, kad Jums nereikėtų rūpintis sudėtingomis detalėmis.",
			'pad_top_d'        => '100',
			'pad_bot_d'        => '100',
			'pad_top_t'        => '80',
			'pad_bot_t'        => '80',
			'pad_top_m'        => '60',
			'pad_bot_m'        => '60',
			'steps'            => array(
				array( 'enabled' => '1', 'title' => 'Pirminė konsultacija', 'desc' => 'Susipažįstame su Jūsų situacija, aptariame tikslus ir atsakome į visus klausimus.', 'icon' => 'chat' ),
				array( 'enabled' => '1', 'title' => 'Turto vertinimas', 'desc' => 'Įvertiname objekto rinkos vertę ir parengiame tinkamiausią pardavimo strategiją.', 'icon' => 'calculator' ),
				array( 'enabled' => '1', 'title' => 'Objekto paruošimas', 'desc' => 'Paruošiame profesionalias nuotraukas, aprašymus ir visą pardavimui reikalingą medžiagą.', 'icon' => 'camera' ),
				array( 'enabled' => '1', 'title' => 'Reklama ir pirkėjų paieška', 'desc' => 'Investuojame į reklamą ir aktyviai ieškome tinkamiausių pirkėjų.', 'icon' => 'speakerphone' ),
				array( 'enabled' => '1', 'title' => 'Derybos', 'desc' => 'Vedame derybas Jūsų naudai ir padedame pasiekti geriausią įmanomą pardavimo rezultatą.', 'icon' => 'handshake' ),
				array( 'enabled' => '1', 'title' => 'Sėkmingas sandoris', 'desc' => 'Padedame sutvarkyti visus dokumentus ir lydime Jus iki galutinio sandorio pasirašymo.', 'icon' => 'document-check' ),
			),
			'callout_enable'   => '1',
			'callout_title'    => 'Paprastas procesas. Profesionalus rezultatas.',
			'callout_desc'     => 'Nuo pirmos konsultacijos iki galutinio sandorio – kiekviename žingsnyje dirbame tam, kad Jūsų turto pardavimas būtų sklandus, saugus ir sėkmingas.',
		);

		$options = get_option( 'soldis_process_settings', array() );
		$options = wp_parse_args( $options, $defaults );
		
		if ( empty( $options['steps'] ) ) $options['steps'] = $defaults['steps'];

		return $options;
	}
}
