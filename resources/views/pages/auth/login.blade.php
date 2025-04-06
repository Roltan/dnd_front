@extends('/blocks/pattern')

@section('links')
    <script defer type="module" src="/js/form/auth/login.js"></script>
@endsection

@section('mainContent')
    <br><br>
    <form id="login-form" class="container">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="buttons">
            <button type="submit" class="btn btn-primary">Войти</button>
            <div>
                <a href="/register" class="btn btn-secondary">Зарегистрироваться</a>
                <a href="/forgot" class="btn btn-secondary">Забыл пароль</a>
            </div>
        </div>
    </form>
@endsection
