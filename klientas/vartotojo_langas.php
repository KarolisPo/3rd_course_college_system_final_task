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
$sutarties_atrinkimas = "select * from sutartys WHERE kliento_id='$kliento_id'";
$sutartys = $prisijungimas->query($sutarties_atrinkimas);
$kliento_sutartis = $sutartys->fetch_assoc();

$kliento_planas = $kliento_sutartis['planas'];
$plano_atrinkimas = "select * from paslaugos WHERE planas='$kliento_planas'";
$paslaugos = $prisijungimas->query($plano_atrinkimas);
$kliento_planas = $paslaugos->fetch_assoc();


$_SESSION['kliento_id'] = $kliento_id;
?>
<body>
    </div>
    <div class="content_block">
        <div class="header">
            <h2>UŽSAKYTOS PASLAUGOS</h2>
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
            <div class="paslaugos">
                <center><h3>PASLAUGA <?php echo $kliento_planas['planas']?> </h3></center>
                <center>
                    <table>
                        <tr>
                            <td>Pokalbiai</td>
                            <td>-</td>
                            <td><?php echo $kliento_planas['min'] ?></td>
                        </tr>
                        <tr>
                            <td>Žinutės</td>
                            <td>-</td>
                            <td><?php echo $kliento_planas['sms'] ?></td>
                        </tr>
                        <tr>
                            <td>Internetas</td>
                            <td>-</td>
                            <td><?php echo $kliento_planas['mb'] ?> MB</td>
                        </tr>
                        <tr>
                            <td>Sutarties pabaiga</td>
                            <td>-</td>
                            <td><?php echo $kliento_sutartis['galiojimas'] ?></td>
                        </tr>
                    </table>
                </center>
            </div>

            <a href="kliento_paslaugos.php">
                <div class="keisti-paslauga">
                    <h3>
                        <center><strong>Keisti paslaugą</strong></center>
                    </h3>
                 </div>
             </a>

             <a href="keisti_slaptazodi.php">
                <div class="keisti-paslauga">
                    <h3>
                        <center><strong>Keisti slaptažodį</strong></center>
                    </h3>
                </div>
            </a>

        </div>
    </div>

</body>
</html>