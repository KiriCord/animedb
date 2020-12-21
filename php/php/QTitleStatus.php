<?php
require 'home.php';
include 'Utils.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimHub</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<!-- Начало шапки -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <a class="navbar-brand" href="../index.php">
        <img src="../img/logo.png" width="150" height="50" class="d-inline-block align-top" alt="" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Работа с БД <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../php/queryBD.php">Запросы к БД</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="m-2 mb-3">
        <div class="bodyMain">
            <h2 class="m-3">Запросы к БД</h2>
            <?
            $query = "SELECT * FROM titles WHERE exit_status=?;";
            echo Utils::renderSelectQueryToTable($query, [$_POST['status']]);
            echo "<hr>";
            echo "<p class='m-2'>Запрос: $query</p>";
            ?>
            <a class="btn btn-outline-dark m-2" href="queryBD.php" role="button">Назад</a>
        </div>
    </div>
</div>
