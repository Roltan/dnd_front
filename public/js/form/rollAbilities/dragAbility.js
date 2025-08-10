var historyContainer = [];
var abilityCards = [];
var count = 6;

function initDrag() {
	historyContainer = document.getElementById("history");
	abilityCards = document.querySelectorAll("#abilities .card-body");
	historyContainer.classList.add("dragging");

	// Инициализация перетаскиваемых элементов истории
	initHistoryValues();

	// Инициализация характеристик
	initAbilityCards();
}

function initHistoryValues() {
	const draggableValues = document.querySelectorAll("#history div");

	draggableValues.forEach((value) => {
		value.setAttribute("draggable", "true");
		value.style.cursor = "move";

		value.addEventListener("dragstart", function (e) {
			e.dataTransfer.setData("text/plain", this.textContent);
			e.dataTransfer.setData("source", "history");
			e.dataTransfer.setData("sourceId", this.id || `drag-${Math.random().toString(36).substr(2, 9)}`);
			this.id = e.dataTransfer.getData("sourceId");
			this.classList.add("dragging");
		});

		value.addEventListener("dragend", function () {
			this.classList.remove("dragging");
		});
	});
}

function initAbilityCards() {
	abilityCards.forEach((card) => {
		const span = card.querySelector("span");
		span.style.cursor = "move";

		span.setAttribute("draggable", "true");

		// Обработчики для перетаскивания с характеристики
		span.addEventListener("dragstart", function (e) {
			e.dataTransfer.setData("text/plain", this.textContent);
			e.dataTransfer.setData("source", "ability");
			e.dataTransfer.setData("sourceId", this.id || `drag-${Math.random().toString(36).substr(2, 9)}`);
			this.id = e.dataTransfer.getData("sourceId");
			this.classList.add("dragging");
		});

		span.addEventListener("dragend", function () {
			this.classList.remove("dragging");
		});

		// Обработчики для приема перетаскивания на характеристику
		span.addEventListener("dragover", function (e) {
			e.preventDefault();
			this.classList.add("drag-over");
		});

		span.addEventListener("dragleave", function () {
			this.classList.remove("drag-over");
		});

		span.addEventListener("drop", function (e) {
			e.preventDefault();
			this.classList.remove("drag-over");

			const data = e.dataTransfer.getData("text/plain");
			const source = e.dataTransfer.getData("source");
			const sourceId = e.dataTransfer.getData("sourceId");

			if (data) {
				// Сохраняем текущее значение характеристики
				const currentValue = this.textContent;

				// Устанавливаем новое значение
				this.textContent = data;
				updateModifier(this, data);

				// Если перетаскивали с другой характеристики
				if (source === "ability") {
					const sourceElement = document.getElementById(sourceId);
					if (sourceElement) {
						sourceElement.textContent = currentValue;
						updateModifier(sourceElement, currentValue);
					}
				}
				// Если перетаскивали из истории
				else if (source === "history") {
					const draggedElement = document.getElementById(sourceId);
					if (draggedElement && draggedElement.parentNode === historyContainer) {
						draggedElement.remove();
						count--;

						if (count == 0) document.getElementById("submit").style.display = "block";
					}
				}
			}
		});
	});
}

function updateModifier(element, value) {
	const modifierValue = Math.floor((value - 10) / 2);
	const modifierElement = element.closest(".card-body").querySelector("h2");
	if (modifierElement) {
		if (modifierValue >= 0) {
			modifierElement.textContent = `+${modifierValue}`;
		} else {
			modifierElement.textContent = `${modifierValue}`;
		}
	}
}

export { initDrag };
