/**
 * Soldis Landing - FAQ Section JS
 */

document.addEventListener('DOMContentLoaded', function() {
	
	const toggles = document.querySelectorAll('.js-soldis-faq-toggle');
	
	if (toggles.length === 0) return;

	// Initialize heights for elements that are open by default
	const faqItems = document.querySelectorAll('.soldis-faq-item');
	faqItems.forEach(item => {
		if (item.classList.contains('is-active')) {
			const answerWrap = item.querySelector('.soldis-faq-answer-wrap');
			if (answerWrap) {
				// We need to set height explicitly so it can transition when closed
				answerWrap.style.height = 'auto'; // Temporarily auto to get full height if not hidden
				const scrollHeight = answerWrap.scrollHeight;
				answerWrap.style.height = scrollHeight + 'px';
			}
		}
	});

	toggles.forEach(toggle => {
		toggle.addEventListener('click', function(e) {
			e.preventDefault();
			
			const parentItem = this.closest('.soldis-faq-item');
			const answerWrap = parentItem.querySelector('.soldis-faq-answer-wrap');
			const isCurrentlyActive = parentItem.classList.contains('is-active');

			// If we want only ONE item open at a time, we close all others
			// We can toggle this behavior. Let's make it exclusive (accordion style)
			const allItems = document.querySelectorAll('.soldis-faq-item');
			allItems.forEach(item => {
				if (item !== parentItem && item.classList.contains('is-active')) {
					item.classList.remove('is-active');
					const btn = item.querySelector('.js-soldis-faq-toggle');
					btn.setAttribute('aria-expanded', 'false');
					
					const wrap = item.querySelector('.soldis-faq-answer-wrap');
					if (wrap) {
						// Set explicit height before collapsing
						wrap.style.height = wrap.scrollHeight + 'px';
						
						// Force reflow
						wrap.offsetHeight; 
						
						// Collapse
						wrap.style.height = '0px';
						
						// After transition, hide it for accessibility
						setTimeout(() => {
							if (!item.classList.contains('is-active')) {
								wrap.hidden = true;
							}
						}, 400); // match CSS transition duration
					}
				}
			});

			if (isCurrentlyActive) {
				// Close the clicked one
				parentItem.classList.remove('is-active');
				this.setAttribute('aria-expanded', 'false');
				
				answerWrap.style.height = answerWrap.scrollHeight + 'px';
				answerWrap.offsetHeight; // Force reflow
				answerWrap.style.height = '0px';
				
				setTimeout(() => {
					if (!parentItem.classList.contains('is-active')) {
						answerWrap.hidden = true;
					}
				}, 400);

			} else {
				// Open the clicked one
				parentItem.classList.add('is-active');
				this.setAttribute('aria-expanded', 'true');
				
				answerWrap.hidden = false;
				answerWrap.style.height = '0px'; // Start from 0
				answerWrap.offsetHeight; // Force reflow
				
				const scrollHeight = answerWrap.scrollHeight;
				answerWrap.style.height = scrollHeight + 'px';
				
				// Optional: once transition is complete, set height to auto in case of window resize
				setTimeout(() => {
					if (parentItem.classList.contains('is-active')) {
						answerWrap.style.height = 'auto';
					}
				}, 400);
			}
		});

		// Keyboard accessibility for div role="button"
		toggle.addEventListener('keydown', function(e) {
			if (e.key === 'Enter' || e.key === ' ') {
				e.preventDefault();
				this.click();
			}
		});
	});

	// Handle window resize for active items to recalculate height if set to explicit pixel value
	window.addEventListener('resize', function() {
		const activeItems = document.querySelectorAll('.soldis-faq-item.is-active .soldis-faq-answer-wrap');
		activeItems.forEach(wrap => {
			wrap.style.height = 'auto';
		});
	});

	// General fade up animations
	const animatedElements = document.querySelectorAll('.soldis-faq-section .soldis-animate-fade-up');
	
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
