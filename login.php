<?php
session_destroy();

?>

<html>

<form action="webservice_login.php" method="get">

<p><span>login :</span><input type="text" name="login" /> </p>
<p><span>Mot de passe :</span><input type="password" name="mdp" /></p> 

<input type="submit" value="Connexion" />
</form>

</html>