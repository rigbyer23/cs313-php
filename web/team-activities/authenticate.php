<?php
session_start();
 require("../team-activities/dbconnect.php");
 $db = get_db();
$password = $_POST['password'];
$username = $_POST['username'];

$query = $db->prepare('SELECT password FROM teamUser WHERE username = :username;');

$query->bindValue(':username', $username, PDO::PARAM_STR);
$query->execute();

$realPass = $query->fetch(PDO::FETCH_ASSOC);

 $_SESSION["username"] = $username;
 var_dump($_SESSION["username"]);
if (password_verify($password, $realPass['password'])){
    header('location: ./homepage.php');  
}

else{
    header('location: ./signin.php');
}


?>