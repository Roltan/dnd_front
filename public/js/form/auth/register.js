import {modal} from "../../util/modal.js";

document
    .querySelector('#register-form')
    .addEventListener('submit', function (event) {
        event.preventDefault();

        fetch('/auth/api/register', {
            method: 'post',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                name: this.querySelector('input[name="name"]').value,
                email: this.querySelector('input[name="email"]').value,
                password: this.querySelector('input[name="password"]').value,
                password_confirmation: this.querySelector('input[name="password_confirmation"]').value
            })
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status) {
                    // document.cookie = `auth_token=${data.token}; 604800000; path=/; Secure; SameSite=Lax`;
                    window.location = '/';
                } else {
                    modal(data.message);
                }
            });
    });
