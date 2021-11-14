<?php

/**
 * Register all actions and filters on theme setup (to be triggered on page load)
 *
 * @link       https://github.com/SPACED-MAN/wp-plugin--lando-local-fusion
 * @since      1.0.0
 *
 * @package    lando_local_fusion
 * @subpackage lando_local_fusion/includes
 */

/**
 * Register all actions and filters on theme setup (to be triggered on page load)
 *
 * @package    lando_local_fusion
 * @subpackage lando_local_fusion/includes
 * @author     Tyler Shingleton <i@spaced-man.com>
 */

class Lando_Local_Fusion_Main {

    /**
     * Run the main fusion logic
     */
    public function run_fusion() {

		if( !empty($_ENV['PANTHEON_ENVIRONMENT']) && (strcmp($_ENV['PANTHEON_ENVIRONMENT'], 'lando') == 0) ) {	// If We're working in a local Lando instance

			$option_llf_behavior = get_option('llf_behavior');	// 'Auto', 'On' or 'Disabled'
			$src = './wp-content/plugins/lando-local-fusion/COPY-TO-UPLOADS/lando-local-fusion';
			$dst = './wp-content/uploads/lando-local-fusion';
			$dstphp = './wp-content/uploads/lando-local-fusion/index.php';
	
			if( !file_exists($dst) || !file_exists($dstphp) ) { // If the folder doesn't exist in uploads, build it
				if( is_dir($src) ) {
					@mkdir( $dst );
					$files = scandir ( $src );
					foreach ( $files as $file ) {
						if ($file != "." && $file != "..") {
							copy ( $src . '/' . $file, $dst . '/' . $file );
						}
					}
				}
			} // else {

				// if( get_option( 'upload_path' ) == '' ) {	// If the fusion "CDN" hasn't been initially configured (only run this ~once so that we're not constantly updating)
					if( (strcmp($option_llf_behavior, 'Auto') == 0) && (get_option( 'upload_path' ) == '') ) { // If 'Auto' behavior, check for any images in the local 'wp-content/uploads' directory. If found, disable the CDN
						$dir = new DirectoryIterator('./wp-content/uploads/');
						$imageFound = false;
						$imagesToLookFor = array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif', 5 => 'svg', 6 => 'webp');
						foreach($dir as $file) {
							if (!$file->isDot() && 
								$file->isFile() && 
								(substr($file->getFilename(), 0, 1) !== '.') &&  // ignore hidden files like '.DS_Store
								array_search($file->getExtension(), $imagesToLookFor) ) { // if this is an image
				
								$imageFound = true;
							}
				
							if($imageFound) break;	// If found, stop this loop
						}
						
						if(!$imageFound) { // If there's no images in the local media library, go ahead and reference the Pantheon environment's files
							update_option( 'upload_path', 'wp-content/uploads/lando-local-fusion/index.php?source=' );
							// update_option( 'upload_url_path', 'https://' . $_ENV['TERMINUS_ENV'] . '-' . $_ENV['PANTHEON_SITE_NAME'] . '.pantheonsite.io' . '/wp-content/uploads' );	// Reference the appropriate Panth environment's media directory
						} else {
							update_option( 'upload_path', '' );
						}
					} else if( (strcmp($option_llf_behavior, 'On') == 0) && (get_option( 'upload_path' ) == '') ) {
						update_option( 'upload_path', 'wp-content/uploads/lando-local-fusion/index.php?source=' );
					} else if( (strcmp($option_llf_behavior, 'Disabled') == 0) && (get_option( 'upload_path' ) !== '') ) {
						update_option( 'upload_path', '' );
					}
				// }

				if( (strcmp($option_llf_behavior, 'Auto') == 0) || (strcmp($option_llf_behavior, 'On') == 0) ) {
					// Move the resulting files/folders from wp-content/uploads/lando-local-fusion/. . . to wp-content/uploads/ as appropriate
					$dir = "./wp-content/uploads/lando-local-fusion/index.php?source="; // path/to/targetFiles
					$dirNew = "./wp-content/uploads"; // path/to/destination/files
					if (is_dir($dir)) {     // Open a known directory, and proceed to read its contents
						if ($dh = opendir($dir)) {
							while (($file = readdir($dh)) !== false) {
								// Exclude unwanted 
								// if ($file=="move.php")continue;
								// if ($file==".") continue;
								// if ($file=="..")continue;
								// if ($file=="cgi-bin")continue;
								// if ($file==".DS_Store") continue; // Don't move mac system files
								// if ($file=="index.php") continue; // Don't move index.php

								rename($dir.'/'.$file,$dirNew.'/'.$file);
								closedir($dh);
							}
						}
					}
				}
			//}

		} else if( get_option( 'upload_path' ) !== '' ) {	// If we're not working locally, always disable this feature
			update_option( 'upload_path', '' );
		}
    }
}
