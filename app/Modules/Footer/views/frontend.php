<?php
/**
 * Footer Frontend View
 *
 * @var array $options Merged footer options. $options['global'] holds Global Settings data.
 */

// ── Resolve Global Settings ──────────────────────────────────────────────────
$g              = $options['global'] ?? array();
$company_name   = ! empty( $g['company_name'] ) ? $g['company_name'] : 'SOLDIS';
$phone          = $g['phone']   ?? '';
$email          = $g['email']   ?? '';
$address        = $g['address'] ?? '';
$gmaps_url      = $g['gmaps_url'] ?? '';

// Social links from Global Settings
$socials = array(
	'facebook'  => array( 'url' => $g['facebook']  ?? '', 'label' => 'Facebook',  'icon' => '<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>' ),
	'instagram' => array( 'url' => $g['instagram'] ?? '', 'label' => 'Instagram',  'icon' => '<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>' ),
	'linkedin'  => array( 'url' => $g['linkedin']  ?? '', 'label' => 'LinkedIn',   'icon' => '<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>' ),
	'youtube'   => array( 'url' => $g['youtube']   ?? '', 'label' => 'YouTube',    'icon' => '<path d="M23.495 6.205a3.007 3.007 0 00-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 00.527 6.205a31.247 31.247 0 00-.522 5.805 31.247 31.247 0 00.522 5.783 3.007 3.007 0 002.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 002.088-2.088 31.247 31.247 0 00.5-5.783 31.247 31.247 0 00-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/>' ),
	'tiktok'    => array( 'url' => $g['tiktok']    ?? '', 'label' => 'TikTok',     'icon' => '<path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>' ),
	'twitter'   => array( 'url' => $g['twitter']   ?? '', 'label' => 'X (Twitter)', 'icon' => '<path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.748l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>' ),
);

// Filter out empty social links
$active_socials = array_filter( $socials, function( $s ) {
	return ! empty( $s['url'] );
} );

// ── Resolve Logo ─────────────────────────────────────────────────────────────
$logo_type      = $g['logo_type']  ?? 'text';
$logo_image     = $g['logo_image'] ?? '';
$logo_text_val  = $g['logo_text']  ?? $company_name;

$final_logo_image = '';
$final_logo_text  = '';

if ( $logo_type === 'image' ) {
	if ( ! empty( $logo_image ) ) {
		$final_logo_image = $logo_image;
	} else {
		$final_logo_text = $logo_text_val;
	}
} elseif ( $logo_type === 'text' ) {
	if ( ! empty( $logo_text_val ) ) {
		$final_logo_text = $logo_text_val;
	} else {
		$final_logo_text = $company_name;
	}
} else { // image_text
	if ( ! empty( $logo_image ) )    $final_logo_image = $logo_image;
	if ( ! empty( $logo_text_val ) ) $final_logo_text  = $logo_text_val;
	if ( empty( $final_logo_image ) && empty( $final_logo_text ) ) {
		$final_logo_text = $company_name;
	}
}

// Resolve logo link
$logo_link = esc_url( home_url( '/' ) );
if ( ! empty( $options['logo_link_type'] ) && $options['logo_link_type'] === 'custom' && ! empty( $options['logo_custom_url'] ) ) {
	$logo_link = esc_url( $options['logo_custom_url'] );
}
?>
<footer class="soldis-footer" id="soldis-footer" role="contentinfo">

	<div class="soldis-footer-inner">
		<div class="soldis-container">

			<!-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
			     TOP ROW: Brand + Social
			     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ -->
			<div class="soldis-footer-top">

				<!-- Brand Block -->
				<div class="soldis-footer-brand">

					<?php if ( ! empty( $options['show_logo'] ) ) : ?>
						<a href="<?php echo $logo_link; ?>" class="soldis-footer-logo" aria-label="<?php echo esc_attr( $company_name ); ?>">
							<?php if ( ! empty( $final_logo_image ) ) : ?>
								<img src="<?php echo esc_url( $final_logo_image ); ?>"
									alt="<?php echo esc_attr( $company_name ); ?>"
									class="soldis-footer-logo-img">
							<?php endif; ?>
							<?php if ( ! empty( $final_logo_text ) ) : ?>
								<span class="soldis-footer-logo-text"><?php echo esc_html( $final_logo_text ); ?></span>
							<?php endif; ?>
						</a>
					<?php endif; ?>

					<?php if ( ! empty( $options['show_desc'] ) && ! empty( $options['description'] ) ) : ?>
						<p class="soldis-footer-desc"><?php echo esc_html( $options['description'] ); ?></p>
					<?php endif; ?>

				</div><!-- /.soldis-footer-brand -->

				<!-- Social Icons -->
				<?php if ( ! empty( $options['show_social'] ) && ! empty( $active_socials ) ) : ?>
					<div class="soldis-footer-social" aria-label="<?php esc_attr_e( 'Social Media', 'soldis-landing' ); ?>">
						<?php foreach ( $active_socials as $key => $social ) : ?>
							<a href="<?php echo esc_url( $social['url'] ); ?>"
								target="_blank"
								rel="noopener noreferrer"
								class="soldis-footer-social-link"
								aria-label="<?php echo esc_attr( $social['label'] ); ?>">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
									<?php echo $social['icon']; // Pre-built, no user input — safe ?>
								</svg>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

			</div><!-- /.soldis-footer-top -->

			<!-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
			     MIDDLE: Nav + Contact
			     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ -->
			<?php $has_middle = ! empty( $options['show_nav'] ) || ! empty( $options['show_contact'] ); ?>
			<?php if ( $has_middle ) : ?>
			<div class="soldis-footer-divider" aria-hidden="true"></div>
			<div class="soldis-footer-middle">

				<!-- Navigation -->
				<?php if ( ! empty( $options['show_nav'] ) && ! empty( $options['nav'] ) ) : ?>
					<nav class="soldis-footer-nav" aria-label="<?php esc_attr_e( 'Footer Navigation', 'soldis-landing' ); ?>">
						<ul class="soldis-footer-nav-list">
							<?php foreach ( $options['nav'] as $item ) : ?>
								<?php if ( empty( $item['enabled'] ) || empty( $item['label'] ) ) continue; ?>
								<li class="soldis-footer-nav-item">
									<a href="<?php echo esc_url( $item['url'] ?? '#' ); ?>"
										target="<?php echo esc_attr( $item['target'] ?? '_self' ); ?>"
										class="soldis-footer-nav-link">
										<?php echo esc_html( $item['label'] ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					</nav>
				<?php endif; ?>

				<!-- Contact Info -->
				<?php if ( ! empty( $options['show_contact'] ) ) : ?>
					<address class="soldis-footer-contact">
						<?php if ( ! empty( $phone ) ) : ?>
							<a href="tel:<?php echo esc_attr( preg_replace( '/[^+\d]/', '', $phone ) ); ?>" class="soldis-footer-contact-item" aria-label="<?php esc_attr_e( 'Phone', 'soldis-landing' ); ?>">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
									<path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 015.13 12.71 19.79 19.79 0 012.06 4.11 2 2 0 014 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
								</svg>
								<span><?php echo esc_html( $phone ); ?></span>
							</a>
						<?php endif; ?>
						<?php if ( ! empty( $email ) ) : ?>
							<a href="mailto:<?php echo esc_attr( $email ); ?>" class="soldis-footer-contact-item" aria-label="<?php esc_attr_e( 'Email', 'soldis-landing' ); ?>">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
									<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
								</svg>
								<span><?php echo esc_html( $email ); ?></span>
							</a>
						<?php endif; ?>
						<?php if ( ! empty( $address ) ) : ?>
							<?php $addr_tag = ! empty( $gmaps_url ) ? '<a href="' . esc_url( $gmaps_url ) . '" target="_blank" rel="noopener noreferrer" class="soldis-footer-contact-item">' : '<span class="soldis-footer-contact-item">'; ?>
							<?php $addr_end = ! empty( $gmaps_url ) ? '</a>' : '</span>'; ?>
							<?php echo $addr_tag; // Safe — built above ?>
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
									<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>
								</svg>
								<span><?php echo esc_html( $address ); ?></span>
							<?php echo $addr_end; // Safe — built above ?>
						<?php endif; ?>
					</address>
				<?php endif; ?>

			</div><!-- /.soldis-footer-middle -->
			<?php endif; ?>

			<!-- ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
			     BOTTOM: Legal Bar
			     ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━ -->
			<div class="soldis-footer-divider soldis-footer-divider--thin" aria-hidden="true"></div>
			<div class="soldis-footer-bottom">

				<div class="soldis-footer-legal">
					<?php if ( ! empty( $options['show_copyright'] ) && ! empty( $options['copyright_text'] ) ) : ?>
						<span class="soldis-footer-copyright"><?php echo esc_html( $options['copyright_text'] ); ?></span>
					<?php endif; ?>

					<?php if ( ! empty( $options['show_privacy'] ) && ! empty( $options['privacy_url'] ) ) : ?>
						<a href="<?php echo esc_url( $options['privacy_url'] ); ?>" class="soldis-footer-legal-link">
							<?php echo esc_html( $options['privacy_label'] ?: 'Privatumo politika' ); ?>
						</a>
					<?php endif; ?>

					<?php if ( ! empty( $options['show_terms'] ) && ! empty( $options['terms_url'] ) ) : ?>
						<a href="<?php echo esc_url( $options['terms_url'] ); ?>" class="soldis-footer-legal-link">
							<?php echo esc_html( $options['terms_label'] ?: 'Naudojimo sąlygos' ); ?>
						</a>
					<?php endif; ?>
				</div><!-- /.soldis-footer-legal -->

				<?php if ( ! empty( $options['show_credit'] ) && ! empty( $options['credit_text'] ) ) : ?>
					<div class="soldis-footer-credit">
						<?php
						$parts = explode( 'OPA Reklama', $options['credit_text'] );
						if ( count( $parts ) === 2 && ! empty( $options['credit_url'] ) ) :
						?>
							<?php echo esc_html( $parts[0] ); ?><a href="<?php echo esc_url( $options['credit_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="soldis-footer-credit-link">OPA Reklama</a><?php echo esc_html( $parts[1] ); ?>
						<?php else : ?>
							<?php if ( ! empty( $options['credit_url'] ) ) : ?>
								<a href="<?php echo esc_url( $options['credit_url'] ); ?>" target="_blank" rel="noopener noreferrer" class="soldis-footer-credit-link">
									<?php echo esc_html( $options['credit_text'] ); ?>
								</a>
							<?php else : ?>
								<?php echo esc_html( $options['credit_text'] ); ?>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			</div><!-- /.soldis-footer-bottom -->

		</div><!-- /.soldis-container -->
	</div><!-- /.soldis-footer-inner -->

</footer>

<!-- Scroll to Top Button -->
<button class="soldis-scroll-top" id="soldis-scroll-top" aria-label="<?php esc_attr_e( 'Scroll to top', 'soldis-landing' ); ?>" aria-hidden="true">
	<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
		<polyline points="18 15 12 9 6 15"/>
	</svg>
</button>
