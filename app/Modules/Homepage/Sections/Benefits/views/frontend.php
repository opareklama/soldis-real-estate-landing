<?php
defined( 'ABSPATH' ) || exit;

/**
 * Benefits Section Frontend View
 * 
 * @var array $options
 */

if (!function_exists('soldis_get_icon')) {
	// Fallback if not defined, though it's defined in WhySoldis.
	// But it's better to ensure this section works independently.
	// We'll define a unique prefix to avoid conflicts just in case.
}
function soldis_get_benefit_icon($name) {
	$icons = [
		'document-text' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />',
		'shield-check' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />',
		'chart-bar' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />',
		'camera' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />',
		'currency-euro' => '<path stroke-linecap="round" stroke-linejoin="round" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z" />', // Proxy icon if euro not available
		'users' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />',
	];
	$path = $icons[$name] ?? $icons['document-text'];
	return '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">' . $path . '</svg>';
}

// Ensure active items start clean
$animation_class = ! empty( $options['enable_animation'] ) ? 'soldis-animate-fade-up' : '';
?>
<section class="soldis-benefits-section soldis-section" id="benefits" aria-label="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['heading'] ); ?>" role="region">
	<div class="soldis-container">
		
		<div class="soldis-benefits-layout">
			
			<!-- Sticky Left Sidebar -->
			<div class="soldis-benefits-sidebar">
				<div class="soldis-benefits-sticky-content <?php defined( 'ABSPATH' ) || exit;

echo $animation_class; ?>">
					<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['eyebrow'] ) ) : ?>
						<div class="soldis-benefits-eyebrow">
							<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['eyebrow'] ); ?>
						</div>
					<?php defined( 'ABSPATH' ) || exit;

endif; ?>

					<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['heading'] ) ) : ?>
						<h2 class="soldis-benefits-heading">
							<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['heading'] ); ?>
						</h2>
					<?php defined( 'ABSPATH' ) || exit;

endif; ?>

					<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['description'] ) ) : ?>
						<div class="soldis-benefits-description">
							<?php defined( 'ABSPATH' ) || exit;

echo wpautop( esc_html( $options['description'] ) ); ?>
						</div>
					<?php defined( 'ABSPATH' ) || exit;

endif; ?>
				</div>
			</div>

			<!-- Scrolling Right List -->
			<div class="soldis-benefits-list">
				<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['benefits'] ) ) : ?>
					<?php defined( 'ABSPATH' ) || exit;

foreach ( $options['benefits'] as $index => $benefit ) : ?>
						<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $benefit['enabled'] ) && ! empty( $benefit['title'] ) ) : ?>
							
							<?php
							defined( 'ABSPATH' ) || exit;

// Format number (01, 02, etc.)
							$number = sprintf('%02d', $index + 1);
							?>

							<div class="soldis-benefit-item js-soldis-scroll-detect <?php defined( 'ABSPATH' ) || exit;

echo $animation_class; ?>" style="animation-delay: <?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index * 0.1 ); ?>s;">
								
								<div class="soldis-benefit-number">
									<?php defined( 'ABSPATH' ) || exit;

echo $number; ?>
								</div>

								<div class="soldis-benefit-icon">
									<?php defined( 'ABSPATH' ) || exit;

echo soldis_get_benefit_icon($benefit['icon']); ?>
								</div>
								
								<div class="soldis-benefit-content">
									<h3 class="soldis-benefit-title"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $benefit['title'] ); ?></h3>
									<div class="soldis-benefit-desc">
										<?php defined( 'ABSPATH' ) || exit;

echo wpautop( esc_html( $benefit['desc'] ) ); ?>
									</div>
								</div>
								
							</div>

						<?php defined( 'ABSPATH' ) || exit;

endif; ?>
					<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
				<?php defined( 'ABSPATH' ) || exit;

endif; ?>
			</div>

		</div> <!-- /.soldis-benefits-layout -->

		<!-- Bottom Closing Banner -->
		<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['callout_enable'] ) ) : ?>
			<div class="soldis-benefits-closing-banner <?php defined( 'ABSPATH' ) || exit;

echo $animation_class; ?>">
				<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['callout_title'] ) ) : ?>
					<h3 class="soldis-benefits-closing-title"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['callout_title'] ); ?></h3>
				<?php defined( 'ABSPATH' ) || exit;

endif; ?>
				<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['callout_desc'] ) ) : ?>
					<p class="soldis-benefits-closing-desc"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['callout_desc'] ); ?></p>
				<?php defined( 'ABSPATH' ) || exit;

endif; ?>
			</div>
		<?php defined( 'ABSPATH' ) || exit;

endif; ?>

	</div>
</section>

