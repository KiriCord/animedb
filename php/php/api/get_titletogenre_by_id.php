<?php
require '../home.php';

if(!empty($_GET)) {
    $id = $_GET['id'];
    $query = $pdo->prepare('SELECT * FROM title_to_genre WHERE id=?');
    $query->execute([$id]);
    echo json_encode($query->fetchAll(PDO::FETCH_ASSOC)[0]);
}
