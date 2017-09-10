<?php
include("head.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $lien = base64_decode($_POST["lien"]);
	$nom = test_input($_POST["nom"]);
/*	$lien = $_POST["lien"];*/
	$descr =  nl2br(test_input($_POST["descr"]));
	$date = test_input($_POST["date"]);
	if (!empty($lien)){
		$req = $bdd->prepare("INSERT INTO carnet (datecr, titre, contenu, descr,type) VALUES (:datecr, :titre, :lien, :descr, :type)");
		$req->execute(array(
			'datecr' => $date,
			'titre' => $nom,
			'lien' => $lien,
			'descr' => $descr,
			'type' => "video"
		));
	}
	echo "<div class=\"notification is-success\"><button class=\"delete\"></button><strong>Ca a marché!</strong><span class=\"black\">Vidéo chargé</span></div><a type=\"button\" class=\"button is-info\" href=\"index.php\">Retour menu</a>";
}
?>
<h1 class="title">Ajouter une vidéo</h1>
  <form role="form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
    <div class="form-group">
      <label for="titre">Titre</label>
      <input type="text" class="form-control" id="titre" name="nom">
  </div>
    
    <div class="form-group">
      <label for="titre">Lien Youtube</label>
      <input type="text" class="form-control" placeholder="Youtube -> Partager / Share-> Intégrer / Embed" name="lien" id="lien">
  </div>
    
    <div class="form-group">
     <label for="comment">Description</label>
      <textarea class="form-control" rows="5" id="comment" name="descr"></textarea>
    </div>
    
    <div class="field">
      <label class="label">Date</label>
      <p class="control">
        <input class="input is-info" placeholder="Date" name="date" id="datepicker"></textarea>
      </p>
    </div>
  
  <button type="submit" class="btn btn-default" name="add" value="had">Ajouter</button>
</form>
<br/><br/>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  	$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
    $('#lien').change(function(){
      
      $('#lien').val($.base64Encode($('#lien').val()));
    });
  	
  });
  </script>

<?php
include("foot.php");
?>