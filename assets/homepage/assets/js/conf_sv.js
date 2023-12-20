var map, featureList, desaSearch = [], titikkumpulSearch = [], lokasitujuanSearch = [];

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
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/img/markerpink32.png"></td><td class="feature-name">' + layer.feature.properties.Desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
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
  
  /* Update list.js featureList */
  featureList = new List("features", {
    valueNames: ["feature-name"]
  });
  featureList.sort("feature-name", {
    order: "asc"
  });
}

/* Basemap Layers */
var basemap0 = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
	   maxZoom: 20,
	   subdomains:['mt0','mt1','mt2','mt3'],
	   attribution: 'Google Streets Tile Layer'
});
var basemap1 = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
   maxZoom: 20,
   subdomains:['mt0','mt1','mt2','mt3'],
   attribution: 'Google Satellite Tile Layer'
}); 
var basemap2 = L.tileLayer('http://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
   maxZoom: 20,
   subdomains:['mt0','mt1','mt2','mt3'],
   attribution: 'Google Hybrid Tile Layer'
}); 
var basemap3 = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
   maxZoom: 20,
   subdomains:['mt0','mt1','mt2','mt3'],
   attribution: 'Google Terrain Tile Layer'
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
      fill: false,
	  weight: 0,
      opacity: 0,
	  fillOpacity: 0,
      clickable: false
    };
  }
});
$.getJSON("data/jalureva_bounds.geojson", function (data) {
  boundsbox.addData(data);
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
      source: "AdminDesa",
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
        iconUrl: "assets/homepage/assets/img/markerpink32.png",
        iconSize: [28, 28],
        iconAnchor: [14, 28],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.Desa,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Desa</th><td>" + feature.properties.Desa + "</td></tr>" + "<tr><th>Kecamatan</th><td>" + feature.properties.Kecamatan + "</td></tr>" + "<tr><th>Penduduk Laki-laki</th><td>" + feature.properties.Laki_laki + " Jiwa</td></tr>" + "<tr><th>Penduduk Perempuan</th><td>" + feature.properties.Perempuan + " Jiwa</td></tr>" + "<tr><th>Jumlah Penduduk</th><td>" + feature.properties.Penduduk + " Jiwa</td></tr>" + "<tr><th>Jumlah KK</th><td>" + feature.properties.KK + "</td></tr>" + "</table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html("Titik Kumpul");
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/img/markerpink32.png"></td><td class="feature-name">' + layer.feature.properties.Desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
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
$.getJSON("assets/homepage/data/sistervillage/titik_kumpul.geojson", function (data) {
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

//Polyline jalur evakuasi kaliurang - ngluwar >> Kelompok 1
var options1kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#FF0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1kaliurangngluwar = new L.Polyline.AntPath(track1kaliurangngluwar, options1kaliurangngluwar);
antPath1kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options2kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#FF0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2kaliurangngluwar = new L.Polyline.AntPath(track2kaliurangngluwar, options2kaliurangngluwar);
antPath2kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options3kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#FF0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3kaliurangngluwar = new L.Polyline.AntPath(track3kaliurangngluwar, options3kaliurangngluwar);
antPath3kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options4kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#FF0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4kaliurangngluwar = new L.Polyline.AntPath(track4kaliurangngluwar, options4kaliurangngluwar);
antPath4kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options5kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#FF0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath5kaliurangngluwar = new L.Polyline.AntPath(track5kaliurangngluwar, options5kaliurangngluwar);
antPath5kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options6kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#FF0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath6kaliurangngluwar = new L.Polyline.AntPath(track6kaliurangngluwar, options6kaliurangngluwar);
antPath6kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options7kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#FF0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath7kaliurangngluwar = new L.Polyline.AntPath(track7kaliurangngluwar, options7kaliurangngluwar);
antPath7kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var options8kaliurangngluwar = {delay: 1000, dashArray: [10,20], weight: 3, color: "#FF0000", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath8kaliurangngluwar = new L.Polyline.AntPath(track8kaliurangngluwar, options8kaliurangngluwar);
antPath8kaliurangngluwar.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Kaliurang</td></tr><tr><th>Desa tujuan</th><td>Ngluwar</td></tr></table>');
var antPathkaliurangngluwar = L.layerGroup([antPath1kaliurangngluwar, antPath2kaliurangngluwar, antPath3kaliurangngluwar, antPath4kaliurangngluwar, antPath5kaliurangngluwar, antPath6kaliurangngluwar, antPath7kaliurangngluwar, antPath8kaliurangngluwar]);

//Polyline jalur evakuasi keningar - ngrajek >> Kelompok 1
var options1keningarngrajek = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FF00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1keningarngrajek = new L.Polyline.AntPath(track1keningarngrajek, options1keningarngrajek);
antPath1keningarngrajek.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Keningar</td></tr><tr><th>Desa tujuan</th><td>Ngrajek</td></tr></table>');
var options2keningarngrajek = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FF00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2keningarngrajek = new L.Polyline.AntPath(track2keningarngrajek, options2keningarngrajek);
antPath2keningarngrajek.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Keningar</td></tr><tr><th>Desa tujuan</th><td>Ngrajek</td></tr></table>');
var options3keningarngrajek = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FF00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3keningarngrajek = new L.Polyline.AntPath(track3keningarngrajek, options3keningarngrajek);
antPath3keningarngrajek.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Keningar</td></tr><tr><th>Desa tujuan</th><td>Ngrajek</td></tr></table>');
var options4keningarngrajek = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FF00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4keningarngrajek = new L.Polyline.AntPath(track4keningarngrajek, options4keningarngrajek);
antPath4keningarngrajek.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Keningar</td></tr><tr><th>Desa tujuan</th><td>Ngrajek</td></tr></table>');
var antPathkeningarngrajek = L.layerGroup([antPath1keningarngrajek, antPath2keningarngrajek, antPath3keningarngrajek, antPath4keningarngrajek]);

//Polyline jalur evakuasi krinjing - deyangan >> Kelompok 1
var options1krinjingdeyangan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000FF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1krinjingdeyangan = new L.Polyline.AntPath(track1krinjingdeyangan, options1krinjingdeyangan);
antPath1krinjingdeyangan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Krinjing</td></tr><tr><th>Desa tujuan</th><td>Deyangan</td></tr></table>');
var options2krinjingdeyangan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000FF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2krinjingdeyangan = new L.Polyline.AntPath(track2krinjingdeyangan, options2krinjingdeyangan);
antPath2krinjingdeyangan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Krinjing</td></tr><tr><th>Desa tujuan</th><td>Deyangan</td></tr></table>');
var options3krinjingdeyangan = {delay: 1000, dashArray: [10,20], weight: 3, color: "#0000FF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3krinjingdeyangan = new L.Polyline.AntPath(track3krinjingdeyangan, options3krinjingdeyangan);
antPath3krinjingdeyangan.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Krinjing</td></tr><tr><th>Desa tujuan</th><td>Deyangan</td></tr></table>');
var antPathkrinjingdeyangan = L.layerGroup([antPath1krinjingdeyangan, antPath2krinjingdeyangan, antPath3krinjingdeyangan]);

//Polyline jalur evakuasi Sewukan - mungkid >> Kelompok 1
var options1sewukanmungkid = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FFFF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1sewukanmungkid = new L.Polyline.AntPath(track1sewukanmungkid, options1sewukanmungkid);
antPath1sewukanmungkid.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sewukan</td></tr><tr><th>Desa tujuan</th><td>Mungkid</td></tr></table>');
var options2sewukanmungkid = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FFFF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2sewukanmungkid = new L.Polyline.AntPath(track2sewukanmungkid, options2sewukanmungkid);
antPath2sewukanmungkid.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sewukan</td></tr><tr><th>Desa tujuan</th><td>Mungkid</td></tr></table>');
var options3sewukanmungkid = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FFFF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3sewukanmungkid = new L.Polyline.AntPath(track3sewukanmungkid, options3sewukanmungkid);
antPath3sewukanmungkid.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sewukan</td></tr><tr><th>Desa tujuan</th><td>Mungkid</td></tr></table>');
var options4sewukanmungkid = {delay: 1000, dashArray: [10,20], weight: 3, color: "#00FFFF", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4sewukanmungkid = new L.Polyline.AntPath(track4sewukanmungkid, options4sewukanmungkid);
antPath4sewukanmungkid.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Sewukan</td></tr><tr><th>Desa tujuan</th><td>Mungkid</td></tr></table>');
var antPathsewukanmungkid = L.layerGroup([antPath1sewukanmungkid, antPath2sewukanmungkid, antPath3sewukanmungkid, antPath4sewukanmungkid]);

//Polyline jalur evakuasi Ngargomulyo - Tamanagung >> Kelompok 1
var options1ngargomulyotamanagung = {delay: 1000, dashArray: [10,20], weight: 3, color: "#FFFF00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath1ngargomulyotamanagung = new L.Polyline.AntPath(track1ngargomulyotamanagung, options1ngargomulyotamanagung);
antPath1ngargomulyotamanagung.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngargomulyo</td></tr><tr><th>Desa tujuan</th><td>Tamanagung</td></tr></table>');
var options2ngargomulyotamanagung = {delay: 1000, dashArray: [10,20], weight: 3, color: "#FFFF00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath2ngargomulyotamanagung = new L.Polyline.AntPath(track2ngargomulyotamanagung, options2ngargomulyotamanagung);
antPath2ngargomulyotamanagung.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngargomulyo</td></tr><tr><th>Desa tujuan</th><td>Tamanagung</td></tr></table>');
var options3ngargomulyotamanagung = {delay: 1000, dashArray: [10,20], weight: 3, color: "#FFFF00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath3ngargomulyotamanagung = new L.Polyline.AntPath(track3ngargomulyotamanagung, options3ngargomulyotamanagung);
antPath3ngargomulyotamanagung.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngargomulyo</td></tr><tr><th>Desa tujuan</th><td>Tamanagung</td></tr></table>');
var options4ngargomulyotamanagung = {delay: 1000, dashArray: [10,20], weight: 3, color: "#FFFF00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath4ngargomulyotamanagung = new L.Polyline.AntPath(track4ngargomulyotamanagung, options4ngargomulyotamanagung);
antPath4ngargomulyotamanagung.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngargomulyo</td></tr><tr><th>Desa tujuan</th><td>Tamanagung</td></tr></table>');
var options5ngargomulyotamanagung = {delay: 1000, dashArray: [10,20], weight: 3, color: "#FFFF00", pulseColor: "#FFFFFF", opacity: 0.8};
let antPath5ngargomulyotamanagung = new L.Polyline.AntPath(track5ngargomulyotamanagung, options5ngargomulyotamanagung);
antPath5ngargomulyotamanagung.bindPopup('<table class="table table-striped table-bordered table-condensed"><tr><th>Desa asal</th><td>Ngargomulyo</td></tr><tr><th>Desa tujuan</th><td>Tamanagung</td></tr></table>');
var antPathngargomulyotamanagung = L.layerGroup([antPath1ngargomulyotamanagung, antPath2ngargomulyotamanagung, antPath3ngargomulyotamanagung, antPath4ngargomulyotamanagung, antPath5ngargomulyotamanagung]);

/* Map Center*/
map = L.map("map", {
  zoom: 13,
  center: [-7.6,110.33],
  minZoom: 11,
  layers: [basemap3, markerClusters, highlight, antPathkaliurangngluwar, antPathkeningarngrajek, antPathkrinjingdeyangan, antPathsewukanmungkid, antPathngargomulyotamanagung],
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
  "Terrain": basemap3
};

var groupedOverlays = {
  "Titik Kumpul - Tujuan": {
    "<img src='assets/homepage/assets/img/markerpink32.png' width='24' height='24'>&nbsp;Titik Kumpul": titikkumpulLayer,
	"<img src='assets/homepage/assets/img/office32.png' width='24' height='24'>&nbsp;Desa Tujuan": lokasitujuanLayer
  },
  "Jalur Evakuasi": {
	"Kaliurang - Ngluwar": antPathkaliurangngluwar,
	"Keningar - Ngrajek": antPathkeningarngrajek,
	"Krinjing - Deyangan": antPathkrinjingdeyangan,
	"Sewukan - Mungkid": antPathsewukanmungkid,
	"Ngargomulyo - Tamanagung": antPathngargomulyotamanagung,
  },
  "Referensi": {
	"Batas Desa": admindesa,
	"KRB Merapi": krbmerapi
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
    name: "AdminDesa",
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

  admindesaBH.initialize();
  titikkumpulBH.initialize();
  lokasitujuanBH.initialize();

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
  }).on("typeahead:selected", function (obj, datum) {
    if (datum.source === "AdminDesa") {
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
		img.src = 'assets/homepage/assets/img/sinaugis.png';
		img.style.width = '50px';
		return img;
	},
	onRemove: function(map) {
	}
});
L.control.watermark = function(opts) {
	return new L.Control.Watermark(opts);
}
L.control.watermark({ position: 'bottomleft' }).addTo(map);