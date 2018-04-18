<?php

    $hote = "localhost";
    $login = "root";
    $mdp = "root";
    $bd = 'gsb_frais';
    $mysqli= mysqli_connect($hote, $login, $mdp, $bd);
session_start();
$_SESSION['login']=$_GET['login'];
$_SESSION['mdp']=$_GET['mdp'];

$logins=$_SESSION['login'];
$mdps=$_SESSION['mdp'];






$requete=mysqli_query($mysqli, "select * from Visiteur");

while($req=mysqli_fetch_assoc($requete)){
	if($req['login'] == $logins && $req['mdp'] == $mdps){
		echo "<p><b>Récupération GET</b><br /><br />";
		echo "Nom : ".$req['nom']."<br />";
		echo "Prénom : ".$req['prenom']."<br />";
		echo "Login : ".$req['login']."<br />";
		echo "MDP : ".$req['mdp']."<br /></p>";
		break;
	}
}
$_SESSION['idVisiteur']=$req['id'];

echo "<b>Renvoie en JSON</b><br /><br />";
$data = array();
$data["Nom"]  = $req['nom'];
$data["Prenom"]  = $req['prenom'];
$data["Login"] = $req['login'];
$data["mdp"] = $req['mdp'];
$JSON = json_encode( $data );
echo $JSON;

header('Location: ../appliFrais/cSeConnecter2.php?JSON='.$JSON);

?>