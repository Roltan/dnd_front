@extends('/blocks/pattern')

@section('links')
    <script defer type="module" src="/js/form/auth/forgot.js"></script>
@endsection

@section('mainContent')
    <br><br>
    <form id="forgot-form" class="container">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp" required>
        </div>
        <div class="buttons">
            <button type="submit" class="btn btn-primary">Отправить</button>
            <div>
                <a href="/register" class="btn btn-secondary">Зарегистрироваться</a>
                <a href="/login" class="btn btn-secondary">Авторизоваться</a>
            </div>
        </div>
    </form>
@endsection
