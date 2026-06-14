<?php

$servername = "127.0.0.1";
$username = "root";
$password = "password";
$dbName = "first";

$link = mysqli_connect($servername, $username, $password);

if (!$link) {
    die("Ошибка подключения");
}

mysqli_query($link,
             "CREATE DATABASE IF NOT EXISTS $dbName");

mysqli_close($link);

$link = mysqli_connect(
    $servername,
    $username,
    $password,
    $dbName
);

$sql = "
CREATE TABLE IF NOT EXISTS users(
    id INT PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(15) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(20) NOT NULL
)";

mysqli_query($link,$sql);

$sql = "
CREATE TABLE IF NOT EXISTS posts(
    id INT PRIMARY KEY AUTO_INCREMENT,
title VARCHAR(100) NOT NULL,
main_text TEXT NOT NULL
)";

mysqli_query($link,$sql);

mysqli_close($link);

?>
