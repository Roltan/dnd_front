import { get } from "../../util/fetch.js";

// Таблица связи уровня и опыта в формате объекта
const expTable = (await get("/library/api/lvl/info")).table;

function getLevelByExp(exp) {
    exp = parseInt(exp);
    for (const level in expTable) {
        const [minExp, maxExp] = expTable[level];
        if (exp >= minExp && exp <= maxExp) {
            return level;
        }
    }
    // Если опыт выше максимального - возвращаем максимальный уровень
    const levels = Object.keys(expTable);
    return levels[levels.length - 1];
}

// Функция для получения диапазона опыта по уровню
function getExpRangeByLevel(level) {
    return expTable[level] || null;
}

// Обработчик изменения уровня
function onLevelChange(newLevel, currentExp) {
    const expRange = getExpRangeByLevel(newLevel);
    if (!expRange) return currentExp; // Некорректный уровень

    currentExp = parseInt(currentExp);
    const [minExp, maxExp] = expRange;

    if (currentExp < minExp) {
        return minExp;
    } else if (currentExp > maxExp) {
        return maxExp;
    }
    return currentExp;
}

// Обработчик изменения опыта
function onExpChange(newExp, currentLevel) {
    const calculatedLevel = getLevelByExp(newExp);
    return calculatedLevel !== currentLevel ? calculatedLevel : currentLevel;
}

// Пример использования с полями ввода
const levelInput = document.getElementById("lvl");
const expInput = document.getElementById("exp");

// Обработчик изменения уровня
levelInput?.addEventListener("change", (e) => {
    const newLevel = e.target.value;
    const currentExp = expInput.value;

    const adjustedExp = onLevelChange(newLevel, currentExp);
    if (adjustedExp.toString() !== currentExp) {
        expInput.value = adjustedExp;
    }
});

// Обработчик изменения опыта
expInput?.addEventListener("change", (e) => {
    const newExp = e.target.value;
    const currentLevel = levelInput.value;

    const adjustedLevel = onExpChange(newExp, currentLevel);
    if (adjustedLevel !== currentLevel) {
        levelInput.value = adjustedLevel;
    }
});
