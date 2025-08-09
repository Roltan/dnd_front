import { get } from "../../util/fetch.js";

async function deleteDraft() {
	await get("/hero/api/draft/" + this.dataset.id, true, "DELETE");
	this.parentElement.remove();
}

document.querySelectorAll(".delete-draft").forEach((btn) => {
	btn.addEventListener("click", deleteDraft);
});
