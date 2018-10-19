<?php
//connect to db
require("dbconnect.php");
$db = get_db();
$stmt = $db->prepare('SELECT id, title, year FROM movie');
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

//query for all the movies

//

?>

<html>
    <head>
    <title>Movies</title>
    </head>

        <body>
            <h1>Movies</h1>
            
            <ul>
            <?php
                foreach ($movies as $movie){
                    $title =$movie['title'];
                    $year = $movie['year'];
                    echo "<li><p>$title ($year)></p></li>";
                }
            ?>
            </ul>



</html>