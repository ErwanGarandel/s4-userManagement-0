<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="sheet.css" >
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
<th>Nom</th>
<th>NombreUtilisateur</th>
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
echo "<td>";
$nb_admin=$bdd->query('SELECT count(*) as TOTAL_ADMIN , name from USER us join ROLE ro on us.idrole=ro.id where name="admin" group by name');
while($nb_adminA=$nb_admin->fetch()){
	echo "NbRoleAdmin : ";
	echo $nb_adminA['TOTAL_ADMIN'];
	echo "&nbsp;&nbsp;&nbsp		Name : ".$nb_adminA['name'];
	echo "<br/>";
}
$nb_admin->closeCursor();
################################################################
$nb_simpleUser=$bdd->query('SELECT count(*) as TOTAL_SIMPLEUSER, name from USER us join ROLE ro on us.idrole=ro.id where name="user" group by name');
while($nb_simpleUserU=$nb_simpleUser->fetch()){
	echo "NbRoleSimpleUser : ";
	echo $nb_simpleUserU['TOTAL_SIMPLEUSER'];
	echo "&nbsp;&nbsp;&nbsp		Name : ".$nb_simpleUserU['name'];
	echo "<br/>";
}
$nb_simpleUser->closeCursor();
###################################################
$nb_superAdmin=$bdd->query('SELECT count(*) as TOTAL_SUPERADMIN, name from USER us join ROLE ro on us.idrole=ro.id where name="superadmin" group by name');
while($nb_SA=$nb_superAdmin->fetch()){
	echo "NbSuperAdmin : ";
	echo $nb_SA['TOTAL_SUPERADMIN'];
	echo "&nbsp;&nbsp;&nbsp		Name : ".$nb_SA['name'];
	echo "<br/>";
}
echo "</td></tr>";
echo "</tbody>";
###################
echo "<tfoot><tr><td>";
$retour_nb_role=$bdd->query('SELECT count(*) as TOTAL_ROLE from ROLE');
$retour_nb_role->execute();
while($nb_role=$retour_nb_role->fetch()){
	echo "NbRole : ";
	echo $nb_role['TOTAL_ROLE']."<br/>";
}
echo "</td>";
$retour_nb_role->closeCursor();
####################################
echo "<td>";
$nb_user=$bdd->query('SELECT count(*) as TOTAL_USER from USER');
while($nb_userT=$nb_user->fetch()){
	echo "NbUserTotal : ";
	echo $nb_userT['TOTAL_USER']."<br/>";
}
echo "</td></tr></tfoot>";
$nb_user->closeCursor();
?>
</body>
</html>
