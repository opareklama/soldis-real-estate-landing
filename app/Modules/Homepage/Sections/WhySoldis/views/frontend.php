<?php
defined( 'ABSPATH' ) || exit;

/**
 * WhySoldis Section Frontend View
 * 
 * @var array $options
 */

if (!function_exists('soldis_get_icon')) {
	function soldis_get_icon($name) {
		$icons = [
			'shield' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />',
			'document-text' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />',
			'speakerphone' => '<path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />',
			'target' => '<path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />', // Using lightning bolt as a proxy for target/fast result
			'check-circle' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />',
			'home' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />',
		];
		$path = $icons[$name] ?? $icons['check-circle'];
		return '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">' . $path . '</svg>';
	}
}
?>
<section class="soldis-why-section soldis-section" id="why-soldis" aria-label="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['heading'] ); ?>" role="region">
	<div class="soldis-container">
		
		<div class="soldis-why-header <?php defined( 'ABSPATH' ) || exit;

echo ! empty( $options['enable_animation'] ) ? 'soldis-animate-fade-up' : ''; ?>">
			<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['eyebrow'] ) ) : ?>
				<div class="soldis-why-eyebrow">
					<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['eyebrow'] ); ?>
				</div>
			<?php defined( 'ABSPATH' ) || exit;

endif; ?>

			<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['heading'] ) ) : ?>
				<h2 class="soldis-why-heading">
					<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['heading'] ); ?>
				</h2>
			<?php defined( 'ABSPATH' ) || exit;

endif; ?>

			<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['description'] ) ) : ?>
				<div class="soldis-why-description">
					<?php defined( 'ABSPATH' ) || exit;

echo wpautop( esc_html( $options['description'] ) ); ?>
				</div>
			<?php defined( 'ABSPATH' ) || exit;

endif; ?>
		</div>

		<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['cards'] ) ) : ?>
			<div class="soldis-why-grid">
				<?php defined( 'ABSPATH' ) || exit;

foreach ( $options['cards'] as $index => $card ) : ?>
					<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $card['enabled'] ) && ! empty( $card['title'] ) ) : ?>
						<div class="soldis-why-card soldis-bento-card-<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index + 1 ); ?> <?php defined( 'ABSPATH' ) || exit;

echo ! empty( $options['enable_animation'] ) ? 'soldis-animate-fade-up' : ''; ?>" style="animation-delay: <?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index * 0.1 ); ?>s;">
							<div class="soldis-why-card-icon">
								<?php defined( 'ABSPATH' ) || exit;

echo soldis_get_icon($card['icon']); ?>
							</div>
							<h3 class="soldis-why-card-title"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $card['title'] ); ?></h3>
							<div class="soldis-why-card-desc">
								<?php defined( 'ABSPATH' ) || exit;

echo wpautop( esc_html( $card['desc'] ) ); ?>
							</div>
						</div>
					<?php defined( 'ABSPATH' ) || exit;

endif; ?>
				<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
			</div>
		<?php defined( 'ABSPATH' ) || exit;

endif; ?>

		<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['callout_enable'] ) ) : ?>
			<div class="soldis-why-callout <?php defined( 'ABSPATH' ) || exit;

echo ! empty( $options['enable_animation'] ) ? 'soldis-animate-fade-up' : ''; ?>">
				<div class="soldis-why-callout-icon">
					<?php defined( 'ABSPATH' ) || exit;

echo soldis_get_icon($options['callout_icon']); ?>
				</div>
				<div class="soldis-why-callout-content">
					<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['callout_title'] ) ) : ?>
						<h3 class="soldis-why-callout-title"><?php defined( 'ABSPATH' ) || exit;

echo nl2br( esc_html( $options['callout_title'] ) ); ?></h3>
					<?php defined( 'ABSPATH' ) || exit;

endif; ?>
					<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['callout_desc'] ) ) : ?>
						<p class="soldis-why-callout-desc"><?php defined( 'ABSPATH' ) || exit;

echo nl2br( esc_html( $options['callout_desc'] ) ); ?></p>
					<?php defined( 'ABSPATH' ) || exit;

endif; ?>
				</div>
			</div>
		<?php defined( 'ABSPATH' ) || exit;

endif; ?>

	</div>
</section>

