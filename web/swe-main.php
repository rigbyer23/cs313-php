<?php
require("dbconnect.php");
if(isset($_GET['book'])) {
    $book = $_GET['book'];
};
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>BYU-I SWE Official App</title>
    </head>

    <body>
    <h1>Members</h1>
        <form action="swe-main.php" method="GET">
            Member <input type="text" name="book"><br/>
            <input type="submit">
        </form>

        <?php
            if(!isset($book)) {
                $query = 'SELECT book, chapter, verse, content FROM scriptures WHERE book = $book';
            } else {
                $query = 'SELECT book, chapter, verse, content FROM scriptures';
            };

            foreach ($db->query($query) as $row)
            {
            echo '<b>'.$row['book'] ;
            echo ' '.$row['chapter'].':';
            echo $row['verse'].'</b>';
            echo ' -"'.$row['content'].'"<br>';
            };
        ?>
    </body>


    </html>