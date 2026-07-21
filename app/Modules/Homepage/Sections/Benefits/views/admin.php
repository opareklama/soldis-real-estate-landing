<?php
defined( 'ABSPATH' ) || exit;

/**
 * Benefits Admin View
 */
?>
<div class="soldis-section-settings">
	<h2><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Ką Jūs gaunate? Section', 'soldis-landing' ); ?></h2>
	
	<table class="form-table">
		<tr>
			<th scope="row"><label for="soldis_benefits_enable"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Enable Section', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="checkbox" id="soldis_benefits_enable" name="soldis_benefits_settings[enable_benefits]" value="1" <?php defined( 'ABSPATH' ) || exit;

checked( '1', $options['enable_benefits'] ); ?> />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="soldis_benefits_animation"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Enable Animations', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="checkbox" id="soldis_benefits_animation" name="soldis_benefits_settings[enable_animation]" value="1" <?php defined( 'ABSPATH' ) || exit;

checked( '1', $options['enable_animation'] ); ?> />
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="soldis_benefits_eyebrow"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Eyebrow Text', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="text" id="soldis_benefits_eyebrow" name="soldis_benefits_settings[eyebrow]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['eyebrow'] ); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="soldis_benefits_heading"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Heading', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="text" id="soldis_benefits_heading" name="soldis_benefits_settings[heading]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['heading'] ); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="soldis_benefits_desc"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Description', 'soldis-landing' ); ?></label></th>
			<td>
				<textarea id="soldis_benefits_desc" name="soldis_benefits_settings[description]" rows="5" class="large-text"><?php defined( 'ABSPATH' ) || exit;

echo esc_textarea( $options['description'] ); ?></textarea>
			</td>
		</tr>
	</table>

	<!-- Padding Settings -->
	<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Padding Settings', 'soldis-landing' ); ?></h3>
	<table class="form-table">
		<tr>
			<th scope="row"><label><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Desktop Padding (px)', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="number" name="soldis_benefits_settings[pad_top_d]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['pad_top_d'] ); ?>" class="small-text" placeholder="Top">
				<input type="number" name="soldis_benefits_settings[pad_bot_d]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['pad_bot_d'] ); ?>" class="small-text" placeholder="Bottom">
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Tablet Padding (px)', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="number" name="soldis_benefits_settings[pad_top_t]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['pad_top_t'] ); ?>" class="small-text" placeholder="Top">
				<input type="number" name="soldis_benefits_settings[pad_bot_t]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['pad_bot_t'] ); ?>" class="small-text" placeholder="Bottom">
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Mobile Padding (px)', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="number" name="soldis_benefits_settings[pad_top_m]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['pad_top_m'] ); ?>" class="small-text" placeholder="Top">
				<input type="number" name="soldis_benefits_settings[pad_bot_m]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['pad_bot_m'] ); ?>" class="small-text" placeholder="Bottom">
			</td>
		</tr>
	</table>

	<!-- Benefits Repeater -->
	<hr>
	<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Benefits (Scrolling List)', 'soldis-landing' ); ?></h3>
	<div class="soldis-repeater-group" id="soldis-benefits-repeater">
		<?php defined( 'ABSPATH' ) || exit;

if ( ! empty( $options['benefits'] ) ) : ?>
			<?php defined( 'ABSPATH' ) || exit;

foreach ( $options['benefits'] as $index => $benefit ) : ?>
				<div class="soldis-repeater-item">
					<div class="soldis-repeater-header">
						<h4><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Benefit', 'soldis-landing' ); ?> <span class="index"><?php defined( 'ABSPATH' ) || exit;

echo $index + 1; ?></span></h4>
						<div class="soldis-repeater-actions">
							<button type="button" class="button soldis-repeater-toggle">↓</button>
							<button type="button" class="button soldis-repeater-remove">×</button>
						</div>
					</div>
					<div class="soldis-repeater-content">
						<div class="soldis-form-row">
							<label>
								<input type="checkbox" name="soldis_benefits_settings[benefits][<?php defined( 'ABSPATH' ) || exit;

echo $index; ?>][enabled]" value="1" <?php defined( 'ABSPATH' ) || exit;

checked( '1', $benefit['enabled'] ?? '0' ); ?>>
								<?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Enable Benefit', 'soldis-landing' ); ?>
							</label>
						</div>
						<div class="soldis-form-row">
							<label><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Title', 'soldis-landing' ); ?></label>
							<input type="text" name="soldis_benefits_settings[benefits][<?php defined( 'ABSPATH' ) || exit;

echo $index; ?>][title]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $benefit['title'] ?? '' ); ?>" class="regular-text">
						</div>
						<div class="soldis-form-row">
							<label><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Description', 'soldis-landing' ); ?></label>
							<textarea name="soldis_benefits_settings[benefits][<?php defined( 'ABSPATH' ) || exit;

echo $index; ?>][desc]" rows="3" class="large-text"><?php defined( 'ABSPATH' ) || exit;

echo esc_textarea( $benefit['desc'] ?? '' ); ?></textarea>
						</div>
						<div class="soldis-form-row">
							<label><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Icon Name', 'soldis-landing' ); ?></label>
							<input type="text" name="soldis_benefits_settings[benefits][<?php defined( 'ABSPATH' ) || exit;

echo $index; ?>][icon]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $benefit['icon'] ?? 'document-text' ); ?>" class="regular-text">
							<p class="description">shield-check, chart-bar, camera, currency-euro, users, etc.</p>
						</div>
					</div>
				</div>
			<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
		<?php defined( 'ABSPATH' ) || exit;

endif; ?>
	</div>
	<button type="button" class="button button-secondary soldis-repeater-add" data-target="#soldis-benefits-repeater" data-name="soldis_benefits_settings[benefits]">
		<?php defined( 'ABSPATH' ) || exit;

esc_html_e( '+ Add Benefit', 'soldis-landing' ); ?>
	</button>

	<!-- Bottom Callout -->
	<hr>
	<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Bottom Highlight Banner', 'soldis-landing' ); ?></h3>
	<table class="form-table">
		<tr>
			<th scope="row"><label for="soldis_ben_callout_enable"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Enable Callout', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="checkbox" id="soldis_ben_callout_enable" name="soldis_benefits_settings[callout_enable]" value="1" <?php defined( 'ABSPATH' ) || exit;

checked( '1', $options['callout_enable'] ); ?> />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="soldis_ben_callout_title"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Title', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="text" id="soldis_ben_callout_title" name="soldis_benefits_settings[callout_title]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['callout_title'] ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="soldis_ben_callout_desc"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Description', 'soldis-landing' ); ?></label></th>
			<td>
				<textarea id="soldis_ben_callout_desc" name="soldis_benefits_settings[callout_desc]" rows="3" class="large-text"><?php defined( 'ABSPATH' ) || exit;

echo esc_textarea( $options['callout_desc'] ); ?></textarea>
			</td>
		</tr>
	</table>

	<script>
	jQuery(document).ready(function($) {
		// Accordion Toggle for Benefits
		$(document).on('click', '#tab-benefits .soldis-repeater-toggle, #tab-benefits .soldis-repeater-header h4', function(e) {
			e.preventDefault();
			var item = $(this).closest('.soldis-repeater-item');
			var content = item.find('.soldis-repeater-content');
			var btn = item.find('.soldis-repeater-toggle');
			
			content.slideToggle(200, function() {
				if (content.is(':visible')) {
					btn.text('↑');
				} else {
					btn.text('↓');
				}
			});
		});

		// Remove Item
		$(document).on('click', '#tab-benefits .soldis-repeater-remove', function(e) {
			e.preventDefault();
			if (confirm('Are you sure you want to remove this item?')) {
				$(this).closest('.soldis-repeater-item').fadeOut(300, function() {
					$(this).remove();
				});
			}
		});

		// Hide all but the first one by default
		$('#tab-benefits .soldis-repeater-item:not(:first) .soldis-repeater-content').hide();
		$('#tab-benefits .soldis-repeater-item:not(:first) .soldis-repeater-toggle').text('↓');
		$('#tab-benefits .soldis-repeater-item:first .soldis-repeater-toggle').text('↑');
	});
	</script>
</div>

