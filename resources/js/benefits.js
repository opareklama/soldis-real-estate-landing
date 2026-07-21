/**
 * Soldis Landing - Benefits Section JS
 */

document.addEventListener('DOMContentLoaded', function() {
	
	const benefitItems = document.querySelectorAll('.js-soldis-scroll-detect');

	if (benefitItems.length === 0) return;

	// Desktop active state detection
	if (window.innerWidth > 1024) {
		const observerOptions = {
			root: null,
			rootMargin: '-30% 0px -40% 0px', // Trigger when item is in the middle of the screen
			threshold: 0.1
		};

		const observer = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					// Remove active class from all
					benefitItems.forEach(item => item.classList.remove('is-active'));
					// Add active class to current
					entry.target.classList.add('is-active');
				}
			});
		}, observerOptions);

		benefitItems.forEach(item => {
			observer.observe(item);
		});
	}

	// Fade up animation logic
	const animatedElements = document.querySelectorAll('.soldis-animate-fade-up');
	
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
