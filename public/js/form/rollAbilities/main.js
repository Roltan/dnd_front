import { Dice6 } from "../../dices/Dice6.js";

const scene = document.getElementById("dice-scene");
const RollBtn = document.getElementById("rollDice");
const dices = [new Dice6(scene), new Dice6(scene), new Dice6(scene), new Dice6(scene), new Dice6(scene), new Dice6(scene)];
var roll = 6;

RollBtn.addEventListener("click", () => {
	if (roll > 0) {
		roll--;
		dices.forEach((dice) => {
			const value = Math.floor(Math.random() * 6) + 1;
			dice.rollToValue(value);
		});
	}
});
