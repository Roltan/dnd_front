import {modal} from "../../util/modal.js";

document
    .querySelector('#login-form')
    .addEventListener('submit', function (event) {
        event.preventDefault();

        fetch('/auth/api/login', {
            method: 'post',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                email: this.querySelector('input[name="email"]').value,
                password: this.querySelector('input[name="password"]').value
            })
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status) {
                    // document.cookie = `auth_token=${data.token}; max-age=${Date.now() + 7 * 24 * 60 * 60}; path=/; SameSite=Lax`;
                    // window.location = '/';
                } else {
                    modal(data.message);
                }
            });
    });
