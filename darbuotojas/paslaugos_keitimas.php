<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/darbuotojas.css">
    <link rel="stylesheet" href="../style/paslaugos_keitimas.css">
    <title>Keisti-trinti duomenis</title>
</head>
<?php 
session_start();
    $kliento_id = $_REQUEST['client'];
    $_SESSION['klientas'] = $kliento_id;


    $prisijungimas = new mysqli("localhost", "karpoc19", "aVph01B9gvfU", "karpoc19_");

    $atrinkimas = "select * from klientai WHERE id='$kliento_id'";
    $rezultatas = $prisijungimas->query($atrinkimas);
    $klientas = $rezultatas->fetch_assoc();

    $sutartys = "select * from sutartys WHERE kliento_id='$kliento_id'";
    $sutartys_rez = $prisijungimas->query($sutartys);
    $sutartis = $sutartys_rez->fetch_assoc();
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
    <!-- DUOMENYS APIE KLIENTA -->
    <div class="client_info">
            <h3 style="color: #2B262D">KLIENTO ID: <span><?php echo $kliento_id ?></span></h3>
            <h3 style="color: #2B262D">KLIENTAS: <span><?php echo $klientas['vardas']?></span> <span><?php echo $klientas['pavarde']?></span></h3>
            <h3 style="color: #2B262D">KLIENTO PLANAS: <span><?php echo $sutartis['planas'] ?></span></h3>
    </div>

    <div class="left_action_block">
        <center>
            <h2 style="color: #9f496E">DUOMENŲ KEITIMAS</h2>
            <form action="plano_duomenys.php" method="POST" id="paslaugos-keitimas">
                <label for="keisti-plana" ><span style="color: #2B262D; font-weight: 700">PASIRINKITE NAUJĄ PLANĄ</span></label><br>
                <select class="src_input" id="planas" name="planas" style="text-align: center; margin-top: 10px;">
                    <option value=""></option>
                    <option value="MAXI">MAXI</option>
                    <option value="MIDI">MIDI</option>
                    <option value="MINI">MINI</option>
                </select><br><br><br>
                <input class="src_input" name="adresas" id="adresas" placeholder="KEISTI EL.PAŠTĄ"></input><br>
                <button class="btn" type="submit"> KEISTI </button>
                </form>
        </center>
    </div>
    <div class="right_action_block">
        <center>
            <h2 style="color: #9f496E">KITI VEIKSMAI</h2>
        </center>

            <form action="ataskaita.php">
                <button class="btn" type="submit">RODYTĮ SUTARTĮ</button>
            </form>
            <!-- <button class="btn" ><a href="ataskaita.php" style="text-decoration: none; color:white;">RODYTI SUTARĮ</a></button> -->


        <!-- TRINTI PASLAUGA -->
        <button class="trinti_btn btn" onclick="double_check()">TRINTI VARTOTOJĄ</button>

        <div class="forma_trinti">
            <form action="vartotojo_trinimas.php" method="POST">
                <center>
                    <span style="color: #B33A3A; font-weight: 700;">AR TIKRAI NORITE IŠTRINTI ŠĮ VARTOTOJĄ?</span>
                </center>
                <button class="btn" type="submit">TAIP</button>
            </form>
            <button class="btn" onclick="deny()">NE</button>
        </div>
    </div>

    <div class="bot_block">
        <center>
            <form action="darbuotojo_langas.php">
                <button class="btn">Į PRADŽIĄ</button>
            </form>
        </center>
    </div>

    </div>

    <script src="../script/paslaugos_keitimas.js"></script>
</body>

</html>