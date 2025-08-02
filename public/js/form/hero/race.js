import { get } from "../../util/fetch.js";
import { displaySub } from "./helper.js";

const raseList = (await get("/library/api/race/list")).races;
const raceInput = document.querySelector("#race");
const subInput = document.querySelector("#subRace");

// раса из черновика
const selectedRace = raceInput.value;
raceInput.querySelector("option.emptyOption").value = "";

raseList.forEach((item) => {
    const option = document.createElement("option");
    option.value = item.name;
    option.textContent = item.name;

    if (option.value == selectedRace) {
        raceInput.querySelector("option.emptyOption").selected = false;
        option.selected = true;
    }
    raceInput.appendChild(option);
});

// под раса из черновика
const selectedSub = subInput.value;
if (selectedSub) {
    displaySubRace();
    subInput.querySelectorAll("option").forEach((option) => {
        if (option.value == selectedSub) {
            subInput.querySelector("option.emptyOption").selected = false;
            option.selected = true;
        }
    });
}

raceInput.addEventListener("change", displaySubRace);

function displaySubRace() {
    const subObj = raseList.find((item) => item.name === raceInput.value);
    const list = subObj ? subObj.sub : false;
    displaySub(list, raceInput, subInput);
}
