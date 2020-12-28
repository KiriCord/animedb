<?php
require './home.php';
include '../html/Header.html';
?>

<div class="list-group list-group-horizontal tableMenu m-2 p-2">
    <a class="list-group-item list-group-item-action active" href="/php/TGenre.php">Жанры</a>
    <a class="list-group-item list-group-item-action" href="/php/TAuthor.php">Авторы</a>
    <a class="list-group-item list-group-item-action" href="/php/TStudio.php">Студии</a>
    <a class="list-group-item list-group-item-action" href="/php/TTitle.php">Тайтлы</a>
    <a class="list-group-item list-group-item-action" href="/php/TTitleToGenre.php">Связь тайтлов и жанра</a>
    <a class="list-group-item list-group-item-action" href="/php/TCharacter.php">Персонажи</a>
    <a class="list-group-item list-group-item-action" href="/php/TCharacterToTitle.php">Связь персонажей и тайтлов</a>
</div>

<script>
    function update_values(id) {
        const current_host = window.location.host;

        const request = async () => {
            const response = await fetch(`${location.protocol}//${current_host}/php/api/get_genre_by_id.php?id=${id}`);
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
                        <th><input id='selected_{$row['id']}' onchange='update_values(this.value)' type='radio' name='selected' value='{$row['id']}'></th>
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
                    <input id="name_genre" name="name_genre" type="text" class="form-control" aria-label="Название жанра">
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

