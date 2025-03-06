<?php
/**
 * Handles an AJAX request related to email validation.
 *
 * @return void
 */
function email_validator_handle_ajax(): void {
	check_ajax_referer( 'email_validator_nonce', 'nonce' );

	$email = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
	if ( empty( $email ) ) {
		wp_send_json_error( [ 'message' => 'Invalid email address' ] );
	}

	$api_key = get_option( 'email_validator_api_key' );
	if ( ! $api_key ) {
		wp_send_json_error( [ 'message' => 'API key is not set' ] );
	}

	$response = wp_remote_get( "https://emailvalidation.abstractapi.com/v1/?api_key=$api_key&email=$email" );

	if ( is_wp_error( $response ) ) {
		wp_send_json_error( [ 'message' => 'API request failed' ] );
	}

	$body = wp_remote_retrieve_body( $response );
	$data = json_decode( $body, true );

	if ( ! $data ) {
		wp_send_json_error( [ 'message' => 'Invalid response from API' ] );
	}

	wp_send_json_success( $data );
}

add_action( 'wp_ajax_email_validator', 'email_validator_handle_ajax' );
add_action( 'wp_ajax_nopriv_email_validator', 'email_validator_handle_ajax' );