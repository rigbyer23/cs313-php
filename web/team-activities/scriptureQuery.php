<?php
require("dbconnect.php");
if(isset($_GET['book'])) {
    $book = $_GET['book'];
};
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Scripture Study</title>
    </head>

    <body>
    <h1>Scripture Resources</h1>
        <form action="scriptureQuery.php" method="GET">
            Book: <input type="text" name="book"><br/>
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