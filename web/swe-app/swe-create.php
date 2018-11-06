<?php

require("../team-activities/dbconnect.php");
 $db = get_db();
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$position = htmlspecialchars($_POST['position']);
$exp_date = htmlspecialchars($_POST['exp_date']);
$password = htmlspecialchars($_POST['password']);
$username = htmlspecialchars($_POST['username']);
$hashpass = password_hash($password, PASSWORD_DEFAULT);

    $someQuery = $db->prepare('INSERT INTO ab_member (username, password, position, exp_date) VALUES
        (:username, :password, :position, :exp_date)');
    $otherQuery = $db->prepare('INSERT INTO member(first_name, last_name, email, phone,)VALUES(:first_name, :last_name, :email, :phone)');
    var_dump($firstName);
    var_dump($lastName);
    var_dump($email);
    var_dump($phone);
    var_dump($position);
    var_dump($exp_date);
    var_dump($username);
    var_dump($password);
    var_dump($hashpass);
    $otherQuery->bindValue(":first_name", $firstName, PDO::PARAM_STR);
    $otherQuery->bindValue(":last_name", $lastName, PDO::PARAM_STR);
    $someQuery->bindValue(":username", $username, PDO::PARAM_STR);
    $someQuery->bindValue(":password", $hashpass, PDO::PARAM_STR);
    $someQuery->bindValue(":position", $position, PDO::PARAM_STR);
    $someQuery->bindValue(":exp_date", $exp_date, PDO::PARAM_STR);
    $otherQuery->bindValue(":email", $email, PDO::PARAM_STR);
    $otherQuery->bindValue(":phone", $phone, PDO::PARAM_STR);

    $someQuery->execute();
    $otherQuery->execute();     

   
    header("location: ./swe-signin.php");

?>