<!DOCTYPE html>
<html>
<head>
	<title>Affichage d'une personne</title>
</head>
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
?>
<form action="show_post.php" method="post">
<legend>Chercher User par son nom</legend>
	<p>
		<label for="name">Name : </label> <input type="text" name="name" id="name" /></br />
	<br />
		<input type="submit" name="Envoyer">
	</p>
	</form>

<?php
$retour_name=$bdd->query('SELECT lastname from USER');
/*while($donnees = $retour_name->fetch())
{
	echo $donnees['lastname'];
	echo "<br />";
}*/
$retour_name->closeCursor();
?>
</body>
</html>