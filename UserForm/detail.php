<?php
session_start();
include 'Student.php';

$student = new Student();


if (!isset($_SESSION['user'])) {
    header("location: index.php");
    exit();
}

if (isset($_POST['signupSubmit'])) {
    $name = $_POST["signupusername"];
    $email = $_POST["signupemail"];
    $gender = $_POST["gender"];
    $class = $_POST["userclass"];
    $pwd = $_POST["signuppassword"];

    $add = $student->add($name, $email, $gender, $class, $pwd);
} else if (isset($_POST['login'])) {

    $name = $_POST['loginname'];
    $pwd = $_POST['loginpwd'];
    // $login = $student->login($name, $pwd);

    // if ($login) {
    echo 'login successfully';
    $st = $student->fetchSingleStudent($name);
    $name =  $st['name'];
    $name =  $_SESSION['user'];
    $email = $student->fetchSingleStudent($name)['email'];
    $gender = $student->fetchSingleStudent($name)['gender'];
    $class = $student->fetchSingleStudent($name)['class'];
    $pwd = $student->fetchSingleStudent($name)['password'];
    //}
}



?>


<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    Welcome <?php echo $name; ?><br>
    Your GENDER IS: <?php echo $gender; ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Class</th>
                <th scope="col">Gender</th>
                <th scope="col">Password</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $class; ?></td>
                <td><?php echo $gender; ?></td>
                <td><?php echo $pwd; ?></td>
            </tr>

        </tbody>
    </table>

    <?php
    // $psw = $_POST["signuppassword"];
    // $has = password_hash($psw, PASSWORD_DEFAULT);
    // echo $has;
    // if (password_verify($psw, $has)) {
    //     echo '<h1>Login in successfully</h1>';
    // }

    ?>

</body>

</html>