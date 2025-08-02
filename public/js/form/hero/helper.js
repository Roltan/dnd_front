function displaySub(subList, parentInput, subInput) {
    if (subList) {
        // меняем класс
        const wrap = parentInput.parentElement;
        if (wrap.className != "col-md-6") wrap.className = "col-md-6";

        subInput.parentElement.className = "col-md-6";
        subInput.disabled = false;
        subInput.innerHTML =
            "<option selected value='' class='emptyOption'>Откройте это меню выбора</option>";

        subList.forEach((item) => {
            const option = document.createElement("option");
            option.value = item;
            option.textContent = item;
            subInput.appendChild(option);
        });
    } else {
        parentInput.parentElement.className = "col-md-8";
        subInput.parentElement.className = "col-md-4";
        subInput.disabled = true;
        subInput.innerHTML =
            "<option selected value='' class='emptyOption'>Откройте это меню выбора</option>";
    }
}

export { displaySub };
