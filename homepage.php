<h1>Home</h1>
<div id="imgtext">
    <h2 class="imgtext1">Fietsen Robin</h2>
    <h3 class="imgtext2">Specialist in koersfietsen en Mountainbikes</h3>
    <img src="images/fotomtb1.jpg" alt="imghome" id="imghome">   
</div>
<div class="homepage1">
    <h3>Bij ons kan je terecht voor:</h3>
    <p>Aankoop van nieuwe fiets.</p>
    <p>Onderhoud en herstel.</p>
    <p>Fietsaccessoires.</p>
</div>

<hr class="solid">

<div>
    <h2>Onze merken:</h2>
    <table class="merken">
        <tr>
            <th><img src="images/sram.png" alt="Sram" id="merk"></th>
            <th><img src="images/shimano.png" alt="Shimano" id="merk"> </th>
            <th><img src="images/trek.png" alt="Trek" id="merk"> </th>
        </tr>
        <tr>
            <td><img src="images/scott.png" alt="Scott" id="merk"> </td>
            <td><img src="images/cube.png" alt="Cube" id="merk"> </td>
            <td><img src="images/conti.png" alt="Continental" id="merk"> </td>
        </tr>
    </table>
</div>

<hr class="solid">

<div class="review">
    <h2>Plaats hier een review.</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <table border="1" width="40%">
            <tr>
                <td width="15%"><label for="naam">Naam:</label></td>
                <td><input type="text" name="naamreview" id="naam" required style="width:70%;"></td>
            </tr>
            <tr style="height: 200px;">
                <td><label for="review">Beoordeling:</label></td>
                <td><textarea type="textarea" name="review" id="review" required required style="width:100%; height:200px; overflow:scroll; resize:none;"></textarea></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Verstuur">
        <input type="reset" value="Leegmaken">
    </form>
</div>

<?php
    $link = mysqli_connect("localhost", "root", "", "fietsen") 
        or die("Verbinding mislukt: " . mysqli_connect_error());

    if(!empty($_POST["naamreview"]))
    {
        mysqli_query($link, "INSERT INTO beoordeling (naam, review) 
                            VALUES ('" . htmlspecialchars($_POST["naamreview"]) . "', '" . htmlspecialchars($_POST["review"]) . "')");
    }
?>

<div class="tableRewiew">
    <table border="1" width="100%">
        <tr>
            <th width="30%"><u>Naam</u></th>
            <th><u>Beoordeling</u></th>
        </tr>

        <?php
            $result1 = mysqli_query($link, "SELECT * FROM beoordeling");
            while($record1 = mysqli_fetch_array($result1))
            {
                echo "<tr>";
                echo "<td>" . $record1["naam"] . "</td>";
                echo "<td>" . $record1["review"] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>