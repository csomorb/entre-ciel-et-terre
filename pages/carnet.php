
  <script src="../js/photoswipe.min.js"></script> 
	<!-- UI JS file -->
	<script src="../js/photoswipe-ui-default.min.js"></script>
   <script src="../js/album.js"></script>
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
		echo "<h3 class=\"margin_bottom_20 subtitle center\">".$donnees['titre']."</h3>\n";
		echo "<div class=\"video_center\"><div class=\"videoWrapper margin_bottom_20\">".$donnees['contenu']."</div></div>";
		echo "\n<p>".$donnees['descr']."</p>\n";
		echo "\n<p class=\"text_right\">".$donnees['datecr']."</p><hr/>\n";
	}
	else if($donnees['type'] == "photo"){
		echo "<h3 class=\"margin_bottom_20 subtitle center\">".$donnees['titre']."</h3>\n";
		$reponse2 = $bdd->query('SELECT * FROM photo WHERE id_carnet =  '.$donnees['id'].' ORDER BY id');
		$galleri = "<div class=\"my-gallery\" itemscope itemtype=\"http://schema.org/ImageGallery\">\n";
		while ($donnees2 = $reponse2->fetch()){
			$galleri.= "\t<figure itemprop=\"associatedMedia\" itemscope itemtype=\"http://schema.org/ImageObject\">\n";
			$galleri.= "\t\t<a href=\"/img/".$donnees2['nom']."\" itemprop=\"contentUrl\" data-size=\"".$donnees2['largeur']."x".$donnees2['hauteur']."\">\n";
			$galleri.= "\t\t\t<img src=\"/img/".$donnees2['nom']."\" itemprop=\"thumbnail\" alt=\"photo\" class=\"thumb_photo\"/>\n";
			$galleri.= "\t\t</a>\n\t\t<figcaption itemprop=\"caption description\">".$donnees2['descr']."</figcaption>\n"; /**Description***/
		//	$galleri.= "\t\t<p class=\"text-center\"><span class=\"lead\">".$donnees2['descr']."</p>\n"; /**Description***/
			$galleri.= "\t</figure>\n";
		}
		$galleri.= "</div>";
		echo $galleri;
		echo "\n<p>".$donnees['descr']."</p>\n";
		echo "\n<p class=\"text_right\">".$donnees['datecr']."</p><hr/>\n";
	}
	else{
		echo "<h3 class=\"margin_bottom_20 subtitle center\">".$donnees['titre']."</h3>\n";
		echo "\n<p>".$donnees['descr']."</p>\n<hr/>\n";
		echo "\n<p class=\"text_right\">".$donnees['datecr']."</p>\n";
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

<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>
