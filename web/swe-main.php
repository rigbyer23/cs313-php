<?php
//connect to db
require("./team-activities/dbconnect.php");
$db = get_db();
?>

<html>
    <head>
    <title>SWE</title>
    </head>
         <body>
            <h1>Society of Women Engineers</h1>
                <form action="swe-main.php" method="GET">
                Members <input type="text" name="member"><br/>
                 <ul>
                    <?php
                    if(isset($member)) {
                        $stmt = $db->prepare('SELECT first_name, last_name, email FROM member WHERE last_name = $last_name');
                        $stmt->execute();
                        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
                         } else {
                         
                        };

                        foreach ($members as $member){
                            $first_name =$member['first_name'];
                            $last_name = $member['last_name'];
                            $email = $member['email'];
                            echo "<li><p>$first_name $last_name $email</p></li>";
                        }
                    ?>
                </ul>
                <input type="submit">
                </form>

                <form action="swe-main.php" method="GET">
                Advisory Board Members <input type="text" name="book"><br/>
                <input type="submit">
                </form>

                <form action="swe-main.php" method="GET">
                    Upcoming Speakers<input type="text" name="book"><br/>
                    <input type="submit">
                </form>
                
           



</html>

    