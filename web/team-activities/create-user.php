
<?php
session_start();
 require("./dbconnect.php");
 $db = get_db();
$password = htmlspecialchars($_POST['password']);
$username = htmlspecialchars($_POST['username']);
$hashpass = password_hash($password, PASSWORD_DEFAULT);

    $someQuery = $db->prepare('INSERT INTO teamUser (username, password) VALUES
        (:username, :password)');

    $someQuery->bindValue(":username", $username, PDO::PARAM_STR);
    $someQuery->bindValue(":password", $hashpass, PDO::PARAM_STR);

    $someQuery->execute();


    $_SESSION["user"] = $username;
   
    header("location: ./signin.php");

?>