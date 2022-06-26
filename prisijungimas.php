<?php
    session_start();

    $kliento_langas = "klientas/vartotojo_langas.php";
    $darbuotojo_langas = "darbuotojas/darbuotojo_langas.php";
    $relog = "index_error.html";

    $el_pastas= $_REQUEST['el_pastas'];
    $slaptazodis = $_REQUEST['slaptazodis'];


    $prisijungimas = new mysqli("localhost", "karpoc19", "aVph01B9gvfU", "karpoc19_");

    
    if(!$prisijungimas){
        echo "Prisijungti nepavyko <br>";
    }else {
        echo "Prisijungete sekmingai <br>";
    }


    $darbuotojas = "select * FROM darbuotojai WHERE el_pastas='$el_pastas'";
    $darbuotoju_paieska = $prisijungimas->query($darbuotojas);
    $darbuotoju_masyvas = $darbuotoju_paieska->fetch_assoc();

    $klientas = "select * FROM klientai WHERE el_pastas='$el_pastas'";
    $klientu_paieska = $prisijungimas->query($klientas);
    $klientu_masyvas = $klientu_paieska->fetch_assoc();

    if($el_pastas == true && $slaptazodis == true && $darbuotoju_masyvas['slaptazodis'] == $slaptazodis){
        $_SESSION['darbuotojai'] = $darbuotoju_masyvas;
        $_SESSION['darbuotojo_pavarde'] = $darbuotoju_masyvas['pavarde'];
        header( "Location: $darbuotojo_langas");
    }
    else if ($el_pastas == true && $slaptazodis == true && $klientu_masyvas['slaptazodis'] == $slaptazodis) {
        $_SESSION['klientai'] = $klientu_masyvas;
        header( "Location: $kliento_langas" );
    }
    else{
        header( "Location: $relog" );
    };


    $prisijungimas->close();
?>