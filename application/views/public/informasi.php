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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/homepage/');?>/assets/css/app.css">

  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/homepage/');?>/assets/img/favicon-76.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/homepage/');?>/assets/img/favicon-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/homepage/');?>/assets/img/favicon-152.png">
  <link rel="icon" sizes="196x196" href="<?php echo base_url('assets/homepage/');?>/assets/img/favicon-196.png">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/homepage/');?>/assets/img/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <style>
  .content,
  .content-wrapper{
    height: auto;
    width:100%;
    overflow: hidden;
    font-family: 'Lato', sans-serif;
  }
  h1.title{
    margin-bottom: 24px;
    padding-bottom: 24px;
    border-bottom: 1px solid #ccc;
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
          <!-- a href="#" class="navbar-icon pull-right visible-xs" id="sidebar-toggle-btn"><i class="fa fa-search fa-lg white"></i></a-->
        </div>
        <a class="navbar-brand" href="<?php echo site_url(); ?>">Informasi Kebencanaan</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo site_url()?>" data-toggle="collapse" data-target=".navbar-collapse.in" id="home-btn"><i class="fa fa-map-o white"></i>&nbsp;&nbsp;Pantauan Bencana</a></li>
          <li class="dropdown">
              <a id="toolsDrop" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v white"></i>&nbsp;&nbsp;Data<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('chart')?>" data-toggle="collapse" data-target=".navbar-collapse.in" id="list-btn"><i class="fa fa-area-chart"></i>&nbsp;&nbsp;Grafik Bencana</a></li>
                <li><a href="<?php echo site_url('TabelKejadian')?>" data-toggle="collapse" data-target=".navbar-collapse.in" id="tabelkejadian-btn"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Data Bencana</a></li>
                <li><a href="<?php echo base_url('sisterVillage')?>" target="_blank" data-toggle="collapse" data-target=".navbar-collapse.in" id="viewdata-btn"><i class="fa fa-map-o"></i>&nbsp;&nbsp;Jalur Evakuasi</a></li>
              </ul>
            </li>
          <li><a href="<?php echo base_url('auth/login')?>" target="_blank"><i class="fa fa-lock" data-target=".navbar-collapse.in" id="login-btn"></i>&nbsp;&nbsp;Login</a></li> 
          <!-- <li><a href="#" data-toggle="collapse" data-target=".navbar-collapse.in" id="about-btn"><i class="fa fa-info"></i></a></li>            -->
        </ul>
      </div><!--/.navbar-collapse -->
    </div>
  </div>

  <div id="container" class="container">
    <div class="content-wrapper">
      <div class="content">
        <div class="col-md-12">
          <h1 class="title"><?php echo $informasi[0]->judul; ?></h1>
          <?php echo nl2br($informasi[0]->content); ?>
        </div>
      </div>
    </div>    
  </div>

  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js" integrity="sha384-CchuzHs077vGtfhGYl9Qtc7Vx64rXBXdIAZIPbItbNyWIRTdG0oYAqki3Ry13Yzu" crossorigin="anonymous"></script>
  <script src="<?php echo base_url('assets/homepage/');?>/assets/js/button.js"></script>
  <script type="text/javascript">
    $(function () {
      $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
      });
    });
  </script>
</body>
</html>
