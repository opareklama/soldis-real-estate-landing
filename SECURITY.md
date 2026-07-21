# Security Policy

At **OPA Reklama**, security is a mandatory prerequisite, not an afterthought. This document outlines the security architecture and reporting guidelines for the SOLDIS Landing engine.

## Supported Versions

Security updates are actively provided for the following versions:

| Version | Supported          |
| ------- | ------------------ |
| 1.0.x   | :white_check_mark: |
| < 1.0.0 | :x:                |

## Security Architecture

Our engineering standards enforce the following principles:

1. **Direct Access Protection:** Every PHP file begins with `defined( 'ABSPATH' ) || exit;` to prevent direct URI execution.
2. **Strict Sanitization:** All incoming user data is passed through `sanitize_text_field()`, `sanitize_textarea_field()`, or specialized WordPress sanitizers before being stored or processed.
3. **Output Escaping:** Late escaping is strictly enforced. Every piece of dynamic data output to the DOM uses `esc_html()`, `esc_attr()`, `esc_url()`, or `wp_kses_post()`.
4. **Nonce Verification:** Every form submission and AJAX request requires a valid WordPress cryptographic nonce.
5. **Capability Checks:** The admin settings are restricted to users with the `manage_options` capability.

## Reporting a Vulnerability

If you discover a security vulnerability within this project, please do **NOT** open a public issue. 

Instead, immediately contact our engineering team via our private channel:
👉 **[OPA Reklama Support](https://www.opareklama.lt/susisiekite-su-mumis/)**

Please include:
- A detailed description of the vulnerability.
- Steps to reproduce the issue.
- The version of WordPress and the plugin you are using.

We will acknowledge receipt within 24 hours and issue a patch as our highest priority.