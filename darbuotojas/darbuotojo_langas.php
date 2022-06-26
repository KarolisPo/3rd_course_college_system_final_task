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
         <!-- Soninis blokas -->
        <div class="left_block">
            <form action="naujas_klientas.php">
                <center>
                    <button class="btn">REGISTRUOTI NAUJĄ KLIENTĄ</button>
                </center>
            </form>
        </div>
        <div class="right_block">
            <form action="klientu_sarasas.php" method="POST" id="paieska">
                <input class="src_input" type="text" name='user_input' placeholder="Kliento paieška">
                <button class="btn" type="submit">IEŠKOTI KLIENTO</button>
            </form>
        </div>
        

</div>

</body>
</html>