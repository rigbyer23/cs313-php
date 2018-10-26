<?php
 require("dbconnect.php");
$db = get_db();
 
$query ='SELECT c.code, c.name, n.id AS note_id, n.content FROM note n JOIN course c ON n.course_id = c.id WHERE c.id=:course_id';

$stmt = $db->prepare($query);
$stmt->bindValue(':course_id', $course_id, PDO::PARAM_INT);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

$course_name = $notes[0]['name'];
$course_id = $notes[0]['code'];

?>

<html>
    <head>
    <title>Courses</title>
    </head>

        <body>
            <h1>Notes</h1>
            
            <ul>

            <?php
                foreach ($notes as $note){
                  $content = $note['content'];

                    echo "<p>$content</p>";
                }
            
            ?>
                
            </ul>



</html>