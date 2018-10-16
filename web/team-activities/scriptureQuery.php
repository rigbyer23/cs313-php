<?php
require("dbconnect.php")
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Scripture Study</title>
    </head>

    <body>
        <?php
        foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
        {
          echo '<b>'.$row['book'] ;
          echo ' '.$row['chapter'].':';
          echo $row['verse'].'</b>';
          echo ' -\"'.$row['content'].'\"';
        }
        ?>
    </body>


    </html>