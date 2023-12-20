<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>Koordinat Lokasi dari Google Maps</title>

  <!-- Font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- API SIKK -->
  <!-- <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANG7pG3DgSp615vPg3GMB3o0iel-ldVDg&libraries=places&callback=load">
    </script> -->
  <!-- API localhost -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAibH7o1nGIuWYSjgGd8-KDcsCIKw9mVLA&libraries=places&callback=load"></script>

  <script type="text/javascript">
    function load() {
      var mapOptions, map, marker, searchBox,
        infoWindow = '',
        addressEl = document.querySelector('#address'),
        latEl = document.querySelector('#lat'),
        longEl = document.querySelector('#lng'),
        element = document.getElementById('map');

      mapOptions = {
        zoom: 10,
        center: new google.maps.LatLng(-7.3632094, 109.9001796),
        disableDefaultUI: false, // Disables the controls like zoom control on the map if set to true
        scrollWheel: true, // If set to false disables the scrolling on the map.
        draggable: true, // If set to false , you cannot move the map around.
      };

      // Create an object map with the constructor function Map()
      map = new google.maps.Map(element, mapOptions); // Till this like of code it loads up the map.


      // Creates the marker on the map
      marker = new google.maps.Marker({
        position: mapOptions.center,
        map: map,
        draggable: true
      });

      // Creates a search box
      searchBox = new google.maps.places.SearchBox(addressEl);

      // When the place is changed on search box, it takes the marker to the searched location.
      google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces(),
          bounds = new google.maps.LatLngBounds(),
          i, place, lat, long, resultArray,
          addresss = places[0].formatted_address;

        for (i = 0; place = places[i]; i++) {
          bounds.extend(place.geometry.location);
          marker.setPosition(place.geometry.location); // Set marker position new.
        }

        map.fitBounds(bounds); // Fit to the bound
        map.setZoom(15); // This function sets the zoom to 15, meaning zooms to level 15.
        // console.log( map.getZoom() );

        lat = marker.getPosition().lat();
        long = marker.getPosition().lng();
        latEl.value = lat;
        longEl.value = long;

        resultArray = places[0].address_components;

        // Closes the previous info window if it already exists
        if (infoWindow) {
          infoWindow.close();
        }
        /**
         * Creates the info Window at the top of the marker
         */
        infoWindow = new google.maps.InfoWindow({
          content: addresss
        });

        infoWindow.open(map, marker);
      });


      /**
       * Finds the new position of the marker when the marker is dragged.
       */
      google.maps.event.addListener(marker, "dragend", function(event) {
        var lat, long, address, resultArray;

        console.log('i am dragged');
        lat = marker.getPosition().lat();
        long = marker.getPosition().lng();

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
          latLng: marker.getPosition()
        }, function(result, status) {
          if ('OK' === status) { // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
            address = result[0].formatted_address;
            resultArray = result[0].address_components;

            addressEl.value = address;
            latEl.value = lat;
            longEl.value = long;

          } else {
            console.log('Geocode was not successful for the following reason: ' + status);
          }

          // Closes the previous info window if it already exists
          if (infoWindow) {
            infoWindow.close();
          }

          /**
           * Creates the info Window at the top of the marker
           */
          infoWindow = new google.maps.InfoWindow({
            content: address
          });

          infoWindow.open(map, marker);
        });
      });
    }
  </script>
</head>

<body onLoad="load()">
  <div>
    <hr>
    <p><b>Pencarian koordinat lokasi dengan menggerakkan peta</b><br />
      1. Geser peta <br />
      2. Letakkan penanda untuk menentukan lokasi dan secara otomatis akan diperoleh koordinat <br />
      3. Perbesar peta untuk mendapatkan akurasi yang lebih baik. <br />
    </p>
    <p><b>Pencarian koordinat menggunakan nama atau alamat</b><br />
      1. Ketik kata kunci pencarian dapat berupa nama dusun, desa, kecamatan, kabupaten, provinsi, serta jalan.<br />
      2. Klik pada <i>dropdown</i> nama atau alamat yang muncul, <b style="color: red;">jangan pencet ENTER</b> karena akan langsung menyimpan data kejadian.<br />
    </p>
  </div>

  <p><input type="text" class="form-control has-feedback" id="address" name="address" value="Jalan Jendral Soeharto no 7, Kalierang, Selomerto Wonosobo" size="100" /></p>

  <div id="map" style="width: 100%; height: 375px"></div>
</body>

</html>