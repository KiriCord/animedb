<?php
require 'home.php';
include '../html/Header.html';

//print_r($_POST);

if(!empty($_POST)) {
    if(isset($_POST['add'])) {
        $sql = "INSERT INTO the_character(first_name_char, second_name_char, alias) VALUES (:first_name_char, :second_name_char, :alias)";
        $queryAdd = $pdo->prepare($sql);
        $value = array(':first_name_char'=>$_POST['first_name_char'], ':second_name_char'=>$_POST['second_name_char'], ':alias'=>$_POST['alias']);
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
        echo "<a class='m-3 btn btn-outline-dark' href='TCharacter.php'>Назад</a>";
    }

    if(isset($_POST['delete'])) {
        $sql = "DELETE FROM author WHERE id=:id";
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
        echo "<a class='m-3 btn btn-outline-dark' href='TCharacter.php'>Назад</a>";
    }

    if(isset($_POST['edit'])) {
        $sql = "UPDATE the_character SET first_name_char = :first_name_char, second_name_char = :second_name_char, alias = :alias WHERE id=:id";
        $queryEdit= $pdo->prepare($sql);
        $value = array(':first_name_char'=>$_POST['first_name_char'], ':second_name_char'=>$_POST['second_name_char'], ':alias'=>$_POST['alias'], ':id'=>$_POST['selected']);
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
        echo "<a class='m-3 btn btn-outline-dark' href='TCharacter.php'>Назад</a>";
    }
}

?>

<?php
include '../html/Footer.html';
?>


