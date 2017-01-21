<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
		<link rel="stylesheet" type="text/css" href="../roles/sheet.css" >

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
$retour_name=$bdd->query('SELECT login, firstname, lastname, email, image, idrole from USER');
while($donnees = $retour_name->fetch())
{
echo $donnees['login'];
echo "<br/>";
echo $donnees['firstname'];
echo "<br/>";
echo $donnees['lastname'];
echo "<br/>";
echo $donnees['email'];
echo "<br/>";
echo $donnees['image'];
echo "ROLE : ". $donnees['idrole'];
echo "<br/>";
echo "<br/>";
}
$retour_name->closeCursor(); 
?>
</body>
</html>