<?php
defined( 'ABSPATH' ) || exit;

/**
 * Investment Section Frontend View
 * 
 * @var array $options
 */

if (!function_exists('soldis_get_investment_icon')) {
	function soldis_get_investment_icon($name) {
		$icons = [
			'sparkles' => '<path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-1.81.688l1.154 5.373c.108.503-.43.896-.867.653L10 16.92a.563.563 0 00-.534 0l-4.71 2.78c-.438.243-.975-.15-.867-.653l1.154-5.373a.563.563 0 00-.181-.688l-4.204-3.602c-.38-.325-.178-.948.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />',
			'globe' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />',
			'eye' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />',
			'currency-euro' => '<path stroke-linecap="round" stroke-linejoin="round" d="M14.25 7.756a4.5 4.5 0 100 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
		];
		$path = $icons[$name] ?? $icons['sparkles'];
		return '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">' . $path . '</svg>';
	}
}

$animation_class = ! empty( $options['enable_animation'] ) ? 'soldis-animate-fade-up' : '';
?>
<section class="soldis-investment-section soldis-section" id="investment" aria-label="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['heading'] ); ?>" role="region">
	<!-- Deep Canvas Gradient Overlay -->
	<div class="soldis-inv-canvas-glow"></div>

	<div class="soldis-container">
		
		<!-- Header -->
		<div class="soldis-inv-header <?php defined( 'ABSPATH' ) || exit;

echo $animation_class; ?>">
			<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['eyebrow'] ) ) : ?>
				<div class="soldis-inv-eyebrow">
					<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['eyebrow'] ); ?>
				</div>
			<?php defined( 'ABSPATH' ) || exit;

endif; ?>

			<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['heading'] ) ) : ?>
				<h2 class="soldis-inv-heading">
					<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['heading'] ); ?>
				</h2>
			<?php defined( 'ABSPATH' ) || exit;

endif; ?>

			<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['description'] ) ) : ?>
				<div class="soldis-inv-description">
					<?php defined( 'ABSPATH' ) || exit;

echo wpautop( esc_html( $options['description'] ) ); ?>
				</div>
			<?php defined( 'ABSPATH' ) || exit;

endif; ?>
		</div>

		<!-- The Marketing Pillars (Dynamic Expansion Accordion) -->
		<div class="soldis-inv-pillars-wrap <?php defined( 'ABSPATH' ) || exit;

echo $animation_class; ?>">
			<div class="soldis-inv-pillars" id="soldis-inv-pillars">
				<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['blocks'] ) ) : ?>
					<?php 
					defined( 'ABSPATH' ) || exit;

$first_active = true;
					foreach ( $options['blocks'] as $index => $block ) : 
					?>
						<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $block['enabled'] ) && ! empty( $block['title'] ) ) : ?>
							
							<?php
							defined( 'ABSPATH' ) || exit;

$number = sprintf('%02d', $index + 1);
							$active_class = $first_active ? 'is-active' : '';
							$first_active = false;
							?>

							<article class="soldis-inv-pillar js-soldis-inv-pillar <?php defined( 'ABSPATH' ) || exit;

echo $active_class; ?>" tabindex="0" role="button" aria-expanded="<?php defined( 'ABSPATH' ) || exit;

echo $active_class ? 'true' : 'false'; ?>">
								
								<!-- Background Image/Gradient (Optional, currently just premium glass) -->
								<div class="soldis-inv-pillar-bg"></div>

								<!-- Content -->
								<div class="soldis-inv-pillar-content">
									<div class="soldis-inv-pillar-header">
										<div class="soldis-inv-pillar-num"><?php defined( 'ABSPATH' ) || exit;

echo $number; ?></div>
										<div class="soldis-inv-pillar-icon">
											<?php defined( 'ABSPATH' ) || exit;

echo soldis_get_investment_icon($block['icon']); ?>
										</div>
									</div>

									<div class="soldis-inv-pillar-body">
										<h3 class="soldis-inv-pillar-title"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $block['title'] ); ?></h3>
										
										<div class="soldis-inv-pillar-desc-wrap">
											<div class="soldis-inv-pillar-desc">
												<?php defined( 'ABSPATH' ) || exit;

echo wpautop( esc_html( $block['desc'] ) ); ?>
											</div>
										</div>
									</div>
								</div>
								
							</article>

						<?php defined( 'ABSPATH' ) || exit;

endif; ?>
					<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
				<?php defined( 'ABSPATH' ) || exit;

endif; ?>
			</div>
		</div> <!-- /.soldis-inv-pillars-wrap -->

		<!-- Bottom Closing Callout -->
		<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['callout_enable'] ) ) : ?>
			<div class="soldis-inv-closing-wrap <?php defined( 'ABSPATH' ) || exit;

echo $animation_class; ?>">
				<div class="soldis-inv-closing-box">
					<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['callout_title'] ) ) : ?>
						<h3 class="soldis-inv-closing-title"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['callout_title'] ); ?></h3>
					<?php defined( 'ABSPATH' ) || exit;

endif; ?>
					<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['callout_desc'] ) ) : ?>
						<div class="soldis-inv-closing-desc">
							<?php defined( 'ABSPATH' ) || exit;

echo wpautop( esc_html( $options['callout_desc'] ) ); ?>
						</div>
					<?php defined( 'ABSPATH' ) || exit;

endif; ?>
				</div>
			</div>
		<?php defined( 'ABSPATH' ) || exit;

endif; ?>

	</div> <!-- /.soldis-container -->
</section>

