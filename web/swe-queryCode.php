<?php
require("./team-activities/dbconnect.php");
$db = get_db();
//Search members
function getData(){
    $gd = NULL;
if(isset($_GET['members']))
 {
     switch($_GET['members']){
        case 'allMembers':
           $stmt = $db->prepare('SELECT first_name, last_name, email, phone, name FROM member m JOIN major ma ON m.major_id = ma.id');
           $stmt->execute();
           $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
           break;
        case 'advb':
        $stmt = $db->prepare('SELECT position,first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id');
        $stmt->execute();
        $all_ab = $stmt->fetchAll(PDO::FETCH_ASSOC);
        break;
     }
}
//search speakers
 if(isset($_GET['speakers']))
 {
     switch($_GET['speakers']){
        case 'allMembers':
           $stmt = $db->prepare('SELECT first_name, last_name, email, phone, name FROM member m JOIN major ma ON m.major_id = ma.id');
           $stmt->execute();
           $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
           break;
        case 'advb':
        $stmt = $db->prepare('SELECT position,first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id');
        $stmt->execute();
        $all_ab = $stmt->fetchAll(PDO::FETCH_ASSOC);
        break;
     }
}


//Search Ab members
     if(isset($_GET['advb'])&& $_GET['advb']!== '')
 {
    $last_name = $_GET['advb'];
    $stmt = $db->prepare('SELECT position, first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id WHERE last_name = :abm_last_name');
    $stmt->bindValue(':advb', $last_name, PDO::PARAM_STR);
    $stmt->execute();
    $ab_member = $stmt->fetchAll();
  }

    else if(isset($_GET['see_all_abm']))
{
    $stmt = $db->prepare('SELECT position,first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id');
    $stmt->execute();
    $all_ab = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//Search speakers
     if(isset($_GET['speaker'])&& $_GET['speaker']!== '')
    {
        $full_name = $_GET['speaker'];
        $stmt = $db->prepare('SELECT full_name, title, email, phone FROM speaker WHERE full_name = :speaker');
        $stmt->bindValue(':speaker', $full_name, PDO::PARAM_STR);
        $stmt->execute();
        $speaker = $stmt->fetchAll();
    }

    else if(isset($_GET['see_all_speakers']))
    {
        $stmt = $db->prepare('SELECT * FROM speaker');
        $stmt->execute();
        $all_speakers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return $gd;
}
    ?>