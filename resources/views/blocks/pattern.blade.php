<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>DnD</title>
    <link rel="icon" type="image/png" href="/img/ico.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <script defer type="module" src="/js/util/error.js"></script>
    @yield('links')
</head>
<body>
@if(isset($error))
    @include('elements.error', ['error'=>$error])
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const myModal = new bootstrap.Modal('#errorModal', {
                keyboard: false // Запрет закрытия по Esc (опционально)
            });
            myModal.show();
        });
    </script>
@endif

@yield('mainContent')
</body>
</html>
