<?php
header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=Laporan-Kaji-Cepat.doc");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?> </title>
</head>
<body>
	<?php foreach ($bencana as $ben) {?>
		<style type="text/css">
		p { 
			margin-bottom: 0.1in; 
			direction: ltr; 
			line-height: 120%; 
			text-align: left; 
		}
	</style>
	<p style="margin-bottom: 0.14in; line-height: 150%" align="center">
		<font face="Arial, sans-serif">
			<span lang="id-ID">
				<strong>LAPORAN KAJI CEPAT</strong>
			</span>
			<span lang="id-ID">
				<strong> </strong>
			</span>
		</font>

	</p>
	<p style="margin-bottom: 0.14in; line-height: 150%" align="center">
		<font face="Arial, sans-serif">
			<font style="font-size: 11pt" size="2">
				<span lang="id-ID">
					<strong>BPBD</strong>
				</span>
			</font>

			<font style="font-size: 11pt" size="2">
				<strong>KABUPATEN WONOSOBO</strong>
			</font>

		</font>

	</p>                     
	<br />
	<ol style="list-style-type: upper-alpha;">
		<li><strong>Kejadian Bencana</strong>
			<ol style="margin-left: 0.1in">
				<li>Jenis Bencana			: <?=$ben->jenisbencanaNama;?></li>
				<li>Tanggal Kejadian	: <?php echo date('d', strtotime($ben->bencanaTgl));?> <?php echo $bulan[date('n', strtotime($ben->bencanaTgl))];?> <?php echo date('Y', strtotime($ben->bencanaTgl));?></li>
				<li>Waktu Kejadian		: <?=$ben->bencanaWaktu;?></li>
				<li>Lokasi Kejadian		:
					<ol style="margin-left: 0.1in; list-style-type: lower-alpha;">
						<li>Dusun				: <?=$ben->dusunNama;?></li>
						<li>Desa				: <?=$ben->desaNama;?></li>
						<li>Kecamatan		: <?=$ben->kecamatanNama;?></li>
						<li>Koordinat		: <?=$ben->bencanaBt;?> BT <?=$ben->bencanaLs;?> LS</li>
					</ol>
				</li>
				<li>Penyebab Bencana	: <?=$ben->bencanaPenyebab;?></li>
				<li>Dampak Bencana	:
					<ol style="margin-left: 0.1in; list-style-type: lower-alpha;">
						<li>Korban MD		: <?php echo $jml_md['0']['jml'];?> jiwa</li>
						<li>Korban LB		: <?php echo $jml_lb['0']['jml'];?> jiwa</li>
						<li>Korban LR		: <?php echo $jml_lr['0']['jml'];?> jiwa</li>
						<li>Korban HL		: <?php echo $jml_hl['0']['jml'];?> jiwa</li>
					</ol>
				</li>
				<li>Kerusakan	:
					<ol style="margin-left: 0.1in; list-style-type: lower-alpha;">
						<?php foreach ($kerusakan as $rsk) {?>
							<li>Kerusakan <?=$rsk->kerusakan_propertiNama?> (<?=$rsk->kerusakan_tingkat_rusakNama?>) milik <?=$rsk->kerusakanNamaPemilik?> yang berlokasi di <?=$rsk->dusunNama?>, <?=$rsk->desaNama?>, <?=$rsk->kecamatanNama?></li> 
						<?php } ?>
					</ol>
				</li>
			</ol>
		</li>
		<br />
		<li><strong>Pengungsi</strong>
			<?php if(count($pengungsi) > 0 ){ ?>
				<ol style="margin-left: 0.2in">
					<?php foreach ($pengungsi as $ungsi) {?>
						<li><?=$ungsi->pengungsiNama?> (<?=$ungsi->pengungsiJk?>)(<?=$ungsi->pengungsiUsia?>), alamat <?=$ungsi->dusunNama?>, <?=$ungsi->desaNama?>, <?=$ungsi->kecamatanNama?>, mengungsi di <?=$ungsi->pengungsiLokasi?></li>
					<?php } ?>
				</ol>
			<?php } else {
				echo "<br /> - Tidak ada Pengungsi";
			} ?>
		</li>
		<br />
		<li><strong>Informasi Asal Instansi/Kel/Kec/Masyarakat</strong>
			<ol style="margin-left: 0.1in">
				<li>Pelapor		: <?=$ben->bencanaLaporNama;?></li>
				<li>Telepon		: <?=$ben->bencanaLaporTelp;?></li>
				<li>Instansi	: <?=$ben->bencanaLaporInstansi;?></li>
				<li>No. Surat	: <?=$ben->bencanaLaporNoSurat;?></li>
				<li>Tanggal Surat	: <?php echo date('d', strtotime($ben->bencanaLaporTglSurat));?> <?php echo $bulan[date('n', strtotime($ben->bencanaLaporTglSurat))];?> <?php echo date('Y', strtotime($ben->bencanaLaporTglSurat));?></li>
			</ol>
		</li>
		<br />
		<li><strong>Kronologis</strong><br />
			<?=$ben->bencanaKronologi?>
		</li>
		<br />
		<li><strong>Kegiatan/Assesment/Upaya Penanganan Darurat yang telah dilakukan</strong>
			<ol style="margin-left: 0.1in">
				<?php foreach ($penanganan as $pen) {?>
					<li><?=$pen->penangananJudul?> oleh <?=$pen->penangananInstaLem?></li>
				<?php } ?>	
			</ol>
		</li>
		<br />
		<li><strong>Kendala/Kebutuhan Mendesak/Potensi Bencana Susulan</strong><br />
			<?=$ben->bencanaKendala;?>
		</li>
		<br />
		<li><strong>Petugas</strong><br />
			<table width="446" cellspacing="0" cellpadding="7">
				<tbody>
					<?php
					$no_ptg = 1;
					foreach ($petugas as $ptg) {?>
						<tr>
							<td valign="top" rowspan="3">
								<?php echo $no_ptg;?>.
							</td>
							<td>
								Nama : <?=$ptg->petugasNama?>
							</td>
							<td rowspan="3">
								<?php echo $no_ptg;?>. …………
							</td>
						</tr>
						<tr>
							<td>NIP : <?=$ptg->petugasNip?></td>
						</tr>
						<tr>
							<td>Jabatan : <?=$ptg->petugasJabatan?></td>
						</tr>
						<?php 
						$no_ptg++;
					} ?>
				</tbody>
			</table>
		</li>
		<br />
		<li><strong>Pelaksanaan</strong><br />
			Hari : <?php echo $hari_pel;?><br />
			Tanggal : <?php echo date('d', strtotime($tgl));?> <?php echo $bulan[date('n', strtotime($tgl))];?> <?php echo date('Y', strtotime($tgl));?><br />
		</li>
	</ol>
	<br /><br /><br /><br /><br /><br />
	
	<p style="margin-left: 0.1in; margin-bottom: 0in; line-height: 100%" align="center">
		<font face="Arial, sans-serif">
			<font face="Arial, serif">
				<font style="font-size: 11pt" size="2">
					<span lang="id-ID">Paraf/Ttd	</span>
				</font>
			</font>
			<font face="Arial, serif">
				<font style="font-size: 11pt" size="2">Pengesahan	</font>
			</font>
			<font face="Arial, serif">
				<font style="font-size: 11pt" size="2">
					<span lang="id-ID">:
					____________________</span>
				</font>
			</font>
		</font>
	</p>


<?php } ?>
</body>
</html>