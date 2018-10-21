<?php
    require('dbconnect.php');
    if (isset($_POST['book']))
    {
        $book = $_POST['book'];
        $query = "SELECT book, chapter, verse, content FROM scriptures WHERE book = '$book'";
    }
    else {
        $query = 'SELECT book, chapter, verse, content FROM scriptures';
    }
?>
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>Scriptures</title>
    </head>
    <body>
        <main role="main">
            <h1>Scripture Resources</h1>
            <?php
                foreach ($db->query($query) as $row)
                {
                    echo '<b>'.$row['book'];
                    echo ' ' . $row['chapter'];
                    echo ':' . $row['verse'].'</b>';
                    echo ' - "' . $row['content'].'"';
                    echo '<br/>';
                }
            ?>
            <form action="scriptureQuery2.php" method="POST">
                Book: <input type="text" name="book">
                <input type="submit" value="Query">
            </form>
        </main>
    </body>
</html>