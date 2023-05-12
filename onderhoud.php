<h1>Onderhoud</h1>

<h2>Vul het onderhoudsformulier in:</h2>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <img src="images/fietsherstelling.jpg" alt="imgonderhoud" id="imgonderhoud">
    <table width="70%">
        <tr>
            <td width="15%"><label for="naam">Naam:</label></td>
            <td><input type="text" name="naam" id="naam1" required style="width:35%;"></td>
        </tr>
        <tr>
            <td><label for="email">Emailadres:</label></td>
            <td><input type="text" name="email" id="email" required required style="width:35%;"></td>
        </tr>
        <tr>
            <td><label for="model">Fiets model:</label></td>
            <td><input type="text" name="model" id="model" required required style="width:80%;"></td>
        </tr>            
        <tr>
            <td><label for="omschrijving">Omschrijf het probleem:</label></td>
            <td><textarea type="textarea" name="omschrijving" id="omschrijving" required required style="width:80%; height:200px;"></textarea></td>
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