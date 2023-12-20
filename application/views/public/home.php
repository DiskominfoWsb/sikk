<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--meta http-equiv="Content-Security-Policy" content="default-src *; script-src 'self' 'unsafe-inline' 'unsafe-eval' *; style-src 'self' 'unsafe-inline' *"-->
  <meta http-equiv="refresh" content="1800">
  <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="theme-color" content="#000000">
  <meta name="description" content="">
  <meta name="author" content="BPBD Kab. Wonosobo">
  <title>BPBD Kab. Wonosobo</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.3.0/MarkerCluster.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.3.0/MarkerCluster.Default.css">
  <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/homepage/'); ?>/assets/plugins/leaflet-controllayerstree/L.Control.Layers.Tree.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/homepage/'); ?>/assets/plugins/leaflet-coordinates-control/Control.Coordinates.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/homepage/'); ?>/assets/plugins/leaflet-defaultextent/leaflet.defaultextent.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/homepage/'); ?>/assets/css/app.css">

  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/homepage/'); ?>/assets/img/faviconbpbd-76.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/homepage/'); ?>/assets/img/faviconbpbd-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/homepage/'); ?>/assets/img/faviconbpbd-152.png">
  <link rel="icon" sizes="196x196" href="<?php echo base_url('assets/homepage/'); ?>/assets/img/faviconbpbd-196.png">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/homepage/'); ?>/assets/img/favbpbdwonosobokab.png">
</head>

<body>
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <div class="navbar-icon-container">
          <a href="#" class="navbar-icon pull-right visible-xs" id="nav-btn"><i class="fa fa-bars fa-lg white"></i></a>
          <a href="#" class="navbar-icon pull-right visible-xs" id="sidebar-toggle-btn"><i class="fa fa-search fa-lg white"></i></a>
        </div>

        <a class="navbar-brand" href="#">Pantauan Bencana</a>
      </div>
      <div class="navbar-collapse collapse">
        <form class="navbar-form navbar-right" role="search">
          <div class="form-group has-feedback">
            <input id="searchbox" type="text" placeholder="Cari" class="form-control">
            <span id="searchicon" class="fa fa-search form-control-feedback"></span>
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden-xs"><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="list-btn"><i class="fa fa-list white"></i>&nbsp;&nbsp;Kejadian Bencana</a></li>
          <li class="dropdown">
            <a id="toolsDrop" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v white"></i>&nbsp;&nbsp;Data<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('chart') ?>" data-toggle="collapse" data-target=".navbar-collapse.in" id="list-btn"><i class="fa fa-area-chart"></i>&nbsp;&nbsp;Grafik Bencana</a></li>
              <li><a href="<?php echo site_url('TabelKejadian') ?>" data-toggle="collapse" data-target=".navbar-collapse.in" id="tabelkejadian-btn"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Data Bencana</a></li>
              <!-- <li><a href="<?php echo base_url('sisterVillage') ?>" target="_blank" data-toggle="collapse" data-target=".navbar-collapse.in" id="viewdata-btn"><i class="fa fa-map-o"></i>&nbsp;&nbsp;Jalur Evakuasi</a></li> -->
            </ul>
          </li>
          <!-- <li class="dropdown">
              <a id="toolsDrop" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v white"></i>&nbsp;&nbsp;Informasi<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <?php
                // Get Information
                $informasi = $this->m_informasi->getMenu();
                foreach ($informasi as $inf) {
                ?>
                <li><a href="<?php echo site_url("informasi/index/" . $inf->idinformasi); ?>" data-toggle="collapse" data-target=".navbar-collapse.in" id="list-btn"><i class="fa fa-file"></i> <?php echo $inf->judul; ?></a></li>
                <?php } ?>
              </ul>
            </li> -->
          <li class="dropdown">
            <a id="toolsDrop" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v white"></i>&nbsp;&nbsp;Alat<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="full-extent-btn"><i class="fa fa-arrows-alt"></i>&nbsp;&nbsp;Tampilkan keseluruhan</a></li>
              <!-- li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="legend-btn"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;Legenda</a></li -->
              <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="print-btn"><i class="fa fa-print"></i>&nbsp;&nbsp;Cetak Peta</a></li>
              <li class="divider hidden-xs"></li>
              <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="embed-btn"><i class="fa fa-code"></i>&nbsp;&nbsp;Embed</a></li>
            </ul>
          </li>
          <li><a href="<?php echo site_url('auth/login') ?>" target="_blank"><i class="fa fa-lock white"></i>&nbsp;&nbsp;Login</a></li>
          <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="about-btn"><i class="fa fa-info white"></i></a></li>
        </ul>
      </div>
      <!--/.navbar-collapse -->
    </div>
  </div>

  <div id="container">
    <div id="sidebar">
      <div class="sidebar-wrapper">
        <div class="panel panel-default" id="features">
          <div class="panel-heading">
            <h3 class="panel-title">Kejadian Bencana
              <button type="button" class="btn btn-xs btn-default pull-right" id="sidebar-hide-btn"><i class="fa fa-chevron-left"></i></button></h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-8 col-md-8">
                <input type="text" class="form-control search" placeholder="Filter" />
              </div>
              <div class="col-xs-4 col-md-4">
                <button type="button" class="btn btn-primary pull-right sort" data-sort="feature-name" id="sort-btn"><i class="fa fa-sort"></i>&nbsp;&nbsp;Sort</button>
              </div>
            </div>
          </div>
          <div class="sidebar-table">
            <table class="table table-hover" id="feature-list">
              <thead class="hidden">
                <tr>
                  <th>Icon</th>
                <tr>
                <tr>
                  <th>Name</th>
                <tr>
                <tr>
                  <th>Chevron</th>
                <tr>
              </thead>
              <tbody class="list"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div id="map"></div>
  </div>
  <div id="loading">
    <div class="loading-indicator">
      <div class="progress progress-striped active">
        <div class="progress-bar progress-bar-warning progress-bar-full"></div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="aboutModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Aplikasi SIKK Versi 1.0</h4>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs nav-justified" id="aboutTabs">
            <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-question-circle"></i>Tentang</a></li>
            <li><a href="#contact" data-toggle="tab"><i class="fa fa-envelope"></i>Hubungi kami</a></li>
          </ul>
          <div class="tab-content" id="aboutTabsContent">
            <div class="tab-pane fade active in" id="about">
              <table class='table table-striped table-bordered table-condensed'>
                <tr>
                  <td>Aplikasi ini dikembangkan dari kerjasama antara BPBD Kab. Wonosobo dengan SinauGIS.</td>
                </tr>
                <tr>
                  <td><i>Feature</i> Sistem Informasi Kebencanaan Kabupaten (SIKK):
                    <ul>
                      <li>Peta web pantauan bencana selama 90 hari terakhir.</li>
                      <li>Info grafis kejadian bencana.</li>
                      <li>Tabel kejadian bencana.</li>
                      <li><i>Embed Code</i> pantauan bencana ke dalam halaman atau website pengguna.</li>
                    </ul>
                  </td>
                </tr>
              </table>
            </div>
            <div class="tab-pane fade" id="contact">
              <table class='table table-striped table-bordered table-condensed'>
                <tr>
                  <td colspan="2" style="text-align: center"><img src="<?php echo base_url('assets/homepage/'); ?>/assets/img/bpbdwonosobo.png" width="100"></td>
                </tr>
                <tr>
                  <td>Website</td>
                  <td><a href="https://bpbd.wonosobokab.go.id/" target="_blank">https://bpbd.wonosobokab.go.id/</a></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>bpbdkabwsb@gmail.com</td>
                </tr>
                <tr>
                  <td>Telepon</td>
                  <td>(0286) 322908</td>
                </tr>
                <tr>
                  <td>Freq VHF</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>Jalan Jendral Soeharto no 7, Kalierang, Selomerto Wonosobo</td>
                </tr>
                <!-- <tr><td>Facebook Fans Page</td><td><a href="https://www.facebook.com/fanpagebpbd" target="_blank">@fanpagebpbd</a></td></tr> -->
                <tr>
                  <td>Twitter</td>
                  <td><a href="https://twitter.com/" target="_blank">@bpbdkab</a></td>
                </tr>
                <tr>
                  <td>Instagram</td>
                  <td><a href="https://www.instagram.com/" target="_blank">@bpbd_</a></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div class="modal fade" id="legendModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Map Legend</h4>
        </div>
        <div class="modal-body">
          <p>Map Legend goes here...</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div class="modal fade" id="embedModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Embed Code</h4>
        </div>
        <div class="modal-body">
          <form id="embed-form">
            <fieldset>
              <div class="form-group">
                <label for="name">Letakkan code ini pada halaman web Anda</label>
                <textarea class="form-control" rows="4"><iframe src="<?php echo base_url(); ?>" width="800" height="600" frameborder="0"></iframe></textarea>
              </div>
            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div class="modal fade" id="featureModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="feature-title"></h4>
        </div>
        <div class="modal-body" id="feature-info"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div class="modal fade" id="attributionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">
            Info
          </h4>
        </div>
        <div class="modal-body">
          Aplikasi ini dikembangkan atas kerjasama <a href='https://bpbd.wonosobokab.go.id/' target="_blank">BPBD Kabupaten Wonosobo</a> dengan <a href='http://www.sinaugis.com' target="_blank">SinauGIS</a>
          <div id="attribution"></div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div class="modal fade" id="alertModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Peringatan</h4>
        </div>
        <div class="modal-body">
          <p>Sistem ini masih dalam tahap pengembangan, data yang ada di dalam sistem ini adalah data <b><i>dummy</i></b>, bukan data kejadian sebenarnya.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.5/typeahead.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.3.0/leaflet.markercluster.js"></script>
  <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>
  <script src="https://unpkg.com/rbush@2.0.2/rbush.min.js"></script>
  <script src="https://unpkg.com/labelgun@6.1.0/lib/labelgun.min.js"></script>
  <script src="<?php echo base_url('assets/homepage/'); ?>/assets/plugins/leaflet-label/labels.js"></script>
  <script src="<?php echo base_url('assets/homepage/'); ?>/assets/plugins/leaflet-controllayerstree/L.Control.Layers.Tree.js"></script>
  <script src="<?php echo base_url('assets/homepage/'); ?>/assets/plugins/leaflet-coordinates-control/Control.Coordinates.js"></script>
  <script src="<?php echo base_url('assets/homepage/'); ?>/assets/plugins/leaflet-defaultextent/leaflet.defaultextent.js"></script>
  <script src="<?php echo base_url('assets/homepage/'); ?>/assets/js/antpath/leaflet-ant-path.js"></script>
  <script src="<?php echo base_url('assets/homepage/'); ?>/assets/js/antpath/leaflet-ant-path.es6.js"></script>
  <script src="<?php echo base_url('assets/homepage/'); ?>/data/jalurevakuasi/dieng_patakbanteng.js"></script>
  <script src="<?php echo base_url('assets/homepage/'); ?>/data/jalurevakuasi/sikunang_campursari.js"></script>
  <script src="<?php echo base_url('assets/homepage/'); ?>/data/jalurevakuasi/sikunang_sembungan.js"></script>
  <?php include 'homeapp.php'; ?>
</body>

</html>