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

echo "test<br/>";
/*$array = array("foo", "bar", "hello", "world");
var_dump($array);
 #######################*/
$retour_name=$bdd->query('SELECT * from ROLE');

//$retour_name->execute();
//$donnees = $retour_name ->fetch();
while($donnees = $retour_name->fetch())
{
echo "Nom : ";
echo $donnees['name'];
echo "<br />";
}
$retour_name->closeCursor(); 

?>
