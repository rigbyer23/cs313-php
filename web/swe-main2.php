<?php
//connect to db
require("./team-activities/dbconnect.php");
$db = get_db();
//Search members
 if(isset($_GET['last_name']) && $_GET['last_name']!== '')
 {
    $last_name = $_GET['last_name'];
    $stmt = $db->prepare('SELECT first_name, last_name, email, phone, name FROM member m JOIN major ma ON m.major_id = ma.id WHERE last_name = :last_name');
    $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->execute();
    $member = $stmt->fetchAll();
}
else if(isset($_GET['see_all']))
{
    $stmt = $db->prepare('SELECT first_name, last_name, email, phone, name FROM member m JOIN major ma ON m.major_id = ma.id');
    $stmt->execute();
    $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    $stmt = $db->prepare('SELECT position, first_name, last_name, username, exp_date FROM member m JOIN ab_member am ON m.id = am.member_id');
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

            <div class="row">
               <div class="h-75 d-inline-block" style="width: 300px; background-color: rgba(168,168,168)">

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
                        <div class="form-check">
                        <ul>
                            <li><input class="form-check-input" value="" id="allMembers" type="checkbox">
                            All Members
                            </li>
                            <li> <input class="form-check-input" value="" id="advb" type="checkbox">
                            Advisory Board
                            </li>
                            <li> <input class="form-check-input" value="" id="cs" type="checkbox">
                            Computer Science
                            </li>
                            <li> <input class="form-check-input" value="" id="se" type="checkbox">
                            Software Engineering
                            </li>
                            <li> <input class="form-check-input" value="" id="defaultCheck1" type="checkbox">
                            Computer Information Technology
                            </li>
                        </ul>
                        </div>
                        
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
                            <div class="form-check">
                            <ul>
                                <li><input class="form-check-input" value="" id="defaultCheck1" type="checkbox">
                                All Speakers
                                </li>
                                <li> <input class="form-check-input" value="" id="defaultCheck1" type="checkbox">
                                Previous
                                </li>
                                <li> <input class="form-check-input" value="" id="defaultCheck1" type="checkbox">
                                Potential
                                </li>
                             </ul>
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
                            <div class="form-check">
                            <ul>
                                <li><input class="form-check-input" value="" id="defaultCheck1" type="checkbox">
                                All Events
                                </li>
                                <li> <input class="form-check-input" value="" id="defaultCheck1" type="checkbox">
                                Upcoming Events
                                </li>
                                <li> <input class="form-check-input" value="" id="defaultCheck1" type="checkbox">
                                Past Events
                                </li>
                                 <li> <input class="form-check-input" value="" id="defaultCheck1" type="checkbox">
                                Tasks
                                </li>
                             </ul>
                            </div>
                    </div>
                </div>
               </div>
                
                </div>
            </div>
            
            <div class="row">
            <div class="col-lg-4">
                <form action="swe-main.php" method="GET">
                Members (Enter last name) <input type="text" name="last_name"><br/>
                <input type="submit" value="Search">
                <input type="submit" name="see_all" value="See All">
                </form>

                <ul>
                <?php

                        foreach ($member as $row){
                           
                            echo $row['first_name'].' '.$row['last_name'].'<br>'.$row['email']. '<br>' .$row['phone'].'<br>'.$row['name'];
                        }

                         foreach ($all as $row){
                           
                            echo $row['first_name'].' '.$row['last_name'].'<br> '.$row['email']. '<br> '.$row['phone']. '<br>'. $row['name'].'<hr><br>';
                        }
                    ?>
                </ul>
            </div>
            </div>

            <div class="row">
                <div class ="col-lg-4">
                <form action="swe-main.php" method="GET">
                Advisory Board Members (Enter last name) <input type="text" name="abm_last_name"><br/>
                <input type="submit" value="Search">
                <input type="submit" name="see_all_abm" value="See All">
                </form>
                <ul>
                <?php 
                    
                        foreach ($ab_member as $row){
                           
                            echo $row['position']. '<br>'. $row['first_name'].' '.$row['last_name'].'<br>'.$row['username']. '<br>'.$row['exp_date'] ;
                        }

                         foreach ($all_ab as $row){
                           
                            echo $row['position']. '<br>'. $row['first_name'].' '.$row['last_name'].'<br>'.$row['username']. '<br>'.$row['exp_date'] .'<hr><br>';
                        }
                ?>
                </ul>
                </div>
            </div>

               
                <div class="row">
                    <div class ="col-lg-4">
                        <form action="swe-main2.php" method="GET">
                            Upcoming Speakers (Enter full name)<input type="text" name="speaker"><br/>
                            <input type="submit" value="Search">
                            <input type="submit" name="see_all_speakers" value="See All">
                        </form>
                            <table class="table">
                            <?php 
                                
                                    foreach ($speaker as $row){
                                    
                                        echo  '<tr><td>'.$row['full_name']. '</td><td>'. $row['title'].'</td><td>'.$row['email'].'</td><td>'.$row['phone'].'</td></tr>';                               
                                     }
                                    foreach ($all_speakers as $row){
                                    
                                        echo  '<tr><td>'.$row['full_name']. '</td><td>'. $row['title'].'</td><td>'.$row['email'].'</td><td>'.$row['phone'].'</td></tr>';
                                    }
                            ?>
                              </table>
                        
                    </div>
                </div>
        </div>

</html>

    