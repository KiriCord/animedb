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
        <button name="titles" class="list-group-item list-group-item-action active">Тайтлы</button>
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
    <form method="POST" action="./queryHandler.php">
        <h3 class="m-3" align="center">Таблица "Тайтлы"</h3>
        <table id='table' class='table table-hover table-sm p-2 fixTable'>
            <tr>
                <th>-</th>
                <th>id</th>
                <th>Название Аниме</th>
                <th>Дата создания</th>
                <th>Кол-во эпизодов</th>
                <th>Рейтинг</th>
                <th>Статус выхода</th>
                <th class="tableTextCol">ID студии</th>
                <th class="tableTextCol">Название студии</th>
                <th class="tableTextCol">ID автора</th>
                <th class="tableTextCol">ФИ автора</th>
            </tr>
            <?
            foreach ($pdo->query('SELECT titles.id, title, date_of_creation, episode_count, rating, exit_status, id_studio, id_author, name_studio, first_name, second_name FROM titles JOIN studio s on s.id = titles.id_studio JOIN author a on a.id = titles.id_author ORDER BY id') as $row) {
                echo "<tr>
                        <th><input type='radio' name='selected' value='{$row['id']}'></th>
                        <th>{$row['id']}</th>
                        <th>{$row['title']}</th>
                        <th>{$row['date_of_creation']}</th>
                        <th>{$row['episode_count']}</th>
                        <th>{$row['rating']}</th>
                        <th>{$row['exit_status']}</th>
                        <th class='tableTextCol'>{$row['id_studio']}</th>
                        <th class='tableTextCol'>{$row['name_studio']}</th>
                        <th class='tableTextCol'>{$row['id_author']}</th>
                        <th class='tableTextCol'>{$row['first_name']} {$row['second_name']}</th>
                ";
            }
            ?>
        </table>
        <div class="m-3 p-1 workdbdiv">
            <h5 class="m-2"> Добавление, изменение и удаление данных в БД</h5>
            <div style="display: flex; flex-direction: column;">
                <input type='hidden' name='table' value='titles'>
                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Название тайтла:</span>
                    </div>
                    <input name="title" type="text" class="form-control" aria-label="Название тайтла">
                </div>

                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Дата создания:</span>
                    </div>
                    <input name="date_of_creation" type="date" class="form-control" aria-label="Дата создания">
                </div>

                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Кол-во эпизодов:</span>
                    </div>
                    <input min="1" name="episode_count" type="number" class="form-control" aria-label="Кол-во эпизодов">
                </div>

                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Рейтинг:</span>
                    </div>
                    <input min="1" name="rating" type="number" class="form-control" aria-label="Рейтинг">
                </div>

                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Статус выхода:</label>
                    </div>
                    <select name="exit_status" class="custom-select">
                        <option value="Announced">Аносирован</option>
                        <option value="Came Out">Вышел</option>
                        <option value="Ongoing">Выходит</option>
                    </select>
                </div>

                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">ID Студии:</span>
                    </div>
                    <select name="id_studio" class='form-control'>
                        <?
                        foreach ($pdo->query('SELECT id, name_studio FROM studio') as $row)
                        {
                            echo "<option value='{$row['id']}'>{$row['id']} - {$row['name_studio']}</option>";
                        }
                        ?>
                    </select>
<!--                    <input min="1" name="id_studio" type="number" class="form-control" aria-label="ID Студии">-->
                </div>

                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">ID автора:</span>
                    </div>
                    <select name="id_author" class='form-control'>
                    <?
                    foreach ($pdo->query('SELECT id, first_name, second_name FROM author') as $row)
                    {
                        echo "<option value='{$row['id']}'>{$row['id']} - {$row['first_name']} {$row['second_name']}</option>";
                    }
                    ?>
                    </select>
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

