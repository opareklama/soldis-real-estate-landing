<?php
defined( 'ABSPATH' ) || exit;

/**
 * Hero Admin View
 * 
 * @var array $options
 */
?>
<div class="soldis-settings-panel">
	<h2><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Hero Section Settings', 'soldis-landing' ); ?></h2>
	
	<p>
		<label>
			<input type="checkbox" name="soldis_hero_settings[enable_hero]" value="1" <?php defined( 'ABSPATH' ) || exit;

checked( ! empty( $options['enable_hero'] ), true ); ?>>
			<strong><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Enable Hero Section', 'soldis-landing' ); ?></strong>
		</label>
	</p>

	<div class="soldis-settings-group">
		<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Content', 'soldis-landing' ); ?></h3>
		<table class="form-table">
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Eyebrow Text', 'soldis-landing' ); ?></th>
				<td><input type="text" name="soldis_hero_settings[eyebrow]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['eyebrow'] ?? '' ); ?>" class="regular-text"></td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Heading', 'soldis-landing' ); ?></th>
				<td><input type="text" name="soldis_hero_settings[heading]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['heading'] ?? '' ); ?>" class="large-text"></td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Highlight Text', 'soldis-landing' ); ?></th>
				<td><input type="text" name="soldis_hero_settings[highlight]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['highlight'] ?? '' ); ?>" class="regular-text"></td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Description', 'soldis-landing' ); ?></th>
				<td><textarea name="soldis_hero_settings[description]" rows="4" class="large-text"><?php defined( 'ABSPATH' ) || exit;

echo esc_textarea( $options['description'] ?? '' ); ?></textarea></td>
			</tr>
		</table>
	</div>

	<div class="soldis-settings-group">
		<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Buttons', 'soldis-landing' ); ?></h3>
		<h4><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Primary Button', 'soldis-landing' ); ?></h4>
		<table class="form-table">
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Label', 'soldis-landing' ); ?></th>
				<td><input type="text" name="soldis_hero_settings[btn_primary_label]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['btn_primary_label'] ?? '' ); ?>" class="regular-text"></td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'URL', 'soldis-landing' ); ?></th>
				<td><input type="text" name="soldis_hero_settings[btn_primary_url]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['btn_primary_url'] ?? '' ); ?>" class="regular-text"></td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Target', 'soldis-landing' ); ?></th>
				<td>
					<select name="soldis_hero_settings[btn_primary_target]">
						<option value="_self" <?php defined( 'ABSPATH' ) || exit;

selected( $options['btn_primary_target'] ?? '_self', '_self' ); ?>><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Same Window', 'soldis-landing' ); ?></option>
						<option value="_blank" <?php defined( 'ABSPATH' ) || exit;

selected( $options['btn_primary_target'] ?? '', '_blank' ); ?>><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'New Window', 'soldis-landing' ); ?></option>
					</select>
				</td>
			</tr>
		</table>

		<h4><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Secondary Button', 'soldis-landing' ); ?></h4>
		<table class="form-table">
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Enable Secondary', 'soldis-landing' ); ?></th>
				<td>
					<label>
						<input type="checkbox" name="soldis_hero_settings[btn_secondary_enable]" value="1" <?php defined( 'ABSPATH' ) || exit;

checked( ! empty( $options['btn_secondary_enable'] ), true ); ?>>
					</label>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Label', 'soldis-landing' ); ?></th>
				<td><input type="text" name="soldis_hero_settings[btn_secondary_label]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['btn_secondary_label'] ?? '' ); ?>" class="regular-text"></td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'URL', 'soldis-landing' ); ?></th>
				<td><input type="text" name="soldis_hero_settings[btn_secondary_url]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['btn_secondary_url'] ?? '' ); ?>" class="regular-text"></td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Target', 'soldis-landing' ); ?></th>
				<td>
					<select name="soldis_hero_settings[btn_secondary_target]">
						<option value="_self" <?php defined( 'ABSPATH' ) || exit;

selected( $options['btn_secondary_target'] ?? '_self', '_self' ); ?>><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Same Window', 'soldis-landing' ); ?></option>
						<option value="_blank" <?php defined( 'ABSPATH' ) || exit;

selected( $options['btn_secondary_target'] ?? '', '_blank' ); ?>><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'New Window', 'soldis-landing' ); ?></option>
					</select>
				</td>
			</tr>
		</table>
	</div>

	<div class="soldis-settings-group">
		<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Hero Image', 'soldis-landing' ); ?></h3>
		<table class="form-table">
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Enable Image', 'soldis-landing' ); ?></th>
				<td>
					<label>
						<input type="checkbox" name="soldis_hero_settings[hero_image_enable]" value="1" <?php defined( 'ABSPATH' ) || exit;

checked( ! empty( $options['hero_image_enable'] ), true ); ?>>
					</label>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Upload Image', 'soldis-landing' ); ?></th>
				<td>
					<input type="hidden" id="hero_image" name="soldis_hero_settings[hero_image]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['hero_image'] ?? '' ); ?>">
					<img src="<?php defined( 'ABSPATH' ) || exit;

echo esc_url( $options['hero_image'] ?? '' ); ?>" id="hero_image_preview" style="max-width:300px; display: <?php defined( 'ABSPATH' ) || exit;

echo !empty($options['hero_image']) ? 'block' : 'none'; ?>; margin-bottom:10px;">
					<button type="button" class="button soldis-upload-btn" data-target="#hero_image" data-preview="#hero_image_preview"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Upload Image', 'soldis-landing' ); ?></button>
					<button type="button" class="button soldis-remove-btn" data-target="#hero_image" data-preview="#hero_image_preview"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Remove', 'soldis-landing' ); ?></button>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Alt Text', 'soldis-landing' ); ?></th>
				<td><input type="text" name="soldis_hero_settings[hero_alt]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['hero_alt'] ?? '' ); ?>" class="regular-text"></td>
			</tr>
		</table>
	</div>

	<div class="soldis-settings-group">
		<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Trust Items', 'soldis-landing' ); ?></h3>
		<div id="soldis-hero-trust-repeater" class="soldis-repeater">
			<?php 
			defined( 'ABSPATH' ) || exit;

$trust_items = $options['trust_items'] ?? array();
			if ( empty( $trust_items ) ) $trust_items = array( array() );
			foreach ( $trust_items as $index => $item ) : 
			?>
			<div class="soldis-repeater-row" data-index="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>">
				<div class="soldis-repeater-fields">
					<input type="text" name="soldis_hero_settings[trust_items][<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>][title]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $item['title'] ?? '' ); ?>" placeholder="Title">
					<input type="text" name="soldis_hero_settings[trust_items][<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>][desc]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $item['desc'] ?? '' ); ?>" placeholder="Subtitle / Description">
					<input type="text" name="soldis_hero_settings[trust_items][<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>][icon]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $item['icon'] ?? '' ); ?>" placeholder="Icon name (e.g. shield)">
					<label>
						<input type="checkbox" name="soldis_hero_settings[trust_items][<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>][enabled]" value="1" <?php defined( 'ABSPATH' ) || exit;

checked( ! empty( $item['enabled'] ), true ); ?>> Enable
					</label>
				</div>
				<div class="soldis-repeater-actions">
					<button type="button" class="button soldis-repeater-remove"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Remove', 'soldis-landing' ); ?></button>
				</div>
			</div>
			<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
		</div>
		<p><button type="button" class="button button-primary" id="soldis-add-hero-trust-item"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Add Trust Item', 'soldis-landing' ); ?></button></p>
	</div>

	<div class="soldis-settings-group">
		<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Ratings Block', 'soldis-landing' ); ?></h3>
		<table class="form-table">
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Enable Ratings Block', 'soldis-landing' ); ?></th>
				<td>
					<input type="checkbox" name="soldis_hero_settings[ratings_enable]" value="1" <?php defined( 'ABSPATH' ) || exit;

checked( ! empty( $options['ratings_enable'] ), true ); ?>>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Ratings Score Text', 'soldis-landing' ); ?></th>
				<td><input type="text" name="soldis_hero_settings[ratings_score]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['ratings_score'] ?? '' ); ?>" class="regular-text"></td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Ratings Subtitle', 'soldis-landing' ); ?></th>
				<td><input type="text" name="soldis_hero_settings[ratings_text]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['ratings_text'] ?? '' ); ?>" class="large-text"></td>
			</tr>
		</table>
	</div>

	<div class="soldis-settings-group">
		<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Glass Cards', 'soldis-landing' ); ?></h3>
		<div id="soldis-hero-cards-repeater" class="soldis-repeater">
			<?php 
			defined( 'ABSPATH' ) || exit;

$glass_cards = $options['glass_cards'] ?? array();
			if ( empty( $glass_cards ) ) $glass_cards = array( array() );
			foreach ( $glass_cards as $index => $item ) : 
			?>
			<div class="soldis-repeater-row" data-index="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>">
				<div class="soldis-repeater-fields">
					<input type="text" name="soldis_hero_settings[glass_cards][<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>][title]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $item['title'] ?? '' ); ?>" placeholder="Title (e.g. 10+)">
					<input type="text" name="soldis_hero_settings[glass_cards][<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>][subtitle]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $item['subtitle'] ?? '' ); ?>" placeholder="Subtitle">
					<input type="text" name="soldis_hero_settings[glass_cards][<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>][icon]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $item['icon'] ?? '' ); ?>" placeholder="Icon name">
					<label>
						<input type="checkbox" name="soldis_hero_settings[glass_cards][<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>][enabled]" value="1" <?php defined( 'ABSPATH' ) || exit;

checked( ! empty( $item['enabled'] ), true ); ?>> Enable
					</label>
				</div>
				<div class="soldis-repeater-actions">
					<button type="button" class="button soldis-repeater-remove"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Remove', 'soldis-landing' ); ?></button>
				</div>
			</div>
			<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
		</div>
		<p><button type="button" class="button button-primary" id="soldis-add-hero-card-item"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Add Glass Card', 'soldis-landing' ); ?></button></p>
	</div>

	<div class="soldis-settings-group">
		<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Bottom Stats Bar', 'soldis-landing' ); ?></h3>
		<div id="soldis-hero-bottom-stats-repeater" class="soldis-repeater">
			<?php 
			defined( 'ABSPATH' ) || exit;

$bottom_stats = $options['bottom_stats'] ?? array();
			if ( empty( $bottom_stats ) ) $bottom_stats = array( array() );
			foreach ( $bottom_stats as $index => $item ) : 
			?>
			<div class="soldis-repeater-row" data-index="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>">
				<div class="soldis-repeater-fields">
					<input type="text" name="soldis_hero_settings[bottom_stats][<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>][title]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $item['title'] ?? '' ); ?>" placeholder="Title (e.g. 250+)">
					<input type="text" name="soldis_hero_settings[bottom_stats][<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>][subtitle]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $item['subtitle'] ?? '' ); ?>" placeholder="Subtitle">
					<input type="text" name="soldis_hero_settings[bottom_stats][<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>][icon]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $item['icon'] ?? '' ); ?>" placeholder="Icon name">
					<select name="soldis_hero_settings[bottom_stats][<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>][color]">
						<option value="blue" <?php defined( 'ABSPATH' ) || exit;

selected( $item['color'] ?? 'blue', 'blue' ); ?>><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Blue', 'soldis-landing' ); ?></option>
						<option value="gold" <?php defined( 'ABSPATH' ) || exit;

selected( $item['color'] ?? 'blue', 'gold' ); ?>><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Gold', 'soldis-landing' ); ?></option>
					</select>
					<label>
						<input type="checkbox" name="soldis_hero_settings[bottom_stats][<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $index ); ?>][enabled]" value="1" <?php defined( 'ABSPATH' ) || exit;

checked( ! empty( $item['enabled'] ), true ); ?>> Enable
					</label>
				</div>
				<div class="soldis-repeater-actions">
					<button type="button" class="button soldis-repeater-remove"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Remove', 'soldis-landing' ); ?></button>
				</div>
			</div>
			<?php defined( 'ABSPATH' ) || exit;

endforeach; ?>
		</div>
		<p><button type="button" class="button button-primary" id="soldis-add-hero-stat-item"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Add Stat Item', 'soldis-landing' ); ?></button></p>
	</div>

	<div class="soldis-settings-group">
		<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Background Settings', 'soldis-landing' ); ?></h3>
		<table class="form-table">
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Background Type', 'soldis-landing' ); ?></th>
				<td>
					<select name="soldis_hero_settings[bg_type]">
						<option value="solid" <?php defined( 'ABSPATH' ) || exit;

selected( $options['bg_type'] ?? 'gradient', 'solid' ); ?>><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Solid Color', 'soldis-landing' ); ?></option>
						<option value="gradient" <?php defined( 'ABSPATH' ) || exit;

selected( $options['bg_type'] ?? 'gradient', 'gradient' ); ?>><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Gradient', 'soldis-landing' ); ?></option>
						<option value="image" <?php defined( 'ABSPATH' ) || exit;

selected( $options['bg_type'] ?? 'gradient', 'image' ); ?>><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Image', 'soldis-landing' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Background Color', 'soldis-landing' ); ?></th>
				<td><input type="text" name="soldis_hero_settings[bg_color]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['bg_color'] ?? '' ); ?>" class="regular-text soldis-color-picker"></td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Background Gradient', 'soldis-landing' ); ?></th>
				<td><input type="text" name="soldis_hero_settings[bg_gradient]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['bg_gradient'] ?? '' ); ?>" class="large-text"></td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Background Image', 'soldis-landing' ); ?></th>
				<td>
					<input type="hidden" id="bg_image" name="soldis_hero_settings[bg_image]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['bg_image'] ?? '' ); ?>">
					<button type="button" class="button soldis-upload-btn" data-target="#bg_image"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Upload BG Image', 'soldis-landing' ); ?></button>
					<button type="button" class="button soldis-remove-btn" data-target="#bg_image"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Remove', 'soldis-landing' ); ?></button>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Overlay Color', 'soldis-landing' ); ?></th>
				<td><input type="text" name="soldis_hero_settings[bg_overlay_color]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['bg_overlay_color'] ?? '' ); ?>" class="regular-text soldis-color-picker"></td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Overlay Opacity', 'soldis-landing' ); ?></th>
				<td><input type="number" step="0.1" max="1" min="0" name="soldis_hero_settings[bg_overlay_opacity]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['bg_overlay_opacity'] ?? '0.8' ); ?>" class="small-text"></td>
			</tr>
		</table>
	</div>

	<div class="soldis-settings-group">
		<h3><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Layout & Spacing', 'soldis-landing' ); ?></h3>
		<table class="form-table">
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Content Width (%)', 'soldis-landing' ); ?></th>
				<td><input type="number" name="soldis_hero_settings[content_width]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['content_width'] ?? '50' ); ?>" class="small-text"></td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Image Width (%)', 'soldis-landing' ); ?></th>
				<td><input type="number" name="soldis_hero_settings[image_width]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['image_width'] ?? '50' ); ?>" class="small-text"></td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Vertical Align', 'soldis-landing' ); ?></th>
				<td>
					<select name="soldis_hero_settings[valign]">
						<option value="start" <?php defined( 'ABSPATH' ) || exit;

selected( $options['valign'] ?? 'center', 'start' ); ?>><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Top', 'soldis-landing' ); ?></option>
						<option value="center" <?php defined( 'ABSPATH' ) || exit;

selected( $options['valign'] ?? 'center', 'center' ); ?>><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Center', 'soldis-landing' ); ?></option>
						<option value="end" <?php defined( 'ABSPATH' ) || exit;

selected( $options['valign'] ?? 'center', 'end' ); ?>><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Bottom', 'soldis-landing' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Padding Top (Desktop / Tablet / Mobile)', 'soldis-landing' ); ?></th>
				<td>
					<input type="number" name="soldis_hero_settings[pad_top_d]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['pad_top_d'] ?? '120' ); ?>" class="small-text">
					<input type="number" name="soldis_hero_settings[pad_top_t]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['pad_top_t'] ?? '80' ); ?>" class="small-text">
					<input type="number" name="soldis_hero_settings[pad_top_m]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['pad_top_m'] ?? '60' ); ?>" class="small-text">
				</td>
			</tr>
			<tr>
				<th scope="row"><?php defined( 'ABSPATH' ) || exit;

esc_html_e( 'Padding Bottom (Desktop / Tablet / Mobile)', 'soldis-landing' ); ?></th>
				<td>
					<input type="number" name="soldis_hero_settings[pad_bot_d]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['pad_bot_d'] ?? '120' ); ?>" class="small-text">
					<input type="number" name="soldis_hero_settings[pad_bot_t]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['pad_bot_t'] ?? '80' ); ?>" class="small-text">
					<input type="number" name="soldis_hero_settings[pad_bot_m]" value="<?php defined( 'ABSPATH' ) || exit;

echo esc_attr( $options['pad_bot_m'] ?? '60' ); ?>" class="small-text">
				</td>
			</tr>
		</table>
	</div>
</div>

<script>
jQuery(document).ready(function($){
	// Trust items clone
	$('#soldis-add-hero-trust-item').on('click', function(e) {
		e.preventDefault();
		var repeater = $('#soldis-hero-trust-repeater');
		var rows = repeater.find('.soldis-repeater-row');
		var index = rows.length ? parseInt(rows.last().data('index')) + 1 : 0;
		
		var template = `
		<div class="soldis-repeater-row" data-index="${index}">
			<div class="soldis-repeater-fields">
				<input type="text" name="soldis_hero_settings[trust_items][${index}][title]" value="" placeholder="Title">
				<input type="text" name="soldis_hero_settings[trust_items][${index}][desc]" value="" placeholder="Subtitle / Description">
				<input type="text" name="soldis_hero_settings[trust_items][${index}][icon]" value="" placeholder="Icon name">
				<label><input type="checkbox" name="soldis_hero_settings[trust_items][${index}][enabled]" value="1" checked> Enable</label>
			</div>
			<div class="soldis-repeater-actions">
				<button type="button" class="button soldis-repeater-remove">Remove</button>
			</div>
		</div>`;
		
		repeater.append(template);
	});

	// Glass cards clone
	$('#soldis-add-hero-card-item').on('click', function(e) {
		e.preventDefault();
		var repeater = $('#soldis-hero-cards-repeater');
		var rows = repeater.find('.soldis-repeater-row');
		var index = rows.length ? parseInt(rows.last().data('index')) + 1 : 0;
		
		var template = `
		<div class="soldis-repeater-row" data-index="${index}">
			<div class="soldis-repeater-fields">
				<input type="text" name="soldis_hero_settings[glass_cards][${index}][title]" value="" placeholder="Title">
				<input type="text" name="soldis_hero_settings[glass_cards][${index}][subtitle]" value="" placeholder="Subtitle">
				<input type="text" name="soldis_hero_settings[glass_cards][${index}][icon]" value="" placeholder="Icon name">
				<label><input type="checkbox" name="soldis_hero_settings[glass_cards][${index}][enabled]" value="1" checked> Enable</label>
			</div>
			<div class="soldis-repeater-actions">
				<button type="button" class="button soldis-repeater-remove">Remove</button>
			</div>
		</div>`;
		
		repeater.append(template);
	});

	// Bottom Stats clone
	$('#soldis-add-hero-stat-item').on('click', function(e) {
		e.preventDefault();
		var repeater = $('#soldis-hero-bottom-stats-repeater');
		var rows = repeater.find('.soldis-repeater-row');
		var index = rows.length ? parseInt(rows.last().data('index')) + 1 : 0;
		
		var template = `
		<div class="soldis-repeater-row" data-index="${index}">
			<div class="soldis-repeater-fields">
				<input type="text" name="soldis_hero_settings[bottom_stats][${index}][title]" value="" placeholder="Title">
				<input type="text" name="soldis_hero_settings[bottom_stats][${index}][subtitle]" value="" placeholder="Subtitle">
				<input type="text" name="soldis_hero_settings[bottom_stats][${index}][icon]" value="" placeholder="Icon name">
				<select name="soldis_hero_settings[bottom_stats][${index}][color]">
					<option value="blue">Blue</option>
					<option value="gold">Gold</option>
				</select>
				<label><input type="checkbox" name="soldis_hero_settings[bottom_stats][${index}][enabled]" value="1" checked> Enable</label>
			</div>
			<div class="soldis-repeater-actions">
				<button type="button" class="button soldis-repeater-remove">Remove</button>
			</div>
		</div>`;
		
		repeater.append(template);
	});
});
</script>

