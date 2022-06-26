<?php 
        session_start();

        $kliento_id = $_SESSION['kliento_id'];
        $patvirtinimas = 'vartotojo_patvirtinimas.php';
        $paslaugos_keitimas = 'kliento_paslaugos.php';
        $planas = $_REQUEST['paslauga'];
        
        $prisijungimas = new mysqli("localhost", "karpoc19", "aVph01B9gvfU", "karpoc19_");



        if ($planas == true){
            $planas_update = "UPDATE sutartys SET planas = '$planas' WHERE kliento_id='$kliento_id'";
            $prisijungimas -> query($planas_update);
            header( "Location: $patvirtinimas" );
        }else {
            header( "Location: $paslaugos_keitimas" );
        };


        $prisijungimas->close();

?>