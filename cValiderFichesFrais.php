<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Saisir fiche de frais"
 * @package default
 * @todo  RAS
 */
  $repInclude = './include/';
  require($repInclude . "_init.inc.php");

  // page inaccessible si visiteur non connecté
  if (!estVisiteurConnecte()) {
      header("Location: cSeConnecter.php");  
  }
  require($repInclude . "_entete.inc.html");
  require($repInclude . "_sommaire.inc.php");
?>



  <!-- Division principale -->
  <div id="contenu">
  		<h2> Valider les fiches frais de client </h2>

  
  		<h3>Client à sélectionner : </h3>
      <form action="" method="post">
      <div class="corpsForm">
          <input type="hidden" name="etape" value="validerConsult" />
      <p>
        <label for="lsUser">Client : </label>
        <select id="lsUser" name="lsUser" title="Sélectionnez le client souhaité pour la fiche de frais">
            <?php
                // on propose tous les mois pour lesquels le visiteur a une fiche de frais
                $req = "SELECT id, nom, prenom FROM Visiteur WHERE fonction='V' ";
                $res = mysqli_query($idConnexion, $req);
                $record = mysqli_fetch_assoc($res);
           while ( is_array($record) ) { 
                $nom = $record['nom'];
                $prenom = $record['prenom'];
                $id = $record['id'];
            ?> 
            <option value="<?php echo $id ?>" selected="selected"> <?php echo $prenom.' '. $nom ?></option>
            <?php
                         $record = mysqli_fetch_assoc($res);
                }           
              
            ?>
        </select>
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" name="validUser"
               title="Demandez à consulter cette fiche de frais" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>
      <?php
      if(isset($_POST['validUser']) ){
        $idUser = $_POST['lsUser'];
        $_SESSION['id']=$idUser;
        ?>

        <form action="" method="post">
      <div class="corpsForm">
          <input type="hidden" name="etape" value="validerConsult" />
      <p>
        <label for="lstMois">Mois : </label>
        <?php echo $idUser;?>
        <select id="lstMois" name="lstMois" title="Sélectionnez le mois souhaité pour la fiche de frais">
        <option value="0" selected disabled> selectionner un mois</option>
            <?php
                // on propose tous les mois pour lesquels le visiteur a une fiche de frais
                $req ="SELECT mois FROM fichefrais WHERE idVisiteur ='".$idUser."' "; 
                $idJeuMois = mysqli_query( $idConnexion, $req);
                $lgMois = mysqli_fetch_assoc($idJeuMois);
                while ( is_array($lgMois) ) {
                    $mois = $lgMois["mois"];
                    $noMois = intval(substr($mois, 4, 2));
                    $annee = intval(substr($mois, 0, 4));

            ?>    
            <option value="<?php echo $mois; ?>"<?php if ($moisSaisi == $mois) { ?> selected="selected"<?php } ?>><?php echo obtenirLibelleMois($noMois) . " " . $annee; ?></option>
            <?php
                    $lgMois = mysqli_fetch_assoc($idJeuMois);        
                }
                mysqli_free_result($idJeuMois); 
            ?>
        </select>
        <?php
          echo $req;
        ?>
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" name="validerMois"
               title="Demandez à consulter cette fiche de frais" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>
      
      <?php
}

    if(isset($_POST['validerMois']) ){
        $idUser=$_SESSION['id'];
        $idMois = $_POST['lstMois'];
        ?>
         <h3>Fiche de frais du mois de <?php echo  $idMois; ?> : 
    <em><?php echo $tabFicheFrais["libelleEtat"]; ?> </em> 
    </h3>
    <div class="encadre">
    <p>Montant validé : <?php echo $tabFicheFrais["montantValide"] ;
        ?>              
    </p>
    <?php
    }
        ?>

  </div>

<?php        
  require($repInclude . "_pied.inc.html");
  require($repInclude . "_fin.inc.php");
?> 