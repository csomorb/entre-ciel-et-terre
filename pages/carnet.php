 <div class="titre-div">
        <div>
            <a href="/accueil">
            <img src="./img/logo.jpg" class="logo" /> 
            </a>
        </div>
        <div class="titre">
            <div>
                <h1 class="title has-text-centered">Entre terre et ciel</h1>
                <h2 class="subtitle has-text-centered" id="ss-titre">Carnet de route</h2>
            </div>
        </div>
    </div>
<div class="container">  

<?php
include('connect.php');
$reponse = $bdd->query('SELECT * FROM carnet ORDER BY datecr DESC');
while ($donnees = $reponse->fetch()){
	if ($donnees['type'] == "video"){
		echo "<h3 class=\"margin_bottom_20\">".$donnees['titre']."</h3>\n";
		echo "<div class=\"videoWrapper margin_bottom_20\">".$donnees['lien']."</div>";
		echo "\n<p class=\"text_right\">".$donnees['datecr']."</p><hr/>\n";
		echo "\n<p>".$donnees['descr']."</p>\n";
	}
	else if($donnees['type'] == "photo"){
		echo "<h3 class=\"margin_bottom_20\">".$donnees['titre']."</h3>\n";
		echo "\n<p class=\"text_right\">".$donnees['datecr']."</p><hr/>\n";
		echo "\n<p>".$donnees['descr']."</p>\n";
	}
	else{
		echo "<h3 class=\"margin_bottom_20\">".$donnees['titre']."</h3>\n";
		echo "\n<p class=\"text_right\">".$donnees['datecr']."</p><hr/>\n";
		echo "\n<p>".$donnees['descr']."</p>\n";
	}
}
?>

</div>
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

