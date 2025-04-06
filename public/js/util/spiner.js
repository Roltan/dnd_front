function load() {
    let spinner = document.querySelector('#spinner');
    if (spinner) {
        const myModal = bootstrap.Modal.getInstance(spinner);

        // При закрытии модалки удаляем её и бэкдроп
        spinner.addEventListener('hidden.bs.modal', function () {
            const myModal = bootstrap.Modal.getInstance(spinner);

            // При закрытии модалки удаляем её и бэкдроп
            spinner.addEventListener('hidden.bs.modal', function () {
                spinner.remove();
                const backdrop = document.querySelectorAll('.modal-backdrop');
                backdrop[0].remove();
                document.body.classList.remove('modal-open');
            });

            myModal.hide();
            document.body.classList.remove('modal-open');
        });

        myModal.hide();
    } else {
        document.body.insertAdjacentHTML('beforeend', `
            <div class="modal fade" id="spinner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                        <div class="modal-body row justify-content-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Загрузка...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `);
        const myModal = new bootstrap.Modal('#spinner');
        myModal.show();
    }
}

export {load}
