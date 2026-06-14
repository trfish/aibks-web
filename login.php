<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row">
        <div class="col-12 text-center">

            <h1 class="mb-4">Вход</h1>

            <form action="#" method="POST" class="d-flex flex-column gap-3">

                <input type="text"
                       name="login"
                       class="form-control my-input"
                       placeholder="Логин">

                <input type="password"
                       name="password"
                       class="form-control my-input"
                       placeholder="Пароль">

                <button class="btn btn-primary" type="submit">
                    Войти
                </button>

                <p>
                    Нет аккаунта?
                    <a href="registration.php">Регистрация</a>
                </p>

            </form>

        </div>
    </div>
</div>

</body>
</html>
