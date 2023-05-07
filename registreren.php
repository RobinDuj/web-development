
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="stylesheet" href="styles/style1.css">
</head>
<body>
    <img src="images/logo fiets.png" alt="logo" id="logo">
    <p class="headerlogin">Geef je login gegevens die je wenst te gebruiken als nieuwe user.</p>
    <div class="loginform">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <label for="email">Emailadres:</label>
            <input type="text" name="email" id="email" required">
            <br>
            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" name="wachtwoord" id="wachtwoord" required">
            <br>
            <input type="submit" value="Registreren">
        </form>        
    </div>

    <?php
        // Leg een verbinding met de database.
        $link = mysqli_connect("localhost", "root", "", "fietsen") 
            or die("Verbinding mislukt: " . mysqli_connect_error());

        // Is er POST-informatie? Verwerk die en sla op in de database.
        if(!empty($_POST["email"]))
        {
            mysqli_query($link, "INSERT INTO users (email, wachtwoord) 
                        VALUES ('" . htmlspecialchars($_POST["email"]) . "', '" . htmlspecialchars($_POST["wachtwoord"]) . "')");
            header("Location: index.php?request=account");
        }
    ?>
</body>