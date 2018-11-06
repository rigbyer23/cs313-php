<?php
require("../team-activities/dbconnect.php");
$db = get_db();
if(isset($_POST['Remove'])){ 
    var_dump($_POST['Remove']);
    $someQuery = $db->prepare('DELETE FROM member m WHERE m.id =' .$_POST['deleteMember']);
    echo $someQuery;
    $someQuery->execute();
     header('location: ./memberListView.php?membersRadio=allMembers');
}

// if(isset($_POST['deleteBoardM'])){
    
// }

// if(isset($_POST['deleteSpeaker'])){

    
// }


?>