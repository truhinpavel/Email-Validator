<?php

/**
 * Creates a menu item for the Email Validator plugin settings page.
 *
 * @return void
 */
function email_validator_create_menu(): void {
	add_options_page( 'Email Validator Settings', 'Email Validator', 'manage_options', 'email-validator', 'email_validator_settings_page' );
}

/**
 * Displays the Email Validator settings page.
 *
 * This function includes the template for the settings page,
 * allowing users to configure the Email Validator plugin settings.
 *
 * @return void
 */
function email_validator_settings_page(): void {
	include_once email_validator_get_path( 'settings' );
}


add_action( 'admin_menu', 'email_validator_create_menu' );


/**
 * Registers the settings for the Email Validator plugin.
 *
 * This function registers the main settings field group, adds a settings
 * section and a settings field for the API key.
 *
 * @return void
 */
function email_validator_register_settings(): void {
	register_setting(
		'email_validator_options_group',
		'email_validator_api_key',
		[
			'sanitize_callback' => 'email_validator_validate_api_key',
			'default' => '',
		]
	);

	add_settings_section(
		'email_validator_main_section',
		__('Main Settings', 'email-validator'),
		null,
		'email-validator'
	);

	add_settings_field(
		'email_validator_api_key_field',
		__('API Key', 'email-validator'),
		'email_validator_api_key_callback',
		'email-validator',
		'email_validator_main_section'
	);
}

/**
 * Renders the form field for the API key setting with description and validation.
 *
 * @return void
 */
function email_validator_api_key_callback(): void {
	include email_validator_get_path( 'settings_api_key' );
}

/**
 * Validates the API key field to ensure it's not empty.
 *
 * @param string $input The user-provided an API key.
 * @return string The sanitized API key or an error message.
 */
function email_validator_validate_api_key($input): string {
	if (empty(trim($input))) {
		add_settings_error(
			'email_validator_api_key',
			'email_validator_api_key_error',
			__('API Key is required.', 'email-validator'),
			'error'
		);
		return get_option('email_validator_api_key', '');
	}
	return sanitize_text_field($input);
}

add_action('admin_init', 'email_validator_register_settings');



/**
 * Adds a settings link to the Plugins page.
 *
 * @param array $links The links currently displayed on the Plugins page.
 *
 * @return array The modified array of links.
 */
function email_validator_add_settings_link( array $links ): array {
	$settings_link = '<a href="options-general.php?page=email-validator">' . __( 'Settings', 'email-validator' ) . '</a>';
	$links[]       = $settings_link;

	return $links;
}

add_filter( 'plugin_action_links_' . EMAIL_VALIDATOR_PLUGIN_BASENAME, 'email_validator_add_settings_link' );

