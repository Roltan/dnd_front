@extends('/blocks/pattern')

@section('links')
<script defer src="/js/form/hero/lvl.js"></script>
<script defer src="/js/form/hero/klass.js"></script>
@endsection

@section('mainContent')
    @include('blocks.header')
    <div class="container mt-4">
        <form>
            {{-- имя --}}
            <div class="mb-3">
                <label for="hero-name" class="form-label">Имя персонажа</label>
                <input type="text" class="form-control" id="hero-name">
            </div>
            {{-- уровень --}}
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="lvl" class="form-label">Уровень персонажа</label>
                    <input type="number" class="form-control" id="lvl" max="20" min="1" value="1">
                </div>
                <div class="col-md-6">
                    <label for="exp" class="form-label">Опыт персонажа</label>
                    <input type="number" class="form-control" id="exp" max="355000" min="0" value="0">
                </div>
            </div>

            {{-- класс --}}
            <div class="row g-3 mb-3">
                <div class="col-md-8">
                    <label for="klass" class="form-label">Класс</label>
                    <select class="form-select" id="klass">
                        <option selected>Откройте это меню выбора</option>
                        @foreach ($klass as $item)
                            <option value="{{$item}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="subKlass" class="form-label">Под класс</label>
                    <select class="form-select" id="subKlass" disabled>
                        <option selected>Откройте это меню выбора</option>
                    </select>
                </div>
            </div>

            {{-- раса --}}
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="race" class="form-label">Раса</label>
                    <select class="form-select" id="race">
                        <option selected>Откройте это меню выбора</option>
                        <option value="1">Один</option>
                        <option value="2">Два</option>
                        <option value="3">Три</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="sub-race" class="form-label">Под раса</label>
                    <select class="form-select" id="sub-race">
                        <option selected>Откройте это меню выбора</option>
                        <option value="1">Один</option>
                        <option value="2">Два</option>
                        <option value="3">Три</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
