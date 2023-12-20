<?php
// header("Content-Type: application/vnd.ms-word");
// header("Expires: 0");
// header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
// header("Content-disposition: attachment; filename=Laporan-Pengerahan-Relawan.doc");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?> </title>
</head>
<body>
<?php 
      $bulan = array ( 1 =>    'Januari',
                      'Februari',
                      'Maret',
                      'April',
                      'Mei',
                      'Juni',
                      'Juli',
                      'Agustus',
                      'September',
                      'Oktober',
                      'November',
                      'Desember'
                    );

?>

<?php foreach ($bencana as $ben) {?>
	


	
	
	
	<style type="text/css">p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; text-align: left; }</style>


<p style="margin-bottom: 0.14in; line-height: 150%" align="center"><font face="Arial, sans-serif"><span lang="id-ID"><b>LAPORAN
</b></span><b>PENGERAHAN RELAWAN</b><span lang="id-ID"><b> </b></span></font>
</p>
<p style="margin-bottom: 0.14in; line-height: 150%" align="center"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><b>BPBD
KAB</b></span></font><font style="font-size: 11pt" size="2"><b>UPATEN
MAGELANG</b></font></font></p>

<hr>

                         
</p>
<br><ol><li><p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><b>Kejadian
	Bencana</b></span></font></font></p>
</li></ol>
<ol type="a"><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">Jenis
	Bencana		:
	<?=$ben->jenisbencanaNama;?></span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
	</li><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">Tanggal
	Kejadian	:
	<?php echo date('d', strtotime($ben->bencanaTgl));?> <?php echo $bulan[date('n', strtotime($ben->bencanaTgl))];?> <?php echo date('Y', strtotime($ben->bencanaTgl));?></span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
	</li><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">	Waktu
	Kejadian	:
	<?=$ben->bencanaWaktu;?></span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
	</li><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">	Lokasi
	Kejadian	:
	<?=$ben->dusunNama?>, <?=$ben->desaNama?>, <?=$ben->kecamatanNama?></span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
	</li><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">Penyebab
	Bencana	:
	<?=$ben->bencanaPenyebab;?></span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
</li></ol>
<p style="margin-left: 0.25in; margin-bottom: 0.14in; line-height: 115%">
<font face="Arial, sans-serif"><font style="font-size: 11pt" size="2">				
 </font></font>
</p>
<ol start="2"><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><b>Dampak
	Bencana </b></span></font></font>
	</p>
</li></ol>
<ol type="a"><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">Korban 
	Jiwa		: </span></font><font style="font-size: 11pt" size="2"><span lang="id-ID"><?php echo $jml_md['0']['jml'];?> </span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font><font style="font-size: 11pt" size="2">
	</font><font style="font-size: 11pt" size="2"><span lang="id-ID">(MD),
	…...<?php echo $jml_lb['0']['jml'];?></span></font><font style="font-size: 11pt" size="2"> </font><font style="font-size: 11pt" size="2"><span lang="id-ID">(LB),
	</span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"><?php echo $jml_lr['0']['jml'];?></span></font><font style="font-size: 11pt" size="2">
	</font><font style="font-size: 11pt" size="2"><span lang="id-ID">(LR),
	</span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"><?php echo $jml_hl['0']['jml'];?></span></font><font style="font-size: 11pt" size="2">
	</font><font style="font-size: 11pt" size="2"><span lang="id-ID">(Hilang)</span></font></font></p>
	</li><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2">Kerusakan</font><font style="font-size: 11pt" size="2"><span lang="id-ID">		:
	</span></font><font style="font-size: 11pt" size="2"><span lang="id-ID">
		<?php foreach ($kerusakan as $rsk) {?>
		<br> - 
		Kerusakan <?=$rsk->kerusakan_propertiNama?> (<?=$rsk->kerusakan_tingkat_rusakNama?>) milik <?=$rsk->kerusakanNamaPemilik?> yang berlokasi di <?=$rsk->dusunNama?>, <?=$rsk->desaNama?>, <?=$rsk->kecamatanNama?>
		<?php } ?>

	</span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
	</li><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">Pengungsi		:
	</span></font><font style="font-size: 11pt" size="2"><span lang="id-ID">
		<?php foreach ($pengungsi as $ungsi) {?>
		<br> - 
		<?=$ungsi->pengungsiNama?> (<?=$ungsi->pengungsiJk?>)(<?=$ungsi->pengungsiUsia?>), alamat <?=$ungsi->dusunNama?>, <?=$ungsi->desaNama?>, <?=$ungsi->kecamatanNama?>, mengungsi di <?=$ungsi->pengungsiLokasi?> 
		<?php } ?>		
	</span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
</li></ol>
<p style="margin-left: 0.5in; margin-bottom: 0.14in; line-height: 115%" lang="id-ID">
<br>
<br>

</p>
<ol start="3"><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><b>Pelaksanaan
	Pengerahan Relawan :</b></font></font></p>
</li></ol>
<ol type="a"><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2">Hari	</font><font style="font-size: 11pt" size="2"><span lang="id-ID">		:
	</span></font><font style="font-size: 11pt" size="2"><span lang="id-ID"><?php echo $hari;?></span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
	</li><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2">	Tanggal		</font><font style="font-size: 11pt" size="2"><span lang="id-ID">:
	</span></font><font style="font-size: 11pt" size="2"><span lang="id-ID"><?php echo date('d', strtotime($tgl));?> <?php echo $bulan[date('n', strtotime($tgl))];?> <?php echo date('Y', strtotime($tgl));?></span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
	</li><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2">Lokasi			</font><font style="font-size: 11pt" size="2"><span lang="id-ID">:
	</span></font><font style="font-size: 11pt" size="2"><span lang="id-ID"><?php echo $lokasi;?></span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
	</li><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2">Komunitas	</font><font style="font-size: 11pt" size="2"><span lang="id-ID">	:
	</span></font><font style="font-size: 11pt" size="2"><span lang="id-ID"><?php echo $komunitas;?></span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
	</li><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2">	Jumlah		</font><font style="font-size: 11pt" size="2"><span lang="id-ID">	:
	<?php echo $jumlah;?></span></font><font style="font-size: 11pt" size="2"></font><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
</li></ol>
<p style="margin-left: 0.5in; margin-bottom: 0.14in; line-height: 115%" lang="id-ID">
<br>
<br>

</p>
<ol start="4"><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><b>Laporan
	pengerahan relawan : </b> <?php echo $laporan;?></font></font></p>
</li></ol>
<p style="margin-left: 0.25in; margin-bottom: 0.14in; line-height: 115%" align="justify">
<font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font><font style="font-size: 11pt" size="2"></font></font></p>
<p style="margin-left: 0.25in; margin-bottom: 0.14in; line-height: 115%" align="justify">
<font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font><font style="font-size: 11pt" size="2"></font></font></p>
<p style="margin-left: 0.25in; margin-bottom: 0.14in; line-height: 115%" align="justify">
<font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font><font style="font-size: 11pt" size="2"></font></font></p>
<p style="margin-left: 0.25in; margin-bottom: 0.14in; line-height: 115%" align="justify">
<font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font><font style="font-size: 11pt" size="2"></font></font></p>
<p style="margin-left: 0.25in; margin-bottom: 0.14in; line-height: 115%" align="justify">
<font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font><font style="font-size: 11pt" size="2"></font></font></p>
<p style="margin-left: 0.25in; margin-bottom: 0.14in; line-height: 115%" align="justify">
<font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font><font style="font-size: 11pt" size="2"></font></font></p>
<p style="margin-left: 0.25in; margin-bottom: 0.14in; line-height: 115%" align="justify">
<font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font><font style="font-size: 11pt" size="2"></font></font></p>
<p style="margin-left: 0.25in; margin-bottom: 0.14in; line-height: 115%" align="justify">
<font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font><font style="font-size: 11pt" size="2"></font></font></p>
<p style="margin-bottom: 0.14in; line-height: 115%" align="justify"><br>
<br>

</p>
<p style="text-indent: 0.25in; margin-bottom: 0.14in; line-height: 115%" align="justify">
<br>
<br>

</p>
<ol start="5"><li>
<p style="margin-bottom: 0.14in; line-height: 115%"><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><b>Petugas
	</b></span></font><font style="font-size: 11pt" size="2"><b>:</b></font></font></p>
</li></ol>
<p style="margin-left: 0.25in; margin-bottom: 0.14in; line-height: 115%">
<br>
<br>

</p>
<table width="446" cellspacing="0" cellpadding="7">
	<colgroup><col width="14">
	<col width="301">
	<col width="90">
	</colgroup><tbody>
	<?php
	$no_ptg = 1;
	 foreach ($petugas as $ptg) {?>
	<tr>
		<td style="border: none; padding: 0in" width="14" height="9" bgcolor="#ffffff">
			<p><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><?php echo $no_ptg;?>.</font></font></p>
		</td>
		<td style="border: none; padding: 0in" width="301" bgcolor="#ffffff">
			<p><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2">Nama : <?=$ptg->petugasNama?></font></font></p>
		</td>
		<td rowspan="3" style="border: none; padding: 0in" width="90" valign="bottom" bgcolor="#ffffff">
			<p><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2"><?php echo $no_ptg;?>.
			…………</font></font></p>
		</td>
	</tr>
	<tr>
		<td style="border: none; padding: 0in" width="14" height="9" bgcolor="#ffffff">
			<p><br>

			</p>
		</td>
		<td style="border: none; padding: 0in" width="301" bgcolor="#ffffff">
			<p><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2">NIP : <?=$ptg->petugasNip?></font></font></p>
		</td>
	</tr>
	<tr>
		<td style="border: none; padding: 0in" width="14" height="9" bgcolor="#ffffff">
			<p><br>

			</p>
		</td>
		<td style="border: none; padding: 0in" width="301" bgcolor="#ffffff">
			<p><font face="Arial, sans-serif"><font style="font-size: 11pt" size="2">Jabatan : <?=$ptg->petugasJabatan?></font></font></p>
		</td>
	</tr>
	<?php 
		$no_ptg++;
	 } ?>
</tbody></table>
<p style="margin-left: 0.25in; margin-bottom: 0.14in; line-height: 115%">
<br>
<br>

</p>
<p style="margin-left: 0.25in; margin-bottom: 0.14in; line-height: 115%">
<br>
<br>

</p>
<p style="margin-left: 0.25in; margin-bottom: 0in; line-height: 100%" align="center">
<font face="Arial, sans-serif"><font face="Arial, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">Paraf/Ttd	</span></font></font><font face="Arial, serif"><font style="font-size: 11pt" size="2">Pengesahan	</font></font><font face="Arial, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">:
____________________</span></font></font></font></p>


<?php } ?>
</body>
</html>