<?php
include '../vendor/autoload.php';

try {
    $pdo = new PDO('mysql:host=127.0.0.1:3307;dbname=myproduct', 'root', '');
    $fluent = new  \Envms\FluentPDO\Query($pdo);
} catch (PDOException $e) {
    echo $e->getMessage();
};
