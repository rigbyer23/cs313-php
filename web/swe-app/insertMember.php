<?php
require("./membersModol.php");
var_dump($_POST['addMember']);
if(isset($_POST['addMember'])){
    $kind = $_POST['addMember'];
    var_dump($kind);
    $person = insertPeople($kind);
    var_dump($person); 
}

if(isset($_POST['addBoard'])){
    $kind = $_POST['addBoard'];
    $person = insertPeople($kind);
}

if(isset($_POST['addSpeaker'])){
    $kind = $_POST['addSpeaker'];
    $person = insertPeople($kind);
}
// header('location: ./memberListView.php');
?>