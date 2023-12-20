/* Variabel Layer */
var map, featureList;

/* Ukuran layer kontrol */
$(window).resize(function() {
  sizeLayerControl();
});

/* Highlight */
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

/* Function Sidebar */
function syncSidebar() {
  /* Empty sidebar features */
  $("#feature-list tbody").empty();
  /* Loop through longsor layer and add only features which are in the map bounds */
  longsor.eachLayer(function (layer) {
    if (map.hasLayer(longsorLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="assets/homepage/assets/icon/naturaldisaster32/longsor.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through banjir layer and add only features which are in the map bounds */
  banjir.eachLayer(function (layer) {
    if (map.hasLayer(banjirLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="assets/homepage/assets/icon/naturaldisaster32/banjir.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through banjir lahar layer and add only features which are in the map bounds */
  banjirlahar.eachLayer(function (layer) {
    if (map.hasLayer(banjirlaharLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="assets/homepage/assets/icon/naturaldisaster32/banjirlahar.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through cuaca ekstrim layer and add only features which are in the map bounds */
  cuacaekstrim.eachLayer(function (layer) {
    if (map.hasLayer(cuacaekstrimLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="assets/homepage/assets/icon/naturaldisaster32/cuacaekstrim.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through gempabumi layer and add only features which are in the map bounds */
  gempabumi.eachLayer(function (layer) {
    if (map.hasLayer(gempabumiLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="assets/homepage/assets/icon/naturaldisaster32/gempabumi.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through kebakarangedungpermukiman layer and add only features which are in the map bounds */
  kebakarangedungpermukiman.eachLayer(function (layer) {
    if (map.hasLayer(kebakarangedungpermukimanLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="assets/homepage/assets/icon/naturaldisaster32/kebakarangedungpermukiman.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through kebakaranlahan layer and add only features which are in the map bounds */
  kebakaranlahan.eachLayer(function (layer) {
    if (map.hasLayer(kebakaranlahanLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="assets/homepage/assets/icon/naturaldisaster32/kebakaranlahan.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through kekeringan layer and add only features which are in the map bounds */
  kekeringan.eachLayer(function (layer) {
    if (map.hasLayer(kekeringanLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="assets/homepage/assets/icon/naturaldisaster32/kekeringan.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  /* Loop through Letusan Gunungapi layer and add only features which are in the map bounds */
  letusangunungapi.eachLayer(function (layer) {
    if (map.hasLayer(letusangunungapiLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="assets/homepage/assets/icon/naturaldisaster32/letusangunungapi.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      }
    }
  });
  
  /* Loop through bencana lain layer and add only features which are in the map bounds */
  bencanalain.eachLayer(function (layer) {
    if (map.hasLayer(bencanalainLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
        $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="24" height="24" src="assets/homepage/assets/icon/naturaldisaster32/bencanalain.png"></td><td class="feature-name">' + layer.feature.properties.tgl + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
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
   subdomains:['mt0','mt1','mt2','mt3'],
   attribution: 'Google Streets'
});
var basemap2 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 19,
	attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});
var basemap3 = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
   maxZoom: 20,
   subdomains:['mt0','mt1','mt2','mt3'],
   attribution: 'Google Satellite'
});
var basemap4 = L.tileLayer('https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
   maxZoom: 20,
   subdomains:['mt0','mt1','mt2','mt3'],
   attribution: 'Google Hybrid'
}); 
var basemap5 = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
   maxZoom: 20,
   subdomains:['mt0','mt1','mt2','mt3'],
   attribution: 'Google Terrain'
}); 
/* var basemap6 = L.tileLayer('https://{s}.google.com/vt/lyrs=m@221097413,traffic&x={x}&y={y}&z={z}', {
   maxZoom: 20,
   subdomains:['mt0','mt1','mt2','mt3'],
   attribution: 'Google Traffic'
}); */

var googletrafficlayer = L.tileLayer('https://{s}.google.com/vt?lyrs=h@159000000,traffic|seconds_into_week:-1&style=3&x={x}&y={y}&z={z}', {
   maxZoom: 20,
   subdomains:['mt0','mt1','mt2','mt3'],
   attribution: 'Google Traffic'
});

var bounds_group = new L.featureGroup([]);
/* Peta Bahaya */
var img_MAGELANG_BAHAYA_BANJIR = 'assets/homepage/data/krb/MAGELANG_BAHAYA_BANJIR.png';
var img_bounds_MAGELANG_BAHAYA_BANJIR = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_BAHAYA_BANJIR = new L.imageOverlay(img_MAGELANG_BAHAYA_BANJIR, img_bounds_MAGELANG_BAHAYA_BANJIR);
overlay_MAGELANG_BAHAYA_BANJIR.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_BAHAYA_BANJIR);
//map.addLayer(overlay_MAGELANG_BAHAYA_BANJIR);
var img_MAGELANG_BAHAYA_BANJIR_BANDANG = 'assets/homepage/data/krb/MAGELANG_BAHAYA_BANJIR_BANDANG.png';
var img_bounds_MAGELANG_BAHAYA_BANJIR_BANDANG = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_BAHAYA_BANJIR_BANDANG = new L.imageOverlay(img_MAGELANG_BAHAYA_BANJIR_BANDANG, img_bounds_MAGELANG_BAHAYA_BANJIR_BANDANG);
overlay_MAGELANG_BAHAYA_BANJIR_BANDANG.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_BAHAYA_BANJIR_BANDANG);
//map.addLayer(overlay_MAGELANG_BAHAYA_BANJIR_BANDANG);
var img_MAGELANG_BAHAYA_CUEKS = 'assets/homepage/data/krb/MAGELANG_BAHAYA_CUEKS.png';
var img_bounds_MAGELANG_BAHAYA_CUEKS = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_BAHAYA_CUEKS = new L.imageOverlay(img_MAGELANG_BAHAYA_CUEKS, img_bounds_MAGELANG_BAHAYA_CUEKS);
overlay_MAGELANG_BAHAYA_CUEKS.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_BAHAYA_CUEKS);
//map.addLayer(overlay_MAGELANG_BAHAYA_CUEKS);
var img_MAGELANG_BAHAYA_GEMPA = 'assets/homepage/data/krb/MAGELANG_BAHAYA_GEMPA.png';
var img_bounds_MAGELANG_BAHAYA_GEMPA = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_BAHAYA_GEMPA = new L.imageOverlay(img_MAGELANG_BAHAYA_GEMPA, img_bounds_MAGELANG_BAHAYA_GEMPA);
overlay_MAGELANG_BAHAYA_GEMPA.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_BAHAYA_GEMPA);
//map.addLayer(overlay_MAGELANG_BAHAYA_GEMPA);
var img_MAGELANG_BAHAYA_KEKERINGAN = 'assets/homepage/data/krb/MAGELANG_BAHAYA_KEKERINGAN.png';
var img_bounds_MAGELANG_BAHAYA_KEKERINGAN = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_BAHAYA_KEKERINGAN = new L.imageOverlay(img_MAGELANG_BAHAYA_KEKERINGAN, img_bounds_MAGELANG_BAHAYA_KEKERINGAN);
overlay_MAGELANG_BAHAYA_KEKERINGAN.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_BAHAYA_KEKERINGAN);
//map.addLayer(overlay_MAGELANG_BAHAYA_KEKERINGAN);
var img_MAGELANG_BAHAYA_KHL = 'assets/homepage/data/krb/MAGELANG_BAHAYA_KHL.png';
var img_bounds_MAGELANG_BAHAYA_KHL = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_BAHAYA_KHL = new L.imageOverlay(img_MAGELANG_BAHAYA_KHL, img_bounds_MAGELANG_BAHAYA_KHL);
overlay_MAGELANG_BAHAYA_KHL.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_BAHAYA_KHL);
//map.addLayer(overlay_MAGELANG_BAHAYA_KHL);
var img_MAGELANG_BAHAYA_LGA = 'assets/homepage/data/krb/MAGELANG_BAHAYA_LGA.png';
var img_bounds_MAGELANG_BAHAYA_LGA = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_BAHAYA_LGA = new L.imageOverlay(img_MAGELANG_BAHAYA_LGA, img_bounds_MAGELANG_BAHAYA_LGA);
overlay_MAGELANG_BAHAYA_LGA.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_BAHAYA_LGA);
//map.addLayer(overlay_MAGELANG_BAHAYA_LGA);
var img_MAGELANG_BAHAYA_LONGSOR = 'assets/homepage/data/krb/MAGELANG_BAHAYA_LONGSOR.png';
var img_bounds_MAGELANG_BAHAYA_LONGSOR = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_BAHAYA_LONGSOR = new L.imageOverlay(img_MAGELANG_BAHAYA_LONGSOR, img_bounds_MAGELANG_BAHAYA_LONGSOR);
overlay_MAGELANG_BAHAYA_LONGSOR.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_BAHAYA_LONGSOR);
//map.addLayer(overlay_MAGELANG_BAHAYA_LONGSOR);

/* Peta Risiko */
var img_MAGELANG_RISIKO_BANJIR = 'assets/homepage/data/krb/MAGELANG_RISIKO_BANJIR.png';
var img_bounds_MAGELANG_RISIKO_BANJIR = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_RISIKO_BANJIR = new L.imageOverlay(img_MAGELANG_RISIKO_BANJIR, img_bounds_MAGELANG_RISIKO_BANJIR);
overlay_MAGELANG_RISIKO_BANJIR.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_RISIKO_BANJIR);
//map.addLayer(overlay_MAGELANG_RISIKO_BANJIR);
var img_MAGELANG_RISIKO_BANJIR_BANDANG = 'assets/homepage/data/krb/MAGELANG_RISIKO_BANJIR_BANDANG.png';
var img_bounds_MAGELANG_RISIKO_BANJIR_BANDANG = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_RISIKO_BANJIR_BANDANG = new L.imageOverlay(img_MAGELANG_RISIKO_BANJIR_BANDANG, img_bounds_MAGELANG_RISIKO_BANJIR_BANDANG);
overlay_MAGELANG_RISIKO_BANJIR_BANDANG.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_RISIKO_BANJIR_BANDANG);
//map.addLayer(overlay_MAGELANG_RISIKO_BANJIR_BANDANG);
var img_MAGELANG_RISIKO_CUEKS = 'assets/homepage/data/krb/MAGELANG_RISIKO_CUEKS.png';
var img_bounds_MAGELANG_RISIKO_CUEKS = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_RISIKO_CUEKS = new L.imageOverlay(img_MAGELANG_RISIKO_CUEKS, img_bounds_MAGELANG_RISIKO_CUEKS);
overlay_MAGELANG_RISIKO_CUEKS.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_RISIKO_CUEKS);
//map.addLayer(overlay_MAGELANG_RISIKO_CUEKS);
var img_MAGELANG_RISIKO_GEMPA = 'assets/homepage/data/krb/MAGELANG_RISIKO_GEMPA.png';
var img_bounds_MAGELANG_RISIKO_GEMPA = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_RISIKO_GEMPA = new L.imageOverlay(img_MAGELANG_RISIKO_GEMPA, img_bounds_MAGELANG_RISIKO_GEMPA);
overlay_MAGELANG_RISIKO_GEMPA.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_RISIKO_GEMPA);
//map.addLayer(overlay_MAGELANG_RISIKO_GEMPA);
var img_MAGELANG_RISIKO_KEKERINGAN = 'assets/homepage/data/krb/MAGELANG_RISIKO_KERING.png';
var img_bounds_MAGELANG_RISIKO_KEKERINGAN = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_RISIKO_KEKERINGAN = new L.imageOverlay(img_MAGELANG_RISIKO_KEKERINGAN, img_bounds_MAGELANG_RISIKO_KEKERINGAN);
overlay_MAGELANG_RISIKO_KEKERINGAN.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_RISIKO_KEKERINGAN);
//map.addLayer(overlay_MAGELANG_RISIKO_KEKERINGAN);
var img_MAGELANG_RISIKO_KHL = 'assets/homepage/data/krb/MAGELANG_RISIKO_KHL.png';
var img_bounds_MAGELANG_RISIKO_KHL = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_RISIKO_KHL = new L.imageOverlay(img_MAGELANG_RISIKO_KHL, img_bounds_MAGELANG_RISIKO_KHL);
overlay_MAGELANG_RISIKO_KHL.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_RISIKO_KHL);
//map.addLayer(overlay_MAGELANG_RISIKO_KHL);
var img_MAGELANG_RISIKO_LGA = 'assets/homepage/data/krb/MAGELANG_RISIKO_LGA.png';
var img_bounds_MAGELANG_RISIKO_LGA = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_RISIKO_LGA = new L.imageOverlay(img_MAGELANG_RISIKO_LGA, img_bounds_MAGELANG_RISIKO_LGA);
overlay_MAGELANG_RISIKO_LGA.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_RISIKO_LGA);
//map.addLayer(overlay_MAGELANG_RISIKO_LGA);
var img_MAGELANG_RISIKO_LONGSOR = 'assets/homepage/data/krb/MAGELANG_RISIKO_LONGSOR.png';
var img_bounds_MAGELANG_RISIKO_LONGSOR = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_RISIKO_LONGSOR = new L.imageOverlay(img_MAGELANG_RISIKO_LONGSOR, img_bounds_MAGELANG_RISIKO_LONGSOR);
overlay_MAGELANG_RISIKO_LONGSOR.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_RISIKO_LONGSOR);
//map.addLayer(overlay_MAGELANG_RISIKO_LONGSOR);

/* Peta KERENTANAN */
var img_MAGELANG_KERENTANAN_BANJIR = 'assets/homepage/data/krb/MAGELANG_KERENTANAN_BANJIR.png';
var img_bounds_MAGELANG_KERENTANAN_BANJIR = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KERENTANAN_BANJIR = new L.imageOverlay(img_MAGELANG_KERENTANAN_BANJIR, img_bounds_MAGELANG_KERENTANAN_BANJIR);
overlay_MAGELANG_KERENTANAN_BANJIR.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KERENTANAN_BANJIR);
//map.addLayer(overlay_MAGELANG_KERENTANAN_BANJIR);
var img_MAGELANG_KERENTANAN_BANJIR_BANDANG = 'assets/homepage/data/krb/MAGELANG_KERENTANAN_BANJIR_BANDANG.png';
var img_bounds_MAGELANG_KERENTANAN_BANJIR_BANDANG = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KERENTANAN_BANJIR_BANDANG = new L.imageOverlay(img_MAGELANG_KERENTANAN_BANJIR_BANDANG, img_bounds_MAGELANG_KERENTANAN_BANJIR_BANDANG);
overlay_MAGELANG_KERENTANAN_BANJIR_BANDANG.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KERENTANAN_BANJIR_BANDANG);
//map.addLayer(overlay_MAGELANG_KERENTANAN_BANJIR_BANDANG);
var img_MAGELANG_KERENTANAN_CUEKS = 'assets/homepage/data/krb/MAGELANG_KERENTANAN_CUEKS.png';
var img_bounds_MAGELANG_KERENTANAN_CUEKS = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KERENTANAN_CUEKS = new L.imageOverlay(img_MAGELANG_KERENTANAN_CUEKS, img_bounds_MAGELANG_KERENTANAN_CUEKS);
overlay_MAGELANG_KERENTANAN_CUEKS.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KERENTANAN_CUEKS);
//map.addLayer(overlay_MAGELANG_KERENTANAN_CUEKS);
var img_MAGELANG_KERENTANAN_GEMPA = 'assets/homepage/data/krb/MAGELANG_KERENTANAN_GEMPA.png';
var img_bounds_MAGELANG_KERENTANAN_GEMPA = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KERENTANAN_GEMPA = new L.imageOverlay(img_MAGELANG_KERENTANAN_GEMPA, img_bounds_MAGELANG_KERENTANAN_GEMPA);
overlay_MAGELANG_KERENTANAN_GEMPA.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KERENTANAN_GEMPA);
//map.addLayer(overlay_MAGELANG_KERENTANAN_GEMPA);
var img_MAGELANG_KERENTANAN_KEKERINGAN = 'assets/homepage/data/krb/MAGELANG_KERENTANAN_KEKERINGAN.png';
var img_bounds_MAGELANG_KERENTANAN_KEKERINGAN = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KERENTANAN_KEKERINGAN = new L.imageOverlay(img_MAGELANG_KERENTANAN_KEKERINGAN, img_bounds_MAGELANG_KERENTANAN_KEKERINGAN);
overlay_MAGELANG_KERENTANAN_KEKERINGAN.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KERENTANAN_KEKERINGAN);
//map.addLayer(overlay_MAGELANG_KERENTANAN_KEKERINGAN);
var img_MAGELANG_KERENTANAN_KHL = 'assets/homepage/data/krb/MAGELANG_KERENTANAN_KHL.png';
var img_bounds_MAGELANG_KERENTANAN_KHL = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KERENTANAN_KHL = new L.imageOverlay(img_MAGELANG_KERENTANAN_KHL, img_bounds_MAGELANG_KERENTANAN_KHL);
overlay_MAGELANG_KERENTANAN_KHL.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KERENTANAN_KHL);
//map.addLayer(overlay_MAGELANG_KERENTANAN_KHL);
var img_MAGELANG_KERENTANAN_LGA = 'assets/homepage/data/krb/MAGELANG_KERENTANAN_LGA.png';
var img_bounds_MAGELANG_KERENTANAN_LGA = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KERENTANAN_LGA = new L.imageOverlay(img_MAGELANG_KERENTANAN_LGA, img_bounds_MAGELANG_KERENTANAN_LGA);
overlay_MAGELANG_KERENTANAN_LGA.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KERENTANAN_LGA);
//map.addLayer(overlay_MAGELANG_KERENTANAN_LGA);
var img_MAGELANG_KERENTANAN_LONGSOR = 'assets/homepage/data/krb/MAGELANG_KERENTANAN_LONGSOR.png';
var img_bounds_MAGELANG_KERENTANAN_LONGSOR = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KERENTANAN_LONGSOR = new L.imageOverlay(img_MAGELANG_KERENTANAN_LONGSOR, img_bounds_MAGELANG_KERENTANAN_LONGSOR);
overlay_MAGELANG_KERENTANAN_LONGSOR.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KERENTANAN_LONGSOR);
//map.addLayer(overlay_MAGELANG_KERENTANAN_LONGSOR);

/* Peta KAPASITAS */
var img_MAGELANG_KAPASITAS_BANJIR = 'assets/homepage/data/krb/MAGELANG_KAPASITAS_BANJIR.png';
var img_bounds_MAGELANG_KAPASITAS_BANJIR = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KAPASITAS_BANJIR = new L.imageOverlay(img_MAGELANG_KAPASITAS_BANJIR, img_bounds_MAGELANG_KAPASITAS_BANJIR);
overlay_MAGELANG_KAPASITAS_BANJIR.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KAPASITAS_BANJIR);
//map.addLayer(overlay_MAGELANG_KAPASITAS_BANJIR);
var img_MAGELANG_KAPASITAS_BANJIR_BANDANG = 'assets/homepage/data/krb/MAGELANG_KAPASITAS_BANJIR_BANDANG.png';
var img_bounds_MAGELANG_KAPASITAS_BANJIR_BANDANG = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KAPASITAS_BANJIR_BANDANG = new L.imageOverlay(img_MAGELANG_KAPASITAS_BANJIR_BANDANG, img_bounds_MAGELANG_KAPASITAS_BANJIR_BANDANG);
overlay_MAGELANG_KAPASITAS_BANJIR_BANDANG.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KAPASITAS_BANJIR_BANDANG);
//map.addLayer(overlay_MAGELANG_KAPASITAS_BANJIR_BANDANG);
var img_MAGELANG_KAPASITAS_CUEKS = 'assets/homepage/data/krb/MAGELANG_KAPASITAS_CUEKS.png';
var img_bounds_MAGELANG_KAPASITAS_CUEKS = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KAPASITAS_CUEKS = new L.imageOverlay(img_MAGELANG_KAPASITAS_CUEKS, img_bounds_MAGELANG_KAPASITAS_CUEKS);
overlay_MAGELANG_KAPASITAS_CUEKS.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KAPASITAS_CUEKS);
//map.addLayer(overlay_MAGELANG_KAPASITAS_CUEKS);
var img_MAGELANG_KAPASITAS_GEMPA = 'assets/homepage/data/krb/MAGELANG_KAPASITAS_GEMPA.png';
var img_bounds_MAGELANG_KAPASITAS_GEMPA = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KAPASITAS_GEMPA = new L.imageOverlay(img_MAGELANG_KAPASITAS_GEMPA, img_bounds_MAGELANG_KAPASITAS_GEMPA);
overlay_MAGELANG_KAPASITAS_GEMPA.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KAPASITAS_GEMPA);
//map.addLayer(overlay_MAGELANG_KAPASITAS_GEMPA);
var img_MAGELANG_KAPASITAS_KEKERINGAN = 'assets/homepage/data/krb/MAGELANG_KAPASITAS_KEKERINGAN.png';
var img_bounds_MAGELANG_KAPASITAS_KEKERINGAN = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KAPASITAS_KEKERINGAN = new L.imageOverlay(img_MAGELANG_KAPASITAS_KEKERINGAN, img_bounds_MAGELANG_KAPASITAS_KEKERINGAN);
overlay_MAGELANG_KAPASITAS_KEKERINGAN.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KAPASITAS_KEKERINGAN);
//map.addLayer(overlay_MAGELANG_KAPASITAS_KEKERINGAN);
var img_MAGELANG_KAPASITAS_KHL = 'assets/homepage/data/krb/MAGELANG_KAPASITAS_KHL.png';
var img_bounds_MAGELANG_KAPASITAS_KHL = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KAPASITAS_KHL = new L.imageOverlay(img_MAGELANG_KAPASITAS_KHL, img_bounds_MAGELANG_KAPASITAS_KHL);
overlay_MAGELANG_KAPASITAS_KHL.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KAPASITAS_KHL);
//map.addLayer(overlay_MAGELANG_KAPASITAS_KHL);
var img_MAGELANG_KAPASITAS_LGA = 'assets/homepage/data/krb/MAGELANG_KAPASITAS_LGA.png';
var img_bounds_MAGELANG_KAPASITAS_LGA = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KAPASITAS_LGA = new L.imageOverlay(img_MAGELANG_KAPASITAS_LGA, img_bounds_MAGELANG_KAPASITAS_LGA);
overlay_MAGELANG_KAPASITAS_LGA.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KAPASITAS_LGA);
//map.addLayer(overlay_MAGELANG_KAPASITAS_LGA);
var img_MAGELANG_KAPASITAS_LONGSOR = 'assets/homepage/data/krb/MAGELANG_KAPASITAS_LONGSOR.png';
var img_bounds_MAGELANG_KAPASITAS_LONGSOR = [[-7.70712385741,110.043472533],[-7.32022426891,110.446246305]];
var overlay_MAGELANG_KAPASITAS_LONGSOR = new L.imageOverlay(img_MAGELANG_KAPASITAS_LONGSOR, img_bounds_MAGELANG_KAPASITAS_LONGSOR);
overlay_MAGELANG_KAPASITAS_LONGSOR.setOpacity(0.75);
bounds_group.addLayer(overlay_MAGELANG_KAPASITAS_LONGSOR);
//map.addLayer(overlay_MAGELANG_KAPASITAS_LONGSOR);

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
  style: function (feature) {
    return {
      color: "black",
      weight: 2,
      fill: false,
      opacity: 1,
      clickable: false
    };
  },
  onEachFeature: function (feature, layer) {

  }
});
$.getJSON("assets/homepage/data/admin_kabupaten.geojson", function (data) {
  bataskabupaten.addData(data);
});

/* Layer Batas Admin Desa */
//var admindesaColors = {"Tinggi":"#FF0000", "Sedang":"#00FF00", "Rendah":"#0000FF"};
var admindesa = L.geoJson(null, {
  style: function (feature) {
    return {
      //fillColor: admindesaColors[feature.properties.Klas_Kpdt],
      fill: true,
  	  color: "black",
  	  weight: 1.5,
      opacity: 0.5,
  	  fillOpacity: 0.1,
  	  smoothFactor: 0,
      clickable: true
    };
  },
  onEachFeature: function (feature, layer) {
	if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Kecamatan</th><td>" + feature.properties.KECAMATAN + "</td></tr>" + "<tr><th>Kabupaten</th><td>" + feature.properties.KABUPATEN + "</td></tr>" + "<tr><th>Luas (KM<sup>2</sup>)</th><td>" + feature.properties.LUAS_KM2 + "</td></tr>" + "<table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html("Desa " + feature.properties.DESA);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");

        }
      });
    }
	layer.on({
      mouseover: function (e) {
        var layer = e.target;
        layer.setStyle({
          weight: 3,
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
  }
});
$.getJSON("assets/homepage/data/admin_desa.geojson", function (data) {
  admindesa.addData(data);
});

/* Layer Penduduk Kecamatan */
//var pendudukkecColors = {"Tinggi":"#FF0000", "Sedang":"#00FF00", "Rendah":"#0000FF"};
function getColor(d) {
	 return d > 75000 ? '#8B4726' :
			d > 50000  ? '#FFA45F' :
						'#EEC591';
}
var pendudukkec = L.geoJson(null, {
  style: function (feature) {
    return {
      fillColor: getColor(feature.properties.JML_PDD),
      fill: true,
  	  color: "black",
  	  dash: 3,
  	  weight: 1,
      opacity: 0.5,
  	  fillOpacity: 0.8,
  	  smoothFactor: 0,
      clickable: true
    };
  },
  onEachFeature: function (feature, layer) {
	if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Kecamatan</th><td>" + feature.properties.KECAMATAN + "</td></tr>" + "<tr><th>Kabupaten</th><td>" + feature.properties.KABUPATEN + "</td></tr>" + "<tr><th>Jumlah Penduduk</th><td>" + feature.properties.JML_PDD + "</td></tr>" + "<tr><th>Luas (KM<sup>2</sup>)</th><td>" + feature.properties.LUAS_KM2 + "</td></tr>" + "<table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.KECAMATAN);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");

        }
      });
    }
	layer.on({
      mouseover: function (e) {
        var layer = e.target;
        layer.setStyle({
          weight: 3,
          color: "#00FFFF",
          opacity: 1
        });
        if (!L.Browser.ie && !L.Browser.opera) {
          layer.bringToFront();
        }
	  },
      mouseout: function (e) {
        pendudukkec.resetStyle(e.target);
      }
    });
  }
});
$.getJSON("assets/homepage/data/penduduk_kecamatan.geojson", function (data) {
  pendudukkec.addData(data);
});

/* Layer Destana */
var destana = L.geoJson(null, {
  style: function (feature) {
    return {
      color: "black",
      fillColor: "#ff751a",
      weight: 1,
      opacity: 1,
      fillOpacity: 0.7,
      clickable: true,
    };
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" + 
        "<tr><th>Kecamatan</th><td>" + feature.properties.KECAMATAN + "</td></tr>" + 
        "<tr><th>Tahun</th><td>" + feature.properties.Tahun + "</td></tr>" + 
        "<tr><th>Keterangan</th><td>" + feature.properties.Ket + "</td></tr>" + 
        "<tr><th>Jenis Ancaman</th><td>" + feature.properties.Ancaman + "</td></tr>" + 
        "<tr><th>Jumlah Penduduk</th><td>" + feature.properties.Pddk + "</td></tr>" + 
        "<tr><th>Organisasi Pengurangan Risiko Bencana (OPRB)</th><td>" + feature.properties.OPRB + "</td></tr>" + 
        "<tr><th>Prosedur Tetap (Protap)</th><td>" + feature.properties.Protap + "</td></tr>" + 
        "<tr><th>Jumlah Dusun</th><td>" + feature.properties.Dusun + "</td></tr>" + 
        "<table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html("Desa " + feature.properties.DESA);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
        },
        mouseover: function (e) {
          var layer = e.target;
          layer.setStyle({
            weight: 3,
            color: "#00FFFF",
            opacity: 1,
          });
          layer.bindTooltip(feature.properties.DESA + ", " + feature.properties.Tahun);
          if (!L.Browser.ie && !L.Browser.opera) {
            layer.bringToFront();
          }
        },
        mouseout: function (e) {
          destana.resetStyle(e.target);
        }
      });
    }
  },
  filter: function(feature, layer) {
    return feature.properties.Tahun != null;
  }
});
$.getJSON("assets/homepage/data/intervensi/desa_intervensi_destana.geojson", function (data) {
  destana.addData(data);
});

/* Single marker cluster layer to hold all clusters */
var markerClusters = new L.MarkerClusterGroup({
  spiderfyOnMaxZoom: true,
  showCoverageOnHover: true,
  zoomToBoundsOnClick: true,
  disableClusteringAtZoom: 11
});

/* Kejadian Bencana Tanah Longsor */
var longsorLayer = L.geoJson(null);
var longsor = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/naturaldisaster32/longsor.png",
        iconSize: [28, 28],
        iconAnchor: [14, 14],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.dusun,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
		"<tr><th>Lokasi</th><td>Dusun " + feature.properties.dusun + ", Desa " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
		"<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" + 
		"<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
		"<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
		"<tr><th>Jumlah Kerusakan</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
		"<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
		"<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
		"<tr><th>Kendala/ Kebutuhan Mendesak/ Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
		"<tr><th>Foto</th><td><img src='upload/foto_bencana/" + feature.properties.nama_foto + "' width='200' alt='Tidak ada foto'/></td></tr>" +
		"<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga +  "</td></tr>" +
		"</table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html("<img width='28' height='28' src='assets/homepage/assets/icon/naturaldisaster32/longsor.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
		  //$("#feature-title").html("<img width='28' height='28' src='assets/homepage/assets/icon/naturaldisaster32/longsor.png'>&nbsp;&nbsp;Longsor");
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/icon/naturaldisaster32/longsor.png"></td><td class="feature-name">' + layer.feature.properties.desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
    }
  },
  filter: function(feature, layer) {
		return feature.properties.idJenisBencana == '7';
  }
});
$.getJSON("https://sikk-bpbdmagelang.info/source_bencana/all", function (data) {
  longsor.addData(data);
  map.addLayer(longsorLayer);
});

/* Kejadian Bencana Banjir */
var banjirLayer = L.geoJson(null);
var banjir = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/naturaldisaster32/banjir.png",
        iconSize: [28, 28],
        iconAnchor: [14, 14],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.dusun,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
		"<tr><th>Lokasi</th><td>Dusun " + feature.properties.dusun + ", Desa " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
		"<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" + 
		"<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
		"<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
		"<tr><th>Jumlah Kerusakan</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
		"<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
		"<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
		"<tr><th>Kendala/Kebutuhan Mendesak/Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
		"<tr><th>Foto</th><td><img src='upload/foto_bencana/" + feature.properties.nama_foto + "' width='200' alt='Tidak ada foto'/></td></tr>" +
		"<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga +  "</td></tr>" +
		"</table>";
      layer.on({
        click: function (e) {
		  $("#feature-title").html("<img width='28' height='28' src='assets/homepage/assets/icon/naturaldisaster32/banjir.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/icon/naturaldisaster32/banjir.png"></td><td class="feature-name">' + layer.feature.properties.desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
    }
  },
  filter: function(feature, layer) {
		return feature.properties.idJenisBencana == '15';
  }
});
$.getJSON("https://sikk-bpbdmagelang.info/source_bencana/all", function (data) {
  banjir.addData(data);
  map.addLayer(banjirLayer);
});

/* Kejadian Bencana Banjir Lahar */
var banjirlaharLayer = L.geoJson(null);
var banjirlahar = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/naturaldisaster32/banjirlahar.png",
        iconSize: [28, 28],
        iconAnchor: [14, 14],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.dusun,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
		"<tr><th>Lokasi</th><td>Dusun " + feature.properties.dusun + ", Desa " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
		"<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" + 
		"<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
		"<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
		"<tr><th>Jumlah Kerusakan</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
		"<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
		"<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
		"<tr><th>Kendala/Kebutuhan Mendesak/Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
		"<tr><th>Foto</th><td><img src='upload/foto_bencana/" + feature.properties.nama_foto + "' width='200' alt='Tidak ada foto'/></td></tr>" +
		"<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga +  "</td></tr>" +
		"</table>";
      layer.on({
        click: function (e) {
		  $("#feature-title").html("<img width='28' height='28' src='assets/homepage/assets/icon/naturaldisaster32/banjirlahar.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/icon/naturaldisaster32/banjirlahar.png"></td><td class="feature-name">' + layer.feature.properties.desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
    }
  },
  filter: function(feature, layer) {
		return feature.properties.idJenisBencana == '20';
  }
});
$.getJSON("https://sikk-bpbdmagelang.info/source_bencana/all", function (data) {
  banjirlahar.addData(data);
  map.addLayer(banjirlaharLayer);
});

/* Kejadian Bencana Cuaca Ekstrim */
var cuacaekstrimLayer = L.geoJson(null);
var cuacaekstrim = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/naturaldisaster32/cuacaekstrim.png",
        iconSize: [28, 28],
        iconAnchor: [14, 14],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.dusun,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
		"<tr><th>Lokasi</th><td>Dusun " + feature.properties.dusun + ", Desa " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
		"<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" + 
		"<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
		"<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
		"<tr><th>Jumlah Kerusakan</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
		"<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
		"<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
		"<tr><th>Kendala/Kebutuhan Mendesak/Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
		"<tr><th>Foto</th><td><img src='upload/foto_bencana/" + feature.properties.nama_foto + "' width='200' alt='Tidak ada foto'/></td></tr>" +
		"<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga +  "</td></tr>" +
		"</table>";
      layer.on({
        click: function (e) {
		  $("#feature-title").html("<img width='28' height='28' src='assets/homepage/assets/icon/naturaldisaster32/cuacaekstrim.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/icon/naturaldisaster32/cuacaekstrim.png"></td><td class="feature-name">' + layer.feature.properties.desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
    }
  },
  filter: function(feature, layer) {
		return feature.properties.idJenisBencana == '9' || feature.properties.idJenisBencana == '10' || feature.properties.idJenisBencana == '16';
  }
});
$.getJSON("https://sikk-bpbdmagelang.info/source_bencana/all", function (data) {
  cuacaekstrim.addData(data);
  map.addLayer(cuacaekstrimLayer);
});

/* Kejadian Bencana Gempabumi */
var gempabumiLayer = L.geoJson(null);
var gempabumi = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/naturaldisaster32/gempabumi.png",
        iconSize: [28, 28],
        iconAnchor: [14, 14],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.dusun,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
		"<tr><th>Lokasi</th><td>Dusun " + feature.properties.dusun + ", Desa " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
		"<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" + 
		"<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
		"<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
		"<tr><th>Jumlah Kerusakan</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
		"<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
		"<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
		"<tr><th>Kendala/Kebutuhan Mendesak/Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
		"<tr><th>Foto</th><td><img src='upload/foto_bencana/" + feature.properties.nama_foto + "' width='200' alt='Tidak ada foto'/></td></tr>" +
		"<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga +  "</td></tr>" +
		"</table>";
      layer.on({
        click: function (e) {
		  $("#feature-title").html("<img width='28' height='28' src='assets/homepage/assets/icon/naturaldisaster32/gempabumi.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/icon/naturaldisaster32/gempabumi.png"></td><td class="feature-name">' + layer.feature.properties.desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
    }
  },
  filter: function(feature, layer) {
		return feature.properties.idJenisBencana == '8';
  }
});
$.getJSON("https://sikk-bpbdmagelang.info/source_bencana/all", function (data) {
  gempabumi.addData(data);
  map.addLayer(gempabumiLayer);
});

/* Kejadian Bencana Kebakaran gedung permukiman */
var kebakarangedungpermukimanLayer = L.geoJson(null);
var kebakarangedungpermukiman = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/naturaldisaster32/kebakarangedungpermukiman.png",
        iconSize: [28, 28],
        iconAnchor: [14, 14],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.dusun,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
		"<tr><th>Lokasi</th><td>Dusun " + feature.properties.dusun + ", Desa " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
		"<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" + 
		"<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
		"<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
		"<tr><th>Jumlah Kerusakan</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
		"<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
		"<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
		"<tr><th>Kendala/Kebutuhan Mendesak/Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
		"<tr><th>Foto</th><td><img src='upload/foto_bencana/" + feature.properties.nama_foto + "' width='200' alt='Tidak ada foto'/></td></tr>" +
		"<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga +  "</td></tr>" +
		"</table>";
      layer.on({
        click: function (e) {
		  $("#feature-title").html("<img width='28' height='28' src='assets/homepage/assets/icon/naturaldisaster32/kebakarangedungpermukiman.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/icon/naturaldisaster32/kebakarangedungpermukiman.png"></td><td class="feature-name">' + layer.feature.properties.desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
    }
  },
  filter: function(feature, layer) {
		return feature.properties.idJenisBencana == '11';
  }
});
$.getJSON("https://sikk-bpbdmagelang.info/source_bencana/all", function (data) {
  kebakarangedungpermukiman.addData(data);
  map.addLayer(kebakarangedungpermukimanLayer);
});

/* Kejadian Bencana Kebakaran Lahan */
var kebakaranlahanLayer = L.geoJson(null);
var kebakaranlahan = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/naturaldisaster32/kebakaranlahan.png",
        iconSize: [28, 28],
        iconAnchor: [14, 14],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.dusun,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
		"<tr><th>Lokasi</th><td>Dusun " + feature.properties.dusun + ", Desa " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
		"<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" + 
		"<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
		"<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
		"<tr><th>Jumlah Kerusakan</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
		"<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
		"<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
		"<tr><th>Kendala/Kebutuhan Mendesak/Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
		"<tr><th>Foto</th><td><img src='upload/foto_bencana/" + feature.properties.nama_foto + "' width='200' alt='Tidak ada foto'/></td></tr>" +
		"<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga +  "</td></tr>" +
		"</table>";
      layer.on({
        click: function (e) {
		  $("#feature-title").html("<img width='28' height='28' src='assets/homepage/assets/icon/naturaldisaster32/kebakaranlahan.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/icon/naturaldisaster32/kebakaranlahan.png"></td><td class="feature-name">' + layer.feature.properties.desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
    }
  },
  filter: function(feature, layer) {
		return feature.properties.idJenisBencana == '12';
  }
});
$.getJSON("https://sikk-bpbdmagelang.info/source_bencana/all", function (data) {
  kebakaranlahan.addData(data);
  map.addLayer(kebakaranlahanLayer);
});

/* Kejadian Bencana Kekeringan */
var kekeringanLayer = L.geoJson(null);
var kekeringan = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/naturaldisaster32/kekeringan.png",
        iconSize: [28, 28],
        iconAnchor: [14, 14],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.dusun,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
		"<tr><th>Lokasi</th><td>Dusun " + feature.properties.dusun + ", Desa " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
		"<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" + 
		"<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
		"<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
		"<tr><th>Jumlah Kerusakan</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
		"<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
		"<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
		"<tr><th>Kendala/Kebutuhan Mendesak/Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
		"<tr><th>Foto</th><td><img src='upload/foto_bencana/" + feature.properties.nama_foto + "' width='200' alt='Tidak ada foto'/></td></tr>" +
		"<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga +  "</td></tr>" +
		"</table>";
      layer.on({
        click: function (e) {
		  $("#feature-title").html("<img width='28' height='28' src='assets/homepage/assets/icon/naturaldisaster32/kekeringan.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/icon/naturaldisaster32/kekeringan.png"></td><td class="feature-name">' + layer.feature.properties.desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
    }
  },
  filter: function(feature, layer) {
		return feature.properties.idJenisBencana == '13';
  }
});
$.getJSON("https://sikk-bpbdmagelang.info/source_bencana/all", function (data) {
  kekeringan.addData(data);
  map.addLayer(kekeringanLayer);
});

/* Kejadian Bencana Letusan Gunungapi */
var letusangunungapiLayer = L.geoJson(null);
var letusangunungapi = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/naturaldisaster32/letusangunungapi.png",
        iconSize: [28, 28],
        iconAnchor: [14, 14],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.dusun,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
		"<tr><th>Lokasi</th><td>Dusun " + feature.properties.dusun + ", Desa " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
		"<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" + 
		"<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
		"<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
		"<tr><th>Jumlah Kerusakan</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
		"<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
		"<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
		"<tr><th>Kendala/Kebutuhan Mendesak/Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
		"<tr><th>Foto</th><td><img src='upload/foto_bencana/" + feature.properties.nama_foto + "' width='200' alt='Tidak ada foto'/></td></tr>" +
		"<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga +  "</td></tr>" +
		"</table>";
      layer.on({
        click: function (e) {
		  $("#feature-title").html("<img width='28' height='28' src='assets/homepage/assets/icon/naturaldisaster32/letusangunungapi.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/icon/naturaldisaster32/letusangunungapi.png"></td><td class="feature-name">' + layer.feature.properties.desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
    }
  },
  filter: function(feature, layer) {
		return feature.properties.idJenisBencana == '14';
  }
});
$.getJSON("https://sikk-bpbdmagelang.info/source_bencana/all", function (data) {
  letusangunungapi.addData(data);
  map.addLayer(letusangunungapiLayer);
});

/* Kejadian Bencana Lainnya */
var bencanalainLayer = L.geoJson(null);
var bencanalain = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/naturaldisaster32/bencanalain.png",
        iconSize: [28, 28],
        iconAnchor: [14, 14],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.dusun,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
		"<tr><th>Lokasi</th><td>Dusun " + feature.properties.dusun + ", Desa " + feature.properties.desa + ", Kec. " + feature.properties.kecamatan + "</td></tr>" +
		"<tr><th>Hari, Tanggal</th><td>" + feature.properties.hari + ", " + feature.properties.tgl + "</td></tr>" + 
		"<tr><th>Jam</th><td>" + feature.properties.waktu + "</td></tr>" +
		"<tr><th>Penyebab</th><td>" + feature.properties.penyebab + "</td></tr>" +
		"<tr><th>Jumlah Kerusakan</th><td>" + "Jembatan : " + feature.properties.jml_rusak_jembatan + "<br>" + "Jalan : " + feature.properties.jml_rusak_jalan + "<br>" + "Sawah : " + feature.properties.jml_rusak_sawah + "<br>" + "Kebun : " + feature.properties.jml_rusak_kebun + "<br>" + "Kolam : " + feature.properties.jml_rusak_kolam + "<br>" + "Irigasi : " + feature.properties.jml_rusak_irigasi + "</td></tr>" +
		"<tr><th>Jumlah Korban</th><td>" + "Luka ringan : " + feature.properties.jml_korban.luka_ringan + "<br>" + "Luka berat : " + feature.properties.jml_korban.luka_berat + "<br>" + "Meninggal : " + feature.properties.jml_korban.meninggal_dunia + "<br>" + "Hilang : " + feature.properties.jml_korban.hilang + "</td></tr>" +
		"<tr><th>Kronologi</th><td>" + feature.properties.kronologi + "</td></tr>" +
		"<tr><th>Kendala/Kebutuhan Mendesak/Potensi Bencana Susulan</th><td>" + feature.properties.kendala + "</td></tr>" +
		"<tr><th>Foto</th><td><img src='upload/foto_bencana/" + feature.properties.nama_foto + "' width='200' alt='Tidak ada foto'/></td></tr>" +
		"<tr><th>Penanganan</th><td>" + feature.properties.penanganan.penanganan_judul + "<br>" + feature.properties.penanganan.penananganan_teks + "<br>" + feature.properties.penanganan.penananganan_instansi_lembaga +  "</td></tr>" +
		"</table>";
      layer.on({
        click: function (e) {
		  $("#feature-title").html("<img width='28' height='28' src='assets/homepage/assets/icon/naturaldisaster32/bencanalain.png'>&nbsp;&nbsp;" + feature.properties.nama_bencana);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="18" height="18" src="assets/homepage/assets/icon/naturaldisaster32/bencanalain.png"></td><td class="feature-name">' + layer.feature.properties.desa + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
    }
  },
  filter: function(feature, layer) {
		return feature.properties.idJenisBencana == '19';
  }
});
$.getJSON("https://sikk-bpbdmagelang.info/source_bencana/all", function (data) {
  bencanalain.addData(data);
  map.addLayer(bencanalainLayer);
});

/* Lokasi EWS */
//var ewsLayer = L.geoJson(null);
var ews = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/ews.png",
        iconSize: [28, 28],
        iconAnchor: [14, 14],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.Dusun,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
    "<tr><th>Lokasi</th><td>Dusun " + feature.properties.Dusun + ", Desa " + feature.properties.Desa + ", Kec. " + feature.properties.Kecamatan + "</td></tr>" +
    "<tr><th>Keterangan</th><td>" + feature.properties.Ket + "</td></tr>" +
    "<tr><th>Sumber Dana</th><td>" + feature.properties.Sbr_Dana + "</td></tr>" +
    "<tr><th>KK Terancam</th><td>" + feature.properties.KK_Trcm + "</td></tr>" +
    "<tr><th>Panjang Rekahan</th><td>" + feature.properties.P_Rkhn_m + " meter</td></tr>" +
    "</table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html("<img width='28' height='28' src='assets/homepage/assets/icon/ews.png'>&nbsp;&nbsp;EWS Tanah Longsor");
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
    }
  }
});
$.getJSON("assets/homepage/data/ews/ews_tanah_longsor.geojson", function (data) {
  ews.addData(data);
  //map.addLayer(ews);
});

/* Lokasi huntap */
//var huntapLayer = L.geoJson(null);
var huntap = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/homepage/assets/icon/huntap.png",
        iconSize: [28, 28],
        iconAnchor: [14, 14],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.Nama,
      riseOnHover: true
    });
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" +
    "<tr><th>Alamat</th><td>" + feature.properties.Alamat + "</td></tr>" +
    "<tr><th>Jumlah Rumah</th><td>" + feature.properties.Jumlah_Rum + "</td></tr>" +
    "<tr><th>Foto</th><td><img src='assets/homepage/foto/huntap/" + feature.properties.foto + "' width='200' alt='Tidak ada foto'></td></tr>" +
    "<tr><th>Foto Udara</th><td><img src='assets/homepage/foto/huntap/" + feature.properties.foto_udara + "' width='200' alt='Tidak ada foto'></td></tr>" +
    "</table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html("<img width='28' height='28' src='assets/homepage/assets/icon/huntap.png'>&nbsp;&nbsp;" + feature.properties.Nama);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
        }
      });
    }
  }
});
$.getJSON("assets/homepage/data/huntap/lokasi_huntap.geojson", function (data) {
  huntap.addData(data);
  //map.addLayer(huntap);
});

//temporary variable bencana
//var letusangunungapiLayer = L.geoJson(null);

/* Map Center */
map = L.map("map", {
  zoom: 11,
  center: [-7.50273, 110.25055],
  layers: [basemap5, bataskabupaten, markerClusters, highlight],
  zoomControl: false,
  attributionControl: false
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
  if (e.layer === banjirlaharLayer) {
    markerClusters.addLayer(banjirlahar);
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
  if (e.layer === banjirlaharLayer) {
    markerClusters.removeLayer(banjirlahar);
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
  div.innerHTML = "<a href='#' onclick='animateSidebar();'>List kejadian</a>";
  return div;
};
map.addControl(attributionControl);

/* Zoom Control Position */
var zoomControl = L.control.zoom({
  position: "topleft"
}).addTo(map);

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
    clickable: false
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
    children: [
        {label: 'Google Streets', layer: basemap1},
        {label: 'OpenStreeMap', layer: basemap2},
        {label: 'Google Satellite', layer: basemap3},
        {label: 'Google Hybrid', layer: basemap4},
        {label: 'Google Terrain', layer: basemap5},
    ]
};
var layersTree = {
  label: '<b>Layer</b>',
  noShow: true,
  children: [
    {label: '<b>Kejadian Bencana</b>', children: [
      {label: '<img src="assets/homepage/assets/icon/naturaldisaster32/longsor.png" width="24" height="24">&nbsp;Longsor', layer: longsorLayer},
      {label: '<img src="assets/homepage/assets/icon/naturaldisaster32/banjir.png" width="24" height="24">&nbsp;Banjir', layer: banjirLayer},
      {label: '<img src="assets/homepage/assets/icon/naturaldisaster32/banjirlahar.png" width="24" height="24">&nbsp;Banjir Lahar', layer: banjirlaharLayer},
      {label: '<img src="assets/homepage/assets/icon/naturaldisaster32/gempabumi.png" width="24" height="24">&nbsp;Gempabumi', layer: gempabumiLayer},
      {label: '<img src="assets/homepage/assets/icon/naturaldisaster32/cuacaekstrim.png" width="24" height="24">&nbsp;Cuaca Ekstrim', layer: cuacaekstrimLayer},
      {label: '<img src="assets/homepage/assets/icon/naturaldisaster32/kebakaranlahan.png" width="24" height="24">&nbsp;Kebakaran Hutan/Lahan', layer: kebakaranlahanLayer},
      {label: '<img src="assets/homepage/assets/icon/naturaldisaster32/kebakarangedungpermukiman.png" width="24" height="24">&nbsp;Kebakaran Gedung/Permukiman', layer: kebakarangedungpermukimanLayer},
      {label: '<img src="assets/homepage/assets/icon/naturaldisaster32/kekeringan.png" width="24" height="24">&nbsp;Kekeringan', layer: kekeringanLayer},
      {label: '<img src="assets/homepage/assets/icon/naturaldisaster32/letusangunungapi.png" width="24" height="24">&nbsp;Letusan Gunungapi', layer: letusangunungapiLayer},
      {label: '<img src="assets/homepage/assets/icon/naturaldisaster32/bencanalain.png" width="24" height="24">&nbsp;Kejadian lain', layer: bencanalainLayer},
    ]},
    {label: '<b>Layer</b>', children: [
      {label: 'Batas Kabupaten', layer: bataskabupaten},
      {label: 'Batas Desa', layer: admindesa},
      {label: 'Penduduk Kecamatan', layer: pendudukkec},
      {label: 'Desa Tangguh Bencana', layer: destana},
      {label: 'Lalu Lintas (Traffic)', layer: googletrafficlayer},
      {label: '<img src="assets/homepage/assets/icon/ews.png" width="24" height="24">&nbsp;EWS', layer: ews},
      {label: '<img src="assets/homepage/assets/icon/huntap.png" width="24" height="24">&nbsp;Hunian Tetap', layer: huntap},
    ]},
    {label: '<b>Peta Bahaya</b>', children: [
      {label: 'Bahaya Banjir', layer: overlay_MAGELANG_BAHAYA_BANJIR},
      {label: 'Bahaya Banjir Bandang', layer: overlay_MAGELANG_BAHAYA_BANJIR_BANDANG},
      {label: 'Bahaya Cuaca Ekstrim', layer: overlay_MAGELANG_BAHAYA_CUEKS},
      {label: 'Bahaya Gempabumi', layer: overlay_MAGELANG_BAHAYA_GEMPA},
      {label: 'Bahaya Kekeringan', layer: overlay_MAGELANG_BAHAYA_KEKERINGAN},
      {label: 'Bahaya Kebakaran Hutan dan Lahan', layer: overlay_MAGELANG_BAHAYA_KHL},
      {label: 'Bahaya Letusan Gunungapi', layer: overlay_MAGELANG_BAHAYA_LGA},
      {label: 'Bahaya Tanah Longsor', layer: overlay_MAGELANG_BAHAYA_LONGSOR},
    ]},
    {label: '<b>Peta Risiko</b>', children: [
      {label: 'Risiko Banjir', layer: overlay_MAGELANG_RISIKO_BANJIR},
      {label: 'Risiko Banjir Bandang', layer: overlay_MAGELANG_RISIKO_BANJIR_BANDANG},
      {label: 'Risiko Cuaca Ekstrim', layer: overlay_MAGELANG_RISIKO_CUEKS},
      {label: 'Risiko Gempabumi', layer: overlay_MAGELANG_RISIKO_GEMPA},
      {label: 'Risiko Kekeringan', layer: overlay_MAGELANG_RISIKO_KEKERINGAN},
      {label: 'Risiko Kebakaran Hutan dan Lahan', layer: overlay_MAGELANG_RISIKO_KHL},
      {label: 'Risiko Letusan Gunungapi', layer: overlay_MAGELANG_RISIKO_LGA},
      {label: 'Risiko Tanah Longsor', layer: overlay_MAGELANG_RISIKO_LONGSOR},
    ]},
    {label: '<b>Peta Kerentanan</b>', children: [
      {label: 'Kerentanan Banjir', layer: overlay_MAGELANG_KERENTANAN_BANJIR},
      {label: 'Kerentanan Banjir Bandang', layer: overlay_MAGELANG_KERENTANAN_BANJIR_BANDANG},
      {label: 'Kerentanan Cuaca Ekstrim', layer: overlay_MAGELANG_KERENTANAN_CUEKS},
      {label: 'Kerentanan Gempabumi', layer: overlay_MAGELANG_KERENTANAN_GEMPA},
      {label: 'Kerentanan Kekeringan', layer: overlay_MAGELANG_KERENTANAN_KEKERINGAN},
      {label: 'Kerentanan Kebakaran Hutan dan Lahan', layer: overlay_MAGELANG_KERENTANAN_KHL},
      {label: 'Kerentanan Letusan Gunungapi', layer: overlay_MAGELANG_KERENTANAN_LGA},
      {label: 'Kerentanan Tanah Longsor', layer: overlay_MAGELANG_KERENTANAN_LONGSOR},
    ]},
    {label: '<b>Peta Kapasitas</b>', children: [
      {label: 'Kapasitas Banjir', layer: overlay_MAGELANG_KAPASITAS_BANJIR},
      {label: 'Kapasitas Banjir Bandang', layer: overlay_MAGELANG_KAPASITAS_BANJIR_BANDANG},
      {label: 'Kapasitas Cuaca Ekstrim', layer: overlay_MAGELANG_KAPASITAS_CUEKS},
      {label: 'Kapasitas Gempabumi', layer: overlay_MAGELANG_KAPASITAS_GEMPA},
      {label: 'Kapasitas Kekeringan', layer: overlay_MAGELANG_KAPASITAS_KEKERINGAN},
      {label: 'Kapasitas Kebakaran Hutan dan Lahan', layer: overlay_MAGELANG_KAPASITAS_KHL},
      {label: 'Kapasitas Letusan Gunungapi', layer: overlay_MAGELANG_KAPASITAS_LGA},
      {label: 'Kapasitas Tanah Longsor', layer: overlay_MAGELANG_KAPASITAS_LONGSOR},
    ]},
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

/* Feature Modal Show Clear Highlight */
$("#featureModal").on("hidden.bs.modal", function (e) {
  $(document).on("mouseout", ".feature-row", clearHighlight);
});

/* Typeahead search functionality */
$(document).one("ajaxStop", function () {
  $("#loading").hide();
  sizeLayerControl();
  /* Fit map to bataskabupaten bounds */
  map.fitBounds(bataskabupaten.getBounds());
  featureList = new List("features", {valueNames: ["feature-name"]});
  featureList.sort("feature-name", {order:"asc"});
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
		img.src = 'assets/homepage/assets/img/magelangkab_bpbd.png';
		img.style.width = '70px';
			return img;
	},
	onRemove: function(map) {
		// Nothing to do here
	}
});
L.control.watermark = function(opts) {
	return new L.Control.Watermark(opts);
}
L.control.watermark({ position: 'bottomleft' }).addTo(map);