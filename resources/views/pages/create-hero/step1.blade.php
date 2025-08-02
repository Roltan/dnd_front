@extends('/blocks/pattern')

@section('links')
<script defer type="module" src="/js/form/hero/lvl.js"></script>
<script defer type="module" src="/js/form/hero/klass.js"></script>
<script defer type="module" src="/js/form/hero/race.js"></script>
@endsection

@section('mainContent')
    @include('blocks.header')
    <div class="container mt-4" style="max-width: 720px">
        <form action="/create/hero/roll" method="post">
            @csrf
            {{-- имя --}}
            <div class="mb-3">
                <label for="hero-name" class="form-label">Имя персонажа</label>
                <input type="text" class="form-control" id="heroName" name="hero_name" value="{{$draft->hero_name}}" required>
            </div>

            {{-- уровень --}}
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="lvl" class="form-label">Уровень персонажа</label>
                    <input type="number" class="form-control" id="lvl" name="lvl" max="20" min="1" value="{{$draft->lvl ?? 1}}" required>
                </div>
                <div class="col-md-6">
                    <label for="exp" class="form-label">Опыт персонажа</label>
                    <input type="number" class="form-control" id="exp" name="exp" max="355000" min="0" value="{{$draft->exp ?? 0}}" required>
                </div>
            </div>

            {{-- класс --}}
            <div class="row g-3 mb-3">
                <div class="col-md-8">
                    <label for="klass" class="form-label">Класс</label>
                    <select class="form-select" id="klass" name="klass" required>
                        <option {{ $draft->klass == null ? 'selected' : '' }} value="">Откройте это меню выбора</option>
                        @foreach ($klass as $item)
                            <option {{ $draft->klass == $item ? 'selected' : '' }} value="{{$item}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="subKlass" class="form-label">Под класс</label>
                    <select class="form-select" id="subKlass" name="sub_klass" disabled>
                        <option selected value="{{ $draft->sub_klass }}" class="emptyOption">Откройте это меню выбора</option>
                    </select>
                </div>
            </div>

            {{-- раса --}}
            <div class="row g-3 mb-3">
                <div class="col-md-8">
                    <label for="race" class="form-label">Раса</label>
                    <select class="form-select" id="race" name="race" required>
                        <option selected value="{{ $draft->race }}" class="emptyOption">Откройте это меню выбора</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="subRace" class="form-label">Под раса</label>
                    <select class="form-select" id="subRace" name="sub_race" disabled>
                        <option selected value="{{ $draft->sub_race }}" class="emptyOption">Откройте это меню выбора</option>
                    </select>
                </div>
            </div>

            {{-- Происхождение --}}
            <div class="mb-3">
                <label for="background" class="form-label">Происхождение</label>
                <select class="form-select" id="background" name="background" required>
                    <option {{ $draft->background == null ? 'selected' : '' }} value="">Откройте это меню выбора</option>
                    @foreach ($background as $item)
                        <option {{ $draft->background == $item ? 'selected' : '' }} value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
