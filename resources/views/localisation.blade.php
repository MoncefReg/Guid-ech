<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <title>Guid-ech</title>
  <link rel="shortcut icon"  href="{{ asset('/images/G.ico') }}">
    

      <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
      <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet'>
      <!-- Mapbox GL JS -->
      <script type="text/javascript" src="https://ff.kis.v2.scr.kaspersky-labs.com/37C56096-326F-1241-94BD-527D2CD3CD7C/main.js" charset="UTF-8">
      </script><script src='https://static-assets.mapbox.com/gl-pricing/dist/mapbox-gl.js'></script>
      <link href='https://static-assets.mapbox.com/gl-pricing/dist/mapbox-gl.css' rel='stylesheet' />

      <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.0.1/mapbox-gl-geocoder.js'></script>
      <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.0.1/mapbox-gl-geocoder.css' type='text/css' />
      <!-- Turf.js plugin -->
      <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>

    <style>

      body {
        color: #404040;
        font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', Sans-serif;
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
      }

      * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }

      .sidebar {
        position: absolute;
        width: 33.3333%;
        height: 100%;
        top: 0;
        left: 0;
        overflow: hidden;
        border-right: 1px solid rgba(0, 0, 0, 0.25);
      }

      .pad2 {
        padding: 20px;
      }

      .map {
        position: absolute;
        left: 33.3333%;
        width: 66.6666%;
        top: 0;
        bottom: 0;
      }

      h1 {
        font-size: 22px;
        margin: 0;
        font-weight: 400;
        line-height: 20px;
        padding: 20px 2px;
      }

      a {
        color: #404040;
        text-decoration: none;
      }

      a:hover {
        color: #101010;
      }

      .heading {
        background: #fff;
        border-bottom: 1px solid #eee;
        min-height: 60px;
        line-height: 60px;
        padding: 0 10px;
         background-color: #0B0537;
        color: #fff;
      }

      .listings {
        height: 100%;
        overflow: auto;
        padding-bottom: 60px;
      }

      .listings .item {
        display: block;
        border-bottom: 1px solid #eee;
        padding: 10px;
        text-decoration: none;
      }

      .listings .item:last-child { border-bottom: none; }

      .listings .item .title {
        display: block;
        color: #0B0537;
        font-weight: 300;
      }

      .listings .item .title small {              /*store liste sidebar*/
        font-weight: 400;
      }

      .listings .item.active .title .listings .item .title:hover {
        color: #8cc63f;
      }

      .listings .item.active {
        background-color: #f8f8f8;
      }

      ::-webkit-scrollbar {
        width: 3px;
        height: 3px;
        border-left: 0;
        background: rgba(0, 0, 0, 0.1);
      }

      ::-webkit-scrollbar-track {
        background: none;
      }

      ::-webkit-scrollbar-thumb {
        background: #00853e;
        border-radius: 0;
      }

      .marker {
        border: none;
        cursor: pointer;
        height: 56px;
        width: 56px;
        background-image: url(/images/marker.png);
        background-color: rgba(0, 0, 0, 0);
      }

      .clearfix {
        display: block;
      }

      .clearfix::after {
        content: '.';
        display: block;
        height: 0;
        clear: both;
        visibility: hidden;
      }

      /* Marker tweaks */
      .mapboxgl-popup {           /*store popup*/
        padding-bottom: 50px;
      }

      .mapboxgl-popup-close-button {
        display: none;
      }

      .mapboxgl-popup-content {
        font: 400 15px/22px 'roboto', 'roboto', Sans-serif;
        padding: 0;
        width: 180px;
      }

      .mapboxgl-popup-content-wrapper {
        padding: 1%;
      }

      .mapboxgl-popup-content h3 {
        background: #0984e3;
        color: #fff;
        margin: 0;
        display: block;
        padding: 10px;
        border-radius: 3px 3px 0 0;
        font-weight: 222;
        margin-top: -15px;
      }

      .mapboxgl-popup-content h4 {
        margin: 0;
        display: block;
        padding: 10px;
        font-weight: 300;
      }

      .mapboxgl-popup-content div {
        padding: 10px;
      }

      .mapboxgl-container .leaflet-marker-icon {
        cursor: pointer;
      }

      .mapboxgl-popup-anchor-top > .mapboxgl-popup-content {
        margin-top: 15px;
      }

      .mapboxgl-popup-anchor-top > .mapboxgl-popup-tip {
        border-bottom-color: #91c949;
      }
        .mapboxgl-ctrl-geocoder {
         border: 0;
         border-radius: 0;
         position: relative;
         top: 0;
         width: 800px;
         margin-top: 0;

      }

     .mapboxgl-ctrl-geocoder > div {
       min-width: 100%;
       margin-left: 0;
      }

  .view {
      height: 100%;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
              .navbar:not(.top-nav-collapse) {
                  background: #1C2331!important;
              }
          }

      

    </style>
  </head>

  <body>
   <style>



     #menu {
         position: absolute;
         background: #fff;
         padding: 10px;
         left: 66%;
         top:10;
           }
   </style>



    <div class='sidebar'>

      <div class='heading'>
        <h1>Guid-ech</h1>
      </div>

    <div id='listings' class='listings'></div>
   
    </div>


 
    <div id="map" class="map mapboxgl-map"> 

    	<div class="mapboxgl-canary" style="visibility: hidden;"></div>

    	<div class="mapboxgl-canvas-container mapboxgl-interactive mapboxgl-touch-drag-pan mapboxgl-touch-zoom-rotate">

    		<canvas class="mapboxgl-canvas" style="position: absolute; width: 911px; height: 654px;" tabindex="0" aria-label="Map" width="911" height="654"></canvas>

    		<div id="marker-0" class="marker mapboxgl-marker mapboxgl-marker-anchor-center" style="transform: translate(-50%, -50%) translate(456px, 304px);"></div>
    		<div id="marker-1" class="marker mapboxgl-marker mapboxgl-marker-anchor-center" style="transform: translate(-50%, -50%) translate(273px, 437px);"></div>
    		<div id="marker-2" class="marker mapboxgl-marker mapboxgl-marker-anchor-center" style="transform: translate(-50%, -50%) translate(341px, 291px);"></div>
    		<div id="marker-3" class="marker mapboxgl-marker mapboxgl-marker-anchor-center" style="transform: translate(-50%, -50%) translate(70px, 371px);"></div>
    		<div id="marker-4" class="marker mapboxgl-marker mapboxgl-marker-anchor-center" style="transform: translate(-50%, -50%) translate(823px, 643px);"></div>
    		<div id="marker-5" class="marker mapboxgl-marker mapboxgl-marker-anchor-center" style="transform: translate(-50%, -50%) translate(1627px, -933px);"></div>
    		<div id="marker-6" class="marker mapboxgl-marker mapboxgl-marker-anchor-center" style="transform: translate(-50%, -50%) translate(-278px, -764px);"></div>
    		<div id="marker-7" class="marker mapboxgl-marker mapboxgl-marker-anchor-center" style="transform: translate(-50%, -50%) translate(-3335px, -421px);"></div>
    		<div id="marker-8" class="marker mapboxgl-marker mapboxgl-marker-anchor-center" style="transform: translate(-50%, -50%) translate(-412px, 747px);"></div>
    		<div id="marker-9" class="marker mapboxgl-marker mapboxgl-marker-anchor-center" style="transform: translate(-50%, -50%) translate(20801px, -16271px);"></div>
    		<div id="marker-10" class="marker mapboxgl-marker mapboxgl-marker-anchor-center" style="transform: translate(-50%, -50%) translate(21810px, -15450px);"></div>
    		<div id="marker-11" class="marker mapboxgl-marker mapboxgl-marker-anchor-center" style="transform: translate(-50%, -50%) translate(340px, 391px);"></div>






    	</div>



    	<div class="mapboxgl-control-container">
    		<div class="mapboxgl-ctrl-top-left">
    			<div class="mapboxgl-ctrl-geocoder mapboxgl-ctrl">
    				<span class="geocoder-icon geocoder-icon-search"></span>
    				<input type="text" placeholder="Search">
    				<ul class="suggestions" style="display: none;"></ul>
    				<div class="geocoder-pin-right">
    					<button class="geocoder-icon geocoder-icon-close"></button>
    					<span class="geocoder-icon geocoder-icon-loading"></span>
    				</div>
    			</div>
    		</div>

    		<div class="mapboxgl-ctrl-top-right"></div>
    		<div class="mapboxgl-ctrl-bottom-left">></div>
    		<div class="mapboxgl-ctrl-bottom-right">
    			<div class="mapboxgl-ctrl mapboxgl-ctrl-attrib">
    				<div class="mapboxgl-ctrl-attrib-inner">></div>
    			</div>
    		</div>
    	</div>


    </div>
    <div id='menu'>
<input id='streets-v11' type='radio' name='rtoggle' value='streets' checked='checked'>
<label for='streets'>streets</label>
<input id='light-v10' type='radio' name='rtoggle' value='light'>
<label for='light'>light</label>
<input id='dark-v10' type='radio' name='rtoggle' value='dark'>
<label for='dark'>dark</label>
<input id='outdoors-v11' type='radio' name='rtoggle' value='outdoors'>
<label for='outdoors'>outdoors</label>
<input id='satellite-v9' type='radio' name='rtoggle' value='satellite'>
<label for='satellite'>satellite</label>
</div>


  <script>
   // This will let you use the .remove() function later on
  if (!('remove' in Element.prototype)) {
    Element.prototype.remove = function() {
      if (this.parentNode) {
          this.parentNode.removeChild(this);
      }
    };
  }

  mapboxgl.accessToken = 'pk.eyJ1Ijoid2FoaWRtZG4iLCJhIjoiY2p0cnJ4MjczMG16bjN5bXJldWtwcGdrcCJ9.oYj-uNz_AUap9CfyskCupw';

  // This adds the map
  var map = new mapboxgl.Map({
    // container id specified in the HTML
    container: 'map',
    // style URL
    style: 'mapbox://styles/mapbox/streets-v11',
    // initial position in [long, lat] format
    center: [-1.316699, 34.881789 ],
    // initial zoom
    zoom: 13
  });
          // Change the map style.
   var layerList = document.getElementById('menu');
   var inputs = layerList.getElementsByTagName('input');
 
        function switchLayer(layer) {
            var layerId = layer.target.id;
            map.setStyle('mapbox://styles/mapbox/' + layerId);
                                     }
 
               for (var i = 0; i < inputs.length; i++) {
                    inputs[i].onclick = switchLayer;
                                        }
       // Add geolocate control to the map.
map.addControl(new mapboxgl.GeolocateControl({
positionOptions: {
enableHighAccuracy: true
},
trackUserLocation: true
}));
           // View full screen Map
          map.addControl(new mapboxgl.FullscreenControl());
          // Add zoom and rotation controls to the map.
map.addControl(new mapboxgl.NavigationControl());

      // stores data geojson
    var stores = {
    type: 'FeatureCollection',
    features: [
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -1.3187992572784424,34.883097040065955
          ]
        },
        properties: {
          phoneFormatted: '(213) 699338684 ',
          address: 'bab wahran',
          city: 'Tlemcen',
          name: 'le cinq',
          url: 'http://www.esi-sba.dz'
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
              -1.324625,
             34.874964
          ]
        },
        properties: {
          phoneFormatted: '(202) 507-8357',
          address: 'Moussa kazi, Boulevard Aïn Sbaa Ali',
          city: 'Tlemcen',
          name: 'l`equinoxe',
          url: 'http://www.esi-sba.dz',
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
             -1.333766,
            34.880703
          ]
        },
        properties: {
          phoneFormatted: '(202) 555555555',
          address: 'L`échappatoire, Boulevard Imama, 13000 Mansourah,',
          city: 'Tlemcen',
          url: 'http://www.esi-sba.dz',
          name:'lechapatoire',
         }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -1.342928,
            34.879277
          ]
        },
        properties: {
          phoneFormatted: '(202) 337-9338',
          address: ' Cafe SLIMANI, Boulevard Imama, 13000 Mansourah,',
          city: 'Tlemcen',
          url: 'http://www.esi-sba.dz',
          name:'Restaurant Marocain',
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -1.322141,
            34.886022
          ]
        },
        properties: {
          phoneFormatted: '(202) 547-9338',
          address: ' Le Gourmet, Rue Mohamed Abdellaoui, 13000 Tlemcen',
          city: 'Tlemcen',
          name:'Le Gourmet',
          url: 'http://www.esi-sba.dz',
         }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -1.32746,
            34.90057
          ]
        },
        properties: {
          phoneFormatted: '(202) 547-9338',
          address: ' Naftal, RN 22, 13000 Tlemcen, RADP',
          city: 'Tlemcen',
          name:'La marina',
          url: 'http://www.esi-sba.dz',

          
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
           -1.3275,
            34.886459
          ]
        },
        properties: {
          phoneFormatted: '(301) 654-7336',
          
          address: '  Boulevard Aïn Sbaa Ali, 13000 Tlemcen, RADP',
           city: 'Tlemcen',
          name:'Best Chiken',
          url: 'http://www.esi-sba.dz',

        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
             -1.339576,
             34.887829
          ]
        },
        properties: {
          phoneFormatted: '(571) 203-0082',
          address: 'Mairie Annexe, Boulevard du 18 Fevrier, 13000 Mansourah, RADP',
          city: 'Tlemcen',
          name:'Maxi FastFood',
          url: 'http://www.esi-sba.dz',
}
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
           -1.324153,
            34.886776
          ]
        },
        properties: {
          phoneFormatted: '(703) 522-2016',
          address: 'Rue Mohamed Abdellaoui, 13000 Tlemcen, RADP',
          city: 'Tlemcen',
          name:'Le coq13',
          url: 'http://www.esi-sba.dz',
 }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -1.303725,
            34.881926
          ]
        },
        properties: {
          phoneFormatted: '(610) 642-9400',
          address: '  RN 2;RN 22, 130000 Tlemcen, RADP',
          city: 'Tlemcen',
          name:'Restaurant Agadir',
          url: 'http://www.esi-sba.dz',
} 
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -1.319121,
           34.863944
          ]
        },
        properties: {
          phoneFormatted: '(215) 386-1365',
          address: ' 130000 Tlemcen, RADP',
          city: 'Tlemcen',
          name:'Kraouti',
          url: 'http://www.esi-sba.dz',
} 
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -1.318172,
            34.864179
          ]
        },
        properties: {
          phoneFormatted: '(202) 331-3355',
          address: ' 130000 Tlemcen, RADP',
          city: 'Tlemcen',
          name:'Bekhchi',
          url: 'http://www.esi-sba.dz',
        }
      },
         {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -1.32030,
           34.88890
          ]
        },
        properties: {
          phoneFormatted: '(215) 2222222',
          address: ' test test',
          city: 'Tlemcen',
          name:'test',
          url: 'http://www.esi-sba.dz',
} 
      }
      ]
  };
  // This adds the data to the map
  map.on('load', function (e) {
    // This is where your '.addLayer()' used to be, instead add only the source without styling a layer


    map.addSource('single-point', {
      "type": "geojson",
      "data": {
        "type": "FeatureCollection",
        "features": [] // Notice that initially there are no features
      }
    });
       map.addLayer({
  id: 'point',
  source: 'single-point',
  type: 'circle',
  paint: {
    'circle-radius': 10,
    'circle-color': '#007cbf',
    'circle-stroke-width': 3,
    'circle-stroke-color': '#fff'
  }
});
           

           geocoder = new MapboxGeocoder({                  //geocoder search
        accessToken: mapboxgl.accessToken,
   /* bbox: [[ 8.487311 , 37.322493 ], [-0.763177, 32.596277]]     */        //search limit  .A bounding box is a mechanism for describing a particular area of a map
   
});

       geocoder.on('result', function(ev) {
  var searchResult = ev.result.geometry;
  map.getSource('single-point').setData(searchResult);
  //calculates distance
  var options = { units: 'kilometers' };
stores.features.forEach(function(store) {
  Object.defineProperty(store.properties, 'distance', {
    value: turf.distance(searchResult, store.geometry, options),
    writable: true,
    enumerable: true,
    configurable: true
  });
});
//sort list
stores.features.sort(function(a, b) {
  if (a.properties.distance > b.properties.distance) {
    return 1;
  }
  if (a.properties.distance < b.properties.distance) {
    return -1;
  }
  // a must be equal to b
  return 0;
});

var listings = document.getElementById('listings');
while (listings.firstChild) {
  listings.removeChild(listings.firstChild);
}
//reset list
buildLocationList(stores);
//fit bound
function sortLonLat(storeIdentifier) {
  var lats = [stores.features[storeIdentifier].geometry.coordinates[1], searchResult.coordinates[1]];
  var lons = [stores.features[storeIdentifier].geometry.coordinates[0], searchResult.coordinates[0]];

  var sortedLons = lons.sort(function(a, b) {
    if (a > b) {
      return 1;
    }
    if (a.distance < b.distance) {
      return -1;
    }
    return 0;
  });
  var sortedLats = lats.sort(function(a, b) {
    if (a > b) {
      return 1;
    }
    if (a.distance < b.distance) {
      return -1;
    }
    return 0;
  });

  map.fitBounds([
    [sortedLons[0], sortedLats[0]],
    [sortedLons[1], sortedLats[1]]
  ], {
    padding: 100
  });
}

sortLonLat(0);
createPopUp(stores.features[0]);


});
    // Initialize the list
    buildLocationList(stores);


    map.addControl(geocoder, 'top-left');
  });

  // This is where your interactions with the symbol layer used to be
  
  stores.features.forEach(function(marker, i) {
    // Create an img element for the marker
    var el = document.createElement('div');
    el.id = "marker-" + i;
    el.className = 'marker';
    // Add markers to the map at all points
    new mapboxgl.Marker(el, {offset: [0, -23]})
        .setLngLat(marker.geometry.coordinates)
        .addTo(map);

    el.addEventListener('click', function(e){
        // 1. Fly to the point
        flyToStore(marker);

        // 2. Close all other popups and display popup for clicked store
        createPopUp(marker);

        // 3. Highlight listing in sidebar (and remove highlight for all other listings)
        var activeItem = document.getElementsByClassName('active');

        e.stopPropagation();
        if (activeItem[0]) {
           activeItem[0].classList.remove('active');
        }

        var listing = document.getElementById('listing-' + i);
        listing.classList.add('active');

    });
  });


  function flyToStore(currentFeature) {
    map.flyTo({
        center: currentFeature.geometry.coordinates,
        zoom: 15
      });
  }

  function createPopUp(currentFeature) {
    var popUps = document.getElementsByClassName('mapboxgl-popup');
    if (popUps[0]) popUps[0].remove();


    var popup = new mapboxgl.Popup({closeOnClick: false})
          .setLngLat(currentFeature.geometry.coordinates)
          .setHTML('<h3 onclick="location.href=\''+currentFeature.properties.url+'\';">'+currentFeature.properties.name+'</h3>' +
            '<h4>Address: ' +currentFeature.properties.address + '</h4>')
          .addTo(map);
  }


  function buildLocationList(data) {
    for (i = 0; i < data.features.length; i++) {
      var currentFeature = data.features[i];
      var prop = currentFeature.properties;

      var listings = document.getElementById('listings');
      var listing = listings.appendChild(document.createElement('div'));
      listing.className = 'item';
      listing.id = "listing-" + i;

      var link = listing.appendChild(document.createElement('a'));
      link.href = '#';
      link.className = 'title';
      link.dataPosition = i;
      link.innerHTML = prop.address;

      var details = listing.appendChild(document.createElement('div'));
      details.innerHTML = prop.city;
      if (prop.phone) {
        details.innerHTML += ' &middot; ' + prop.phoneFormatted;
      }

      if (prop.distance) {
  var roundedDistance = Math.round(prop.distance * 100) / 100;
  details.innerHTML += '<p><strong>' + roundedDistance + ' kilometers away</strong></p>';
}




      link.addEventListener('click', function(e){
        // Update the currentFeature to the store associated with the clicked link
        var clickedListing = data.features[this.dataPosition];

        // 1. Fly to the point
        flyToStore(clickedListing);

        // 2. Close all other popups and display popup for clicked store
        createPopUp(clickedListing);

        // 3. Highlight listing in sidebar (and remove highlight for all other listings)
        var activeItem = document.getElementsByClassName('active');

        if (activeItem[0]) {
           activeItem[0].classList.remove('active');
        }
        this.parentNode.classList.add('active');

      });
    }
  }
    </script>
  </body>
</html>
