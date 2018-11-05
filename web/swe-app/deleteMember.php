<?php
require("../team-activities/dbconnect.php");
$db = get_db();
if(isset($_POST['deleteMember'])){
    $fname = ($_POST['firstNcol']); 
    $someQuery = $db->prepare('DELETE FROM member m WHERE m.member =' .$_POST['deleteMember']);

}

if(isset($_POST['deleteBoardM'])){
    
}

if(isset($_POST['deleteSpeaker'])){

    
}


?>