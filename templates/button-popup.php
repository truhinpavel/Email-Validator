<div class="email-validator-wrapper">
    <div class="email-validator-overlay hidden"></div>
    <button id="email-validator-btn" class="email-validator__btn"
            title="<?php esc_attr_e( 'Click to open popup to send and validate emails', 'email-validator' ); ?>">
		<?php esc_html_e( 'Send Email', 'email-validator' ); ?>
    </button>
    <div class="email-validator-popup hidden">
        <div class="popup-content"><span class="close-popup">&times;</span>
            <form id="email-validator-form">
                <label for="email-input"></label>
                <input type="email" id="email-input" required
                       placeholder="<?php esc_attr_e( 'Enter email', 'email-validator' ); ?>">
                <button type="submit">
					<?php esc_html_e( 'Send', 'email-validator' ); ?>
                </button>
                <div id="email-result"></div>
        </div>
    </div>
</div>