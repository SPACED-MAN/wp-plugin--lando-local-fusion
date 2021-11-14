=== Lando Local Fusion ===
Contributors: spacedman
Donate link: __
Tags: local development, lando, pantheon
Requires at least: 3.0.1
Tested up to: 5.7
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Speed up local dev in Lando/Pantheon by referencing media from your Pantheon project vs having to pull directly.

== Description ==

A WordPress plugin that can speed up local development in Lando/Pantheon by allowing you to bypass pulling media locally. Instead, this allows you to reference media on Pantheon's server as appropriate.

== Installation ==

1. Install and activate this plugin on your Pantheon project
2. At the moment, you'll need to temporarily remove password protection if pulling from a dev site
3. Set your desired options in 'Settings'->'Lando Local Fusion' (this can be done on your remote Pantheon project without risk)
4. Initialize your Lando pantheon project as appropriate.

When running on your local instance, this plugin will try to generate a folder in '/wp-content/uploads/' called 'lando-local-fusion', with an 'index.php' file inside. If for any reason this folder isn't auto-generated (you'll know if this is the case, if you're experiencing problems), please copy the folder and file to 'wp-content/uploads'. You'll see it located in the plugin directory, inside of 'COPY-TO-UPLOADS'

== Screenshots ==

[INSERT]

== Changelog ==

= 1.0 =
* Initial commit

== Upgrade Notice ==
