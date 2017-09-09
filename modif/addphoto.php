<?php
include("head.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$titre = test_input($_POST["titre"]);
	$date = test_input($_POST["date"]);
	$descr = nl2br(test_input($_POST["descr"]));
	/*Insertion dans le carnet*/
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$req = $bdd->prepare("INSERT INTO carnet (datecr, titre, type, descr) VALUES (:datecr, :titre, :type, :descr)");
	$req->execute(array(
		'datecr' => $date,
		'titre' => $titre,
		'type' => "photo",
		'descr' => $descr
	));
	/*Recherche du dernier id dans le carnet*/
	$reponse = $bdd->query("SELECT * FROM carnet ORDER BY id DESC");
	$donnees = $reponse->fetch();
	$id_carnet = $donnees['id'];
	/*Recherche du dernier nom disponible*/
	$reponse = $bdd->query("SELECT * FROM photo ORDER BY id DESC");
	$donnees = $reponse->fetch();
	$id_photo = $donnees['id']+1;
	$nom_fichier = $donnees['id']+1 .".".strtolower(substr(strrchr($_FILES['photo']['name'],'.'),1));
	$reponse->closeCursor();
	/*Upload et redimentionnemnt des images sur les serveur*/
	$upload1 = upload('photo','../img/'.$nom_fichier,FALSE, array('png','jpg','jpeg','JPG','JPEG','PNG') );
//	$upload2 = upload('photo2','../img/m_'.$nom_fichier,FALSE, array('png','jpg','jpeg','JPG','JPEG','PNG') );
	if ($upload1 /*&& $upload2*/) $msg = "<div class=\"alert alert-success\"><strong>Ca a marché! </strong> Imagge publié</div><a type=\"button\" class=\"btn btn-info\" href=\"index.php\">Retour au menu</a>";
	else $msg = "<div class=\"alert alert-danger\">Echèc de l'upload de l'image</div>";
//	echo $msg;
 //redimentionnement
// ini_set("display_errors",true);
//	if (!fct_redim_image(1200,0,'','','../img/',$nom_fichier)) $msg.=""; //échec du redimentionnement 1200
//	if (!fct_redim_image(250,0,'','m_'.$nom_fichier,'../img/',$nom_fichier)) $msg.=" echec du redimentionnement de l'image pour le 250";
	echo $msg;
	/*Récupérer la hauteur et la largeur*/
	list($width, $height, $type, $attr) = getimagesize('../img/'.$nom_fichier);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$req = $bdd->prepare("INSERT INTO photo (id_carnet, nom, largeur, hauteur, descr) VALUES (:id, :nom, :largeur, :hauteur, :descr)");
	$req->execute(array(
	  'id' => $id_carnet,
    'nom' => $nom_fichier,
    'largeur' => $width,
    'hauteur' => $height,
	  'descr' => $desc
    ));
}

function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
{
   //Test1: fichier correctement uploadé
     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
   //Test2: taille limite
     if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
   //Test3: extension
     $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
     if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
   //Déplacement
     return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
}

?>

<h1 class="text-center">Ajouter des photos</h1>

  <form role="form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
  <div class="form-group">
    <label for="titre">Titre</label>
    <input type="text" class="form-control" id="titre" name="titre">
  </div>
    
    <div class="form-group">
      <label for="input-id">Image</label>
      <input id="input-id" type="file" class="file" accept="image/*" data-preview-file-type="text" required name="photo">
    </div>
  
    <div class="form-group">
     <label for="comment">Description</label>
      <textarea class="form-control" rows="5" id="comment" name="descr"></textarea>
    </div>
    
    <div class="form-group">
     <label for="comment">Date</label>
        <input class="input is-info" placeholder="Date" name="date" id="datepicker" type="text" required></input>
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
  	
  	$("#input-id").fileinput({
    	uploadLabel: "",
    	removeLabel: "Effacer",
    	browseLabel: "Chaner l'image",
    	uploadClass: "display-none"
    });
  	
  });
  </script>
<?php
include("foot.php");
?>