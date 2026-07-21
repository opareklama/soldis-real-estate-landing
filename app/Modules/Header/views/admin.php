<?php
/**
 * Header Admin View
 * 
 * @var array $options
 */
?>
<div class="wrap soldis-admin-wrap">
	<header class="soldis-admin-header">
		<div class="soldis-admin-header-content">
			<h1><?php esc_html_e( 'Header Settings', 'soldis-landing' ); ?></h1>
			<p class="soldis-admin-subtitle"><?php esc_html_e( 'Navigation, logo, CTA button and contact bar', 'soldis-landing' ); ?></p>
		</div>
		<div class="soldis-admin-header-badge">
			<strong><?php esc_html_e( 'Module', 'soldis-landing' ); ?></strong> &mdash; <?php esc_html_e( 'Header', 'soldis-landing' ); ?>
		</div>
	</header>

	<form action="options.php" method="post" id="soldis-header-form">
		<?php settings_fields( 'soldis_header_group' ); ?>
		
		<div class="soldis-tabs">
			<ul class="soldis-tab-nav">
				<li class="active" data-tab="overview"><?php esc_html_e( 'Overview', 'soldis-landing' ); ?></li>
				<li data-tab="logo"><?php esc_html_e( 'Logo', 'soldis-landing' ); ?></li>
				<li data-tab="nav"><?php esc_html_e( 'Navigation', 'soldis-landing' ); ?></li>
				<li data-tab="cta"><?php esc_html_e( 'Contact & CTA', 'soldis-landing' ); ?></li>
				<li data-tab="style"><?php esc_html_e( 'Style', 'soldis-landing' ); ?></li>
				<li data-tab="responsive"><?php esc_html_e( 'Responsive', 'soldis-landing' ); ?></li>
				<li data-tab="advanced"><?php esc_html_e( 'Advanced', 'soldis-landing' ); ?></li>
			</ul>

			<div class="soldis-tab-content">
				<!-- Overview Tab -->
				<div class="soldis-tab-pane active" id="tab-overview">
					<h2><?php esc_html_e( 'Header Overview', 'soldis-landing' ); ?></h2>
					<p>
						<label>
							<input type="checkbox" name="soldis_header_settings[enable_header]" value="1" <?php checked( ! empty( $options['enable_header'] ), true ); ?>>
							<strong><?php esc_html_e( 'Enable Header Module', 'soldis-landing' ); ?></strong>
						</label>
					</p>
				</div>

				<!-- Logo Tab -->
				<div class="soldis-tab-pane" id="tab-logo">
					<h2><?php esc_html_e( 'Logo Display Settings', 'soldis-landing' ); ?></h2>
					<p class="description"><?php esc_html_e( 'The logo asset (image/text) is managed in Global Settings. Here you can configure how it is displayed in the Header.', 'soldis-landing' ); ?></p>
					
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Link Settings', 'soldis-landing' ); ?></th>
							<td>
								<label>
									<input type="checkbox" name="soldis_header_settings[logo_same_size]" value="1" <?php checked( ! empty( $options['logo_same_size'] ), true ); ?>>
									<?php esc_html_e( 'Use same size for all devices', 'soldis-landing' ); ?>
								</label>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Dimensions (Desktop)', 'soldis-landing' ); ?></th>
							<td>
								<input type="text" name="soldis_header_settings[logo_width_desktop]" value="<?php echo esc_attr( $options['logo_width_desktop'] ?? '150' ); ?>" placeholder="Width (e.g. 150 or auto)" class="small-text">
								<input type="text" name="soldis_header_settings[logo_height_desktop]" value="<?php echo esc_attr( $options['logo_height_desktop'] ?? 'auto' ); ?>" placeholder="Height (e.g. 40 or auto)" class="small-text">
							</td>
						</tr>
						<tr class="soldis-responsive-logo-dim">
							<th scope="row"><?php esc_html_e( 'Dimensions (Tablet)', 'soldis-landing' ); ?></th>
							<td>
								<input type="text" name="soldis_header_settings[logo_width_tablet]" value="<?php echo esc_attr( $options['logo_width_tablet'] ?? '130' ); ?>" placeholder="Width" class="small-text">
								<input type="text" name="soldis_header_settings[logo_height_tablet]" value="<?php echo esc_attr( $options['logo_height_tablet'] ?? 'auto' ); ?>" placeholder="Height" class="small-text">
							</td>
						</tr>
						<tr class="soldis-responsive-logo-dim">
							<th scope="row"><?php esc_html_e( 'Dimensions (Mobile)', 'soldis-landing' ); ?></th>
							<td>
								<input type="text" name="soldis_header_settings[logo_width_mobile]" value="<?php echo esc_attr( $options['logo_width_mobile'] ?? '110' ); ?>" placeholder="Width" class="small-text">
								<input type="text" name="soldis_header_settings[logo_height_mobile]" value="<?php echo esc_attr( $options['logo_height_mobile'] ?? 'auto' ); ?>" placeholder="Height" class="small-text">
							</td>
						</tr>
					</table>
					
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Logo Link', 'soldis-landing' ); ?></th>
							<td>
								<select id="soldis-logo-link-type" name="soldis_header_settings[logo_link_type]">
									<option value="home" <?php selected( $options['logo_link_type'] ?? 'home', 'home' ); ?>><?php esc_html_e( 'Homepage', 'soldis-landing' ); ?></option>
									<option value="custom" <?php selected( $options['logo_link_type'] ?? 'home', 'custom' ); ?>><?php esc_html_e( 'Custom URL', 'soldis-landing' ); ?></option>
								</select>
								<div id="soldis-logo-custom-url-wrap" style="margin-top: 10px;">
									<input type="text" name="soldis_header_settings[logo_custom_url]" value="<?php echo esc_attr( $options['logo_custom_url'] ?? '' ); ?>" class="regular-text" placeholder="https://...">
								</div>
							</td>
						</tr>
					</table>
				</div>

				<!-- Navigation Tab -->
				<div class="soldis-tab-pane" id="tab-nav">
					<h2><?php esc_html_e( 'Primary Navigation', 'soldis-landing' ); ?></h2>
					
					<div id="soldis-nav-repeater" class="soldis-repeater">
						<?php 
						$nav_items = $options['nav'] ?? array();
						if ( empty( $nav_items ) ) $nav_items = array( array() ); // Ensure at least one
						foreach ( $nav_items as $index => $item ) : 
						?>
						<div class="soldis-repeater-row" data-index="<?php echo esc_attr( $index ); ?>">
							<div class="soldis-repeater-fields">
								<input type="text" name="soldis_header_settings[nav][<?php echo esc_attr( $index ); ?>][label]" value="<?php echo esc_attr( $item['label'] ?? '' ); ?>" placeholder="Label">
								<input type="text" name="soldis_header_settings[nav][<?php echo esc_attr( $index ); ?>][url]" value="<?php echo esc_attr( $item['url'] ?? '' ); ?>" placeholder="URL">
								<input type="text" name="soldis_header_settings[nav][<?php echo esc_attr( $index ); ?>][css_class]" value="<?php echo esc_attr( $item['css_class'] ?? '' ); ?>" placeholder="CSS Class">
								<select name="soldis_header_settings[nav][<?php echo esc_attr( $index ); ?>][target]">
									<option value="_self" <?php selected( $item['target'] ?? '_self', '_self' ); ?>><?php esc_html_e( 'Same Window', 'soldis-landing' ); ?></option>
									<option value="_blank" <?php selected( $item['target'] ?? '', '_blank' ); ?>><?php esc_html_e( 'New Window', 'soldis-landing' ); ?></option>
								</select>
								<label>
									<input type="checkbox" name="soldis_header_settings[nav][<?php echo esc_attr( $index ); ?>][enabled]" value="1" <?php checked( ! empty( $item['enabled'] ), true ); ?>> Enable
								</label>
							</div>
							<div class="soldis-repeater-actions">
								<button type="button" class="button soldis-repeater-remove"><?php esc_html_e( 'Remove', 'soldis-landing' ); ?></button>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<p><button type="button" class="button button-primary" id="soldis-add-nav-item"><?php esc_html_e( 'Add Item', 'soldis-landing' ); ?></button></p>
				</div>

				<!-- CTA Tab -->
				<div class="soldis-tab-pane" id="tab-cta">
					<h2><?php esc_html_e( 'Header Contact Info', 'soldis-landing' ); ?></h2>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Enable Contact Info', 'soldis-landing' ); ?></th>
							<td>
								<input type="checkbox" name="soldis_header_settings[header_contact_enable]" value="1" <?php checked( ! empty( $options['header_contact_enable'] ), true ); ?>>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Phone Number', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_header_settings[header_contact_phone]" value="<?php echo esc_attr( $options['header_contact_phone'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Email Address', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_header_settings[header_contact_email]" value="<?php echo esc_attr( $options['header_contact_email'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
					</table>

					<hr style="margin: 30px 0;">

					<h2><?php esc_html_e( 'Call To Action Button', 'soldis-landing' ); ?></h2>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Enable CTA', 'soldis-landing' ); ?></th>
							<td>
								<input type="checkbox" name="soldis_header_settings[cta_enable]" value="1" <?php checked( ! empty( $options['cta_enable'] ), true ); ?>>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Style', 'soldis-landing' ); ?></th>
							<td>
								<select name="soldis_header_settings[cta_style]">
									<option value="primary" <?php selected( $options['cta_style'] ?? 'primary', 'primary' ); ?>><?php esc_html_e( 'Primary', 'soldis-landing' ); ?></option>
									<option value="secondary" <?php selected( $options['cta_style'] ?? 'primary', 'secondary' ); ?>><?php esc_html_e( 'Secondary', 'soldis-landing' ); ?></option>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Text', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_header_settings[cta_text]" value="<?php echo esc_attr( $options['cta_text'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'URL', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_header_settings[cta_url]" value="<?php echo esc_attr( $options['cta_url'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Target', 'soldis-landing' ); ?></th>
							<td>
								<select name="soldis_header_settings[cta_target]">
									<option value="_self" <?php selected( $options['cta_target'] ?? '_self', '_self' ); ?>><?php esc_html_e( 'Same Window', 'soldis-landing' ); ?></option>
									<option value="_blank" <?php selected( $options['cta_target'] ?? '', '_blank' ); ?>><?php esc_html_e( 'New Window', 'soldis-landing' ); ?></option>
								</select>
							</td>
						</tr>
					</table>
				</div>

				<!-- Style Tab -->
				<div class="soldis-tab-pane" id="tab-style">
					<h2><?php esc_html_e( 'Style Settings', 'soldis-landing' ); ?></h2>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Background Color', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_header_settings[style_bg]" value="<?php echo esc_attr( $options['style_bg'] ?? '#ffffff' ); ?>" class="regular-text soldis-color-picker"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Sticky Background', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_header_settings[style_sticky_bg]" value="<?php echo esc_attr( $options['style_sticky_bg'] ?? '#ffffff' ); ?>" class="regular-text soldis-color-picker"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Text Color', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_header_settings[style_text]" value="<?php echo esc_attr( $options['style_text'] ?? '#1d2327' ); ?>" class="regular-text soldis-color-picker"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Hover Color', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_header_settings[style_hover]" value="<?php echo esc_attr( $options['style_hover'] ?? '#0073aa' ); ?>" class="regular-text soldis-color-picker"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'CTA Primary Color', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_header_settings[style_cta]" value="<?php echo esc_attr( $options['style_cta'] ?? '' ); ?>" class="regular-text soldis-color-picker" placeholder="Leave blank to use Global Primary"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Enable Glassmorphism', 'soldis-landing' ); ?></th>
							<td>
								<input type="checkbox" name="soldis_header_settings[style_glass]" value="1" <?php checked( ! empty( $options['style_glass'] ), true ); ?>>
							</td>
						</tr>
					</table>
				</div>

				<!-- Responsive Tab -->
				<div class="soldis-tab-pane" id="tab-responsive">
					<h2><?php esc_html_e( 'Responsive Settings', 'soldis-landing' ); ?></h2>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Container Width (px)', 'soldis-landing' ); ?></th>
							<td><input type="number" name="soldis_header_settings[container_width]" value="<?php echo esc_attr( $options['container_width'] ?? '' ); ?>" class="small-text" placeholder="Global"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Desktop Height (px)', 'soldis-landing' ); ?></th>
							<td><input type="number" name="soldis_header_settings[height_desktop]" value="<?php echo esc_attr( $options['height_desktop'] ?? '80' ); ?>" class="small-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Tablet Height (px)', 'soldis-landing' ); ?></th>
							<td><input type="number" name="soldis_header_settings[height_tablet]" value="<?php echo esc_attr( $options['height_tablet'] ?? '70' ); ?>" class="small-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Mobile Height (px)', 'soldis-landing' ); ?></th>
							<td><input type="number" name="soldis_header_settings[height_mobile]" value="<?php echo esc_attr( $options['height_mobile'] ?? '60' ); ?>" class="small-text"></td>
						</tr>
					</table>
				</div>

				<!-- Advanced Tab -->
				<div class="soldis-tab-pane" id="tab-advanced">
					<h2><?php esc_html_e( 'Advanced', 'soldis-landing' ); ?></h2>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'CTA Border Radius (px)', 'soldis-landing' ); ?></th>
							<td><input type="number" name="soldis_header_settings[cta_radius]" value="<?php echo esc_attr( $options['cta_radius'] ?? '' ); ?>" class="small-text" placeholder="Global"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'CTA Padding Y (px)', 'soldis-landing' ); ?></th>
							<td><input type="number" name="soldis_header_settings[cta_pad_y]" value="<?php echo esc_attr( $options['cta_pad_y'] ?? '10' ); ?>" class="small-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'CTA Padding X (px)', 'soldis-landing' ); ?></th>
							<td><input type="number" name="soldis_header_settings[cta_pad_x]" value="<?php echo esc_attr( $options['cta_pad_x'] ?? '24' ); ?>" class="small-text"></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		
		<?php submit_button( __( 'Save Header Settings', 'soldis-landing' ) ); ?>
	</form>
</div>
