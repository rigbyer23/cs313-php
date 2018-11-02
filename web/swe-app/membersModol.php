<?php

require("../team-activities/dbconnect.php");
    $db = get_db();
    $members = NULL;
//One function to rule them all
function getMembers($type){
    // var_dump($type);
        if($type == 'allMembers'){
            $members = getAllMembers();
        }
        else if($type == 'boardMembers'){
            $members = getBoardMembers();
        }
        else {
            $members = getSpeakers();
        }
            return $members;   
        }
        




function getAllMembers(){
       $stmt = $db->prepare('SELECT first_name, last_name, email, phone, abbr FROM member m JOIN major ma ON m.major_id = ma.id');
        $stmt->execute();
        $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

function getBoardMembers(){
        $stmt = $db->prepare('SELECT position,first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id');
        $stmt->execute();
        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getSpeakers(){
        $stmt = $db->prepare('SELECT full_name, title, email, phone FROM speaker');
        $stmt->execute();
        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// function insertMember(){

//      $someQuery = $db->prepare('INSERT INTO member(first_name, last_name, email, phone, major_id) VALUES
//         (:fname, :lname, :email, :major)');

//     $someQuery->bindValue(":fname", $fname);
//     $someQuery->bindValue(":lname", $lname);
//     $someQuery->bindValue(":email", $email);
//     $someQuery->bindValue(":phone", $phone);
//     $someQuery->bindValue(":major", $major);

//     $someQuery->execute();

// }


    