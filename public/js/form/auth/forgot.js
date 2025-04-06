import {modal, message} from "../../util/modal.js";
import {load} from "../../util/spiner.js";

document
    .querySelector('#forgot-form')
    .addEventListener('submit', function (event) {
        event.preventDefault();
        load();

        fetch('/auth/api/password/forgot', {
            method: 'post',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                email: this.querySelector('input[name="email"]').value,
            })
        })
            .then((response) => response.json())
            .then((data) => {
                load();
                if (data.status) {
                    message('Вам на почту было отправлено письмо с ссылкой для восстановления пароля');
                } else {
                    modal(data.message);
                }
            });
    });
