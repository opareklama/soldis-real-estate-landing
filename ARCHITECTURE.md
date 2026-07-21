# Architecture

The SOLDIS Landing plugin uses a strictly Object-Oriented, modular architecture to ensure scalability and performance.

## Core Structure

```text
soldis-landing/
├── app/                        # Core application logic
│   ├── Admin/                  # Admin UI, Command Center, and generic settings logic
│   ├── Foundation/             # Core systems (Activator, Deactivator, GitHub Updater)
│   ├── Modules/                # Isolated feature modules (Hero, FAQ, Process, etc.)
│   │   ├── GlobalSettings/     # Agency-wide settings (Logos, Contact info, Colors)
│   │   ├── Header/             # Header component
│   │   ├── Footer/             # Footer component
│   │   └── Homepage/           # The central Homepage controller and its Sections
│   ├── Autoloader.php          # PSR-4 style autoloader
│   └── Plugin.php              # The main plugin bootstrap class
├── resources/                  # Public assets (CSS, JS, Images)
├── docs/                       # Project documentation
├── soldis-landing.php          # Plugin header and entry point
└── uninstall.php               # Cleanup routines
```

## The Autoloader

We use a custom, lightweight PSR-4 style autoloader (`app/Autoloader.php`) to dynamically load classes. This avoids the overhead of Composer for a single plugin while maintaining strict namespace structures. All classes must belong to the `OpaReklama\SoldisLanding` namespace.

## Module Isolation

Every feature is a self-contained module. For example, the `FAQ` section inside the `Homepage` module contains:
- `Admin.php`: Registers the WordPress settings and fields specifically for the FAQ.
- `Renderer.php`: Handles the frontend output and conditional logic (only loads if FAQ is enabled).
- `views/`: Contains the PHP/HTML templates for both the admin panel and the frontend display.

This architecture ensures that if a module is disabled, zero code from that module is executed on the frontend.

## The Foundation

The `Foundation/` directory contains system-level classes:
- **`Activator.php`**: Fires on plugin activation to set up default options or database tables.
- **`Deactivator.php`**: Fires on deactivation (clears rewrite rules, etc.).
- **`Updater.php`**: The bespoke GitHub Release OTA update mechanism.