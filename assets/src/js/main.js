import '../scss/main.scss';

console.log("Email Validator is working");

document.addEventListener("DOMContentLoaded", function () {

    // Necessary variables
    const btn = document.getElementById("email-validator-btn");
    const popup = document.querySelector(".email-validator-popup");
    const layer = document.querySelector(".email-validator-overlay");
    const closePopup = document.querySelector(".close-popup");
    const sendForm = document.getElementById("email-validator-form");
    const emailInput = document.getElementById("email-input");
    const emailResult = document.getElementById("email-result");
    const hiddenClass = 'hidden';
    const ajaxLoadingClass = 'ajax-loading';

    // Open popup
    btn.addEventListener("click", () => {
        layer.classList.remove(hiddenClass);
        popup.classList.remove(hiddenClass);
    });

    // Close popup
    [
        layer,
        closePopup
    ].forEach(el => el.addEventListener("click", () => {
        layer.classList.add(hiddenClass);
        popup.classList.add(hiddenClass);
    }));

    // Handle email validation request
    sendForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form from submitting the traditional way

        const email = emailInput.value.trim();
        if (!email) {
            emailResult.innerHTML = `<p class='is-error'>${emailValidatorData.valid_message}</p>`;
            return;
        }

        sendForm.classList.add(ajaxLoadingClass);
        emailResult.innerHTML = "<p>Validating...</p>";

        const formData = new FormData();
        formData.append("action", "email_validator");
        formData.append("nonce", emailValidatorData.nonce);
        formData.append("email", email);

        fetch(emailValidatorData.ajax_url, {
            method: "POST",
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    emailResult.innerHTML = jsonToTable(data);
                } else {
                    emailResult.innerHTML = `<p class='is-error'>${data.data.message}</p>`;
                }
                console.log(data);
            })
            .catch(error => {
                emailResult.innerHTML = `<p class='is-error'>${emailValidatorData.error_message}</p>`;
                console.error("Error:", error);
            })
            .finally(() => {

                setTimeout(() => {
                    sendForm.classList.remove(ajaxLoadingClass);
                }, 300);

            });
    });

    // Convert JSON to table
    function jsonToTable(json) {
        if (!json.success || !json.data) {
            return '<p>Error: Invalid JSON format</p>';
        }

        let data = json.data;

        if (data.error) {
            return `<p>Error: ${data.error.message} (Code: ${data.error.code})</p>`;
        }

        let table = `
            <p>${emailValidatorData.result_message}</p>
            <table>
        `;
        table += '<tr><th>Key</th><th>Value</th></tr>';

        for (let key in data) {
            if (typeof data[key] === 'object' && data[key] !== null && 'text' in data[key]) {
                table += `<tr><td>${key}</td><td>${data[key].text}</td></tr>`;
            } else {
                table += `<tr><td>${key}</td><td>${data[key]}</td></tr>`;
            }
        }

        table += '</table>';
        return table;
    }

});
