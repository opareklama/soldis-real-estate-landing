# Deployment & Installation Guide

This plugin is deployed via a custom GitHub OTA (Over-The-Air) updater system.

## Initial Manual Installation

The first time you install the plugin on a live site, you must do it manually to establish the updater connection.

1. Navigate to the GitHub repository.
2. Go to the [Releases](https://github.com/opareklama/soldis-real-estate-landing/releases) page.
3. Download the latest `v1.x.x` zip file (e.g., `soldis-real-estate-landing-1.0.0.zip`).
4. In your WordPress Admin Dashboard, navigate to **Plugins > Add New > Upload Plugin**.
5. Upload the zip file and click **Install Now**.
6. Activate the **SOLDIS Landing** plugin.

## Automatic OTA Updates

Once the plugin is installed, it is configured to pull updates directly from GitHub automatically.

1. As a developer, when you push a new feature to the `main` branch, create a new Release on GitHub (e.g., `v1.1.0`).
2. The live WordPress site checks the GitHub API twice daily for new releases.
3. If a release is found with a semantic version higher than the installed version, an **Update Available** notification will appear in the WordPress dashboard.
4. Click **Update Now** to install the update seamlessly.

## Troubleshooting

- **No Update Showing?** Ensure the GitHub Release tag matches Semantic Versioning (e.g., `v1.0.1` or `1.0.1`) and is strictly greater than the installed version.
- **Rate Limits:** The updater caches API responses for 6 hours using WordPress transients to prevent GitHub API rate limiting.
- **Folder Names:** The updater includes a native `upgrader_source_selection` hook that automatically renames the GitHub zip folder (which is usually named `opareklama-soldis-landing-...`) back to `soldis-landing` to ensure seamless updates without deactivating the plugin.