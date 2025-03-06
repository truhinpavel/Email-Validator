<?php

/**
 * Enqueue scripts and styles for the plugin
 */

function email_validator_enqueue_scripts(): void {
	// Enqueue styles
	wp_enqueue_style( 'email-validator-style', EMAIL_VALIDATOR_PLUGIN_ASSETS_URL . 'css/styles.min.css' );

	// Enqueue scripts
	wp_enqueue_script( 'email-validator-script', EMAIL_VALIDATOR_PLUGIN_ASSETS_URL . 'js/script.min.js', [], false, true );
	wp_localize_script( 'email-validator-script', 'emailValidatorData', [
		'valid_message'  => __( 'Please enter a valid email.', 'email-validator' ),
		'error_message'  => __( 'Request failed.', 'email-validator' ),
		'result_message' => __( 'Result:', 'email-validator' ),
		'ajax_url'       => admin_url( 'admin-ajax.php' ),
		'nonce'          => wp_create_nonce( 'email_validator_nonce' )
	] );
}

add_action( 'wp_enqueue_scripts', 'email_validator_enqueue_scripts' );