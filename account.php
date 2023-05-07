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
                        <table border="1" width="100%">
                            <tr>
                                <td width="15%"><label for="naam">ID:</label></td>
                                <td><input type="text" name="id" id="id" required style="width:10%;"></td>
                            </tr>
                            <tr>
                                <td width="15%"><label for="naam">Naam:</label></td>
                                <td><input type="text" name="naam" id="naam" required style="width:35%;"></td>
                            </tr>
                            <tr>
                                <td><label for="beoordeling">Beoordeling:</label></td>
                                <td><input type="text" name="beoordeling" id="beoordeling" required required style="width:35%;"></td>
                            </tr>
                        </table>
                        <br>
                        <input type="submit" value="Verstuur">
                        <input type="reset" value="Leegmaken">
                    </form>
                    <?php
                    $link = mysqli_connect("localhost", "root", "", "website") 
                    or die("Verbinding mislukt: " . mysqli_connect_error());
        
                    // Is er POST-informatie? Verwerk die en sla op in de database.
                    if(!empty($_POST["naam"]))
                    {
                        mysqli_query($link,"UPDATE  beoordeling
                                        SET     naam = '".$_POST["naam"]."',
                                                review = '".$_POST["review"]."'
                                        WHERE   id = '".$_POST["id"]."'") or die(mysqli_error($link));
                    }
                    ?>
                    <br>
                   
                
                    <table border="1" width="100%">
                        <tr>
                            <th colspan="4" style="text-align: left; font-weight: normal;">Dit zijn de beoordelingen</th>
                        </tr>
                        <tr>
                            <th><u>ID</u></th>
                            <th><u>Naam</u></th>
                            <th><u>Beoordeling</u></th>
                        </tr>
                
                        <?php
                            // Zoek de gegevens uit de database op.
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