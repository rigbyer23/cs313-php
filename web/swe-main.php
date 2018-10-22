<?php
//connect to db
require("./team-activities/dbconnect.php");
$db = get_db();
 if(isset($_GET['last_name']))
 {
    $last_name = $_GET['last_name'];
    $stmt = $db->prepare('SELECT first_name, last_name, email, abbr FROM member m JOIN major ma ON m.major_id = ma.id WHERE last_name = :last_name');
    $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->execute();
    $member = $stmt->fetchAll();
    };

     if(isset($_GET['abm_last_name']))
 {
    $last_name = $_GET['abm_last_name'];
    $stmt = $db->prepare('SELECT position, first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id WHERE last_name = :abm_last_name');
    $stmt->bindValue(':abm_last_name', $last_name, PDO::PARAM_STR);
    $stmt->execute();
    $ab_member = $stmt->fetchAll();
    };
?>

<html>
    <head>
    <title>SWE</title>
    </head>
         <body>
            <h1>Society of Women Engineers</h1>
                <form action="swe-main.php" method="GET">
                Members (Enter last name) <input type="text" name="last_name"><br/>
                <input type="submit" value="Search">
                </form>

                <ul>
                <?php

                        foreach ($member as $row){
                           
                            echo $row['first_name'].' '.$row['last_name'].' '.$row['email']. ' '.$row['abbr'];
                        }

                        foreach ($ab_member as $row){
                           
                            echo $row['position']. ' '. $row['first_name'].' '.$row['last_name'].' '.$row['username']. ' '.$row['exp_date'];
                        }
                    ?>
                </ul>

                <form action="swe-main.php" method="GET">
                Advisory Board Members <input type="text" name="abm_last_name"><br/>
                <input type="submit" value="Search">
                </form>

                <form action="swe-main.php" method="GET">
                    Upcoming Speakers<input type="text" name="book"><br/>
                    <input type="submit">
                </form>
                
           



</html>

    