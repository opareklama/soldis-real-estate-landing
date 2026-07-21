# Module Architecture Guide

SOLDIS Landing operates on a fully decoupled Module Architecture. This ensures that features can be enabled, disabled, and modified independently without affecting the rest of the application.

## Anatomy of a Module

Every module lives in the `app/Modules/` directory and typically follows this structure:

```text
ModuleName/
├── ModuleName.php       # The controller that registers the module and hooks.
├── Admin.php            # Handles the WordPress settings API (register_setting, add_settings_section).
├── Renderer.php         # Handles the frontend output (add_action('wp_head'), add_action('wp_footer')).
├── views/
│   ├── admin.php        # The HTML view for the WordPress settings page.
│   └── frontend.php     # The HTML view rendered on the frontend.
```

## Adding a New Module

If you need to add a new section to the landing page (e.g., `Pricing`), follow these steps:

1. **Create the Directory:** Create `app/Modules/Homepage/Sections/Pricing/`.
2. **Create the Controller:** Create `Pricing.php` and extend the base structure. Ensure it is namespaced `OpaReklama\SoldisLanding\Modules\Homepage\Sections\Pricing`.
3. **Build the Admin Settings:** Use the WordPress Settings API in `Admin.php` to define the editable fields (e.g., `enable_pricing`, `pricing_tiers`).
4. **Build the Renderer:** Check if the module is enabled in `Renderer.php` (`$options['enable_pricing']`). If true, enqueue the module's specific CSS/JS and include the `views/frontend.php` file.
5. **Register the Module:** Inject the new module into the parent controller (e.g., `app/Modules/Homepage/Homepage.php`).

## Enqueueing Assets

To keep performance metrics perfect, **never** enqueue CSS or JS globally.

Inside your `Renderer.php`:
```php
public function enqueue_assets() {
    $options = get_option( 'soldis_pricing_settings', array() );
    if ( empty( $options['enable_pricing'] ) ) {
        return; // Do not load assets if the module is inactive!
    }

    wp_enqueue_style(
        'soldis-pricing',
        SOLDIS_LANDING_URL . 'resources/css/pricing.css',
        array(),
        SOLDIS_LANDING_VERSION
    );
}
```