<?php
/**
 * Changing the active theme and adding a button to the footer
 */

/**
 * Add the email validator button to the footer.
 *
 * This function includes the template for the button popup,
 * which allows users to send and validate emails.
 */
function email_validator_add_button(): void {
	include_once email_validator_get_path( 'button-popup' );
}

add_action( 'wp_footer', 'email_validator_add_button' );


/**
 * Add a CSS class to the body element to indicate that the Email Validator plugin is active.
 *
 * @param array $classes The existing CSS classes.
 *
 * @return array The modified CSS classes.
 */
function email_validator_body_class( $classes ): array {
	$classes[] = 'email-validator';

	return $classes;
}

add_filter( 'body_class', 'email_validator_body_class' );