<?php
require './php/home.php';
include './html/Header.html';
?>
                <form method="POST" action="php/generateTable.php">
                    <div class="formSelTab">
                            <select class="p-1 m-2 tableSelect form-control" name="selTable">
                                <option disabled selected>Выберите таблицу</option>
                                <?php
                                $queryNameTable = $pdo->prepare("SELECT TABLE_NAME FROM information_schema.tables WHERE table_schema = 'animedb';");
                                $queryNameTable->execute();
                                while ($row = $queryNameTable->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<option value="' . $row['TABLE_NAME'] . '">' . $row['TABLE_NAME'] . '</option>';
                                }
                                ?>
                            </select>
                            <input type="submit" name="inpTable" class="m-2 btn btn-light" value="Выбрать таблицу">
                    </div>
                </form>
<?php
    include './html/Footer.html';
?>