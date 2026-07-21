# Security Guidelines

Security is not an afterthought in OPA Reklama engineering.

## Data Validation
- All inputs must be sanitized using `sanitize_text_field`, `esc_url_raw`, or similar functions before database insertion.
- The Settings API `sanitize_callback` must be defined for all registered option groups.

## Output Escaping
- All dynamic data output to the DOM must be escaped using `esc_html()`, `esc_attr()`, or `wp_kses_post()`.
- Use localized string functions (`esc_html__()`) for static text.