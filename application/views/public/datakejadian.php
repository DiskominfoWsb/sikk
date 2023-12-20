<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="theme-color" content="#000000">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>BPBD Kab. Wonosobo</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/homepage/'); ?>/assets/css/app.css">

  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/homepage/'); ?>/assets/img/faviconbpbd-76.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/homepage/'); ?>/assets/img/faviconbpbd-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/homepage/'); ?>/assets/img/faviconbpbd-152.png">
  <link rel="icon" sizes="196x196" href="<?php echo base_url('assets/homepage/'); ?>/assets/img/faviconbpbd-196.png">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/homepage/'); ?>/assets/img/favbpbdwonosobokab.png">
  <style>
    body,
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      font-size: 12;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 3px;
    }

    #kecil {
      width: 95px;
    }

    #sedang {
      width: 175px;
    }

    #besar {
      width: 600px;
    }

    #judul {
      margin: 10px;
      background-color: lightgray;
    }

    #search {
      margin-bottom: 24px;
      height: auto;
      overflow: hidden;
    }

    #container {
      margin-top: 24px;
      margin-bottom: 48px;
      overflow-y: scroll;
      height: calc(100% - 24px);
    }

    label {
      line-height: 30px;
    }
  </style>
</head>

<body>
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <div class="navbar-icon-container">
          <a href="#" class="navbar-icon pull-right visible-xs" id="nav-btn"><i class="fa fa-bars fa-lg white"></i></a>
          <!--a href="#" class="navbar-icon pull-right visible-xs" id="sidebar-toggle-btn"><i class="fa fa-search fa-lg white"></i></a-->
        </div>
        <a class="navbar-brand" href="#">Tabel Kejadian
          <!--sup><font style="font:icon"><span class="label label-danger">90 Hari</span></font></sup--></a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo site_url() ?>" data-toggle="collapse" data-target=".navbar-collapse.in" id="home-btn"><i class="fa fa-map-o white"></i>&nbsp;&nbsp;Pantauan Bencana</a></li>
          <li class="dropdown">
            <a id="toolsDrop" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v white"></i>&nbsp;&nbsp;Data<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo site_url('chart') ?>" data-toggle="collapse" data-target=".navbar-collapse.in" id="list-btn"><i class="fa fa-area-chart"></i>&nbsp;&nbsp;Grafik Bencana</a></li>
              <!-- <li><a href="<?php echo base_url('sisterVillage') ?>" target="_blank" data-toggle="collapse" data-target=".navbar-collapse.in" id="viewdata-btn"><i class="fa fa-map-o"></i>&nbsp;&nbsp;Jalur Evakuasi</a></li> -->
            </ul>
          </li>
          <li><a href="<?php echo base_url('auth/login') ?>" target="_blank"><i class="fa fa-lock white"></i>&nbsp;&nbsp;Login</a></li>
          <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="about-btn"><i class="fa fa-info"></i></a></li>
        </ul>
      </div>
      <!--/.navbar-collapse -->
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

  <div class="container" id="container">
    <form method="POST" id="search" class="form form-inline">
      <div class="form-group col-md-5">
        <label for="dateFrom" class="col-md-3">Tanggal Mulai</label>
        <div class="input-group">
          <input type="text" id="dateFrom" name="dateFrom" class="datepicker form-control" value="<?php echo $dateFrom; ?>" />
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
      </div>
      <div class="form-group col-md-5">
        <label for="dateTo" class="col-md-3">Tanggal Akhir</label>
        <div class="input-group">
          <input type="text" id="dateTo" name="dateTo" class="datepicker form-control" value="<?php echo $dateTo; ?>" />
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
      </div>
      <div class="form-group col-md-2">
        <div class="button-group">
          <button class="btn btn-success" type="submit"> Search </button>
          <button class="btn btn-danger" type="reset"> Reset </button>
        </div>
      </div>
    </form>
    <div class="table-responsive">
      <table class="table table-bordered table-hover datatables">
        <thead>
          <tr>
            <th class="col-md-2">Bencana</th>
            <th class="col-md-2">Waktu</th>
            <th class="col-md-1">Lokasi</th>
            <th class="col-md-1">Koordinat</th>
            <th class="col-md-1">Penyebab</th>
            <th>Kronologi</th>
            <!-- <th>Kerusakan</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
          $month = array(
            1 => "Januari",
            2 => "Februari",
            3 => "Maret",
            4 => "April",
            5 => "Mei",
            6 => "Juni",
            7 => "Juli",
            8 => "Agustus",
            9 => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Desember"
          );
          $no = 1;
          foreach ($bencana as $b) {
            echo "<tr>
                <td>" . $b->jenisbencanaNama . "</td>
                <td>" . $b->bencanaHari . "<br />" . date("d ", strtotime($b->bencanaTgl)) . $month[date("n", strtotime($b->bencanaTgl))] . date(" Y", strtotime($b->bencanaTgl)) . "<br />" . $b->bencanaWaktu . "</td>
                <td>";
            if (!empty($b->bencanaNamaKampung)) {
              echo "Kampung " . $b->bencanaNamaKampung . ", ";
            } else {
              echo "";
            }
            echo $b->dusunNama . ", " . $b->desaNama . ", Kec. " . $b->kecamatanNama . "</td>
                <td>" . $b->bencanaBt . ", " . $b->bencanaLs . "</td>
                <td>" . $b->bencanaPenyebab . "</td>
                <td>" . $b->bencanaKronologi . "</td>" .
              // "<td>".$this->m_bencana->getKerusakanCount($key->idbencana, $properti->idkerusakan_properti, 1) . "</td>.
              "</tr>";
            $no++;
          }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th class="col-md-2">Bencana</th>
            <th class="col-md-2">Waktu</th>
            <th class="col-md-1">Lokasi</th>
            <th class="col-md-1">Koordinat</th>
            <th class="col-md-1">Penyebab</th>
            <th>Kronologi</th>
            <!-- <th>Kerusakan</th> -->
          </tr>
        </tfoot>
      </table>
    </div>
    <div id="pdf" style="display:none;">
      <table style="width: 100%;" id="export">
        <thead>
          <tr>
            <th style="width: 100px;">Bencana</th>
            <th style="width: 100px;">Waktu</th>
            <th style="width: 100px;">Lokasi</th>
            <th style="width: 100px;">Penyebab</th>
            <th style="width: 100px;">Kronologi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($bencana as $b) {
            echo "<tr>
                <td>" . $b->jenisbencanaNama . "</td>
                <td>" . $b->bencanaHari . "\n" . date("d ", strtotime($b->bencanaTgl)) . $month[date("n", strtotime($b->bencanaTgl))] . date(" Y", strtotime($b->bencanaTgl)) . "\n" . $b->bencanaWaktu . "</td>
                <td>Dusun " . $b->dusunNama . ",\nDesa " . $b->desaNama . ",\nKec. " . $b->kecamatanNama . "\n(" . $b->bencanaBt . ", " . $b->bencanaLs . ")</td>
                <td>" . $b->bencanaPenyebab . "</td>
                <td>" . $b->bencanaKronologi . "</td>
              </tr>";
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
    <div id="pdf-download"></div>
    <button type="button" id="btn-pdf" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export PDF</button>
    <div class="clearfix"></div>
  </div>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.4/highcharts.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/homepage/'); ?>/assets/js/button.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js" integrity="sha384-CchuzHs077vGtfhGYl9Qtc7Vx64rXBXdIAZIPbItbNyWIRTdG0oYAqki3Ry13Yzu" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.js"></script>
  <script type="text/javascript">
    $(function() {
      $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
      });
      $(".datatables").dataTable({
        fixedHeader: {
          header: true,
          footer: false
        }
      });

      $("#btn-pdf").click(function() {
        var doc = new jsPDF({
          orientation: 'l',
          format: 'a4'
        });
        doc.text("Data Bencana Kab. Wonosobo \nTanggal <?php echo date("d-m-Y", strtotime($dateFrom)) . " s/d " . date("d-m-Y", strtotime($dateTo)); ?>\nSumber: <?php echo base_url(''); ?>", 10, 12);
        var elem = document.getElementById("export");
        var res = doc.autoTableHtmlToJson(elem);
        doc.autoTable(res.columns, res.data, {
          startY: 30,
          margin: {
            horizontal: 7
          },
          bodyStyles: {
            valign: 'top'
          },
          styles: {
            overflow: 'linebreak',
          },
          columnStyles: {
            0: {
              columnWidth: 40
            },
            1: {
              columnWidth: 40
            },
            2: {
              columnWidth: 40
            },
            3: {
              columnWidth: 40
            }
          }
        });
        doc.save('Data Bencana <?php echo date("Ymd"); ?>.pdf');
      });
    });
  </script>
</body>

</html>