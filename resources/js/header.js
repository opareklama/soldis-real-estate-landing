/**
 * OPA Reklama - Header Frontend JS
 */
document.addEventListener('DOMContentLoaded', function() {
	'use strict';

	// Sticky Header Logic
	const header = document.getElementById('soldis-header');
	if (header) {
		const checkSticky = function() {
			if (window.scrollY > 10) {
				header.classList.add('is-sticky');
			} else {
				header.classList.remove('is-sticky');
			}
		};
		window.addEventListener('scroll', checkSticky, { passive: true });
		checkSticky();
	}

	// Mobile Drawer Logic
	const toggleBtn = document.querySelector('.soldis-mobile-toggle');
	const closeBtn = document.querySelector('.soldis-drawer-close');
	const drawer = document.getElementById('soldis-mobile-drawer');
	const overlay = document.querySelector('.soldis-drawer-overlay');

	function openDrawer() {
		drawer.classList.add('is-open');
		toggleBtn.setAttribute('aria-expanded', 'true');
		drawer.setAttribute('aria-hidden', 'false');
		document.body.style.overflow = 'hidden'; // Prevent background scrolling
	}

	function closeDrawer() {
		drawer.classList.remove('is-open');
		toggleBtn.setAttribute('aria-expanded', 'false');
		drawer.setAttribute('aria-hidden', 'true');
		document.body.style.overflow = '';
	}

	if (toggleBtn && drawer && closeBtn) {
		toggleBtn.addEventListener('click', openDrawer);
		closeBtn.addEventListener('click', closeDrawer);
		overlay.addEventListener('click', closeDrawer);
	}

	// Smooth Scroll Logic
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function (e) {
			const targetId = this.getAttribute('href');
			if(targetId === '#') return;
			const targetEl = document.querySelector(targetId);
			if (targetEl) {
				e.preventDefault();
				
				// Get header height for offset
				const headerOffset = header ? header.offsetHeight : 0;
				const elementPosition = targetEl.getBoundingClientRect().top;
				const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

				window.scrollTo({
					top: offsetPosition,
					behavior: "smooth"
				});

				if(drawer && drawer.classList.contains('is-open')){
					closeDrawer();
				}
			}
		});
	});

});
