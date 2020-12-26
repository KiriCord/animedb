<?php
require 'home.php';
include '../html/Header.html';

//print_r($_POST);

if(!empty($_POST)) {
    if(isset($_POST['add'])) {
        $sql = "INSERT INTO studio(name_studio) VALUES (:name_studio)";
        $queryAdd = $pdo->prepare($sql);
        $value = array(':name_studio'=>$_POST['name_studio']);
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
        echo "<a class='m-3 btn btn-outline-dark' href='TStudio.php'>Назад</a>";
    }

    if(isset($_POST['delete'])) {
        $sql = "DELETE FROM studio WHERE id=:id";
        $queryDelete = $pdo->prepare($sql);
        $value = array(':id'=>$_POST['selected']);
        //print_r($queryDelete);
        if($queryDelete->execute($value))
        {
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
        echo "<a class='m-3 btn btn-outline-dark' href='TStudio.php'>Назад</a>";
    }

    if(isset($_POST['edit'])) {
        $sql = "UPDATE studio SET name_studio = :name_studio WHERE id=:id";
        $queryEdit= $pdo->prepare($sql);
        $value = array(':name_studio'=>$_POST['name_studio'], ':id'=>$_POST['selected']);
        if($queryEdit->execute($value)) {
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
        echo "<a class='m-3 btn btn-outline-dark' href='TStudio.php'>Назад</a>";
    }
}

?>

<?php
include '../html/Footer.html';
?>



