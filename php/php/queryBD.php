<?php
require 'home.php';
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
            <hr>
            <div class="col">
                <div class="row">
                    <form method="POST" action="QAllTitle.php">
                        <h6 class="m-1">1) Вывод всех аниме и их жанров:
                            <button type="submit" name="all_title" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <form method="POST" action="QTitleStatus.php">
                        <h6 class="m-1">2) Вывод всех аниме по выбранному статусу выхода аниме:
                            <select name="status">
                                <option value="Announced">Announced</option>
                                <option value="Came Out">Came Out</option>
                                <option value="Ongoing">Ongoing</option>
                            </select>
                            <button type="submit" name="title_status" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <form method="POST" action="QTitleRating.php">
                        <h6 class="m-1">3) Вывод всех аниме, которые выше или равны определенному рейтингу:
                            <input type="number" name="rating" min="1" max="10">
                            <button type="submit" name="title_rating" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <form method="POST" action="QTitleGenre.php">
                        <h6 class="m-1">4) Вывод всех аниме, определённого жанра:
                            <select name="all_genre">
                            <?
                                foreach ($pdo->query('SELECT DISTINCT id,name_genre FROM genre_title') as $row)
                                {
                                    echo "<option value='{$row['id']}'>{$row['name_genre']}</option>";
                                }
                            ?>
                            </select>
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <form method="POST" action="QTitleCreateData.php">
                        <h6 class="m-1">5) Вывод всех аниме, по определённой дате:
                            <select name="date_of_creation">
                                <?
                                    foreach ($pdo->query("SELECT DISTINCT date_of_creation FROM titles") as $row)
                                    {
                                        echo "
                                            <option value='{$row['date_of_creation']}'>{$row['date_of_creation']}</option>
                                        ";
                                    }
                                ?>
                            </select>
<!--                            <input type="date" name="date_of_creation">-->
                            <button type="submit" name="title_date" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <form method="POST" action="QAllCharacterTitle.php">
                        <h6 class="m-1">6) Вывод всех персонажей по какому-либо аниме:
                            <select name="all_title_char">
                                <?
                                foreach ($pdo->query('SELECT DISTINCT id,title FROM titles') as $row)
                                {
                                    echo "<option value='{$row['id']}'>{$row['title']}</option>";
                                }
                                ?>
                            </select>
                            <button type="submit" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <form method="POST" action="QTitleStudio.php">
                        <h6 class="m-1">7) Вывод всех аниме по выбранной студии:
                            <select name="all_studio">
                                <?
                                foreach ($pdo->query('SELECT DISTINCT id,name_studio FROM studio') as $row)
                                {
                                    echo "<option value='{$row['id']}'>{$row['name_studio']}</option>";
                                }
                                ?>
                            </select>
                            <button type="submit" name="studio" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <form method="POST" action="QAllTitleAuthor.php">
                        <h6 class="m-1">8) Вывод всех аниме по автору:
                            <select name="all_author">
                                <?
                                foreach ($pdo->query('SELECT DISTINCT id, first_name, second_name FROM author') as $row)
                                {
                                    echo "<option value='{$row['id']}'>{$row['first_name']} {$row['second_name']}</option>";
                                }
                                ?>
                            </select>
                            <button type="submit" name="author" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <form method="POST" action="QPopularChar.php">
                        <h6 class="m-1">9) Список всех используемых персонажей:
                            <button type="submit" name="popularchar" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <form method="POST" action="QPopularGenre.php">
                        <h6 class="m-1">10) Самый популярный жанр:
                            <button type="submit" name="populargenre" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <form method="POST" action="QProductiveAuthor.php">
                        <h6 class="m-1">11) Самый продуктивный автор:
                            <button type="submit" name="populargenre" class="m-2 btn btn-outline-dark">Выполнить</button>
                        </h6>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>