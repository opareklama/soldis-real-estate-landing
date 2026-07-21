<?php
/**
 * Footer Admin View
 *
 * @var array $options Merged footer options including $options['global'] for shared data.
 */
?>
<div class="wrap soldis-admin-wrap">
	<header class="soldis-admin-header">
		<div class="soldis-admin-header-content">
			<h1><?php esc_html_e( 'Footer Settings', 'soldis-landing' ); ?></h1>
			<p class="soldis-admin-subtitle"><?php esc_html_e( 'Logo, navigation, contact info, social icons and legal links', 'soldis-landing' ); ?></p>
		</div>
		<div class="soldis-admin-header-badge">
			<strong><?php esc_html_e( 'Module', 'soldis-landing' ); ?></strong> &mdash; <?php esc_html_e( 'Footer', 'soldis-landing' ); ?>
		</div>
	</header>

	<form action="options.php" method="post" id="soldis-footer-form">
		<?php settings_fields( 'soldis_footer_group' ); ?>

		<div class="soldis-tabs">
			<ul class="soldis-tab-nav">
				<li class="active" data-tab="overview"><?php esc_html_e( 'Overview', 'soldis-landing' ); ?></li>
				<li data-tab="content"><?php esc_html_e( 'Content', 'soldis-landing' ); ?></li>
				<li data-tab="nav"><?php esc_html_e( 'Navigation', 'soldis-landing' ); ?></li>
				<li data-tab="legal"><?php esc_html_e( 'Legal & Credit', 'soldis-landing' ); ?></li>
			</ul>

			<div class="soldis-tab-content">

				<!-- ============================================
				     TAB: Overview
				     ============================================ -->
				<div class="soldis-tab-pane active" id="tab-overview">
					<h2><?php esc_html_e( 'Footer Overview', 'soldis-landing' ); ?></h2>

					<p>
						<label>
							<input type="checkbox"
								name="soldis_footer_settings[enable_footer]"
								value="1"
								<?php checked( ! empty( $options['enable_footer'] ), true ); ?>>
							<strong><?php esc_html_e( 'Enable Footer Module', 'soldis-landing' ); ?></strong>
						</label>
					</p>

					<hr style="margin: 24px 0;">
					<h3><?php esc_html_e( 'Section Visibility', 'soldis-landing' ); ?></h3>
					<p class="description"><?php esc_html_e( 'Toggle which footer sections are displayed on the frontend.', 'soldis-landing' ); ?></p>

					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Logo', 'soldis-landing' ); ?></th>
							<td>
								<label>
									<input type="checkbox" name="soldis_footer_settings[show_logo]" value="1" <?php checked( ! empty( $options['show_logo'] ), true ); ?>>
									<?php esc_html_e( 'Show Logo', 'soldis-landing' ); ?>
								</label>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Description', 'soldis-landing' ); ?></th>
							<td>
								<label>
									<input type="checkbox" name="soldis_footer_settings[show_desc]" value="1" <?php checked( ! empty( $options['show_desc'] ), true ); ?>>
									<?php esc_html_e( 'Show Description', 'soldis-landing' ); ?>
								</label>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Contact Information', 'soldis-landing' ); ?></th>
							<td>
								<label>
									<input type="checkbox" name="soldis_footer_settings[show_contact]" value="1" <?php checked( ! empty( $options['show_contact'] ), true ); ?>>
									<?php esc_html_e( 'Show Contact Info (from Global Settings)', 'soldis-landing' ); ?>
								</label>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Navigation', 'soldis-landing' ); ?></th>
							<td>
								<label>
									<input type="checkbox" name="soldis_footer_settings[show_nav]" value="1" <?php checked( ! empty( $options['show_nav'] ), true ); ?>>
									<?php esc_html_e( 'Show Footer Navigation', 'soldis-landing' ); ?>
								</label>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Social Icons', 'soldis-landing' ); ?></th>
							<td>
								<label>
									<input type="checkbox" name="soldis_footer_settings[show_social]" value="1" <?php checked( ! empty( $options['show_social'] ), true ); ?>>
									<?php esc_html_e( 'Show Social Icons (from Global Settings)', 'soldis-landing' ); ?>
								</label>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Privacy Policy', 'soldis-landing' ); ?></th>
							<td>
								<label>
									<input type="checkbox" name="soldis_footer_settings[show_privacy]" value="1" <?php checked( ! empty( $options['show_privacy'] ), true ); ?>>
									<?php esc_html_e( 'Show Privacy Policy Link', 'soldis-landing' ); ?>
								</label>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Terms & Conditions', 'soldis-landing' ); ?></th>
							<td>
								<label>
									<input type="checkbox" name="soldis_footer_settings[show_terms]" value="1" <?php checked( ! empty( $options['show_terms'] ), true ); ?>>
									<?php esc_html_e( 'Show Terms & Conditions Link', 'soldis-landing' ); ?>
								</label>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Copyright', 'soldis-landing' ); ?></th>
							<td>
								<label>
									<input type="checkbox" name="soldis_footer_settings[show_copyright]" value="1" <?php checked( ! empty( $options['show_copyright'] ), true ); ?>>
									<?php esc_html_e( 'Show Copyright Notice', 'soldis-landing' ); ?>
								</label>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Developer Credit', 'soldis-landing' ); ?></th>
							<td>
								<label>
									<input type="checkbox" name="soldis_footer_settings[show_credit]" value="1" <?php checked( ! empty( $options['show_credit'] ), true ); ?>>
									<?php esc_html_e( 'Show Developer Credit', 'soldis-landing' ); ?>
								</label>
							</td>
						</tr>
					</table>
				</div>

				<!-- ============================================
				     TAB: Content
				     ============================================ -->
				<div class="soldis-tab-pane" id="tab-content">
					<h2><?php esc_html_e( 'Footer Content', 'soldis-landing' ); ?></h2>
					<p class="description"><?php esc_html_e( 'Logo, company name, phone, email, address and social links are pulled from Global Settings. Manage them there.', 'soldis-landing' ); ?></p>

					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Logo Link', 'soldis-landing' ); ?></th>
							<td>
								<select id="soldis-footer-logo-link-type" name="soldis_footer_settings[logo_link_type]">
									<option value="home"   <?php selected( $options['logo_link_type'] ?? 'home', 'home' ); ?>><?php esc_html_e( 'Homepage', 'soldis-landing' ); ?></option>
									<option value="custom" <?php selected( $options['logo_link_type'] ?? 'home', 'custom' ); ?>><?php esc_html_e( 'Custom URL', 'soldis-landing' ); ?></option>
								</select>
								<div id="soldis-footer-logo-custom-url-wrap" style="margin-top: 10px; <?php echo ( ( $options['logo_link_type'] ?? 'home' ) !== 'custom' ) ? 'display:none;' : ''; ?>">
									<input type="text"
										name="soldis_footer_settings[logo_custom_url]"
										value="<?php echo esc_attr( $options['logo_custom_url'] ?? '' ); ?>"
										class="regular-text"
										placeholder="https://...">
								</div>
								<script>
								document.getElementById('soldis-footer-logo-link-type').addEventListener('change', function() {
									var wrap = document.getElementById('soldis-footer-logo-custom-url-wrap');
									wrap.style.display = this.value === 'custom' ? 'block' : 'none';
								});
								</script>
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Footer Description', 'soldis-landing' ); ?></th>
							<td>
								<textarea
									name="soldis_footer_settings[description]"
									rows="3"
									class="large-text"
									placeholder="<?php esc_attr_e( 'A short tagline or description for the footer...', 'soldis-landing' ); ?>"><?php echo esc_textarea( $options['description'] ?? '' ); ?></textarea>
								<p class="description"><?php esc_html_e( 'Only shown when "Show Description" is enabled in Overview.', 'soldis-landing' ); ?></p>
							</td>
						</tr>
					</table>

					<hr style="margin: 30px 0;">
					<h3><?php esc_html_e( 'Global Settings Preview', 'soldis-landing' ); ?></h3>
					<p class="description"><?php esc_html_e( 'The following data is pulled automatically from Global Settings.', 'soldis-landing' ); ?></p>

					<table class="form-table">
						<?php
						$g = $options['global'] ?? array();
						$preview_fields = array(
							__( 'Company Name', 'soldis-landing' )  => $g['company_name'] ?? '—',
							__( 'Phone', 'soldis-landing' )         => $g['phone'] ?? '—',
							__( 'Email', 'soldis-landing' )         => $g['email'] ?? '—',
							__( 'Address', 'soldis-landing' )       => $g['address'] ?? '—',
							__( 'Facebook', 'soldis-landing' )      => $g['facebook'] ?? '—',
							__( 'Instagram', 'soldis-landing' )     => $g['instagram'] ?? '—',
							__( 'LinkedIn', 'soldis-landing' )      => $g['linkedin'] ?? '—',
						);
						foreach ( $preview_fields as $label => $value ) :
						?>
						<tr>
							<th scope="row"><?php echo esc_html( $label ); ?></th>
							<td><span style="color:#666;"><?php echo esc_html( $value ); ?></span> <a href="<?php echo esc_url( admin_url( 'admin.php?page=soldis-landing-global' ) ); ?>" style="font-size:12px; margin-left: 8px;"><?php esc_html_e( 'Edit in Global Settings →', 'soldis-landing' ); ?></a></td>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>

				<!-- ============================================
				     TAB: Navigation
				     ============================================ -->
				<div class="soldis-tab-pane" id="tab-nav">
					<h2><?php esc_html_e( 'Footer Navigation', 'soldis-landing' ); ?></h2>
					<p class="description"><?php esc_html_e( 'Manage footer menu items independently from the Header navigation.', 'soldis-landing' ); ?></p>

					<div id="soldis-footer-nav-repeater" class="soldis-repeater">
						<?php
						$nav_items = $options['nav'] ?? array();
						if ( empty( $nav_items ) ) {
							$nav_items = array( array() );
						}
						foreach ( $nav_items as $index => $item ) :
						?>
						<div class="soldis-repeater-row" data-index="<?php echo esc_attr( $index ); ?>">
							<div class="soldis-repeater-fields">
								<input type="text"
									name="soldis_footer_settings[nav][<?php echo esc_attr( $index ); ?>][label]"
									value="<?php echo esc_attr( $item['label'] ?? '' ); ?>"
									placeholder="<?php esc_attr_e( 'Label', 'soldis-landing' ); ?>">
								<input type="text"
									name="soldis_footer_settings[nav][<?php echo esc_attr( $index ); ?>][url]"
									value="<?php echo esc_attr( $item['url'] ?? '' ); ?>"
									placeholder="<?php esc_attr_e( 'URL (e.g. #hero)', 'soldis-landing' ); ?>">
								<select name="soldis_footer_settings[nav][<?php echo esc_attr( $index ); ?>][target]">
									<option value="_self"  <?php selected( $item['target'] ?? '_self', '_self' ); ?>><?php esc_html_e( 'Same Window', 'soldis-landing' ); ?></option>
									<option value="_blank" <?php selected( $item['target'] ?? '', '_blank' ); ?>><?php esc_html_e( 'New Window', 'soldis-landing' ); ?></option>
								</select>
								<label>
									<input type="checkbox"
										name="soldis_footer_settings[nav][<?php echo esc_attr( $index ); ?>][enabled]"
										value="1"
										<?php checked( ! empty( $item['enabled'] ), true ); ?>>
									<?php esc_html_e( 'Enable', 'soldis-landing' ); ?>
								</label>
							</div>
							<div class="soldis-repeater-actions">
								<button type="button" class="button soldis-repeater-remove"><?php esc_html_e( 'Remove', 'soldis-landing' ); ?></button>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<p>
						<button type="button" class="button button-primary" id="soldis-add-footer-nav-item">
							<?php esc_html_e( '+ Add Menu Item', 'soldis-landing' ); ?>
						</button>
					</p>
					<script>
					(function() {
						var repeater = document.getElementById('soldis-footer-nav-repeater');
						var addBtn   = document.getElementById('soldis-add-footer-nav-item');
						if ( ! repeater || ! addBtn ) return;

						addBtn.addEventListener('click', function() {
							var rows  = repeater.querySelectorAll('.soldis-repeater-row');
							var index = rows.length;
							var row   = document.createElement('div');
							row.className  = 'soldis-repeater-row';
							row.dataset.index = index;
							row.innerHTML = '<div class="soldis-repeater-fields">'
								+ '<input type="text" name="soldis_footer_settings[nav][' + index + '][label]" placeholder="Label">'
								+ '<input type="text" name="soldis_footer_settings[nav][' + index + '][url]" placeholder="URL">'
								+ '<select name="soldis_footer_settings[nav][' + index + '][target]">'
								+ '<option value="_self">Same Window</option>'
								+ '<option value="_blank">New Window</option>'
								+ '</select>'
								+ '<label><input type="checkbox" name="soldis_footer_settings[nav][' + index + '][enabled]" value="1" checked> Enable</label>'
								+ '</div>'
								+ '<div class="soldis-repeater-actions"><button type="button" class="button soldis-repeater-remove">Remove</button></div>';
							repeater.appendChild(row);
						});

						repeater.addEventListener('click', function(e) {
							if ( e.target.classList.contains('soldis-repeater-remove') ) {
								e.target.closest('.soldis-repeater-row').remove();
							}
						});
					})();
					</script>
				</div>

				<!-- ============================================
				     TAB: Legal & Credit
				     ============================================ -->
				<div class="soldis-tab-pane" id="tab-legal">
					<h2><?php esc_html_e( 'Legal & Developer Credit', 'soldis-landing' ); ?></h2>

					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Copyright Text', 'soldis-landing' ); ?></th>
							<td>
								<input type="text"
									name="soldis_footer_settings[copyright_text]"
									value="<?php echo esc_attr( $options['copyright_text'] ?? '' ); ?>"
									class="large-text"
									placeholder="© 2025 SOLDIS. Visos teisės saugomos.">
							</td>
						</tr>
					</table>

					<hr style="margin: 24px 0;">
					<h3><?php esc_html_e( 'Privacy Policy', 'soldis-landing' ); ?></h3>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Link Label', 'soldis-landing' ); ?></th>
							<td>
								<input type="text"
									name="soldis_footer_settings[privacy_label]"
									value="<?php echo esc_attr( $options['privacy_label'] ?? '' ); ?>"
									class="regular-text">
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Link URL', 'soldis-landing' ); ?></th>
							<td>
								<input type="text"
									name="soldis_footer_settings[privacy_url]"
									value="<?php echo esc_attr( $options['privacy_url'] ?? '' ); ?>"
									class="regular-text"
									placeholder="https://...">
							</td>
						</tr>
					</table>

					<hr style="margin: 24px 0;">
					<h3><?php esc_html_e( 'Terms & Conditions', 'soldis-landing' ); ?></h3>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Link Label', 'soldis-landing' ); ?></th>
							<td>
								<input type="text"
									name="soldis_footer_settings[terms_label]"
									value="<?php echo esc_attr( $options['terms_label'] ?? '' ); ?>"
									class="regular-text">
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Link URL', 'soldis-landing' ); ?></th>
							<td>
								<input type="text"
									name="soldis_footer_settings[terms_url]"
									value="<?php echo esc_attr( $options['terms_url'] ?? '' ); ?>"
									class="regular-text"
									placeholder="https://...">
							</td>
						</tr>
					</table>

					<hr style="margin: 24px 0;">
					<h3><?php esc_html_e( 'Developer Credit', 'soldis-landing' ); ?></h3>
					<p class="description"><?php esc_html_e( 'A subtle developer credit shown in the bottom legal bar.', 'soldis-landing' ); ?></p>
					<table class="form-table">
						<tr>
							<th scope="row"><?php esc_html_e( 'Credit Text', 'soldis-landing' ); ?></th>
							<td>
								<input type="text"
									name="soldis_footer_settings[credit_text]"
									value="<?php echo esc_attr( $options['credit_text'] ?? 'Designed & Developed by OPA Reklama' ); ?>"
									class="large-text">
							</td>
						</tr>
						<tr>
							<th scope="row"><?php esc_html_e( 'Credit URL', 'soldis-landing' ); ?></th>
							<td>
								<input type="text"
									name="soldis_footer_settings[credit_url]"
									value="<?php echo esc_attr( $options['credit_url'] ?? 'https://opareklama.lt/' ); ?>"
									class="regular-text"
									placeholder="https://opareklama.lt/">
							</td>
						</tr>
					</table>
				</div>

			</div><!-- /.soldis-tab-content -->
		</div><!-- /.soldis-tabs -->

		<?php submit_button( __( 'Save Footer Settings', 'soldis-landing' ) ); ?>
	</form>
</div>
