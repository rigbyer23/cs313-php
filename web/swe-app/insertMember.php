<?php
require("./membersModol.php");

if(isset($_POST['addMember'])){
    $kind = $_POST['addMember'];
    $person = insertPeople($kind);    
}

if(isset($_POST['addBoard'])){
    $kind = $_POST['addBoard'];
    $person = insertPeople($kind);
}

if(isset($_POST['addSpeaker'])){
    $kind = $_POST['addSpeaker'];
    $person = insertPeople($kind);
}

?>