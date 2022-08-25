# Lando Local Fusion
A WordPress plugin that can speed up local development in Lando/Pantheon by allowing you to bypass pulling media locally. Instead, this allows you to reference media on Pantheon's server as appropriate.

## Installation
1. Install and activate this plugin on your Pantheon project
2. At the moment, you'll need to temporarily remove password protection if pulling from a dev site
3. Set your desired options in 'Settings'->'Lando Local Fusion' (this can be done on your remote Pantheon project without risk)
4. Initialize your Lando pantheon project as appropriate.

When running on your local instance, this plugin will try to generate a folder in '/wp-content/uploads/' called 'lando-local-fusion', with an 'index.php' file inside. If for any reason this folder isn't auto-generated (you'll know if this is the case, if you're experiencing problems), please copy the folder and file to 'wp-content/uploads'. You'll see it located in the plugin directory, inside of 'COPY-TO-UPLOADS'

## Donations

You might find that this saves you time and/or money. A donation of any amount would be very kind and will ensure this is actively maintained. Donations can be made here: <https://www.paypal.com/donate/?hosted_button_id=9YRXRN6EJA2DN> -- Thank you!

## TO DO
- Make this solution platform agnostic (e.g. MAMP, etc. for local / manual option for remote site)
- Add un/pw field options on the backend, for referencing a pw-protected Panth instance
- Ensure this solution still works for month/year folders
- Add option for sites where 'wp-content/uploads' isn't the designated media location
- Store original upload_path (in case it ever existed) before this plugin was active, so that we can always reset it when the plugin is disabled/removed.
