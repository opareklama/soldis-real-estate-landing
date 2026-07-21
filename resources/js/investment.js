/**
 * Soldis Landing - Investment Section JS (Marketing Pillars)
 */

document.addEventListener('DOMContentLoaded', function() {
	
	const pillars = document.querySelectorAll('.js-soldis-inv-pillar');
	if (pillars.length === 0) return;

	let isMobile = window.innerWidth <= 850;

	// Handle window resize
	window.addEventListener('resize', function() {
		isMobile = window.innerWidth <= 850;
	});

	pillars.forEach(pillar => {
		
		// Desktop: Hover Interaction
		pillar.addEventListener('mouseenter', function() {
			if (!isMobile) {
				// Remove active from all
				pillars.forEach(p => {
					p.classList.remove('is-active');
					p.setAttribute('aria-expanded', 'false');
				});
				// Add active to current
				this.classList.add('is-active');
				this.setAttribute('aria-expanded', 'true');
			}
		});

		// Mobile: Tap / Click Interaction
		pillar.addEventListener('click', function(e) {
			if (isMobile) {
				// If clicking an already active pillar on mobile, maybe close it? 
				// Usually accordion allows closing, but let's just make it toggle.
				const wasActive = this.classList.contains('is-active');
				
				// Close all
				pillars.forEach(p => {
					p.classList.remove('is-active');
					p.setAttribute('aria-expanded', 'false');
				});

				// Toggle current
				if (!wasActive) {
					this.classList.add('is-active');
					this.setAttribute('aria-expanded', 'true');
				}
			}
		});

		// Accessibility: Keyboard Support
		pillar.addEventListener('keydown', function(e) {
			if (e.key === 'Enter' || e.key === ' ') {
				e.preventDefault();
				const wasActive = this.classList.contains('is-active');
				
				pillars.forEach(p => {
					p.classList.remove('is-active');
					p.setAttribute('aria-expanded', 'false');
				});

				if (!wasActive || !isMobile) { // On desktop, hitting enter always opens it. On mobile it toggles.
					this.classList.add('is-active');
					this.setAttribute('aria-expanded', 'true');
				}
			}
		});
	});

	// General fade up animations
	const animatedElements = document.querySelectorAll('.soldis-investment-section .soldis-animate-fade-up');
	
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
