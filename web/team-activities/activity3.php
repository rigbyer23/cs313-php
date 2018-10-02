<html lang="en">
    <head>
      
    </head>
<body>

    <?php 

    $majors = array("CS", "CIT", "WDD", "CE");

    ?>

   <form action="results.php" method="post">
      Name: <input type="text" name="firstName"><br>
      Email: <input type="email" name="email"><br>
      Major: Computer Science <input type="radio" name ="major" value="Computer Science"><br>
       Web Design and Development <input type="radio" name ="major" value="Computer Science"><br>
       Computer Information Tchnology <input type="radio" name ="major" value="Computer Science"><br>
       Computer Engineering <input type="radio" name ="major" value="Computer Science"><br>

       <textarea rows="4" cols="50" name="comment"></textarea>

       North America: <input type="checkbox" name="continent[]" value="North America">
       South America: <input type="checkbox" name="continent[]" value="South America">
       Europe: <input type="checkbox" name="continent[]" value="Europe">
       Asia: <input type="checkbox" name="continent[]" value="Asia">
       Australia: <input type="checkbox" name="continent[]" value="Australia">
       Africa: <input type="checkbox" name="continent[]" value="Africa">
       Antarctica: <input type="checkbox" name="continent[]" value="Antarctica">
       
        <br /><br />
        <?php
            for ($x = 0; $x <= sizeof($majors); $x++) {
                echo $majors[x] . " <input type='radio' name ='major' value='" . $majors[x] . "'>";
            }
        ?>


       <input type="submit">

   </form>
</body>
</html>