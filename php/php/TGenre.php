<?php
require './home.php';
include '../html/Header.html';
?>

<div class="list-group list-group-horizontal tableMenu m-3 p-3">
    <form method="POST" action="/php/TGenre.php">
        <button name="genre_title" class="list-group-item list-group-item-action active">Жанры</button>
    </form>
    <form method="POST" action="/php/TAuthor.php">
        <button name="author" class="list-group-item list-group-item-action">Авторы</button>
    </form>
    <form method="POST" action="/php/TStudio.php">
        <button name="studio" class="list-group-item list-group-item-action">Студии</button>
    </form>
    <form method="POST" action="/php/TTitle.php">
        <button name="titles" class="list-group-item list-group-item-action">Тайтлы</button>
    </form>
    <form method="POST" action="/php/TTitleToGenre.php">
        <button name="title_to_genre" class="list-group-item list-group-item-action">Связь тайтлов и жанра</button>
    </form>
    <form method="POST" action="/php/TCharacter.php">
        <button name="the_character" class="list-group-item list-group-item-action">Персонажи</button>
    </form>
    <form method="POST" action="/php/TCharacterToTitle.php">
        <button name="character_to_title" class="list-group-item list-group-item-action">Связь персонажей и тайтлов</button>
    </form>
</div>

<div class="m-3 p-1 tableSelectContainer">
    <form method="POST" action="./HGenre.php">
        <h3 class="m-3" align="center">Таблица "Жанры"</h3>
        <table id='table' class='table table-hover table-sm p-2 fixTable'>
            <tr>
                <th>-</th>
                <th>id Тайтла</th>
                <th>Название жанра</th>
            </tr>
            <?
            foreach ($pdo->query('SELECT * FROM genre_title;') as $row) {
                echo "<tr>
                        <th><input type='radio' name='selected' value='{$row['id']}'></th>
                        <th>{$row['id']}</th>
                        <th>{$row['name_genre']}</th>

                ";
            }
            ?>
        </table>
        <div class="m-3 p-1 workdbdiv">
            <h5 class="m-2"> Добавление, изменение и удаление данных в БД</h5>
            <div style="display: flex; flex-direction: column;">
                <input type='hidden' name='table' value='genre_title'>
                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Название жанра:</span>
                    </div>
                    <input name="name_genre" type="text" class="form-control" aria-label="Название жанра">
                </div>

                <div class="p-2">
                    <button type="submit" name="add" class="m-2 btn btn-light" >Добавить</button>
                    <button type="submit" name="edit" class="m-2 btn btn-light">Изменить всё</button>
                    <button type="submit" name="delete" class="m-2 btn btn-danger">Удалить</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
include '../html/Footer.html';
?>

