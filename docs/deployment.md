# Deployment

## Build Process
Currently, assets are compiled locally and committed. Ensure you run your SCSS watcher/compiler before committing UI changes.

## Production Push
1. Ensure `WP_DEBUG` is disabled in the target environment.
2. Pull the latest `main` branch to the production server.
3. Flush WordPress object cache and any page caches (e.g., Redis, Varnish) to ensure conditional asset checks are re-evaluated.