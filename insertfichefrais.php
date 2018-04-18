<html>
<?php
$verifForm=$_GET['numForm'];

$data= array();
if($verifForm==1){
	$data['etape']=$_GET['forfaitE'];
	$data['km']=$_GET['FraisKm'];
	$data['nuitee']=$_GET['NuitHotel'];
	$data['resto']=$_GET['Resto'];
	$data['verif']=$verifForm;
	$JSON=json_encode($data);
	header('Location: ../appliFrais/insertionFiche.php?JSON='.$JSON);

}elseif($verifForm==2){
	$data['date']=$_GET['Date'];
	$data['libelle']=$_GET['Libelle'];
	$data['montant']=$_GET['Montant'];
	$data['verif']=$verifForm;
	$JSON=json_encode($data);
	header('Location: ../appliFrais/insertionFiche.php?JSON='.$JSON);


}else{

?>

<form action="insertfichefrais.php" method="get">

<p><span>Forfait étape :</span><input type="text" name="forfaitE" /> </p>
<p><span>Frais kilométrique :</span><input type="text" name="FraisKm" /></p> 
<p><span>Nuitée Hôtel :</span><input type="text" name="NuitHotel" /></p> 
<p><span>Repas restaurant :</span><input type="text" name="Resto" /></p> 
<input type="text" name="numForm" value="1" hidden /></p> 

<input type="submit" value="Insertion" />
</form>


<form action="insertfichefrais.php" method="get">

<p><span>Date :</span><input type="date" name="Date" /></p> 
<p><span>Libellé :</span><input type="text" name="Libelle" /></p> 
<p><span>Montant :</span><input type="text" name="Montant" /></p> 
<input type="text" name="numForm" value="2" hidden /></p> 

<input type="submit" value="Insertion" />
</form>

<?php
}
?>

</html>