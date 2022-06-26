<?php 
        session_start();
        $patvirtinimas = "patvirtinimas.php";
        $darbuotojo_langas = "darbuotojo_langas.php";
        $planas = $_REQUEST['planas'];
        $adresas = $_REQUEST['adresas'];
        $kliento_id = $_SESSION['klientas'];

        //prisijungiama prie duomenu bazes
        $prisijungimas = new mysqli("localhost", "karpoc19", "aVph01B9gvfU", "karpoc19_");



        if ($adresas == true){
            $adresas_update = "UPDATE klientai SET el_pastas = '$adresas' WHERE id='$kliento_id'";
            $prisijungimas -> query($adresas_update);
        }else {
            echo "adresas neirasytas";
        };

        if ($planas == true){
            $planas_update = "UPDATE sutartys SET planas = '$planas' WHERE kliento_id='$kliento_id'";
            $prisijungimas -> query($planas_update);
            header( "Location: $patvirtinimas" );
        }else {
            header( "Location: $darbuotojo_langas" );
        };


        $prisijungimas->close();

?>