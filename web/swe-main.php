<?php
//connect to db
require("./team-activities/dbconnect.php");
$db = get_db();
 if(isset($_GET['last_name']))
 {
    $last_name = $_GET['last_name'];
    $stmt = $db->prepare('SELECT first_name, last_name, email FROM member WHERE last_name = :last_name');
    $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->execute();
    };
?>

<html>
    <head>
    <title>SWE</title>
    </head>
         <body>
            <h1>Society of Women Engineers</h1>
                <form action="swe-main.php" method="GET">
                Members <input type="text" name="last_name"><br/>
                <input type="submit" value="Search">
                </form>

                <ul>
                <?php
                        foreach ($stmt->fetchAll() as $row){
                           
                            echo $row['first_name']. $row['last_name']. $row['email'];
                        }
                    ?>
                </ul>

                <form action="swe-main.php" method="GET">
                Advisory Board Members <input type="text" name="book"><br/>
                <input type="submit">
                </form>

                <form action="swe-main.php" method="GET">
                    Upcoming Speakers<input type="text" name="book"><br/>
                    <input type="submit">
                </form>
                
           



</html>

    