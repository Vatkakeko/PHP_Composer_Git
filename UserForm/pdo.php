<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
//$name = $_POST["signupusername"];
try {
  $pdo = new PDO("mysql:host=$servername;dbname=myproduct", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully<br>";
} catch (PDOException $e) {
  //echo "Connection failed: " . $e->getMessage();
}



// $stm = $pdo->prepare("SELECT *FROM student");
// $stm->execute();
// $posts = $stm->fetchAll(PDO::FETCH_ASSOC);
// echo 'go to database';
// foreach ($posts as $post) {
//   echo $post['name'] . "<br>";
// }
