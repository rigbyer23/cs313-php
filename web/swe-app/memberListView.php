<?php
require("./membersModol.php");
if (isset($_GET['membersRadio'])){
$type = $_GET['membersRadio'];
$members = getMembers($type);
}
if (isset($_GET['speakers'])){
$type = $_GET['speakers'];
$members = getMembers($type);
}

//insert member
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
            <div class="row d-flex">
                <div class="col-lg-3 p-2 h-95 d-inline-block d-inline-flex p-2" style="width: 300px; background-color: rgba(168,168,168)">
                <!-- //accordian -->
                    <div id="accordion" role="tablist" style="width: 100%;">
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
                        <form action ="memberListView.php" method="GET">
                            <div class="form-check">
                                <ul>
                                    <li><input class="form-check-input" name="membersRadio" value="allMembers" type="radio">
                                    All Members
                                    </li>
                                    <li> <input class="form-check-input" name="membersRadio" value="boardMembers" type="radio">
                                    Advisory Board
                                    </li>
                                    <li> <input class="form-check-input" name="membersRadio" value="cs" type="radio">
                                    Computer Science (CS)
                                    </li>
                                    <li> <input class="form-check-input" name="membersRadio" value="se" type="radio">
                                    Software Engineering(SE)
                                    </li>
                                    <li> <input class="form-check-input" name="membersRadio" value="defaultCheck1" type="radio">
                                    Computer Information Technology(CIT)
                                    </li>
                                </ul>
                                <input type="submit" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="accordion" role="tablist" style="width: 100%;">
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
                         <form action ="memberListView.php" method="GET">
                            <div class="form-check">
                                <ul>
                                    <li><input class="form-check-input" name="speakers" value="allSpeakers" type="radio">
                                    All Speakers
                                    </li>
                                    <li> <input class="form-check-input" name="speakers" value="previous" type="radio">
                                    Previous
                                    </li>
                                    <li> <input class="form-check-input" name="speakers" value="potential" type="radio">
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
                            <form action ="memberListView.php" method="GET">
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
</div>
            
            <div class="col-lg-9 d-inline-flex p-2 flex-column">
            <form class="p-2" action="./memberListView.php" method="post">
                <table class="table">
                    <?php
                            foreach ($members as $member){
                                if($type == 'allMembers'){
                                echo '<tr><td>'.$member['first_name'].'</td><td> '.$member['last_name'].'</td><td> '.$member['email']. '</td><td>' .$member['phone']. '</td><td>'. $member['abbr'].'</td></tr>';
                                }

                                else if ($type == 'boardMembers'){
                                    
                                echo '<tr><td>'.$member['position']. '</td><td>'. $member['first_name'].'</td><td> '.$member['last_name'].'</td><td>'.$member['username']. '</td><td>'.$member['phone']. '</td><td>'.$member['exp_date']. '</td></tr>' ;
                                }
                                
                                if(isset($_GET['speakers'])) {
                                     echo  '<tr><td>'.$member['full_name']. '</td><td>'. $member['title'].'</td><td>'.$member['email'].'</td><td>'.$member['phone'].'</td></tr>';
                                }
                            }    
                            ?>
                            </table>
                            </form>

                <form class="p-2" action="./insertMember.php" method ="get" style ="flex-direction:column;"> 
                     <table class="table">
                            <?php
                                if($type == 'allMembers'){
                                 echo '<tr><td><input style="width:127px;" type="text" name="firstNcol"></td><td><input style="width:127px;" type="text" name="secNcol"></td><td><input style="width:127px;" type="text" name="emailCol"></td><td><input style="width:127px;" type="text" name="phoneCol"></td><td><input style="width:127px;" type="text" name="majorCol"></td></tr><tr><td><input style="width:127px;" type="submit" value="addMember"></td></tr>';
                             }

                               
                             else if ($type == 'boardMembers'){
                                 echo '<tr><td><input style="width:127px;" type="text" name="position"></td><td><input style="width:127px;" type="text" name="fName"></td><td><input style="width:127px;" type="text" name="lastName"></td><td><input style="width:127px;" type="text" name="email"></td><td><input style="width:127px;" type="text" name="phone"></td><td><input style="width:127px;" type="text" name="exp_date"></td></tr><tr><td><input style="width:127px;" type="submit" value="addBoard"></td></tr>';

                             }

                             

                               if (isset($_GET['speakers'])){
                                 echo '<tr><td><input style="width:127px;" type="text" name="fullNcol"></td><td><input style="width:127px;" type="text" name="titleCol"></td><td><input style="width:127px;" type="text" name="emailCol"></td><td><input style="width:127px;" type="text" name="phoneCol"></td></tr><tr><td><input style="width:127px;" type="submit" value="addSpeaker"></td></tr>';
                            }      
                        ?> 
                 </table>
            </form> 
        </div>        
</html>