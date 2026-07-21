<?php
defined( 'ABSPATH' ) || exit;

/**
 * FAQ Section Frontend View
 * 
 * @var array $options
 */

$animation_class = ! empty( $options['enable_animation'] ) ? 'soldis-animate-fade-up' : '';
?>
<section class="soldis-faq-section soldis-section" id="faq" aria-label="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['heading'] ); ?>" role="region">
	<div class="soldis-container">
		
		<div class="soldis-faq-layout">
			
			<!-- Header -->
			<div class="soldis-faq-header <?php defined( 'ABSPATH' ) || exit;

echo $animation_class; ?>">
				<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['eyebrow'] ) ) : ?>
					<div class="soldis-faq-eyebrow">
						<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['eyebrow'] ); ?>
					</div>
				<?php defined( 'ABSPATH' ) || exit;

endif; ?>

				<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['heading'] ) ) : ?>
					<h2 class="soldis-faq-heading">
						<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['heading'] ); ?>
					</h2>
				<?php defined( 'ABSPATH' ) || exit;

endif; ?>

				<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['description'] ) ) : ?>
					<div class="soldis-faq-description">
						<?php defined( 'ABSPATH' ) || exit;

echo wpautop( esc_html( $options['description'] ) ); ?>
					</div>
				<?php defined( 'ABSPATH' ) || exit;

endif; ?>
			</div>

			<!-- FAQ List -->
			<div class="soldis-faq-list-wrap <?php defined( 'ABSPATH' ) || exit;

echo $animation_class; ?>">
				<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['items'] ) ) : ?>
					<div class="soldis-faq-list" role="tablist" aria-label="<?php defined( 'ABSPATH' ) || exit;

esc_attr_e('Frequently Asked Questions', 'soldis-landing'); ?>">
						
						<?php 
						defined( 'ABSPATH' ) || exit;

foreach ( $options['items'] as $index => $item ) : 
							if ( empty( $item['enabled'] ) || empty( $item['question'] ) ) {
								continue;
							}
							
							$number = sprintf('%02d', $index + 1);
							$is_open = ! empty( $item['open'] );
							$active_class = $is_open ? 'is-active' : '';
							$expanded_attr = $is_open ? 'true' : 'false';
							$content_id = 'faq-content-' . $index;
							$tab_id = 'faq-tab-' . $index;
						?>
							
							<div class="soldis-faq-item <?php defined( 'ABSPATH' ) || exit;

echo $active_class; ?>">
								<div 
									id="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $tab_id ); ?>"
									class="soldis-faq-question js-soldis-faq-toggle" 
									aria-expanded="<?php defined( 'ABSPATH' ) || exit;

echo $expanded_attr; ?>" 
									aria-controls="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $content_id ); ?>"
									role="button"
									tabindex="0"
								>
									<span class="soldis-faq-number"><?php defined( 'ABSPATH' ) || exit;

echo $number; ?></span>
									<span class="soldis-faq-text"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $item['question'] ); ?></span>
									<span class="soldis-faq-icon" aria-hidden="true">
										<!-- Minimal Plus/Minus Icon -->
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path class="faq-icon-v" d="M12 5V19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
											<path class="faq-icon-h" d="M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
										</svg>
									</span>
								</div>
								
								<div 
									id="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $content_id ); ?>"
									class="soldis-faq-answer-wrap" 
									role="tabpanel" 
									aria-labelledby="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $tab_id ); ?>"
									<?php defined( 'ABSPATH' ) || exit;

echo ! $is_open ? 'hidden' : ''; ?>
								>
									<div class="soldis-faq-answer-inner">
										<?php defined( 'ABSPATH' ) || exit;

echo wpautop( esc_html( $item['answer'] ) ); ?>
									</div>
								</div>
							</div>

						<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
					</div>
				<?php defined( 'ABSPATH' ) || exit;

endif; ?>
			</div>

		</div> <!-- /.soldis-faq-layout -->

	</div> <!-- /.soldis-container -->
</section>

