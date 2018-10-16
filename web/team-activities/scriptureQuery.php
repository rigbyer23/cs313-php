<?php
require("dbconnect.php")
if(isset($_POST['book'])) {
    $book = $_POST['book'];
};
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Scripture Study</title>
    </head>

    <body>
    <h1>Scripture Resources</h1>
        <?php
        if(!isset($book)) {
            $query = 'SELECT book, chapter, verse, content FROM scriptures WHERE book = $book';
        } else {
            $query = 'SELECT book, chapter, verse, content FROM scriptures';
        }
        foreach ($db->query($query) as $row)
        {
          echo '<b>'.$row['book'] ;
          echo ' '.$row['chapter'].':';
          echo $row['verse'].'</b>';
          echo ' -"'.$row['content'].'"<br>';
        }
        ?>

        <form action="scriptureQuery.php" method="GET">
            Book: <input type="text" name="book"><br/>
            <input type="submit">
        </form>

        <?php

        ?>
    </body>


    </html>