<?php
include 'pdo.php';

class Student
{

    private $id;
    private $name;
    private $email;
    private $gender;
    private $class;
    private $pwd;
    public $error;


    public function __construct()
    {
        $this->id = null;
        $this->name = null;
    }

    public function getID()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }


    public function add(string $name, string $email, string $gender, string $class, string $pwd): int
    {
        global $pdo;

        $sql = 'INSERT INTO user(name, email, gender, class, password) VALUES (:name, :email, :gender, :class, :password)';

        $stminsert = $pdo->prepare("INSERT INTO user(name) VALUES (:name)");
        // $name = $_POST["signupusername"];
        // $email = $_POST["signupemail"];
        // $gender = $_POST["gender"];
        // $class = $_POST["userclass"];
        // $pwd = $_POST["signuppassword"];
        $hash = password_hash($pwd, PASSWORD_DEFAULT);
        $values = array(
            ':name' => $name,
            ':email' => $email,
            ':gender' => $gender,
            ':class' => $class,
            ':password' => $hash

        );
        $stminsert = $pdo->prepare($sql);
        $stminsert->execute($values);

        return $pdo->lastInsertId();
    }

    public function login(string $name, string $pwd)
    {


        global $pdo;
        $sql = 'SELECT *FROM user WHERE (name = :name)';
        $res = $pdo->prepare($sql);
        $res->execute([':name' => $name]);


        $row = $res->fetch(PDO::FETCH_ASSOC);
        if (is_array($row)) {
            if (password_verify($pwd, $row['password'])) {
                session_start();

                $_SESSION['user'] = $row['id'];


                header("location: ../Product/index.php");
                exit();
            }
        }
        return $this->error = "Wrong username or password";
    }

    public function fetchSingleStudent(string $name)
    {
        global $pdo;
        $sql = 'SELECT *FROM user where (name = :name)';
        $res = $pdo->prepare($sql);
        $res->execute([':name' => $name]);

        $row = $res->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
}
