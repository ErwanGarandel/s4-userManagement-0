<!DOCTYPE html>
<html>
<head>
	<title>DELETE</title>
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

//$verif=$bdd->query('SELECT id from ROLE ro join USER us on us.idrole = ro.id where us.idrole!="null"');
//while ($donnees = $verif->fetch()) {
//	echo $donnees['ro.id'];
//	echo "<br />";
//}
//$verif->closeCursor();

if (isset($_POST['id'])){
$delete = $bdd->query('DELETE FROM ROLE WHERE id="'.$_POST['id'].'"');
$delete->closeCursor();
}
else {
	echo 'les variables du formulaires ne sont pas déclarées';
}

//Laisser le temps -> 1 seconde, à l'utilisateur de voir sa modification
sleep(1);
header('Location: delete.php');

?>

</body>
</html>