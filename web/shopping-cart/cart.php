<html>
    <head>
        <body>
            <h1>Your Cart</h1>
            <ul>
                <?php
                foreach($_POST['gear'] as $item) {
                    echo "<li>$item</li>";
                }
                ?>
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