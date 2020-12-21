<?php
require 'home.php';
include '../html/Header.html';

$nameTable = $_POST['table'];
$queryNameCol = $pdo->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='animedb' AND TABLE_NAME='$nameTable';");
$queryNameCol->execute();
$NameCol_Array = $queryNameCol->fetchAll(PDO::FETCH_NUM);
$colname = array_map(function ($x){
    return $x[0];
},$NameCol_Array);


if(!empty($_POST)) {
    if(isset($_POST['add'])) {

        $id_index = array_search('id', $colname);
        if(is_int($id_index)) {
            unset($colname[$id_index]);
        }
        //unset($colname[array_search('id',$colname)]);
        $insert = array_map(function ($x) {
            return ':' . $x;
        }, $colname);
        $allcol = implode(',', $colname);
        $ins = implode(',', $insert);
        $values = [];
        foreach ($colname as $item) {
            $values[$item] = $_POST[$item];
        }

        $queryAdd = $pdo->prepare("INSERT INTO {$nameTable}({$allcol}) VALUES ({$ins})");
        //$queryAdd->execute($values);
        if($queryAdd->execute($values)) {
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
    }
    if(isset($_POST['delete'])) {
        $queryDelete = $pdo->prepare("DELETE FROM $nameTable WHERE id='{$_POST['selected']}'");
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
    }

    if(isset($_POST['edit'])) {
        $id_index = array_search('id', $colname);
        if(is_int($id_index)) {
            unset($colname[$id_index]);
        }
        //unset($colname[array_search('id',$colname)]);
        $insert = array_map(function ($x) {
            return "{$x}=:" . $x;
        }, $colname);
        $ins = implode(',', $insert);
        $values = [];
        foreach ($colname as $item) {
            $values[$item] = $_POST[$item];
        }
        $queryEdit = $pdo->prepare("UPDATE $nameTable SET {$ins} WHERE id='{$_POST['selected']}'");
        if($queryEdit->execute($values)) {
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
    }
}

?>

<?php
include '../html/Footer.html';
?>
