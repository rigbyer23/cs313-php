<?php
 require("./dbconnect.php");
 $db = get_db();
$password = $_POST['password'];
$username = $_POST['username'];

$query = $db->prepare('SELECT password FROM teamUser WHERE username = :username;');

$query->bindValue(':username', $username, PDO::PARAM_STR);
$query->execute();

$realPass = $query->fetch(PDO::FETCH_ASSOC);

var_dump($realPass);

if (password_verify($password, $realPass['password'])){
    
}


?>