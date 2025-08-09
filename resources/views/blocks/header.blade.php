<br>
@if (request()->is('/'))
    {{-- Шапка для главной страницы --}}
    <header class="container px-sm-0">
        <div class="row justify-content-between">
            <p class="col-3">Главная</p>
            <a href="/api/logout" class="btn btn-secondary col-3">Выйти</a>
        </div>
    </header>
@else
    {{-- Шапка для всех остальных страниц --}}
    <header class="container px-sm-0">
        <div class="row justify-content-between">
            <a href="/" class="btn btn-secondary col-3">Главная</a>
            <a href="/api/logout" class="btn btn-secondary col-3">Выйти</a>
        </div>
    </header>
@endif
