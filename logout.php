<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="styles/style1.css">
</head>
<body>
    <?php
        session_start();
        session_unset();
        session_destroy();
        header("Location: login.php");
    ?>
    <div class="logout">
        <p>U bent nu uitgelogd!</p>
        <a href="index.php?request=account">Ga terug naar login.</a>        
    </div>
</body>
</html>