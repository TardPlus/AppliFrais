<?php

session_start();
$forfaitE=$_GET['forfaitE'];
$FraisKm=$_GET['FraisKm'];
$NuitHotel=$_GET['NuitHotel'];
$Resto=$_GET['Resto'];

$Date=$_GET['Date'];
$Libelle=$_GET['Libelle'];
$Montant=$_GET['Montant'];

echo "<b>Renvoie en JSON</b><br /><br />";
$data = array();
$data["forfaitE"]  = $forfaitE;
$data["FraisKm"]  = $FraisKm;
$data["NuitHotel"] = $NuitHotel;
$data["Resto"] = $Resto;
$data["Date"] = $Date;
$data["Libelle"] = $Libelle;
$data["Montant"] = $Montant;
$JSON = json_encode( $data );
echo $JSON;

header('Location: ../appliFrais/cSaisieFicheFrais2.php?JSON='.$JSON);

?>