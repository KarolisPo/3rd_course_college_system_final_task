<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../style/vartotojo_langas.css">
    <title>Vartotojo langas</title>
</head>
<?php 
session_start();

$prisijungimas = new mysqli("localhost", "karpoc19", "aVph01B9gvfU", "karpoc19_");


$kliento_id = $_SESSION['klientai']['id'];
$kliento_atrinkimas = "select * from klientai WHERE id='$kliento_id'";
$klientai = $prisijungimas->query($kliento_atrinkimas);
$klientas = $klientai->fetch_assoc();



$_SESSION['kliento_id'] = $kliento_id;
?>
<body>
    </div>
    <div class="content_block">
        <div class="header">
            <h2>PASLAUGOS KEITIMAS</h2>
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
                <center>
                    <div style="margin-top: 250px; color: green; font-size:25px;">
                        PLANAS PAKEISTAS
                        <form action="vartotojo_langas.php">
                            <button class="keisti_btn">GRĮŽTI</button>
                        </form>
                    </div>
                </center>
            </div>

        </div>
    </div>

</body>
</html>