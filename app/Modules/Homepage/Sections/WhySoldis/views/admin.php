<?php
/**
 * WhySoldis Admin View
 */
?>
<div class="soldis-section-settings">
	<h2><?php esc_html_e( 'Kodėl SOLDIS? Section', 'soldis-landing' ); ?></h2>
	
	<table class="form-table">
		<tr>
			<th scope="row"><label for="soldis_whysoldis_enable"><?php esc_html_e( 'Enable Section', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="checkbox" id="soldis_whysoldis_enable" name="soldis_whysoldis_settings[enable_whysoldis]" value="1" <?php checked( '1', $options['enable_whysoldis'] ); ?> />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="soldis_whysoldis_animation"><?php esc_html_e( 'Enable Animations', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="checkbox" id="soldis_whysoldis_animation" name="soldis_whysoldis_settings[enable_animation]" value="1" <?php checked( '1', $options['enable_animation'] ); ?> />
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="soldis_whysoldis_eyebrow"><?php esc_html_e( 'Eyebrow Text', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="text" id="soldis_whysoldis_eyebrow" name="soldis_whysoldis_settings[eyebrow]" value="<?php echo esc_attr( $options['eyebrow'] ); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="soldis_whysoldis_heading"><?php esc_html_e( 'Heading', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="text" id="soldis_whysoldis_heading" name="soldis_whysoldis_settings[heading]" value="<?php echo esc_attr( $options['heading'] ); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="soldis_whysoldis_desc"><?php esc_html_e( 'Description', 'soldis-landing' ); ?></label></th>
			<td>
				<textarea id="soldis_whysoldis_desc" name="soldis_whysoldis_settings[description]" rows="5" class="large-text"><?php echo esc_textarea( $options['description'] ); ?></textarea>
			</td>
		</tr>
	</table>

	<!-- Padding Settings -->
	<h3><?php esc_html_e( 'Padding Settings', 'soldis-landing' ); ?></h3>
	<table class="form-table">
		<tr>
			<th scope="row"><label><?php esc_html_e( 'Desktop Padding (px)', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="number" name="soldis_whysoldis_settings[pad_top_d]" value="<?php echo esc_attr( $options['pad_top_d'] ); ?>" class="small-text" placeholder="Top">
				<input type="number" name="soldis_whysoldis_settings[pad_bot_d]" value="<?php echo esc_attr( $options['pad_bot_d'] ); ?>" class="small-text" placeholder="Bottom">
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php esc_html_e( 'Tablet Padding (px)', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="number" name="soldis_whysoldis_settings[pad_top_t]" value="<?php echo esc_attr( $options['pad_top_t'] ); ?>" class="small-text" placeholder="Top">
				<input type="number" name="soldis_whysoldis_settings[pad_bot_t]" value="<?php echo esc_attr( $options['pad_bot_t'] ); ?>" class="small-text" placeholder="Bottom">
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php esc_html_e( 'Mobile Padding (px)', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="number" name="soldis_whysoldis_settings[pad_top_m]" value="<?php echo esc_attr( $options['pad_top_m'] ); ?>" class="small-text" placeholder="Top">
				<input type="number" name="soldis_whysoldis_settings[pad_bot_m]" value="<?php echo esc_attr( $options['pad_bot_m'] ); ?>" class="small-text" placeholder="Bottom">
			</td>
		</tr>
	</table>

	<!-- Feature Cards -->
	<hr>
	<h3><?php esc_html_e( 'Feature Cards', 'soldis-landing' ); ?></h3>
	<div class="soldis-repeater-group" id="soldis-whysoldis-cards-repeater">
		<?php if ( ! empty( $options['cards'] ) ) : ?>
			<?php foreach ( $options['cards'] as $index => $card ) : ?>
				<div class="soldis-repeater-item">
					<div class="soldis-repeater-header">
						<h4><?php esc_html_e( 'Card', 'soldis-landing' ); ?> <span class="index"><?php echo $index + 1; ?></span></h4>
						<div class="soldis-repeater-actions">
							<button type="button" class="button soldis-repeater-toggle">↓</button>
							<button type="button" class="button soldis-repeater-remove">×</button>
						</div>
					</div>
					<div class="soldis-repeater-content">
						<div class="soldis-form-row">
							<label>
								<input type="checkbox" name="soldis_whysoldis_settings[cards][<?php echo $index; ?>][enabled]" value="1" <?php checked( '1', $card['enabled'] ?? '0' ); ?>>
								<?php esc_html_e( 'Enable Card', 'soldis-landing' ); ?>
							</label>
						</div>
						<div class="soldis-form-row">
							<label><?php esc_html_e( 'Title', 'soldis-landing' ); ?></label>
							<input type="text" name="soldis_whysoldis_settings[cards][<?php echo $index; ?>][title]" value="<?php echo esc_attr( $card['title'] ?? '' ); ?>" class="regular-text">
						</div>
						<div class="soldis-form-row">
							<label><?php esc_html_e( 'Description', 'soldis-landing' ); ?></label>
							<textarea name="soldis_whysoldis_settings[cards][<?php echo $index; ?>][desc]" rows="3" class="large-text"><?php echo esc_textarea( $card['desc'] ?? '' ); ?></textarea>
						</div>
						<div class="soldis-form-row">
							<label><?php esc_html_e( 'Icon Name', 'soldis-landing' ); ?></label>
							<input type="text" name="soldis_whysoldis_settings[cards][<?php echo $index; ?>][icon]" value="<?php echo esc_attr( $card['icon'] ?? 'check-circle' ); ?>" class="regular-text">
							<p class="description">shield, document-text, speakerphone, target, etc.</p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<button type="button" class="button button-secondary soldis-repeater-add" data-target="#soldis-whysoldis-cards-repeater" data-name="soldis_whysoldis_settings[cards]">
		<?php esc_html_e( '+ Add Feature Card', 'soldis-landing' ); ?>
	</button>

	<!-- Bottom Callout -->
	<hr>
	<h3><?php esc_html_e( 'Bottom Highlight Callout', 'soldis-landing' ); ?></h3>
	<table class="form-table">
		<tr>
			<th scope="row"><label for="soldis_why_callout_enable"><?php esc_html_e( 'Enable Callout', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="checkbox" id="soldis_why_callout_enable" name="soldis_whysoldis_settings[callout_enable]" value="1" <?php checked( '1', $options['callout_enable'] ); ?> />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="soldis_why_callout_icon"><?php esc_html_e( 'Icon Name', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="text" id="soldis_why_callout_icon" name="soldis_whysoldis_settings[callout_icon]" value="<?php echo esc_attr( $options['callout_icon'] ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="soldis_why_callout_title"><?php esc_html_e( 'Title', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="text" id="soldis_why_callout_title" name="soldis_whysoldis_settings[callout_title]" value="<?php echo esc_attr( $options['callout_title'] ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="soldis_why_callout_desc"><?php esc_html_e( 'Description', 'soldis-landing' ); ?></label></th>
			<td>
				<textarea id="soldis_why_callout_desc" name="soldis_whysoldis_settings[callout_desc]" rows="3" class="large-text"><?php echo esc_textarea( $options['callout_desc'] ); ?></textarea>
			</td>
		</tr>
	</table>

	<script>
	jQuery(document).ready(function($) {
		// Accordion Toggle
		$(document).on('click', '.soldis-repeater-toggle, .soldis-repeater-header h4', function(e) {
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
		$(document).on('click', '.soldis-repeater-remove', function(e) {
			e.preventDefault();
			if (confirm('Are you sure you want to remove this card?')) {
				$(this).closest('.soldis-repeater-item').fadeOut(300, function() {
					$(this).remove();
				});
			}
		});

		// Hide all but the first one by default for a clean look
		$('.soldis-repeater-item:not(:first) .soldis-repeater-content').hide();
		$('.soldis-repeater-item:not(:first) .soldis-repeater-toggle').text('↓');
		$('.soldis-repeater-item:first .soldis-repeater-toggle').text('↑');
	});
	</script>
</div>
