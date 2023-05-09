<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="styles/style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="scripts/script1.js"></script>
    <script src="https://kit.fontawesome.com/204c2a2ce0.js" crossorigin="anonymous"></script>
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
</head>
<body>
    <link rel="icon" type="image/png" href="images/logo fiets.png">
    <img src="images/logo fiets.png" alt="logo" id="logo">
    <ul class="navbar">
        <li><a href="index.php?request=homepage">Home</a></li>
        <li class="dropdown"><button href="index.php?request=fietsen" class="dropbtn" onclick="myFunction()"><i class="fa-solid fa-caret-down"></i> Fietsen</button>
            <ul>
                <div class="dropdown-content" id="myDropdown">
                    <li><a href="index.php?request=mtb">MTB</a></li>
                    <li><a href="index.php?request=stadsfiets">Stadsfietsen</a></li>
                    <li><a href="index.php?request=koersfiets">Koersfietsen</a></li>
                </div>
            </ul>
        </li>
        <li><a href="index.php?request=onderhoud">Onderhoud</a></li>
        <li><a href="index.php?request=contact">Contact</a></li>
        <li><a href="index.php?request=account">Account</a></li>
    </ul>

    <div id="contentWrapper">
        <?php
            $link = mysqli_connect("localhost", "root", "", "fietsen") 
                or die("Verbinding mislukt: " . mysqli_connect_error());
            if(!empty($_POST["naamcontact"]))
            {
                mysqli_query($link, "INSERT INTO contact (naam, email, omschrijving) 
                                    VALUES ('" . htmlspecialchars($_POST["naam"]) . "', '" . htmlspecialchars($_POST["email"]) . "', '" . htmlspecialchars($_POST["omschrijving"]) . "')");
            }
            if(!empty($_POST["model"]))
            {
                mysqli_query($link, "INSERT INTO herstellingen (naam, email, model, omschrijving) 
                                    VALUES ('" . htmlspecialchars($_POST["naam"]) . "', '" . htmlspecialchars($_POST["email"]) . "', '" . htmlspecialchars($_POST["model"]) . "', '" . htmlspecialchars($_POST["omschrijving"]) . "')");
            }
            if(!empty($_POST["naamaccount"]))
                    {
                        mysqli_query($link,"UPDATE  beoordeling
                                        SET     naam = '".$_POST["naamaccount"]."',
                                                review = '".$_POST["reviewaccount"]."'
                                        WHERE   id = '".$_POST["idaccount"]."'") or die(mysqli_error($link));
                    }
            if(isset($_GET["request"]))
                include_once($_GET["request"].".php");
            else
                include_once("homepage.php");
        ?>
    </div>

    <footer>
        <div class="row">
            <div class="column" id="openingstijden">
                <p>Openingsuren:</p>
                <p> Ma: Gesloten</p>
                <p> Di: 10u-18u</p>
                <p> Wo: 10u-18u</p>
                <p> Do: 10u-18u</p>
                <p> Vr: 10u-18u</p>
                <p> Za: 8u-20u</p>
                <p> Zo: Gesloten</p>  
            </div>
            <div class="column" id="contact">
                <a href="https://maps.google.com/maps?q=Hogeschool+VIVES+Campus+Kortrijk"><i class="fa-solid fa-location-dot"></i> Doorniksesteenweg 145, 8500 Kortrijk</i></a><br>
                <a href="mailto:robin.dujardyn@student.vives.be"><i class="fa-solid fa-envelope"> robin.dujardyn@student.vives.be</i></a><br>
                <a href="tel:+32488888888"><i class="fa-solid fa-phone"></i> +32 488 888 888</a><br>
                <a href="https://www.facebook.com/viveshogeschool"><i class="fa-brands fa-facebook"></i> Fietsen Robin</a><br>
            </div>
            <div class="column" id="maps">
                <div id="map" style="width: 100%; height: 300px;"></div>
            </div>
        </div>
    </footer>
</body>
</html>