<?php
include("head.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (! empty($_POST)){
		foreach( $_POST as $cle=>$value ){
		    $id=test_input($_POST[$cle]);
    		$req = $bdd->prepare('DELETE FROM carnet WHERE id = :id');
    		$req->execute(array(
    			    'id' => $id
    		));	
		}
		echo "<div class=\"notification is-success\"><button class=\"delete\"></button><strong>Ca a marché!</strong><span class=\"black\">Message supprimé</span></div><a type=\"button\" class=\"button is-info\" href=\"index.php\">Retour menu</a>";
}
}

?>
<h1 class="text-center">Suppression de messages</h1>

<form role="form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
<?php
$reponse = $bdd->query("SELECT * FROM carnet WHERE type = 'message' ORDER BY datecr DESC");
while ($donnees = $reponse->fetch()){
?>	
	<div>
		<input type="checkbox" name="id_<?php echo $donnees['id']?>" value="<?php echo $donnees['id']?>">
		<div class="delete_message_p">
			<h3><?php echo $donnees['titre']?></h3>
			<?php echo $donnees['descr']?>
		</div>
	</div>
<?php		
}
$reponse->closeCursor();
?>
<br/>
<br/>
<button type="submit" class="btn btn-danger">Supprimer le message</button>
</form>
<br/>

<?php
include("foot.php");
?>