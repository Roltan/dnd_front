import { getCookie } from "../../util/cookie.js";

const form = document.querySelector("form");
form.addEventListener("change", sendFormData);

function sendFormData() {
    // Собираем данные формы
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    fetch("/hero/api/draft/edit", {
        method: "POST",
        headers: {
            Authorization: "Bearer " + getCookie("auth_token"),
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    });
}
