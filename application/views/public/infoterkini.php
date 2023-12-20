<!DOCTYPE html>
<html>
<head>
	<title>Info hari ini</title>
	<style>
		td {
			vertical-align: top;
		}
	</style>
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<button onclick="copyToClipboard('#infoTerkini')">Copy text</button>
	<div class="data-table-wrapper" id="infoTerkini">
	<?php
		$myData = file_get_contents(base_url('source_bencana/hariini'));
		$myObject = json_decode($myData);
	?>
	<h3>Kejadian Terkini</h3>
	---------------------
	<br>
	<?PHP
		foreach($myObject->features as $key=>$item){
	?>
	<b><?PHP echo $item->properties->nama_bencana; ?></b>
   <table class="data-table">
		<!-- <tr>
			<td>Kejadian</td><td>:</td><td><?PHP echo $item->properties->nama_bencana; ?></td>
		</tr> -->
		<tr>
			<td>Hari</td><td>:</td><td><?PHP echo $item->properties->hari; ?></td>
		</tr>
		<tr>
			<td>Tanggal</td><td>:</td><td><?PHP echo $item->properties->tgl; ?></td>
		</tr>
		<tr>
			<td>Waktu</td><td>:</td><td><?PHP echo $item->properties->waktu; ?></td>
		</tr>
		<tr>
			<td>Lokasi</td><td>:</td><td><?PHP echo $item->properties->dusun; ?>, <?PHP echo $item->properties->desa; ?>, <?PHP echo $item->properties->kecamatan; ?></td>
		</tr>
		<tr>
			<td>Koordinat</td><td>:</td><td><?PHP echo $item->geometry->coordinates[0]; ?>, <?PHP echo $item->geometry->coordinates[1]; ?></td>
		</tr>
		<tr>
			<td>Penyebab</td><td>:</td><td><?PHP echo $item->properties->penyebab; ?></td>
		</tr>
		<tr>
			<td>Kronologi</td><td>:</td><td><?PHP echo $item->properties->kronologi; ?></td>
		</tr>
		<tr>
			<td>Kendala</td><td>:</td><td><?PHP echo $item->properties->kendala; ?></td>
		</tr>
		<tr>
			<td>Korban</td><td>:</td>
			<td>
				<?PHP echo $item->properties->jml_korban->luka_ringan; ?><br>
				<?PHP echo $item->properties->jml_korban->luka_berat; ?><br>
				<?PHP echo $item->properties->jml_korban->meninggal_dunia; ?><br>
				<?PHP echo $item->properties->jml_korban->hilang; ?>
			</td>
		</tr>
		<tr>
			<td>Kerusakan</td><td>:</td>
			<td>
				<?PHP echo $item->properties->jml_rusak_jembatan; ?><br>
				<?PHP echo $item->properties->jml_rusak_jalan; ?><br>
				<?PHP echo $item->properties->jml_rusak_sawah; ?><br>
				<?PHP echo $item->properties->jml_rusak_kebun; ?><br>
				<?PHP echo $item->properties->jml_rusak_kolam; ?><br>
				<?PHP echo $item->properties->jml_rusak_irigasi; ?>
			</td>
		</tr>
		<tr>
			<td>Penanganan</td><td>:</td>
			<td>
				<?PHP echo $item->properties->penanganan->penanganan_judul; ?><br>
				<?PHP echo $item->properties->penanganan->penanganan_teks; ?><br>
				<?PHP echo $item->properties->penanganan->penanganan_instansi_lembaga; ?><br>
				<?PHP echo $item->properties->penanganan->penanganan_status; ?>
			</td>
		</tr>
   </table>
   ---------------------
   <br>
   <?PHP
		}
	?>
   <p>Info lengkap lihat di <a href="<?php echo base_url(); ?>"><?php echo base_url(); ?></a></p>
   </div>
  <script>
		function copyToClipboard(element) {
		  var $temp = $("<input>");
		  $("body").append($temp);
		  $temp.val($(element).text()).select();
		  document.execCommand("copy");
		  $temp.remove();
		}
	</script>
</body>
</html>