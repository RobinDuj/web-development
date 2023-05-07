<?php
    session_start();

    if(!empty($_POST))
    {
        // POST info omzetten naar SESSION info.
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["wachtwoord"] = $_POST["wachtwoord"];

        // Verspringen naar de volgende pagina.
        header("Location: index.php?request=account");
    }
    else
    {
        ?>        
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Login</title>
                <link rel="stylesheet" href="styles/style1.css">
            </head>
            <body>
                <img src="images/logo fiets.png" alt="logo" id="logo">
                <h2 class="headerlogin"><u>Welkom op de inlogpagina... </u></h2>
                <div class="loginform">
                    <p>Nieuwe gebruiker? <a href="registreren.php"> U kunt hier registreren.</a></p>

                    <p>Geef je logingegevens:</p>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">        
                        <label for="email">Email: </label>
                        <input type="text" name="email" id="email">
                        <br>
                        <label for="wachtwoord">Password: </label>
                        <input type="password" name="wachtwoord" id="wachtwoord">
                        <br>
                        <input type="submit" value="Login">
                    </form>                    
                </div>
            </body>
            </html>
        <?php
    }
?>