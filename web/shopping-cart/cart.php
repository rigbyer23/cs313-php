<html>
    <head>
        <body>
            <h1>Your Cart</h1>
            <ul>
            <li><?php echo $_POST["gear[$item]"]; ?></li>
            <li><?php echo $_POST["gear[$item]"]; ?></li>
            <li><?php echo $_POST["gear[$item]"]; ?></li>
        </ul>

            <?php if(isset($_POST['gear']))
            {
                print_r($_POST['gear']);
            } ?>


        </body>
</head>
</html>