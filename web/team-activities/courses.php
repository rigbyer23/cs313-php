<?php
 require("dbconnect.php");
$db = get_db();
 
$query ='SELECT id, code, name FROM course';

$stmt = $db->prepare($query);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<html>
    <head>
    <title>Movies</title>
    </head>

        <body>
            <h1>Movies</h1>
            
            <ul>

            <?php
                foreach ($courses as $course){
                    $id = $course['id'];
                    $name = $course['name'];
                    $code = $course['code'];

                    echo "<li><p>$code - $name</p></li>\n";
                }
            
            ?>
                <li><p> CS 313 - Web II</p></li>
                <li><p> CS 313 - Web II</p></li>
                <li><p> CS 313 - Web II</p></li>
                <li><p> CS 313 - Web II</p></li>
            </ul>



</html>