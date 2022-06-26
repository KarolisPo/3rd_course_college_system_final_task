<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/darbuotojas.css">
    <title></title>
</head>

<?php
    session_start();
        $vardas = $_POST['vardas'];
        $pavarde = $_POST['pavarde'];
        $tel_nr = $_POST['tel'];
        $el_pastas = $_POST['mail'];
        $ak = $_POST['ak'];
        $slaptazodis = $_POST['kliento-slaptazodis'];
        $adresas = $_POST['adresas'];
        $kliento_id = $_POST['ident'];
        

        //Lentele sutartys - galiojimas------------<>
        $sutarties_pradzia = $_POST['sutarties-pradzia'];

        $submit = $_POST['save'];
        //--------------------------------------------------------------


        //prisijungimas
        $prisijungimas = new mysqli("localhost", "karpoc19", "aVph01B9gvfU", "karpoc19_");

        //darbuotojo ID
        
        
        // if(!$prisijungimas){
        //     echo "Prisijungti nepavyko <br>";
        // }else {
        //     echo "Prisijungete sekmingai <br>";
        // }

        //IRASYMAS I KLIENTU LENTELE
        $irasymas_klientai = "INSERT INTO klientai VALUES('$kliento_id', '$vardas', '$pavarde', '$el_pastas', '$ak', '$adresas', '$tel_nr', '$slaptazodis')";
        $prisijungimas->query($irasymas_klientai);
        //irasymas i klientu lentele PABAIGA-------------------------

       
        // IRASYMAS I SUTARCIU LENTELE
        if(isset($_POST['save'])){
            $irenginys = $_POST['irenginys'];
            $planas = $_POST['planas'];
            $sutarties_pabaiga = $_POST['sutarties-pabaiga'];
            $darbuotojo_id = $_POST['darbuotojas'];

            $irasymas_sutartys = "INSERT INTO sutartys VALUES(DEFAULT, '$kliento_id', '$planas', '$irenginys', '$sutarties_pabaiga', '$darbuotojo_id')";
            $prisijungimas->query($irasymas_sutartys);


        }
        //  irasymas i sutarciu lentele PABAIGA-----------------------



        $prisijungimas->close();

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
            <center><h2 style="color: #4BB543">KLIENTAS UŽREGISTRUOTAS</h2></center>
            <form action="darbuotojo_langas.php">
                <center>
                    <button class="btn">Į PRADŽIĄ</button>
                </center>
            </form>
        </div>
</div>
    
</body>

</html>