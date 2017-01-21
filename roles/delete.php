<!DOCTYPE html>
<html>
<head>
	<title>Suppression</title>
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
$reponse = $bdd->query('SELECT id, name FROM ROLE ORDER BY ID DESC');
while ($donnees = $reponse->fetch())
{
	?>
	<div class="delete">
		<h3>
		ID >
		<?php echo htmlspecialchars($donnees['id']); ?>
		--------->
		<em> <?php echo $donnees['name']; ?></em>
		</h3>
		<p>
		<?php
			echo nl2br(htmlspecialchars($donnees['name']));
		?> 
		<br />
		</p>
	</div>

	<?php
}
	$reponse->closeCursor();
?>
<form action="delete_post.php" method="post">
	<p>
		<label for="id">ID : </label> <input type="text" name="id" id="id" /><br />
	<br />
		<input type="submit" name="Envoyer" src="icons/page_delete.png" value="Envoyer" OnClick="return confirm('Voulez-vous vraiment supprimer ce Role ?');">
	</p>
</form>
</body>
</html>