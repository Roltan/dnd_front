@extends('/blocks/pattern')

@section('links')
    <script defer type="module" src="/js/form/auth/register.js"></script>
@endsection

@section('mainContent')
    <br><br>
    <div class="container">
        <form id="register-form">
            <div class="mb-3">
                <label for="nameInput" class="form-label">Имя</label>
                <input type="text" name="name" class="form-control" id="nameInput" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" required
                       aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Подтвердите пароль</label>
                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2"
                       required>
            </div>
            <div class="row justify-content-between">
                <button type="submit" class="btn btn-primary col-3">Зарегистрироваться</button>
                <a href="/login" class="btn btn-secondary col-3">Есть аккаунт? Авторизуйтесь</a>
            </div>
        </form>
    </div>
@endsection
