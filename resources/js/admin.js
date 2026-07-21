/**
 * SOLDIS Landing — Premium Admin Scripts
 *
 * Handles tab switching, repeater add/remove, and other admin UI interactions.
 * Vanilla JS + jQuery (WP-provided).
 *
 * @package    OpaReklama\SoldisLanding
 * @author     OPA Reklama
 * @copyright  Copyright (c) OPA Reklama. All Rights Reserved.
 */

(function($) {
	'use strict';

	$(document).ready(function() {

		// ── Tab System ────────────────────────────────────────────────────
		$('.soldis-tab-nav').each(function() {
			var $nav     = $(this);
			var $content = $nav.closest('.soldis-tabs').find('.soldis-tab-content');

			$nav.on('click', 'li:not(.soldis-disabled-tab)', function() {
				var $tab   = $(this);
				var target = $tab.data('tab');

				// Update nav state
				$nav.find('li').removeClass('active');
				$tab.addClass('active');

				// Show correct pane with a tiny fade-in
				var $pane = $content.find('#tab-' + target);
				$content.find('.soldis-tab-pane').removeClass('active').hide();
				$pane.addClass('active').fadeIn(180);
			});
		});

		// ── Repeater: Header Nav ──────────────────────────────────────────
		var headerNavCount = $('#soldis-nav-repeater .soldis-repeater-row').length;

		$('#soldis-add-nav-item').on('click', function() {
			var idx = headerNavCount++;
			var row = buildNavRow('soldis_header_settings', idx);
			$('#soldis-nav-repeater').append(row);
		});

		// Delegate remove for header nav
		$('#soldis-nav-repeater').on('click', '.soldis-repeater-remove', function() {
			$(this).closest('.soldis-repeater-row').remove();
		});

		// ── Repeater: Footer Nav ──────────────────────────────────────────
		var footerNavCount = $('#soldis-footer-nav-repeater .soldis-repeater-row').length;

		$('#soldis-add-footer-nav-item').on('click', function() {
			var idx = footerNavCount++;
			var row = buildNavRow('soldis_footer_settings', idx);
			$('#soldis-footer-nav-repeater').append(row);
		});

		// Delegate remove for footer nav
		$('#soldis-footer-nav-repeater').on('click', '.soldis-repeater-remove', function() {
			$(this).closest('.soldis-repeater-row').remove();
		});

		// ── Repeater: Generic (FAQ items etc.) ───────────────────────────
		$(document).on('click', '.soldis-repeater-add', function() {
			// Nothing needed here — individual pages handle their own repeaters
		});

		// ── Helper: Build nav repeater row ────────────────────────────────
		function buildNavRow(namespace, idx) {
			return $(
				'<div class="soldis-repeater-row" data-index="' + idx + '">' +
					'<div class="soldis-repeater-fields">' +
						'<input type="text" name="' + namespace + '[nav][' + idx + '][label]" placeholder="Label">' +
						'<input type="text" name="' + namespace + '[nav][' + idx + '][url]" placeholder="URL">' +
						'<select name="' + namespace + '[nav][' + idx + '][target]">' +
							'<option value="_self">Same Window</option>' +
							'<option value="_blank">New Window</option>' +
						'</select>' +
						'<label>' +
							'<input type="checkbox" name="' + namespace + '[nav][' + idx + '][enabled]" value="1" checked> Enable' +
						'</label>' +
					'</div>' +
					'<div class="soldis-repeater-actions">' +
						'<button type="button" class="button soldis-repeater-remove">Remove</button>' +
					'</div>' +
				'</div>'
			);
		}

		// ── Logo link type toggle (Header) ────────────────────────────────
		$('#soldis-logo-link-type').on('change', function() {
			$('#soldis-logo-custom-url-wrap').toggle($(this).val() === 'custom');
		}).trigger('change');

		// ── Logo link type toggle (Footer) ───────────────────────────────
		$('#soldis-footer-logo-link-type').on('change', function() {
			$('#soldis-footer-logo-custom-url-wrap').toggle($(this).val() === 'custom');
		}).trigger('change');

		// ── Responsive Logo Dimensions Toggle ────────────────────────────
		function updateLogoResponsiveRows() {
			var isSame = $('#soldis-logo-same-size').is(':checked');
			$('.soldis-responsive-logo-dim').toggle(!isSame);
		}
		$('#soldis-logo-same-size').on('change', updateLogoResponsiveRows);
		updateLogoResponsiveRows();

		// ── Notice dismiss ────────────────────────────────────────────────
		$(document).on('click', '.soldis-admin-notice [data-dismiss]', function() {
			$(this).closest('.soldis-admin-notice').slideUp(200);
		});

	});

})(jQuery);
