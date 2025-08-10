class Dice6 {
	constructor(container, options = {}) {
		this.container = container;
		this.options = {
			onRollComplete: null,
			...options,
		};

		this.value = 1;
		this.isRolling = false;
		this.init();
	}

	init() {
		// Создаем сцену для кубика
		this.scene = document.createElement("div");
		this.scene.className = "dice-scene";

		// Создаем сам кубик
		this.diceElement = document.createElement("div");
		this.diceElement.className = "dice";

		// Создаем грани кубика
		const faces = [
			{ className: "dice-face--front", value: 1 },
			{ className: "dice-face--back", value: 6 },
			{ className: "dice-face--right", value: 3 },
			{ className: "dice-face--left", value: 4 },
			{ className: "dice-face--top", value: 5 },
			{ className: "dice-face--bottom", value: 2 },
		];

		faces.forEach((face) => {
			const faceElement = document.createElement("div");
			faceElement.className = `dice-face ${face.className}`;
			faceElement.textContent = face.value;
			this.diceElement.appendChild(faceElement);
		});

		this.scene.appendChild(this.diceElement);
		this.container.appendChild(this.scene);
	}

	setValue(value) {
		if (value < 1 || value > 6) {
			console.error("Значение кубика должно быть от 1 до 6");
			return;
		}

		this.value = value;

		// Углы поворота для каждого значения
		const rotations = {
			1: { x: 0, y: 0 },
			3: { x: 0, y: -90 },
			6: { x: 0, y: 180 },
			4: { x: 0, y: 90 },
			5: { x: -90, y: 0 },
			2: { x: 90, y: 0 },
		};

		const rotation = rotations[value];
		this.diceElement.style.setProperty("--rotate-x", `${rotation.x + 720}deg`);
		this.diceElement.style.setProperty("--rotate-y", `${rotation.y + 360}deg`);
		this.diceElement.style.transform = `rotateX(${rotation.x}deg) rotateY(${rotation.y}deg)`;
	}

	rollToValue(value) {
		if (this.isRolling) return;

		this.isRolling = true;
		this.setValue(value);
		const duration = 1.5 + Math.random();

		// Добавляем класс анимации
		this.diceElement.style.animation = `rolling ${duration}s ease-out`;

		// По окончании анимации
		setTimeout(() => {
			this.diceElement.style.animation = "unset";
			this.isRolling = false;

			if (this.options.onRollComplete) {
				this.options.onRollComplete(this.value);
			}
		}, duration * 1000);
	}
}

export { Dice6 };
