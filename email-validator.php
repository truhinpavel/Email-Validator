<?php
/**
 * Plugin Name: Email Validator
 * Description: Adds a "Send Email" button to the site and validate emails via Abstract API.
 * Version: 1.0.0
 * Author: Pavlo Trukhin
 * Domain Text Domain: email-validator
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define a plugin path
define( 'EMAIL_VALIDATOR_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'EMAIL_VALIDATOR_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'EMAIL_VALIDATOR_INCLUDES_DIR', EMAIL_VALIDATOR_PLUGIN_DIR . 'inc/' );
define( 'EMAIL_VALIDATOR_TEMPLATES_DIR', EMAIL_VALIDATOR_PLUGIN_DIR . 'templates/' );

// Define a plugin url
define( 'EMAIL_VALIDATOR_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'EMAIL_VALIDATOR_PLUGIN_ASSETS_URL', EMAIL_VALIDATOR_PLUGIN_URL . 'assets/' );


// Include the necessary files
$filesToInclude = [
	'helpers.php',
	'resources.php',
	'admin.php',
	'ajax-handler.php',
	'theme.php'
];

foreach ( $filesToInclude as $file ) {
	require_once EMAIL_VALIDATOR_INCLUDES_DIR . '/' . $file;
}


