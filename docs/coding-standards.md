# Coding Standards

To maintain maximum technical authority and readability, OPA Reklama enforces the following coding standards for this repository.

## PHP Standards

We strictly adhere to the [WordPress PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).

### 1. Indentation
- Use **tabs** (not spaces) for indentation.

### 2. Naming Conventions
- Variables, functions, and file names (except classes) must use `snake_case`.
- Classes must use `PascalCase`.
- File names containing classes must match the class name exactly (e.g., `Hero.php`).
- Namespaces must be `PascalCase` and begin with `OpaReklama\SoldisLanding`.

### 3. Spacing
- Add spaces around array items, function arguments, and logical operators.
- Example:
  ```php
  // Bad
  $foo=array(1,2,3);
  if($a===true){...}

  // Good
  $foo = array( 1, 2, 3 );
  if ( $a === true ) { ... }
  ```

### 4. Arrays
- Always use the long array syntax `array()` rather than the short syntax `[]`, as per legacy WPCS (unless the client dictates PHP 7.4+ minimum).

## CSS Standards

- Vanilla CSS only. No preprocessors (SASS/LESS) unless explicitly approved.
- Use CSS Variables (`:root`) for all theme colors and typography to allow dynamic updating.
- Scope all CSS to prevent bleeding into the global WordPress admin or frontend. Prefix classes with `.soldis-` (e.g., `.soldis-hero-title`).

## JS Standards

- Vanilla JavaScript (ES6+).
- **No jQuery** on the frontend. The `$` symbol is only allowed in the WP Admin if integrating with native WordPress media uploaders or settings screens.
- Use `DOMContentLoaded` instead of jQuery `$(document).ready`.