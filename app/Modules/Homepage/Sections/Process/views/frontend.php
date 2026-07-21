<?php
/**
 * Process Section Frontend View
 * 
 * @var array $options
 */

if (!function_exists('soldis_get_process_icon')) {
	function soldis_get_process_icon($name) {
		$icons = [
			'chat' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />',
			'calculator' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />',
			'camera' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />',
			'speakerphone' => '<path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />',
			'handshake' => '<path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A4 4 0 009.336 8.5h-1.67A2.002 2.002 0 005.67 9.833l-1.047 1.047a1 1 0 000 1.414l5.12 5.12a1 1 0 001.414 0l1.047-1.047a2.002 2.002 0 00-.167-3.003l-2.132-3.197z" /><path stroke-linecap="round" stroke-linejoin="round" d="M18.33 9.833l1.047 1.047a1 1 0 010 1.414l-5.12 5.12a1 1 0 01-1.414 0l-1.047-1.047a2.002 2.002 0 01.167-3.003l3.197-2.132A4 4 0 0117.336 8.5h1.67A2.002 2.002 0 0121 10.5v1.083" />',
			'document-check' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />', // using check-circle as fallback for document check
		];
		$path = $icons[$name] ?? $icons['chat'];
		return '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true">' . $path . '</svg>';
	}
}

$animation_class = ! empty( $options['enable_animation'] ) ? 'soldis-animate-fade-up' : '';
?>
<section class="soldis-process-section soldis-section" id="process" aria-label="<?php echo esc_attr( $options['heading'] ); ?>" role="region">
	<div class="soldis-container">
		
		<!-- Header -->
		<div class="soldis-process-header <?php echo $animation_class; ?>">
			<?php if ( ! empty( $options['eyebrow'] ) ) : ?>
				<div class="soldis-process-eyebrow">
					<?php echo esc_html( $options['eyebrow'] ); ?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $options['heading'] ) ) : ?>
				<h2 class="soldis-process-heading">
					<?php echo esc_html( $options['heading'] ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( ! empty( $options['description'] ) ) : ?>
				<div class="soldis-process-description">
					<?php echo wpautop( esc_html( $options['description'] ) ); ?>
				</div>
			<?php endif; ?>
		</div>

		<!-- Scroll-Animated Timeline Pipeline -->
		<div class="soldis-process-pipeline-wrap">
			
			<!-- The Glowing Track -->
			<div class="soldis-process-track" aria-hidden="true">
				<div class="soldis-process-track-fill" id="soldis-process-track-fill"></div>
			</div>

			<!-- The Steps -->
			<div class="soldis-process-steps">
				<?php if ( ! empty( $options['steps'] ) ) : ?>
					<?php foreach ( $options['steps'] as $index => $step ) : ?>
						<?php if ( ! empty( $step['enabled'] ) && ! empty( $step['title'] ) ) : ?>
							
							<?php
							// Format number (01, 02, etc.)
							$number = sprintf('%02d', $index + 1);
							// Create alternating layout rhythm (left / right / left) if desired, 
							// or just simple subtle margin shifts. Let's do a simple shift.
							$shift_class = ($index % 2 === 0) ? 'is-shifted-left' : 'is-shifted-right';
							?>

							<div class="soldis-process-step js-soldis-process-step <?php echo $shift_class; ?>">
								
								<!-- Track Node -->
								<div class="soldis-process-node" aria-hidden="true">
									<div class="soldis-process-node-inner"></div>
								</div>
								
								<!-- Step Card -->
								<div class="soldis-process-card">
									<div class="soldis-process-card-bg-number" aria-hidden="true">
										<?php echo $number; ?>
									</div>
									<div class="soldis-process-card-inner">
										<div class="soldis-process-card-header">
											<div class="soldis-process-card-number"><?php echo $number; ?></div>
											<div class="soldis-process-card-icon">
												<?php echo soldis_get_process_icon($step['icon']); ?>
											</div>
										</div>
										<h3 class="soldis-process-card-title"><?php echo esc_html( $step['title'] ); ?></h3>
										<div class="soldis-process-card-desc">
											<?php echo wpautop( esc_html( $step['desc'] ) ); ?>
										</div>
									</div>
								</div>
								
							</div>

						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>

		</div> <!-- /.soldis-process-pipeline-wrap -->

	</div> <!-- /.soldis-container -->

	<!-- Bottom Closing Banner (Full Width within section) -->
	<?php if ( ! empty( $options['callout_enable'] ) ) : ?>
		<div class="soldis-process-closing-wrap <?php echo $animation_class; ?>">
			<div class="soldis-container">
				<div class="soldis-process-closing-banner">
					<?php if ( ! empty( $options['callout_title'] ) ) : ?>
						<h3 class="soldis-process-closing-title"><?php echo esc_html( $options['callout_title'] ); ?></h3>
					<?php endif; ?>
					<?php if ( ! empty( $options['callout_desc'] ) ) : ?>
						<p class="soldis-process-closing-desc"><?php echo esc_html( $options['callout_desc'] ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

</section>
