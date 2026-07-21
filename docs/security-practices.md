# Security Practices

This document provides technical examples of how to handle data securely within the SOLDIS Landing engine.

## 1. File Protection

Every PHP file must start with this snippet to prevent direct execution if a server is misconfigured.

```php
<?php
defined( 'ABSPATH' ) || exit;
```

## 2. Admin Privileges

When creating an admin page using `add_menu_page` or `add_submenu_page`, the required capability must always be `manage_options` to restrict access strictly to Administrators.

```php
add_submenu_page(
    'soldis-landing',
    'Hero Settings',
    'Hero',
    'manage_options', // Critical: Do not use 'edit_posts'
    'soldis-landing-hero',
    array( $this, 'render_page' )
);
```

## 3. Data Sanitization (Input)

Never trust data coming from `$_POST`, `$_GET`, or even the WordPress settings API implicitly.

- Use `sanitize_text_field()` for standard text inputs.
- Use `sanitize_email()` for email inputs.
- Use `sanitize_textarea_field()` for `<textarea>` tags.
- Use `wp_kses_post()` for fields that require allowed HTML (like WYSIWYG editors).

## 4. Late Escaping (Output)

Data must be escaped at the exact moment it is output to the browser (Late Escaping).

```php
// Bad: Unescaped output
echo '<h1>' . $options['hero_title'] . '</h1>';

// Good: Escaped output
echo '<h1>' . esc_html( $options['hero_title'] ) . '</h1>';
```

Use the correct escaping function for the context:
- `esc_html()`: For text inside HTML tags.
- `esc_attr()`: For data inside HTML attributes (e.g., `<input value="...">`).
- `esc_url()`: For URLs (`href`, `src`).
- `wp_kses_post()`: For outputting safe HTML strings.

## 5. Nonces

All custom `<form>` submissions and AJAX requests must verify a cryptographic nonce.

```php
// In the form view
wp_nonce_field( 'soldis_action', 'soldis_nonce' );

// In the processing logic
if ( ! isset( $_POST['soldis_nonce'] ) || ! wp_verify_nonce( $_POST['soldis_nonce'], 'soldis_action' ) ) {
    wp_die( 'Security check failed.' );
}
```
