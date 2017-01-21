<!DOCTYPE html>
<html>
<head>
	<title>Modif</title>
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

if (isset($_POST['nvprenom']) && isset($_POST['id'])){


$update = $bdd->query('UPDATE USER SET firstname="'.$_POST['nvprenom'].'" WHERE id="'.$_POST['id'].'"');
$update->closeCursor();
echo 'Le nouveau nom de '.$_POST['id'].' est : '.$_POST['nvprenom'];
}
else {
	echo 'les variables du formulaires ne son pas déclarées';
}

//Laisser le temps -> 1 seconde, à l'utilisateur de voir sa modification
sleep(1);
header('Location: update.php');
?>


</body>
</html>