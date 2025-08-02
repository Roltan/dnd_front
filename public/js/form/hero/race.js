import { get } from "../../util/fetch.js";
import { displaySub } from "./helper.js";

const raseList = (await get("/library/api/race/list")).races;
const raceInput = document.querySelector("#race");
const subInput = document.querySelector("#subRace");

raseList.forEach((item) => {
    const option = document.createElement("option");
    option.value = item.name;
    option.textContent = item.name;
    raceInput.appendChild(option);
});

raceInput.addEventListener("change", () => {
    const subObj = raseList.find((item) => item.name === raceInput.value);
    const list = subObj ? subObj.sub : false;
    displaySub(list, raceInput, subInput);
});
