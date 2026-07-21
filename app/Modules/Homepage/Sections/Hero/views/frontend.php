<?php
defined( 'ABSPATH' ) || exit;

/**
 * Hero Section Frontend View
 * 
 * @var array $options
 */

// Helper to get SVG icons
if (!function_exists('soldis_get_icon')) {
	function soldis_get_icon($name) {
		$icons = [
			'shield' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />',
			'home' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />',
			'trending-up' => '<path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />',
			'user' => '<path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />',
			'users' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />',
			'award' => '<path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />',
			'check-circle' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />',
			'map-pin' => '<path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />',
			'smile' => '<path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />'
		];
		$path = $icons[$name] ?? $icons['check-circle'];
		return '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">' . $path . '</svg>';
	}
}
?>
<section class="soldis-hero-section soldis-section" id="hero" aria-label="Hero Section" role="region">
	
	<!-- Background Pattern / Shape elements -->
	<div class="soldis-hero-bg-pattern"></div>
	
	<div class="soldis-container">
		<div class="soldis-hero-grid">
			
			<!-- Content Column -->
			<div class="soldis-hero-content <?php defined( 'ABSPATH' ) || exit;

echo ! empty( $options['enable_animation'] ) ? 'soldis-animate-fade-up' : ''; ?>">
				<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['eyebrow'] ) ) : ?>
					<div class="soldis-hero-eyebrow">
						<span class="soldis-eyebrow-dot"></span>
						<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['eyebrow'] ); ?>
					</div>
				<?php defined( 'ABSPATH' ) || exit;

endif; ?>

				<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['heading'] ) ) : ?>
					<h1 class="soldis-hero-heading">
						<?php 
						defined( 'ABSPATH' ) || exit;

$heading = esc_html( $options['heading'] );
						if ( ! empty( $options['highlight'] ) ) {
							$highlight = esc_html( $options['highlight'] );
							$heading = str_replace( $highlight, '<span class="soldis-text-highlight">' . $highlight . '</span>', $heading );
						}
						echo $heading; 
						?>
					</h1>
				<?php defined( 'ABSPATH' ) || exit;

endif; ?>

				<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['description'] ) ) : ?>
					<p class="soldis-hero-description"><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['description'] ); ?></p>
				<?php defined( 'ABSPATH' ) || exit;

endif; ?>

				<div class="soldis-hero-actions">
					<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['btn_primary_label'] ) ) : ?>
						<a href="<?php defined( 'ABSPATH' ) || exit;

echo esc_url( $options['btn_primary_url'] ); ?>" class="soldis-btn soldis-btn-primary" target="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['btn_primary_target'] ); ?>" <?php defined( 'ABSPATH' ) || exit;

echo $options['btn_primary_target'] === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>>
							<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['btn_primary_label'] ); ?>
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 6px;" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
						</a>
					<?php defined( 'ABSPATH' ) || exit;

endif; ?>

					<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['btn_secondary_enable'] ) && ! empty( $options['btn_secondary_label'] ) ) : ?>
						<a href="<?php defined( 'ABSPATH' ) || exit;

echo esc_url( $options['btn_secondary_url'] ); ?>" class="soldis-btn soldis-btn-secondary" target="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['btn_secondary_target'] ); ?>" <?php defined( 'ABSPATH' ) || exit;

echo $options['btn_secondary_target'] === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>>
							<?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['btn_secondary_label'] ); ?>
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 6px;" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
						</a>
					<?php defined( 'ABSPATH' ) || exit;

endif; ?>
				</div>

				<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['trust_items'] ) ) : ?>
					<div class="soldis-hero-trust-row">
						<?php defined( 'ABSPATH' ) || exit;

foreach ( $options['trust_items'] as $item ) : ?>
							<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $item['enabled'] ) && ! empty( $item['title'] ) ) : ?>
								<div class="soldis-trust-item">
									<div class="soldis-trust-icon-wrap">
										<?php defined( 'ABSPATH' ) || exit;

echo soldis_get_icon($item['icon']); ?>
									</div>
									<div class="soldis-trust-text">
										<strong><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $item['title'] ); ?></strong>
										<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $item['desc'] ) ) : ?>
											<span><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $item['desc'] ); ?></span>
										<?php defined( 'ABSPATH' ) || exit;

endif; ?>
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

if ( ! empty( $options['ratings_enable'] ) ) : ?>
					<div class="soldis-hero-ratings">
						<div class="soldis-avatars-group">
							<div class="soldis-avatar"></div>
							<div class="soldis-avatar"></div>
							<div class="soldis-avatar"></div>
							<div class="soldis-avatar"></div>
						</div>
						<div class="soldis-ratings-text">
							<div class="soldis-stars">
								★★★★★ <strong><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['ratings_score'] ); ?></strong>
							</div>
							<p><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $options['ratings_text'] ); ?></p>
						</div>
					</div>
				<?php defined( 'ABSPATH' ) || exit;

endif; ?>
			</div>

			<!-- Image Column with Curved Organic Frame -->
			<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['hero_image_enable'] ) && ! empty( $options['hero_image'] ) ) : ?>
				<div class="soldis-hero-image-wrap <?php defined( 'ABSPATH' ) || exit;

echo ! empty( $options['enable_animation'] ) ? 'soldis-animate-fade-in' : ''; ?>">
					
					<div class="soldis-hero-image-frame">
						<img src="<?php defined( 'ABSPATH' ) || exit;

echo esc_url( $options['hero_image'] ); ?>" alt="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['hero_alt'] ); ?>" class="soldis-hero-main-img" fetchpriority="high" loading="eager" decoding="async">
						
						<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['glass_cards'] ) ) : ?>
							<div class="soldis-hero-glass-cards">
								<?php defined( 'ABSPATH' ) || exit;

foreach ( $options['glass_cards'] as $index => $card ) : ?>
									<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $card['enabled'] ) && ! empty( $card['title'] ) ) : ?>
										<div class="soldis-glass-card soldis-glass-card-pos-<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>">
											<div class="soldis-glass-icon-wrap">
												<?php defined( 'ABSPATH' ) || exit;

echo soldis_get_icon($card['icon']); ?>
											</div>
											<div class="soldis-glass-card-content">
												<strong><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $card['title'] ); ?></strong>
												<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $card['subtitle'] ) ) : ?>
													<span><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $card['subtitle'] ); ?></span>
												<?php defined( 'ABSPATH' ) || exit;

endif; ?>
											</div>
										</div>
									<?php defined( 'ABSPATH' ) || exit;

endif; ?>
								<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
							</div>
						<?php defined( 'ABSPATH' ) || exit;

endif; ?>
					</div>
				</div>
			<?php defined( 'ABSPATH' ) || exit;

endif; ?>

		</div>
		
		<!-- Bottom Stats Bar -->
		<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['bottom_stats'] ) ) : ?>
			<div class="soldis-hero-bottom-bar <?php defined( 'ABSPATH' ) || exit;

echo ! empty( $options['enable_animation'] ) ? 'soldis-animate-fade-up' : ''; ?>">
				<?php defined( 'ABSPATH' ) || exit;

foreach ( $options['bottom_stats'] as $stat ) : ?>
					<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $stat['enabled'] ) && ! empty( $stat['title'] ) ) : ?>
						<div class="soldis-bottom-stat-item">
							<div class="soldis-bottom-stat-icon <?php defined( 'ABSPATH' ) || exit;

echo esc_attr( 'color-' . $stat['color'] ); ?>">
								<?php defined( 'ABSPATH' ) || exit;

echo soldis_get_icon($stat['icon']); ?>
							</div>
							<div class="soldis-bottom-stat-text">
								<strong><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $stat['title'] ); ?></strong>
								<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $stat['subtitle'] ) ) : ?>
									<span><?php defined( 'ABSPATH' ) || exit;

echo esc_html( $stat['subtitle'] ); ?></span>
								<?php defined( 'ABSPATH' ) || exit;

endif; ?>
							</div>
						</div>
					<?php defined( 'ABSPATH' ) || exit;

endif; ?>
				<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
			</div>
		<?php defined( 'ABSPATH' ) || exit;

endif; ?>

	</div>
</section>

