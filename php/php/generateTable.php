<?php
require 'home.php';
include '../html/Header.html';
?>
<div class="m-3 p-1 tableSelectContainer">
    <form method="POST" action="./queryHandler.php">
    <?php
    if (isset($_POST['selTable'])) {
        $nameTable = $_POST['selTable'];
        echo "<input type='hidden' name='table' value='{$nameTable}'>";
        $queryNameCol = $pdo->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='animedb' AND TABLE_NAME='$nameTable';");
        $queryNameCol->execute();
        $NameCol_Array = $queryNameCol->fetchAll(PDO::FETCH_NUM);
        $colname = array_map(function ($x){
            return $x[0];
        },$NameCol_Array);
        $table = "<table id='table' class='table table-hover table-sm p-2 fixTable'><tr>";
        $table .= "<th>-</th>";
        foreach ($colname as $rt) {
            $table .= "<th>$rt</th>";
        }
        $table .= "</tr>";
        echo $table;

        $queryTable = $pdo->prepare("SELECT * FROM $nameTable;");
        $queryTable->execute();
        $result_array = $queryTable->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result_array as $res) {
            echo '<tr>';
            echo "<td><input type='radio' name='selected' value='{$res['id']}'></td>";
            foreach ($colname as $rt) {
                echo "<td>" . $res[$rt] . "</td>";
            }
            echo '</tr>';
        }
        echo "</table>";
    }
    ?>
        <div class="m-3 p-1 workdbdiv">
            <h5 class="m-2"> Добавление, изменение и удаление данных в БД</h5>
            <div style="display: flex; flex-direction: column;">
                <?php
                foreach ($colname as $rt) {
                    if ($rt == "id") {
                        continue;
                    }
                    //echo "<h5 class='m-2'>$rt[0]</h5>";
                    echo "<div class='textbox'>";
                    echo "<label class='m-2 lablebox'>$rt </label><input class='m-2' type='text' name='$rt'/>";
                    echo "</div>";
                }

                ?>
                <div>
                    <button type="submit" name="add" class="m-2 btn btn-light" >Добавить</button>
                    <button type="submit" name="edit" class="m-2 btn btn-light">Изменить всё</button>
                    <button type="submit" name="delete" class="m-2 btn btn-danger">Удалить</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
include '../html/Footer.html';
?>
