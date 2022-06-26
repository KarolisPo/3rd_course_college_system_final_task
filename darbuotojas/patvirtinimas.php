<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../style/darbuotojas.css">
    <title>Darbuotojo langas</title>
</head>
<?php
session_start();
?>
<body>
<div class="container">
    <!-- Darbuotojo vardas, pavarde, exit headeris -->
    <div class="header">
        <div class="header-name">
            <h2><?php echo $_SESSION['darbuotojai']['vardas']?> <?php echo $_SESSION['darbuotojai']['pavarde']?></h2>
        </div>

        <div class="exit">
            <a href="../logout.php"><img id="exit" src="../img/exit.JPG" alt="exit" title="ATSIJUNGTI"></a>
        </div>
    </div>
        <div class="patvirtinimas_block">
            <center><h2 style="color: #4BB543">DUOMENYS SĖKMINGAI PAKEISTI</h2></center>
            <form action="darbuotojo_langas.php">
                <center>
                    <button class="btn">Į PRADŽIĄ</button>
                </center>
            </form>
        </div>
</div>

</body>
</html>