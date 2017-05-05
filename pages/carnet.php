 <div class="titre-div">
        <div>
            <a href="/accueil">
            <img src="./img/logo.jpg" class="logo" /> 
            </a>
        </div>
        <div class="titre">
            <div>
                <h1 class="title has-text-centered">Entre ciel et terre</h1>
                <h2 class="subtitle has-text-centered" id="ss-titre">Carnet de route</h2>
            </div>
        </div>
    </div>
    
    <div class="tile is-ancestor">
        <div class="tile is-parent is-vertical">
            <div class="tile is-child box carre_accueil">
              <p class="title">Nouvelles</p>
            </div>
        </div>  
        <div class="tile is-parent is-vertical">
            <div class="tile is-child box carre_accueil">
              <p class="title">Pauses vidéo</p>
            </div>
        </div>  
        <div class="tile is-parent is-vertical">
            <div class="tile is-child box carre_accueil">
              <p class="title">Fil rouge : la joie de vivre</p>
            </div>
        </div>  
        
    </div>    

<?php
include('connect.php');
$reponse = $bdd->query('SELECT * FROM video ORDER BY datecr DESC');
while ($donnees = $reponse->fetch()){
		echo "<h3 class=\"margin_bottom_20\">".$donnees['titre']."</h3>\n";
		echo "<div class=\"videoWrapper margin_bottom_20\">".$donnees['lien']."</div>";
		echo "\n<p class=\"text_right\">".$donnees['datecr']."</p><hr/>\n";
}
?>


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