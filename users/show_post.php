<!DOCTYPE html>
<html>
<head>
	<title>SHOW_POST</title>
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

//Insertion du role 
$req =$bdd->prepare('SELECT lastname from USER where lastname="'.$_POST['lastname'].'" ');
$req->execute(array($_POST['lastname']));
while ($donnees=$req->fetch()) {
	echo $donnees['lastname'];
}
$req->closeCursor();
//Redirection vers la page add.php
header('Location: show.php');
?>
</body>
</html>