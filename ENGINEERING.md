# OPA Reklama Engineering Standards

This document defines the strict engineering policies enforced across the SOLDIS Landing repository. Every commit to `main` must adhere to these standards.

## 1. WordPress Coding Standards (WPCS)

All PHP code must follow the official WordPress Coding Standards.
- Use tabs for indentation.
- Enforce strict `snake_case` for variables and functions.
- Class names must use `PascalCase`.
- Provide meaningful PHPDoc blocks for every class and complex function.

## 2. Performance First

The landing page must load instantly.
- **Zero Generic Assets:** CSS and JS files are strictly component-scoped. A module's assets are only enqueued if the module is active on the page.
- **Vanilla Over Frameworks:** We do not use TailwindCSS, Bootstrap, jQuery UI, or React on the frontend. Vanilla CSS variables and native JavaScript ensure maximum parsing speed and minimal payload size.
- **Micro-Animations:** Animations are handled via CSS transitions or native `IntersectionObserver`. No heavy animation libraries (like GSAP) unless explicitly required for a complex interaction.

## 3. Security Hardening

- **ABSPATH Protection:** Every executable PHP file must verify `ABSPATH`.
- **Validation:** Never trust user input. Validate data types before processing.
- **Sanitization:** Use `sanitize_text_field`, `wp_kses_post`, etc., before storing data.
- **Escaping:** Late escaping is mandatory. Use `esc_html`, `esc_attr`, and `esc_url` directly in the view files.

## 4. Accessibility (a11y) & SEO (AEO/GEO)

- Semantic HTML5 tags (`<header>`, `<main>`, `<article>`, `<section>`, `<footer>`) must be used.
- All interactive elements must be keyboard navigable.
- Appropriate ARIA attributes (`aria-expanded`, `aria-controls`) must be implemented in modules like FAQ.
- SEO logic (like JSON-LD schema generation) is deeply integrated into the modules rather than relying entirely on third-party plugins.

## 5. The Command Center Philosophy

Admin interfaces should be beautiful, fast, and functional.
- The `Command Center` Dashboard provides a read-only, high-level overview of technical health, SEO readiness, and update status.
- Settings are decentralized into their respective modules, preventing a cluttered, monolithic settings page.