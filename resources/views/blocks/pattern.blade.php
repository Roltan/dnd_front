<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DnD</title>
    <link rel="icon" type="image/png" href="/img/ico.png">

    {{-- будстрап --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="/css/main.css">
    @yield('links')
</head>

<body>
    @if (isset($modal))
        @include('elements.modal', ['modal' => $modal])
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const myModal = new bootstrap.Modal('#errorModal', {
                    keyboard: false // Запрет закрытия по Esc (опционально)
                });
                myModal.show();
            });
        </script>
    @endif

    @yield('mainContent')
    @yield('style')
    @yield('script')
</body>

</html>
