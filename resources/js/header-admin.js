/**
 * OPA Reklama - Header Admin JS
 */
(function($) {
	'use strict';

	$(document).ready(function() {
		// Tab Switching Logic
		$('.soldis-tab-nav li').on('click', function() {
			var tabId = $(this).data('tab');
			
			// Update Nav
			$('.soldis-tab-nav li').removeClass('active');
			$(this).addClass('active');

			// Update Panes
			$('.soldis-tab-pane').removeClass('active');
			$('#tab-' + tabId).addClass('active');
		});

		// Logo Type Toggling
		function toggleLogoGroups() {
			var val = $('#soldis-logo-type').val();
			if (val === 'image') {
				$('#soldis-logo-group-image').show();
				$('#soldis-logo-group-text').hide();
			} else if (val === 'text') {
				$('#soldis-logo-group-image').hide();
				$('#soldis-logo-group-text').show();
			} else {
				$('#soldis-logo-group-image').show();
				$('#soldis-logo-group-text').show();
			}
		}
		$('#soldis-logo-type').on('change', toggleLogoGroups);
		toggleLogoGroups();

		// Same Size Toggle
		function toggleResponsiveDims() {
			if ( $('input[name="soldis_header_settings[logo_same_size]"]').is(':checked') ) {
				$('.soldis-responsive-logo-dim').hide();
			} else {
				$('.soldis-responsive-logo-dim').show();
			}
		}
		$('input[name="soldis_header_settings[logo_same_size]"]').on('change', toggleResponsiveDims);
		toggleResponsiveDims();

		// Custom URL Toggle
		function toggleCustomUrl() {
			if ( $('#soldis-logo-link-type').val() === 'custom' ) {
				$('#soldis-logo-custom-url-wrap').show();
			} else {
				$('#soldis-logo-custom-url-wrap').hide();
			}
		}
		$('#soldis-logo-link-type').on('change', toggleCustomUrl);
		toggleCustomUrl();

		// Media Uploader
		var mediaUploader;
		$('.soldis-upload-btn').on('click', function(e) {
			e.preventDefault();
			var button = $(this);
			var targetInput = $(button.data('target'));
			var targetPreview = $(button.data('preview'));

			if (mediaUploader) {
				mediaUploader.open();
				return;
			}

			mediaUploader = wp.media.frames.file_frame = wp.media({
				title: 'Choose Image',
				button: { text: 'Choose Image' },
				multiple: false
			});

			mediaUploader.on('select', function() {
				var attachment = mediaUploader.state().get('selection').first().toJSON();
				targetInput.val(attachment.url);
				targetPreview.attr('src', attachment.url).show();
			});

			mediaUploader.open();
		});

		$('.soldis-remove-btn').on('click', function(e) {
			e.preventDefault();
			var button = $(this);
			$($(button.data('target'))).val('');
			$($(button.data('preview'))).hide().attr('src', '');
		});

		// Repeater Logic
		$('#soldis-add-nav-item').on('click', function(e) {
			e.preventDefault();
			var repeater = $('#soldis-nav-repeater');
			var index = repeater.find('.soldis-repeater-row').length;
			
			var template = `
				<div class="soldis-repeater-row" data-index="${index}">
					<div class="soldis-repeater-fields">
						<input type="text" name="soldis_header_settings[nav][${index}][label]" value="" placeholder="Label">
						<input type="text" name="soldis_header_settings[nav][${index}][url]" value="" placeholder="URL">
						<input type="text" name="soldis_header_settings[nav][${index}][css_class]" value="" placeholder="CSS Class">
						<select name="soldis_header_settings[nav][${index}][target]">
							<option value="_self">Same Window</option>
							<option value="_blank">New Window</option>
						</select>
						<label>
							<input type="checkbox" name="soldis_header_settings[nav][${index}][enabled]" value="1" checked> Enable
						</label>
					</div>
					<div class="soldis-repeater-actions">
						<button type="button" class="button soldis-repeater-remove">Remove</button>
					</div>
				</div>
			`;
			repeater.append(template);
		});

		$(document).on('click', '.soldis-repeater-remove', function(e) {
			e.preventDefault();
			$(this).closest('.soldis-repeater-row').remove();
			
			// Re-index
			$('#soldis-nav-repeater .soldis-repeater-row').each(function(i) {
				$(this).attr('data-index', i);
				$(this).find('input, select').each(function() {
					var name = $(this).attr('name');
					if (name) {
						var newName = name.replace(/\[nav\]\[\d+\]/, '[nav][' + i + ']');
						$(this).attr('name', newName);
					}
				});
			});
		});
	});

})(jQuery);
