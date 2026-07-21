# SOLDIS Landing — Enterprise Real Estate Landing Page Engine

[![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)](https://github.com/opareklama/soldis-real-estate-landing/releases)
[![WordPress](https://img.shields.io/badge/WordPress-6.0+-23282d.svg)](https://wordpress.org/)
[![PHP](https://img.shields.io/badge/PHP-8.0+-777bb4.svg)](https://php.net/)
[![License](https://img.shields.io/badge/License-Proprietary-red.svg)]()
[![Engineered By](https://img.shields.io/badge/Engineered%20By-OPA%20Reklama-c79a3b.svg)](https://opareklama.lt/)

**SOLDIS Landing** is a premium, high-performance, and modular WordPress plugin engineered exclusively for the SOLDIS Real Estate project by **OPA Reklama**. 

This repository contains the proprietary source code for the landing page engine. It is built to strict enterprise standards, focusing heavily on security, performance, accessibility, and dynamic modularity.

---

## 🎯 Architecture & Philosophy

This plugin avoids the bloat of traditional page builders (like Elementor or WPBakery) by utilizing a strict Object-Oriented PHP architecture. Every section of the landing page is an isolated **Module** that manages its own assets, settings, and rendering logic.

- **Zero-Bloat Frontend:** Only enqueues CSS and JS for modules that are actively enabled.
- **Strict Security:** Enforces `ABSPATH` checks, nonces, and rigorous data sanitization across all endpoints.
- **AEO & SEO Ready:** Built with semantic HTML, automatic FAQ schema generation, and full integration compatibility with major SEO plugins.
- **Command Center Dashboard:** A beautifully designed, read-only system dashboard for monitoring plugin health, SEO readiness, and GitHub updater status.

---

## 🚀 Features

- **Modular Sections:** Hero, Benefits, Process, Investment, Why SOLDIS, FAQ, and dynamic Headers/Footers.
- **Native Automatic Updates:** Built-in OTA (Over-The-Air) updating directly from GitHub Releases.
- **Modern UI/UX:** Advanced micro-animations, scroll-triggered reveals, and a polished admin experience.
- **Full Accessibility (a11y):** ARIA attributes, keyboard navigation support, and semantic markup.

---

## 📦 Installation & Deployment

Since this is a proprietary plugin managed via GitHub, installation is handled through our custom deployment workflow.

1. Download the latest `v1.x.x` zip file from the [Releases](https://github.com/opareklama/soldis-real-estate-landing/releases) page.
2. Navigate to **Plugins > Add New > Upload Plugin** in your WordPress dashboard.
3. Upload the `.zip` file and activate the plugin.
4. From now on, the plugin will automatically check for new GitHub releases and allow you to update directly via the WordPress dashboard!

For detailed deployment instructions, see [docs/installation.md](docs/installation.md).

---

## 📚 Documentation

Detailed documentation for developers and administrators:

- [ARCHITECTURE.md](ARCHITECTURE.md) - Deep dive into the OOP structure and autoloader.
- [ENGINEERING.md](ENGINEERING.md) - OPA Reklama engineering standards and performance guidelines.
- [SECURITY.md](SECURITY.md) - Security protocols and vulnerability reporting.
- [CONTRIBUTING.md](CONTRIBUTING.md) - Branch strategy and development workflow.
- [ROADMAP.md](ROADMAP.md) - Future features and technical goals.
- [docs/](docs/) - Technical guides on modules, coding standards, and security practices.

---

## 🛡️ Support & Licensing

This software is proprietary and belongs exclusively to **OPA Reklama**. 
Copying, redistributing, modifying, or using this code outside of the SOLDIS project is strictly prohibited.

For technical support, feature requests, or inquiries, please contact the engineering team:
👉 **[OPA Reklama Support](https://www.opareklama.lt/susisiekite-su-mumis/)**

---
*Engineered with precision in Lithuania by [OPA Reklama](https://opareklama.lt/).*