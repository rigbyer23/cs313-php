<?php

require("../team-activities/dbconnect.php");
 $db = get_db();
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$major = intval($_POST['major_id']);
$position = htmlspecialchars($_POST['position']);
$exp_date = intval($_POST['exp_date']);
$password = htmlspecialchars($_POST['password']);
$username = htmlspecialchars($_POST['username']);
$hashpass = password_hash($password, PASSWORD_DEFAULT);

    $otherQuery = $db->prepare('INSERT INTO member(first_name, last_name, email, phone, major_id)VALUES(:first_name, :last_name, :email, :phone, :major_id)');
    $memberID = mysql_insert_id();
    var_dump($memberID);
    $someQuery = $db->prepare('INSERT INTO ab_member (username, password, position, exp_date) VALUES
        (:username, :password, :position, :exp_date)');
    
  
    $otherQuery->bindValue(":first_name", $firstName, PDO::PARAM_STR);
    $otherQuery->bindValue(":last_name", $lastName, PDO::PARAM_STR);
    $someQuery->bindValue(":username", $username, PDO::PARAM_STR);
    $otherQuery->bindValue(":major_id", $major, PDO::PARAM_INT);
    $someQuery->bindValue(":password", $hashpass, PDO::PARAM_STR);
    $someQuery->bindValue(":position", $position, PDO::PARAM_STR);
    $someQuery->bindValue(":exp_date", $exp_date, PDO::PARAM_INT);
    $otherQuery->bindValue(":email", $email, PDO::PARAM_STR);
    $otherQuery->bindValue(":phone", $phone, PDO::PARAM_STR);

    $otherQuery->execute(); 
    $someQuery->execute();
        

   
    // header("location: ./swe-signin.php");

?>