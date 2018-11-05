<?php

require("../team-activities/dbconnect.php");
   
//One function to rule them all
function getMembers($type){
    // var_dump($type);
        if($type == 'allMembers'){
            return getAllMembers();
        }
        else if($type == 'boardMembers'){
           return getBoardMembers();
        }
        else {
            return getSpeakers();
        }   
    }

function getAllMembers(){
     $db = get_db();
    // var_dump($db);
       $stmt = $db->prepare('SELECT first_name, last_name, email, phone, abbr FROM member m JOIN major ma ON m.major_id = ma.id');
        $stmt->execute();
        $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $all;    
    }

function getBoardMembers(){
     $db = get_db();
        $stmt = $db->prepare('SELECT position, first_name, last_name, username, phone, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id');
        $stmt->execute();
        $all_ab = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $all_ab;
}

function getSpeakers(){
    $db = get_db();
        $stmt = $db->prepare('SELECT full_name, title, email, phone FROM speaker');
        $stmt->execute();
        $speakers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $speakers;
}

//rule them all
//One function to rule them all
// function insertPeople($kind){
//     // var_dump($type);
//         if($kind == 'firstNcol'){
//             return insertMember();
//         }
//         else if($kind == 'position'){
//            return insertBoardM();
//         }
//         else {
//             return insertSpeakers();
//         }   
//     }
 //repeat what I did before

function insertMember($fname, $lname, $email, $phone, $major){
      $db = get_db();
     $someQuery = $db->prepare('INSERT INTO member(first_name, last_name, email, phone, major_id) VALUES
        (:fname, :lname, :email, :phone, :major)');

    $someQuery->bindValue(":fname", $fname);
    $someQuery->bindValue(":lname", $lname);
    $someQuery->bindValue(":email", $email);
    $someQuery->bindValue(":phone", $phone);
    $someQuery->bindValue(":major", $major);

    $someQuery->execute();

}

    
function insertBoardM($position, $fname, $lname, $email, $phone, $grad){
      $db = get_db();

     $someQuery = $db->prepare('INSERT INTO member(position, first_name, last_name, email, phone, exp_date) VALUES
        (:position,:fname, :lname, :email, :phone, :expDate)');

    $someQuery->bindValue(":position", $position);
    $someQuery->bindValue(":fname", $fname);
    $someQuery->bindValue(":lname", $lname);
    $someQuery->bindValue(":email", $email);
    $someQuery->bindValue(":phone", $phone);
    $someQuery->bindValue(":expDate", $grad);

    $someQuery->execute();

}

function insertSpeaker($fullName,$title,$spEmail,$sphone){
      $db = get_db();
     $someQuery = $db->prepare('INSERT INTO member(full_name, title, email, phone) VALUES
        (:fullname, :title, :email, :phone');

    $someQuery->bindValue(":fullname", $fullName);
    $someQuery->bindValue(":title", $title);
    $someQuery->bindValue(":email", $spEmail);
    $someQuery->bindValue(":phone", $sphone);
try{
    $someQuery->execute();

}

catch(Exception $E){
    echo $E;
}
    
}
