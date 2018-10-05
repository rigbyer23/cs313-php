<html>
    <head>
        <body>
            <h1>Your Cart</h1>
            <ul>
            <li><?php echo $_POST["gear"]; ?></li>
            <li><a href="mailto:<?php echo $_POST["gear"]; ?>"><?php echo $_POST["gear"]; ?></a></li>
            <li><?php echo $_POST["gear"]; ?></li>
            <li><?php echo $_POST["gear"]; ?></li>
        </ul>

            <?php if(isset($_POST['gear']))
            {
                print_r($_POST['gear']);
            } ?>


        </body>
</head>
</html>