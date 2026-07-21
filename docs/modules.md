# Module Documentation

Modules are self-contained feature sets. 

## Creating a New Module
1. Create a new directory in `app/Modules/`.
2. Define the main Module class.
3. Define the `Admin` class (handling `settings_fields`).
4. Define the `Renderer` class (handling frontend `wp_enqueue_scripts` and DOM output).
5. Register the module inside `app/Plugin.php`.