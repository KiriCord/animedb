<?php
require './home.php';
include '../html/Header.html';
?>

<div class="list-group list-group-horizontal tableMenu m-2 p-2">
    <a class="list-group-item list-group-item-action" href="/php/TGenre.php">Жанры</a>
    <a class="list-group-item list-group-item-action" href="/php/TAuthor.php">Авторы</a>
    <a class="list-group-item list-group-item-action" href="/php/TStudio.php">Студии</a>
    <a class="list-group-item list-group-item-action" href="/php/TTitle.php">Тайтлы</a>
    <a class="list-group-item list-group-item-action active" href="/php/TTitleToGenre.php">Связь тайтлов и жанра</a>
    <a class="list-group-item list-group-item-action" href="/php/TCharacter.php">Персонажи</a>
    <a class="list-group-item list-group-item-action" href="/php/TCharacterToTitle.php">Связь персонажей и тайтлов</a>
</div>

<script>
    function update_values(id) {
        const current_host = window.location.host;

        const request = async () => {
            const response = await fetch(`http://${current_host}/php/api/get_titletogenre_by_id.php?id=${id}`);
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
                                                JOIN titles t on t.id = title_to_genre.id_title ORDER BY t.id;') as $row) {
                echo "<tr>
                        <th><input id='selected_{$row['id']}' onchange='update_values(this.value)' type='radio' name='selected' value='{$row['ctt_id']}'></th>
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
                    <select id="id_title" name="id_title" class='form-control'>
                        <?
                        foreach ($pdo->query('SELECT id, title FROM titles') as $row)
                        {
                            echo "<option value='{$row['id']}'>{$row['id']} - {$row['title']}</option>";
                        }
                        ?>
                    </select>
                    <select id='id_genre' name="id_genre" class='form-control'>
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

