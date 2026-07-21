<?php
/**
 * Header Frontend View
 * 
 * @var array $options
 */

// Determine Logo Link
$logo_link = esc_url( home_url( '/' ) );
if ( ! empty( $options['logo_link_type'] ) && $options['logo_link_type'] === 'custom' && ! empty( $options['logo_custom_url'] ) ) {
	$logo_link = esc_url( $options['logo_custom_url'] );
}

// Determine Logo Fallback
// Order: Image -> Text -> Plugin Name -> Site Title
$global = $options['global'] ?? array();
$logo_type = $global['logo_type'] ?? 'text';
$logo_image = $global['logo_image'] ?? '';
$logo_text_val = $global['logo_text'] ?? '';

$final_image = '';
$final_text = '';

if ( $logo_type === 'image' ) {
	if ( ! empty( $logo_image ) ) {
		$final_image = $logo_image;
	} else if ( ! empty( $logo_text_val ) ) {
		$final_text = $logo_text_val;
	} else {
		$final_text = get_bloginfo( 'name' ) ?: 'SOLDIS Landing';
	}
} else if ( $logo_type === 'text' ) {
	if ( ! empty( $logo_text_val ) ) {
		$final_text = $logo_text_val;
	} else if ( ! empty( $logo_image ) ) {
		$final_image = $logo_image;
	} else {
		$final_text = get_bloginfo( 'name' ) ?: 'SOLDIS Landing';
	}
} else if ( $logo_type === 'image_text' ) {
	if ( ! empty( $logo_image ) ) $final_image = $logo_image;
	if ( ! empty( $logo_text_val ) ) $final_text = $logo_text_val;
	
	// Ensure it's not totally empty
	if ( empty( $final_image ) && empty( $final_text ) ) {
		$final_text = get_bloginfo( 'name' ) ?: 'SOLDIS Landing';
	}
}
?>
<header class="soldis-header" id="soldis-header">
	<div class="soldis-container">
		<div class="soldis-header-inner">
			
			<!-- Logo Area -->
			<div class="soldis-header-brand">
				<a href="<?php echo $logo_link; ?>" class="soldis-logo">
					<?php if ( ! empty( $final_image ) ) : ?>
						<img src="<?php echo esc_url( $final_image ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="soldis-logo-img">
					<?php endif; ?>
					<?php if ( ! empty( $final_text ) ) : ?>
						<span class="soldis-logo-text"><?php echo esc_html( $final_text ); ?></span>
					<?php endif; ?>
				</a>
			</div>

			<!-- Desktop Navigation -->
			<nav class="soldis-header-nav" aria-label="<?php esc_attr_e( 'Main Navigation', 'soldis-landing' ); ?>">
				<ul class="soldis-nav-list">
					<?php 
					if ( ! empty( $options['nav'] ) && is_array( $options['nav'] ) ) {
						foreach ( $options['nav'] as $item ) {
							if ( empty( $item['enabled'] ) ) continue;
							$url = ! empty( $item['url'] ) ? esc_url( $item['url'] ) : '#';
							$target = ! empty( $item['target'] ) ? esc_attr( $item['target'] ) : '_self';
							$css_class = ! empty( $item['css_class'] ) ? ' ' . esc_attr( $item['css_class'] ) : '';
							echo '<li class="soldis-nav-item' . $css_class . '"><a href="' . $url . '" target="' . $target . '" class="soldis-nav-link">' . esc_html( $item['label'] ) . '</a></li>';
						}
					}
					?>
				</ul>
			</nav>

			<!-- CTA Area -->
			<div class="soldis-header-actions">
				
				<?php if ( ! empty( $options['header_contact_enable'] ) ) : ?>
					<div class="soldis-header-contact">
						<div class="soldis-header-contact-icon">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
								<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
							</svg>
						</div>
						<div class="soldis-header-contact-text">
							<?php if ( ! empty( $options['header_contact_phone'] ) ) : ?>
								<span class="soldis-header-phone"><?php echo esc_html( $options['header_contact_phone'] ); ?></span>
							<?php endif; ?>
							<?php if ( ! empty( $options['header_contact_email'] ) ) : ?>
								<span class="soldis-header-email"><?php echo esc_html( $options['header_contact_email'] ); ?></span>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $options['cta_enable'] ) ) : 
					$cta_style_class = ( isset( $options['cta_style'] ) && $options['cta_style'] === 'secondary' ) ? 'soldis-btn-secondary' : 'soldis-btn-primary';
				?>
					<a href="<?php echo esc_url( $options['cta_url'] ); ?>" 
					   target="<?php echo esc_attr( $options['cta_target'] ); ?>"
					   <?php if ( ! empty( $options['cta_rel'] ) ) echo 'rel="' . esc_attr( $options['cta_rel'] ) . '"'; ?> 
					   class="soldis-btn <?php echo esc_attr( $cta_style_class ); ?>">
						<?php echo esc_html( $options['cta_text'] ); ?>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 6px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
					</a>
				<?php endif; ?>
				
				<!-- Mobile Toggle -->
				<button class="soldis-mobile-toggle" aria-label="<?php esc_attr_e( 'Open Menu', 'soldis-landing' ); ?>" aria-expanded="false" aria-controls="soldis-mobile-drawer">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<line x1="3" y1="12" x2="21" y2="12"></line>
						<line x1="3" y1="6" x2="21" y2="6"></line>
						<line x1="3" y1="18" x2="21" y2="18"></line>
					</svg>
				</button>
			</div>

		</div>
	</div>
</header>

<!-- Mobile Drawer -->
<div class="soldis-mobile-drawer" id="soldis-mobile-drawer" aria-hidden="true">
	<div class="soldis-drawer-overlay"></div>
	<div class="soldis-drawer-content">
		<div class="soldis-drawer-header">
			<a href="<?php echo $logo_link; ?>" class="soldis-logo">
				<?php if ( ! empty( $final_image ) ) : ?>
					<img src="<?php echo esc_url( $final_image ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="soldis-logo-img">
				<?php endif; ?>
				<?php if ( ! empty( $final_text ) ) : ?>
					<span class="soldis-logo-text"><?php echo esc_html( $final_text ); ?></span>
				<?php endif; ?>
			</a>
			<button class="soldis-drawer-close" aria-label="<?php esc_attr_e( 'Close Menu', 'soldis-landing' ); ?>">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
					<line x1="18" y1="6" x2="6" y2="18"></line>
					<line x1="6" y1="6" x2="18" y2="18"></line>
				</svg>
			</button>
		</div>
		<nav class="soldis-drawer-nav">
			<ul class="soldis-nav-list-mobile">
				<?php 
				if ( ! empty( $options['nav'] ) && is_array( $options['nav'] ) ) {
					foreach ( $options['nav'] as $item ) {
						if ( empty( $item['enabled'] ) ) continue;
						$url = ! empty( $item['url'] ) ? esc_url( $item['url'] ) : '#';
						$target = ! empty( $item['target'] ) ? esc_attr( $item['target'] ) : '_self';
						$css_class = ! empty( $item['css_class'] ) ? ' ' . esc_attr( $item['css_class'] ) : '';
						echo '<li class="soldis-nav-item' . $css_class . '"><a href="' . $url . '" target="' . $target . '" class="soldis-nav-link">' . esc_html( $item['label'] ) . '</a></li>';
					}
				}
				?>
			</ul>
		</nav>
		<div class="soldis-drawer-actions">
			<?php if ( ! empty( $options['cta_enable'] ) ) : 
				$cta_style_class = ( isset( $options['cta_style'] ) && $options['cta_style'] === 'secondary' ) ? 'soldis-btn-secondary' : 'soldis-btn-primary';
			?>
				<a href="<?php echo esc_url( $options['cta_url'] ); ?>" 
				   target="<?php echo esc_attr( $options['cta_target'] ); ?>"
				   <?php if ( ! empty( $options['cta_rel'] ) ) echo 'rel="' . esc_attr( $options['cta_rel'] ) . '"'; ?> 
				   class="soldis-btn <?php echo esc_attr( $cta_style_class ); ?> soldis-btn-block">
					<?php echo esc_html( $options['cta_text'] ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</div>
