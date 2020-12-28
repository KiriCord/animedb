<?php
require '../home.php';

if(!empty($_GET)) {
    $id = $_GET['id'];
    $query = $pdo->prepare('SELECT * FROM author WHERE id=?');
    $query->execute([$id]);
    echo json_encode($query->fetchAll(PDO::FETCH_ASSOC)[0]);
}

