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
     <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
    <script src="https://openlayers.org/en/v4.1.1/build/ol.js"></script>
    
    <div id="map" class="map" tabindex="0"></div>
    
    <script>
      var map = new ol.Map({
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        target: 'map',
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
      
    </script>