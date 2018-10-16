<?php
require("dbconnect.php")
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Scripture Study</title>
    </head>

    <body>
    <h1>Scripture Resources</h1>
        <?php
        foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
        {
          echo '<b>'.$row['book'] ;
          echo ' '.$row['chapter'].':';
          echo $row['verse'].'</b>';
          echo ' -"'.$row['content'].'"<br>';
        }
        ?>
    </body>


    </html>