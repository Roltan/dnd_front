@extends('/blocks/pattern')

@section('links')
    <link rel="stylesheet" href="/css/dice.css">
    <script defer type="module" src="/js/dices/Dice6.js"></script>
    <script defer type="module" src="/js/form/rollAbilities/page.js"></script>
    <script defer type="module" src="/js/form/rollAbilities/roll.js"></script>
    <script defer type="module" src="/js/form/rollAbilities/dragAbility.js"></script>
    {{-- <script defer type="module" src="/js/form/hero/draft.js"></script> --}}
@endsection

@section('mainContent')
    @include('blocks.header')

    <div class="container mt-4 selectPage" style="max-width: 720px">
        <div class="d-flex flex-column gap-3 text-center">
            <p class="lead" id="title">Выберете способ распределения характеристик</p>
            <button class="btn btn-primary" id="rollPageBtn">Броском костей</button>
            <button class="btn btn-primary" id="presetBtn">Распределением значений</button>
            <button class="btn btn-primary" id="..Btn">«Покупкой» значений</button>
        </div>
    </div>

    <div class="container py-5 text-center rollPage" style="display: none">
        <p class="lead" id="title">Бросьте кубики</p>

        <div class="col-12 d-flex justify-content-center" id="dice-scene">
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6" id="roll">
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
            <div class="col-md-6" id="abilities" style="display: none">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Характеристики</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Сила</h5>
                                        <h2>+0</h2>
                                        <span class="abilities">10</span>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Ловкость</h5>
                                        <h2>+0</h2>
                                        <span class="abilities">10</span>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Телосложение</h5>
                                        <h2>+0</h2>
                                        <span class="abilities">10</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Интеллект</h5>
                                        <h2>+0</h2>
                                        <span class="abilities">10</span>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Мудрость</h5>
                                        <h2>+0</h2>
                                        <span class="abilities">10</span>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Харизма</h5>
                                        <h2>+0</h2>
                                        <span class="abilities">10</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-4 mt-md-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">История бросков</h5>
                        <div id="history"></div>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg mt-4" style="display: none" id="submit">Продолжить</button>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .abilities {
            border: 1px solid var(--bs-card-border-color);
            border-radius: 50%;
            padding: 0 15px
        }

        #history {
            display: flex;
            flex-direction: row;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
        }

        #history div {
            box-sizing: border-box;
            width: 40px;
            height: 40px;
            display: inline-block;
            margin: 5px;
            background-color: #f8f9fa;
            color: black;
            border-radius: 4px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #history div,
        #abilities .card-body span {
            transition: all 0.2s;
        }

        #history div.dragging,
        #abilities .card-body span.dragging {
            opacity: 0.5;
            background-color: #e9ecef;
        }

        #abilities .card-body span.drag-over {
            background-color: #e9ecef;
            border-color: #0d6efd !important;
            transform: scale(1.05);
        }

        @media (max-width: 770px) {
            #history.dragging {
                position: fixed;
                top: 50px;
                right: 10px;
                padding: 10px;
                border: 1px solid var(--bs-card-border-color);
                border-radius: 15px;
                flex-direction: column;
            }
        }
    </style>
@endsection
