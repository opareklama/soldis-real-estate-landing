<?php
/**
 * Global Settings Admin View
 * 
 * @var array $options
 */
?>
<div class="wrap soldis-admin-wrap">
	<header class="soldis-admin-header">
		<div class="soldis-admin-header-content">
			<h1><?php esc_html_e( 'Global Settings', 'soldis-landing' ); ?></h1>
			<p class="soldis-admin-subtitle"><?php esc_html_e( 'Manage logo, branding, contact info, and layout preferences', 'soldis-landing' ); ?></p>
		</div>
		<div class="soldis-admin-header-badge">
			<strong><?php esc_html_e( 'Module', 'soldis-landing' ); ?></strong> &mdash; <?php esc_html_e( 'Global Settings', 'soldis-landing' ); ?>
		</div>
	</header>

	<form action="options.php" method="post" id="soldis-global-form">
		<?php settings_fields( 'soldis_global_group' ); ?>
		
		<div class="soldis-tabs">
			<ul class="soldis-tab-nav">
				<li class="active" data-tab="general"><?php esc_html_e( 'General', 'soldis-landing' ); ?></li>
				<li data-tab="branding"><?php esc_html_e( 'Branding', 'soldis-landing' ); ?></li>
				<li data-tab="contact"><?php esc_html_e( 'Contact', 'soldis-landing' ); ?></li>
				<li data-tab="social"><?php esc_html_e( 'Social Media', 'soldis-landing' ); ?></li>
				<li data-tab="colors"><?php esc_html_e( 'Colors', 'soldis-landing' ); ?></li>
				<li data-tab="typography"><?php esc_html_e( 'Typography', 'soldis-landing' ); ?></li>
				<li data-tab="layout"><?php esc_html_e( 'Layout', 'soldis-landing' ); ?></li>
			</ul>

			<div class="soldis-tab-content">
				<!-- General Tab -->
				<div class="soldis-tab-pane active" id="tab-general">
					<h2><?php esc_html_e( 'General', 'soldis-landing' ); ?></h2>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Company Name', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[company_name]" value="<?php echo esc_attr( $options['company_name'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Company Tagline', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[company_tagline]" value="<?php echo esc_attr( $options['company_tagline'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
					</table>
				</div>

				<!-- Branding Tab -->
				<div class="soldis-tab-pane" id="tab-branding">
					<h2><?php esc_html_e( 'Branding & Logo', 'soldis-landing' ); ?></h2>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Logo Type', 'soldis-landing' ); ?></th>
							<td>
								<select id="soldis-logo-type" name="soldis_global_settings[logo_type]">
									<option value="image" <?php selected( $options['logo_type'] ?? 'text', 'image' ); ?>><?php esc_html_e( 'Image', 'soldis-landing' ); ?></option>
									<option value="text" <?php selected( $options['logo_type'] ?? 'text', 'text' ); ?>><?php esc_html_e( 'Text', 'soldis-landing' ); ?></option>
									<option value="image_text" <?php selected( $options['logo_type'] ?? 'text', 'image_text' ); ?>><?php esc_html_e( 'Image + Text', 'soldis-landing' ); ?></option>
								</select>
							</td>
						</tr>
					</table>
					
					<div id="soldis-logo-group-image" class="soldis-settings-group">
						<table class="form-table">
							<tr>
								<th scope="row"><?php esc_html_e( 'Upload Logo', 'soldis-landing' ); ?></th>
								<td>
									<input type="hidden" id="logo_image" name="soldis_global_settings[logo_image]" value="<?php echo esc_attr( $options['logo_image'] ?? '' ); ?>">
									<img src="<?php echo esc_url( $options['logo_image'] ?? '' ); ?>" id="logo_image_preview" style="max-width:200px; display: <?php echo !empty($options['logo_image']) ? 'block' : 'none'; ?>; margin-bottom:10px;">
									<button type="button" class="button soldis-upload-btn" data-target="#logo_image" data-preview="#logo_image_preview"><?php esc_html_e( 'Upload Image', 'soldis-landing' ); ?></button>
									<button type="button" class="button soldis-remove-btn" data-target="#logo_image" data-preview="#logo_image_preview"><?php esc_html_e( 'Remove', 'soldis-landing' ); ?></button>
								</td>
							</tr>
						</table>
					</div>

					<div id="soldis-logo-group-text" class="soldis-settings-group">
						<table class="form-table">
							<tr>
								<th scope="row"><?php esc_html_e( 'Logo Text', 'soldis-landing' ); ?></th>
								<td><input type="text" name="soldis_global_settings[logo_text]" value="<?php echo esc_attr( $options['logo_text'] ?? '' ); ?>" class="regular-text"></td>
							</tr>
							<tr>
								<th scope="row"><?php esc_html_e( 'Font Family', 'soldis-landing' ); ?></th>
								<td><input type="text" name="soldis_global_settings[logo_font_family]" value="<?php echo esc_attr( $options['logo_font_family'] ?? 'system-ui, -apple-system, sans-serif' ); ?>" class="large-text"></td>
							</tr>
							<tr>
								<th scope="row"><?php esc_html_e( 'Font Size (px)', 'soldis-landing' ); ?></th>
								<td><input type="number" name="soldis_global_settings[logo_font_size]" value="<?php echo esc_attr( $options['logo_font_size'] ?? '24' ); ?>" class="small-text"></td>
							</tr>
							<tr>
								<th scope="row"><?php esc_html_e( 'Font Weight', 'soldis-landing' ); ?></th>
								<td>
									<select name="soldis_global_settings[logo_font_weight]">
										<option value="400" <?php selected( $options['logo_font_weight'] ?? '700', '400' ); ?>>400 (Normal)</option>
										<option value="500" <?php selected( $options['logo_font_weight'] ?? '700', '500' ); ?>>500 (Medium)</option>
										<option value="600" <?php selected( $options['logo_font_weight'] ?? '700', '600' ); ?>>600 (Semi-Bold)</option>
										<option value="700" <?php selected( $options['logo_font_weight'] ?? '700', '700' ); ?>>700 (Bold)</option>
										<option value="800" <?php selected( $options['logo_font_weight'] ?? '700', '800' ); ?>>800 (Extra-Bold)</option>
									</select>
								</td>
							</tr>
							<tr>
								<th scope="row"><?php esc_html_e( 'Letter Spacing (px)', 'soldis-landing' ); ?></th>
								<td><input type="number" step="0.1" name="soldis_global_settings[logo_letter_spacing]" value="<?php echo esc_attr( $options['logo_letter_spacing'] ?? '0' ); ?>" class="small-text"></td>
							</tr>
							<tr>
								<th scope="row"><?php esc_html_e( 'Text Color', 'soldis-landing' ); ?></th>
								<td><input type="text" name="soldis_global_settings[logo_text_color]" value="<?php echo esc_attr( $options['logo_text_color'] ?? '#1d2327' ); ?>" class="regular-text soldis-color-picker"></td>
							</tr>
							<tr>
								<th scope="row"><?php esc_html_e( 'Hover Color', 'soldis-landing' ); ?></th>
								<td><input type="text" name="soldis_global_settings[logo_hover_color]" value="<?php echo esc_attr( $options['logo_hover_color'] ?? '#0073aa' ); ?>" class="regular-text soldis-color-picker"></td>
							</tr>
						</table>
					</div>
				</div>

				<!-- Contact Tab -->
				<div class="soldis-tab-pane" id="tab-contact">
					<h2><?php esc_html_e( 'Contact Information', 'soldis-landing' ); ?></h2>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Phone', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[phone]" value="<?php echo esc_attr( $options['phone'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Mobile', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[mobile]" value="<?php echo esc_attr( $options['mobile'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Email', 'soldis-landing' ); ?></th>
							<td><input type="email" name="soldis_global_settings[email]" value="<?php echo esc_attr( $options['email'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Address', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[address]" value="<?php echo esc_attr( $options['address'] ?? '' ); ?>" class="large-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Google Maps URL', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[gmaps_url]" value="<?php echo esc_attr( $options['gmaps_url'] ?? '' ); ?>" class="large-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Business Hours', 'soldis-landing' ); ?></th>
							<td><textarea name="soldis_global_settings[business_hours]" class="large-text" rows="3"><?php echo esc_textarea( $options['business_hours'] ?? '' ); ?></textarea></td>
						</tr>
					</table>
				</div>

				<!-- Social Tab -->
				<div class="soldis-tab-pane" id="tab-social">
					<h2><?php esc_html_e( 'Social Media', 'soldis-landing' ); ?></h2>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Facebook', 'soldis-landing' ); ?></th>
							<td><input type="url" name="soldis_global_settings[facebook]" value="<?php echo esc_url( $options['facebook'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Instagram', 'soldis-landing' ); ?></th>
							<td><input type="url" name="soldis_global_settings[instagram]" value="<?php echo esc_url( $options['instagram'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'LinkedIn', 'soldis-landing' ); ?></th>
							<td><input type="url" name="soldis_global_settings[linkedin]" value="<?php echo esc_url( $options['linkedin'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'YouTube', 'soldis-landing' ); ?></th>
							<td><input type="url" name="soldis_global_settings[youtube]" value="<?php echo esc_url( $options['youtube'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'TikTok', 'soldis-landing' ); ?></th>
							<td><input type="url" name="soldis_global_settings[tiktok]" value="<?php echo esc_url( $options['tiktok'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'X (Twitter)', 'soldis-landing' ); ?></th>
							<td><input type="url" name="soldis_global_settings[twitter]" value="<?php echo esc_url( $options['twitter'] ?? '' ); ?>" class="regular-text"></td>
						</tr>
					</table>
				</div>

				<!-- Colors Tab -->
				<div class="soldis-tab-pane" id="tab-colors">
					<h2><?php esc_html_e( 'Global Colors', 'soldis-landing' ); ?></h2>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Primary Color', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[color_primary]" value="<?php echo esc_attr( $options['color_primary'] ?? '#0073aa' ); ?>" class="regular-text soldis-color-picker"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Secondary Color', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[color_secondary]" value="<?php echo esc_attr( $options['color_secondary'] ?? '#005177' ); ?>" class="regular-text soldis-color-picker"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Accent Color', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[color_accent]" value="<?php echo esc_attr( $options['color_accent'] ?? '#ff9800' ); ?>" class="regular-text soldis-color-picker"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Background Color', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[color_bg]" value="<?php echo esc_attr( $options['color_bg'] ?? '#f0f0f1' ); ?>" class="regular-text soldis-color-picker"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Surface Color', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[color_surface]" value="<?php echo esc_attr( $options['color_surface'] ?? '#ffffff' ); ?>" class="regular-text soldis-color-picker"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Heading Color', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[color_heading]" value="<?php echo esc_attr( $options['color_heading'] ?? '#1d2327' ); ?>" class="regular-text soldis-color-picker"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Body Text Color', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[color_body]" value="<?php echo esc_attr( $options['color_body'] ?? '#3c434a' ); ?>" class="regular-text soldis-color-picker"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Border Color', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[color_border]" value="<?php echo esc_attr( $options['color_border'] ?? '#dcdcde' ); ?>" class="regular-text soldis-color-picker"></td>
						</tr>
					</table>
				</div>

				<!-- Typography Tab -->
				<div class="soldis-tab-pane" id="tab-typography">
					<h2><?php esc_html_e( 'Typography', 'soldis-landing' ); ?></h2>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Heading Font', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[font_heading]" value="<?php echo esc_attr( $options['font_heading'] ?? 'system-ui, -apple-system, sans-serif' ); ?>" class="large-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Body Font', 'soldis-landing' ); ?></th>
							<td><input type="text" name="soldis_global_settings[font_body]" value="<?php echo esc_attr( $options['font_body'] ?? 'system-ui, -apple-system, sans-serif' ); ?>" class="large-text"></td>
						</tr>
					</table>
				</div>

				<!-- Layout Tab -->
				<div class="soldis-tab-pane" id="tab-layout">
					<h2><?php esc_html_e( 'Global Layout', 'soldis-landing' ); ?></h2>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Global Container Width (px)', 'soldis-landing' ); ?></th>
							<td><input type="number" name="soldis_global_settings[container_width]" value="<?php echo esc_attr( $options['container_width'] ?? '1200' ); ?>" class="small-text"></td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Global Border Radius (px)', 'soldis-landing' ); ?></th>
							<td><input type="number" name="soldis_global_settings[border_radius]" value="<?php echo esc_attr( $options['border_radius'] ?? '6' ); ?>" class="small-text"></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		
		<?php submit_button( __( 'Save Global Settings', 'soldis-landing' ) ); ?>
	</form>
</div>
