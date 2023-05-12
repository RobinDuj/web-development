<?php
    session_start();

    if(isset($_SESSION["email"]) && isset($_SESSION["wachtwoord"]))
    {
        $link = mysqli_connect("localhost", "root", "", "fietsen");

        $result = mysqli_query($link, 
            "SELECT * FROM users WHERE email = '" . mysqli_real_escape_string($link, $_SESSION["email"]) . "' AND wachtwoord = '" . mysqli_real_escape_string($link, $_SESSION["wachtwoord"]) . "'");

        if(mysqli_num_rows($result) > 0)
        {
            while($record = mysqli_fetch_array($result))
            {
                $zoek = mysqli_query($link, "SELECT * FROM users WHERE email LIKE '%" . htmlspecialchars($_SESSION["email"]). "%'");
                $record_zoek = mysqli_fetch_array($zoek);
                if ($record_zoek["ADMIN"] == 1)
                {
                    echo "Welkom ADMIN, {$_SESSION["email"]}!";
                    echo "<br><br>";
                    echo "Klik <a href='logout.php'>hier</a> om uit te loggen."; 
                    ?>
                    <br><br>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <table border="1" width="80%">
                            <tr>
                                <p>Beoordelingen aanpassen:</p>                                
                            </tr>
                            <tr>
                                <td width="15%"><label for="naam">ID:</label></td>
                                <td><input type="text" name="idaccount" id="id" required style="width:10%;"></td>
                            </tr>
                            <tr>
                                <td width="15%"><label for="naam">Naam:</label></td>
                                <td><input type="text" name="naamaccount" id="naam" required style="width:35%;"></td>
                            </tr>
                            <tr>
                                <td><label for="beoordeling">Beoordeling:</label></td>
                                <td><input type="text" name="reviewaccount" id="beoordeling" required required style="width:35%;"></td>
                            </tr>
                        </table>
                        <br>
                        <input type="submit" value="Verstuur">
                        <input type="reset" value="Leegmaken">
                    </form>
                    <?php
                    $link = mysqli_connect("localhost", "root", "", "fietsen") 
                    or die("Verbinding mislukt: " . mysqli_connect_error());
        
                    // Is er POST-informatie? Verwerk die en sla op in de database.
                    if(!empty($_POST["naamaccount"]))
                    {
                        mysqli_query($link,"UPDATE  beoordeling
                                        SET     naam = '".$_POST["naamaccount"]."',
                                                review = '".$_POST["reviewaccount"]."'
                                        WHERE   id = '".$_POST["idaccount"]."'") or die(mysqli_error($link));
                    }
                    ?>
                    <br>
                   
                    <div class="tableRewiew">
                        <table border="1" width="90%">
                            <tr>
                                <th colspan="4" style="text-align: left; font-weight: normal;">Dit zijn de beoordelingen</th>
                            </tr>
                            <tr>
                                <th><u>ID</u></th>
                                <th width="30%"><u>Naam</u></th>
                                <th><u>Beoordeling</u></th>
                            </tr>
                            <?php
                                $result1 = mysqli_query($link, "SELECT * FROM beoordeling");
                                while($record1 = mysqli_fetch_array($result1))
                                {
                                    echo "<tr>";
                                    echo "<td>" . $record1["id"] . "</td>";
                                    echo "<td>" . $record1["naam"] . "</td>";
                                    echo "<td>" . $record1["review"] . "</td>";
                                    echo "</tr>";
                                }
                            ?>                            
                        </table>
                    </div>
                    <br><br>
                    
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <table border="1" width="40%">
                            <tr>
                              <p>Contact:</p>  
                            </tr>
                            <tr>
                                <td width="45%"><label for="ID van de afkorting:">ID van het contactformulier:</label></td>
                                <td><input type="text" name="id_verwijder_input" id="id_verwijder_input" required style="width:20%;"></td>
                            </tr>
                        </table>
                        <br>
                        <input type="submit" value="Verwijderen">
                    </form>

                    <?php
                        $link = mysqli_connect("localhost", "root", "", "fietsen") 
                            or die("Verbinding mislukt: " . mysqli_connect_error());

                        if(!empty($_POST["id_verwijder_input"]))
                        {
                            mysqli_query($link,"DELETE FROM contact WHERE id='".$_POST["id_verwijder_input"]."'");   
                        }
                    ?>
                    <br>

                    <div class="tableRewiew">
                        <table border="1" width="90%">
                            <tr>
                                <th colspan="4" style="text-align: left; font-weight: normal;">Contactformulier</th>
                            </tr>
                            <tr>
                                <th><u>ID</u></th>
                                <th width="30%"><u>Naam</u></th>
                                <th><u>Email</u></th>
                                <th><u>omschrijving</u></th>
                            </tr>
                            <?php
                                $result2 = mysqli_query($link, "SELECT * FROM contact");
                                while($record2 = mysqli_fetch_array($result2))
                                {
                                    echo "<tr>";
                                    echo "<td>" . $record2["id"] . "</td>";
                                    echo "<td>" . $record2["naamcontact"] . "</td>";
                                    echo "<td>" . $record2["email"] . "</td>";
                                    echo "<td>" . $record2["omschrijving"] . "</td>";
                                    echo "</tr>";
                                }
                            ?>                            
                        </table>
                    </div>
                    <br><br>

                    
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <table border="1" width="40%">
                            <tr>
                               <p>Onderhoudsformulier:</p> 
                            </tr>
                            <tr>
                                <td width="45%"><label for="ID van de afkorting:">ID van het formulier:</label></td>
                                <td><input type="text" name="id_verwijder_onderhoud" id="id_verwijder_onderhoud" required style="width:20%;"></td>
                            </tr>
                        </table>
                        <br>
                        <input type="submit" value="Verwijderen">
                    </form>

                    <?php
                        $link = mysqli_connect("localhost", "root", "", "fietsen") 
                            or die("Verbinding mislukt: " . mysqli_connect_error());

                        if(!empty($_POST["id_verwijder_onderhoud"]))
                        {
                            mysqli_query($link,"DELETE FROM herstellingen WHERE id='".$_POST["id_verwijder_onderhoud"]."'");   
                        }
                    ?>
                    <br>

                    <div class="tableRewiew">
                        <table border="1" width="90%">
                            <tr>
                                <th colspan="4" style="text-align: left; font-weight: normal;">Onderhoudsformulier</th>
                            </tr>
                            <tr>
                                <th><u>ID</u></th>
                                <th width="30%"><u>Naam</u></th>
                                <th><u>Email</u></th>
                                <th><u>Model</u></th>
                                <th><u>omschrijving</u></th>
                            </tr>
                            <?php
                                $result2 = mysqli_query($link, "SELECT * FROM herstellingen");
                                while($record2 = mysqli_fetch_array($result2))
                                {
                                    echo "<tr>";
                                    echo "<td>" . $record2["id"] . "</td>";
                                    echo "<td>" . $record2["naam"] . "</td>";
                                    echo "<td>" . $record2["email"] . "</td>";
                                    echo "<td>" . $record2["model"] . "</td>";
                                    echo "<td>" . $record2["omschrijving"] . "</td>";
                                    echo "</tr>";
                                }
                            ?>                            
                        </table>
                    </div>
                    <?php
                }
                else
                {
                    echo "Welkom, {$_SESSION["email"]}!";
                    echo "<br><br>";
                    echo "Klik <a href='logout.php'>hier</a> om uit te loggen.";
                }
            }
        }
        else
        {
            echo "Je bent niet ingelogd!";
            echo "<br>";
            echo "Klik <a href='login.php'>hier</a> om in te loggen.";
        }
    }
    else
    {
        echo "Je bent niet ingelogd!";
        echo "<br>";
        echo "Klik <a href='login.php'>hier</a> om in te loggen.";
    }
?>