# System Architecture

The plugin is structured around a central autoloader and discrete modular components.

## Directory Structure
- `/app` - Contains all OOP PHP logic.
  - `/Foundation` - Core activator and deactivator scripts.
  - `/Admin` - Main dashboard controller.
  - `/Modules` - Independent feature modules (e.g., Homepage, Header, Footer).
- `/resources` - Source assets (CSS, JS, Images).
- `/docs` - Engineering documentation.

## Module Lifecycle
Each module consists of an `Admin` class (for settings), a `Renderer` class (for frontend output), and a main module controller. Modules are instantiated by the main `Plugin` class during the `plugins_loaded` hook.