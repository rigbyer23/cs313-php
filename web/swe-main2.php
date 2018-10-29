<?php
//connect to db
require("./team-activities/dbconnect.php");
$db = get_db();
//Search members
 if(isset($_GET['members']))
 {
     switch($_GET['members']){
        case 'allMembers':
           $stmt = $db->prepare('SELECT first_name, last_name, email, phone, name FROM member m JOIN major ma ON m.major_id = ma.id');
           $stmt->execute();
           $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
           break;
        case 'advb':
        $stmt = $db->prepare('SELECT position,first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id');
        $stmt->execute();
        $all_ab = $stmt->fetchAll(PDO::FETCH_ASSOC);
        break;
     }
}
//search speakers
 if(isset($_GET['speakers']))
 {
     switch($_GET['speakers']){
        case 'allMembers':
           $stmt = $db->prepare('SELECT first_name, last_name, email, phone, name FROM member m JOIN major ma ON m.major_id = ma.id');
           $stmt->execute();
           $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
           break;
        case 'advb':
        $stmt = $db->prepare('SELECT position,first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id');
        $stmt->execute();
        $all_ab = $stmt->fetchAll(PDO::FETCH_ASSOC);
        break;
     }
}


//Search Ab members
     if(isset($_GET['advb'])&& $_GET['advb']!== '')
 {
    $last_name = $_GET['advb'];
    $stmt = $db->prepare('SELECT position, first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id WHERE last_name = :abm_last_name');
    $stmt->bindValue(':advb', $last_name, PDO::PARAM_STR);
    $stmt->execute();
    $ab_member = $stmt->fetchAll();
  }

    else if(isset($_GET['see_all_abm']))
{
    $stmt = $db->prepare('SELECT position,first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id');
    $stmt->execute();
    $all_ab = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//Search speakers
     if(isset($_GET['speaker'])&& $_GET['speaker']!== '')
    {
        $full_name = $_GET['speaker'];
        $stmt = $db->prepare('SELECT full_name, title, email, phone FROM speaker WHERE full_name = :speaker');
        $stmt->bindValue(':speaker', $full_name, PDO::PARAM_STR);
        $stmt->execute();
        $speaker = $stmt->fetchAll();
    }

    else if(isset($_GET['see_all_speakers']))
    {
        $stmt = $db->prepare('SELECT * FROM speaker');
        $stmt->execute();
        $all_speakers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

?>

<html>
    <head>
    <title>SWE</title>
       <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex p-2" style="background-color: rgb(90, 82, 119);">
                      <div class="mr-auto p-2"><h1 style="font-family: 'Pacifico', cursive; color: white;">BYUI-SWE</h1></div>
                    <div class="p-2"><img class="img-responsive" style="object-fit: cover; height:40%; width:100%;" src="./swe-image.jpg"></div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>

            <div class="row d-flex justify-content-around">
                <div class="col-lg-4 p-2 h-75 d-inline-block" style="width: 300px; background-color: rgba(168,168,168)">
                <!-- //accordian -->
                    <div id="accordion" role="tablist">
                    <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Members
                        </a>
                     </h5>
                </div>
                
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-body">
                        <form action ="swe-main2.php" method="GET">
                            <div class="form-check">
                                <ul>
                                    <li><input class="form-check-input" name="members" value="allMembers" type="radio">
                                    All Members
                                    </li>
                                    <li> <input class="form-check-input" name="members" value="advb" type="radio">
                                    Advisory Board
                                    </li>
                                    <li> <input class="form-check-input" name="members" value="cs" type="radio">
                                    Computer Science
                                    </li>
                                    <li> <input class="form-check-input" name="members" value="se" type="radio">
                                    Software Engineering
                                    </li>
                                    <li> <input class="form-check-input" name="members" value="defaultCheck1" type="radio">
                                    Computer Information Technology
                                    </li>
                                </ul>
                                <input type="submit" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="accordion" role="tablist">
                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo">
                     <h5 class="mb-0">
                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Speakers
                        </a>
                     </h5>
                    </div>

                     <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-body">
                         <form action ="swe-main2.php" method="GET">
                            <div class="form-check">
                                <ul>
                                    <li><input class="form-check-input" name="speakers" value="defaultCheck1" type="radio">
                                    All Speakers
                                    </li>
                                    <li> <input class="form-check-input" name="speakers" value="defaultCheck1" type="radio">
                                    Previous
                                    </li>
                                    <li> <input class="form-check-input" name="speakers" value="defaultCheck1" type="radio">
                                    Potential
                                    </li>
                                </ul>
                                <input type="submit" value="Search">
                            </div>
                         </form>
                        </div>
                    </div>
                </div>

            <div id="accordion" role="tablist">
                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo">
                    <h5 class="mb-0">
                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Calendar
                        </a>
                    </h5>
                    </div>

                     <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-body">
                            <form action ="swe-main2.php" method="GET">
                                <div class="form-check">
                                    <ul>
                                        <li><input class="form-check-input" value="" id="defaultCheck1" type="radio">
                                        All Events
                                        </li>
                                        <li> <input class="form-check-input" value="" id="defaultCheck1" type="radio">
                                        Upcoming Events
                                        </li>
                                        <li> <input class="form-check-input" value="" id="defaultCheck1" type="radio">
                                        Past Events
                                        </li>
                                        <li> <input class="form-check-input" value="" id="defaultCheck1" type="radio">
                                        Tasks
                                        </li>
                                    </ul> 
                                    <input type="submit" value="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
            <div class="col-lg-7 p-2">
                <table class="table">
                    <?php

                            foreach ($member as $row){
                            
                                echo '<tr><td>'.$row['first_name'].'</td><td> '.$row['last_name'].'</td><td>'.$row['email']. '</td><td>' .$row['phone'].'</td><td>'.$row['name'].'</td></tr>';
                            }

                            foreach ($all as $row){
                            
                                echo '<tr><td>'.$row['first_name'].'</td><td> '.$row['last_name'].'</td><td> '.$row['email']. '</td><td>' .$row['phone']. '</td><td>'. $row['name'].'</td></tr>';
                            }
                            //ab member
                               foreach ($ab_member as $row){
                            
                                echo '<tr><td>'.$row['position']. '</td><td>'. $row['first_name'].'</td><td> '.$row['last_name'].'</td><td>'.$row['username']. '</td><td>'.$row['exp_date']. '</td></tr>' ;
                            }

                            foreach ($all_ab as $row){
                            
                                echo '<tr><td>'.$row['position']. '</td><td>'. $row['first_name'].'</td><td> '.$row['last_name'].'</td><td>'.$row['username']. '</td><td>'.$row['exp_date']. '</td></tr>' ;
                            }
                            //speaker
                            
                            foreach ($speaker as $row){
                            
                                echo  '<tr><td>'.$row['full_name']. '</td><td>'. $row['title'].'</td><td>'.$row['email'].'</td><td>'.$row['phone'].'</td></tr>';                               
                                }
                            foreach ($all_speakers as $row){
                            
                                echo  '<tr><td>'.$row['full_name']. '</td><td>'. $row['title'].'</td><td>'.$row['email'].'</td><td>'.$row['phone'].'</td></tr>';
                            }
                        ?> 
                 </table>
        </div>        

</html>

    