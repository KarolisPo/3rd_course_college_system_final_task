<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../style/darbuotojas.css">
    <link rel="stylesheet" type="text/css" href="../style/naujas_clientas.css">
    <title>Naujo kliento registracija</title>
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
        <!-- Registracijos blokas -->
        <h3 class="middle">Naujo kliento registracija</h3>
    
        <div class="registracija_container">
            <form action="new_client.php" method="post" id="registracija">
                <label for="vardas">Vardas: </label> 
                <input type="text" name="vardas" id="vardas" required>
                    <label for="pavarde">Pavardė: </label>
                    <input type="text" name="pavarde" id="pavarde" required><br><br>
                <label for="tel">Telefono numeris: </label>
                <input type="number" name="tel" id="tel" required>
                    <label for="mail">Elektroninis paštas: </label>
                    <input type="email" name="mail" id="mail" required><br><br>
                <label for="planas">Planas: </label>
                <select id="planas" name="planas" required>
                    <option value="MAXI">MAXI</option>
                    <option value="MIDI">MIDI</option>
                    <option value="MINI">MINI</option>
                </select>
                    <label for="ident" id="id">Suteikiamas ID:</label>
                    <input type="text" name="ident" id="ident" value="<?php echo uniqid(); ?>">
                <br><br>
                <label for="ak">Asmens kodas: </label>
                <input type="number" name="ak" id="ak" required>
                <label for="irenginys">Įrenginys</label>
                <select id="irenginys" name="irenginys">
                    <option value="nera">Nėra</option>
                    <option value="telefonas">Telefonas</option>
                    <option value="kompiuteris">Kompiuteris</option>
                </select>
                
                <br><br>

                <label for="sutarties-pradzia">Sutarties pradžia: </label>
                <input type="date" name="sutarties-pradzia" id="sutarties-pradzia" required>
                <label for="sutarties-pabaiga">Sutarties pabaiga: </label>
                <input type="date" name="sutarties-pabaiga" id="sutarties-pabaiga" required><br><br>
                <label for="kliento-slaptazodis">Slaptažodis: </label>
                <input type="text" name="kliento-slaptazodis" id="kliento-slaptazodis" required>
                <label for="darbuotojas">Darbuotojas: </label>
                <select name="darbuotojas" id="darbuotojas">
                    <option value="1">Karolis</option>
                    <option value="2">Romanas</option>
                </select>


                <br><br><br>
                <label for="adresas">Gyvenamoji vieta: </label><br>
                <textarea name="adresas" id="adresas" cols="20" rows="5" required></textarea><br>
                <center>
                    <div class="save-block">
                        <input class="btn" type="submit" name="save" id="save" value="IŠSAUGOTI">
                        <input class="btn" type="reset" name="reset" id="reset" value="VALYTI">
                    </div>
                </center>

                
            </form>
            <center>
                <form action="darbuotojo_langas.php" style="margin-bottom: 25px;">
                    <button class="btn" type="submit"> Į PRADŽIĄ</button>
                </form>
             </center>
        </div>

   
     

</div>

</body>
</html>
    
</body>
</html>