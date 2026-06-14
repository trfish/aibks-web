<?php

$link = mysqli_connect(
    "127.0.0.1",
    "root",
    "password",
    "first"
);

$id = $_GET["id"];

$sql = "SELECT * FROM posts WHERE id=$id";

$res = mysqli_query($link,$sql);

$row = mysqli_fetch_array($res);

$title = $row["title"];
$main_text = $row["main_text"];

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Посты</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container mt-5">

        <div class="container mt-5">

            <h1><?php echo $title; ?></h1>

            <p>
                <?php echo $main_text; ?>
            </p>

        </div>

    </div>

</body>
</html>
