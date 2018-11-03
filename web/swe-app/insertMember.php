<?php
require("./membersModol.php");

    $fname = htmlspecialchars($_POST['firstNcol']); 
    $lname = htmlspecialchars($_POST['secNcol']);
    $email = htmlspecialchars($_POST['emailCol']);
    $phone = htmlspecialchars($_POST['phoneCol']);
    $major = intval($_POST['majorCol']);

    $person = insertMember($fname, $lname, $email, $phone, $major);
   

    //insert AB member
     $position = htmlspecialchars($_POST['position']);
    $fname = htmlspecialchars($_POST['fName']);
    $lname = htmlspecialchars($_POST['lastName']);
    $bEmail = htmlspecialchars($_POST['email']);
    $bPhone = htmlspecialchars($_POST['phone']);
    $grad = htmlspecialchars($_POST['exp_date']);

    $bmember = insertBoardM($position, $fname, $lname, $bEmail, $bPhone, $grad);

    //insert speaker

    $fullName = htmlspecialchars($_POST['fullNcol']);
    $title = htmlspecialchars($_POST['titleCol']);
    $spEmail = htmlspecialchars($_POST['emailCol']);
    $sphone = htmlspecialchars($_POST['phoneCol']);

    $speaker = insertSpeaker($fullName,$title,$spEmail,$phone);

   


// if(isset($_POST['addBoard'])){
//     $kind = $_POST['addBoard'];
//     $person = insertPeople($kind);
// }

// if(isset($_POST['addSpeaker'])){
//     $kind = $_POST['addSpeaker'];
//     $person = insertPeople($kind);
// }
header('location: ./memberListView.php?membersRadio=allMembers');
?>