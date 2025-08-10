import { initDrag } from "./dragAbility.js";
import { initRoll } from "./roll.js";

document.getElementById("rollPageBtn").addEventListener("click", () => {
	document.querySelector(".selectPage").style.display = "none";
	document.querySelector(".rollPage").style.display = "block";
	initRoll();
});

document.getElementById("presetBtn").addEventListener("click", () => {
	const HistoryList = document.getElementById("history");
	document.querySelector(".selectPage").style.display = "none";
	document.querySelector(".rollPage").style.display = "block";

	document.getElementById("dice-scene").remove();
	document.getElementById("roll").remove();
	document.getElementById("title").innerText = "Перетащите значения к характеристикам";
	document.getElementById("abilities").style.display = "block";

	HistoryList.innerHTML = `<div>15</div>`;
	HistoryList.innerHTML += `<div>14</div>`;
	HistoryList.innerHTML += `<div>13</div>`;
	HistoryList.innerHTML += `<div>12</div>`;
	HistoryList.innerHTML += `<div>10</div>`;
	HistoryList.innerHTML += `<div>8</div>`;

	initDrag();
});
