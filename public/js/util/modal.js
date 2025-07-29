function modal(msg) {
    document.querySelector("#errorModal")?.remove();

    fetch(`/api/component/modal?error=${msg}`, {
        method: "get",
    })
        .then((response) => response.text())
        .then((data) => {
            document.body.insertAdjacentHTML("beforeend", data);

            const myModal = new bootstrap.Modal("#errorModal");
            myModal.show();
        });
}

function message(msg) {
    document.querySelector("#errorModal")?.remove();

    fetch(`/api/component/modal?message=${msg}`, {
        method: "get",
    })
        .then((response) => response.text())
        .then((data) => {
            document.body.insertAdjacentHTML("beforeend", data);

            const myModal = new bootstrap.Modal("#errorModal");
            myModal.show();
        });
}

export { modal, message };
