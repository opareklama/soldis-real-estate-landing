# Contributing to SOLDIS Landing

Thank you for your interest in contributing! This project is proprietary software developed by **OPA Reklama**. While the repository is public for deployment purposes, it is not an open-source project.

## For OPA Reklama Engineers

If you are an internal engineer working on this repository, please follow these guidelines to maintain our strict architectural standards.

### Branch Strategy

1. **`main`**: The production branch. This branch is always stable. Pushing to this branch and drafting a release triggers the OTA Updater for live sites.
2. **`develop`**: The primary branch for ongoing feature integration.
3. **`feature/*`**: Create feature branches off `develop` (e.g., `feature/pricing-module`).
4. **`hotfix/*`**: Critical bug fixes should be branched directly off `main` and merged into both `main` and `develop`.

### Pull Request Process

1. Ensure all code strictly adheres to the WordPress Coding Standards (WPCS).
2. Ensure every new PHP file includes `defined( 'ABSPATH' ) || exit;`.
3. Do not introduce any third-party frameworks (e.g., Tailwind, jQuery UI) without approval from the lead architect. We rely on vanilla CSS and JS to guarantee maximum performance.
4. Ensure all new settings fields are properly sanitized and escaped.
5. Create a descriptive PR outlining what changed and why. Request a code review from a senior engineer.

### Code Style

- Use tabs for indentation (as per WPCS).
- Document all classes, methods, and complex logic using PHPDoc.
- Namespace all new classes correctly under `OpaReklama\SoldisLanding`.
- Use descriptive, human-readable variable names.

## For External Contributors

External Pull Requests are generally not accepted as this is a bespoke client application. If you have found a bug, please contact OPA Reklama directly rather than opening a PR.