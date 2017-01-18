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
echo "<table><thead><th>Nom :</th><th>NBUSER :</th></thead><tr><td>";
while($donnees = $retour_name->fetch())
{
echo "";
echo $donnees['name'];
echo "<br/>";
}
$retour_name->closeCursor(); 
echo "</td></tr></table>";
 #########################

$retour_nb_role=$bdd->query('SELECT count(*) as TOTAL_ROLE from ROLE');
$retour_nb_role->execute();
while($nb_role=$retour_nb_role->fetch()){
	echo "<table><tr><td>NbRole : ";
	echo $nb_role['TOTAL_ROLE']."</td></tr></table>";
	echo "<br/>";
}

##########################

$nb_user=$bdd->query('SELECT count(*) as TOTAL_USER from USER');
$nb_user->execute();
while($nb_userT=$nb_user->fetch()){
	echo "<table><tr><td>NbRole : ";
	echo $nb_userT['TOTAL_USER']."</td></tr></table>";
	echo "<br/>";
}

############################
$nb_admin=$bdd->query('SELECT count(*) as TOTAL_ADMIN , name from USER us join ROLE ro on us.id=ro.id where name="admin"');
$nb_admin->execute();
while($nb_adminA=$nb_admin->fetch()){
	echo "<table><tr><td>NbRole : ";
	echo $nb_adminA['TOTAL_ADMIN'];
	echo "&nbsp;&nbsp;&nbsp		Name : ".$nb_adminA['name']."</td></tr></table>";
	echo "<br/>";
}
?>
</body>
</html>


