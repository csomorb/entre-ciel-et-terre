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
		echo "<div class=\"notification is-success\"><button class=\"delete\"></button><strong>Ca a marché!</strong><span class=\"black\">Photo supprimé</span></div><a type=\"button\" class=\"button is-info\" href=\"index.php\">Retour menu</a>";
    }
}
?>

<h1 class="text-center">Suppression de photos</h1>

<form role="form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
<?php
$reponse = $bdd->query("SELECT * FROM carnet WHERE type = 'photo' ORDER BY id DESC");
while ($donnees = $reponse->fetch()){
?>	
	<div>
		<input type="checkbox" name="id_<?php echo $donnees['id']?>" value="<?php echo $donnees['id']?>">
		<div class="delete_message_p"><h3><?php echo $donnees['titre']?></h3>
		<?php echo $donnees['descr']?>
<?php   $reponse2 = $bdd->query("SELECT * FROM photo WHERE id_carnet = '"+$donnees['id']+"' ORDER BY id DESC");
        while ($donnees2 = $reponse2->fetch()){
            // on rajoute les images
            <img >    
        }
?>		
		</div>
	</div>
<?php		
}
$reponse->closeCursor();
?>
<button type="submit" class="btn btn-danger">Supprimer photo</button>
</form>


<?php
include("foot.php");
?>