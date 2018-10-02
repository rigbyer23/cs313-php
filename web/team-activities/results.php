<html>
    <head>
        <body>
            <p>What's up <?php echo $_POST["name"]; ?></p>
            <p>Your email is <a href="mailto:<?php echo $_POST["email"]; ?>"></p>
            <p>Your major is <?php echo $_POST["major"]; ?></p>
            <p>Your comments were <?php echo $_POST["comment"]; ?></p>
        </body>
</head>
</html>