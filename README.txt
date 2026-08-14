=== Onyx Dark Mode Switcher ===
Contributors: hashthemes
Tags: dark mode, night mode, dark mode switcher, light dark toggle
Requires at least: 6.3
Tested up to: 7.0
Stable tag: 1.1.1
Requires PHP: 7.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Switch between light and dark themes for a more comfortable viewing experience, day or night.

== Description ==
A lightweight WordPress plugin that lets your visitors switch between light and dark mode in one click.

Install it, activate it, and you are done. Onyx reads the colors your theme actually renders and works out a matching dark palette on its own, so there is no stylesheet to write and no theme to configure. It works with any WordPress theme.

Dark mode is applied before the page paints, so visitors never see a flash of white before the page turns dark. Their choice is remembered on their next visit.

Everything below is optional. Onyx is useful the moment you activate it, and every setting is there for the day you want to fine tune it.


<h3>Ways to Turn Dark Mode On</h3>
Dark mode does not have to be a button your visitors go looking for. Choose whichever of these suit your audience, or use them together.

<ul>
<li><strong>One click switch</strong> - a floating toggle button on every page</li>
<li><strong>OS Aware Dark Mode</strong> - follows the visitor's own system setting, from their very first visit</li>
<li><strong>Scheduled Dark Mode</strong> - turns on automatically between two times, for example 20:00 to 06:00. Times follow each visitor's own clock, not your server's, and windows that run past midnight are handled properly</li>
<li><strong>Dark Mode on Start</strong> - open the site in dark mode by default</li>
<li><strong>Keyboard shortcut</strong> - visitors press Ctrl+Shift+D</li>
<li><strong>Your own button</strong> - point Onyx at any CSS selector on your site and that element becomes the switch</li>
<li><strong>Switch in the menu</strong> - add the toggle to any WordPress navigation menu, with its own size and margins</li>
</ul>

Whichever route a visitor takes, their choice is remembered on their next visit.

<h3>A Switch Button You Can Style</h3>
The floating button is meant to look like part of your design, not like a plugin.

<ul>
<li>12 light icons and 14 dark icons - suns, moons, sunrise and sunset, cloud and bulb variants</li>
<li>4 shapes - square, round, rounded square and an animating blob</li>
<li>8 screen positions, each with its own offset in pixels</li>
<li>Button size and icon size</li>
<li>Separate background and icon colors for light mode and dark mode</li>
<li>Adjustable drop shadow - horizontal, vertical, blur and color</li>
<li>Optional tooltip with your own wording</li>
</ul>

<h3>13 Color Presets, or Your Own</h3>
Pick a ready made dark palette or build one yourself. The Colors tab previews your choice live, before you save.

<ul>
<li>13 presets, from neutral charcoal through deep blue, violet, forest, amber and true black</li>
<li>A full custom palette - background, secondary background, text, links and link hover, inputs and placeholders, borders, and buttons including their hover state</li>
<li>Live preview that updates as you pick a preset or edit a color</li>
<li><strong>Per selector color overrides</strong> - for the occasional element the automatic pass gets wrong, give it a CSS selector and set its background, text and border colors directly</li>
</ul>

<h3>Images, Video and SVG</h3>
The parts of a page that most often look wrong in dark mode are the ones that carry their own colors. Onyx gives each of them a control.

<ul>
<li><strong>Replace images</strong> - serve a different image file in dark mode, one for one. Ideal for a dark version of your logo</li>
<li><strong>Invert images</strong> - flip specific images so line art and diagrams stay readable</li>
<li><strong>Invert SVGs</strong> - smart inversion for inline SVG icons and graphics</li>
<li><strong>Image grayscale</strong> - soften photography in dark mode</li>
<li><strong>Video grayscale</strong> - the same treatment for embedded video</li>
<li><strong>Darken background images</strong> - dim CSS background images, with the level under your control</li>
</ul>

<h3>Decide Where Dark Mode Applies</h3>
Some pages should never go dark. A checkout, a photo gallery, a landing page built in brand colors.

<ul>
<li><strong>Skip selectors</strong> - list HTML tags, classes or IDs that dark mode should leave alone</li>
<li><strong>Apply button styles to classes</strong> - name the classes your theme uses for buttons so they recolor correctly</li>
<li><strong>Disable per post type</strong> - switch dark mode off for single entries of any post type</li>
<li><strong>Disable per page</strong> - tick one box in the Onyx Dark Mode panel in the editor sidebar and that entry always renders in its normal colors</li>
</ul>

<h3>Custom Code</h3>
For when you want the last word.

<ul>
<li><strong>Custom CSS</strong> - loaded alongside the generated dark mode styles</li>
<li><strong>Before and after toggle JavaScript</strong> - run your own code every time a visitor switches, on both sides of the toggle</li>
</ul>

<h3>Tools</h3>
<ul>
<li><strong>Export</strong> every setting to a JSON file as a backup</li>
<li><strong>Import</strong> that file on another site to set it up in one step</li>
<li><strong>Reset</strong> everything back to the defaults it shipped with</li>
</ul>

<h3>Built to Stay Out of the Way</h3>
<ul>
<li>No flash of light content - the mode is resolved before the browser paints</li>
<li>Admin styles and scripts load only on the plugin's own settings screen, never across your dashboard</li>
<li>No third party libraries, no tracking, no bloat</li>
<li>Translation ready</li>
</ul>


== Installation ==

The easy way to install the plugin is via WordPress.org plugin directory.

<ol>
<li>Go to WordPress Dashboard > Plugins > Add New</li>
<li>Search for "Onyx Dark Mode Switcher" and install the plugin.</li>
<li>Activate Plugin from "Plugins" menu in WordPress.</li>
</ol>

Once activated, the settings live under <strong>Onyx Dark Mode Switcher</strong> in your WordPress admin menu.

== Frequently Asked Questions ==

= Do I have to configure anything? =
No. Dark mode is on as soon as you activate the plugin, and the switch button appears on your site straight away. Everything else is optional.

= Will it work with my theme? =
Yes. Onyx does not depend on your theme's stylesheet. It reads the colors your pages actually render and works out the dark equivalents, so it works with any theme, including page builder layouts.

= One element looks wrong in dark mode. Can I fix just that? =
Yes, two ways. Give its CSS selector a color override on the Colors tab to set exactly the background, text and border colors you want. Or add it to "Skip Dark Mode on Selectors" on the Settings tab to leave it in its original colors.

= Is the visitor's choice remembered? =
Yes. It is stored in their browser and reapplied on their next visit. If their browser blocks storage, the switch still works for that visit, it just is not remembered.

= Does Scheduled Dark Mode use my server's time zone? =
No. It follows each visitor's own clock, so a visitor's evening is their evening wherever they are. A window that ends earlier than it starts, such as 20:00 to 06:00, runs overnight.

= Can I keep dark mode off a specific page? =
Yes. Open the post or page and tick "Disable dark mode on this page" in the Onyx Dark Mode box in the sidebar. To do it for an entire post type, use "Disable on Post Types" on the Settings tab.

= Can I use my own button instead of the floating one? =
Yes. Enter any CSS selector under "Use Custom Switch Button" on the Switch tab and clicking that element toggles dark mode. You can also add the switch to a navigation menu, or turn the floating button off entirely.

= Is there a keyboard shortcut? =
Yes, Ctrl+Shift+D, once you enable it on the Settings tab.

= Will it slow my site down? =
No. There are no third party libraries, and the admin assets load only on the plugin's own settings screen. On the front end the mode is resolved before the browser paints, which is what prevents the usual flash of white on load.

= Can I move my settings to another site? =
Yes. Export them to a JSON file from the Tools tab and import that file on the other site.

== Screenshots ==
1. Settings tab - enable dark mode, OS aware mode, scheduled hours, keyboard shortcut and content exclusions
2. Switch tab - icon, shape, position, size, colors, shadow and tooltip for the toggle button
3. Switch tab - adding the switch to a navigation menu, and using your own element as the switch
4. Image/Video tab - image and video grayscale, background darkening, image replacement and SVG inversion
5. Colors tab - 13 presets, the custom palette and the live preview
6. Colors tab - per selector color overrides
7. Custom Code tab - custom CSS and before/after toggle JavaScript
8. Tools tab - export, import and reset
9. Disabling dark mode on a single page from the editor sidebar
10. Front end - a page in light mode
11. Front end - the same page in dark mode

== Changelog ==
= 1.1.1 - 14 Aug 2026 =
* Color overrides written as a list, such as ".site-header, #footer", now apply only in dark mode. Everything after the first comma was being applied in light mode too
* Custom CSS no longer drops backslashes, so icon font rules like content: "\f101" survive a save
* Button shadow color is now validated as a color, in line with every other color setting
* An unrecognised color value is discarded cleanly instead of writing broken CSS or raising notices on PHP 8.1 and above

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