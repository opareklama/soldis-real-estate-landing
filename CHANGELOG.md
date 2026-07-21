# Changelog

All notable changes to the **SOLDIS Landing** project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2026-07-21

### Added
- **Production GitHub Updater:** Integrated OTA updates directly from GitHub releases via the `Foundation\Updater` class.
- **Command Center Dashboard:** Beautifully crafted System Health and Readiness dashboard inside WP Admin.
- **Dynamic FAQ Schema:** Fully automated JSON-LD structured data for Answer Engine Optimization (AEO).
- **Core Modules:** Hero, Why SOLDIS, Benefits, Process, Investment, FAQ.
- **Global Settings:** Centralized data store for company info, branding, and assets.
- **Security Hardening:** Enforced `ABSPATH` protection, nonces, and strict capability checks across all 77 PHP files.
- **Documentation Suite:** Deployed full OPA Reklama engineering standards documentation.

### Changed
- Rebuilt the entire admin interface with a premium, bespoke CSS design system (glassmorphism, micro-animations, curated color palettes).
- Optimized asset loading to enqueue CSS/JS strictly conditionally per active module.

### Security
- Verified all endpoints against CSRF and direct access.
- Confirmed strict sanitization and escaping for all database interactions.