<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="sheet.css" 
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

 #######################
$retour_name=$bdd->query('SELECT * from ROLE');

//$retour_name->execute();
//$donnees = $retour_name ->fetch();
while($donnees = $retour_name->fetch())
{
echo "<table><tr><td>Nom : ";
echo "";
echo $donnees['name']."</td><tr>";
echo "</table><br/>";
}
$retour_name->closeCursor(); 
?>
</body>
</html>


