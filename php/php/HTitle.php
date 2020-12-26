<?php
require 'home.php';
include '../html/Header.html';

//print_r($_POST);

if(!empty($_POST)) {
    if(isset($_POST['add'])) {
        $sql = "INSERT INTO titles(title, date_of_creation, episode_count, rating, exit_status, id_studio, id_author) 
                                    VALUES (:title, :date_of_creation, :episode_count, :rating, :exit_status, :id_studio, :id_author)";
        $queryAdd = $pdo->prepare($sql);
        $value = array(':title'=>$_POST['title'],
                        ':date_of_creation'=>$_POST['date_of_creation'],
                        ':episode_count'=>$_POST['episode_count'],
                        ':rating'=>$_POST['rating'],
                        ':exit_status'=>$_POST['exit_status'],
                        ':id_studio'=>$_POST['id_studio'],
                        ':id_author'=>$_POST['id_author']);
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
        echo "<a class='m-3 btn btn-outline-dark' href='TTitle.php'>Назад</a>";
    }

    if(isset($_POST['delete'])) {
        $sql = "DELETE FROM titles WHERE id=:id";
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
        echo "<a class='m-3 btn btn-outline-dark' href='TTitle.php'>Назад</a>";
    }

    if(isset($_POST['edit'])) {

        $sql = "UPDATE titles 
                SET title = :title, 
                    date_of_creation = :date_of_creation, 
                    episode_count = :episode_count, 
                    rating = :rating, 
                    exit_status = :exit_status, 
                    id_studio = :id_studio, 
                    id_author = :id_author WHERE id=:id";
        $queryEdit= $pdo->prepare($sql);
        $value = array(':title'=>$_POST['title'],
            ':date_of_creation'=>$_POST['date_of_creation'],
            ':episode_count'=>$_POST['episode_count'],
            ':rating'=>$_POST['rating'],
            ':exit_status'=>$_POST['exit_status'],
            ':id_studio'=>$_POST['id_studio'],
            ':id_author'=>$_POST['id_author'],
            ':id'=>$_POST['selected']);
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
        echo "<a class='m-3 btn btn-outline-dark' href='TTitle.php'>Назад</a>";
    }
}

?>

<?php
include '../html/Footer.html';
?>



