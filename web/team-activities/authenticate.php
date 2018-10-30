<?php
$password = $_POST['password'];
$username = $_POST['username'];

$query = $db->prepare('SELECT password FROM user WHERE username = $username;');
password_verify($password);


?>