 <?php
   
        $idta = NULL;
    $fname = $_POST['firstNcol'];
    $lname = $_POST['secNcol'];
    $email = $_POST['emailCol'];
    $phone = $_POST['phoneCol'];
    $major = $_POST['majorCol'];

   insertMember($fname, $lname, $email, $phone, $major);

    
    header("location: ./memberListView.php");
    ?>
