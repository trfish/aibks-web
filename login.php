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

                <button class="btn btn-primary" type="submit" name="submit">
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

<?php

require_once("db.php");

if(isset($_COOKIE["User"]))
{
    header("Location: profile.php");
    exit();
}

$link = mysqli_connect(
    "127.0.0.1",
    "root",
    "password",
    "first"
);

if(isset($_POST["submit"]))
{
    $login = $_POST["login"];
    $pass = $_POST["password"];

    $sql =
    "SELECT *
    FROM users
    WHERE username='$login'
    AND password='$pass'";

    $result = mysqli_query($link,$sql);

    if(mysqli_num_rows($result)==1)
    {
        setcookie(
            "User",
            $login,
            time()+7200
        );

        header("Location: profile.php");
        exit();
    }
    else
    {
        echo "Неверный логин или пароль";
    }
}

?>
