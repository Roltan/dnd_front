@extends('/blocks/pattern')

@section('links')
    <script defer type="module" src="/js/form/hero/deleteDraft.js"></script>
@endsection

@section('mainContent')
    @include('blocks.header')
    <div class="container mt-4" style="max-width: 720px">
        <div class="d-flex flex-column gap-3">
            <a href="/create/hero" class="btn btn-primary">Создать нового персонажа</a>
            @foreach ($drafts as $draft)
                <div class="d-flex gap-2">
                    <a href="{{ $draft->href }}" class="btn btn-primary flex-grow-1">{{ $draft->title }}</a>
                    <button class="btn btn-outline-danger delete-draft" data-id="{{ $draft->id }}">
                        <i class="bi bi-trash"></i> <!-- Иконка корзины из Bootstrap Icons -->
                    </button>
                </div>
            @endforeach
        </div>
    </div>
@endsection
