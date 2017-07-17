<?php
include("head.php");
//suppression de la restauration
include('../pages/connect.php'); //problème d'inclusion dans head
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (! empty($_POST)){
		foreach( $_POST as $cle=>$value ){
		    $id=test_input($_POST[$cle]);
		    // on récupère le nom des images
		    $req2 = $bdd->prepare('SELECT * FROM media WHERE id = :id');
			$req2->execute(array(
			    'id' => $id
			));
		    while ($data2 = $req2->fetch()){
		        if(strcmp($data2['type'],"cikk") == 0 ){
    		        // récupération des id 
    		        $id_image = $data2['content'];
    		        /*On récupère le nom de l'image*/
        			$req = $bdd->prepare('SELECT * FROM image WHERE id = :id');
        			$req->execute(array(
        			    'id' => $id_image
        			));
        			$data = $req->fetch();
        			/*Suppression des fichiers sur le disque*/
        			unlink('../img/'.$data['nom']);
        			unlink('../img/m_'.$data['nom']);
        			/*Supressions de l'image de la table image*/
        			$req = $bdd->prepare('DELETE FROM image WHERE id = :id');
        			$req->execute(array(
        			    'id' => $id_image
        			));	
		        }
		    }
		    /*Supressions de la table media*/
    		$req = $bdd->prepare('DELETE FROM video WHERE id = :id');
    		$req->execute(array(
    			    'id' => $id
    		));	
		}
		echo "<div class=\"notification is-success\"><button class=\"delete\"></button><strong>Ca a marché!</strong><span class=\"black\">Vidéo supprimé</span></div><a type=\"button\" class=\"button is-info\" href=\"index.php\">Retour menu</a>";
}
}



?>
<h1 class="text-center">Suppression de vidéo</h1>

<form role="form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8" class="flex-container">
<?php
$reponse = $bdd->query("SELECT * FROM video ORDER BY id DESC");
while ($donnees = $reponse->fetch()){
?>	
	<div class="checkbox delete">
		<label><input type="checkbox" name="id_<?php echo $donnees['id']?>" value="<?php echo $donnees['id']?>">
		<p><span class="lead"><?php echo $donnees['titre']?></span><br/><?php echo $donnees['descr']?></p>
                echo "<div class=\"videoWrapper\">".$donnees['lien']."</div>";
?>	
		</label>
	</div>
<?php		
}
$reponse->closeCursor();
?>
<button type="submit" class="btn btn-danger">Supprimer la vidéo</button>
</form>
<br/>
<script>
	$(function() {

    var $allVideos = $("iframe[src^='//player.vimeo.com'], iframe[src^='//www.youtube.com'], object, embed"),
    $fluidEl = $("figure");

	$allVideos.each(function() {

	  $(this)
	    // jQuery .data does not work on object/embed elements
	    .attr('data-aspectRatio', this.height / this.width)
	    .removeAttr('height')
	    .removeAttr('width');

	});

	$(window).resize(function() {

	  var newWidth = $fluidEl.width();
	  $allVideos.each(function() {

	    var $el = $(this);
	    $el
	        .width(newWidth)
	        .height(newWidth * $el.attr('data-aspectRatio'));

	  });

	}).resize();

});
	
	
</script>

<?php
include("foot.php");
?>