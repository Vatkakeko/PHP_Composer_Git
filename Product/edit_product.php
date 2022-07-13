<?php
session_start();
include 'fluent_db.php';

$id = $_POST['product_id'];
$pd_name = $_POST['edit_product_name'];
$pd_amount = $_POST['edit_product_amount'];
$pd_price = $_POST['edit_product_price'];

$set = array('pd_name' => $pd_name, 'user_id' => $_SESSION['user'], 'pd_amount' => $pd_amount, 'pd_price' => $pd_price);

$query = $fluent->update('product')->set($set)->where('id', $id)->execute();
























$findUserQuery = $fluent->from('user')->where('name', $_POST['loginname']);

foreach ($findUserQuery as $row) {
    $user_id = $row['id'];
}

$set = array('user_id' => $user_id);
$query = $fluent->update('product')->set($set)->where('id', $id)->execute();
