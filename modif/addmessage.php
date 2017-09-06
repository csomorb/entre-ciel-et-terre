<?php
include("head.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$titre = test_input($_POST["titre"]);
	$descr =  nl2br(test_input($_POST["descr"]));
	$date = test_input($_POST["date"]);
	$req = $bdd->prepare("INSERT INTO carnet (datecr, titre, type, descr) VALUES (:datecr, :titre, :type, :descr)");
	$req->execute(array(
		'datecr' => $date,
		'titre' => $titre,
		'type' => "message",
		'descr' => $descr
	));
	echo "<div class=\"notification is-success\"><button class=\"delete\"></button><strong>Ca a marché! </strong><span class=\"black\"> Message posté</span></div><a type=\"button\" class=\"button is-info\" href=\"index.php\">Retour menu</a>";
}
?>

<h1 class="text-center">Ajouter un message</h1>

  <form role="form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8">
    <div class="field">
      <label class="label">Titre</label>
      <p class="control">
        <input class="input is-info" type="text" placeholder="Titre du message" name="titre">
      </p>
    </div>
    
    <div class="field">
      <label class="label">Description</label>
      <p class="control">
        <textarea class="textarea is-info" placeholder="Contenu du message" name="descr"></textarea>
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
    $('#lien').change(function(){
      
      $('#lien').val($.base64Encode($('#lien').val()));
    });
  	
  });
  </script>
<?php
include("foot.php");
?>