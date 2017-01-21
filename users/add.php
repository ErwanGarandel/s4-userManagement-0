<!DOCTYPE html>
<html>
<head>
	<title>Ajout</title>
</head>
<style type="text/css">
#form, p
{
	text-align : center;
}
</style>
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
?>
<form action="add_post.php" method="post">
	<p>
		<label for="id">id : </label> <input type="number" name="id" id="id" /></br />
		<label for="login">login : </label> <input type="email" name="login" id="login" /></br />
		<label for="firstname">firstname : </label> <input type="text" name="firstname" id="firstname" /></br />
		<label for="lastname">lastname : </label> <input type="text" name="lastname" id="lastname" /></br />
		<label for="email">email : </label> <input type="email" name="email" id="email" /></br />
		<label for="password">password : </label> <input type="password" name="password" id="password" /></br />		
		<label for="image">image : </label> <input type="text" name="image" id="image" /></br />
		<label for="idrole">idrole : </label> <input type="number" name="idrole" id="idrole" /></br />	
	<br />
		<input type="submit" name="Envoyer">
	</p>
	</form>
<?php
$reponse=$bdd->query('SELECT id, login, firstname, lastname, email, image, idrole, password from USER order by id');
while($donnees = $reponse->fetch())
{
	echo '<p><strong>'.htmlspecialchars($donnees['id']).'</strong> : '.htmlspecialchars(filter_var($donnees['firstname'], FILTER_SANITIZE_STRING)).'</p>';
}
$reponse->closeCursor();
?>
</body>
</html>