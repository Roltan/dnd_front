// Таблица связи уровня и опыта в формате объекта
const expTable = {
    1: [0, 299], // Уровень 1
    2: [300, 899], // Уровень 2
    3: [900, 2699], // Уровень 3
    4: [2700, 6499], // Уровень 4
    5: [6500, 13999], // Уровень 5
    6: [14000, 22999], // Уровень 6
    7: [23000, 33999], // Уровень 7
    8: [34000, 47999], // Уровень 8
    9: [48000, 63999], // Уровень 9
    10: [64000, 84999], // Уровень 10
    11: [85000, 99999], // Уровень 11
    12: [100000, 119999], // Уровень 12
    13: [120000, 139999], // Уровень 13
    14: [140000, 164999], // Уровень 14
    15: [165000, 194999], // Уровень 15
    16: [195000, 224999], // Уровень 16
    17: [225000, 264999], // Уровень 17
    18: [265000, 304999], // Уровень 18
    19: [305000, 354999], // Уровень 19
    20: [355000, 355000], // Уровень 20
};

// Функция для получения уровня по опыту
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
