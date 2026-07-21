<?php
/**
 * Investment Admin View
 */
?>
<div class="soldis-section-settings">
	<h2><?php esc_html_e( 'Kodėl investuojame? Section', 'soldis-landing' ); ?></h2>
	
	<table class="form-table">
		<tr>
			<th scope="row"><label for="soldis_inv_enable"><?php esc_html_e( 'Enable Section', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="checkbox" id="soldis_inv_enable" name="soldis_investment_settings[enable_investment]" value="1" <?php checked( '1', $options['enable_investment'] ); ?> />
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="soldis_inv_eyebrow"><?php esc_html_e( 'Eyebrow Text', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="text" id="soldis_inv_eyebrow" name="soldis_investment_settings[eyebrow]" value="<?php echo esc_attr( $options['eyebrow'] ); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="soldis_inv_heading"><?php esc_html_e( 'Heading', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="text" id="soldis_inv_heading" name="soldis_investment_settings[heading]" value="<?php echo esc_attr( $options['heading'] ); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="soldis_inv_desc"><?php esc_html_e( 'Description', 'soldis-landing' ); ?></label></th>
			<td>
				<textarea id="soldis_inv_desc" name="soldis_investment_settings[description]" rows="5" class="large-text"><?php echo esc_textarea( $options['description'] ); ?></textarea>
			</td>
		</tr>
	</table>

	<!-- Padding Settings -->
	<h3><?php esc_html_e( 'Padding Settings', 'soldis-landing' ); ?></h3>
	<table class="form-table">
		<tr>
			<th scope="row"><label><?php esc_html_e( 'Desktop Padding (px)', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="number" name="soldis_investment_settings[pad_top_d]" value="<?php echo esc_attr( $options['pad_top_d'] ); ?>" class="small-text" placeholder="Top">
				<input type="number" name="soldis_investment_settings[pad_bot_d]" value="<?php echo esc_attr( $options['pad_bot_d'] ); ?>" class="small-text" placeholder="Bottom">
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php esc_html_e( 'Tablet Padding (px)', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="number" name="soldis_investment_settings[pad_top_t]" value="<?php echo esc_attr( $options['pad_top_t'] ); ?>" class="small-text" placeholder="Top">
				<input type="number" name="soldis_investment_settings[pad_bot_t]" value="<?php echo esc_attr( $options['pad_bot_t'] ); ?>" class="small-text" placeholder="Bottom">
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php esc_html_e( 'Mobile Padding (px)', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="number" name="soldis_investment_settings[pad_top_m]" value="<?php echo esc_attr( $options['pad_top_m'] ); ?>" class="small-text" placeholder="Top">
				<input type="number" name="soldis_investment_settings[pad_bot_m]" value="<?php echo esc_attr( $options['pad_bot_m'] ); ?>" class="small-text" placeholder="Bottom">
			</td>
		</tr>
	</table>

	<!-- Blocks Repeater -->
	<hr>
	<h3><?php esc_html_e( 'Content Blocks', 'soldis-landing' ); ?></h3>
	<div class="soldis-repeater-group" id="soldis-investment-repeater">
		<?php if ( ! empty( $options['blocks'] ) ) : ?>
			<?php foreach ( $options['blocks'] as $index => $block ) : ?>
				<div class="soldis-repeater-item">
					<div class="soldis-repeater-header">
						<h4><?php esc_html_e( 'Block', 'soldis-landing' ); ?> <span class="index"><?php echo $index + 1; ?></span></h4>
						<div class="soldis-repeater-actions">
							<button type="button" class="button soldis-repeater-toggle">↓</button>
							<button type="button" class="button soldis-repeater-remove">×</button>
						</div>
					</div>
					<div class="soldis-repeater-content">
						<div class="soldis-form-row">
							<label>
								<input type="checkbox" name="soldis_investment_settings[blocks][<?php echo $index; ?>][enabled]" value="1" <?php checked( '1', $block['enabled'] ?? '0' ); ?>>
								<?php esc_html_e( 'Enable Block', 'soldis-landing' ); ?>
							</label>
						</div>
						<div class="soldis-form-row">
							<label><?php esc_html_e( 'Title', 'soldis-landing' ); ?></label>
							<input type="text" name="soldis_investment_settings[blocks][<?php echo $index; ?>][title]" value="<?php echo esc_attr( $block['title'] ?? '' ); ?>" class="regular-text">
						</div>
						<div class="soldis-form-row">
							<label><?php esc_html_e( 'Description', 'soldis-landing' ); ?></label>
							<textarea name="soldis_investment_settings[blocks][<?php echo $index; ?>][desc]" rows="3" class="large-text"><?php echo esc_textarea( $block['desc'] ?? '' ); ?></textarea>
						</div>
						<div class="soldis-form-row">
							<label><?php esc_html_e( 'Icon Name', 'soldis-landing' ); ?></label>
							<input type="text" name="soldis_investment_settings[blocks][<?php echo $index; ?>][icon]" value="<?php echo esc_attr( $block['icon'] ?? 'sparkles' ); ?>" class="regular-text">
							<p class="description">sparkles, globe, eye, currency-euro, etc.</p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<button type="button" class="button button-secondary soldis-repeater-add" data-target="#soldis-investment-repeater" data-name="soldis_investment_settings[blocks]">
		<?php esc_html_e( '+ Add Block', 'soldis-landing' ); ?>
	</button>

	<!-- Bottom Callout -->
	<hr>
	<h3><?php esc_html_e( 'Bottom Closing Banner', 'soldis-landing' ); ?></h3>
	<table class="form-table">
		<tr>
			<th scope="row"><label for="soldis_inv_callout_enable"><?php esc_html_e( 'Enable Callout', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="checkbox" id="soldis_inv_callout_enable" name="soldis_investment_settings[callout_enable]" value="1" <?php checked( '1', $options['callout_enable'] ); ?> />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="soldis_inv_callout_title"><?php esc_html_e( 'Title', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="text" id="soldis_inv_callout_title" name="soldis_investment_settings[callout_title]" value="<?php echo esc_attr( $options['callout_title'] ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="soldis_inv_callout_desc"><?php esc_html_e( 'Description', 'soldis-landing' ); ?></label></th>
			<td>
				<textarea id="soldis_inv_callout_desc" name="soldis_investment_settings[callout_desc]" rows="3" class="large-text"><?php echo esc_textarea( $options['callout_desc'] ); ?></textarea>
			</td>
		</tr>
	</table>

	<script>
	jQuery(document).ready(function($) {
		// Accordion Toggle for Blocks
		$(document).on('click', '#tab-investment .soldis-repeater-toggle, #tab-investment .soldis-repeater-header h4', function(e) {
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
		$(document).on('click', '#tab-investment .soldis-repeater-remove', function(e) {
			e.preventDefault();
			if (confirm('Are you sure you want to remove this item?')) {
				$(this).closest('.soldis-repeater-item').fadeOut(300, function() {
					$(this).remove();
				});
			}
		});

		// Hide all but the first one by default
		$('#tab-investment .soldis-repeater-item:not(:first) .soldis-repeater-content').hide();
		$('#tab-investment .soldis-repeater-item:not(:first) .soldis-repeater-toggle').text('↓');
		$('#tab-investment .soldis-repeater-item:first .soldis-repeater-toggle').text('↑');
	});
	</script>
</div>
