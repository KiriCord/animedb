<?php
require 'home.php';
include '../html/Header.html';

//print_r($_POST);

if(!empty($_POST)) {
    if(isset($_POST['add'])) {
        $sql = "INSERT INTO genre_title(name_genre) VALUES (:name_genre)";
        $queryAdd = $pdo->prepare($sql);
        $value = array(':name_genre'=>$_POST['name_genre']);
        if($queryAdd ->execute($value)) {
            echo "
            <div class='alert alert-success m-3' role='alert'>
              <h4 class='alert-heading'>Выполнено! :)</h4>
              <p>Вы успешно выполнили это запрос.</p>
              <hr>
              <p class='mb-0'>Продолжайте работу.</p>
            </div>
        ";
        }
        else
        {
            echo "
            <div class='alert alert-danger m-3' role='alert'>
              <h4 class='alert-heading'>Не выполнено! :(</h4>
              <p>Запрос не был выполнен.</p>
              <hr>
              <p class='mb-0'>Попробуйте ещё раз.</p>
            </div>
        ";
        }
        echo "<a class='m-3 btn btn-outline-dark' href='TGenre.php'>Назад</a>";
    }

    if(isset($_POST['delete'])) {
        $sql = "DELETE FROM genre_title WHERE id='{$_POST['selected']}'";
        $queryDelete = $pdo->prepare($sql);
        //print_r($queryDelete);
        if($queryDelete->execute())
        {
            echo "
            <div class='alert alert-success m-3' role='alert'>
              <h4 class='alert-heading'>Выполнено! :)</h4>
              <p>Вы успешно выполнили это запрос.</p>
              <hr>
              <p class='mb-0'>Продолжайте работать.</p>
            </div>
        ";
        }
        else
        {
            echo "
            <div class='alert alert-danger m-3' role='alert'>
              <h4 class='alert-heading'>Не выполнено! :(</h4>
              <p>Запрос не был выполнен.</p>
              <hr>
              <p class='mb-0'>Попробуйте ещё раз.</p>
            </div>
        ";
        }
        echo "<a class='m-3 btn btn-outline-dark' href='TGenre.php'>Назад</a>";
    }

    if(isset($_POST['edit'])) {
        $sql = "UPDATE genre_title SET name_genre = :name_genre WHERE id='{$_POST['selected']}'";
        $queryEdit= $pdo->prepare($sql);
        $value = array(':name_genre'=>$_POST['name_genre']);
        if($queryEdit->execute($value)) {
            echo "
            <div class='alert alert-success m-3' role='alert'>
              <h4 class='alert-heading'>Выполнено! :)</h4>
              <p>Вы успешно выполнили это запрос.</p>
              <hr>
              <p class='mb-0'>Продолжайте работать.</p>
            </div>
        ";
        }
        else
        {
            echo "
            <div class='alert alert-danger m-3' role='alert'>
              <h4 class='alert-heading'>Не выполнено! :(</h4>
              <p>Запрос не был выполнен.</p>
              <hr>
              <p class='mb-0'>Попробуйте ещё раз.</p>
            </div>
        ";
        }
        echo "<a class='m-3 btn btn-outline-dark' href='TGenre.php'>Назад</a>";
    }
}

?>

<?php
include '../html/Footer.html';
?>


