<?php
require './home.php';
include '../html/Header.html';
?>

<div class="list-group list-group-horizontal tableMenu m-2 p-2">
    <a class="list-group-item list-group-item-action" href="/php/TGenre.php">Жанры</a>
    <a class="list-group-item list-group-item-action" href="/php/TAuthor.php">Авторы</a>
    <a class="list-group-item list-group-item-action" href="/php/TStudio.php">Студии</a>
    <a class="list-group-item list-group-item-action active" href="/php/TTitle.php">Тайтлы</a>
    <a class="list-group-item list-group-item-action" href="/php/TTitleToGenre.php">Связь тайтлов и жанра</a>
    <a class="list-group-item list-group-item-action" href="/php/TCharacter.php">Персонажи</a>
    <a class="list-group-item list-group-item-action" href="/php/TCharacterToTitle.php">Связь персонажей и тайтлов</a>
</div>

<script>
    function update_values(id) {
        const current_host = window.location.host;

        const request = async () => {
            const response = await fetch(`http://${current_host}/php/api/get_title_by_id.php?id=${id}`);
            const json = await response.json();
            console.log(json);
            for (const jsonKey in json) {
                if(json.hasOwnProperty(jsonKey) && document.getElementById(jsonKey) !== null) {
                    document.getElementById(jsonKey).value = json[jsonKey];
                }
            }
        }
        request();
    }
</script>

<div class="m-3 p-1 tableSelectContainer">
    <form method="POST" action="./HTitle.php">
        <h3 class="m-3" align="center">Таблица "Тайтлы"</h3>
        <table id='table' class='table table-hover table-reflow table-sm p-2 fixTable'>
            <tr>
                <th>-</th>
                <th>id</th>
                <th>Название Аниме</th>
                <th>Дата создания</th>
                <th>Кол-во эпизодов</th>
                <th>Рейтинг</th>
                <th>Статус выхода</th>
<!--                <th class="tableTextCol">ID студии</th> <th class='tableTextCol'>{$row['id_studio']}</th>-->
                <th class="tableTextCol">Название студии</th>
<!--                <th class="tableTextCol">ID автора</th> <th class='tableTextCol'>{$row['id_author']}</th>-->
                <th class="tableTextCol">ФИ автора</th>
            </tr>
            <?
            foreach ($pdo->query('SELECT titles.id, title, date_of_creation, episode_count, rating, exit_status, name_studio, first_name, second_name FROM titles JOIN studio s on s.id = titles.id_studio JOIN author a on a.id = titles.id_author ORDER BY id') as $row) {
                echo "<tr>
                        <th><input id='selected_{$row['id']}' onchange='update_values(this.value)' type='radio' name='selected' value='{$row['id']}'></th>
                        <th>{$row['id']}</th>
                        <th>{$row['title']}</th>
                        <th>{$row['date_of_creation']}</th>
                        <th>{$row['episode_count']}</th>
                        <th>{$row['rating']}</th>
                        <th>{$row['exit_status']}</th>                    
                        <th class='tableTextCol'>{$row['name_studio']}</th>                       
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
                    <input id='title' name="title" type="text" class="form-control" aria-label="Название тайтла">
                </div>

                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Дата создания:</span>
                    </div>
                    <input id='date_of_creation' name="date_of_creation" type="date" class="form-control" aria-label="Дата создания">
                </div>

                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Кол-во эпизодов:</span>
                    </div>
                    <input id='episode_count' min="1" name="episode_count" type="number" class="form-control" aria-label="Кол-во эпизодов">
                </div>

                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Рейтинг:</span>
                    </div>
                    <input id='rating' min="1" name="rating" type="number" class="form-control" aria-label="Рейтинг">
                </div>

                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Статус выхода:</label>
                    </div>
                    <select id='exit_status' name="exit_status" class="custom-select">
                        <option value="Announced">Аносирован</option>
                        <option value="Came Out">Вышел</option>
                        <option value="Ongoing">Выходит</option>
                    </select>
                </div>

                <div class="input-group p-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">ID Студии:</span>
                    </div>
                    <select id='id_studio' name="id_studio" class='form-control'>
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
                    <select id="id_author" name="id_author" class='form-control'>
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
                    <button type="submit" name="edit" class="m-2 btn btn-light">Изменить</button>
                    <button type="submit" name="delete" class="m-2 btn btn-danger">Удалить</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
include '../html/Footer.html';
?>

