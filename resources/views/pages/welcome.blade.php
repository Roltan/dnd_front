@extends('/blocks/pattern')

@section('links')
@endsection

@section('mainContent')
    @include('blocks.header')
    <div class="container mt-4" style="max-width: 720px">
        <div class="d-flex flex-column gap-3">
            <a href="/create/hero/list" class="btn btn-primary">Создать персонажа</a>
        </div>
    </div>
@endsection
