<div class="wrap">
    <h1>
		<?php esc_html_e( 'Email Validator Settings', 'email-validator' ); ?>
    </h1>
    <form method="post" action="options.php">
		<?php
		settings_fields( 'email_validator_options_group' );
		do_settings_sections( 'email-validator' );
		submit_button();
		?>
    </form>
</div>