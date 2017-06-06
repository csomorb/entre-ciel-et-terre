<div class="titre-div">
        <div>
            <a href="/accueil">
            <img src="./img/logo.jpg" class="logo" /> 
            </a>
        </div>
        <div class="titre">
            <div>
                <h1 class="title has-text-centered">Entre ciel et terre</h1>
                <h2 class="subtitle has-text-centered" id="ss-titre">itinéraire</h2>
            </div>
        </div>
    </div>
    <!-- The line below is only needed for old environments like Internet Explorer and Android 4.x -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    <script src="https://openlayers.org/en/v4.1.1/build/ol.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="../js/ol3-popup.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <div id="map" class="map" tabindex="0"></div>
    
    <script>
      var glosgok = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([12.694730,47.074390])), 
      });
      
      var ara = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([44.194631,40.523151])), 
      });
      
      var dama = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([52.109894,35.956050])), 
      });
      
      var tri = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([13.833917,46.380056])), 
      });
      
      glosgok.setStyle(new ol.style.Style({
        image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
          crossOrigin: 'anonymous',
          src: '../img/mountain.png',
        }))
      }));
    
      ara.setStyle(new ol.style.Style({
        image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
          crossOrigin: 'anonymous',
          src: '../img/mountain.png',
        }))
      }));
      
      dama.setStyle(new ol.style.Style({
        image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
          crossOrigin: 'anonymous',
          src: '../img/mountain.png',
        }))
      }));
      
      tri.setStyle(new ol.style.Style({
        image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
          crossOrigin: 'anonymous',
          src: '../img/mountain.png',
        }))
      }));
    
      var vectorSource = new ol.source.Vector({
        features: [glosgok, ara, dama,tri]
      });
      
      var vectorLayer = new ol.layer.Vector({
        source: vectorSource
      });
      
      var carteLayer = new ol.layer.Tile({
            source: new ol.source.OSM()
      });
    
      var map = new ol.Map({
        target: 'map',
        layers: [carteLayer,vectorLayer],
        controls: ol.control.defaults({
          attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
            collapsible: false
          })
        }),
        view: new ol.View({
          center:  ol.proj.fromLonLat( [35, 33] ),
          zoom: 4
        })
      }); 
      
      
      var popup = new ol.Overlay.Popup();
          map.addOverlay(popup);
      
      map.on('click', function(evt) {
        
        var feature = map.forEachFeatureAtPixel(evt.pixel,
            function(feature) {
              return feature;
            });
        if (feature) {
          var coordinates = feature.getGeometry().getCoordinates();
          popup.setPosition(coordinates);
          coord = ol.proj.transform(coordinates, 'EPSG:3857', 'EPSG:4326');
          if (parseInt(coord[0] * 100) === 1269 && parseInt(coord[1] * 100) === 4707 )
          popup.show(coordinates, "<div><h2>Großglockner</h2><p>Le Großglockner est, avec 3 798 m d'altitude, le point culminant de l'Autriche,"+
                                            "entre la Carinthie et le Tyrol. Ce pic marqué, en roches appartenant à un faciès à schistes verts, "+
                                            "appartient au chaînon du Glockner situé au centre des Hohe Tauern, et est considéré comme le sommet "+ 
                                            "le plus important des Alpes orientales. Depuis les premières reconnaissances au XVIIIe siècle et "+
                                            "la première ascension par quatre alpinistes d'une grande expédition organisée par le prince-évêque "+
                                            "Salm-Reifferscheidt-Krautheim en 1800, le Großglockner a joué un rôle important dans le développement "+ 
                                            "de l’alpinisme. Il est resté très important pour le tourisme de la région, et représente un but apprécié  "+ 
                                            "des alpinistes, avec 5 000 ascensions par an.</p>" +
                                            "<img src='../img/gros.jpg'/></div>");
                                            
          if (parseInt(coord[0] * 100) === 4419 && parseInt(coord[1] * 100) === 4052 )
          popup.show(coordinates, "<div><p>L'Aragats, en arménien ??????, en russe ??????, aussi appelé mont Aragats, Alagey, Aragatz ou encore "+
                                            "Aragey1, est un volcan éteint d'Arménie. Avec 4 095 mètres d'altitude, il constitue le point culminant "+
                                            "de l'Arménie et domine le haut-plateau arménien qui s'étend à ses pieds."+
                                            "Sur le versant sud de l'Aragats, se trouve l’observatoire astrophysique de Byurakan qui fut parmi les"+
                                            "principaux centres astronomiques de l'URSS.</p>" +
                                            "<img src='../img/ara.jpg'/></div>");
          if (parseInt(coord[0] * 100) === 5210 && parseInt(coord[1] * 100) === 3595 )
          popup.show(coordinates, "<div><p>Le mont Damavand (en persan : ??????, Damavand ou Demavend) est le sommet volcanique semi-actif le plus élevé de l'Iran."+
                                  "Culminant à 5 610 m, il est situé dans la chaîne de l'Elbourz, à 66 kilomètres au nord-est de Téhéran. La montagne est également "+
                                  "connue sous le nom de Donbavand. Le sommet est situé à proximité de la côte sud de la mer Caspienne. La dernière éruption de ce "+
                                  "volcan remonte à sept mille ans....</p>" +
                                            "<img src='../img/dama.jpg'/></div>");
          if (parseInt(coord[0] * 100) === 1383 && parseInt(coord[1] * 100) === 4638 )
          popup.show(coordinates, "<div><p>Le Triglav (littéralement « Trois Têtes »), point culminant des Alpes juliennes et plus haut sommet de Slovénie, s'élève à 2 864 mètres d'altitude ;"+
                                            "il est situé au nord-ouest du pays. Véritable symbole national, berceau de plusieurs légendes et terrain de conflits armés, escaladé pour la "+
                                            "première fois en 1778, il orne désormais le drapeau de la Slovénie et la face spécifique des pièces de 50 centimes d'euro. "+
                                            "Son climat est étudié depuis plus d'un siècle au sommet grâce à un observatoire météorologique ; il se caractérise par une hausse des"+
                                            "températures qui fait disparaître progressivement le glacier qui couvre son sommet. Le parc national du Triglav, le seul parc national du pays,"+
                                            "entoure la montagne et ses paysages calcaires sur près de 840 km2.</p>" +
                                            "<img src='../img/tri.jpg'/></div>");
          
        }
      });
      
       // change mouse cursor when over marker
    /*  map.on('pointermove', function(e) {
        if (e.dragging) {
          $(element).popover('destroy');
          return;
        }
        var pixel = map.getEventPixel(e.originalEvent);
        var hit = map.hasFeatureAtPixel(pixel);
        map.getTarget().style.cursor = hit ? 'pointer' : '';
      });*/
      
    </script>