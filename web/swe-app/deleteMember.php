<?php
require("../team-activities/dbconnect.php");
$db = get_db();
var_dump($_GET['id']);
// if (isset($_GET['id']))
if(isset($_GET['nameId'])){
    $id = $_GET['nameId'];
    $someQuery = $db->prepare("DELETE FROM member m WHERE m.id = :id");
    $someQuery->bindValue(":id", $id, PDO::PARAM_INT);
    $someQuery->execute();
    header('location: ./memberListView.php?membersRadio=allMembers');
    die();
}

if(isset($_GET['boardId'])){
    $id = $_GET['boardId'];
    $someQuery = $db->prepare('DELETE FROM ab_member b WHERE b.id = :boardId');
    $someQuery->bindValue(":boardId", $id, PDO::PARAM_INT);
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