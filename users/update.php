<!DOCTYPE html>
<html>
<head>
	<title>Modification</title>
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
<?php
$reponse = $bdd->query('SELECT id, firstname FROM USER ORDER BY ID aSC');
while ($donnees = $reponse->fetch())
{
	?>
	<div class="new_prenom">
		<h3>
		ID >
		<?php echo htmlspecialchars($donnees['id']); ?>
		: 
		<em> <?php echo $donnees['firstname']; ?></em>
		</h3>
		<p>
		<?php
			echo nl2br(htmlspecialchars($donnees['firstname']));
		?> 
		<br />
		</p>
	</div>

	<?php
}
	$reponse->closeCursor();
?>
<form action="update_post.php" method="post">
<legend>Changer Prénom</legend>
	<p>
		<label for="id">ID : </label> <input type="text" name="id" id="id" /></br />
		<label for="nvprenom">New_Prenom : </label> <input type="text" name="nvprenom" id="nvprenom" /></br />
	<br />
		<input type="submit" name="Envoyer">
	</p>
</form>
</body>
</html>