<?php
include "session.php";
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="sistem informasi kejadian bencana (sikeb)">
    <meta name="author" content="sinaugis">
    <link rel="icon" href="pic/ghost.png">
	<script type="text/javascript" src="calendarDateInput.js"></script>

    <title>Form Input Tanah Longsor</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Bootstrap theme -->
    <link href="dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
	
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
			  <a class="navbar-brand" href="home.php" title="Kembali ke halaman depan"><i class="fa fa-home" aria-hidden="true"></i></a>
			  <a class="navbar-brand">|</a>
			  <a class="navbar-brand">Form Input Tanah Longsor</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-right">
			  <ul class="nav navbar-nav">
				<li><a href="datalongsor.php" data-toggle="collapse" data-target=".navbar-collapse.in" id="lihatdata-btn"><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Lihat Data</a></li>
                <!--li class="active"><a href="#">Home</a></li-->
                <!--li><a href="#about">About</a></li-->
				<li><a href="logout.php" data-toggle="collapse" data-target=".navbar-collapse.in" id="logout-btn"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
              </ul>
            </div>
          </div>
		  <div style="background-color:orange;" align="center">
			<font size="2">Anda login sebagai </font><font size="2" color="black" style="text-transform: uppercase;"><strong><?php echo $_SESSION['userid']; ?></strong></font>
			</div>
        </nav>
    </div>
	
	<!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
	
<div class="container marketing">
 <form name="forminput" action="forminputlongsor.php" method="POST">
  <div class="row">
   <div class="col-lg-6">
   <div class="form-group">
	<label for="disaster">Bencana</label>
	<input type="text" name="bencana" id="disaster" class="form-control" value="Tanah Longsor" />
   </div>
   <div class="form-group">
    <label for="date">Tanggal</label>
	<script>DateInput('tanggal', true)</script>
   </div>
   <div class="form-group">
	<label for="time">Jam</label>
	<input type="text" name="jam" id="jam" class="form-control" placeholder="HH:MM:SS"/>
   </div>
   <div class="form-group">
	<label for="lng">Bujur (X)</label>
	<input type="text" name="bujur" id="lng" class="form-control" />
   </div>
   <div class="form-group">
	<label for="lat">Lintang (Y)</label>
	<input type="text" name="lintang" id="lat" class="form-control" />
   </div>
   <div class="form-group">
	<label for="place">Lokasi</label>
	<textarea name="lokasi" id="place" rows="3" class="form-control" placeholder="Lokasi kejadian"></textarea>
   </div>
   <div class="form-group">
	<label for="village">Desa</label>
	<input type="text" name="desa" id="village" class="form-control" placeholder="Nama Desa"></textarea>
   </div>
   <div class="form-group">
	<label for="district">Kecamatan</label>
	<input type="text" name="kecamatan" id="district" class="form-control" placeholder="Nama Kecamatan"></textarea>
   </div>
   <div class="form-group">
	<label for="victim">Korban</label>
	<textarea name="korban" id="victim" class="form-control" placeholder="Jumlah Korban"></textarea>
   </div>
   <div class="form-group">
	<label for="damage">Kerugian</label>
	<textarea name="kerugian" id="damage" class="form-control" placeholder="Dampak"></textarea>
   </div>
   <div class="form-group">
	<label for="information">Keterangan</label>
	<textarea name="keterangan" id="information" rows="4" class="form-control" placeholder="Keterangan"></textarea>
   </div>
   <div class="form-group">
	<label for="photo">Foto</label>
	<input type="text" name="foto" id="photo" class="form-control" placeholder="Foto kejadian">
   </div>
   <div class="form-group">
   <form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="fileToUpload">Upload Foto</label>
    <input type="file" name="fileToUpload" id="fileToUpload" disabled>
    <input type="submit" value="Upload Image" name="submit" disabled>
	<p class="help-block">Upload file foto berupa JPG, JPEG, PNG, GIF.</p>
   </form>
   </div>
   <div class="form-group">
	<label for="infosource">Sumber Informasi</label>
	<textarea name="sumber_informasi" id="infosource" rows="4" class="form-control" placeholder="Sumber informasi"></textarea>
   </div>
	<!-- Button -->
   <div class="form-group" align="right">
    <input type="button" class="btn btn-primary" value="Cancel" onClick="window.location='datalongsor.php'"/>
	<input type="button" class="btn btn-primary" name="button" id="button" value="Simpan" onclick="javascript:submit()" onkeypress="if (event.keyCode == 13){return false;}" /><input type="hidden" name="save" id="savedata" value="simpandata"/>
   </div>
   </div>
   <div class="col-lg-6">
	<?php
		include "findcoordinate.php";
	?>
   </div>
  </div>
 </form>
</div>
</body>
<?php
$save_data=$_POST['save'];
if($save_data=="simpandata"){
include_once "dbconnect.php";
dbconnect();
$bencana=$_POST['bencana'];
$tanggal=$_POST['tanggal'];
$jam=$_POST['jam'];
$bujur=$_POST['bujur'];
$lintang=$_POST['lintang'];
$lokasi=htmlentities($_POST['lokasi']);
$desa=$_POST['desa'];
$kecamatan=$_POST['kecamatan'];
$korban=htmlentities($_POST['korban']);
$kerugian=htmlentities($_POST['kerugian']);
$keterangan=htmlentities($_POST['keterangan']);
$foto=$_POST['foto'];
$info=$_POST['sumber_informasi'];
$user=$_SESSION['userid'];
$sql="INSERT INTO b_longsor (x,y,lokasi,desa,kecamatan,tanggal,jam,korban,kerugian,keterangan,foto,bencana,sumber_info,user_input,input_date,user_update,update_date) VALUES('$bujur','$lintang','$lokasi','$desa','$kecamatan','$tanggal','$jam','$korban','$kerugian','$keterangan','$foto','$bencana','$info','$user',NOW(),'$user',NOW())";
$eksekusi_query=mysql_query($sql);
#$eksekusi_query = $conn->query($sql);
if(!$eksekusi_query){
	die("Query salah karena ".mysql_error());
}
}
?>
</html>
