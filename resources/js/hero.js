/**
 * Soldis Landing - Hero Section JS
 */

document.addEventListener('DOMContentLoaded', function() {
	
	// Intersection Observer for Animations
	const animatedElements = document.querySelectorAll('.soldis-animate-fade-up, .soldis-animate-fade-in');
	
	if (animatedElements.length > 0) {
		const observerOptions = {
			root: null,
			rootMargin: '0px',
			threshold: 0.1
		};
		
		const observer = new IntersectionObserver(function(entries, observer) {
			entries.forEach(function(entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('soldis-animated');
					observer.unobserve(entry.target);
				}
			});
		}, observerOptions);
		
		animatedElements.forEach(function(el) {
			observer.observe(el);
		});
	}

	// Mobile Auto-Sliding Glass Cards (High Performance Native Scrolling)
	const glassCardsContainer = document.querySelector('.soldis-hero-glass-cards');
	if (glassCardsContainer && window.innerWidth <= 767) {
		const cards = glassCardsContainer.querySelectorAll('.soldis-glass-card');
		if (cards.length > 1) {
			let autoSlideInterval;
			
			const slideNext = () => {
				// Calculate max scroll width
				const maxScrollLeft = glassCardsContainer.scrollWidth - glassCardsContainer.clientWidth;
				
				// If reached the end, loop back to the beginning
				if (glassCardsContainer.scrollLeft >= maxScrollLeft - 10) {
					glassCardsContainer.scrollTo({ left: 0, behavior: 'smooth' });
				} else {
					// Scroll forward by one viewport width
					glassCardsContainer.scrollBy({ left: glassCardsContainer.clientWidth, behavior: 'smooth' });
				}
			};

			const startAutoSlide = () => {
				autoSlideInterval = setInterval(slideNext, 3500); // 3.5s per slide
			};

			// Wait a brief moment before starting to let animations finish
			setTimeout(startAutoSlide, 2000);

			// Pause auto-sliding immediately if user touches the cards
			glassCardsContainer.addEventListener('touchstart', () => {
				clearInterval(autoSlideInterval);
			}, { passive: true });
		}
	}
});
