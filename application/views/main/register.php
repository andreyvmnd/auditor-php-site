<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Реєстрація у обліковому записі</div>
        <div class="card-body">
            <form action="/register" method="post">
                <div class="form-group">
                    <label>Введіть логін:</label>
                    <input class="form-control" type="text" name="login">
                </div>
                <div class="form-group">
                    <label>Введіть пароль:</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="form-group">
                    <label>Повторіть пароль:</label>
                    <input class="form-control" type="password" name="password2">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Зареєструватися</button>
            </form>
            <span style="margin-top:0.5rem" class="btn btn-primary btn-block"><a style="color:#fff;text-decoration:none" href="/login">Перейти до авторизації</a></span>
        </div>
    </div>
</div>