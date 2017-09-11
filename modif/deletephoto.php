<?php
include("head.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (! empty($_POST)){
		foreach( $_POST as $cle=>$value ){
		    $id=test_input($_POST[$cle]);
		    $req = $bdd->prepare('SELECT * FROM photo WHERE id_carnet = :id');
    		$req->execute(array(
    			    'id' => $id
    		));
    		while( $data = $req->fetch()){
    			unlink('../img/'.$data['nom']);	
    		}
		    $req = $bdd->prepare('DELETE FROM photo WHERE id_carnet = :id');
    		$req->execute(array(
    			    'id' => $id
    		));	
    		$req = $bdd->prepare('DELETE FROM carnet WHERE id = :id');
    		$req->execute(array(
    			    'id' => $id
    		));	
		}
		echo "<br/><div class=\"alert alert-success\"><strong>Ca a marché!</strong>Photo supprimé</div><a type=\"button\" class=\"btn btn-info\" href=\"index.php\">Retour au menu</a>";
    }
}
?>

<h1 class="text-center">Suppression de photos</h1>

<form role="form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
<?php
$reponse = $bdd->query("SELECT * FROM carnet WHERE type = 'photo' ORDER BY id DESC");
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
while ($donnees = $reponse->fetch()){
?>	
	<div>
		<input type="checkbox" name="id_<?php echo $donnees['id']?>" value="<?php echo $donnees['id']?>">
		<div class="delete_message_p"><h3><?php echo $donnees['titre']?></h3>
		<?php echo $donnees['descr']?>
		<br/>
		<div class="de_ph">
<?php   
	$tmp = "SELECT * FROM photo WHERE id_carnet = '".$donnees['id']."' ORDER BY id DESC";
	$req2 = $bdd->query($tmp);
        while ($donnees2 = $req2->fetch()){
            // on rajoute les images
            
            echo '<div><img src="../img/'.$donnees2['nom'].'" class="del_image"></div>';    
        }
?>		</div>
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