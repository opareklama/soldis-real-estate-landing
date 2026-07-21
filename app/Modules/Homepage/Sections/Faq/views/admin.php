<?php
/**
 * FAQ Admin View
 */
?>
<div class="soldis-section-settings">
	<h2><?php esc_html_e( 'FAQ (DUK) Section', 'soldis-landing' ); ?></h2>
	
	<table class="form-table">
		<tr>
			<th scope="row"><label for="soldis_faq_enable"><?php esc_html_e( 'Enable Section', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="checkbox" id="soldis_faq_enable" name="soldis_faq_settings[enable_faq]" value="1" <?php checked( '1', $options['enable_faq'] ); ?> />
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="soldis_faq_eyebrow"><?php esc_html_e( 'Eyebrow Text', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="text" id="soldis_faq_eyebrow" name="soldis_faq_settings[eyebrow]" value="<?php echo esc_attr( $options['eyebrow'] ); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="soldis_faq_heading"><?php esc_html_e( 'Heading', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="text" id="soldis_faq_heading" name="soldis_faq_settings[heading]" value="<?php echo esc_attr( $options['heading'] ); ?>" class="regular-text" />
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="soldis_faq_desc"><?php esc_html_e( 'Description', 'soldis-landing' ); ?></label></th>
			<td>
				<textarea id="soldis_faq_desc" name="soldis_faq_settings[description]" rows="5" class="large-text"><?php echo esc_textarea( $options['description'] ); ?></textarea>
			</td>
		</tr>
	</table>

	<!-- Padding Settings -->
	<h3><?php esc_html_e( 'Padding Settings', 'soldis-landing' ); ?></h3>
	<table class="form-table">
		<tr>
			<th scope="row"><label><?php esc_html_e( 'Desktop Padding (px)', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="number" name="soldis_faq_settings[pad_top_d]" value="<?php echo esc_attr( $options['pad_top_d'] ); ?>" class="small-text" placeholder="Top">
				<input type="number" name="soldis_faq_settings[pad_bot_d]" value="<?php echo esc_attr( $options['pad_bot_d'] ); ?>" class="small-text" placeholder="Bottom">
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php esc_html_e( 'Tablet Padding (px)', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="number" name="soldis_faq_settings[pad_top_t]" value="<?php echo esc_attr( $options['pad_top_t'] ); ?>" class="small-text" placeholder="Top">
				<input type="number" name="soldis_faq_settings[pad_bot_t]" value="<?php echo esc_attr( $options['pad_bot_t'] ); ?>" class="small-text" placeholder="Bottom">
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php esc_html_e( 'Mobile Padding (px)', 'soldis-landing' ); ?></label></th>
			<td>
				<input type="number" name="soldis_faq_settings[pad_top_m]" value="<?php echo esc_attr( $options['pad_top_m'] ); ?>" class="small-text" placeholder="Top">
				<input type="number" name="soldis_faq_settings[pad_bot_m]" value="<?php echo esc_attr( $options['pad_bot_m'] ); ?>" class="small-text" placeholder="Bottom">
			</td>
		</tr>
	</table>

	<!-- FAQ Repeater -->
	<hr>
	<h3><?php esc_html_e( 'FAQ Items', 'soldis-landing' ); ?></h3>
	<p class="description">Add your frequently asked questions here.</p>
	<div class="soldis-repeater-group" id="soldis-faq-repeater">
		<?php if ( ! empty( $options['items'] ) ) : ?>
			<?php foreach ( $options['items'] as $index => $item ) : ?>
				<div class="soldis-repeater-item">
					<div class="soldis-repeater-header">
						<h4><?php esc_html_e( 'Question', 'soldis-landing' ); ?> <span class="index"><?php echo $index + 1; ?></span></h4>
						<div class="soldis-repeater-actions">
							<button type="button" class="button soldis-repeater-toggle">↓</button>
							<button type="button" class="button soldis-repeater-remove">×</button>
						</div>
					</div>
					<div class="soldis-repeater-content">
						<div class="soldis-form-row">
							<label>
								<input type="checkbox" name="soldis_faq_settings[items][<?php echo $index; ?>][enabled]" value="1" <?php checked( '1', $item['enabled'] ?? '0' ); ?>>
								<?php esc_html_e( 'Enable Item', 'soldis-landing' ); ?>
							</label>
							<label style="margin-left:20px;">
								<input type="checkbox" name="soldis_faq_settings[items][<?php echo $index; ?>][open]" value="1" <?php checked( '1', $item['open'] ?? '0' ); ?>>
								<?php esc_html_e( 'Default Open (on load)', 'soldis-landing' ); ?>
							</label>
						</div>
						<div class="soldis-form-row">
							<label><?php esc_html_e( 'Question', 'soldis-landing' ); ?></label>
							<input type="text" name="soldis_faq_settings[items][<?php echo $index; ?>][question]" value="<?php echo esc_attr( $item['question'] ?? '' ); ?>" class="regular-text">
						</div>
						<div class="soldis-form-row">
							<label><?php esc_html_e( 'Answer', 'soldis-landing' ); ?></label>
							<textarea name="soldis_faq_settings[items][<?php echo $index; ?>][answer]" rows="4" class="large-text"><?php echo esc_textarea( $item['answer'] ?? '' ); ?></textarea>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<button type="button" class="button button-secondary soldis-repeater-add" data-target="#soldis-faq-repeater" data-name="soldis_faq_settings[items]">
		<?php esc_html_e( '+ Add Question', 'soldis-landing' ); ?>
	</button>

	<script>
	jQuery(document).ready(function($) {
		// Accordion Toggle for Blocks
		$(document).on('click', '#tab-faq .soldis-repeater-toggle, #tab-faq .soldis-repeater-header h4', function(e) {
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
		$(document).on('click', '#tab-faq .soldis-repeater-remove', function(e) {
			e.preventDefault();
			if (confirm('Are you sure you want to remove this item?')) {
				$(this).closest('.soldis-repeater-item').fadeOut(300, function() {
					$(this).remove();
				});
			}
		});

		// Hide all but the first one by default
		$('#tab-faq .soldis-repeater-item:not(:first) .soldis-repeater-content').hide();
		$('#tab-faq .soldis-repeater-item:not(:first) .soldis-repeater-toggle').text('↓');
		$('#tab-faq .soldis-repeater-item:first .soldis-repeater-toggle').text('↑');
	});
	</script>
</div>
