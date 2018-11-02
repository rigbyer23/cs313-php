<?php

require("../team-activities/dbconnect.php");
   
    // var_dump($db);


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
            return  getSpeakers();
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
        $stmt = $db->prepare('SELECT position, first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id');
        $stmt->execute();
        $all_ab = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $all_ab;
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


    