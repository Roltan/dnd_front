@extends('/blocks/pattern')

@section('links')
    <script defer type="module" src="/js/form/auth/reset.js"></script>
@endsection

@section('mainContent')
    <br><br>
    <form id="reset-form" class="container">
        <input type="hidden" name="email" value="{{$email}}">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Новый пароль</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2" required>
        </div>
        <div class="buttons">
            <button type="submit" class="btn btn-primary">Изменить пароль</button>
            <div>
                <a href="/register" class="btn btn-secondary">Зарегистрироваться</a>
                <a href="/login" class="btn btn-secondary">Авторизоваться</a>
            </div>
        </div>
    </form>
@endsection
