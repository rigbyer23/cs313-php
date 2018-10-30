 <?php
 
    function insertData(){
        $idta = NULL;
    $fname = $_POST['firstNcol'];
    $lname = $_POST['secNcol'];
    $email = $_POST['emailCol'];
    $phone = $_POST['phoneCol'];
    $major = $_POST['majorCol'];

    $someQuery = $db->prepare('INSERT INTO member(first_name, last_name, email, phone, major_id) VALUES
        (:fname, :lname, :email, :major)');

    $someQuery->bindValue(":fname", $fname);
    $someQuery->bindValue(":lname", $lname);
    $someQuery->bindValue(":email", $email);
    $someQuery->bindValue(":phone", $phone);
    $someQuery->bindValue(":major", $major);

    $someQuery->execute();

    $fullName = $_POST['fullNcol'];
    $title = $_POST['titleCol'];
    $spEmail = $_POST['emailCol'];
    $spPhone = $_POST['phoneCol'];


    $someQuery = $db->prepare('INSERT INTO speaker (full_name, title, email, phone) VALUES
        (:fullName, title, spEmail, spPhone)');

    $someQuery->bindValue(":fullName", $fullName);
    $someQuery->bindValue(":title", $title);
    $someQuery->bindValue(":spEmail", $spEmail);
    $someQuery->bindValue(":spPhone", $spPhone);

    $someQuery->execute();
    
    return $idta;
    }

    ?>
