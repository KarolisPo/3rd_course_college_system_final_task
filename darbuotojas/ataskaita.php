<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/darbuotojas.css">
    <title>Ataskaita</title>
</head>
<?php
session_start();
    $kliento_id = $_SESSION['klientas'];
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

        <!-- ATASKAITOS BLOKAS -->
        <div class="ataskaitos-blokas">
            <center>
                <h1 class="center">Sutartis</h1>
                <h2 class="center">Telekomunikacijų bendrovė UAB "Telecom X"</h2>
            </center>
    

            <?php
           // Prisijungimas
           $prisijungimas = new mysqli("localhost", "karpoc19", "aVph01B9gvfU", "karpoc19_");

           
            //Uzklausa
            $atranka_klientai = "SELECT *  FROM klientai WHERE id = '$kliento_id'";
            $rez_kientai = $prisijungimas->query($atranka_klientai);

            //sutarties atrinkimas
            $sutartis_antrinkimas = "SELECT * FROM sutartys where kliento_id = '$kliento_id'";
            $rez_sutartis = $prisijungimas->query($sutartis_antrinkimas);
            $sutartis = $rez_sutartis->fetch_assoc();
            //darbuotojo atrinkimas
            $darbuotojo_id = $sutartis['darbuotojo_id'];
            $darbuotojo_antrinkimas = "SELECT * FROM darbuotojai where id = '$darbuotojo_id'";
            $rez_darbuotojas = $prisijungimas->query($darbuotojo_antrinkimas);
            $darbuotojas = $rez_darbuotojas->fetch_assoc();
            //irenginio atrinkimas
            $kliento_irenginys = $sutartis['irenginys'];
            if ($kliento_irenginys == true){
                $irenginio_antrinkimas = "SELECT * FROM irenginiai where irenginys = '$kliento_irenginys'";
                $rez_irenginiai= $prisijungimas->query($irenginio_antrinkimas);
                $irenginys = $rez_irenginiai->fetch_assoc();
                $menesine_kaina = $irenginys['kaina'] / 24;
            }else {
                
            }
            //plano mokestis
            $kliento_planas = $sutartis['planas'];
            $plano_antrinkimas = "SELECT * FROM paslaugos where planas = '$kliento_planas'";
            $rez_paslaugos= $prisijungimas->query($plano_antrinkimas);
            $planas = $rez_paslaugos->fetch_assoc();

            //Sutarties numeris
            $sutarties_numeris = $sutartis['sutarties_numeris'];

            if ($rez_kientai->num_rows > 0) {
                //Funkcija fetch_assoc() atrinktus duomenis surašo į masyvą
                while($masyvas = $rez_kientai->fetch_assoc()) 
                    {
                //Atrinktų rezultatų spausdinimas ekrane
                echo "<center>" . "<b>" . "Sutarties nr. - " . "</b>" . $sutarties_numeris .  "</center>";
                echo "<center>" .  "Vilnius" . "</center>";
                echo "<br>";

                echo "<center>" . "<b>" . " Klientas - " . "</b>" . $masyvas["vardas"] . " " . $masyvas["pavarde"] . "<b>" . ", a.k. " . "</b>" . $masyvas["asmens_kodas"] . ", gyvenantis adresu - " . $masyvas["adresas"] . " ir " . "<b>" . "UAB TELECOM X," . "</b>" .  " sudarė šią sutartį: " . "</center>";
                echo "<br>";
                
                echo "<center>" . "<b>" . "TELECOM X įsipareigoja:" . "</b>" .  "</center>";
                echo "<center>" . "Teikti klientui įdiegtas paslaugas pagal sutarties sąlygas." .  "</center>";
                echo "<br>";
                
                echo "<center>" . "<b>" . "Klientas įsipareigoja::" . "</b>" .  "</center>";
                echo "<center>" ."Kiekvieną mėnesį sumokėti TELECOM X už įrenginį (jei įsigijo) - " . number_format($menesine_kaina, 2) . " eur/mėn" .  " ir už planą - " . $planas['mokestis'] . " eur/mėn." .  "</center>";
                echo "<br>";

                echo "<center>" . "<b>" . "Kliento užsakytos paslaugos ir įrenginiai: ". "</b>" .  "</center>"; 

                echo "<center>" . " Įrenginys - " . $sutartis["irenginys"] . "; " . " Planas - " . $sutartis["planas"] . "; " . " Įrenginio pilna kaina - " . $irenginys['kaina'] . " eur" . "; " . " Plano mėnesinė kaina - " . $planas['mokestis'] . " eur/mėn" . ". " .  "</center>";
                echo "<br";

                echo " Plano suteikiamos naudos - " . $planas['min'] . " min/mėn, " . $planas['sms'] . " sms/mėn, " . $planas['mb'] . " mb/mėn" .  "<br>"; 
                echo "<br>"; 
                
                echo " Sutarties pabaiga - " . $sutartis["galiojimas"] . "<br>";
                echo " Sutartį parengė darbuotojas - " . $darbuotojas['vardas'] . " " . $darbuotojas['pavarde'] . "<br>";


                    }
            }
                
            else {
                    echo "Rezultatų nėra <br>";
                }

                

            ?>
        </div>
        <!-- ATASKAITOS BLOKO PABAIGA -->
        
        
        <!-- PDF mygtukas -->

        <div class="pdf-block">
            <center>
                <form action="generate_pdf.php" method="POST">
                    <input class="btn" type="submit" id="pdf" value="ATSISIŲSTI PDF">
                </form>
            </center>
        </div>


         <!-- I pagrindini -->
         <center>
            <form action="darbuotojo_langas.php" style="margin-bottom: 25px;">
                <button class="btn" type="submit"> Į PRADŽIĄ</button>
            </form>
         </center>

    </div>
    
</body>

</html>