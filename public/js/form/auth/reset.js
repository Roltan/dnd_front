import {modal, message} from "../../util/modal.js";
import {load} from "../../util/spiner.js";

document
    .querySelector('#reset-form')
    .addEventListener('submit', function (event) {
        event.preventDefault();

        fetch('/auth/api/password/change', {
            method: 'post',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                email: this.querySelector('input[name="email"]').value,
                password: this.querySelector('input[name="password"]').value,
                password_confirmation: this.querySelector('input[name="password_confirmation"]').value
            })
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status) {
                    window.location = '/login';
                } else {
                    modal(data.message);
                }
            });
    });
