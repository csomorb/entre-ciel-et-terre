<?php
include("head.php");
var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nom = test_input($_POST["nom"]);
	$lien = $_POST["lien"];
	$descr =  nl2br(test_input($_POST["descr"]));
	$date = test_input($_POST["date"]);
	$type = "video";
	if (!empty($cim)){
		$req = $bdd->prepare("INSERT INTO media (datum, nom, content, type, descr) VALUES (:datum, :nom, :content, :type, :descr)");
		$req->execute(array(
			'nom' => $cim,
			'datum' => $datum,
			'content' => $content,
			'type' => $type,
			'descr' => $desc
		));
	}
	echo "<div class=\"alert alert-success\"><strong>Sikerült!</strong> Sikeres volt a video feltöltés</div><a type=\"button\" class=\"btn btn-info\" href=\"index.php\">Vissza a főmenühöz</a>";
}
?>
<h1 class="title">Ajouter une vidéo</h1>
  <form role="form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
    <div class="field">
      <label class="label">Nom de la vidéo</label>
      <p class="control">
        <input class="input is-info" type="text" placeholder="Entrer un nom pour la vidéo" name="nom">
      </p>
    </div>
    
    <div class="field">
      <label class="label">Lien Youtube</label>
      <p class="control">
        <input class="input is-info" type="text" placeholder="Youtube -> Partager / Share-> Intégrer / Embed" name="lien">
      </p>
    </div>
    
    <div class="field">
      <label class="label">Description</label>
      <p class="control">
        <textarea class="textarea is-info" placeholder="Description de la vidéo" name="descr"></textarea>
      </p>
    </div>
    
    <div class="field">
      <label class="label">Date</label>
      <p class="control">
        <input class="input is-info" placeholder="Date" name="date" id="datepicker"></textarea>
      </p>
    </div>
  
  <button type="submit" class="button is-info" name="add" value="had">Ajouter</button>
</form>
<br/><br/>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
  $(function() {
    $( "#datepicker" ).datepicker();
	$( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
  });
  </script>

<?php
include("foot.php");
?>