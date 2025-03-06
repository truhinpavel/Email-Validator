# Email Validator Plugin for WordPress

## Description
The **Email Validator Plugin** integrates an email validation feature into WordPress. It adds a "Send Email" button to the active theme, opening a popup where users can input an email address for validation. The plugin communicates with the **AbstractAPI Email Validation API** and displays the results in a structured table within the popup.

## Installation

1. **Download the plugin:**
    - Clone the repository or download the ZIP file from [GitHub](https://github.com/truhinpavel/Email-Validator/tree/main).

2. **Upload to WordPress:**
    - Go to `Plugins > Add New` in the WordPress admin panel.
    - Click `Upload Plugin` and select the ZIP file.
    - Click `Install Now`, then `Activate`.

3. **Configure API Key:**
    - Navigate to `Settings > Email Validator`.
    - Enter your **AbstractAPI Email Validation API Key**.
    - Click `Save Changes`.

## Usage

- After activation, the **Send Email** button will appear in the active theme.
- Click the button to open the popup.
- Enter an email address and click `Send`.
- The plugin will validate the email and display the results in a table.

## Requirements
- WordPress (latest versions recommended)
- PHP 8.0 or later

## Build Commands
If your plugin includes a build step, you can use the following commands:
```
npm install
npm run build
```

## API Documentation
For more details about the email validation API, visit [AbstractAPI Email Validation Docs](https://docs.abstractapi.com/email-validation).

## Author
Developed by [Pavel](https://github.com/truhinpavel).

