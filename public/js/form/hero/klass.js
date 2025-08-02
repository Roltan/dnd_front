const klassInput = document.querySelector("#klass");
const lvlInput = document.querySelector("#lvl");

klassInput.addEventListener("change", displaySubKlass);
lvlInput.addEventListener("change", displaySubKlass);

function displaySubKlass() {
    fetch("/library/api/klass/sub/list/" + klassInput.value)
        .then((response) => response.json())
        .then((data) => {
            if (data.status) {
                if (lvlInput.value >= data.lvlSubKlass) {
                    const wrap = klassInput.parentElement;
                    // меняем класс
                    if (wrap.className != "col-md-6")
                        wrap.className = "col-md-6";

                    // отображаем под классы
                    const subInput = document.querySelector("#subKlass");
                    subInput.disabled = false;
                    subInput.parentElement.className = "col-md-6";

                    subInput.innerHTML =
                        "<option selected>Откройте это меню выбора</option>";
                    data.subKlasses.forEach((item) => {
                        const option = document.createElement("option");
                        option.value = item;
                        option.textContent = item;
                        subInput.appendChild(option);
                    });
                }
            }
        });
}
