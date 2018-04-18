<?php
session_start();
	$hote = "localhost";
    $login = "root";
    $mdp = "root";
    $bd = 'gsb_frais';
    $mysqli= mysqli_connect($hote, $login, $mdp, $bd);

$idVis=$_SESSION['idVisiteur'];
$mois=date("Ym");


$JSON=$_GET['JSON'];
$json=json_decode($JSON);
    $verif = $json->verif;
if($verif==1){
	$etape=$json->etape;
	$km=$json->km;
	$nuitee=$json->nuitee;
	$resto=$json->resto;
	$req="INSERT INTO `lignefraisforfait` (`idVisiteur`, `mois`, `idFraisForfait`, `quantite`) VALUES ('$idVis','$mois','ETP','$etape'),('$idVis','$mois','KM','$km'),('$idVis','$mois','NUI','$nuitee'),('$idVis','$mois','REP','$resto')";
	mysqli_query($mysqli, $req);
}elseif($verif==2){
	$date=$json->date;
	$libelle=$json->libelle;
	$montant=$json->montant;
	$req="INSERT INTO `lignefraishorsforfait` (`idVisiteur`, `mois`, `libelle`, `date`, `montant`) VALUES ('$idVis','$mois','$libelle','$date','$montant')";
	mysqli_query($mysqli, $req);
}else{
	header('Location: ../appliFrais/insertfichefrais.php');
}



?>