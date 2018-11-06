<?php

require("../team-activities/dbconnect.php");
 $db = get_db();
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$password = htmlspecialchars($_POST['password']);
$username = htmlspecialchars($_POST['username']);
$position = htmlspecialchars($_POST['position']);
$exp_date = htmlspecialchars($_POST['exp_date']);
$hashpass = password_hash($password, PASSWORD_DEFAULT);

    $someQuery = $db->prepare('INSERT INTO ab_member (username, password, position, exp_date) VALUES
        (:username, :password, :position, :exp_date)');

    $someQuery->bindValue(":username", $username, PDO::PARAM_STR);
    $someQuery->bindValue(":password", $hashpass, PDO::PARAM_STR);
    $someQuery->bindValue(":position", $username, PDO::PARAM_STR);
    $someQuery->bindValue(":exp_date", $hashpass, PDO::PARAM_STR);

    $someQuery->execute();

   
    header("location: ./swe-signin.php");

?>