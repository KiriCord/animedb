<?php
require './php/home.php';
include './html/Header.html';
?>
    <div class="m-3 tableSelectContainer">
        <div class="list-group list-group-horizontal tableMenu m-2 p-2">
            <a class="list-group-item list-group-item-action" href="/php/TGenre.php">Жанры</a>
            <a class="list-group-item list-group-item-action" href="/php/TAuthor.php">Авторы</a>
            <a class="list-group-item list-group-item-action" href="/php/TStudio.php">Студии</a>
            <a class="list-group-item list-group-item-action" href="/php/TTitle.php">Тайтлы</a>
            <a class="list-group-item list-group-item-action" href="/php/TTitleToGenre.php">Связь тайтлов и жанра</a>
            <a class="list-group-item list-group-item-action" href="/php/TCharacter.php">Персонажи</a>
            <a class="list-group-item list-group-item-action" href="/php/TCharacterToTitle.php">Связь персонажей и тайтлов</a>
        </div>
<?php
    include './html/Footer.html';
?>