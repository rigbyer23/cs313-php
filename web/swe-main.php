<?php
//connect to db
require("./team-activities/dbconnect.php");
$db = get_db();
 if(isset($_GET['last_name']) && $_GET['last_name']!== '')
 {
    $last_name = $_GET['last_name'];
    $stmt = $db->prepare('SELECT first_name, last_name, email, phone, name FROM member m JOIN major ma ON m.major_id = ma.id WHERE last_name = :last_name');
    $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->execute();
    $member = $stmt->fetchAll();
}
else if(isset($_GET['see_all']))
{
    $stmt = $db->prepare('SELECT first_name, last_name, email, phone, name FROM member m JOIN major ma ON m.major_id = ma.id');
    $stmt->execute();
    $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

     if(isset($_GET['abm_last_name'])&& $_GET['abm_last_name']!== '')
 {
    $last_name = $_GET['abm_last_name'];
    $stmt = $db->prepare('SELECT position, first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id WHERE last_name = :abm_last_name');
    $stmt->bindValue(':abm_last_name', $last_name, PDO::PARAM_STR);
    $stmt->execute();
    $ab_member = $stmt->fetchAll();
  }

    else if(isset($_GET['see_all_abm']))
{
    $stmt = $db->prepare('SELECT position, first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id');
    $stmt->execute();
    $all_ab = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

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
                <input type="submit" name="see_all" value="See All">
                </form>

                <ul>
                <?php

                        foreach ($member as $row){
                           
                            echo $row['first_name'].' '.$row['last_name'].'<br>'.$row['email']. '<br>' .$row['phone'].'<br>'.$row['name'];
                        }

                         foreach ($all as $row){
                           
                            echo $row['first_name'].' '.$row['last_name'].'<br> '.$row['email']. '<br> '.$row['phone']. '<br>'. $row['name'].'<hr><br>';
                        }
                    ?>
                </ul>

                <form action="swe-main.php" method="GET">
                Advisory Board Members <input type="text" name="abm_last_name"><br/>
                <input type="submit" value="Search">
                <input type="submit" name="see_all_abm" value="See All">
                </form>
                <ul>
                <?php 
                    
                        foreach ($ab_member as $row){
                           
                            echo $row['position']. '<br>'. $row['first_name'].' '.$row['last_name'].'<br>'.$row['username']. '<br>'.$row['exp_date'] ;
                        }

                         foreach ($all_ab as $row){
                           
                            echo $row['position']. '<br>'. $row['first_name'].' '.$row['last_name'].'<br>'.$row['username']. '<br>'.$row['exp_date'] .'<hr><br>';
                        }
                ?>
                </ul>

                <form action="swe-main.php" method="GET">
                    Upcoming Speakers<input type="text" name="speaker"><br/>
                    <input type="submit" value="Search">
                    <input type="submit" name="see_all_speakers" value="See All">
                </form>
                <ul>
                  <?php 
                    
                        foreach ($speaker as $row){
                           
                            echo $row['full_name']. '<br>'. $row['title'].'<br>'.$row['email'].'<br>'.$row['phone'];
                        }
                         foreach ($all_speakers as $row){
                           
                            echo  $row['full_name']. '<br>'. $row['title'].'<br>'.$row['email'].'<br>'.$row['phone'].'<hr><br>';
                        }
                ?>
                </ul>
                
           



</html>

    