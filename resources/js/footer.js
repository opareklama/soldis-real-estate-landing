/**
 * SOLDIS Landing — Footer JS
 *
 * Handles the scroll-to-top button visibility and smooth scrolling.
 * Vanilla JavaScript only. No dependencies.
 *
 * @package    OpaReklama\SoldisLanding
 * @author     OPA Reklama
 * @copyright  Copyright (c) OPA Reklama. All Rights Reserved.
 */

document.addEventListener('DOMContentLoaded', function() {
	'use strict';

	// ── Scroll-to-Top Button ───────────────────────────────────────────────
	const scrollBtn = document.getElementById('soldis-scroll-top');

	if (scrollBtn) {
		// Show/hide based on scroll position
		const SCROLL_THRESHOLD = 400;

		const updateScrollBtn = function() {
			if (window.scrollY > SCROLL_THRESHOLD) {
				scrollBtn.classList.add('is-visible');
				scrollBtn.setAttribute('aria-hidden', 'false');
			} else {
				scrollBtn.classList.remove('is-visible');
				scrollBtn.setAttribute('aria-hidden', 'true');
			}
		};

		window.addEventListener('scroll', updateScrollBtn, { passive: true });
		updateScrollBtn(); // Run on load in case page is already scrolled

		// Smooth scroll to top on click
		scrollBtn.addEventListener('click', function() {
			window.scrollTo({
				top: 0,
				behavior: 'smooth'
			});
		});
	}

});
