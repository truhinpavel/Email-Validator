<?php

/**
 * Return the path to a template file.
 *
 * @param string $fileName The name of the file without the `.php` extension.
 *
 * @return string The path to the file or an empty string if the file does not exist.
 */
function email_validator_get_path( string $fileName ): string {
	if ( ! $fileName ) {
		return '';
	}

	$pathToFile = EMAIL_VALIDATOR_TEMPLATES_DIR . "$fileName.php";

	if ( ! file_exists( $pathToFile ) ) {
		return '';
	}

	return $pathToFile;
}