# Roadmap

This document outlines the planned technical features and modules for future releases of the SOLDIS Landing engine.

## Near-Term Goals (v1.1.x)
- **Guarantee Module:** Implement the dynamic guarantee/trust badge section to increase conversion rates.
- **Pricing Module:** Develop an interactive pricing tier component with toggleable billing cycles.
- **CTA Module:** Add a dedicated, highly animated Call-To-Action final section before the footer.

## Mid-Term Goals (v1.2.x)
- **LocalBusiness Schema Validation:** Expand our JSON-LD generator to automatically output strict `LocalBusiness` schema based on the Global Settings data.
- **Native Analytics Tracking:** Integrate lightweight, GDPR-compliant event tracking for button clicks within the hero and CTA sections.
- **Dark Mode Support:** Introduce an optional, automated dark mode toggle based on the user's OS preference (`prefers-color-scheme: dark`).

## Long-Term Vision
- **Multilingual Architecture Ready:** Ensure every user-facing string is mapped to dynamic `.pot` files for seamless WPML or Polylang integration.
- **Headless API Endpoints:** Expose all module data securely via the WordPress REST API to allow for future React/Next.js frontend deployments while retaining the WP backend.