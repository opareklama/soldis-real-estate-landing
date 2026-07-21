/**
 * Soldis Landing - Process Section JS
 */

document.addEventListener('DOMContentLoaded', function() {
	
	const trackFill = document.getElementById('soldis-process-track-fill');
	const trackContainer = document.querySelector('.soldis-process-track');
	const processSection = document.querySelector('.soldis-process-pipeline-wrap');
	const steps = document.querySelectorAll('.js-soldis-process-step');

	if (!trackFill || !trackContainer || !processSection || steps.length === 0) return;

	// Calculate and set the progress line
	function updateScrollProgress() {
		const rect = processSection.getBoundingClientRect();
		const windowHeight = window.innerHeight;
		
		// The track should start filling when the top of the section enters the middle of the screen
		// and finish filling when the bottom of the section passes the middle of the screen
		const trackStart = rect.top - (windowHeight / 2);
		const trackEnd = rect.bottom - (windowHeight / 2);
		const totalDistance = trackEnd - trackStart;
		
		let progress = 0;

		if (trackStart < 0) {
			progress = (Math.abs(trackStart) / totalDistance) * 100;
		}

		// Cap progress between 0 and 100
		progress = Math.max(0, Math.min(progress, 100));
		
		trackFill.style.height = progress + '%';
	}

	// Throttle scroll event slightly for performance
	let isScrolling = false;
	window.addEventListener('scroll', function() {
		if (!isScrolling) {
			window.requestAnimationFrame(function() {
				updateScrollProgress();
				isScrolling = false;
			});
			isScrolling = true;
		}
	}, { passive: true });

	// Initial check
	updateScrollProgress();

	// Step Activation using IntersectionObserver
	const observerOptions = {
		root: null,
		rootMargin: '-20% 0px -40% 0px', // Trigger slightly below the middle of the screen
		threshold: 0
	};

	const observer = new IntersectionObserver((entries) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				entry.target.classList.add('is-active');
			}
		});
	}, observerOptions);

	steps.forEach(step => {
		observer.observe(step);
	});

	// General fade up animations
	const animatedElements = document.querySelectorAll('.soldis-process-section .soldis-animate-fade-up');
	
	if (animatedElements.length > 0) {
		const animationObserver = new IntersectionObserver((entries, obs) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					entry.target.classList.add('soldis-animated');
					obs.unobserve(entry.target);
				}
			});
		}, {
			threshold: 0.1,
			rootMargin: '0px 0px -50px 0px'
		});

		animatedElements.forEach(el => {
			animationObserver.observe(el);
		});
	}

});
