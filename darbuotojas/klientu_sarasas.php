<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/darbuotojas.css">
    <link rel="stylesheet" href="../style/klientu_sarasas.css">
    <title>Klientu sarasas</title>
</head>
<?php session_start(); ?>

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
    <div class="search_block">
    <center>
            <form action="klientu_sarasas.php" method="POST" id="paieska">
                <input class="src_input" type="text" name='user_input' placeholder="Kliento paieška">
                <button class="btn" type="submit">IEŠKOTI</button>
            </form>
         </center>
    </div>

     <!-- Paieskos blokas -->
     <div class="paieska">
         <form action="paslaugos_keitimas.php" method="POST">
            <table border="1" cellspacing="5" cellpadding="5" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vardas</th>
                    <th>Pavarde</th>
                    <th>El.paštas</th>
                    <th>Asmens kodas</th>
                    <th>Adresas</th>
                    <th>Tel.numeris</th>
                </tr>
            </thead>
                <tbody>
            <?php
                $paieska = $_REQUEST['user_input'];

                //prisijungiama prie duomenu bazes
                $prisijungimas = new mysqli("localhost", "karpoc19", "aVph01B9gvfU", "karpoc19_");


                $atrinkimas = "select * from klientai WHERE vardas='$paieska' OR id='$paieska' OR tel_numeris='$paieska'";

                $rezultatas = $prisijungimas->query($atrinkimas);

                while($masyvas = $rezultatas->fetch_assoc()) {
            ?>
                <tr>
                    <td><label><?php echo $masyvas['id'];?></label></td>
                    <td><label><?php echo $masyvas['vardas'];?><label></td>
                    <td><label><?php echo $masyvas['pavarde']; ?></label></td>
                    <td><label><?php echo $masyvas['el_pastas'];?></label></td>
                    <td><label><?php echo $masyvas['asmens_kodas'];?><label></td>
                    <td><label><?php echo $masyvas['adresas']; ?></label></td>
                    <td><label><?php echo $masyvas['tel_numeris']; ?></label></td>
                    <td><input class="pasirinkimas" type="radio" name="client" value="<?php echo $masyvas['id'];?>" onclick="atverti_keisti();"></td>
                </tr>
                <?php } $prisijungimas->close(); ?>
                </tbody>
            </table>
            <center>
                <input class="keisti_btn btn" id="keisti_btn" type="submit" name ="keisti" value="TVARKYTI">
            </center>
               
         </form>
         
                    
         <center>
            <form action="darbuotojo_langas.php" method="POST" id="paieska">
                <button class="btn" type="submit">ATGAL</button>
            </form>
         </center>
    </div>


</div>

<script src="../script/klientu_sarasas.js"></script>  

</body>

</html>