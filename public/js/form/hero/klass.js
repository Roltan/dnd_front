import { get } from "../../util/fetch.js";
import { displaySub } from "./helper.js";

const klassInput = document.querySelector("#klass");
const lvlInput = document.querySelector("#lvl");
const subInput = document.querySelector("#subKlass");

klassInput.addEventListener("change", displaySubKlass);
lvlInput.addEventListener("change", displaySubKlass);

async function displaySubKlass() {
    const data =
        klassInput.value &&
        (await get("/library/api/klass/sub/list/" + klassInput.value));

    data && lvlInput.value >= data.lvlSubKlass
        ? displaySub(data.subKlasses, klassInput, subInput)
        : displaySub(false, klassInput, subInput);
}
