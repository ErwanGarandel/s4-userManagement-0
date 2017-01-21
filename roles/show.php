<!DOCTYPE html>
<html>
<head>
	<title>Roles</title>
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
echo "<table><thead>
<tr>
<th>Role</th>
<th>NombreRole</th>
</tr></thead>";

echo "<tbody><tr><td>";
$retour_name=$bdd->query('SELECT * from ROLE');
while($donnees = $retour_name->fetch())
{
echo $donnees['name'];
echo "<br/>";
}
echo "</td>";
$retour_name->closeCursor(); 
################################################################
?>
</body>
</html>
