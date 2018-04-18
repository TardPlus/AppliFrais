<?php
/** 
 * Contient la division pour le sommaire, sujet à des variations suivant la 
 * connexion ou non d'un utilisateur, et dans l'avenir, suivant le type de cet utilisateur 
 * @todo  RAS
 */

?>
    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    <?php      
      if (estVisiteurConnecte() ) {
          $idUser = obtenirIdUserConnecte() ;
          $lgUser = obtenirDetailVisiteur($idConnexion, $idUser);
          $nom = $lgUser['nom'];
          $prenom = $lgUser['prenom'];
          $type = $lgUser['fonction']  ;       
     // affichage des éventuelles erreurs déjà détectées
          if ( nbErreurs($tabErreurs) > 0 ) {
              echo toStringErreurs($tabErreurs) ;
          } 

    ?>
        <h2>
    <?php  
            echo "Bienvenue </br> <h3>";
            echo $nom . " " . $prenom ;
            echo "</h3>";
            if ($type == "V"){
              echo " </br></br> <h3>Statut : Visiteur</h3>";
            }
            elseif ($type == "C") {
              echo "<h3>Statut : Comptable</h3>";
            }
    ?>
        </h2>
              
    <?php
       }
    ?>  
      </div>  
<?php      
  if ($type=="V")  {
?>
        <ul id="menuList">
           <li class="smenu">
              <a href="cAccueil.php" title="Page d'accueil">Accueil</a>
           </li>
           <li class="smenu">
              <a href="cSeDeconnecter.php" title="Se déconnecter">Se déconnecter</a>
           </li>
           <li class="smenu">
              <a href="cSaisieFicheFrais.php" title="Saisie fiche de frais du mois courant">Saisie fiche de frais</a>
           </li>
           <li class="smenu">
              <a href="cConsultFichesFrais.php" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
           </li>
         </ul>
<?php         
  }
  if ($type=="C"){
    ?>
    <ul id="menuList">
           <li class="smenu">
              <a href="cAccueil.php" title="Page d'accueil">Accueil</a>
           </li>
           <li class="smenu">
              <a href="cSeDeconnecter.php" title="Se déconnecter">Se déconnecter</a>
           </li>
           <li class="smenu">
              <a href="cValiderFichesFrais.php" title="Saisie fiche de frais du mois courant">Valider fiche de frais</a>
           </li>
           <li class="smenu">
              <a href="cSuivrePaiementFichesFrais.php" title="Consultation de mes fiches de frais">Suivre paiement fiches de frais</a>
           </li>
         </ul>
  <?php  
         
  }
        
?>
    </div>
    