import { modal } from "./modal.js";
import { getCookie } from "./cookie.js";

async function get(url, auth = false, method = "GET") {
	var headers = { "Content-Type": "application/json" };
	if (auth) headers["Authorization"] = "Bearer " + getCookie("auth_token");

	return await fetch(url, {
		method: method,
		headers: headers,
	})
		.then((response) => response.json())
		.then((data) => {
			if (data.status) {
				return data;
			} else {
				modal("Произошла ошибка в запросе");
			}
		});
}

async function post(url, data, auth = false, method = "POST") {
	var headers = { "Content-Type": "application/json" };
	if (auth) headers["Authorization"] = "Bearer " + getCookie("auth_token");

	return await fetch(url, {
		method: method,
		headers: headers,
		body: JSON.stringify(data),
	})
		.then((response) => response.json())
		.then((data) => {
			if (data.status) {
				return data;
			} else {
				modal("Произошла ошибка в запросе");
			}
		});
}

export { get, post };
