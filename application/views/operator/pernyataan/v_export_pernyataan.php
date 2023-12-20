<?php
header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=Surat-Pernyataan-Bencana.doc");
?>
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

<?php foreach ($bencana as $ben) {?>
	<!DOCTYPE HTML>
	<html>
	<head>
		<style type="text/css">
		@page { size: 8.5in 13in; margin-left: 0.98in; margin-right: 0.98in; margin-top: 2.07in; margin-bottom: 0.39in }
		p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; text-align: left; orphans: 2; widows: 2 }
		p.western { font-size: 11pt }
		p.cjk { font-family: ; font-size: 11pt }
		p.ctl { font-family: ; font-size: 11pt }
	</style>
</head>
<body lang="en-US" dir="ltr">
	<center><img src="<?php echo base_url('assets/');?>/garuda.png" width="300px" height="300px"></center>
	<br>
	<p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
		<font face="Bookman Old Style, serif">
			<font size="4" style="font-size: 16pt">
				BUPATI WONOSOBO
			</font>
		</font>
	</p>
	<p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">
		<font face="Bookman Old Style, serif">
			<font size="4" style="font-size: 14pt">SURAT
			PERNYATAAN BENCANA</font>
		</font>
	</p>
	<p class="western" align="center" style="margin-bottom: 0in; line-height: 115%">

		<font color="#000000">
			<font face="Bookman Old Style, serif">
				<font size="4" style="font-size: 14pt">NOMOR : </font>
			</font>
		</font>

		<font color="#000000">
			<font face="Bookman Old Style, serif">
				<font size="4" style="font-size: 14pt"><span lang="id-ID"><?=$ben->bencanaNoSuratPernyataan?>/46/<?php echo date("Y"); ?></span></font>
			</font>
		</font>

	</p>
	<p class="western" style="margin-bottom: 0.08in; line-height: 115%">
		<font color="#000000">
			<font face="Bookman Old Style, serif">
				<font size="3" style="font-size: 12pt">Yang
				bertanda tangan dibawah ini:</font>
			</font>
		</font>
	</p>
	<table width="639" cellpadding="7" cellspacing="0">
		<col width="131">
		<col width="6">
		<col width="460">
		<tr valign="top">
			<td width="131" style="border: none; padding: 0in">
				<p class="western">
					<font color="#000000">
						<font face="Bookman Old Style, serif">
							<font size="3" style="font-size: 12pt">N a m a	</font>
						</font>
					</font>
				</p>
			</td>
			<td width="6" style="border: none; padding: 0in">
				<p class="western">
					<font color="#000000">
						<font face="Bookman Old Style, serif">
							<font size="3" style="font-size: 12pt">:</font>
						</font>
					</font>
				</p>
			</td>
			<td width="460" style="border: none; padding: 0in">
				<p class="western">
					<font color="#000000">
						<font face="Bookman Old Style, serif">
							<font size="3" style="font-size: 12pt">___________________</font>
						</font>
					</font>
				</p>
			</td>
		</tr>
		<tr valign="top">
			<td width="131" style="border: none; padding: 0in">
				<p class="western">
					<font color="#000000">
						<font face="Bookman Old Style, serif">
							<font size="3" style="font-size: 12pt">
								J a b a t a n
							</font>
						</font>
					</font>
				</p>
			</td>
			<td width="6" style="border: none; padding: 0in">
				<p class="western">
					<font color="#000000">
						<font face="Bookman Old Style, serif">
							<font size="3" style="font-size: 12pt">:</font>
						</font>
					</font>
				</p>
			</td>
			<td width="460" style="border: none; padding: 0in">
				<p class="western">
					<font color="#000000">
						<font face="Bookman Old Style, serif">
							<font size="3" style="font-size: 12pt">BUPATI
							WONOSOBO</font>
						</font>
					</font>
				</p>
			</td>
		</tr>
	</table>
	<p class="western" style="margin-bottom: 0in; line-height: 115%"><br/>

	</p>
	<table width="637" cellpadding="7" cellspacing="0">
		<col width="131">
		<col width="6">
		<col width="458">
		<tr valign="top">
			<td width="131" style="border: none; padding: 0in">
				<p class="western">
					<font color="#000000">
						<font face="Bookman Old Style, serif">
							<font size="3" style="font-size: 12pt">Dasar</font>
						</font>
					</font>
				</p>
			</td>
			<td width="6" style="border: none; padding: 0in">
				<p class="western">
					<font color="#000000">
						<font face="Bookman Old Style, serif">
							<font size="3" style="font-size: 12pt">:</font>
						</font>
					</font>
				</p>
			</td>
			<td width="458" style="border: none; padding: 0in">
				<ol>
					<li>
						Kajicepat yang dilaksanakan oleh BPBD Kabupaten Wonosobo pada hari <i> <?php echo $hari[date('N', strtotime($ben->bencanaTglKajiCepat))] ?> </i>	tanggal <i> <?php echo date('d', strtotime($ben->bencanaTglKajiCepat));?> <?php echo $bulan[date('n', strtotime($ben->bencanaTglKajiCepat))];?> <?php echo date('Y', strtotime($ben->bencanaTglKajiCepat));?> </i>
						di wilayah Kecamatan <i><?=$ben->kecamatanNama?></i>;
					</li>
					<li>
						Bahwa telah terjadi <i> <?=$ben->jenisbencanaNama;?> </i> di wilayah Kecamatan <i> <?=$ben->kecamatanNama;?> </i> Kabupaten Wonosobo pada hari <i> <?php echo $hari[date('N', strtotime($ben->bencanaTgl))] ?> </i> tanggal <i><?php echo date('d', strtotime($ben->bencanaTgl));?> <?php echo $bulan[date('n', strtotime($ben->bencanaTgl))];?> <?php echo date('Y', strtotime($ben->bencanaTgl));?> </i> pukul <i> <?=$ben->bencanaWaktu?> </i>
						WIB yang mengakibatkan kerusakan <i>
							<!-- kerusakan -->
							<?php foreach ($kerusakan as $rsk) {?>
								- <?=$rsk->kerusakan_propertiNama?> (<?=$rsk->kerusakan_tingkat_rusakNama?>) milik <?=$rsk->kerusakanNamaPemilik?> yang berlokasi di <?=$rsk->dusunNama?>, <?=$rsk->desaNama?>, <?=$rsk->kecamatanNama?>;
							<?php } ?>					
						</i> maka :</li>
					</ol>
				</td>
				</tr>
				<tr>
					<td colspan="3" width="623" valign="top" style="border: none; padding: 0in">
						<p>Pada hari ini, <?php echo $hari[date('N', strtotime($ben->bencanaTglPernyataan))] ?>, tanggal <?php echo date('d', strtotime($ben->bencanaTglPernyataan));?> <?php echo $bulan[date('n', strtotime($ben->bencanaTglPernyataan))];?> <?php echo date('Y', strtotime($ben->bencanaTglPernyataan));?>, saya Bupati Wonosobo Provinsi Jawa Tengah menetapkan:</p>
						<p>Kejadian
							bencana <i><?=$ben->jenisbencanaNama;?> </i> di wilayah Kecamatan <i><?=$ben->kecamatanNama;?> </i>
						Kabupaten Wonosobo.</p>
						<p>
							Kepada
							semua pihak pemangku kepentingan agar mengerahkan semua potensi
							sumber daya yang ada dalam rangka penanganan kejadian bencana
							dimaksud.
						</p>
						<p>
							Demikian
							Surat Pernyataan ini dibuat untuk dipergunakan sebagaimana
							mestinya.
						</p>
					</td>
				</tr>
				<tr valign="top">
					<td width="131" style="border: none; padding: 0in">
						<p class="western"><br/>

						</p>
					</td>
					<td width="6" style="border: none; padding: 0in">
						<p class="western"><br/>

						</p>
					</td>
					<td width="458" style="border: none; padding: 0in">
						<p class="western"><br/>

						</p>
					</td>
				</tr>
			</table>
			<p class="western" style="margin-bottom: 0in; line-height: 115%"><br/>

			</p>
			<table width="638" cellpadding="7" cellspacing="0">
				<col width="305">
				<col width="305">
				<tr valign="top">
					<td width="305" style="border: none; padding: 0in">
						<p class="western"><br/>

						</p>
					</td>
					<td width="305" style="border: none; padding: 0in">
						<p class="western" align="center" style="margin-bottom: 0in">
							<font color="#000000">
								<font face="Bookman Old Style, serif">
									<font size="3" style="font-size: 12pt">Kabupaten Wonosobo, </font>
								</font>
							</font>

							<font color="#000000">
								<font face="Bookman Old Style, serif">
									<font size="3" style="font-size: 12pt"><i><?php echo date('d', strtotime($ben->bencanaTglPernyataan));?> <?php echo $bulan[date('n', strtotime($ben->bencanaTglPernyataan))];?> <?php echo date('Y', strtotime($ben->bencanaTglPernyataan));?></i></font>
								</font>
							</font>
						</p>
						<p class="western" align="center" style="margin-bottom: 0in"><br/>

						</p>
						<p class="western" align="center" style="margin-bottom: 0in">
							<font color="#000000">
								<font face="Bookman Old Style, serif">
									<font size="3" style="font-size: 12pt"><b>BUPATI
									WONOSOBO</b></font>
								</font>
							</font>
						</p>
						<p class="western" align="center" style="margin-bottom: 0in"><br/>

						</p>
						<p class="western" align="center" style="margin-bottom: 0in"><br/>

						</p>
						<p class="western" align="center" style="margin-bottom: 0in"><br/>

						</p>
						<p class="western" align="center">
							<font color="#000000">
								<font face="Bookman Old Style, serif">
									<font size="3" style="font-size: 12pt"><b>___________________</b></font>
								</font>
							</font>
						</p>
					</td>
				</tr>
			</table>
			<p class="western" style="margin-bottom: 0in; line-height: 115%"><br/>

			</p>
			<!-- <table border="0">
				<tr>
					<td style="border: 0;" width="100">
						<img width="80" height="100" style="width:60px;height:75px;" src='https://sikk.wonosobokab.go.id/assets/logo-wonosobo-big.png'/>
					</td>
					<td>
						<p style="text-align:center;">Jalan Jendral Soeharto no 7, Kalierang, Selomerto Wonosobo</p>
					</td>
				</tr>
			</table> -->
		<?php } ?>
	</body>
	</html>