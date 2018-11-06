<?php
require("../team-activities/dbconnect.php");
$db = get_db();

var_dump($_POST[$id]);
if(isset($_POST[$id])){ 
    $someQuery = $db->prepare("DELETE FROM member m WHERE m.id ='$id'");
    $someQuery->execute();
     header('location: ./memberListView.php?membersRadio=allMembers');
}

if(isset($_POST['deleteBoardM'])){
     var_dump($_POST['deleteBoardM']);
    $someQuery = $db->prepare('DELETE FROM member m WHERE m.id =' .$_POST['deleteBoardM']);
    echo $someQuery;
    $someQuery->execute();
     header('location: ./memberListView.php?membersRadio=boardMembers');
}
    
if(isset($_POST['deleteSpeaker'])){
     var_dump($_POST['deleteSpeaker']);
    $someQuery = $db->prepare('DELETE FROM member m WHERE m.id =' .$_POST['deleteSpeaker']);
    echo $someQuery;
    $someQuery->execute();
     header('location: ./memberListView.php?membersRadio=allSpeakers');
}
?>