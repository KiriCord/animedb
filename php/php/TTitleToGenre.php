<?php
require './home.php';
include '../html/Header.html';
?>

<div class="list-group list-group-horizontal tableMenu m-3 p-3">
    <form method="POST" action="/php/TGenre.php">
        <button name="genre_title" class="list-group-item list-group-item-action">Жанры</button>
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
        <button name="title_to_genre" class="list-group-item list-group-item-action active">Связь тайтлов и жанра</button>
    </form>
    <form method="POST" action="/php/TCharacter.php">
        <button name="the_character" class="list-group-item list-group-item-action">Персонажи</button>
    </form>
    <form method="POST" action="/php/TCharacterToTitle.php">
        <button name="character_to_title" class="list-group-item list-group-item-action">Связь персонажей и тайтлов</button>
    </form>
</div>

<div class="m-3 p-1 tableSelectContainer">
    <form method="POST" action="./HTitleToGenre.php">
        <h3 class="m-3" align="center">Таблица "Связь персонажей и тайтлов"</h3>
        <table id='table' class='table table-hover table-sm p-2 fixTable'>
            <tr>
                <th>-</th>
                <th>ID Тайтла</th>
                <th>Название тайтла</th>
<!--                <th class='tableTextCol'>ID Жанра</th>   <th class='tableTextCol'>{$row['id_genre']}</th>-->
                <th class='tableTextCol'>Название жанра</th>
            </tr>
            <?
            foreach ($pdo->query('SELECT title_to_genre.id as ctt_id, id_title, title, name_genre FROM title_to_genre 
                                                JOIN genre_title gt on gt.id = title_to_genre.id_genre 
                                                JOIN titles t on t.id = title_to_genre.id_title;') as $row) {
                echo "<tr>
                        <th><input type='radio' name='selected' value='{$row['ctt_id']}'></th>
                        <th>{$row['id_title']}</th>
                        <th>{$row['title']}</th>                      
                        <th class='tableTextCol'>{$row['name_genre']}</th>

                ";
            }
            ?>
        </table>
        <div class="m-3 p-1 workdbdiv">
            <h5 class="m-2"> Добавление, изменение и удаление данных в БД</h5>
            <div style="display: flex; flex-direction: column;">
                <input type='hidden' name='table' value='title_to_genre'>
                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">ID Тайтла и ID Жанра</span>
                    </div>
                    <select name="id_title" class='form-control'>
                        <?
                        foreach ($pdo->query('SELECT id, title FROM titles') as $row)
                        {
                            echo "<option value='{$row['id']}'>{$row['id']} - {$row['title']}</option>";
                        }
                        ?>
                    </select>
                    <select name="id_genre" class='form-control'>
                        <?
                        foreach ($pdo->query('SELECT * FROM genre_title') as $row)
                        {
                            echo "<option value='{$row['id']}'>{$row['id']} - {$row['name_genre']}</option>";
                        }
                        ?>
                    </select>
<!--                    <input min="0" name="id_title" type="number" class="form-control" aria-label="ID Тайтла">-->
<!--                    <input min="0" name="id_genre" type="number" class="form-control" aria-label="ID Жанра">-->
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

