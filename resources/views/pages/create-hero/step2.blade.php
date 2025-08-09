@extends('/blocks/pattern')

@section('links')
    <link rel="stylesheet" href="/css/dice.css">
    <script defer type="module" src="/js/dices/Dice6.js"></script>
    <script defer type="module" src="/js/form/rollAbilities/main.js"></script>
    {{-- <script defer type="module" src="/js/form/hero/draft.js"></script> --}}
@endsection

@section('mainContent')
    @include('blocks.header')

    <div class="container py-5 text-center">
        <p class="lead">Бросьте кубики</p>

        <div class="col-12 d-flex justify-content-center" id="dice-scene">
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Осталось бросков</h5>
                        <div id="currentRoll" class="mb-3">6</div>
                        <div class="fs-4">Сумма трёх наибольших: <span id="topSum" class="fw-bold">0</span>
                        </div>
                    </div>
                </div>

                <button id="rollDice" class="btn btn-primary btn-lg mt-4">Бросить кубики</button>
            </div>

            <div class="col-md-6 mt-4 mt-md-0">
                <div class="card">
                    <div class="card-body" id="history">
                        <h5 class="card-title">История бросков</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
