<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1,width=device-width">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Coordinates Search">
  <meta name="author" content="unsorry">
  <title>Search Location by Coordinates</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.css" />
  <style>
    #map {
      width: 100%;
      height: 375px;
    }
  </style>
</head>

<body>
  <!-- <div class="container mt-2 mb-2">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card shadow" id="datalokasiobjek"> -->
  <!-- <div class="card-header">
    <div class="alert alert-primary">Coordinate search to show location on Map</div>
    <div class="row">
      <div class="col-sm">
        <div class="form-group">
          <label for="latitude"><strong>Latitude</strong></label>
          <input type="text" class="form-control text-primary" id="lat" name="latitude" placeholder="Latitude" value="">
        </div>
      </div>
      <div class="col-sm">
        <div class="form-group">
          <label for="longitude"><strong>Longitude</strong></label>
          <input type="text" class="form-control text-primary" id="lng" name="longitude" placeholder="Longitude" value="">
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          <label><strong>&nbsp;</strong></label><br>
          <a href="#" type="button" class="btn btn-primary btn-block" id="mapbutton" onclick="mapCenter()">Search</a>
        </div>
      </div>
    </div>
  </div> -->
  <!-- <div class="card-body">
              <div class="card p-1" id="mapcoordinate"> -->
  <div id="map"></div>
  <!-- </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div> -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.umd.js"></script>
  <script>
    /* Initial Map */
    var tooltip = 'Drag the marker<br>or drag the map<br>to change the coordinates<br>of the location';
    var center = [-7.801389645, 110.364775452];
    var map = L.map('map').setView(center, 15); //lat, long, zoom
    map.scrollWheelZoom.disable(); //disable zoom with scroll

    /* Tile Basemap */
    var basemap = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
      maxZoom: 20,
      subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
      attribution: 'Google Satellite | <a href="https://unsorry.net" target="_blank">unsorry@2020</a>'
    });

    var OSM = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    OSM.addTo(map);

    /* Marker */
    var marker = L.marker(center, {
      draggable: true
    });
    marker.addTo(map);

    /* Tooltip Marker */
    // marker.bindTooltip(tooltip);
    // marker.openTooltip();

    //Dragend marker
    marker.on('dragend', dragMarker);

    //Move Map
    map.addEventListener('moveend', mapMovement);

    function dragMarker(e) {
      var latlng = e.target.getLatLng();

      //Displays coordinates on the form
      // document.getElementById("lat").value = latlng.lat.toFixed(5);
      // document.getElementById("lng").value = latlng.lng.toFixed(5);
      console.log(latlng.lat.toFixed(5) + ', ' + latlng.lng.toFixed(5));

      //Change the map center based on the marker location
      map.flyTo(new L.LatLng(latlng.lat.toFixed(9), latlng.lng.toFixed(5)));
      // marker.openTooltip();
    }

    function mapMovement(e) {
      var mapcenter = map.getCenter();

      //Displays coordinates on the form
      // document.getElementById("lat").value = mapcenter.lat.toFixed(5);
      // document.getElementById("lng").value = mapcenter.lng.toFixed(5);
      console.log(mapcenter.lat.toFixed(5) + ', ' + mapcenter.lng.toFixed(5));

      //Move marker
      marker.setLatLng([mapcenter.lat.toFixed(5), mapcenter.lng.toFixed(5)]).update();
      marker.addTo(map);
      marker.bindTooltip(tooltip);
      // marker.openTooltip();
      marker.on('dragend', dragMarker);
    }

    function mapCenter(e) {
      var mapcenter = map.getCenter();
      var x = document.getElementById("lng").value;
      var y = document.getElementById("lat").value;

      map.flyTo(new L.LatLng(y, x), 18);
    }

    const provider = new GeoSearch.OpenStreetMapProvider({
      params: {
        countrycodes: 'id',
        'accept-language': 'id, en',
        addressdetails: 1
      }
    });

    const searchControl = new GeoSearch.GeoSearchControl({
      style: 'bar',
      provider: provider,
      // autoComplete: true, // optional: true|false  - default true
      // autoCompleteDelay: 250, // optional: number      - default 250
      showMarker: false, // optional: true|false  - default true
      showPopup: false, // optional: true|false  - default false
      // marker: {
      //   // optional: L.Marker    - default L.Icon.Default
      //   icon: new L.Icon.Default(),
      //   draggable: true,
      // },
      // popupFormat: ({ query, result }) => result.label, // optional: function    - default returns result label
      // maxMarkers: 1, // optional: number      - default 1
      retainZoomLevel: false, // optional: true|false  - default false
      animateZoom: true, // optional: true|false  - default true
      autoClose: false, // optional: true|false  - default false
      searchLabel: 'Masukkan alamat', // optional: string      - default 'Enter address'
      keepResult: false, // optional: true|false  - default false
      updateMap: true, // optional: true|false  - default true
    });

    map.addControl(searchControl);
  </script>
</body>

</html>