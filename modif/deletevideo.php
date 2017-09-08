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
		echo "<div class=\"notification is-success\"><button class=\"delete\"></button><strong>Ca a marché!</strong><span class=\"black\">Vidéo supprimé</span></div><a type=\"button\" class=\"button is-info\" href=\"index.php\">Retour menu</a>";
}
}



?>
<h1 class="text-center">Suppression de vidéo</h1>

<form role="form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
<?php
$reponse = $bdd->query("SELECT * FROM carnet WHERE type = 'video' ORDER BY id DESC");
while ($donnees = $reponse->fetch()){
?>	
	<div>
		<input type="checkbox" name="id_<?php echo $donnees['id']?>" value="<?php echo $donnees['id']?>">
		<p><span class="subtitle"><?php echo $donnees['titre']?></span><br/><?php echo $donnees['descr']?></p>
    <?php        echo "<div class=\"videoWrapper margin_bottom_20\">".$donnees['contenu']."</div>";
?>	
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