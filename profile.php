<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-black bg-black p-3">
    <div class="container-fluid">

        <a href="#" class="navbar-brand d-flex align-items-center">
            <img src="favicon.ico" alt="logo" class="me-2">
            <span class="text-light">Профиль</span>
        </a>

        <a href="posts.php" class="btn btn-primary">
            Посты
        </a>

        <?php if(isset($_COOKIE["User"])): ?>
            <form
            action="logout.php"
            method="POST">
                <button class="btn btn-danger"
                        type="submit">
                    Выход
                </button>
            </form>
        <?php endif; ?>

    </div>
</nav>

<div class="container mt-5">

    <div class="story-container">

        <div class="story-text">
            <h2>Брустовский Александр Максимович (trfish)</h2>

            <p>
                Студент направления
                «Информационная безопасность».
            </p>
        </div>

        <div class="avatar-container">
            <img src="img/avatar.jpg"
                alt="profile"
                class="avatar">
        </div>

    </div>

    <div class="text-center mt-4">
        <button id="toggleButton"
                class="btn btn-primary">
            Спойлер
        </button>
    </div>

    <div id="extraImage"
         class="mt-3 text-center"
         style="display:none">

        <img src="img/badges/1.png"
             alt="extra"
             class="my-img">
    </div>

    <div class="mt-5">

        <h2 class="text-center mb-4">
            Новый пост
        </h2>

        <form id="postForm"
              method="POST"
              enctype="multipart/form-data"
              class="d-flex flex-column gap-3">

            <div class="form-group">
                <label class="form-label">
                    Заголовок поста
                </label>

                <input type="text"
                       name="postTitle"
                       class="form-control my-input"
                       placeholder="Заголовок"
                       required>
            </div>

            <div class="form-group">
                <label class="form-label">
                    Тело поста
                </label>

                <textarea
                    name="postContent"
                    class="form-control my-input"
                    rows="5"
                    placeholder="Текст"
                    required></textarea>
            </div>

            <div class="form-group">
                <label class="form-label">
                    Прикрепить файл
                </label>

                <input type="file"
                       name="file"
                       class="form-control my-input">
            </div>

            <button class="btn btn-primary">
                Опубликовать
            </button>

        </form>

    </div>

</div>

<script src="js/script.js"></script>

</body>
</html>

<?php

if(!isset($_COOKIE["User"]))
{
    header("Location: login.php");
    exit();
}

$link = mysqli_connect(
    "127.0.0.1",
    "root",
    "password",
    "first"
);

if(isset($_POST["postTitle"]))
{
    $title = $_POST["postTitle"];
    $main_text = $_POST["postContent"];

    if(!$title || !$main_text)
        die("Нет данных");

    $sql =
    "INSERT INTO posts
    (title,main_text)
    VALUES
    ('$title','$main_text')";

        if(!mysqli_query($link,$sql))
            die("Ошибка добавления поста");
}

if(!empty($_FILES["file"]))
{
    move_uploaded_file(
        $_FILES["file"]["tmp_name"],
        "upload/" .
        $_FILES["file"]["name"]
    );
}

?>
