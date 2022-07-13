<?php
include_once 'fluent_db.php';

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $query = $fluent->deleteFrom('product')->where('id', $id)->execute();
}
