<?php
    //header('Access-Control-Allow-Origin: *');
    //header('Access-Control-Allow-Methods: GET, POST');
    //header("Access-Control-Allow-Headers: X-Requested-With"); 
    $host = 'db';
    $user = 'devuser';
    $pass = 'devpass';
    $db = 'animedb';
    $charset = 'utf8';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
?>