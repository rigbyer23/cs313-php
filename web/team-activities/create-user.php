
<?php
$password = htmlspecialchars($_POST['password']);
$hashpass = password_hash($password, PASSWORD_DEFAULT);

    $someQuery = $db->prepare('INSERT INTO user (username, password) VALUES
        (:username, :password)');

    $someQuery->bindValue(":username", $username, PDO::PARAM_STR);
    $someQuery->bindValue(":password", $hashpass, PDO::PARAM_STR);

    $someQuery->execute();

    header("./signin.php");

?>