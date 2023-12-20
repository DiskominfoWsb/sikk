var map, featureList, desaSearch = [], titikkumpulSearch = [], lokasitujuanSearch = [], tempatevakuasiakhirSearch = [], wpkaliurangngluwarSearch = [], wpkeningarngrajekSearch = [], wpsewukanrambeanakSearch = [], wpkrinjingdeyanganSearch = [], wpngargomulyotamanagungSearch = [];

$(window).resize(function() {
  sizeLayerControl();
});

$(document).on("click", ".feature-row", function(e) {
  $(document).off("mouseout", ".feature-row", clearHighlight);
  sidebarClick(parseInt($(this).attr("id"), 10));
});

if ( !("ontouchstart" in window) ) {
  $(document).on("mouseover", ".feature-row", function(e) {
    highlight.clearLayers().addLayer(L.circleMarker([$(this).attr("lat"), $(this).attr("lng")], highlightStyle));
  });
}

$(document).on("mouseout", ".feature-row", clearHighlight);

$("#about-btn").click(function() {
  $("#aboutModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

$("#full-extent-btn").click(function() {
  map.fitBounds(boundsbox.getBounds());
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

$("#legend-btn").click(function() {
  $("#legendModal").modal("show");
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

function syncSidebar() {
  /* Empty sidebar features */
  $("#feature-list tbody").empty();
  /* Loop through titikkumpul layer and add only features which are in the map bounds */
  titikkumpul.eachLayer(function (layer) {
    if (map.hasLayer(titikkumpulLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/img/markerpink32.png"></td><td class="feature-name">' + layer.feature.properties.Dusun + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through lokasitujuan layer and add only features which are in the map bounds */
  lokasitujuan.eachLayer(function (layer) {
    if (map.hasLayer(lokasitujuanLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/img/office32.png"></td><td class="feature-name">' + layer.feature.properties.Desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through TEA layer and add only features which are in the map bounds */
  tempatevakuasiakhir.eachLayer(function (layer) {
    if (map.hasLayer(tempatevakuasiakhirLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/img/tea32.png"></td><td class="feature-name">' + layer.feature.properties.Lokasi_TEA + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through Waypoint Kaliurang - Ngluwar layer and add only features which are in the map bounds */
  wpkaliurangngluwar.eachLayer(function (layer) {
    if (map.hasLayer(wpkaliurangngluwarLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/img/poi.svg"></td><td class="feature-name">' + layer.feature.properties.Name + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through Waypoint Keningar - Ngrajek layer and add only features which are in the map bounds */
  wpkeningarngrajek.eachLayer(function (layer) {
    if (map.hasLayer(wpkeningarngrajekLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/img/poi.svg"></td><td class="feature-name">' + layer.feature.properties.Name + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through Waypoint Sewukan - Rambeanak layer and add only features which are in the map bounds */
  wpsewukanrambeanak.eachLayer(function (layer) {
    if (map.hasLayer(wpsewukanrambeanakLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/img/poi.svg"></td><td class="feature-name">' + layer.feature.properties.Name + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through Waypoint Krinjing - Deyangan layer and add only features which are in the map bounds */
  wpkrinjingdeyangan.eachLayer(function (layer) {
    if (map.hasLayer(wpkrinjingdeyanganLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/img/poi.svg"></td><td class="feature-name">' + layer.feature.properties.Name + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through Waypoint Ngargomulyo - Tamanagung layer and add only features which are in the map bounds */
  wpngargomulyotamanagung.eachLayer(function (layer) {
    if (map.hasLayer(wpngargomulyotamanagungLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/img/poi.svg"></td><td class="feature-name">' + layer.feature.properties.Name + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Update list.js featureList */
  featureList = new List("features", {
    valueNames: ["feature-name"]
  });
  featureList.sort("feature-name", {
    order: "asc"
  });
}

/* Basemap Layers */
var basemap0 = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
	   maxZoom: 20,
	   subdomains:['mt0','mt1','mt2','mt3'],
	   attribution: 'Google Streets Tile Layer'
});
var basemap1 = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
   maxZoom: 20,
   subdomains:['mt0','mt1','mt2','mt3'],
   attribution: 'Google Satellite Tile Layer'
}); 
var basemap2 = L.tileLayer('https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
   maxZoom: 20,
   subdomains:['mt0','mt1','mt2','mt3'],
   attribution: 'Google Hybrid Tile Layer'
}); 
var basemap3 = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
   maxZoom: 20,
   subdomains:['mt0','mt1','mt2','mt3'],
   attribution: 'Google Terrain Tile Layer'
}); 

var googletrafficlayer = L.tileLayer('https://{s}.google.com/vt?lyrs=h@159000000,traffic|seconds_into_week:-1&style=3&x={x}&y={y}&z={z}', {
   maxZoom: 20,
   subdomains:['mt0','mt1','mt2','mt3'],
   attribution: 'Google Traffic'
});

/* Overlay Layers */
var highlight = L.geoJson(null);
var highlightStyle = {
  stroke: false,
  fillColor: "#00FFFF",
  fillOpacity: 0.7,
  radius: 10
};

//Extend
var boundsbox = L.geoJson(null, {
  style: function (feature) {
    return {
      color: "black",
      fill: true,
	  weight: 1,
      opacity: 1,
	  fillOpacity: 0,
      clickable: false
    };
  }
});
$.getJSON("assets/homepage/data/sistervillage/jalureva_bounds.geojson", function (data) {
  boundsbox.addData(data);
  //map.addLayer(boundsbox);
});

//KRB Merapi
var krbmerapiColors = {"Kawasan Rawan Bencana I":"#FFFF00", "Kawasan Rawan Bencana II":"#440000", "Kawasan Rawan Bencana III":"#FF0000"};
var krbmerapi = L.geoJson(null, {
  style: function (feature) {
    return {
      fillColor: krbmerapiColors[feature.properties.KRB],
	  fill: true,
	  color: krbmerapiColors[feature.properties.KRB],
	  opacity: 0.2,
	  weight: 0.5,
	  fillOpacity: 0.3,
	  smoothFactor: 0,
	  clickable: true
    };
  },
  onEachFeature: function (feature, layer) {
	layer.on({
      click: function (e) {
        var layer = e.target;
        layer.setStyle({
          weight: 2,
          color: "#00FFFF",
          opacity: 1,
		  fillColor: "#00FFFF",
          fillOpacity: 0.5
        });
		layer.bindPopup(feature.properties.KRB);
        if (!L.Browser.ie && !L.Browser.opera) {
          layer.bringToFront();
        }
      },
      mouseout: function (e) {
        krbmerapi.resetStyle(e.target);
		krbmerapi.closePopup();
      }
    });
  }
});
$.getJSON("assets/homepage/data/sistervillage/MerapiHazardZone.geojson", function (data) {
  krbmerapi.addData(data);
  map.addLayer(krbmerapi);
});

var admindesa = L.geoJson(null, {
  style: function (feature) {
    return {
      color: "black",
      fill: true,
	  weight: 1,
      opacity: 1,
	  fillOpacity: 0.1,
      clickable: true
    };
  },
  onEachFeature: function (feature, layer) {
    desaSearch.push({
      name: layer.feature.properties.DESA,
      source: "admindesa",
      id: L.stamp(layer),
      bounds: layer.getBounds()
    });
	layer.on({
      mouseover: function (e) {
        var layer = e.target;
        layer.setStyle({
          weight: 2,
          color: "#00FFFF",
          opacity: 1
        });
        if (!L.Browser.ie && !L.Browser.opera) {
          layer.bringToFront();
        }
      },
      mouseout: function (e) {
        admindesa.resetStyle(e.target);
      }
    });
	if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>DESA</th><td>" + feature.properties.DESA + "</td></tr>" + "<tr><th>KECAMATAN</th><td>" + feature.properties.KECAMATAN + "</td></tr>" + "<table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.DESA);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");

        }
      });
    }
  }
});
$.getJSON("assets/homepage/data/sistervillage/admin_desa_2013.geojson", function (data) {
  admindesa.addData(data);
});

/* Single marker cluster layer to hold all clusters */
var markerClusters = new L.MarkerClusterGroup({
  spiderfyOnMaxZoom: true,
  showCoverageOnHover: false,
  zoomToBoundsOnClick: true,
  disableClusteringAtZoom: 11
});

/* Empty layer placeholder to add to layer control for listening when to add/remove titikkumpul to markerClusters layer */
var titikkumpulLayer = L.geoJson(null);
var titikkumpul = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/titikkumpul.png",
        iconSize: [24, 24],
        iconAnchor: [12, 12],
        popupAnchor: [0, -24]
      }),
      title: feature.properties.Keterangan,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
        "<tr><th>Dusun</th><td>" + feature.properties.Dusun + "</td></tr>" +
        "<tr><th>Desa</th><td>" + feature.properties.Desa + "</td></tr>" +
        "<tr><th>Kecamatan</th><td>" + feature.properties.Kecamatan + "</td></tr>" +
        "<tr><th>Keterangan</th><td>" + feature.properties.Keterangan + "</td></tr>" +
        /*"<tr><th>Penduduk Laki-laki</th><td>" + feature.properties.Laki_laki + " Jiwa</td></tr>" +
        "<tr><th>Penduduk Perempuan</th><td>" + feature.properties.Perempuan + " Jiwa</td></tr>" +
        "<tr><th>Jumlah Penduduk</th><td>" + feature.properties.Penduduk + " Jiwa</td></tr>" +
        "<tr><th>Jumlah KK</th><td>" + feature.properties.KK + "</td></tr>" +*/
        "</table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html("Titik Kumpul");
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/img/markerpink32.png"></td><td class="feature-name">' + layer.feature.properties.Dusun + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      titikkumpulSearch.push({
        name: layer.feature.properties.Desa,
        address: layer.feature.properties.Kecamatan,
        source: "TitikKumpul",
        id: L.stamp(layer),
        lat: layer.feature.geometry.coordinates[1],
        lng: layer.feature.geometry.coordinates[0]
      });
    }
  }
});
$.getJSON("assets/homepage/data/titikkumpul/sebaran_titik_kumpul_krb3.geojson", function (data) {
  titikkumpul.addData(data);
  map.addLayer(titikkumpulLayer);
});

/* Empty layer placeholder to add to layer control for listening when to add/remove lokasitujuan to markerClusters layer */
var lokasitujuanLayer = L.geoJson(null);
var lokasitujuan = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/img/office32.png",
        iconSize: [24, 24],
        iconAnchor: [12, 24],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.Desa,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Desa</th><td>" + feature.properties.Desa + "</td></tr>" + "<tr><th>Kecamatan</th><td>" + feature.properties.Kecamatan + "</td></tr>" + "</table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html("Desa Tujuan");
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="16" src="assets/homepage/assets/img/office32.png"></td><td class="feature-name">' + layer.feature.properties.Desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      lokasitujuanSearch.push({
        name: layer.feature.properties.Desa,
        address: layer.feature.properties.Kecamatan,
        source: "LokasiTujuan",
        id: L.stamp(layer),
        lat: layer.feature.geometry.coordinates[1],
        lng: layer.feature.geometry.coordinates[0]
      });
    }
  }
});
$.getJSON("assets/homepage/data/sistervillage/lokasi_tujuan.geojson", function (data) {
  lokasitujuan.addData(data);
  map.addLayer(lokasitujuanLayer);
});

/* Empty layer placeholder to add to layer control for listening when to add/remove TEA to markerClusters layer */
var tempatevakuasiakhirLayer = L.geoJson(null);
var tempatevakuasiakhir = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/img/tea32.png",
        iconSize: [26, 24],
        iconAnchor: [13, 24],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.Lokasi_TEA,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
        "<tr><th>Lokasi</th><td>" + feature.properties.Lokasi_TEA + "</td></tr>" +
        "<tr><th>Koordinat</th><td>" + feature.properties.Koord_X + ", " + feature.properties.Koord_Y + "</td></tr>" +
        "<tr><th>Kapasitas</th><td>" + feature.properties.Kapasitas + " Orang</td></tr>" +
        "<tr><th>Foto</th><td><img src='assets/homepage/foto/tea/" + feature.properties.Foto + "' width='200' alt='Tidak ada foto' /></td></tr>" +
        "</table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html("Tempat Evakuasi Akhir (TEA)");
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="16" src="assets/homepage/assets/img/tea32.png"></td><td class="feature-name">' + layer.feature.properties.Lokasi_TEA + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      tempatevakuasiakhirSearch.push({
        name: layer.feature.properties.Lokasi_TEA,
        //address: layer.feature.properties.Kecamatan,
        source: "TEA",
        id: L.stamp(layer),
        lat: layer.feature.geometry.coordinates[1],
        lng: layer.feature.geometry.coordinates[0]
      });
    }
  }
});
$.getJSON("assets/homepage/data/tea/lokasi_tea.geojson", function (data) {
  tempatevakuasiakhir.addData(data);
  map.addLayer(tempatevakuasiakhirLayer);
});

/* Waypoint icon */
var wpicon = L.icon({
	iconUrl: "assets/homepage/assets/img/poi.svg",
	iconSize: [22, 22],
	iconAnchor: [9, 22],
	popupAnchor: [0, -11]
});

/* Empty layer placeholder to add to layer control for listening when to add/remove WP Kaliurang - Ngluwar to markerClusters layer */
var wpkaliurangngluwarLayer = L.geoJson(null);
var wpkaliurangngluwar = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: wpicon,
      title: feature.properties.Name,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = feature.properties.description;
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.Name);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="16" src="assets/homepage/assets/img/poi.svg"></td><td class="feature-name">' + layer.feature.properties.Name + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      wpkaliurangngluwarSearch.push({
        name: layer.feature.properties.Name,
        //address: layer.feature.properties.Kecamatan,
        source: "Wpkaliurangngluwar",
        id: L.stamp(layer),
        lat: layer.feature.geometry.coordinates[1],
        lng: layer.feature.geometry.coordinates[0]
      });
    }
  }
});
$.getJSON("assets/homepage/data/sistervillage/wp_kaliurang_ngluwar/wp_kaliurang_ngluwar.geojson", function (data) {
  wpkaliurangngluwar.addData(data);
  //map.addLayer(wpkaliurangngluwarLayer);
});

/* Empty layer placeholder to add to layer control for listening when to add/remove WP Keningar - Ngrajek to markerClusters layer */
var wpkeningarngrajekLayer = L.geoJson(null);
var wpkeningarngrajek = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: wpicon,
      title: feature.properties.Name,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = feature.properties.description;
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.Name);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="16" src="assets/homepage/assets/img/poi.svg"></td><td class="feature-name">' + layer.feature.properties.Name + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      wpkeningarngrajekSearch.push({
        name: layer.feature.properties.Name,
        //address: layer.feature.properties.Kecamatan,
        source: "Wpkeningarngrajek",
        id: L.stamp(layer),
        lat: layer.feature.geometry.coordinates[1],
        lng: layer.feature.geometry.coordinates[0]
      });
    }
  }
});
$.getJSON("assets/homepage/data/sistervillage/wp_keningar_ngrajek/wp_keningar_ngrajek.geojson", function (data) {
  wpkeningarngrajek.addData(data);
  //map.addLayer(wpkeningarngrajekLayer);
});

/* Empty layer placeholder to add to layer control for listening when to add/remove WP Sewukan - Rambeanak to markerClusters layer */
var wpsewukanrambeanakLayer = L.geoJson(null);
var wpsewukanrambeanak = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: wpicon,
      title: feature.properties.Name,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = feature.properties.description;
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.Name);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="16" src="assets/homepage/assets/img/poi.svg"></td><td class="feature-name">' + layer.feature.properties.Name + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      wpsewukanrambeanakSearch.push({
        name: layer.feature.properties.Name,
        //address: layer.feature.properties.Kecamatan,
        source: "Wpsewukanrambeanak",
        id: L.stamp(layer),
        lat: layer.feature.geometry.coordinates[1],
        lng: layer.feature.geometry.coordinates[0]
      });
    }
  }
});
$.getJSON("assets/homepage/data/sistervillage/wp_sewukan_rambeanak/wp_sewukan_rambeanak.geojson", function (data) {
  wpsewukanrambeanak.addData(data);
  //map.addLayer(wpsewukanrambeanakLayer);
});

/* Empty layer placeholder to add to layer control for listening when to add/remove WP Krinjing - Deyangan to markerClusters layer */
var wpkrinjingdeyanganLayer = L.geoJson(null);
var wpkrinjingdeyangan = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: wpicon,
      title: feature.properties.Name,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = feature.properties.description;
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.Name);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="16" src="assets/homepage/assets/img/poi.svg"></td><td class="feature-name">' + layer.feature.properties.Name + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      wpkrinjingdeyanganSearch.push({
        name: layer.feature.properties.Name,
        //address: layer.feature.properties.Kecamatan,
        source: "Wpkrinjingdeyangan",
        id: L.stamp(layer),
        lat: layer.feature.geometry.coordinates[1],
        lng: layer.feature.geometry.coordinates[0]
      });
    }
  }
});
$.getJSON("assets/homepage/data/sistervillage/wp_krinjing_deyangan/wp_krinjing_deyangan.geojson", function (data) {
  wpkrinjingdeyangan.addData(data);
  //map.addLayer(wpkrinjingdeyanganLayer);
});

/* Empty layer placeholder to add to layer control for listening when to add/remove WP Ngargomulyo - Tamanagung to markerClusters layer */
var wpngargomulyotamanagungLayer = L.geoJson(null);
var wpngargomulyotamanagung = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: wpicon,
      title: feature.properties.Name,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = feature.properties.description;
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.Name);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="16" src="assets/homepage/assets/img/poi.svg"></td><td class="feature-name">' + layer.feature.properties.Name + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      wpngargomulyotamanagungSearch.push({
        name: layer.feature.properties.Name,
        //address: layer.feature.properties.Kecamatan,
        source: "Wpngargomulyotamanagung",
        id: L.stamp(layer),
        lat: layer.feature.geometry.coordinates[1],
        lng: layer.feature.geometry.coordinates[0]
      });
    }
  }
});
$.getJSON("assets/homepage/data/sistervillage/wp_ngargomulyo_tamanagung/wp_ngargomulyo_tamanagung.geojson", function (data) {
  wpngargomulyotamanagung.addData(data);
  //map.addLayer(wpngargomulyotamanagungLayer);
});

/* Empty layer placeholder to add to layer control for listening when to add/remove rambu evakuasi to markerClusters layer */
var rambuevakuasi = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/evacuation.png",
        iconSize: [24, 24],
        iconAnchor: [12, 12],
        popupAnchor: [0, -12]
      }),
      title: "Dusun " + feature.properties.Dusun + ", " + feature.properties.Desa + ", " + feature.properties.Kec,
      riseOnHover: true
    });
  },
/*  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
        "<tr><th>Dusun</th><td>" + feature.properties.Dusun + "</td></tr>" +
        "<tr><th>Desa</th><td>" + feature.properties.Desa + "</td></tr>" +
        "<tr><th>Kecamatan</th><td>" + feature.properties.Kecamatan + "</td></tr>" +
        "<tr><th>Keterangan</th><td>" + feature.properties.Keterangan + "</td></tr>" +
        "</table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html("Titik Kumpul");
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
    }
  }*/
});
$.getJSON("assets/homepage/data/rambu/sebaran_rambu_jalur_evakuasi.geojson", function (data) {
  rambuevakuasi.addData(data);
});

//Polyline jalur evakuasi kaliurang - ngluwar >> Kelompok 1
var options1kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#2eb82e", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1kaliurangngluwar = new L.Polyline.AntPath(track1kaliurangngluwar, options1kaliurangngluwar);
antPath1kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options2kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#2eb82e", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2kaliurangngluwar = new L.Polyline.AntPath(track2kaliurangngluwar, options2kaliurangngluwar);
antPath2kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options3kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#2eb82e", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3kaliurangngluwar = new L.Polyline.AntPath(track3kaliurangngluwar, options3kaliurangngluwar);
antPath3kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options4kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#2eb82e", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4kaliurangngluwar = new L.Polyline.AntPath(track4kaliurangngluwar, options4kaliurangngluwar);
antPath4kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options5kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#2eb82e", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath5kaliurangngluwar = new L.Polyline.AntPath(track5kaliurangngluwar, options5kaliurangngluwar);
antPath5kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options6kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#2eb82e", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath6kaliurangngluwar = new L.Polyline.AntPath(track6kaliurangngluwar, options6kaliurangngluwar);
antPath6kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options7kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#2eb82e", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath7kaliurangngluwar = new L.Polyline.AntPath(track7kaliurangngluwar, options7kaliurangngluwar);
antPath7kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options8kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#2eb82e", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath8kaliurangngluwar = new L.Polyline.AntPath(track8kaliurangngluwar, options8kaliurangngluwar);
antPath8kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var antPathkaliurangngluwar = L.layerGroup([antPath1kaliurangngluwar, antPath2kaliurangngluwar, antPath3kaliurangngluwar, antPath4kaliurangngluwar, antPath5kaliurangngluwar, antPath6kaliurangngluwar, antPath7kaliurangngluwar, antPath8kaliurangngluwar]);

//Polyline jalur evakuasi keningar - ngrajek >> Kelompok 1
var options1keningarngrajek = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ff33bb", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1keningarngrajek = new L.Polyline.AntPath(track1keningarngrajek, options1keningarngrajek);
antPath1keningarngrajek.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Keningar</td></tr><tr><th>Desa tujuan</th><td>Ngrajek</td></tr></table>');
var options2keningarngrajek = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ff33bb", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2keningarngrajek = new L.Polyline.AntPath(track2keningarngrajek, options2keningarngrajek);
antPath2keningarngrajek.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Keningar</td></tr><tr><th>Desa tujuan</th><td>Ngrajek</td></tr></table>');
var options3keningarngrajek = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ff33bb", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3keningarngrajek = new L.Polyline.AntPath(track3keningarngrajek, options3keningarngrajek);
antPath3keningarngrajek.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Keningar</td></tr><tr><th>Desa tujuan</th><td>Ngrajek</td></tr></table>');
var options4keningarngrajek = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ff33bb", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4keningarngrajek = new L.Polyline.AntPath(track4keningarngrajek, options4keningarngrajek);
antPath4keningarngrajek.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Keningar</td></tr><tr><th>Desa tujuan</th><td>Ngrajek</td></tr></table>');
var antPathkeningarngrajek = L.layerGroup([antPath1keningarngrajek, antPath2keningarngrajek, antPath3keningarngrajek, antPath4keningarngrajek]);

//Polyline jalur evakuasi krinjing - deyangan >> Kelompok 1
var options1krinjingdeyangan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc00cc", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1krinjingdeyangan = new L.Polyline.AntPath(track1krinjingdeyangan, options1krinjingdeyangan);
antPath1krinjingdeyangan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Krinjing</td></tr><tr><th>Desa tujuan</th><td>Deyangan</td></tr></table>');
var options2krinjingdeyangan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc00cc", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2krinjingdeyangan = new L.Polyline.AntPath(track2krinjingdeyangan, options2krinjingdeyangan);
antPath2krinjingdeyangan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Krinjing</td></tr><tr><th>Desa tujuan</th><td>Deyangan</td></tr></table>');
var options3krinjingdeyangan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc00cc", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3krinjingdeyangan = new L.Polyline.AntPath(track3krinjingdeyangan, options3krinjingdeyangan);
antPath3krinjingdeyangan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Krinjing</td></tr><tr><th>Desa tujuan</th><td>Deyangan</td></tr></table>');
var antPathkrinjingdeyangan = L.layerGroup([antPath1krinjingdeyangan, antPath2krinjingdeyangan, antPath3krinjingdeyangan]);

//Polyline jalur evakuasi Sewukan - mungkid - Rambeanak >> Kelompok 1
var options1sewukanmungkid = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FFFF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1sewukanmungkid = new L.Polyline.AntPath(track1sewukanmungkid, options1sewukanmungkid);
antPath1sewukanmungkid.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sewukan</td></tr><tr><th>Desa tujuan</th><td>Rambeanak</td></tr></table>');
var options2sewukanmungkid = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FFFF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2sewukanmungkid = new L.Polyline.AntPath(track2sewukanmungkid, options2sewukanmungkid);
antPath2sewukanmungkid.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sewukan</td></tr><tr><th>Desa tujuan</th><td>Rambeanak</td></tr></table>');
var options3sewukanmungkid = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FFFF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3sewukanmungkid = new L.Polyline.AntPath(track3sewukanmungkid, options3sewukanmungkid);
antPath3sewukanmungkid.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sewukan</td></tr><tr><th>Desa tujuan</th><td>Rambeanak</td></tr></table>');
var options4sewukanmungkid = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FFFF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4sewukanmungkid = new L.Polyline.AntPath(track4sewukanmungkid, options4sewukanmungkid);
antPath4sewukanmungkid.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sewukan</td></tr><tr><th>Desa tujuan</th><td>Rambeanak</td></tr></table>');
var antPathsewukanmungkid = L.layerGroup([antPath1sewukanmungkid, antPath2sewukanmungkid, antPath3sewukanmungkid, antPath4sewukanmungkid]);

//Polyline jalur evakuasi Ngargomulyo - Tamanagung >> Kelompok 1
var options1ngargomulyotamanagung = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ffff00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1ngargomulyotamanagung = new L.Polyline.AntPath(track1ngargomulyotamanagung, options1ngargomulyotamanagung);
antPath1ngargomulyotamanagung.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngargomulyo</td></tr><tr><th>Desa tujuan</th><td>Tamanagung</td></tr></table>');
var options2ngargomulyotamanagung = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ffff00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2ngargomulyotamanagung = new L.Polyline.AntPath(track2ngargomulyotamanagung, options2ngargomulyotamanagung);
antPath2ngargomulyotamanagung.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngargomulyo</td></tr><tr><th>Desa tujuan</th><td>Tamanagung</td></tr></table>');
var options3ngargomulyotamanagung = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ffff00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3ngargomulyotamanagung = new L.Polyline.AntPath(track3ngargomulyotamanagung, options3ngargomulyotamanagung);
antPath3ngargomulyotamanagung.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngargomulyo</td></tr><tr><th>Desa tujuan</th><td>Tamanagung</td></tr></table>');
var options4ngargomulyotamanagung = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ffff00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4ngargomulyotamanagung = new L.Polyline.AntPath(track4ngargomulyotamanagung, options4ngargomulyotamanagung);
antPath4ngargomulyotamanagung.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngargomulyo</td></tr><tr><th>Desa tujuan</th><td>Tamanagung</td></tr></table>');
var options5ngargomulyotamanagung = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ffff00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath5ngargomulyotamanagung = new L.Polyline.AntPath(track5ngargomulyotamanagung, options5ngargomulyotamanagung);
antPath5ngargomulyotamanagung.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngargomulyo</td></tr><tr><th>Desa tujuan</th><td>Tamanagung</td></tr></table>');
var antPathngargomulyotamanagung = L.layerGroup([antPath1ngargomulyotamanagung, antPath2ngargomulyotamanagung, antPath3ngargomulyotamanagung, antPath4ngargomulyotamanagung, antPath5ngargomulyotamanagung]);

//Polyline jalur evakuasi kalibening - tanjung - adikarto >> Kelompok 2
var options1kalibeningtanjungadikarto = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1kalibeningtanjungadikarto = new L.Polyline.AntPath(track1kalibeningtanjungadikarto, options1kalibeningtanjungadikarto);
antPath1kalibeningtanjungadikarto.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kalibening</td></tr><tr><th>Desa tujuan</th><td>Adikarto</td></tr></table>');
var options2kalibeningtanjungadikarto = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2kalibeningtanjungadikarto = new L.Polyline.AntPath(track2kalibeningtanjungadikarto, options2kalibeningtanjungadikarto);
antPath2kalibeningtanjungadikarto.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kalibening</td></tr><tr><th>Desa tujuan</th><td>Adikarto</td></tr></table>');
var options3kalibeningtanjungadikarto = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3kalibeningtanjungadikarto = new L.Polyline.AntPath(track3kalibeningtanjungadikarto, options3kalibeningtanjungadikarto);
antPath3kalibeningtanjungadikarto.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kalibening</td></tr><tr><th>Desa tujuan</th><td>Adikarto</td></tr></table>');
var antPathkalibeningtanjungadikarto = L.layerGroup([antPath1kalibeningtanjungadikarto, antPath2kalibeningtanjungadikarto, antPath3kalibeningtanjungadikarto]);

//Polyline jalur evakuasi ngablak - kradenan - tirto - somoketro >> Kelompok 2
var options1ngablakkradenantirtosomoketro = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FFFF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1ngablakkradenantirtosomoketro = new L.Polyline.AntPath(track1ngablakkradenantirtosomoketro, options1ngablakkradenantirtosomoketro);
antPath1ngablakkradenantirtosomoketro.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngablak</td></tr><tr><th>Desa tujuan</th><td>Somoketro</td></tr></table>');
var options2ngablakkradenantirtosomoketro = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FFFF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2ngablakkradenantirtosomoketro = new L.Polyline.AntPath(track2ngablakkradenantirtosomoketro, options2ngablakkradenantirtosomoketro);
antPath2ngablakkradenantirtosomoketro.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngablak</td></tr><tr><th>Desa tujuan</th><td>Somoketro</td></tr></table>');
var options3ngablakkradenantirtosomoketro = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FFFF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3ngablakkradenantirtosomoketro = new L.Polyline.AntPath(track3ngablakkradenantirtosomoketro, options3ngablakkradenantirtosomoketro);
antPath3ngablakkradenantirtosomoketro.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngablak</td></tr><tr><th>Desa tujuan</th><td>Somoketro</td></tr></table>');
var antPathngablakkradenantirtosomoketro = L.layerGroup([antPath1ngablakkradenantirtosomoketro, antPath2ngablakkradenantirtosomoketro, antPath3ngablakkradenantirtosomoketro]);

//Polyline jalur evakuasi paten - bumirejo - mertoyudan - banyurojo >> Kelompok 2
var options1patenbumirejomertoyudanbanyurojo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#2eb82e", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1patenbumirejomertoyudanbanyurojo = new L.Polyline.AntPath(track1patenbumirejomertoyudanbanyurojo, options1patenbumirejomertoyudanbanyurojo);
antPath1patenbumirejomertoyudanbanyurojo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Paten</td></tr><tr><th>Desa tujuan</th><td>Banyurojo</td></tr></table>');
var options2patenbumirejomertoyudanbanyurojo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#2eb82e", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2patenbumirejomertoyudanbanyurojo = new L.Polyline.AntPath(track2patenbumirejomertoyudanbanyurojo, options2patenbumirejomertoyudanbanyurojo);
antPath2patenbumirejomertoyudanbanyurojo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Paten</td></tr><tr><th>Desa tujuan</th><td>Banyurojo</td></tr></table>');
var options3patenbumirejomertoyudanbanyurojo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#2eb82e", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3patenbumirejomertoyudanbanyurojo = new L.Polyline.AntPath(track3patenbumirejomertoyudanbanyurojo, options3patenbumirejomertoyudanbanyurojo);
antPath3patenbumirejomertoyudanbanyurojo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Paten</td></tr><tr><th>Desa tujuan</th><td>Banyurojo</td></tr></table>');
var antPathpatenbumirejomertoyudanbanyurojo = L.layerGroup([antPath1patenbumirejomertoyudanbanyurojo, antPath2patenbumirejomertoyudanbanyurojo, antPath3patenbumirejomertoyudanbanyurojo]);

//Polyline jalur evakuasi mranggen - gunungpring >> Kelompok 3
var options1mranggengunungpring = {delay: 1000, dashArray: [10,20], weight: 3, color: "#666699", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1mranggengunungpring = new L.Polyline.AntPath(track1mranggengunungpring, options1mranggengunungpring);
antPath1mranggengunungpring.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Mranggen</td></tr><tr><th>Desa tujuan</th><td>Gunungpring</td></tr></table>');
var options2mranggengunungpring = {delay: 1000, dashArray: [10,20], weight: 3, color: "#666699", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2mranggengunungpring = new L.Polyline.AntPath(track2mranggengunungpring, options2mranggengunungpring);
antPath2mranggengunungpring.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Mranggen</td></tr><tr><th>Desa tujuan</th><td>Gunungpring</td></tr></table>');
var antPathmranggengunungpring = L.layerGroup([antPath1mranggengunungpring, antPath2mranggengunungpring]);

//Polyline jalur evakuasi kemiren - salam >> Kelompok 3
var options1kemirensalam = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ff0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1kemirensalam = new L.Polyline.AntPath(trackkemirensalam, options1kemirensalam);
antPath1kemirensalam.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kemiren</td></tr><tr><th>Desa tujuan</th><td>Salam</td></tr></table>');
var antPathkemirensalam = L.layerGroup([antPath1kemirensalam]);

//Polyline jalur evakuasi sumber - pucung - ngawen >> Kelompok 3
var options1sumberpucungngawen = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1sumberpucungngawen = new L.Polyline.AntPath(track1sumberpucungngawen, options1sumberpucungngawen);
antPath1sumberpucungngawen.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sumber</td></tr><tr><th>Desa tujuan</th><td>Ngawen</td></tr></table>');
var options2sumberpucungngawen = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2sumberpucungngawen = new L.Polyline.AntPath(track2sumberpucungngawen, options2sumberpucungngawen);
antPath2sumberpucungngawen.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sumber</td></tr><tr><th>Desa tujuan</th><td>Ngawen</td></tr></table>');
var options3sumberpucungngawen = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3sumberpucungngawen = new L.Polyline.AntPath(track3sumberpucungngawen, options3sumberpucungngawen);
antPath3sumberpucungngawen.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sumber</td></tr><tr><th>Desa tujuan</th><td>Ngawen</td></tr></table>');
var options4sumberpucungngawen = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4sumberpucungngawen = new L.Polyline.AntPath(track4sumberpucungngawen, options4sumberpucungngawen);
antPath4sumberpucungngawen.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sumber</td></tr><tr><th>Desa tujuan</th><td>Ngawen</td></tr></table>');
var options5sumberpucungngawen = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath5sumberpucungngawen = new L.Polyline.AntPath(track5sumberpucungngawen, options5sumberpucungngawen);
antPath5sumberpucungngawen.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sumber</td></tr><tr><th>Desa tujuan</th><td>Ngawen</td></tr></table>');
var options6sumberpucungngawen = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath6sumberpucungngawen = new L.Polyline.AntPath(track6sumberpucungngawen, options6sumberpucungngawen);
antPath6sumberpucungngawen.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sumber</td></tr><tr><th>Desa tujuan</th><td>Ngawen</td></tr></table>');
var options7sumberpucungngawen = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath7sumberpucungngawen = new L.Polyline.AntPath(track7sumberpucungngawen, options7sumberpucungngawen);
antPath7sumberpucungngawen.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sumber</td></tr><tr><th>Desa tujuan</th><td>Ngawen</td></tr></table>');
var options8sumberpucungngawen = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath8sumberpucungngawen = new L.Polyline.AntPath(track8sumberpucungngawen, options8sumberpucungngawen);
antPath8sumberpucungngawen.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sumber</td></tr><tr><th>Desa tujuan</th><td>Ngawen</td></tr></table>');
var options9sumberpucungngawen = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath9sumberpucungngawen = new L.Polyline.AntPath(track9sumberpucungngawen, options9sumberpucungngawen);
antPath9sumberpucungngawen.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sumber</td></tr><tr><th>Desa tujuan</th><td>Ngawen</td></tr></table>');
var antPathsumberpucungngawen = L.layerGroup([antPath1sumberpucungngawen, antPath2sumberpucungngawen, antPath3sumberpucungngawen, antPath4sumberpucungngawen, antPath5sumberpucungngawen, antPath6sumberpucungngawen, antPath7sumberpucungngawen, antPath8sumberpucungngawen, antPath9sumberpucungngawen]);

//Polyline jalur evakuasi wonolelo - banyuroto - pogalan >> Kelompok 3
var options1wonolelobanyurotopogalan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1wonolelobanyurotopogalan = new L.Polyline.AntPath(track1wonolelobanyurotopogalan, options1wonolelobanyurotopogalan);
antPath1wonolelobanyurotopogalan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Wonolelo</td></tr><tr><th>Desa tujuan</th><td>Pogalan</td></tr></table>');
var options2wonolelobanyurotopogalan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2wonolelobanyurotopogalan = new L.Polyline.AntPath(track2wonolelobanyurotopogalan, options2wonolelobanyurotopogalan);
antPath2wonolelobanyurotopogalan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Wonolelo</td></tr><tr><th>Desa tujuan</th><td>Pogalan</td></tr></table>');
var options3wonolelobanyurotopogalan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3wonolelobanyurotopogalan = new L.Polyline.AntPath(track3wonolelobanyurotopogalan, options3wonolelobanyurotopogalan);
antPath3wonolelobanyurotopogalan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Wonolelo</td></tr><tr><th>Desa tujuan</th><td>Pogalan</td></tr></table>');
var options4wonolelobanyurotopogalan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4wonolelobanyurotopogalan = new L.Polyline.AntPath(track4wonolelobanyurotopogalan, options4wonolelobanyurotopogalan);
antPath4wonolelobanyurotopogalan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Wonolelo</td></tr><tr><th>Desa tujuan</th><td>Pogalan</td></tr></table>');
var options5wonolelobanyurotopogalan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath5wonolelobanyurotopogalan = new L.Polyline.AntPath(track5wonolelobanyurotopogalan, options5wonolelobanyurotopogalan);
antPath5wonolelobanyurotopogalan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Wonolelo</td></tr><tr><th>Desa tujuan</th><td>Pogalan</td></tr></table>');
var options6wonolelobanyurotopogalan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath6wonolelobanyurotopogalan = new L.Polyline.AntPath(track6wonolelobanyurotopogalan, options6wonolelobanyurotopogalan);
antPath6wonolelobanyurotopogalan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Wonolelo</td></tr><tr><th>Desa tujuan</th><td>Pogalan</td></tr></table>');
var options7wonolelobanyurotopogalan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath7wonolelobanyurotopogalan = new L.Polyline.AntPath(track7wonolelobanyurotopogalan, options7wonolelobanyurotopogalan);
antPath7wonolelobanyurotopogalan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Wonolelo</td></tr><tr><th>Desa tujuan</th><td>Pogalan</td></tr></table>');
var options8wonolelobanyurotopogalan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath8wonolelobanyurotopogalan = new L.Polyline.AntPath(track8wonolelobanyurotopogalan, options8wonolelobanyurotopogalan);
antPath8wonolelobanyurotopogalan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Wonolelo</td></tr><tr><th>Desa tujuan</th><td>Pogalan</td></tr></table>');
var options9wonolelobanyurotopogalan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath9wonolelobanyurotopogalan = new L.Polyline.AntPath(track9wonolelobanyurotopogalan, options9wonolelobanyurotopogalan);
antPath9wonolelobanyurotopogalan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Wonolelo</td></tr><tr><th>Desa tujuan</th><td>Pogalan</td></tr></table>');
var options10wonolelobanyurotopogalan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath10wonolelobanyurotopogalan = new L.Polyline.AntPath(track10wonolelobanyurotopogalan, options10wonolelobanyurotopogalan);
antPath10wonolelobanyurotopogalan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Wonolelo</td></tr><tr><th>Desa tujuan</th><td>Pogalan</td></tr></table>');
var options11wonolelobanyurotopogalan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath11wonolelobanyurotopogalan = new L.Polyline.AntPath(track11wonolelobanyurotopogalan, options11wonolelobanyurotopogalan);
antPath11wonolelobanyurotopogalan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Wonolelo</td></tr><tr><th>Desa tujuan</th><td>Pogalan</td></tr></table>');
var antPathwonolelobanyurotopogalan = L.layerGroup([antPath1wonolelobanyurotopogalan, antPath2wonolelobanyurotopogalan, antPath3wonolelobanyurotopogalan, antPath4wonolelobanyurotopogalan, antPath5wonolelobanyurotopogalan, antPath6wonolelobanyurotopogalan, antPath7wonolelobanyurotopogalan, antPath8wonolelobanyurotopogalan, antPath9wonolelobanyurotopogalan, antPath10wonolelobanyurotopogalan, antPath11wonolelobanyurotopogalan]);

//Polyline jalur evakuasi kapuhan - mangunsari >> Kelompok 3
var options1kapuhanmangunsari = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ffa31a", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1kapuhanmangunsari = new L.Polyline.AntPath(track1kapuhanmangunsari, options1kapuhanmangunsari);
antPath1kapuhanmangunsari.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kapuhan</td></tr><tr><th>Desa tujuan</th><td>Mangunsari</td></tr></table>');
var options2kapuhanmangunsari = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ffa31a", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2kapuhanmangunsari = new L.Polyline.AntPath(track2kapuhanmangunsari, options2kapuhanmangunsari);
antPath2kapuhanmangunsari.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kapuhan</td></tr><tr><th>Desa tujuan</th><td>Mangunsari</td></tr></table>');
var options3kapuhanmangunsari = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ffa31a", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3kapuhanmangunsari = new L.Polyline.AntPath(track3kapuhanmangunsari, options3kapuhanmangunsari);
antPath3kapuhanmangunsari.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kapuhan</td></tr><tr><th>Desa tujuan</th><td>Mangunsari</td></tr></table>');
var options4kapuhanmangunsari = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ffa31a", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4kapuhanmangunsari = new L.Polyline.AntPath(track4kapuhanmangunsari, options4kapuhanmangunsari);
antPath4kapuhanmangunsari.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kapuhan</td></tr><tr><th>Desa tujuan</th><td>Mangunsari</td></tr></table>');
var options5kapuhanmangunsari = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ffa31a", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath5kapuhanmangunsari = new L.Polyline.AntPath(track5kapuhanmangunsari, options5kapuhanmangunsari);
antPath5kapuhanmangunsari.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kapuhan</td></tr><tr><th>Desa tujuan</th><td>Mangunsari</td></tr></table>');
var options6kapuhanmangunsari = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ffa31a", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath6kapuhanmangunsari = new L.Polyline.AntPath(track6kapuhanmangunsari, options6kapuhanmangunsari);
antPath6kapuhanmangunsari.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kapuhan</td></tr><tr><th>Desa tujuan</th><td>Mangunsari</td></tr></table>');
var options7kapuhanmangunsari = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ffa31a", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath7kapuhanmangunsari = new L.Polyline.AntPath(track7kapuhanmangunsari, options7kapuhanmangunsari);
antPath7kapuhanmangunsari.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kapuhan</td></tr><tr><th>Desa tujuan</th><td>Mangunsari</td></tr></table>');
var antPathkapuhanmangunsari = L.layerGroup([antPath1kapuhanmangunsari, antPath2kapuhanmangunsari, antPath3kapuhanmangunsari, antPath4kapuhanmangunsari, antPath5kapuhanmangunsari, antPath6kapuhanmangunsari, antPath7kapuhanmangunsari]);

//Polyline jalur evakuasi nglumut - sucen >> Kelompok 4
var options1nglumutsucen = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1nglumutsucen = new L.Polyline.AntPath(tracknglumutsucen, options1nglumutsucen);
antPath1nglumutsucen.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Nglumut</td></tr><tr><th>Desa tujuan</th><td>Sucen</td></tr></table>');
var antPathnglumutsucen = L.layerGroup([antPath1nglumutsucen]);

//Polyline jalur evakuasi sengi - treko >> Kelompok 4
var options1sengitreko = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ff0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1sengitreko = new L.Polyline.AntPath(track1sengitreko, options1sengitreko);
antPath1sengitreko.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sengi</td></tr><tr><th>Desa tujuan</th><td>Treko</td></tr></table>');
var options2sengitreko = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ff0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2sengitreko = new L.Polyline.AntPath(track2sengitreko, options2sengitreko);
antPath2sengitreko.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sengi</td></tr><tr><th>Desa tujuan</th><td>Treko</td></tr></table>');
var options3sengitreko = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ff0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3sengitreko = new L.Polyline.AntPath(track3sengitreko, options3sengitreko);
antPath3sengitreko.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sengi</td></tr><tr><th>Desa tujuan</th><td>Treko</td></tr></table>');
var options4sengitreko = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ff0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4sengitreko = new L.Polyline.AntPath(track4sengitreko, options4sengitreko);
antPath4sengitreko.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sengi</td></tr><tr><th>Desa tujuan</th><td>Treko</td></tr></table>');
var antPathsengitreko = L.layerGroup([antPath1sengitreko, antPath2sengitreko, antPath3sengitreko, antPath4sengitreko]);

//Polyline jalur evakuasi ngargosoko - gulon >> Kelompok 4
var options1ngargosokogulon = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ff0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1ngargosokogulon = new L.Polyline.AntPath(track1ngargosokogulon, options1ngargosokogulon);
antPath1ngargosokogulon.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngargosoko</td></tr><tr><th>Desa tujuan</th><td>Gulon</td></tr></table>');
var options2ngargosokogulon = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ff0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2ngargosokogulon = new L.Polyline.AntPath(track2ngargosokogulon, options2ngargosokogulon);
antPath2ngargosokogulon.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngargosoko</td></tr><tr><th>Desa tujuan</th><td>Gulon</td></tr></table>');
var options3ngargosokogulon = {delay: 1000, dashArray: [10,20], weight: 3, color: "#ff0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3ngargosokogulon = new L.Polyline.AntPath(track3ngargosokogulon, options3ngargosokogulon);
antPath3ngargosokogulon.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngargosoko</td></tr><tr><th>Desa tujuan</th><td>Gulon</td></tr></table>');
var antPathngargosokogulon = L.layerGroup([antPath1ngargosokogulon, antPath2ngargosokogulon, antPath3ngargosokogulon]);

//Polyline jalur evakuasi srumbung - baturono >> Kelompok 5
var options1srumbungbaturono = {delay: 1000, dashArray: [10,20], weight: 3, color: "#9933ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1srumbungbaturono = new L.Polyline.AntPath(track1srumbungbaturono, options1srumbungbaturono);
antPath1srumbungbaturono.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Srumbung</td></tr><tr><th>Desa tujuan</th><td>Baturono</td></tr></table>');
var options2srumbungbaturono = {delay: 1000, dashArray: [10,20], weight: 3, color: "#9933ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2srumbungbaturono = new L.Polyline.AntPath(track2srumbungbaturono, options2srumbungbaturono);
antPath2srumbungbaturono.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Srumbung</td></tr><tr><th>Desa tujuan</th><td>Baturono</td></tr></table>');
var options3srumbungbaturono = {delay: 1000, dashArray: [10,20], weight: 3, color: "#9933ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3srumbungbaturono = new L.Polyline.AntPath(track3srumbungbaturono, options3srumbungbaturono);
antPath3srumbungbaturono.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Srumbung</td></tr><tr><th>Desa tujuan</th><td>Baturono</td></tr></table>');
var options4srumbungbaturono = {delay: 1000, dashArray: [10,20], weight: 3, color: "#9933ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4srumbungbaturono = new L.Polyline.AntPath(track4srumbungbaturono, options4srumbungbaturono);
antPath4srumbungbaturono.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Srumbung</td></tr><tr><th>Desa tujuan</th><td>Baturono</td></tr></table>');
var options5srumbungbaturono = {delay: 1000, dashArray: [10,20], weight: 3, color: "#9933ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath5srumbungbaturono = new L.Polyline.AntPath(track5srumbungbaturono, options5srumbungbaturono);
antPath5srumbungbaturono.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Srumbung</td></tr><tr><th>Desa tujuan</th><td>Baturono</td></tr></table>');
var options6srumbungbaturono = {delay: 1000, dashArray: [10,20], weight: 3, color: "#9933ff", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath6srumbungbaturono = new L.Polyline.AntPath(track6srumbungbaturono, options6srumbungbaturono);
antPath6srumbungbaturono.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Srumbung</td></tr><tr><th>Desa tujuan</th><td>Baturono</td></tr></table>');
var antPathsrumbungbaturono = L.layerGroup([antPath1srumbungbaturono, antPath2srumbungbaturono, antPath3srumbungbaturono, antPath4srumbungbaturono, antPath5srumbungbaturono, antPath6srumbungbaturono]);

//Polyline jalur evakuasi tegalrandu - pabelan - wanurejo >> Kelompok 5
var options1tegalrandupabelanwanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1tegalrandupabelanwanurejo = new L.Polyline.AntPath(track1tegalrandupabelanwanurejo, options1tegalrandupabelanwanurejo);
antPath1tegalrandupabelanwanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Tegalrandu</td></tr><tr><th>Desa tujuan</th><td>Wanurejo</td></tr></table>');
var options2tegalrandupabelanwanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2tegalrandupabelanwanurejo = new L.Polyline.AntPath(track2tegalrandupabelanwanurejo, options2tegalrandupabelanwanurejo);
antPath2tegalrandupabelanwanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Tegalrandu</td></tr><tr><th>Desa tujuan</th><td>Wanurejo</td></tr></table>');
var options3tegalrandupabelanwanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3tegalrandupabelanwanurejo = new L.Polyline.AntPath(track3tegalrandupabelanwanurejo, options3tegalrandupabelanwanurejo);
antPath3tegalrandupabelanwanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Tegalrandu</td></tr><tr><th>Desa tujuan</th><td>Wanurejo</td></tr></table>');
var options4tegalrandupabelanwanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4tegalrandupabelanwanurejo = new L.Polyline.AntPath(track4tegalrandupabelanwanurejo, options4tegalrandupabelanwanurejo);
antPath4tegalrandupabelanwanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Tegalrandu</td></tr><tr><th>Desa tujuan</th><td>Wanurejo</td></tr></table>');
var options5tegalrandupabelanwanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath5tegalrandupabelanwanurejo = new L.Polyline.AntPath(track5tegalrandupabelanwanurejo, options5tegalrandupabelanwanurejo);
antPath5tegalrandupabelanwanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Tegalrandu</td></tr><tr><th>Desa tujuan</th><td>Wanurejo</td></tr></table>');
var options6tegalrandupabelanwanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath6tegalrandupabelanwanurejo = new L.Polyline.AntPath(track6tegalrandupabelanwanurejo, options6tegalrandupabelanwanurejo);
antPath6tegalrandupabelanwanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Tegalrandu</td></tr><tr><th>Desa tujuan</th><td>Wanurejo</td></tr></table>');
var options7tegalrandupabelanwanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath7tegalrandupabelanwanurejo = new L.Polyline.AntPath(track7tegalrandupabelanwanurejo, options7tegalrandupabelanwanurejo);
antPath7tegalrandupabelanwanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Tegalrandu</td></tr><tr><th>Desa tujuan</th><td>Wanurejo</td></tr></table>');
var options8tegalrandupabelanwanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath8tegalrandupabelanwanurejo = new L.Polyline.AntPath(track8tegalrandupabelanwanurejo, options8tegalrandupabelanwanurejo);
antPath8tegalrandupabelanwanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Tegalrandu</td></tr><tr><th>Desa tujuan</th><td>Wanurejo</td></tr></table>');
var options9tegalrandupabelanwanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath9tegalrandupabelanwanurejo = new L.Polyline.AntPath(track9tegalrandupabelanwanurejo, options9tegalrandupabelanwanurejo);
antPath9tegalrandupabelanwanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Tegalrandu</td></tr><tr><th>Desa tujuan</th><td>Wanurejo</td></tr></table>');
var options10tegalrandupabelanwanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath10tegalrandupabelanwanurejo = new L.Polyline.AntPath(track10tegalrandupabelanwanurejo, options10tegalrandupabelanwanurejo);
antPath10tegalrandupabelanwanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Tegalrandu</td></tr><tr><th>Desa tujuan</th><td>Wanurejo</td></tr></table>');
var antPathtegalrandupabelanwanurejo = L.layerGroup([antPath1tegalrandupabelanwanurejo, antPath2tegalrandupabelanwanurejo, antPath3tegalrandupabelanwanurejo, antPath4tegalrandupabelanwanurejo, antPath5tegalrandupabelanwanurejo, antPath6tegalrandupabelanwanurejo, antPath7tegalrandupabelanwanurejo, antPath8tegalrandupabelanwanurejo, antPath9tegalrandupabelanwanurejo, antPath10tegalrandupabelanwanurejo]);

//Polyline jalur evakuasi ketep - ketundan - podosoko - danurejo >> Kelompok 5
var options1ketepketundanpodosokodanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1ketepketundanpodosokodanurejo = new L.Polyline.AntPath(track1ketepketundanpodosokodanurejo, options1ketepketundanpodosokodanurejo);
antPath1ketepketundanpodosokodanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ketep</td></tr><tr><th>Desa tujuan</th><td>Danurejo</td></tr></table>');
var options2ketepketundanpodosokodanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2ketepketundanpodosokodanurejo = new L.Polyline.AntPath(track2ketepketundanpodosokodanurejo, options2ketepketundanpodosokodanurejo);
antPath2ketepketundanpodosokodanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ketep</td></tr><tr><th>Desa tujuan</th><td>Danurejo</td></tr></table>');
var options3ketepketundanpodosokodanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3ketepketundanpodosokodanurejo = new L.Polyline.AntPath(track3ketepketundanpodosokodanurejo, options3ketepketundanpodosokodanurejo);
antPath3ketepketundanpodosokodanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ketep</td></tr><tr><th>Desa tujuan</th><td>Danurejo</td></tr></table>');
var options4ketepketundanpodosokodanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4ketepketundanpodosokodanurejo = new L.Polyline.AntPath(track4ketepketundanpodosokodanurejo, options4ketepketundanpodosokodanurejo);
antPath4ketepketundanpodosokodanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ketep</td></tr><tr><th>Desa tujuan</th><td>Danurejo</td></tr></table>');
var options5ketepketundanpodosokodanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath5ketepketundanpodosokodanurejo = new L.Polyline.AntPath(track5ketepketundanpodosokodanurejo, options5ketepketundanpodosokodanurejo);
antPath5ketepketundanpodosokodanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ketep</td></tr><tr><th>Desa tujuan</th><td>Danurejo</td></tr></table>');
var options6ketepketundanpodosokodanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath6ketepketundanpodosokodanurejo = new L.Polyline.AntPath(track6ketepketundanpodosokodanurejo, options6ketepketundanpodosokodanurejo);
antPath6ketepketundanpodosokodanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ketep</td></tr><tr><th>Desa tujuan</th><td>Danurejo</td></tr></table>');
var options7ketepketundanpodosokodanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath7ketepketundanpodosokodanurejo = new L.Polyline.AntPath(track7ketepketundanpodosokodanurejo, options7ketepketundanpodosokodanurejo);
antPath7ketepketundanpodosokodanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ketep</td></tr><tr><th>Desa tujuan</th><td>Danurejo</td></tr></table>');
var options8ketepketundanpodosokodanurejo = {delay: 1000, dashArray: [10,20], weight: 3, color: "#cc6600", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath8ketepketundanpodosokodanurejo = new L.Polyline.AntPath(track8ketepketundanpodosokodanurejo, options8ketepketundanpodosokodanurejo);
antPath8ketepketundanpodosokodanurejo.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ketep</td></tr><tr><th>Desa tujuan</th><td>Danurejo</td></tr></table>');
var antPathketepketundanpodosokodanurejo = L.layerGroup([antPath1ketepketundanpodosokodanurejo, antPath2ketepketundanpodosokodanurejo, antPath3ketepketundanpodosokodanurejo, antPath4ketepketundanpodosokodanurejo, antPath5ketepketundanpodosokodanurejo, antPath6ketepketundanpodosokodanurejo, antPath7ketepketundanpodosokodanurejo, antPath8ketepketundanpodosokodanurejo]);

/* Map Center*/
map = L.map("map", {
  zoom: 13,
  center: [-7.6,110.33],
  minZoom: 10,
  maxZoom: 18,
  layers: [basemap3, markerClusters, highlight, antPathkaliurangngluwar, antPathngablakkradenantirtosomoketro,antPathkemirensalam, antPathnglumutsucen, antPathsrumbungbaturono, antPathmranggengunungpring, antPathtegalrandupabelanwanurejo, antPathkalibeningtanjungadikarto, antPathngargomulyotamanagung, antPathsumberpucungngawen, antPathkeningarngrajek, antPathpatenbumirejomertoyudanbanyurojo, antPathkrinjingdeyangan, antPathsewukanmungkid, antPathsengitreko, antPathngargosokogulon, antPathkapuhanmangunsari, antPathketepketundanpodosokodanurejo, antPathwonolelobanyurotopogalan],
  zoomControl: false,
  attributionControl: false
});

/* Layer control listeners that allow for a single markerClusters layer */
map.on("overlayadd", function(e) {
  if (e.layer === titikkumpulLayer) {
    markerClusters.addLayer(titikkumpul);
    syncSidebar();
  }
  if (e.layer === lokasitujuanLayer) {
    markerClusters.addLayer(lokasitujuan);
    syncSidebar();
  }
  if (e.layer === tempatevakuasiakhirLayer) {
    markerClusters.addLayer(tempatevakuasiakhir);
    syncSidebar();
  }
  if (e.layer === wpkaliurangngluwarLayer) {
    markerClusters.addLayer(wpkaliurangngluwar);
    syncSidebar();
  }
  if (e.layer === wpkeningarngrajekLayer) {
    markerClusters.addLayer(wpkeningarngrajek);
    syncSidebar();
  }
  if (e.layer === wpsewukanrambeanakLayer) {
    markerClusters.addLayer(wpsewukanrambeanak);
    syncSidebar();
  }
  if (e.layer === wpkrinjingdeyanganLayer) {
    markerClusters.addLayer(wpkrinjingdeyangan);
    syncSidebar();
  }
  if (e.layer === wpngargomulyotamanagungLayer) {
    markerClusters.addLayer(wpngargomulyotamanagung);
    syncSidebar();
  }
});

map.on("overlayremove", function(e) {
  if (e.layer === titikkumpulLayer) {
    markerClusters.removeLayer(titikkumpul);
    syncSidebar();
  }
  if (e.layer === lokasitujuanLayer) {
    markerClusters.removeLayer(lokasitujuan);
    syncSidebar();
  }
  if (e.layer === tempatevakuasiakhirLayer) {
    markerClusters.removeLayer(tempatevakuasiakhir);
    syncSidebar();
  }
  if (e.layer === wpkaliurangngluwarLayer) {
    markerClusters.removeLayer(wpkaliurangngluwar);
    syncSidebar();
  }
  if (e.layer === wpkeningarngrajekLayer) {
    markerClusters.removeLayer(wpkeningarngrajek);
    syncSidebar();
  }
  if (e.layer === wpsewukanrambeanakLayer) {
    markerClusters.removeLayer(wpsewukanrambeanak);
    syncSidebar();
  }
  if (e.layer === wpkrinjingdeyanganLayer) {
    markerClusters.removeLayer(wpkrinjingdeyangan);
    syncSidebar();
  }
  if (e.layer === wpngargomulyotamanagungLayer) {
    markerClusters.removeLayer(wpngargomulyotamanagung);
    syncSidebar();
  }
});

/* Filter sidebar feature list to only show features in current map bounds */
map.on("moveend", function (e) {
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
attributionControl.onAdd = function (map) {
  var div = L.DomUtil.create("div", "leaflet-control-attribution");
  div.innerHTML = "<a href='#' onclick='$(\"#attributionModal\").modal(\"show\"); return false;'>Basemap</a>";
  return div;
};
map.addControl(attributionControl);

var zoomControl = L.control.zoom({
  position: "bottomright"
}).addTo(map);

/* GPS enabled geolocation control set to follow the user's location */
var locateControl = L.control.locate({
  position: "bottomright",
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
    clickable: false
  },
  icon: "fa fa-location-arrow",
  metric: false,
  strings: {
    title: "My location",
    popup: "You are within {distance} {unit} from this point",
    outsideMapBoundsMsg: "You seem located outside the boundaries of the map"
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

var baseLayers = {
  "Streets": basemap0,
  "Satellite": basemap1,
  "Hybrid": basemap2,
  "Terrain": basemap3,
};

var groupedOverlays = {
  "Titik Kumpul - Tujuan": {
    "Titik Kumpul": titikkumpulLayer,
  	"Desa Tujuan": lokasitujuanLayer,
  	"Tempat Evakuasi Akhir": tempatevakuasiakhirLayer,
  	"POI Kaliurang - Ngluwar": wpkaliurangngluwarLayer,
  	"POI Keningar - Ngrajek": wpkeningarngrajekLayer,
  	"POI Sewukan - Rambeanak": wpsewukanrambeanakLayer,
  	"POI Krinjing - Deyangan": wpkrinjingdeyanganLayer,
  	"POI Ngargomulyo - Tamanagung": wpngargomulyotamanagungLayer,
  },
  "Jalur Evakuasi": {
  	"Kaliurang - Ngluwar": antPathkaliurangngluwar,
  	"Ngablak - Somoketro": antPathngablakkradenantirtosomoketro,
  	"Kemiren - Salam": antPathkemirensalam,
  	"Nglumut - Sucen": antPathnglumutsucen,
  	"Srumbung - Baturono": antPathsrumbungbaturono,
  	"Mranggen - Gunungpring": antPathmranggengunungpring,
  	"Tegalrandu - Wanurejo": antPathtegalrandupabelanwanurejo,
  	"Kalibening - Tanjung": antPathkalibeningtanjungadikarto,
  	"Ngargomulyo - Tamanagung": antPathngargomulyotamanagung,
  	"Sumber - Ngawen": antPathsumberpucungngawen,
  	"Keningar - Ngrajek": antPathkeningarngrajek,
  	"Paten - Banyurojo": antPathpatenbumirejomertoyudanbanyurojo,
  	"Krinjing - Deyangan": antPathkrinjingdeyangan,
  	"Sewukan - Rambeanak": antPathsewukanmungkid,
  	"Sengi - Treko": antPathsengitreko,
  	"Ngargosoko - Gulon": antPathngargosokogulon,
  	"Kapuhan - Mangunsari": antPathkapuhanmangunsari,
  	"Ketep - Danurejo": antPathketepketundanpodosokodanurejo,
  	"Wonolelo - Pogalan": antPathwonolelobanyurotopogalan,
  },
  "Referensi": {
  	"Batas Desa": admindesa,
  	"KRB Merapi": krbmerapi,
    "Rambu jalur evakuasi": rambuevakuasi,
    "Lalu Lintas (Traffic)": googletrafficlayer,
  }
};

var layerControl = L.control.groupedLayers(baseLayers, groupedOverlays, {
  collapsed: isCollapsed
}).addTo(map);

/* Highlight search box text on click */
$("#searchbox").click(function () {
  $(this).select();
});

/* Prevent hitting enter from refreshing the page */
$("#searchbox").keypress(function (e) {
  if (e.which == 13) {
    e.preventDefault();
  }
});

$("#featureModal").on("hidden.bs.modal", function (e) {
  $(document).on("mouseout", ".feature-row", clearHighlight);
});

/* Typeahead search functionality */
$(document).one("ajaxStop", function () {
  $("#loading").hide();
  sizeLayerControl();
  /* Fit map to admindesa bounds */
  map.fitBounds(boundsbox.getBounds());
  //$("#legendModal").modal("show");
  featureList = new List("features", {valueNames: ["feature-name"]});
  featureList.sort("feature-name", {order:"asc"});

  var admindesaBH = new Bloodhound({
    name: "admindesa",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: desaSearch,
    limit: 10
  });

  var titikkumpulBH = new Bloodhound({
    name: "TitikKumpul",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: titikkumpulSearch,
    limit: 10
  });
  
  var lokasitujuanBH = new Bloodhound({
    name: "LokasiTujuan",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: lokasitujuanSearch,
    limit: 10
  });
  
  var tempatevakuasiakhirBH = new Bloodhound({
    name: "TEA",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: tempatevakuasiakhirSearch,
    limit: 10
  });
  
  var wpkaliurangngluwarBH = new Bloodhound({
    name: "Wpkaliurangngluwar",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: wpkaliurangngluwarSearch,
    limit: 10
  });
  
  var wpkeningarngrajekBH = new Bloodhound({
    name: "Wpkeningarngrajek",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: wpkeningarngrajekSearch,
    limit: 10
  });
  
  var wpsewukanrambeanakBH = new Bloodhound({
    name: "Wpsewukanrambeanak",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: wpsewukanrambeanakSearch,
    limit: 10
  });
  
  var wpkrinjingdeyanganBH = new Bloodhound({
    name: "Wpkrinjingdeyangan",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: wpkrinjingdeyanganSearch,
    limit: 10
  });
  
  var wpngargomulyotamanagungBH = new Bloodhound({
    name: "Wpngargomulyotamanagung",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: wpngargomulyotamanagungSearch,
    limit: 10
  });

  admindesaBH.initialize();
  titikkumpulBH.initialize();
  lokasitujuanBH.initialize();
  tempatevakuasiakhirBH.initialize();
  wpkaliurangngluwarBH.initialize();
  wpkeningarngrajekBH.initialize();
  wpsewukanrambeanakBH.initialize();
  wpkrinjingdeyanganBH.initialize();
  wpngargomulyotamanagungBH.initialize();

  /* instantiate the typeahead UI */
  $("#searchbox").typeahead({
    minLength: 3,
    highlight: true,
    hint: false
  }, {
    name: "admindesa",
    displayKey: "name",
    source: admindesaBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'>Desa</h4>"
    }
  }, {
    name: "TitikKumpul",
    displayKey: "name",
    source: titikkumpulBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'><img src='assets/homepage/assets/img/markerpink32.png' width='24' height='24'>&nbsp;Titik Kumpul</h4>",
      suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(""))
    }
  }, {
    name: "LokasiTujuan",
    displayKey: "name",
    source: lokasitujuanBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'><img src='assets/homepage/assets/img/office32.png' width='24' height='24'>&nbsp;Desa Tujuan</h4>",
      suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(""))
    }
  }, {
    name: "TEA",
    displayKey: "name",
    source: tempatevakuasiakhirBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'><img src='assets/homepage/assets/img/tea32.png' width='24' height='24'>&nbsp;TEA</h4>",
      suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(""))
    }
  }, {
    name: "Wpkaliurangngluwar",
    displayKey: "name",
    source: wpkaliurangngluwarBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'><img src='assets/homepage/assets/img/poi.svg' width='24' height='24'>&nbsp;POI</h4>",
      suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(""))
    }
  }, {
    name: "Wpkeningarngrajek",
    displayKey: "name",
    source: wpkeningarngrajekBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'><img src='assets/homepage/assets/img/poi.svg' width='24' height='24'>&nbsp;POI</h4>",
      suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(""))
    }
  }, {
    name: "Wpsewukanrambeanak",
    displayKey: "name",
    source: wpsewukanrambeanakBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'><img src='assets/homepage/assets/img/poi.svg' width='24' height='24'>&nbsp;POI</h4>",
      suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(""))
    }
  }, {
    name: "Wpkrinjingdeyangan",
    displayKey: "name",
    source: wpkrinjingdeyanganBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'><img src='assets/homepage/assets/img/poi.svg' width='24' height='24'>&nbsp;POI</h4>",
      suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(""))
    }
  }, {
    name: "Wpngargomulyotamanagung",
    displayKey: "name",
    source: wpngargomulyotamanagungBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'><img src='assets/homepage/assets/img/poi.svg' width='24' height='24'>&nbsp;POI</h4>",
      suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(""))
    }
  }).on("typeahead:selected", function (obj, datum) {
    if (datum.source === "admindesa") {
      map.fitBounds(datum.bounds);
    }
    if (datum.source === "TitikKumpul") {
      if (!map.hasLayer(titikkumpulLayer)) {
        map.addLayer(titikkumpulLayer);
      }
      map.setView([datum.lat, datum.lng], 17);
      if (map._layers[datum.id]) {
        map._layers[datum.id].fire("click");
      }
    }
	if (datum.source === "LokasiTujuan") {
      if (!map.hasLayer(lokasitujuanLayer)) {
        map.addLayer(lokasitujuanLayer);
      }
      map.setView([datum.lat, datum.lng], 17);
      if (map._layers[datum.id]) {
        map._layers[datum.id].fire("click");
      }
    }
	if (datum.source === "TEA") {
      if (!map.hasLayer(tempatevakuasiakhirLayer)) {
        map.addLayer(tempatevakuasiakhirLayer);
      }
      map.setView([datum.lat, datum.lng], 17);
      if (map._layers[datum.id]) {
        map._layers[datum.id].fire("click");
      }
    }
	if (datum.source === "Wpkaliurangngluwar") {
      if (!map.hasLayer(wpkaliurangngluwarLayer)) {
        map.addLayer(wpkaliurangngluwarLayer);
      }
      map.setView([datum.lat, datum.lng], 17);
      if (map._layers[datum.id]) {
        map._layers[datum.id].fire("click");
      }
    }
	if (datum.source === "Wpkeningarngrajek") {
      if (!map.hasLayer(wpkeningarngrajekLayer)) {
        map.addLayer(wpkeningarngrajekLayer);
      }
      map.setView([datum.lat, datum.lng], 17);
      if (map._layers[datum.id]) {
        map._layers[datum.id].fire("click");
      }
    }
	if (datum.source === "Wpsewukanrambeanak") {
      if (!map.hasLayer(wpsewukanrambeanakLayer)) {
        map.addLayer(wpsewukanrambeanakLayer);
      }
      map.setView([datum.lat, datum.lng], 17);
      if (map._layers[datum.id]) {
        map._layers[datum.id].fire("click");
      }
    }
	if (datum.source === "Wpkrinjingdeyangan") {
      if (!map.hasLayer(wpkrinjingdeyanganLayer)) {
        map.addLayer(wpkrinjingdeyanganLayer);
      }
      map.setView([datum.lat, datum.lng], 17);
      if (map._layers[datum.id]) {
        map._layers[datum.id].fire("click");
      }
    }
	if (datum.source === "Wpngargomulyotamanagung") {
      if (!map.hasLayer(wpngargomulyotamanagungLayer)) {
        map.addLayer(wpngargomulyotamanagungLayer);
      }
      map.setView([datum.lat, datum.lng], 17);
      if (map._layers[datum.id]) {
        map._layers[datum.id].fire("click");
      }
    }
    if ($(".navbar-collapse").height() > 50) {
      $(".navbar-collapse").collapse("hide");
    }
  }).on("typeahead:opened", function () {
    $(".navbar-collapse.in").css("max-height", $(document).height() - $(".navbar-header").height());
    $(".navbar-collapse.in").css("height", $(document).height() - $(".navbar-header").height());
  }).on("typeahead:closed", function () {
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
/* Watermark */
L.Control.Watermark = L.Control.extend({
	onAdd: function(map) {
		var img = L.DomUtil.create('img');
		img.src = 'assets/homepage/assets/img/magelangkab_bpbd.png';
		img.style.width = '70px';
		return img;
	},
	onRemove: function(map) {
	}
});
L.control.watermark = function(opts) {
	return new L.Control.Watermark(opts);
}
L.control.watermark({ position: 'bottomleft' }).addTo(map);