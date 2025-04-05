function error(msg) {
    document.querySelector('#errorModal')?.remove();

    fetch(`/api/component/error?error=${msg}`, {
        method: 'get'
    })
        .then((response) => response.text())
        .then((data) => {
            document.body.insertAdjacentHTML('beforeend', data);

            const myModal = new bootstrap.Modal('#errorModal');
            myModal.show();
        });
}

export {error}
