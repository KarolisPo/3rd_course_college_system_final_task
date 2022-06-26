<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="../style/stiliai.css"> -->
    <link rel="stylesheet" type="text/css" href="../style/vartotojo_langas.css">
    <title>Paslaugos uzsakymas</title>
</head>

<?php 
session_start();
    $kliento_id = $_SESSION['kliento_id'];

    $prisijungimas = new mysqli("localhost", "karpoc19", "aVph01B9gvfU", "karpoc19_");

    $kliento_atrinkimas = "select * FROM klientai WHERE id='$kliento_id'";
    $kliento_paieska = $prisijungimas->query($kliento_atrinkimas);
    $klientas = $kliento_paieska->fetch_assoc();

?>

<body>
        <div class="content_block">
            <div class="header">
                <h2>PLANO KEITIMAS</h2>
                <a href="../logout.php"><img id="exit" src="../img/exit.JPG" alt="exit" title="ATSIJUNGTI"></a>
            </div>
            <center>
                <div class="client_info">
                    <div class="info_block">
                        <h4 class="vardas_pavarde"><?php echo $_SESSION['klientai']['vardas'] ?> <?php echo $_SESSION['klientai']['pavarde'] ?></h4>
                    </div>
                    <div class="info_block">
                        <h4>Telefono numeris</h4>
                        <p class="client-paragraph"><?php echo $_SESSION['klientai']['tel_numeris'] ?></p>
                    </div>
                    <div class="info_block">
                        <h4>Kliento ID numeris</h4>
                        <p class="client-paragraph"><?php echo $_SESSION['klientai']['id'] ?></p>
                    </div>
                </div>
            </center>
            
            <div class="paslaugos_block">
                <div class="form_block_paslauga">
                <form action="vartotojo_plano_duomenys.php" method = "POST">
                    <center><h2>Pasirinkite paslaugą</h2></center>
                        <center><select id="paslaugos" name="paslauga" style="width: 200px; height: 40px; font-size:22px; text-align:center;">
                            <option value=""></option>
                            <option value="MAXI">MAXI</option>
                            <option value="MIDI">MIDI</option>
                            <option value="MINI">MINI</option>
                        </select></center>
        
                        <div class="maxi">
                            <center>
                                <h3 class="grey">MAXI</h3>
                                <h5>5000 MIN</h5>
                                <h5>100000 SMS</h5>
                                <h5>120000 MB</h5><br><br><hr>
                                <h3>15.99 EUR</h3>
                            </center>
                        </div>
                        <div class="midi">
                            <center>
                                <h3 class="grey">MIDI</h3>
                                <h5>1000 MIN</h5>
                                <h5>20000 SMS</h5>
                                <h5>10000 MB</h5><br><br><hr>
                                <h3>9.99 EUR</h3>
                            </center>
                        </div>
                        <div class="mini">
                            <center>
                                <h3 class="grey">MINI</h3>
                                <h5>500 MIN</h5>
                                <h5>10000 SMS</h5>
                                <h5>5000 MB</h5><br><br><hr>
                                <h3>6.99 EUR</h3>
                            </center>
                        </div>

                        <center><button type="submit" class="planas_btn"> KEISTI PLANĄ</button></center>
                </form>
                </div>
                    <div class="atgal_btn">
                            <form action="vartotojo_langas.php">
                                <center><button type="submit" class="planas_btn"> ATGAL</button></center>
                            </form>
                        </div>
                    </div>

    
            </div>
    
</body>
</html>