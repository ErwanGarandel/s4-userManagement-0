<!DOCTYPE html>
<html>
<head>
	<title>Ajout</title>
</head>
<style type="text/css">
#form, p
{
	text-align : center;
}
</style>
<body>
<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=phalcon-td0;charset=utf8', 'root', '');

}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// fonction me permettant de remplacer tous les caracteres non alphanumériques, et ensuite les mettre en majuscule
function garde_alphanumerique( $chaine )
{
  return preg_replace(" /[^A-Z0-9]/i", "", strtoupper($chaine));
}

function recherche( $sujet, $pattern )
{
  return strstr(preg_replace(" /[^A-Z0-9]/i", "", strtoupper($sujet)), $pattern) != false;
}
?>
<form action="add_post.php" method="post">
	<p>
		<label for="id">ID : </label> <input type="text" name="id" id="id" /></br />
		<label for="name">Name : </label> <input type="text" name="name" id="name" /></br />
	<br />
		<input type="submit" name="Envoyer">
	</p>
	</form>
<?php
$reponse = $bdd->query('SELECT id, name FROM ROLE ORDER BY ID DESC');
while($donnees = $reponse->fetch())
{
	echo '<p><strong>'.htmlspecialchars($donnees['id']).'</strong> : '.htmlspecialchars(filter_var($donnees['name'], FILTER_SANITIZE_STRING)).'</p>';
$MaVariableRecupere = $donnees['name'];
$MaVariableRecupere = garde_alphanumerique( $MaVariableRecupere );
//Exemple de filtre
if(recherche( $MaVariableRecupere, "test" ) || recherche( $MaVariableRecupere, "lul" ))
{
  echo "gros noob";
}
}


$reponse->closeCursor();
/*Requete insertion basique -> Ajouter 1 role prédéfini
$bdd->exec('INSERT INTO ROLE(id, name) VALUES(\'4\',\'ErwanAdmin\')');
echo "Le Nouveau role à bien été ajouté";
*/
?>
</body>
</html>