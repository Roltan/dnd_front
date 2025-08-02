@extends('/blocks/pattern')

@section('links')
<script defer type="module" src="/js/form/hero/lvl.js"></script>
<script defer type="module" src="/js/form/hero/klass.js"></script>
<script defer type="module" src="/js/form/hero/race.js"></script>
@endsection

@section('mainContent')
    @include('blocks.header')
    <div class="container mt-4" style="max-width: 720px">
        <div class="d-flex flex-column gap-3">
            <a href="/create/hero" class="btn btn-primary">Создать нового персонажа</a>
            @foreach ($drafts as $draft)
                <a href="{{ $draft->href }}" class="btn btn-primary">{{ $draft->title }}</a>
            @endforeach
        </div>
    </div>
@endsection
