<?php
session_start();
require_once 'fluent_db.php';
//add action to add product in php by button\
$product_name = $_POST['product_name'];
$product_amount = $_POST['product_amount'];
$product_price = $_POST['product_price'];



$query = $fluent->insertInto('product')
    ->values(array('pd_name' => $product_name, 'user_id' => $_SESSION['user'], 'pd_amount' => $product_amount, 'pd_price' => $product_price));
$query->execute();
