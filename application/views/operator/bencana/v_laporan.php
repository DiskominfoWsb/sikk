<?php
 header("Content-Type: application/vnd.ms-word");
        header("Expires: 0");
        header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
        header("Content-disposition: attachment; filename=Laporan-Bulanan-Kejadian-Bencana.doc");
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
			$hari = array ( 1 =>    'Senin',
			                      'Selasa',
			                      'Rabu',
			                      'Kamis',
			                      'Jumat',
			                      'Sabtu',
			                      'Minggu'
			                    );
?>


	
	
	
	<style type="text/css">p { margin-bottom: 0.1in; direction: ltr; color: rgb(0, 0, 10); line-height: 120%; text-align: left; }p.western { font-family: "Calibri",serif; font-size: 11pt; }p.cjk { font-family: "Calibri"; font-size: 11pt; }p.ctl { font-size: 11pt; }</style>


<p class="western" style="margin-bottom: 0.14in; line-height: 115%" align="center">
<font face="Arial, serif"><font style="font-size: 12pt" size="3"><b>LAPORAN
BULANAN KEJADIAN BENCANA</b></font></font></p>

<table width="1076" cellspacing="0" cellpadding="7">
	<colgroup><col width="20">
	<col width="102">
	<col width="60">
	<col width="100">
	<col width="88">
	<col width="93">
	<col width="96">
	<col width="156">
	<col width="137">
	<col width="80">
	</colgroup><tbody><tr>
		<td rowspan="2" style="border: 1px solid #00000a; padding: 0in 0.08in" width="20" bgcolor="#ffffff">
			<p class="western" align="center"><font face="Arial, serif"><font style="font-size: 12pt" size="3">No</font></font></p>
		</td>
		<td rowspan="2" style="border: 1px solid #00000a; padding: 0in 0.08in" width="102" bgcolor="#ffffff">
			<p class="western" align="center"><font face="Arial, serif"><font style="font-size: 12pt" size="3">Jenis
			Kejadian</font></font></p>
		</td>
		<td rowspan="2" style="border: 1px solid #00000a; padding: 0in 0.08in" width="60" bgcolor="#ffffff">
			<p class="western" align="center"><font face="Arial, serif"><font style="font-size: 12pt" size="3">Hari</font></font></p>
		</td>
		<td rowspan="2" style="border: 1px solid #00000a; padding: 0in 0.08in" width="100" bgcolor="#ffffff">
			<p class="western" align="center"><font face="Arial, serif"><font style="font-size: 12pt" size="3">Tanggal</font></font></p>
		</td>
		<td colspan="3" style="border: 1px solid #00000a; padding: 0in 0.08in" width="305" bgcolor="#ffffff">
			<p class="western" align="center"><font face="Arial, serif"><font style="font-size: 12pt" size="3">Lokasi</font></font></p>
		</td>
		<td rowspan="2" style="border: 1px solid #00000a; padding: 0in 0.08in" width="156" bgcolor="#ffffff">
			<p class="western" align="center"><font face="Arial, serif"><font style="font-size: 12pt" size="3">Kronologi</font></font></p>
		</td>
		<td rowspan="2" style="border: 1px solid #00000a; padding: 0in 0.08in" width="137" bgcolor="#ffffff">
			<p class="western" align="center"><a name="_GoBack"></a><font face="Arial, serif"><font style="font-size: 12pt" size="3">Penanganan</font></font></p>
		</td>
		<td rowspan="2" style="border: 1px solid #00000a; padding: 0in 0.08in" width="80" bgcolor="#ffffff">
			<p class="western" align="center"><font face="Arial, serif"><font style="font-size: 12pt" size="3">Foto</font></font></p>
		</td>
	</tr>
	<tr>
		<td style="border: 1px solid #00000a; padding: 0in 0.08in" width="88" bgcolor="#ffffff">
			<p class="western" align="center"><font face="Arial, serif"><font style="font-size: 12pt" size="3">Kecamatan</font></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding: 0in 0.08in" width="93" bgcolor="#ffffff">
			<p class="western" align="center"><font face="Arial, serif"><font style="font-size: 12pt" size="3">Desa</font></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding: 0in 0.08in" width="96" bgcolor="#ffffff">
			<p class="western" align="center"><font face="Arial, serif"><font style="font-size: 12pt" size="3">Dusun</font></font></p>
		</td>
	</tr>
	<?php
	$no = 1;
	 foreach ($bencana as $ben) {?>
	<tr valign="top">
		<td style="border: 1px solid #00000a; padding: 0in 0.08in" width="20" bgcolor="#ffffff">
			<p class="western"><font face="Arial, serif"><font style="font-size: 12pt" size="3"><?php echo $no;?></font></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding: 0in 0.08in" width="102" bgcolor="#ffffff">
			<p class="western"><font face="Arial, serif"><font style="font-size: 12pt" size="3"><?=$ben->jenisbencanaNama;?></font></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding: 0in 0.08in" width="60" bgcolor="#ffffff">
			<p class="western"><font face="Arial, serif"><font style="font-size: 12pt" size="3"><?php echo $hari[date('N', strtotime($ben->bencanaTgl))] ?></font></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding: 0in 0.08in" width="100" bgcolor="#ffffff">
			<p class="western"><font face="Arial, serif"><font style="font-size: 12pt" size="3"><?php echo date('d', strtotime($ben->bencanaTgl));?> <?php echo $bulan[date('n', strtotime($ben->bencanaTgl))];?> <?php echo date('Y', strtotime($ben->bencanaTgl));?></font></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding: 0in 0.08in" width="88" bgcolor="#ffffff">
			<p class="western"><font face="Arial, serif"><font style="font-size: 12pt" size="3"><?=$ben->kecamatanNama;?></font></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding: 0in 0.08in" width="93" bgcolor="#ffffff">
			<p class="western"><font face="Arial, serif"><font style="font-size: 12pt" size="3"><?=$ben->desaNama;?></font></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding: 0in 0.08in" width="96" bgcolor="#ffffff">
			<p class="western"><font face="Arial, serif"><font style="font-size: 12pt" size="3"><?=$ben->dusunNama;?></font></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding: 0in 0.08in" width="156" bgcolor="#ffffff">
			<p class="western"><font face="Arial, serif"><font style="font-size: 12pt" size="3"><?=$ben->bencanaKronologi;?></font></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding: 0in 0.08in" width="137" bgcolor="#ffffff">
			<p class="western"><font face="Arial, serif"><font style="font-size: 12pt" size="3">
			<?php
			$penanganan = $this->m_penanganan->get_data($ben->idbencana);
			 foreach ($penanganan as $pen) {?>
			<br> - 
			<?=$pen->penangananJudul?> oleh <?=$pen->penangananInstaLem?>
			<?php } ?>				
			</font></font></p>
		</td>
		<td style="border: 1px solid #00000a; padding: 0in 0.08in" width="80" bgcolor="#ffffff">
			<p class="western"><font face="Arial, serif"><font style="font-size: 12pt" size="3">
			<?php
			$foto = $this->db->query('SELECT * FROM db_bpbd.foto_bencana where foto_bencanaIdBencana="'.$ben->idbencana.'" limit 1')->result_array();
			?><img src="<?php echo $foto[0]['foto_bencanaPath']?>" width="200px"></center>
			
		</td>
	</tr>
	<?php 
	$no++;
	} ?>
</tbody></table>
<p class="western" style="margin-bottom: 0in; line-height: 100%"><br>

</p>



</body>
</html>