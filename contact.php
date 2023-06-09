<H1>Contact</H1>

<div class="contact">
    <img src="images/werkplaats12.jpg" alt="fietsmaker" id="fietsmaker">    
    <p><a href="mailto:robin.dujardyn@student.vives.be"><i class="fa-solid fa-envelope"> robin.dujardyn@student.vives.be</i></a></p>
    <p><a href="tel:+32488888888"><i class="fa-solid fa-phone"></i> +32 488 888 888</a></p>
    <p><a href="https://www.facebook.com/viveshogeschool"><i class="fa-brands fa-facebook"></i> Fietsen Robin</a> </p>
</div>



<h2>Contactformulier:</h2>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <table border="1" width="60%" class="contactformulier">
            <tr>
                <p>Bij vragen over beschikbaarheden over fietsen.</p>
            </tr>
            <tr>
                <td width="15%"><label for="naamcontact">Naam:</label></td>
                <td><input type="text" name="naamcontact" id="naamcontact" required style="width:35%;"></td>
            </tr>
            <tr>
                <td><label for="email">Emailadres:</label></td>
                <td><input type="text" name="email" id="email" required required style="width:35%;"></td>
            </tr>
            <tr>
                <td><label for="omschrijving">Opmerking:</label></td>
                <td><input type="text" name="omschrijving" id="omschrijving" required required style="width:80%;"></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Verstuur">
        <input type="reset" value="Leegmaken">
    </form>

    <?php
        $link = mysqli_connect("localhost", "root", "", "fietsen") 
            or die("Verbinding mislukt: " . mysqli_connect_error());
    ?>
    <br>

