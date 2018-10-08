<html lang="en">
    <?php
    session_start();
    ?>
    <head>
      <title>Take a Hike</title>
      <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel = "stylesheet" type="text/css" href="cart.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700" rel="stylesheet">
    </head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./browse.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./cart.php">Your Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="./checkout.php">Checkout</a>
      </li>
    </ul>
    <h1 class="navbar-brand">Take a Hike</h1>
    <form class="form-inline my-2 my-lg-0">
    <?php
    // function searchGear($gear){
    //   if(isset($_POST['searching'])){
    //     if($_POST['searching'] == $gear){
    //     return($gear);
    //   }}
    // }
    // echo(array_filter($gear,"searchGear"));
    ?>
      <input class="form-control mr-sm-2" name="searching" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container">

<form action="cart.php" method="post">
<div class="row">
    <div class="col-lg-4">
        <div class="card">
  <div class="card-body">
    <p class="card-text">Hammock</p>
    <input type="checkbox" name="gear[]" value="Hammock">
  </div>
  <img src="./hammock.jpg" alt="Card image">
  <div class="card-body">
    <p class="card-text">$35.00</p>
  </div>
</div>
</div>

    <div class="col-lg-4">
        <div class="card">
  <div class="card-body">
    <p class="card-text">Sleeping Bag</p>
    <input type="checkbox" name="gear[]" value="Sleeping Bag">
  </div>
  <img src="./sleepingbag.jpg" alt="Card image">
  <div class="card-body">
    <p class="card-text">$45.00</p>
  </div>
</div>
</div>

    <div class="col-lg-4">
  <div class="card">
  <div class="card-body">
    <p class="card-text">Tarp</p>
    <input type="checkbox" name="gear[]" value="Tarp">
  </div>
  <img src="./tarp.jpg" alt="Card image">
  <div class="card-body">
    <p class="card-text">$25.00</p>
  </div>
</div>
</div>
</div>

<div class="row">
   <div class="col-lg-4">
  <div class="card">
  <div class="card-body">
    <p class="card-text">Chacos</p>
    <input type="checkbox" name="gear[]" value="Chacos">
  </div>
  <img src="./chacos.jpg" alt="Card image">
  <div class="card-body">
    <p class="card-text">$90.00</p>
  </div>
</div>
</div>    

<div class="col-lg-8">
<button type="submit" class="btn btn-primary">Add to Cart</button>
</div>
</div>
</body>
</html>



