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
  <link rel="stylesheet" href="<?php echo base_url('assets/homepage/');?>/assets/css/app.css">

  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/homepage/');?>/assets/img/faviconbpbd-76.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/homepage/');?>/assets/img/faviconbpbd-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/homepage/');?>/assets/img/faviconbpbd-152.png">
  <link rel="icon" sizes="196x196" href="<?php echo base_url('assets/homepage/');?>/assets/img/faviconbpbd-196.png">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/homepage/');?>/assets/img/favbpbdwonosobokab.png">
  <style>
    .content,
    .content-wrapper{
      height: auto;
      width:100%;
      overflow: hidden;
    }
    #search{
      margin-bottom: 24px;
      height: auto;
      overflow: hidden;
    }
    #container{
      margin-top: 60px;
      margin-bottom: 48px;
      overflow-y: scroll;
      height: calc(100% - 24px);
    }
    label{
      line-height: 30px;
    }
    #btn-pdf{
      margin-right: 24px;
    }
  </style>
</head>

<body>
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <div class="navbar-icon-container">
          <a href="#" class="navbar-icon pull-right visible-xs" id="nav-btn"><i class="fa fa-bars fa-lg white"></i></a>
        </div>
        <a class="navbar-brand" href="#">Info Grafis</a>
      </div>
      <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo site_url()?>" data-toggle="collapse" data-target=".navbar-collapse.in" id="home-btn"><i class="fa fa-map-o white"></i>&nbsp;&nbsp;Pantauan Bencana</a></li>
            <li class="dropdown">
              <a id="toolsDrop" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v white"></i>&nbsp;&nbsp;Data<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('TabelKejadian')?>" data-toggle="collapse" data-target=".navbar-collapse.in" id="tabelkejadian-btn"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Data Bencana</a></li>
                <!-- <li><a href="<?php echo base_url('sisterVillage')?>" target="_blank" data-toggle="collapse" data-target=".navbar-collapse.in" id="viewdata-btn"><i class="fa fa-map-o"></i>&nbsp;&nbsp;Jalur Evakuasi</a></li> -->
              </ul>
            </li>
            <li><a href="<?php echo base_url('auth/login')?>" target="_blank"><i class="fa fa-lock" data-target=".navbar-collapse.in" id="login-btn"></i>&nbsp;&nbsp;Login</a></li> 
            <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="about-btn"><i class="fa fa-info"></i></a></li>           
          </ul>
        </div><!--/.navbar-collapse -->
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

    <div id="container">
      <form method="POST" id="search" class="form form-inline">
        <div class="form-group col-md-5">
          <label for="dateFrom" class="col-md-3">Tanggal Mulai</label>
          <div class="input-group">
            <input type="text" id="dateFrom" name="dateFrom" class="datepicker form-control" value="<?php echo (null != $this->input->post("dateFrom")) ? $this->input->post("dateFrom") : date("Y-m-01"); ?>" />
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          </div>
        </div>
        <div class="form-group col-md-5">
          <label for="dateTo" class="col-md-3">Tanggal Akhir</label>
          <div class="input-group">
            <input type="text" id="dateTo" name="dateTo" class="datepicker form-control" value="<?php echo (null != $this->input->post("dateTo")) ? $this->input->post("dateTo") : date("Y-m-d"); ?>"/>
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
      <?php
      $value = array();
      $jenis_bencana = array();
      $korban = array();

      foreach($bencana as $result){
        array_push($jenis_bencana, $result->jenisbencanaNama);
        array_push($value, (float) $result->jumlah);
      }

      foreach($korbans as $result){
        if ($result->korbanKondisi==3) {
          $korban[] =  'Luka Ringan';
        }elseif ($result->korbanKondisi==2) {
          $korban[] =  'Luka Berat';
        }elseif ($result->korbanKondisi==1) {
          $korban[] =  'Meninggal Dunia';
        }elseif ($result->korbanKondisi==4) {
          $korban[] =  'Hilang';
        }else{
          $korban[] = 'Lainnya';
        }

        $value_korban[] = (float)  $result->jumlah; //ambil nilai
      }          
      /* end mengambil query*/

      ?>
      <!-- Load chart dengan menggunakan ID -->
      <div class="content-wrapper">
        <div class="content">
          <div class="col-md-8">
            <hr>
            <div id="report">
              Tidak Ada Data
            </div>
            <hr>
          </div>
          <div class="col-md-4">
            <hr><div id="korban">
              Tidak Ada Data
            </div><hr><br>
          </div><br>
        </div>
      </div>    
      <!-- END load chart -->
    </div>
    
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js" integrity="sha384-CchuzHs077vGtfhGYl9Qtc7Vx64rXBXdIAZIPbItbNyWIRTdG0oYAqki3Ry13Yzu" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/homepage/');?>/assets/js/button.js"></script>
    <script src="<?php echo base_url('assets/homepage/');?>/assets/js/secure.js"></script>
    <!-- Script untuk memanggil library Highcharts -->
    <script type="text/javascript">
      $(function () {
        $(".datepicker").datepicker({
          format: "yyyy-mm-dd",
          autoclose: true
        });
      });
    </script>
    <?php if(count($bencana) > 0){ ?>
    <script type="text/javascript">
      $(function () {
        $('#report').highcharts({
          chart: {
            type: 'column',
            margin: 75,
            options3d: {
              enabled: false,
              alpha: 10,
              beta: 25,
              depth: 70
            }
          },
          title: {
            text: 'Grafik Kejadian Bencana',
            style: {
              fontSize: '18px',
              fontFamily: 'Verdana, sans-serif'
            }
          },
          subtitle: {
           text: '<?php echo $dateFromTo; ?>',
           style: {
            fontSize: '15px',
            fontFamily: 'Verdana, sans-serif'
          }
        },
        plotOptions: {
          column: {
            depth: 25
          }
        },
        credits: {
          enabled: false
        },
        xAxis: {
          categories:  <?php echo json_encode($jenis_bencana);?>
        },
        exporting: { 
          enabled: true 
        },
        yAxis: {
          title: {
            text: 'Jumlah'
          },
        },
        tooltip: {
         formatter: function() {
           return 'Jumlah kejadian <b>' + this.x + '</b> yaitu <b>' + Highcharts.numberFormat(this.y,0) + '</b>, dalam '+ this.series.name;
         }
       },
       series: [{
        name: 'Report Data',
        data: <?php echo json_encode($value);?>,
        shadow : false,
        dataLabels: {
          enabled: true,
          color: '#FF0000',
          align: 'center',
          formatter: function() {
           return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
                }
              }
            }]
          });
      });
    </script>
    <script type="text/javascript">
      $(function () {
        $('#korban').highcharts({
          chart: {
            type: 'column',
            margin: 75,
            options3d: {
              enabled: false,
              alpha: 10,
              beta: 25,
              depth: 70
            }
          },
          title: {
            text: 'Grafik Korban Bencana',
            style: {
              fontSize: '18px',
              fontFamily: 'Verdana, sans-serif'
            }
          },
          subtitle: {
           text: '<?php echo $dateFromTo; ?>',
           style: {
            fontSize: '15px',
            fontFamily: 'Verdana, sans-serif'
          }
        },
        plotOptions: {
          column: {
            depth: 25
          }
        },
        credits: {
          enabled: false
        },
        xAxis: {
          categories:  <?php echo json_encode($korban);?>
        },
        exporting: { 
          enabled: true 
        },
        yAxis: {
          title: {
            text: 'Jumlah'
          },
        },
        tooltip: {
         formatter: function() {
           return 'Jumlah korban <b>' + this.x + '</b> yaitu <b>' + Highcharts.numberFormat(this.y,0) + '</b>, dalam '+ this.series.name;
         }
       },
       series: [{
        name: 'Report Data',
        data: <?php echo json_encode($value_korban);?>,
        shadow : false,
        dataLabels: {
          enabled: true,
          color: '#045396',
          align: 'center',
          formatter: function() {
           return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
                }
              }
            }]
          });
      });

      // COnvert to PDF
      var doc = new jsPDF({
        orientation: 'l',
        format: 'a4'
      });
      // We'll make our own renderer to skip this editor

      // All units are in the set measurement for the document
      // This can be changed to "pt" (points), "mm" (Default), "cm", "in"
      $("#btn-pdf").click(function(){
        doc.fromHTML($('.content-wrapper').get(0), 15, 15, {
          'width': 170, 
        });
        doc.save("Grafik Bencana");
      });
    </script>        
  <?php } ?>
  </body>
</html>
