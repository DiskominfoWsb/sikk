<script type="text/javascript">
  /* Variabel Layer */
  var map, featureList, admindesaSearch = [],
    pendudukkecSearch = [],
    longsorSearch = [],
    banjirSearch = [],
    cuacaekstrimSearch = [],
    gempabumiSearch = [],
    kebakarangedungpermukimanSearch = [],
    kebakaranlahanSearch = [],
    kekeringanSearch = [],
    letusangunungapiSearch = [],
    bencanalainSearch = [];

  /* Ukuran layer kontrol */
  $(window).resize(function() {
    sizeLayerControl();
  });

  /* Highlight */
  $(document).on("click", ".feature-row", function(e) {
    $(document).off("mouseout", ".feature-row", clearHighlight);
    sidebarClick(parseInt($(this).attr("id"), 10));
  });

  if (!("ontouchstart" in window)) {
    $(document).on("mouseover", ".feature-row", function(e) {
      highlight.clearLayers().addLayer(L.circleMarker([$(this).attr("lat"), $(this).attr("lng")], highlightStyle));
    });
  }

  $(document).on("mouseout", ".feature-row", clearHighlight);

  /* Function Button */
  $("#about-btn").click(function() {
    $("#aboutModal").modal("show");
    $(".navbar-collapse.in").collapse("hide");
    return false;
  });

  $("#full-extent-btn").click(function() {
    map.fitBounds(bataskabupaten.getBounds());
    $(".navbar-collapse.in").collapse("hide");
    return false;
  });

  $("#legend-btn").click(function() {
    $("#legendModal").modal("show");
    $(".navbar-collapse.in").collapse("hide");
    return false;
  });

  $("#embed-btn").click(function() {
    $("#embedModal").modal("show");
    $(".navbar-collapse.in").collapse("hide");
    return false;
  });

  $("#list-btn").click(function() {
    animateSidebar();
    return false;
  });

  $("#nav-btn").click(function() {
    $(".navbar-collapse").collapse("toggle");
    return false;
  });

  $("#sidebar-toggle-btn").click(function() {
    animateSidebar();
    return false;
  });

  $("#sidebar-hide-btn").click(function() {
    animateSidebar();
    return false;
  });

  $("#print-btn").click(function() {
    printMap();
    return false;
  });

  /* Function */
  function printMap() {
    window.print();
  }

  function animateSidebar() {
    $("#sidebar").animate({
      width: "toggle"
    }, 350, function() {
      map.invalidateSize();
    });
  }

  function sizeLayerControl() {
    $(".leaflet-control-layers").css("max-height", $("#map").height() - 50);
  }

  function clearHighlight() {
    highlight.clearLayers();
  }

  function sidebarClick(id) {
    var layer = markerClusters.getLayer(id);
    map.setView([layer.getLatLng().lat, layer.getLatLng().lng], 17);
    layer.fire("click");
    /* Hide sidebar and go to the map on small screens */
    if (document.body.clientWidth <= 767) {
      $("#sidebar").hide();
      map.invalidateSize();
    }
  }

  /* Function Sidebar */
  function syncSidebar() {
    /* Empty sidebar features */
    $("#feature-list tbody").empty();
    /* Loop through longsor layer and add only features which are in the map bounds */
    longsor.eachLayer(function(layer) {
      if (map.hasLayer(longsorLayer)) {
        if (map.getBounds().contains(layer.getLatLng())) {
          $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/longsor.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        }
      }
    });
    /* Loop through banjir layer and add only features which are in the map bounds */
    banjir.eachLayer(function(layer) {
      if (map.hasLayer(banjirLayer)) {
        if (map.getBounds().contains(layer.getLatLng())) {
          $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/banjir.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        }
      }
    });
    /* Loop through cuaca ekstrim layer and add only features which are in the map bounds */
    cuacaekstrim.eachLayer(function(layer) {
      if (map.hasLayer(cuacaekstrimLayer)) {
        if (map.getBounds().contains(layer.getLatLng())) {
          $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/cuacaekstrim.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        }
      }
    });
    /* Loop through gempabumi layer and add only features which are in the map bounds */
    gempabumi.eachLayer(function(layer) {
      if (map.hasLayer(gempabumiLayer)) {
        if (map.getBounds().contains(layer.getLatLng())) {
          $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/gempabumi.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        }
      }
    });
    /* Loop through kebakarangedungpermukiman layer and add only features which are in the map bounds */
    kebakarangedungpermukiman.eachLayer(function(layer) {
      if (map.hasLayer(kebakarangedungpermukimanLayer)) {
        if (map.getBounds().contains(layer.getLatLng())) {
          $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kebakarangedungpermukiman.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        }
      }
    });
    /* Loop through kebakaranlahan layer and add only features which are in the map bounds */
    kebakaranlahan.eachLayer(function(layer) {
      if (map.hasLayer(kebakaranlahanLayer)) {
        if (map.getBounds().contains(layer.getLatLng())) {
          $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kebakaranlahan.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        }
      }
    });
    /* Loop through kekeringan layer and add only features which are in the map bounds */
    kekeringan.eachLayer(function(layer) {
      if (map.hasLayer(kekeringanLayer)) {
        if (map.getBounds().contains(layer.getLatLng())) {
          $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kekeringan.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        }
      }
    });
    /* Loop through Letusan Gunungapi layer and add only features which are in the map bounds */
    letusangunungapi.eachLayer(function(layer) {
      if (map.hasLayer(letusangunungapiLayer)) {
        if (map.getBounds().contains(layer.getLatLng())) {
          $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/letusangunungapi.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        }
      }
    });

    /* Loop through bencana lain layer and add only features which are in the map bounds */
    bencanalain.eachLayer(function(layer) {
      if (map.hasLayer(bencanalainLayer)) {
        if (map.getBounds().contains(layer.getLatLng())) {
          $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/bencanalain.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        }
      }
    });

    /* Update list.js featureList */
    featureList = new List("features", {
      valueNames: ["feature-name"]
    });
    featureList.sort("feature-name", {
      order: "desc"
    });
  }

  /* Basemap Layers */
  var basemap1 = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: 'Google Streets'
  });
  var basemap2 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  });
  var basemap3 = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: 'Google Satellite'
  });
  var basemap4 = L.tileLayer('https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: 'Google Hybrid'
  });
  var basemap5 = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: 'Google Terrain'
  });

  var googletrafficlayer = L.tileLayer('https://{s}.google.com/vt?lyrs=h@159000000,traffic|seconds_into_week:-1&style=3&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: 'Google Traffic'
  });

  /* var bounds_group = new L.featureGroup([]); */

  /* Overlay Highlight Layers */
  var highlight = L.geoJson(null);
  var highlightStyle = {
    stroke: false,
    fillColor: "#00FFFF",
    fillOpacity: 0.7,
    radius: 10
  };

  /* Layer Batas Kabupaten */
  var bataskabupaten = L.geoJson(null, {
    style: function(feature) {
      return {
        color: "black",
        weight: 3,
        fill: false,
        opacity: 1,
        interactive: false
      };
    },
    /*  onEachFeature: function (feature, layer) {
        bataskabupatenSearch.push({
          name: layer.feature.properties.KABUPATEN,
          source: "BatasKabupaten",
          id: L.stamp(layer),
          bounds: layer.getBounds()
        });
      }*/
  });
  $.getJSON("<?php echo base_url('assets/homepage/'); ?>/data/admin_kabupaten.geojson", function(data) {
    bataskabupaten.addData(data);
  });

  /* Layer Batas Admin Desa */
  //var admindesaColors = {"Tinggi":"#FF0000", "Sedang":"#00FF00", "Rendah":"#0000FF"};
  var admindesa = L.geoJson(null, {
    style: function(feature) {
      return {
        //fillColor: admindesaColors[feature.properties.Klas_Kpdt],
        fill: true,
        color: "black",
        weight: 1,
        opacity: 0.7,
        fillOpacity: 0,
        interactive: true
      };
    },
    onEachFeature: function(feature, layer) {
      admindesaSearch.push({
        name: layer.feature.properties.NAMA_DESA,
        address: layer.feature.properties.KECAMATAN,
        source: "AdminDesa",
        id: L.stamp(layer),
        bounds: layer.getBounds()
      });
      if (feature.properties) {
        var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Kecamatan</th><td>" + feature.properties.KECAMATAN + "</td></tr>" + "<tr><th>Luas (KM<sup>2</sup>)</th><td>" + feature.properties.LUAS_HA + " Hektar</td></tr>" + "<table>";
        layer.on({
          click: function(e) {
            $("#feature-title").html("Desa " + feature.properties.NAMA_DESA);
            $("#feature-info").html(content);
            $("#featureModal").modal("show");
          },
          mouseover: function(e) {
            var layer = e.target;
            layer.setStyle({
              weight: 2,
              color: "#00FFFF",
              opacity: 1
            });
            admindesa.bindTooltip(feature.properties.NAMA_DESA + ", " + feature.properties.KECAMATAN);
            if (!L.Browser.ie && !L.Browser.opera) {
              layer.bringToFront();
            }
          },
          mouseout: function(e) {
            admindesa.resetStyle(e.target);
          }
        });
      }
    }
  });
  $.getJSON("<?php echo base_url('assets/homepage/'); ?>/data/admin_desa.geojson", function(data) {
    admindesa.addData(data);
  });

  /* Layer Batas Admin Desa */
  var adminkecamatan = L.geoJson(null, {
    style: function(feature) {
      return {
        color: "black",
        weight: 2,
        opacity: 1,
        fillOpacity: 0,
        interactive: false
      };
    },
    onEachFeature: function(feature, layer) {
      var content = 'Kec. ' + layer.feature.properties.KECAMATAN.toString();
      layer.bindTooltip(content, {
        direction: 'center',
        permanent: true,
        className: 'styleLabelKecamatan'
      });
    }
  });
  $.getJSON("<?php echo base_url('assets/homepage/'); ?>/data/admin_kecamatan.geojson", function(data) {
    adminkecamatan.addData(data);
  });

  /* Single marker cluster layer to hold all clusters */
  var markerClusters = new L.MarkerClusterGroup({
    spiderfyOnMaxZoom: true,
    showCoverageOnHover: true,
    zoomToBoundsOnClick: true,
    disableClusteringAtZoom: 14
  });

  /* Kejadian Bencana Tanah Longsor */
  var longsorLayer = L.geoJson(null);
  var longsor = L.geoJson(null, {
    pointToLayer: function(feature, latlng) {
      return L.marker(latlng, {
        icon: L.icon({
          iconUrl: "<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/longsor.png",
          iconSize: [28, 28],
          iconAnchor: [14, 14],
          popupAnchor: [0, -25]
        }),
        title: feature.properties.dusun + ", " + feature.properties.NAMA_DESA + ", " + feature.properties.kecamatan,
        riseOnHover: true
      });
    },
    onEachFeature: function(feature, layer) {
      if (feature.properties) {
        var content = "<table class='table table-striped table-bordered table-condensed'>" +
          "<tr><th>Lokasi</th><td>" + feature.properties.kampung + " Dusun " + feature.properties.dusun + ", Desa/Kel. " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
          "<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" +
          "<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
          "<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
          "<tr><td colspan='2'><a data-toggle='collapse' href='#collapsedetil'><div class='well well-sm'>Kerusakan dan Korban <i class='fa fa-angle-double-down' aria-hidden='true'></i></div></a>" +
            "<div id='collapsedetil' class='panel-collapse collapse'>" +
            "<table class='table table-striped table-bordered table-condensed'>" +
              "<tr><th>Jumlah Kerusakan Rumah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Rumah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Rumah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Rumah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Rumah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Pendidikan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Kesehatan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Tempat Ibadah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kantor</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kantor.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kantor.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kantor.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kantor.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kios</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kios.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kios.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kios.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kios.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Lain</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
              "<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
          "</table></div></td></tr>" +
          "<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
          "<tr><th>Kendala/ Kebutuhan Mendesak/ Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
          "<tr><th>Foto</th><td><img src='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' width='200' alt='Gagal menampilkan foto'/><br><a href='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' class='btn btn-primary btn-xs' role='button' target='_blank'>Lihat foto</a></td></tr>" +
          "<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga + "</td></tr>" +
          "<tr><th>Arah di Peta</th><td><a class='btn btn-primary' role='button' href='https://www.google.com/maps/dir/?api=1&destination=" + feature.geometry.coordinates[1] + "," + feature.geometry.coordinates[0] + "&travelmode=driving' target='_blank' title='Buat rute menuju lokasi'>Menuju lokasi</a></td></tr>" +
          "</table>";
        layer.on({
          click: function(e) {
            $("#feature-title").html("<img width='28' height='28' src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/longsor.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
            //$("#feature-title").html("<img width='28' height='28' src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/longsor.png'>&nbsp;&nbsp;Longsor");
            $("#feature-info").html(content);
            $("#featureModal").modal("show");
            highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
          }
        });
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/longsor.png"></td><td class="feature-name">' + layer.feature.properties.NAMA_DESA + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        longsorSearch.push({
          name: layer.feature.properties.NAMA_DESA,
          address: layer.feature.properties.dusun,
          date: layer.feature.properties.tgl,
          source: "Longsor",
          id: L.stamp(layer),
          lat: layer.feature.geometry.coordinates[1],
          lng: layer.feature.geometry.coordinates[0]
        });
      }
    },
    filter: function(feature, layer) {
      return feature.properties.idJenisBencana == '7';
    }
  });

  /* Kejadian Bencana Banjir */
  var banjirLayer = L.geoJson(null);
  var banjir = L.geoJson(null, {
    pointToLayer: function(feature, latlng) {
      return L.marker(latlng, {
        icon: L.icon({
          iconUrl: "<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/banjir.png",
          iconSize: [28, 28],
          iconAnchor: [14, 14],
          popupAnchor: [0, -25]
        }),
        title: feature.properties.dusun + ", " + feature.properties.NAMA_DESA + ", " + feature.properties.kecamatan,
        riseOnHover: true
      });
    },
    onEachFeature: function(feature, layer) {
      if (feature.properties) {
        var content = "<table class='table table-striped table-bordered table-condensed'>" +
          "<tr><th>Lokasi</th><td>" + feature.properties.kampung + " Dusun " + feature.properties.dusun + ", Desa/Kel. " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
          "<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" +
          "<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
          "<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
          "<tr><td colspan='2'><a data-toggle='collapse' href='#collapsedetil'><div class='well well-sm'>Kerusakan dan Korban <i class='fa fa-angle-double-down' aria-hidden='true'></i></div></a>" +
            "<div id='collapsedetil' class='panel-collapse collapse'>" +
            "<table class='table table-striped table-bordered table-condensed'>" +
              "<tr><th>Jumlah Kerusakan Rumah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Rumah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Rumah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Rumah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Rumah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Pendidikan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Kesehatan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Tempat Ibadah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kantor</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kantor.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kantor.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kantor.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kantor.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kios</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kios.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kios.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kios.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kios.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Lain</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
              "<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
          "</table></div></td></tr>" +
          "<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
          "<tr><th>Kendala/ Kebutuhan Mendesak/ Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
          "<tr><th>Foto</th><td><img src='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' width='200' alt='Gagal menampilkan foto'/><br><a href='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' class='btn btn-primary btn-xs' role='button' target='_blank'>Lihat foto</a></td></tr>" +
          "<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga + "</td></tr>" +
          "<tr><th>Arah di Peta</th><td><a class='btn btn-primary' role='button' href='https://www.google.com/maps/dir/?api=1&destination=" + feature.geometry.coordinates[1] + "," + feature.geometry.coordinates[0] + "&travelmode=driving' target='_blank' title='Buat rute menuju lokasi'>Menuju lokasi</a></td></tr>" +
          "</table>";
        layer.on({
          click: function(e) {
            $("#feature-title").html("<img width='28' height='28' src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/banjir.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
            $("#feature-info").html(content);
            $("#featureModal").modal("show");
            highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
          }
        });
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/banjir.png"></td><td class="feature-name">' + layer.feature.properties.NAMA_DESA + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        banjirSearch.push({
          name: layer.feature.properties.NAMA_DESA,
          address: layer.feature.properties.dusun,
          date: layer.feature.properties.tgl,
          source: "Banjir",
          id: L.stamp(layer),
          lat: layer.feature.geometry.coordinates[1],
          lng: layer.feature.geometry.coordinates[0]
        });
      }
    },
    filter: function(feature, layer) {
      return feature.properties.idJenisBencana == '15';
    }
  });

  /* Kejadian Bencana Cuaca Ekstrim */
  var cuacaekstrimLayer = L.geoJson(null);
  var cuacaekstrim = L.geoJson(null, {
    pointToLayer: function(feature, latlng) {
      return L.marker(latlng, {
        icon: L.icon({
          iconUrl: "<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/cuacaekstrim.png",
          iconSize: [28, 28],
          iconAnchor: [14, 14],
          popupAnchor: [0, -25]
        }),
        title: feature.properties.dusun + ", " + feature.properties.NAMA_DESA + ", " + feature.properties.kecamatan,
        riseOnHover: true
      });
    },
    onEachFeature: function(feature, layer) {
      if (feature.properties) {
        var content = "<table class='table table-striped table-bordered table-condensed'>" +
          "<tr><th>Lokasi</th><td>" + feature.properties.kampung + " Dusun " + feature.properties.dusun + ", Desa/Kel. " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
          "<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" +
          "<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
          "<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
          "<tr><td colspan='2'><a data-toggle='collapse' href='#collapsedetil'><div class='well well-sm'>Kerusakan dan Korban <i class='fa fa-angle-double-down' aria-hidden='true'></i></div></a>" +
            "<div id='collapsedetil' class='panel-collapse collapse'>" +
            "<table class='table table-striped table-bordered table-condensed'>" +
              "<tr><th>Jumlah Kerusakan Rumah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Rumah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Rumah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Rumah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Rumah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Pendidikan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Kesehatan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Tempat Ibadah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kantor</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kantor.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kantor.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kantor.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kantor.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kios</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kios.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kios.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kios.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kios.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Lain</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
              "<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
          "</table></div></td></tr>" +
          "<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
          "<tr><th>Kendala/ Kebutuhan Mendesak/ Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
          "<tr><th>Foto</th><td><img src='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' width='200' alt='Gagal menampilkan foto'/><br><a href='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' class='btn btn-primary btn-xs' role='button' target='_blank'>Lihat foto</a></td></tr>" +
          "<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga + "</td></tr>" +
          "<tr><th>Arah di Peta</th><td><a class='btn btn-primary' role='button' href='https://www.google.com/maps/dir/?api=1&destination=" + feature.geometry.coordinates[1] + "," + feature.geometry.coordinates[0] + "&travelmode=driving' target='_blank' title='Buat rute menuju lokasi'>Menuju lokasi</a></td></tr>" +
          "</table>";
        layer.on({
          click: function(e) {
            $("#feature-title").html("<img width='28' height='28' src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/cuacaekstrim.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
            $("#feature-info").html(content);
            $("#featureModal").modal("show");
            highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
          }
        });
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/cuacaekstrim.png"></td><td class="feature-name">' + layer.feature.properties.NAMA_DESA + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        cuacaekstrimSearch.push({
          name: layer.feature.properties.NAMA_DESA,
          address: layer.feature.properties.dusun,
          date: layer.feature.properties.tgl,
          source: "CuacaEkstrim",
          id: L.stamp(layer),
          lat: layer.feature.geometry.coordinates[1],
          lng: layer.feature.geometry.coordinates[0]
        });
      }
    },
    filter: function(feature, layer) {
      return feature.properties.idJenisBencana == '9' || feature.properties.idJenisBencana == '10' || feature.properties.idJenisBencana == '16';
    }
  });

  /* Kejadian Bencana Gempabumi */
  var gempabumiLayer = L.geoJson(null);
  var gempabumi = L.geoJson(null, {
    pointToLayer: function(feature, latlng) {
      return L.marker(latlng, {
        icon: L.icon({
          iconUrl: "<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/gempabumi.png",
          iconSize: [28, 28],
          iconAnchor: [14, 14],
          popupAnchor: [0, -25]
        }),
        title: feature.properties.dusun + ", " + feature.properties.NAMA_DESA + ", " + feature.properties.kecamatan,
        riseOnHover: true
      });
    },
    onEachFeature: function(feature, layer) {
      if (feature.properties) {
        var content = "<table class='table table-striped table-bordered table-condensed'>" +
          "<tr><th>Lokasi</th><td>" + feature.properties.kampung + " Dusun " + feature.properties.dusun + ", Desa/Kel. " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
          "<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" +
          "<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
          "<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
          "<tr><td colspan='2'><a data-toggle='collapse' href='#collapsedetil'><div class='well well-sm'>Kerusakan dan Korban <i class='fa fa-angle-double-down' aria-hidden='true'></i></div></a>" +
            "<div id='collapsedetil' class='panel-collapse collapse'>" +
            "<table class='table table-striped table-bordered table-condensed'>" +
              "<tr><th>Jumlah Kerusakan Rumah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Rumah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Rumah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Rumah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Rumah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Pendidikan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Kesehatan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Tempat Ibadah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kantor</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kantor.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kantor.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kantor.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kantor.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kios</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kios.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kios.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kios.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kios.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Lain</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
              "<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
          "</table></div></td></tr>" +
          "<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
          "<tr><th>Kendala/ Kebutuhan Mendesak/ Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
          "<tr><th>Foto</th><td><img src='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' width='200' alt='Gagal menampilkan foto'/><br><a href='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' class='btn btn-primary btn-xs' role='button' target='_blank'>Lihat foto</a></td></tr>" +
          "<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga + "</td></tr>" +
          "<tr><th>Arah di Peta</th><td><a class='btn btn-primary' role='button' href='https://www.google.com/maps/dir/?api=1&destination=" + feature.geometry.coordinates[1] + "," + feature.geometry.coordinates[0] + "&travelmode=driving' target='_blank' title='Buat rute menuju lokasi'>Menuju lokasi</a></td></tr>" +
          "</table>";
        layer.on({
          click: function(e) {
            $("#feature-title").html("<img width='28' height='28' src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/gempabumi.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
            $("#feature-info").html(content);
            $("#featureModal").modal("show");
            highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
          }
        });
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/gempabumi.png"></td><td class="feature-name">' + layer.feature.properties.NAMA_DESA + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        gempabumiSearch.push({
          name: layer.feature.properties.NAMA_DESA,
          address: layer.feature.properties.dusun,
          date: layer.feature.properties.tgl,
          source: "Gempabumi",
          id: L.stamp(layer),
          lat: layer.feature.geometry.coordinates[1],
          lng: layer.feature.geometry.coordinates[0]
        });
      }
    },
    filter: function(feature, layer) {
      return feature.properties.idJenisBencana == '8';
    }
  });

  /* Kejadian Bencana Kebakaran gedung permukiman */
  var kebakarangedungpermukimanLayer = L.geoJson(null);
  var kebakarangedungpermukiman = L.geoJson(null, {
    pointToLayer: function(feature, latlng) {
      return L.marker(latlng, {
        icon: L.icon({
          iconUrl: "<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kebakarangedungpermukiman.png",
          iconSize: [28, 28],
          iconAnchor: [14, 14],
          popupAnchor: [0, -25]
        }),
        title: feature.properties.dusun + ", " + feature.properties.NAMA_DESA + ", " + feature.properties.kecamatan,
        riseOnHover: true
      });
    },
    onEachFeature: function(feature, layer) {
      if (feature.properties) {
        var content = "<table class='table table-striped table-bordered table-condensed'>" +
          "<tr><th>Lokasi</th><td>" + feature.properties.kampung + " Dusun " + feature.properties.dusun + ", Desa/Kel. " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
          "<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" +
          "<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
          "<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
          "<tr><td colspan='2'><a data-toggle='collapse' href='#collapsedetil'><div class='well well-sm'>Kerusakan dan Korban <i class='fa fa-angle-double-down' aria-hidden='true'></i></div></a>" +
            "<div id='collapsedetil' class='panel-collapse collapse'>" +
            "<table class='table table-striped table-bordered table-condensed'>" +
              "<tr><th>Jumlah Kerusakan Rumah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Rumah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Rumah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Rumah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Rumah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Pendidikan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Kesehatan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Tempat Ibadah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kantor</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kantor.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kantor.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kantor.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kantor.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kios</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kios.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kios.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kios.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kios.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Lain</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
              "<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
          "</table></div></td></tr>" +
          "<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
          "<tr><th>Kendala/ Kebutuhan Mendesak/ Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
          "<tr><th>Foto</th><td><img src='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' width='200' alt='Gagal menampilkan foto'/><br><a href='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' class='btn btn-primary btn-xs' role='button' target='_blank'>Lihat foto</a></td></tr>" +
          "<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga + "</td></tr>" +
          "<tr><th>Arah di Peta</th><td><a class='btn btn-primary' role='button' href='https://www.google.com/maps/dir/?api=1&destination=" + feature.geometry.coordinates[1] + "," + feature.geometry.coordinates[0] + "&travelmode=driving' target='_blank' title='Buat rute menuju lokasi'>Menuju lokasi</a></td></tr>" +
          "</table>";
        layer.on({
          click: function(e) {
            $("#feature-title").html("<img width='28' height='28' src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kebakarangedungpermukiman.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
            $("#feature-info").html(content);
            $("#featureModal").modal("show");
            highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
          }
        });
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kebakarangedungpermukiman.png"></td><td class="feature-name">' + layer.feature.properties.NAMA_DESA + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        kebakarangedungpermukimanSearch.push({
          name: layer.feature.properties.NAMA_DESA,
          address: layer.feature.properties.dusun,
          date: layer.feature.properties.tgl,
          source: "Kebakarangedungpermukiman",
          id: L.stamp(layer),
          lat: layer.feature.geometry.coordinates[1],
          lng: layer.feature.geometry.coordinates[0]
        });
      }
    },
    filter: function(feature, layer) {
      return feature.properties.idJenisBencana == '11';
    }
  });

  /* Kejadian Bencana Kebakaran Lahan */
  var kebakaranlahanLayer = L.geoJson(null);
  var kebakaranlahan = L.geoJson(null, {
    pointToLayer: function(feature, latlng) {
      return L.marker(latlng, {
        icon: L.icon({
          iconUrl: "<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kebakaranlahan.png",
          iconSize: [28, 28],
          iconAnchor: [14, 14],
          popupAnchor: [0, -25]
        }),
        title: feature.properties.dusun + ", " + feature.properties.NAMA_DESA + ", " + feature.properties.kecamatan,
        riseOnHover: true
      });
    },
    onEachFeature: function(feature, layer) {
      if (feature.properties) {
        var content = "<table class='table table-striped table-bordered table-condensed'>" +
          "<tr><th>Lokasi</th><td>" + feature.properties.kampung + " Dusun " + feature.properties.dusun + ", Desa/Kel. " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
          "<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" +
          "<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
          "<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
          "<tr><td colspan='2'><a data-toggle='collapse' href='#collapsedetil'><div class='well well-sm'>Kerusakan dan Korban <i class='fa fa-angle-double-down' aria-hidden='true'></i></div></a>" +
            "<div id='collapsedetil' class='panel-collapse collapse'>" +
            "<table class='table table-striped table-bordered table-condensed'>" +
              "<tr><th>Jumlah Kerusakan Rumah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Rumah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Rumah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Rumah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Rumah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Pendidikan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Kesehatan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Tempat Ibadah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kantor</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kantor.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kantor.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kantor.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kantor.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kios</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kios.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kios.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kios.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kios.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Lain</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
              "<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
          "</table></div></td></tr>" +
          "<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
          "<tr><th>Kendala/ Kebutuhan Mendesak/ Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
          "<tr><th>Foto</th><td><img src='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' width='200' alt='Gagal menampilkan foto'/><br><a href='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' class='btn btn-primary btn-xs' role='button' target='_blank'>Lihat foto</a></td></tr>" +
          "<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga + "</td></tr>" +
          "<tr><th>Arah di Peta</th><td><a class='btn btn-primary' role='button' href='https://www.google.com/maps/dir/?api=1&destination=" + feature.geometry.coordinates[1] + "," + feature.geometry.coordinates[0] + "&travelmode=driving' target='_blank' title='Buat rute menuju lokasi'>Menuju lokasi</a></td></tr>" +
          "</table>";
        layer.on({
          click: function(e) {
            $("#feature-title").html("<img width='28' height='28' src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kebakaranlahan.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
            $("#feature-info").html(content);
            $("#featureModal").modal("show");
            highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
          }
        });
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kebakaranlahan.png"></td><td class="feature-name">' + layer.feature.properties.NAMA_DESA + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        kebakaranlahanSearch.push({
          name: layer.feature.properties.NAMA_DESA,
          address: layer.feature.properties.dusun,
          date: layer.feature.properties.tgl,
          source: "Kebakaranlahan",
          id: L.stamp(layer),
          lat: layer.feature.geometry.coordinates[1],
          lng: layer.feature.geometry.coordinates[0]
        });
      }
    },
    filter: function(feature, layer) {
      return feature.properties.idJenisBencana == '12';
    }
  });

  /* Kejadian Bencana Kekeringan */
  var kekeringanLayer = L.geoJson(null);
  var kekeringan = L.geoJson(null, {
    pointToLayer: function(feature, latlng) {
      return L.marker(latlng, {
        icon: L.icon({
          iconUrl: "<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kekeringan.png",
          iconSize: [28, 28],
          iconAnchor: [14, 14],
          popupAnchor: [0, -25]
        }),
        title: feature.properties.dusun + ", " + feature.properties.NAMA_DESA + ", " + feature.properties.kecamatan,
        riseOnHover: true
      });
    },
    onEachFeature: function(feature, layer) {
      if (feature.properties) {
        var content = "<table class='table table-striped table-bordered table-condensed'>" +
          "<tr><th>Lokasi</th><td>" + feature.properties.kampung + " Dusun " + feature.properties.dusun + ", Desa/Kel. " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
          "<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" +
          "<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
          "<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
          "<tr><td colspan='2'><a data-toggle='collapse' href='#collapsedetil'><div class='well well-sm'>Kerusakan dan Korban <i class='fa fa-angle-double-down' aria-hidden='true'></i></div></a>" +
            "<div id='collapsedetil' class='panel-collapse collapse'>" +
            "<table class='table table-striped table-bordered table-condensed'>" +
              "<tr><th>Jumlah Kerusakan Rumah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Rumah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Rumah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Rumah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Rumah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Pendidikan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Kesehatan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Tempat Ibadah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kantor</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kantor.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kantor.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kantor.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kantor.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kios</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kios.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kios.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kios.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kios.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Lain</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
              "<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
          "</table></div></td></tr>" +
          "<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
          "<tr><th>Kendala/ Kebutuhan Mendesak/ Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
          "<tr><th>Foto</th><td><img src='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' width='200' alt='Gagal menampilkan foto'/><br><a href='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' class='btn btn-primary btn-xs' role='button' target='_blank'>Lihat foto</a></td></tr>" +
          "<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga + "</td></tr>" +
          "<tr><th>Arah di Peta</th><td><a class='btn btn-primary' role='button' href='https://www.google.com/maps/dir/?api=1&destination=" + feature.geometry.coordinates[1] + "," + feature.geometry.coordinates[0] + "&travelmode=driving' target='_blank' title='Buat rute menuju lokasi'>Menuju lokasi</a></td></tr>" +
          "</table>";
        layer.on({
          click: function(e) {
            $("#feature-title").html("<img width='28' height='28' src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kekeringan.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
            $("#feature-info").html(content);
            $("#featureModal").modal("show");
            highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
          }
        });
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kekeringan.png"></td><td class="feature-name">' + layer.feature.properties.NAMA_DESA + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        kekeringanSearch.push({
          name: layer.feature.properties.NAMA_DESA,
          address: layer.feature.properties.dusun,
          date: layer.feature.properties.tgl,
          source: "Kekeringan",
          id: L.stamp(layer),
          lat: layer.feature.geometry.coordinates[1],
          lng: layer.feature.geometry.coordinates[0]
        });
      }
    },
    filter: function(feature, layer) {
      return feature.properties.idJenisBencana == '13';
    }
  });

  /* Kejadian Bencana Letusan Gunungapi */
  var letusangunungapiLayer = L.geoJson(null);
  var letusangunungapi = L.geoJson(null, {
    pointToLayer: function(feature, latlng) {
      return L.marker(latlng, {
        icon: L.icon({
          iconUrl: "<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/letusangunungapi.png",
          iconSize: [28, 28],
          iconAnchor: [14, 14],
          popupAnchor: [0, -25]
        }),
        title: feature.properties.dusun + ", " + feature.properties.NAMA_DESA + ", " + feature.properties.kecamatan,
        riseOnHover: true
      });
    },
    onEachFeature: function(feature, layer) {
      if (feature.properties) {
        var content = "<table class='table table-striped table-bordered table-condensed'>" +
          "<tr><th>Lokasi</th><td>" + feature.properties.kampung + " Dusun " + feature.properties.dusun + ", Desa/Kel. " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
          "<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" +
          "<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
          "<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
          "<tr><td colspan='2'><a data-toggle='collapse' href='#collapsedetil'><div class='well well-sm'>Kerusakan dan Korban <i class='fa fa-angle-double-down' aria-hidden='true'></i></div></a>" +
            "<div id='collapsedetil' class='panel-collapse collapse'>" +
            "<table class='table table-striped table-bordered table-condensed'>" +
              "<tr><th>Jumlah Kerusakan Rumah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Rumah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Rumah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Rumah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Rumah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Pendidikan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Kesehatan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Tempat Ibadah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kantor</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kantor.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kantor.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kantor.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kantor.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kios</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kios.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kios.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kios.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kios.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Lain</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
              "<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
          "</table></div></td></tr>" +
          "<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
          "<tr><th>Kendala/ Kebutuhan Mendesak/ Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
          "<tr><th>Foto</th><td><img src='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' width='200' alt='Gagal menampilkan foto'/><br><a href='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' class='btn btn-primary btn-xs' role='button' target='_blank'>Lihat foto</a></td></tr>" +
          "<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga + "</td></tr>" +
          "<tr><th>Arah di Peta</th><td><a class='btn btn-primary' role='button' href='https://www.google.com/maps/dir/?api=1&destination=" + feature.geometry.coordinates[1] + "," + feature.geometry.coordinates[0] + "&travelmode=driving' target='_blank' title='Buat rute menuju lokasi'>Menuju lokasi</a></td></tr>" +
          "</table>";
        layer.on({
          click: function(e) {
            $("#feature-title").html("<img width='28' height='28' src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/letusangunungapi.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
            $("#feature-info").html(content);
            $("#featureModal").modal("show");
            highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
          }
        });
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/letusangunungapi.png"></td><td class="feature-name">' + layer.feature.properties.NAMA_DESA + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        letusangunungapiSearch.push({
          name: layer.feature.properties.NAMA_DESA,
          address: layer.feature.properties.dusun,
          date: layer.feature.properties.tgl,
          source: "Letusangunungapi",
          id: L.stamp(layer),
          lat: layer.feature.geometry.coordinates[1],
          lng: layer.feature.geometry.coordinates[0]
        });
      }
    },
    filter: function(feature, layer) {
      return feature.properties.idJenisBencana == '14';
    }
  });

  /* Kejadian Bencana Lainnya */
  var bencanalainLayer = L.geoJson(null);
  var bencanalain = L.geoJson(null, {
    pointToLayer: function(feature, latlng) {
      return L.marker(latlng, {
        icon: L.icon({
          iconUrl: "<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/bencanalain.png",
          iconSize: [28, 28],
          iconAnchor: [14, 14],
          popupAnchor: [0, -25]
        }),
        title: feature.properties.dusun + ", " + feature.properties.NAMA_DESA + ", " + feature.properties.kecamatan,
        riseOnHover: true
      });
    },
    onEachFeature: function(feature, layer) {
      if (feature.properties) {
        var content = "<table class='table table-striped table-bordered table-condensed'>" +
          "<tr><th>Lokasi</th><td>" + feature.properties.kampung + " Dusun " + feature.properties.dusun + ", Desa/Kel. " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
          "<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" +
          "<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
          "<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
          "<tr><td colspan='2'><a data-toggle='collapse' href='#collapsedetil'><div class='well well-sm'>Kerusakan dan Korban <i class='fa fa-angle-double-down' aria-hidden='true'></i></div></a>" +
            "<div id='collapsedetil' class='panel-collapse collapse'>" +
            "<table class='table table-striped table-bordered table-condensed'>" +
              "<tr><th>Jumlah Kerusakan Rumah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Rumah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Rumah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Rumah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Rumah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Pendidikan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Pendidikan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Sarana Kesehatan</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Sarana_Kesehatan.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Tempat Ibadah</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Tempat_Ibadah.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kantor</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kantor.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kantor.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kantor.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kantor.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Kios</th><td>" + "Rusak Berat : " + feature.properties.jml_kerusakan_properti.Kios.berat + "<br>" + "Rusak Sedang : " + feature.properties.jml_kerusakan_properti.Kios.sedang + "<br>" + "Rusak Ringan : " + feature.properties.jml_kerusakan_properti.Kios.ringan + "<br>" + "Terancam : " + feature.properties.jml_kerusakan_properti.Kios.terancam + "</td></tr>" +
              "<tr><th>Jumlah Kerusakan Lain</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
              "<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
          "</table></div></td></tr>" +
          "<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
          "<tr><th>Kendala/ Kebutuhan Mendesak/ Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
          "<tr><th>Foto</th><td><img src='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' width='200' alt='Gagal menampilkan foto'/><br><a href='<?php echo base_url('upload/foto_bencana/'); ?>/" + feature.properties.nama_foto + "' class='btn btn-primary btn-xs' role='button' target='_blank'>Lihat foto</a></td></tr>" +
          "<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga + "</td></tr>" +
          "<tr><th>Arah di Peta</th><td><a class='btn btn-primary' role='button' href='https://www.google.com/maps/dir/?api=1&destination=" + feature.geometry.coordinates[1] + "," + feature.geometry.coordinates[0] + "&travelmode=driving' target='_blank' title='Buat rute menuju lokasi'>Menuju lokasi</a></td></tr>" +
          "</table>";
        layer.on({
          click: function(e) {
            $("#feature-title").html("<img width='28' height='28' src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/bencanalain.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
            $("#feature-info").html(content);
            $("#featureModal").modal("show");
            highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
          }
        });
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/bencanalain.png"></td><td class="feature-name">' + layer.feature.properties.NAMA_DESA + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
        bencanalainSearch.push({
          name: layer.feature.properties.NAMA_DESA,
          address: layer.feature.properties.dusun,
          date: layer.feature.properties.tgl,
          source: "BencanaLain",
          id: L.stamp(layer),
          lat: layer.feature.geometry.coordinates[1],
          lng: layer.feature.geometry.coordinates[0]
        });
      }
    },
    filter: function(feature, layer) {
      return feature.properties.idJenisBencana > 19;
    }
  });

  $.getJSON("<?php echo base_url('source_bencana/all/'); ?>", function(data) {
    longsor.addData(data);
    map.addLayer(longsorLayer);
    banjir.addData(data);
    map.addLayer(banjirLayer);
    cuacaekstrim.addData(data);
    map.addLayer(cuacaekstrimLayer);
    gempabumi.addData(data);
    map.addLayer(gempabumiLayer);
    kebakarangedungpermukiman.addData(data);
    map.addLayer(kebakarangedungpermukimanLayer);
    kebakaranlahan.addData(data);
    map.addLayer(kebakaranlahanLayer);
    kekeringan.addData(data);
    map.addLayer(kekeringanLayer);
    letusangunungapi.addData(data);
    map.addLayer(letusangunungapiLayer);
    bencanalain.addData(data);
    map.addLayer(bencanalainLayer);
  });

  /* Map Center */
  map = L.map("map", {
    zoom: 11,
    center: [-7.4015936, 109.9209595],
    layers: [basemap5, bataskabupaten, markerClusters, highlight],
    zoomControl: false,
    attributionControl: false
  });

  /* Raster Bahaya */
  var img_bounds_BAHAYA = [
    [-7.613021630671373, 109.733741024605],
    [-7.186299222776389, 110.07463624143612]
  ];

  var img_BAHAYA_BANJIR_BANDANG = '<?php echo base_url('assets/homepage/'); ?>/data/krb_bahaya/BAHAYA_BANJIR_BANDANG.png';
  var layer_BAHAYA_BANJIR_BANDANG = new L.imageOverlay(img_BAHAYA_BANJIR_BANDANG,
    img_bounds_BAHAYA);
  layer_BAHAYA_BANJIR_BANDANG.setOpacity(0.75);
  // map.addLayer(layer_BAHAYA_BANJIR_BANDANG);

  var img_BAHAYA_CUACAEKSTRIM = '<?php echo base_url('assets/homepage/'); ?>/data/krb_bahaya/BAHAYA_CUACAEKSTRIM.png';
  var layer_BAHAYA_CUACAEKSTRIM = new L.imageOverlay(img_BAHAYA_CUACAEKSTRIM,
    img_bounds_BAHAYA);
  layer_BAHAYA_CUACAEKSTRIM.setOpacity(0.75);

  var img_BAHAYA_GEMPABUMI = '<?php echo base_url('assets/homepage/'); ?>/data/krb_bahaya/BAHAYA_GEMPABUMI.png';
  var layer_BAHAYA_GEMPABUMI = new L.imageOverlay(img_BAHAYA_GEMPABUMI,
    img_bounds_BAHAYA);
  layer_BAHAYA_GEMPABUMI.setOpacity(0.75);

  var img_BAHAYA_GUNUNGAPI = '<?php echo base_url('assets/homepage/'); ?>/data/krb_bahaya/BAHAYA_GUNUNGAPI.png';
  var layer_BAHAYA_GUNUNGAPI = new L.imageOverlay(img_BAHAYA_GUNUNGAPI,
    img_bounds_BAHAYA);
  layer_BAHAYA_GUNUNGAPI.setOpacity(0.75);

  var img_BAHAYA_LONGSOR = '<?php echo base_url('assets/homepage/'); ?>/data/krb_bahaya/BAHAYA_LONGSOR.png';
  var layer_BAHAYA_LONGSOR = new L.imageOverlay(img_BAHAYA_LONGSOR,
    img_bounds_BAHAYA);
  layer_BAHAYA_LONGSOR.setOpacity(0.75);

  var img_MULTIBAHAYA = '<?php echo base_url('assets/homepage/'); ?>/data/krb_bahaya/MULTIBAHAYA.png';
  var layer_MULTIBAHAYA = new L.imageOverlay(img_MULTIBAHAYA,
    img_bounds_BAHAYA);
  layer_MULTIBAHAYA.setOpacity(0.75);

  // KRB G. Sundoro
  var krbsundoro = L.geoJson(null, {
    style: function(feature) {
      return {
        fillColor: feature.properties.color,
        fill: true,
        color: feature.properties.color,
        opacity: 1,
        weight: 0.5,
        fillOpacity: 0.7,
        smoothFactor: 0,
        clickable: true
      };
    },
    onEachFeature: function(feature, layer) {
      layer.on({
        click: function(e) {
          krbsundoro.bindTooltip(feature.properties.KETERANGAN, {
            sticky: true
          });
        },
        mouseover: function(e) {
          var layer = e.target;
          layer.setStyle({
            weight: 2,
            color: "#00FFFF",
            opacity: 1,
            fillColor: "#00FFFF",
            fillOpacity: 0.7
          });
          krbsundoro.bindTooltip(feature.properties.UNSUR, {
            sticky: true
          });
          if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
          }
        },
        mouseout: function(e) {
          krbsundoro.resetStyle(e.target);
          krbsundoro.closeTooltip();
        }
      });
    }
  });
  $.getJSON("<?= base_url('assets/homepage/data/krb_bahaya/')?>/krb_gunungapi_sundoro.geojson", function(data) {
    krbsundoro.addData(data);
  });

  /* Titik Gas Beracun */
  var titikgasberacun = L.geoJson(null, {
    pointToLayer: function(feature, latlng) {
      return L.marker(latlng, {
        icon: L.icon({
          iconUrl: "<?php echo base_url('assets/homepage/'); ?>/assets/icon/hazard/gasberacun.png",
          iconSize: [28, 28],
          iconAnchor: [14, 28],
          popupAnchor: [0, -28]
        }),
        title: feature.properties.jenis_potensi,
        riseOnHover: true
      });
    },
    onEachFeature: function(feature, layer) {
      if (feature.properties) {
        var content = "<table class='table table-striped table-bordered table-condensed'>" +
          "<tr><th>Jenis Potensi</th><td>" + feature.properties.jenis_potensi + "</td></tr>" +
          "<tr><th>Keterangan</th><td>" + feature.properties.keterangan + "</td></tr>" +
          "</table>";
        layer.on({
          click: function(e) {
            titikgasberacun.bindPopup(content);
            highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
          }
        });
      }
    }
  });
  $.getJSON("<?= base_url('assets/homepage/data/ancaman_gasberacun/')?>/titik_gasberacun.geojson", function(data) {
    titikgasberacun.addData(data);
  });

  /* Titik Evakuasi Gas Beracun */
  var titikevakuasigasberacun = L.geoJson(null, {
    pointToLayer: function(feature, latlng) {
      return L.marker(latlng, {
        icon: L.icon({
          iconUrl: "<?php echo base_url('assets/homepage/'); ?>/assets/icon/hazard/homegreen.png",
          iconSize: [28, 28],
          iconAnchor: [14, 28],
          popupAnchor: [0, -28]
        }),
        title: feature.properties.keterangan,
        riseOnHover: true
      });
    },
    onEachFeature: function(feature, layer) {
      if (feature.properties) {
        var content = "<table class='table table-striped table-bordered table-condensed'>" +
          "<tr><th>" + feature.properties.keterangan + "</th></tr>" +
          "<tr><td class='text-center'><a href='https://www.google.com/maps/dir/?api=1&destination=" + feature.geometry.coordinates[1] + "," + feature.geometry.coordinates[0] + "&travelmode=driving' target='_blank' title='Buat rute menuju lokasi'><button class='btn btn-primary btn-sm'>Menuju lokasi</button></a></td></tr>" +
          "</table>";
        layer.on({
          click: function(e) {
            titikevakuasigasberacun.bindPopup(content);
            highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
          }
        });
      }
    }
  });
  $.getJSON("<?= base_url('assets/homepage/data/ancaman_gasberacun/')?>/titik_evakuasi_gasberacun.geojson", function(data) {
    titikevakuasigasberacun.addData(data);
  });

  /* Layer Potensi Rekahan */
  var potensirekahan = L.geoJson(null, {
    style: function(feature) {
      return {
        color: "#e600e6",
        weight: 2,
        opacity: 1,
      };
    },
    onEachFeature: function(feature, layer) {
      layer.on({
        click: function(e) {
          potensirekahan.bindPopup(feature.properties.keterangan);
        }
      });
    }
  });
  $.getJSON("<?= base_url('assets/homepage/data/ancaman_gasberacun/')?>/potensi_rekahan.geojson", function(data) {
    potensirekahan.addData(data);
  });

  // KRB Gas Beracun
  var krbgasberacun = L.geoJson(null, {
    style: function(feature) {
      return {
        fillColor: feature.properties.color,
        fill: true,
        color: feature.properties.color,
        opacity: 1,
        weight: 0.5,
        fillOpacity: 0.7,
        smoothFactor: 0,
        clickable: true
      };
    },
    onEachFeature: function(feature, layer) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
          "<tr><th>Kawasan Rawan Bencana</th><td>" + feature.properties.krb_gas + "</td></tr>" +
          "<tr><th>Keterangan</th><td>" + feature.properties.keterangan + "</td></tr>" +
          "</table>";
      layer.on({
        click: function(e) {
          krbgasberacun.bindPopup(content);
        },
        mouseover: function(e) {
          var layer = e.target;
          layer.setStyle({
            weight: 2,
            color: "#00FFFF",
            opacity: 1,
            fillColor: "#00FFFF",
            fillOpacity: 0.7
          });
          krbgasberacun.bindTooltip(feature.properties.krb_gas, {
            sticky: true
          });
          if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
          }
        },
        mouseout: function(e) {
          krbgasberacun.resetStyle(e.target);
          krbgasberacun.closePopup();
        }
      });
    }
  });
  $.getJSON("<?= base_url('assets/homepage/data/ancaman_gasberacun/')?>/krb_gasberacun.geojson", function(data) {
    krbgasberacun.addData(data);
  });

  // Jalur Evakuasi Dieng - Patakbanteng
  var optionsdiengpatakbanteng = {
    delay: 1000,
    dashArray: [10, 20],
    weight: 3,
    color: "#ff0000",
    pulseColor: "#ffffff",
    opacity: 0.8
  };
  let antPathDiengPatakbanteng = new L.Polyline.AntPath(trackdiengpatakbanteng, optionsdiengpatakbanteng);
  antPathDiengPatakbanteng.bindPopup('Jalur Evakuasi Dieng - Patakbanteng');

  // Jalur Evakuasi Sikunang - Campursari
  var optionssikunangcampursari = {
    delay: 1000,
    dashArray: [10, 20],
    weight: 3,
    color: "#cc6600",
    pulseColor: "#ffffff",
    opacity: 0.8
  };
  let antPathSikunangCampursari = new L.Polyline.AntPath(tracksikunangcampursari, optionssikunangcampursari);
  antPathSikunangCampursari.bindPopup('Jalur Evakuasi Sikunang - Campursari');

  // Jalur Evakuasi Sikunang - Sembungan
  var optionssikunangsembungan = {
    delay: 1000,
    dashArray: [10, 20],
    weight: 3,
    color: "#0000ff",
    pulseColor: "#ffffff",
    opacity: 0.8
  };
  let antPathSikunangSembungan = new L.Polyline.AntPath(tracksikunangsembungan, optionssikunangsembungan);
  antPathSikunangSembungan.bindPopup('Jalur Evakuasi Sikunang - Sembungan');

  // Reset Label
  resetLabels([adminkecamatan]);
  map.on("zoomend", function() {
    resetLabels([adminkecamatan]);
  });
  map.on("move", function() {
    resetLabels([adminkecamatan]);
  });
  map.on("layeradd", function() {
    resetLabels([adminkecamatan]);
  });
  map.on("layerremove", function() {
    resetLabels([adminkecamatan]);
  });

  /* Layer control listeners that allow for a single markerClusters layer */
  map.on("overlayadd", function(e) {
    if (e.layer === longsorLayer) {
      markerClusters.addLayer(longsor);
      syncSidebar();
    }
    if (e.layer === banjirLayer) {
      markerClusters.addLayer(banjir);
      syncSidebar();
    }
    if (e.layer === cuacaekstrimLayer) {
      markerClusters.addLayer(cuacaekstrim);
      syncSidebar();
    }
    if (e.layer === gempabumiLayer) {
      markerClusters.addLayer(gempabumi);
      syncSidebar();
    }
    if (e.layer === kebakarangedungpermukimanLayer) {
      markerClusters.addLayer(kebakarangedungpermukiman);
      syncSidebar();
    }
    if (e.layer === kebakaranlahanLayer) {
      markerClusters.addLayer(kebakaranlahan);
      syncSidebar();
    }
    if (e.layer === kekeringanLayer) {
      markerClusters.addLayer(kekeringan);
      syncSidebar();
    }
    if (e.layer === letusangunungapiLayer) {
      markerClusters.addLayer(letusangunungapi);
      syncSidebar();
    }
    if (e.layer === bencanalainLayer) {
      markerClusters.addLayer(bencanalain);
      syncSidebar();
    }
  });

  map.on("overlayremove", function(e) {
    if (e.layer === longsorLayer) {
      markerClusters.removeLayer(longsor);
      syncSidebar();
      highlight.clearLayers();
    }
    if (e.layer === banjirLayer) {
      markerClusters.removeLayer(banjir);
      syncSidebar();
      highlight.clearLayers();
    }
    if (e.layer === cuacaekstrimLayer) {
      markerClusters.removeLayer(cuacaekstrim);
      syncSidebar();
      highlight.clearLayers();
    }
    if (e.layer === gempabumiLayer) {
      markerClusters.removeLayer(gempabumi);
      syncSidebar();
      highlight.clearLayers();
    }
    if (e.layer === kebakarangedungpermukimanLayer) {
      markerClusters.removeLayer(kebakarangedungpermukiman);
      syncSidebar();
      highlight.clearLayers();
    }
    if (e.layer === kebakaranlahanLayer) {
      markerClusters.removeLayer(kebakaranlahan);
      syncSidebar();
      highlight.clearLayers();
    }
    if (e.layer === kekeringanLayer) {
      markerClusters.removeLayer(kekeringan);
      syncSidebar();
      highlight.clearLayers();
    }
    if (e.layer === letusangunungapiLayer) {
      markerClusters.removeLayer(letusangunungapi);
      syncSidebar();
      highlight.clearLayers();
    }
    if (e.layer === bencanalainLayer) {
      markerClusters.removeLayer(bencanalain);
      syncSidebar();
      highlight.clearLayers();
    }
  });

  /* Filter sidebar feature list to only show features in current map bounds */
  map.on("moveend", function(e) {
    syncSidebar();
  });

  /* Clear feature highlight when map is clicked */
  map.on("click", function(e) {
    highlight.clearLayers();
  });

  /* Attribution control */
  function updateAttribution(e) {
    $.each(map._layers, function(index, layer) {
      if (layer.getAttribution) {
        $("#attribution").html((layer.getAttribution()));
      }
    });
  }
  map.on("layeradd", updateAttribution);
  map.on("layerremove", updateAttribution);

  var attributionControl = L.control({
    position: "bottomright"
  });
  attributionControl.onAdd = function(map) {
    var div = L.DomUtil.create("div", "leaflet-control-attribution");
    div.innerHTML = "<a href='#' onclick='$(\"#attributionModal\").modal(\"show\"); return false;'>Info</a>";
    return div;
  };
  map.addControl(attributionControl);

  /* Zoom Control Position */
  var zoomControl = L.control.zoom({
    position: "topleft"
  }).addTo(map);

  L.control.defaultExtent().addTo(map);

  /* GPS enabled geolocation control set to follow the user's location */
  var locateControl = L.control.locate({
    position: "topleft",
    drawCircle: true,
    follow: true,
    setView: true,
    keepCurrentZoomLevel: true,
    markerStyle: {
      weight: 1,
      opacity: 0.8,
      fillOpacity: 0.8
    },
    circleStyle: {
      weight: 1,
      interactive: false
    },
    icon: "fa fa-location-arrow",
    metric: true,
    strings: {
      title: "Klik untuk mengetahui lokasi Anda",
      popup: "Lokasi Anda saat ini<br>Akurasi {distance} {unit}",
      outsideMapBoundsMsg: "Anda berada di luar area peta"
    },
    locateOptions: {
      maxZoom: 18,
      watch: true,
      enableHighAccuracy: true,
      maximumAge: 10000,
      timeout: 10000
    }
  }).addTo(map);

  /* Larger screens get expanded layer control and visible sidebar */
  if (document.body.clientWidth <= 767) {
    var isCollapsed = true;
  } else {
    var isCollapsed = false;
  }

  /* Control Layer Tree */
  var basemapTree = {
    label: '<b>Basemap</b>',
    children: [{
        label: 'Google Streets',
        layer: basemap1
      },
      {
        label: 'OpenStreeMap',
        layer: basemap2
      },
      {
        label: 'Google Satellite',
        layer: basemap3
      },
      {
        label: 'Google Hybrid',
        layer: basemap4
      },
      {
        label: 'Google Terrain',
        layer: basemap5
      },
    ]
  };
  var layersTree = {
    label: '<b>Layer</b>',
    noShow: true,
    children: [{
        label: '<b>Kejadian Bencana</b>',
        children: [{
            label: '<img src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/longsor.png" width="24" height="24">&nbsp;Longsor',
            layer: longsorLayer
          },
          {
            label: '<img src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/banjir.png" width="24" height="24">&nbsp;Banjir',
            layer: banjirLayer
          },
          {
            label: '<img src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/gempabumi.png" width="24" height="24">&nbsp;Gempabumi',
            layer: gempabumiLayer
          },
          {
            label: '<img src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/cuacaekstrim.png" width="24" height="24">&nbsp;Cuaca Ekstrim',
            layer: cuacaekstrimLayer
          },
          {
            label: '<img src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kebakaranlahan.png" width="24" height="24">&nbsp;Kebakaran Hutan/Lahan',
            layer: kebakaranlahanLayer
          },
          {
            label: '<img src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kebakarangedungpermukiman.png" width="24" height="24">&nbsp;Kebakaran Gedung/Permukiman',
            layer: kebakarangedungpermukimanLayer
          },
          {
            label: '<img src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kekeringan.png" width="24" height="24">&nbsp;Kekeringan',
            layer: kekeringanLayer
          },
          {
            label: '<img src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/letusangunungapi.png" width="24" height="24">&nbsp;Letusan Gunungapi',
            layer: letusangunungapiLayer
          },
          {
            label: '<img src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/bencanalain.png" width="24" height="24">&nbsp;Kejadian lain',
            layer: bencanalainLayer
          },
        ]
      },
      {
        label: '<b>Layer</b>',
        children: [{
            label: 'Batas Kabupaten',
            layer: bataskabupaten
          },
          {
            label: 'Batas Kecamatan',
            layer: adminkecamatan
          },
          {
            label: 'Batas Desa',
            layer: admindesa
          },
          // {
          //   label: 'Penduduk Kecamatan',
          //   layer: pendudukkec
          // },
          {
            label: 'Lalu Lintas (Traffic)',
            layer: googletrafficlayer
          },
        ]
      },
      {
        label: '<b>Bahaya Bencana</b><br>&nbsp;&nbsp;&nbsp;&nbsp;<svg width="18" height="12"><rect width="18" height="12" style="fill:rgb(255,0,0,0.7);stroke:rgb(153,153,153,0.7);" /></svg> Tinggi<br>&nbsp;&nbsp;&nbsp;&nbsp;<svg width="18" height="12"><rect width="18" height="12" style="fill:rgb(255,255,0,0.7);stroke:rgb(153,153,153,0.7);" /></svg> Sedang<br>&nbsp;&nbsp;&nbsp;&nbsp;<svg width="18" height="12"><rect width="18" height="12" style="fill:rgb(0,200,0,0.7);stroke:rgb(153,153,153,0.7);" /></svg> Rendah<br>&nbsp;&nbsp;&nbsp;&nbsp;<svg width="18" height="12"><rect width="18" height="12" style="fill:rgb(0,185,255,0.7);stroke:rgb(153,153,153,0.7);" /></svg> Waduk/Telaga',
        children: [{
            label: 'Bahaya Banjir Bandang',
            layer: layer_BAHAYA_BANJIR_BANDANG
          },
          {
            label: 'Bahaya Cuaca Ekstrim',
            layer: layer_BAHAYA_CUACAEKSTRIM
          },
          {
            label: 'Bahaya Gempabumi',
            layer: layer_BAHAYA_GEMPABUMI
          },
          {
            label: 'Bahaya Letusan Gunungapi',
            layer: layer_BAHAYA_GUNUNGAPI
          },
          {
            label: 'Bahaya Longsor',
            layer: layer_BAHAYA_LONGSOR
          },
          {
            label: 'Multi Bahaya',
            layer: layer_MULTIBAHAYA
          },
          {
            label: 'KRB G. Sundoro<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg width="18" height="12"><rect width="18" height="12" style="fill:rgb(255,255,0,0.7);stroke:rgb(153,153,153,0.7);" /></svg> Kawasan Rawan Bencana I<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg width="18" height="12"><rect width="18" height="12" style="fill:rgb(253,132,45,0.7);stroke:rgb(153,153,153,0.7);" /></svg> Kawasan Rawan Bencana II<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg width="18" height="12"><rect width="18" height="12" style="fill:rgb(204,0,44,0.7);stroke:rgb(153,153,153,0.7);" /></svg> Kawasan Rawan Bencana III',
            layer: krbsundoro
          },
        ]
      },
      {
        label: '<b>Ancaman Gas Beracun</b>',
        children: [{
            label: '<img src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/hazard/gasberacun.png" width="24" height="24"> Titik Gas Beracun',
            layer: titikgasberacun
          },
          {
            label: '<svg height="12" width="18"><line x1="0" y1="7" x2="18" y2="7" style="stroke:rgb(230,0,230);stroke-width:2" /></svg>&nbsp;&nbsp;Potensi Rekahan',
            layer: potensirekahan
          },
          {
            label: 'KRB Gas Beracun<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg width="18" height="12"><rect width="18" height="12" style="fill:rgb(253,132,45,0.7);stroke:rgb(153,153,153,0.7);" /></svg> Kawasan Rawan Bencana II<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<svg width="18" height="12"><rect width="18" height="12" style="fill:rgb(204,0,44,0.7);stroke:rgb(153,153,153,0.7);" /></svg> Kawasan Rawan Bencana III',
            layer: krbgasberacun
          },
        ]
      },
      {
        label: '<b>Jalur Evakuasi</b>',
        children: [
          {
            label: '<img src="<?php echo base_url('assets/homepage/'); ?>/assets/icon/hazard/homegreen.png" width="24" height="24"> Titik Evakuasi',
            layer: titikevakuasigasberacun
          },
          {
            label: '<svg height="12" width="18"><line x1="0" y1="7" x2="18" y2="7" style="stroke:rgb(255,0,0);stroke-width:3" stroke-dasharray="4,4" /></svg>&nbsp;&nbsp;Dieng - Patakbanteng',
            layer: antPathDiengPatakbanteng
          },
          {
            label: '<svg height="12" width="18"><line x1="0" y1="7" x2="18" y2="7" style="stroke:rgb(204,102,0);stroke-width:3" stroke-dasharray="4,4" /></svg>&nbsp;&nbsp;Sikunang - Campursari',
            layer: antPathSikunangCampursari
          },
          {
            label: '<svg height="12" width="18"><line x1="0" y1="7" x2="18" y2="7" style="stroke:rgb(0,0,255);stroke-width:3" stroke-dasharray="4,4" /></svg>&nbsp;&nbsp;Sikunang - Sembungan',
            layer: antPathSikunangSembungan
          },
        ]
      }
    ]
  }

  var layercontroltree = L.control.layers.tree(basemapTree, layersTree, {
    namedToggle: false,
    selectorBack: false,
    //closedSymbol: '&#8862; &#x1f5c0;',
    //openedSymbol: '&#8863; &#x1f5c1;',
    collapsed: isCollapsed,
    //collapseAll: 'Collapse all',
    //expandAll: 'Expand all',
  });
  layercontroltree.addTo(map).collapseTree(false).expandSelected(true);

  /* Highlight search box text on click */
  $("#searchbox").click(function() {
    $(this).select();
  });

  /* Prevent hitting enter from refreshing the page */
  $("#searchbox").keypress(function(e) {
    if (e.which == 13) {
      e.preventDefault();
    }
  });

  /* Feature Modal Show Clear Highlight */
  $("#featureModal").on("hidden.bs.modal", function(e) {
    $(document).on("mouseout", ".feature-row", clearHighlight);
  });

  /* Typeahead search functionality */
  $(document).one("ajaxStop", function() {
    $("#loading").hide();
    // $("#alertModal").modal("show");
    sizeLayerControl();
    /* Fit map to bataskabupaten bounds */
    map.fitBounds(bataskabupaten.getBounds());
    featureList = new List("features", {
      valueNames: ["feature-name"]
    });
    featureList.sort("feature-name", {
      order: "asc"
    });

    /* Search Layer */
    var admindesaBH = new Bloodhound({
      name: "AdminDesa",
      datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.name);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: admindesaSearch,
      limit: 10
    });

    /*var pendudukkecBH = new Bloodhound({
      name: "PendudukKec",
      datumTokenizer: function (d) {
        return Bloodhound.tokenizers.whitespace(d.name);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: pendudukkecSearch,
      limit: 10
    });*/

    var longsorBH = new Bloodhound({
      name: "Longsor",
      datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.name);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: longsorSearch,
      limit: 10
    });

    var banjirBH = new Bloodhound({
      name: "Banjir",
      datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.name);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: banjirSearch,
      limit: 10
    });

    var cuacaekstrimBH = new Bloodhound({
      name: "CuacaEkstrim",
      datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.name);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: cuacaekstrimSearch,
      limit: 10
    });

    var gempabumiBH = new Bloodhound({
      name: "Gempabumi",
      datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.name);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: gempabumiSearch,
      limit: 10
    });

    var kebakarangedungpermukimanBH = new Bloodhound({
      name: "Kebakarangedungpermukiman",
      datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.name);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: kebakarangedungpermukimanSearch,
      limit: 10
    });

    var kebakaranlahanBH = new Bloodhound({
      name: "Kebakaranlahan",
      datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.name);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: kebakaranlahanSearch,
      limit: 10
    });

    var kekeringanBH = new Bloodhound({
      name: "Kekeringan",
      datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.name);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: kekeringanSearch,
      limit: 10
    });

    var letusangunungapiBH = new Bloodhound({
      name: "Letusangunungapi",
      datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.name);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: letusangunungapiSearch,
      limit: 10
    });

    var bencanalainBH = new Bloodhound({
      name: "BencanaLain",
      datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.name);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      local: bencanalainSearch,
      limit: 10
    });


    var geonamesBH = new Bloodhound({
      name: "GeoNames",
      datumTokenizer: function(d) {
        return Bloodhound.tokenizers.whitespace(d.name);
      },
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      remote: {
        url: "https://api.geonames.org/searchJSON?username=bootleaf&featureClass=P&maxRows=5&countryCode=US&name_startsWith=%QUERY",
        filter: function(data) {
          return $.map(data.geonames, function(result) {
            return {
              name: result.name + ", " + result.adminCode1,
              lat: result.lat,
              lng: result.lng,
              source: "GeoNames"
            };
          });
        },
        ajax: {
          beforeSend: function(jqXhr, settings) {
            settings.url += "&east=" + map.getBounds().getEast() + "&west=" + map.getBounds().getWest() + "&north=" + map.getBounds().getNorth() + "&south=" + map.getBounds().getSouth();
            $("#searchicon").removeClass("fa-search").addClass("fa-refresh fa-spin");
          },
          complete: function(jqXHR, status) {
            $('#searchicon').removeClass("fa-refresh fa-spin").addClass("fa-search");
          }
        }
      },
      limit: 10
    });
    admindesaBH.initialize();
    // pendudukkecBH.initialize();
    longsorBH.initialize();
    banjirBH.initialize();
    cuacaekstrimBH.initialize();
    gempabumiBH.initialize();
    kebakarangedungpermukimanBH.initialize();
    kebakaranlahanBH.initialize();
    kekeringanBH.initialize();
    letusangunungapiBH.initialize();
    geonamesBH.initialize();
    bencanalainBH.initialize();

    /* instantiate the typeahead UI */
    $("#searchbox").typeahead({
      minLength: 3,
      highlight: true,
      hint: false
    }, {
      name: "AdminDesa",
      displayKey: "name",
      source: admindesaBH.ttAdapter(),
      templates: {
        header: "<h4 class='typeahead-header'>Desa</h4>",
        suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>Kec. {{address}}</small>"].join(""))
      }
      /*}, {
        name: "PendudukKec",
        displayKey: "name",
        source: pendudukkecBH.ttAdapter(),
        templates: {
          header: "<h4 class='typeahead-header'>Kecamatan</h4>"
        }*/
    }, {
      name: "Longsor",
      displayKey: "name",
      source: longsorBH.ttAdapter(),
      templates: {
        header: "<h4 class='typeahead-header'><img src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/longsor.png' width='24' height='24'>&nbsp;Longsor</h4>",
        suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}} - {{date}}</small>"].join(""))
      }
    }, {
      name: "Banjir",
      displayKey: "name",
      source: banjirBH.ttAdapter(),
      templates: {
        header: "<h4 class='typeahead-header'><img src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/banjir.png' width='24' height='24'>&nbsp;Banjir</h4>",
        suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}} - {{date}}</small>"].join(""))
      }
    }, {
      name: "CuacaEkstrim",
      displayKey: "name",
      source: cuacaekstrimBH.ttAdapter(),
      templates: {
        header: "<h4 class='typeahead-header'><img src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/cuacaekstrim.png' width='24' height='24'>&nbsp;Cuaca Ekstrim</h4>",
        suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}} - {{date}}</small>"].join(""))
      }
    }, {
      name: "Gempabumi",
      displayKey: "name",
      source: gempabumiBH.ttAdapter(),
      templates: {
        header: "<h4 class='typeahead-header'><img src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/gempabumi.png' width='24' height='24'>&nbsp;Gempabumi</h4>",
        suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}} - {{date}}</small>"].join(""))
      }
    }, {
      name: "Kebakarangedungpermukiman",
      displayKey: "name",
      source: kebakarangedungpermukimanBH.ttAdapter(),
      templates: {
        header: "<h4 class='typeahead-header'><img src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kebakarangedungpermukiman.png' width='24' height='24'>&nbsp;Kebakaran Gedung Permukiman</h4>",
        suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}} - {{date}}</small>"].join(""))
      }
    }, {
      name: "Kebakaranlahan",
      displayKey: "name",
      source: kebakaranlahanBH.ttAdapter(),
      templates: {
        header: "<h4 class='typeahead-header'><img src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kebakaranlahan.png' width='24' height='24'>&nbsp;Kebakaran Hutan/Lahan</h4>",
        suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}} - {{date}}</small>"].join(""))
      }
    }, {
      name: "Kekeringan",
      displayKey: "name",
      source: kekeringanBH.ttAdapter(),
      templates: {
        header: "<h4 class='typeahead-header'><img src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/kekeringan.png' width='24' height='24'>&nbsp;Kekeringan</h4>",
        suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}} - {{date}}</small>"].join(""))
      }
    }, {
      name: "Letusangunungapi",
      displayKey: "name",
      source: letusangunungapiBH.ttAdapter(),
      templates: {
        header: "<h4 class='typeahead-header'><img src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/letusangunungapi.png' width='24' height='24'>&nbsp;Letusan Gunungapi</h4>",
        suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}} - {{date}}</small>"].join(""))
      }
    }, {
      name: "BencanaLain",
      displayKey: "name",
      source: bencanalainBH.ttAdapter(),
      templates: {
        header: "<h4 class='typeahead-header'><img src='<?php echo base_url('assets/homepage/'); ?>/assets/icon/naturaldisaster32/bencanalain.png' width='24' height='24'>&nbsp;Cuaca Ekstrim</h4>",
        suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}} - {{date}}</small>"].join(""))
      }
    }, {
      name: "GeoNames",
      displayKey: "name",
      source: geonamesBH.ttAdapter(),
      templates: {
        header: "<h4 class='typeahead-header'><img src='<?php echo base_url('assets/homepage/'); ?>/assets/img/globe.png' width='25' height='25'>&nbsp;GeoNames</h4>"
      }
    }).on("typeahead:selected", function(obj, datum) {
      if (datum.source === "BatasKabupaten") {
        map.fitBounds(datum.bounds);
      }
      if (datum.source === "AdminDesa") {
        map.fitBounds(datum.bounds);
      }
      if (datum.source === "PendudukKec") {
        map.fitBounds(datum.bounds);
      }
      if (datum.source === "Longsor") {
        if (!map.hasLayer(longsorLayer)) {
          map.addLayer(longsorLayer);
        }
        map.setView([datum.lat, datum.lng], 15);
        if (map._layers[datum.id]) {
          map._layers[datum.id].fire("click");
        }
      }
      if (datum.source === "Banjir") {
        if (!map.hasLayer(banjirLayer)) {
          map.addLayer(banjirLayer);
        }
        map.setView([datum.lat, datum.lng], 15);
        if (map._layers[datum.id]) {
          map._layers[datum.id].fire("click");
        }
      }
      if (datum.source === "CuacaEkstrim") {
        if (!map.hasLayer(cuacaekstrimLayer)) {
          map.addLayer(cuacaekstrimLayer);
        }
        map.setView([datum.lat, datum.lng], 15);
        if (map._layers[datum.id]) {
          map._layers[datum.id].fire("click");
        }
      }
      if (datum.source === "Gempabumi") {
        if (!map.hasLayer(gempabumiLayer)) {
          map.addLayer(gempabumiLayer);
        }
        map.setView([datum.lat, datum.lng], 15);
        if (map._layers[datum.id]) {
          map._layers[datum.id].fire("click");
        }
      }
      if (datum.source === "Kebakarangedungpermukiman") {
        if (!map.hasLayer(kebakarangedungpermukimanLayer)) {
          map.addLayer(kebakarangedungpermukimanLayer);
        }
        map.setView([datum.lat, datum.lng], 15);
        if (map._layers[datum.id]) {
          map._layers[datum.id].fire("click");
        }
      }
      if (datum.source === "Kebakaranlahan") {
        if (!map.hasLayer(kebakaranlahanLayer)) {
          map.addLayer(kebakaranlahanLayer);
        }
        map.setView([datum.lat, datum.lng], 15);
        if (map._layers[datum.id]) {
          map._layers[datum.id].fire("click");
        }
      }
      if (datum.source === "Kekeringan") {
        if (!map.hasLayer(kekeringanLayer)) {
          map.addLayer(kekeringanLayer);
        }
        map.setView([datum.lat, datum.lng], 15);
        if (map._layers[datum.id]) {
          map._layers[datum.id].fire("click");
        }
      }
      if (datum.source === "Letusangunungapi") {
        if (!map.hasLayer(letusangunungapiLayer)) {
          map.addLayer(letusangunungapiLayer);
        }
        map.setView([datum.lat, datum.lng], 15);
        if (map._layers[datum.id]) {
          map._layers[datum.id].fire("click");
        }
      }
      if (datum.source === "BencanaLain") {
        if (!map.hasLayer(bencanalainLayer)) {
          map.addLayer(bencanalainLayer);
        }
        map.setView([datum.lat, datum.lng], 15);
        if (map._layers[datum.id]) {
          map._layers[datum.id].fire("click");
        }
      }
      if (datum.source === "GeoNames") {
        map.setView([datum.lat, datum.lng], 14);
      }
      if ($(".navbar-collapse").height() > 50) {
        $(".navbar-collapse").collapse("hide");
      }
    }).on("typeahead:opened", function() {
      $(".navbar-collapse.in").css("max-height", $(document).height() - $(".navbar-header").height());
      $(".navbar-collapse.in").css("height", $(document).height() - $(".navbar-header").height());
    }).on("typeahead:closed", function() {
      $(".navbar-collapse.in").css("max-height", "");
      $(".navbar-collapse.in").css("height", "");
    });
    $(".twitter-typeahead").css("position", "static");
    $(".twitter-typeahead").css("display", "block");
  });

  // Leaflet patch to make layer control scrollable on touch browsers
  var container = $(".leaflet-control-layers")[0];
  if (!L.Browser.touch) {
    L.DomEvent
      .disableClickPropagation(container)
      .disableScrollPropagation(container);
  } else {
    L.DomEvent.disableClickPropagation(container);
  }

  //Coordinate Click
  var c = new L.Control.Coordinates();
  c.addTo(map);

  function onMapClick(e) {
    c.setCoordinates(e);
  }

  map.on('click', onMapClick);

  //Logo watermark
  L.Control.Watermark = L.Control.extend({
    onAdd: function(map) {
      var img = L.DomUtil.create('img');
      img.src = '<?php echo base_url('assets/homepage/'); ?>/assets/img/bpbdwonosobo.png';
      img.style.width = '50px';
      return img;
    },
    onRemove: function(map) {
      // Nothing to do here
    }
  });
  L.control.watermark = function(opts) {
    return new L.Control.Watermark(opts);
  }
  L.control.watermark({
    position: 'bottomleft'
  }).addTo(map);
</script>