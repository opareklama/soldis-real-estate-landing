# Coding Standards

This project strictly follows the **WordPress Coding Standards (WPCS)**.

## Rules
- **Namespacing:** Use `OpaReklama\SoldisLanding` as the root namespace. PSR-4 autoloading is strictly enforced.
- **Formatting:** Use tabs for indentation, not spaces.
- **Documentation:** All classes, methods, and properties must have comprehensive docblocks.
- **Direct Access:** All PHP files must start with `defined( 'ABSPATH' ) || exit;` placed *after* the `namespace` declaration.