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
$req =$bdd->prepare('INSERT INTO ROLE(id, name) VALUES(?, ?)');
$req->execute(array($_POST['id'],$_POST['name']));

$req->closeCursor();
//Redirection vers la page add.php
header('Location: add.php');
?>