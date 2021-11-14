<?php
/**
 * This file is loaded in lieu of image URLS on a local instance, in order to deliver a remote or local image as appropriate
 *
 * @link       https://github.com/SPACED-MAN/wp-plugin--lando-local-fusion
 * @since      1.0.0
 *
 * @package    lando_local_fusion
 * @subpackage lando_local_fusion/includes
 */

$arg_source = isset($_GET['source']) ? filter_var($_GET['source'], FILTER_SANITIZE_URL) : '';

if(!empty($arg_source)) {
	$result_source = '';

	if( !empty($_ENV['PANTHEON_ENVIRONMENT']) && (strcmp($_ENV['PANTHEON_ENVIRONMENT'], 'lando') == 0 ) ) {	// If we're working in a local Lando instance
		if( @getimagesize('../' . $arg_source) ) {	// If the file exists locally, load it up
			$result_source = '..' . $arg_source;
		} else {	// Otherwise, attempt to return the file from remote server
			$result_source = 'https://' . $_ENV['TERMINUS_ENV'] . '-' . $_ENV['PANTHEON_SITE_NAME'] . '.pantheonsite.io' . '/wp-content/uploads' . $arg_source;
		}
	}

	// Set the content-type header as appropriate
	$file_extension = strtolower(substr(strrchr($result_source,"."),1));

	switch( $file_extension ) {
		case "gif": $ctype = "image/gif"; break;
		case "png": $ctype = "image/png"; break;
		case "jpeg":
		case "jpg": $ctype = "image/jpeg"; break;
		case "svg": $ctype = "image/svg+xml"; break;
		default:
	}
	
	header('Content-type: ' . $ctype);

	// Set the content-length header
	// header('Content-Length: ' . filesize($result_source));

	readfile($result_source); // Write the image bytes to the client
}
?>