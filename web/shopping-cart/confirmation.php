<html>
<?php
    session_start();
    ?>
    <head>
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
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
      <div class="container">
      <h2 style='font-family:Amatic SC, cursive;font-size:58px;'>Purchase Summary</h2>
      <?php
      $name = htmlspecialchars($_POST['name']);
      $address = htmlspecialchars($_POST['address']);
      echo $name."<br>";
      echo $address."<br>";
     
       if(isset($_SESSION["gear"])){
         foreach($_SESSION["gear"] as $item){
          echo $item."<br><hr>";
         }}
        ?> 
        </div>
       
        </body>
</html>