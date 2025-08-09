import { Dice6 } from "../../dices/Dice6.js";

const scene = document.getElementById("dice-scene");
const RollBtn = document.getElementById("rollDice");
const SumSpan = document.getElementById("topSum");
const RollSpan = document.getElementById("currentRoll");
const dices = Array(6)
	.fill()
	.map(() => new Dice6(scene, { onRollComplete: handleRollComplete }));
const HistoryList = document.getElementById("history");
var roll = 6;

RollBtn.addEventListener("click", () => {
	if (roll > 0) {
		roll--;
		RollSpan.innerText = roll;
		dices.forEach((dice) => {
			const value = Math.floor(Math.random() * 6) + 1;
			dice.rollToValue(value);
		});
	}
});

let completedRolls = 0;
let currentValues = [];

// Обработчик завершения анимации кубика
function handleRollComplete(value) {
	currentValues.push(value);
	completedRolls++;

	if (completedRolls === dices.length) {
		const topThreeSum = [...currentValues]
			.sort((a, b) => b - a)
			.slice(0, 3)
			.reduce((sum, val) => sum + val, 0);

		SumSpan.textContent = topThreeSum;
		completedRolls = 0;
		currentValues = [];
		HistoryList.innerHTML += `<div>${topThreeSum}</div>`;
	}
}
