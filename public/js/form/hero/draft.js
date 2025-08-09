import { post } from "../../util/fetch.js";

const form = document.querySelector("form");
form.addEventListener("change", sendFormData);

async function sendFormData() {
	// Собираем данные формы
	const formData = new FormData(form);
	const data = Object.fromEntries(formData.entries());

	await post("/hero/api/draft/edit", data, true);
}
