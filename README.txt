=== Onyx Dark Mode Switcher ===
Contributors: hashthemes
Tags: dark mode, night mode, dark mode switcher, light dark toggle
Requires at least: 6.3
Tested up to: 7.0
Stable tag: 1.1.0
Requires PHP: 7.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Switch between light and dark themes for a more comfortable viewing experience, day or night.

== Description ==
A lightweight WordPress plugin that lets your visitors switch between light and dark mode in one click.

No setup pages. No confusing options. No performance overhead.

Just install, activate, and your visitors can switch between light and dark mode instantly with one click.

The plugin automatically handles your site’s colors and works out of the box with any WordPress theme. It’s built for site owners who want a modern feature without complexity.

If you believe features should be simple, fast, and invisible — this plugin is for you.

<h3>OS Aware Dark Mode</h3>
Automatically detects the user’s system preference and applies dark mode when enabled.

<h3>Keyboard Shortcut Support</h3>
Allow users to toggle between light and dark mode using a keyboard shortcut.

<h3>Enable Dark Mode on Page Load</h3>
Start your website in dark mode by default for a comfortable browsing experience.

<h3>Skip Dark Mode on Selected Elements</h3>
Exclude specific CSS selectors from dark mode styling for full control.

<h3>Display Switch Button in Menu</h3>
Easily add the light/dark mode switch button to your WordPress navigation menu.

<h3>Switch Button Customization</h3>
Customize the switch icon, shape, position, size, and color to match your website design.

<h3>Use Custom Switch Button</h3>
Replace the default toggle with your own custom switch button.

<h3>Replace Images in Dark Mode</h3>
Show alternative images when dark mode is enabled for better visibility.

<h3>Invert Images in Dark Mode</h3>
Automatically invert images to maintain contrast in dark mode.

<h3>Invert SVG Graphics</h3>
Apply smart inversion to SVG icons and graphics in dark mode.

<h3>Enable Image Grayscale Mode</h3>
Convert images to grayscale for a cleaner dark mode appearance.

<h3>Darken Background Images</h3>
Reduce brightness of background images for improved readability.

<h3>Multiple Preset Dark Mode Color Schemes</h3>
Choose from multiple ready-made dark mode color presets.ependencies, no bloat</li>


== Installation ==

The easy way to install the plugin is via WordPress.org plugin directory.

<ol>
<li>Go to WordPress Dashboard > Plugins > Add New</li>
<li>Search for "Onyx Dark Mode Switcher" and install the plugin.</li>
<li>Activate Plugin from "Plugins" menu in WordPress.</li>
</ol>


== Changelog ==
= 1.1.0 - 4 Aug 2026 =
* Live color preview on the Colors tab - see a preset before you save it
* Override colors for specific CSS selectors, for the elements the automatic pass gets wrong
* New Tools tab - export settings to a file, import them on another site, or reset everything to defaults
* Button hover colors now actually apply. They were collected in the settings but never output
* Custom palettes with blank fields no longer emit broken CSS
* Fixed unclosed markup in the Colors tab
* Scheduled Dark Mode - turn dark mode on automatically between two times
* Disable dark mode per post type from the settings
* Disable dark mode on an individual post or page from the editor sidebar
* Dark mode is now applied before the page paints, removing the flash of light content on load
* OS Aware Dark Mode now applies on a visitor's first visit, not only when the system setting changes
* Custom CSS and Custom JavaScript are no longer corrupted on save
* Toggle events now fire on every switch instead of only the first
* Fixes for the custom switch selector, button class list and settings sanitization

= 1.0.3 - 30 Jul 2026 =
* CSS fixes
* Compatibility fixes with WordPress v 7.0

= 1.0.2 - 13 Feb 2026 =
* Media upload button not working - Fixed
* Added more color Schemes
* Code refinements

= 1.0.1 - 17 Jan 2026 =
* Option for custom code added

= 1.0.0 =
* Release