<?php
require 'home.php';
include '../html/Header.html';

//print_r($_POST);

if(!empty($_POST)) {
    if(isset($_POST['add'])) {
        $sql = "INSERT INTO author(first_name, second_name, DOB) VALUES (:first_name, :second_name, :DOB)";
        $queryAdd = $pdo->prepare($sql);
        $value = array(':first_name'=>$_POST['first_name'], ':second_name'=>$_POST['second_name'], ':DOB'=>$_POST['DOB']);
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
        echo "<a class='m-3 btn btn-outline-dark' href='TAuthor.php'>Назад</a>";
    }

    if(isset($_POST['delete'])) {
        $sql = "DELETE FROM author WHERE id='{$_POST['selected']}'";
        $queryDelete = $pdo->prepare($sql);
        //print_r($queryDelete);
        if($queryDelete->execute())
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
        echo "<a class='m-3 btn btn-outline-dark' href='TAuthor.php'>Назад</a>";
    }

        if(isset($_POST['edit'])) {
            $sql = "UPDATE author SET first_name = :first_name, second_name = :second_name, DOB = :DOB WHERE id='{$_POST['selected']}'";
            $queryEdit= $pdo->prepare($sql);
            $value = array(':first_name'=>$_POST['first_name'], ':second_name'=>$_POST['second_name'], ':DOB'=>$_POST['DOB']);
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
            echo "<a class='m-3 btn btn-outline-dark' href='TAuthor.php'>Назад</a>";
        }
}

?>

<?php
include '../html/Footer.html';
?>

