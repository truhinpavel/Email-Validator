<?php


if ( ! defined( 'ABSPATH' ) && ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Delete options from the database
delete_option( 'email_validator_api_key' );
