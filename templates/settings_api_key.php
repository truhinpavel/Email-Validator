<?php
$api_key = get_option( 'email_validator_api_key', '' );
?>
<label>
    <input type="text" name="email_validator_api_key" class="regular-text" value="<?php echo esc_attr( $api_key ); ?>" required/>
</label>
<p class="description">
	<?php esc_html_e( 'Enter your AbstractAPI Email Validation API key. You can get it from ', 'email-validator' ) ?>
    <a href="https://www.abstractapi.com/api/email-verification-validation-api" target="_blank">
		<?php esc_html_e( 'AbstractAPI', 'email-validator' ) ?>
    </a>
</p>