import { modal } from "./modal.js";

async function get(url) {
    return await fetch(url)
        .then((response) => response.json())
        .then((data) => {
            if (data.status) {
                return data;
            } else {
                modal("Произошла ошибка в запросе");
            }
        });
}

export { get };
