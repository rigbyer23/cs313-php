<?php
require("./membersModol.php");
if(isset($_POST['addMember'])){
 
    $fname = htmlspecialchars($_POST['firstNcol']);
      
    $lname = htmlspecialchars($_POST['secNcol']);
    var_dump($lname);
    $email = htmlspecialchars($_POST['emailCol']);
    $phone = htmlspecialchars($_POST['phoneCol']);
    $major = htmlspecialchars($_POST['majorCol']);

    $person = insertMember($fname, $lname, $email, $phone, $major);
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
//  header('location: ./memberListView.php?membersRadio=allMembers');
?>