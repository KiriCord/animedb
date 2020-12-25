<?php
require './php/home.php';
include './html/Header.html';
?>

    <div class="m-3 tableSelectContainer">
        <div class="list-group list-group-horizontal m-3 p-3">
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
                                <button name="title_to_genre" class="list-group-item list-group-item-action">Связь тайтлов и жанра</button>
                            </form>
                            <form method="POST" action="/php/TCharacter.php">
                                <button name="the_character" class="list-group-item list-group-item-action">Персонажи</button>
                            </form>
                            <form method="POST" action="/php/TCharacterToTitle.php">
                                <button name="character_to_title" class="list-group-item list-group-item-action">Связь персонажей и тайтлов</button>
                            </form>
                        </div>

<!--                </form>-->
<?php
    include './html/Footer.html';
?>