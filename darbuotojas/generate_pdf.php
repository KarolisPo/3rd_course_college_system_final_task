<?php
session_start();
$kliento_id = $_SESSION['klientas'];

// Prisijungimas
$prisijungimas = new mysqli("localhost", "romvas27", "dGeec9Rp2uc7", "romvas27__");

//---------------------------------------------------------------------------------------------------
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

 


        
 //===================================================================================================


require('fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

if ($rez_kientai->num_rows > 0) {
    //Funkcija fetch_assoc() atrinktus duomenis surašo į masyvą
    while($masyvas = $rez_kientai->fetch_assoc()) 
        {
    //Atrinktų rezultatų spausdinimas ekrane

// Headeriai VIDURYS
$pdf->SetFont('Times','B',16,);
$pdf->Cell(80);
$pdf->Cell(30 ,5,'Sutartis',0,1, 'C');
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Cell(80);
$pdf->Cell(30 ,5,'Telekomunikaciju bendrove UAB "Telecom X"',0,1, 'C');
$pdf->Cell(10 ,10,'',0,1);

//Sutarties numeris, miestas
$pdf->SetFont('Times','B', 12);
$pdf->Cell(85);
$pdf->Cell(20 ,5,'Sutarties nr. - ',0,0, 'C');
$pdf->Cell(10 ,5,$sutarties_numeris,0,1, 'C');

$pdf->SetFont('Times','', 12);
$pdf->Cell(85);
$pdf->Cell(20,5,'Vilnius',0,1,'C');
$pdf->Cell(10 ,10,'',0,1);

// // Pirma eilute
$pdf->SetFont('Times','', 12);
$pdf->Cell(10);
$pdf->Cell(10,5,'Klientas - ',0,0);
$pdf->Cell(8);


$pdf->Cell(10,5,$masyvas["vardas"] . " " . $masyvas["pavarde"] . ', asmens kodas - ' . $masyvas["asmens_kodas"] . ', gyvenantis adresu - ' . $masyvas["adresas"] . ' ir UAB',0,1,);
$pdf->Cell(10);
$pdf->Cell(10, 5, 'TELECOM X sudare sia sutarti:',0,1,);
$pdf->Cell(10 ,10,'',0,1);

// Telecom isipareigoja
$pdf->SetFont('Times','B', 12);
$pdf->Cell(85);
$pdf->Cell(20 ,5,'TELECOM X isipareigoja:',0,1, 'C');

$pdf->SetFont('Times','', 12);
$pdf->Cell(85);
$pdf->Cell(20 ,5,'Teikti klientui idiegtas paslaugas pagal sutarties salygas.',0,1, 'C');
$pdf->Cell(10 ,10,'',0,1);

// Klientas isipareigoja
$pdf->SetFont('Times','B', 12);
$pdf->Cell(85);
$pdf->Cell(20 ,5,'Klientas isipareigoja:',0,1, 'C');

$pdf->SetFont('Times','', 12);
$pdf->Cell(10);
$pdf->Cell(10,5,'Kiekviena menesi sumoketi TELECOM X uz irengini (jei isigijo) - ' . $menesine_kaina . 'eur/men ir uz plana -',0,1,);
$pdf->Cell(10);
$pdf->Cell(10, 5,$planas['mokestis'] . 'eur/men.',0,1);
$pdf->Cell(10 ,10,'',0,1);

//Kliento paslaugos ir irenginiai
$pdf->SetFont('Times','B', 12);
$pdf->Cell(85);
$pdf->Cell(20 ,5,'Kliento uzsakytos paslaugos ir irenginiai:',0,1, 'C');
$pdf->Cell(10);

$pdf->SetFont('Times','', 12);
$pdf->Cell(10,5,'Irenginys - ' . $sutartis["irenginys"] . ';',0,1,);
$pdf->Cell(10);
$pdf->Cell(10,5,'Planas - '. $sutartis["planas"] . ';',0,1,);
$pdf->Cell(10);
$pdf->Cell(10,5,'Irenginio pilna kaina - '. $irenginys['kaina'] . ' eur;',0,1,);
$pdf->Cell(10);
$pdf->Cell(10,5,'Plano menesine kaina - ' . $planas['mokestis'] . ' eur/men;',0,1,);
$pdf->Cell(10 ,20,'',0,1);

//parenge, pabaiga
$pdf->Cell(10);
$pdf->Cell(10,5,'Sutarties pabaiga - '. $sutartis["galiojimas"],0,1,);
$pdf->Cell(10);
$pdf->Cell(10,5,'Sutarti parenge darbuotojas - '. $darbuotojas['vardas'] . " " . $darbuotojas['pavarde'],0,1,);

    }
}
    
else {
        echo "Rezultatų nėra <br>";
    }

$pdf->Output();
?>