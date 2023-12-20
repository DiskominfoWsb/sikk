<?php
header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=Surat-Perintah-Kaji-Cepat.doc");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?> </title>
</head>
<body>
	<?php foreach ($bencana as $ben) {?>
		<style type="text/css">
		h1 { margin-top: 0in; margin-bottom: 0in; direction: ltr; line-height: 100%; text-align: center; }
		h1.western { font-family: "Arial",serif; font-size: 12pt; }
		h1.cjk { font-family: "Times New Roman"; font-size: 12pt; }
		h1.ctl { font-family: "Arial"; font-size: 12pt; }
		p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; text-align: left; }
	</style>
	<table style="page-break-before: always" width="639" cellspacing="1" cellpadding="7">
		<tbody>
			<tr valign="top">
				<td style="border-top: none; border-bottom: 4.50pt double #00000a; border-left: none; border-right: none; padding: 0in" width="88">
					<img width="80" height="100" style="width:60px;height:75px;" src='<?php echo base_url('assets/');?>/logo-pemerintah-big.png'/>
				</td>
				<td style="text-align:center; border-top: none; border-bottom: 4.50pt double #00000a; border-left: none; border-right: none; padding: 0in" width="520">
					<h1 style="font-size: 14pt;">
						PEMERINTAH KABUPATEN WONOSOBO <br />
						BADAN PENANGGULANGAN BENCANA DAERAH
					</h1>
					<p style="text-align:center;">Jalan Jendral Soeharto no 7, Kalierang, Selomerto<br />
					Kabupaten Wonosobo, Jawa Tengah</p>
				</td>
			</tr>
		</tbody>
	</table>
	<p style="margin-top: 0.08in; margin-bottom: 0.08in; line-height: 100%" align="center">
		<font face="Arial, serif">
			<font style="font-size: 12pt" size="3">
				<span lang="fi-FI">
					<u><b>SURAT PERINTAH TUGAS</b></u>
				</span>
			</font>
		</font>
	</p>
	<p style="margin-bottom: 0.08in; line-height: 100%" align="center">
		<font face="Arial, serif">
			<font style="font-size: 12pt" size="3">
				<span lang="fi-FI">No: <?php echo $no_surat;?></span>
			</font>
		</font>
	</p>
	<br />
	<table width="639" cellspacing="0" cellpadding="7">
		<colgroup><col width="75">
			<col width="5">
			<col width="516">
		</colgroup>
		<tbody>
			<tr valign="top">
				<td style="border: none; padding: 0in" width="75" valign="top">
					<p align="justify">
						<font face="Arial, serif">
							<font style="font-size: 12pt" size="3">Dasar</font>
						</font>
					</p>
				</td>
				<td style="border: none; padding: 0in" width="5">
					<p align="justify">
						<font face="Arial, serif">
							<font style="font-size: 12pt" size="3">:</font>
						</font>
					</p>
				</td>
				<td style="border: none; padding: 0in" width="516">
					<ol>
						<li>
							Keputusan
							Menteri Keuangan Nomor 7/KMK.2/2003 tentang Perjalanan Dinas
							Dalam Negeri bagi Pejabat Negara, Pegawai Negeri Sipil dan
							Pegawai Tidak Tetap;
						</li>
						<li>
							Peraturan
							Bupati Wonosobo Nomor ?? Tahun ???? tanggal ???? tentang
							Penandatanganan dan Penomoran Surat Perintah Perjalanan Dinas
							(SPPD) di Lingkungan Pemerintah Kabupaten Wonosobo;
						</li>
						<li>
							Melaksanakan tupoksi Badan Penanggulangan Bencana Daerah Kab. Wonosobo;
						</li>
					</ol>
				</td>
			</tr>
		</tbody>
	</table>
	<p style="margin-left: 1.37in; text-indent: -1.37in; margin-top: 0.17in; margin-bottom: 0.14in; line-height: 115%" align="center">
		<font face="Arial, serif">
			<font style="font-size: 12pt" size="3">
				<span lang="pt-BR">
					MEMERINTAHKAN:
				</span>
			</font>
		</font>
	</p>
	<p style="margin-bottom: 0.14in; line-height: 115%" align="justify">
		<font face="Arial, serif">
			<font style="font-size: 12pt" size="3">KEPADA	:</font>
		</font>
	</p>
	<dl>
		<dl>
			<dl>
				<dd>
					<table width="529" cellspacing="0" cellpadding="7">
						<colgroup>
							<col width="14">
							<col width="109">
							<col width="5">
							<col width="345">
						</colgroup>
						<tbody>

							<?php
							$no_petugas = 1;

							foreach ($petugas as $ptg) {


								?>

								<tr valign="top">
									<td style="border: none; padding: 0in" width="14" height="1">
										<p align="justify">
											<font face="Arial, serif">
												<font style="font-size: 12pt" size="3">
													<?php echo $no_petugas++;?>.
												</font>
											</font>
										</p>
									</td>
									<td style="border: none; padding: 0in" width="109">
										<p align="justify">
											<font face="Arial, serif">
												<font style="font-size: 12pt" size="3">Nama</font>
											</font>
										</p>
									</td>
									<td style="border: none; padding: 0in" width="5">
										<p align="justify">
											<font face="Arial, serif">
												<font style="font-size: 12pt" size="3">:</font>
											</font>
										</p>
									</td>
									<td style="border: none; padding: 0in" width="109">
										<p align="justify">
											<font face="Arial, serif">
												<font style="font-size: 12pt" size="3">
													<?=$ptg->petugasNama?>
												</font>
											</font>
										</p>
									</td>
								</tr>
								<tr valign="top">
									<td style="border: none; padding: 0in" width="14" height="1">
										<p lang="id-ID" align="justify"><br>

										</p>
									</td>
									<td style="border: none; padding: 0in" width="109">
										<p style="margin-right: -0.38in" align="justify">
											<font face="Arial, serif">
												<font style="font-size: 12pt" size="3">NIP</font>
											</font>
										</p>
									</td>
									<td style="border: none; padding: 0in" width="5">
										<p align="justify"><font face="Arial, serif"><font style="font-size: 12pt" size="3">:
										</font>
									</font>

								</p>
							</td>
							<td style="border: none; padding: 0in" width="109">
								<p align="justify">
									<font face="Arial, serif">
										<font style="font-size: 12pt" size="3"><?=$ptg->petugasNip?></font>
									</font>
								</p>
							</td>
						</tr>
						<tr valign="top">
							<td style="border: none; padding: 0in" width="14" height="1">
								<p lang="id-ID" align="justify"><br /></p>
							</td>
							<td style="border: none; padding: 0in" width="109">
								<p align="justify">
									<font face="Arial, serif">
										<font style="font-size: 12pt" size="3">Pangkat/Gol</font>
									</font>
								</p>
							</td>
							<td style="border: none; padding: 0in" width="5">
								<p align="justify">
									<font face="Arial, serif">
										<font style="font-size: 12pt" size="3">:
										</font>
									</font>
								</p>
							</td>
							<td style="border: none; padding: 0in" width="109">
								<p align="justify">
									<font face="Arial, serif">
										<font style="font-size: 12pt" size="3">
											<?=$ptg->petugasPangkat?>/<?=$ptg->petugasGolongan?>

										</font>
									</font>
								</p>
							</td>
						</tr>
						<tr valign="top">
							<td style="border: none; padding: 0in" width="14" height="1">
								<p lang="id-ID" align="justify"><br>

								</p>
							</td>
							<td style="border: none; padding: 0in" width="109">
								<p align="justify">
									<font face="Arial, serif">
										<font style="font-size: 12pt" size="3">Jabatan</font>
									</font>
								</p>
							</td>
							<td style="border: none; padding: 0in" width="5">
								<p align="justify">
									<font face="Arial, serif">
										<font style="font-size: 12pt" size="3">:</font>
									</font>

								</p>
							</td>
							<td style="border: none; padding: 0in" width="109">
								<p align="justify">
									<font face="Arial, serif">
										<font style="font-size: 12pt" size="3"><?=$ptg->petugasJabatan?></font>
									</font>
								</p>
							</td>
						</tr>

					<?php } ?>
				</tbody>
			</table>
		</dd>
	</dl>
</dl>
</dl>
<p style="margin-bottom: 0.08in; line-height: 115%" align="justify">
	<br>
	<br>

</p>
<p style="margin-bottom: 0.14in; line-height: 115%" align="justify">
	<font face="Arial, serif">
		<font style="font-size: 12pt" size="3">UNTUK	:</font>
	</font>
</p>
<dl>
	<dl>
		<dl>
			<dd>
				<table width="529" cellspacing="0" cellpadding="7">
					<colgroup>
						<col width="14">
						<col width="487">
					</colgroup>
					<tbody>
						<tr valign="top">
							<td style="border: none; padding: 0in" width="14">
								<p align="justify">
									<font face="Arial, serif">
										<font style="font-size: 12pt" size="3">1.</font>
									</font>
								</p>
							</td>

							<td style="border: none; padding: 0in" width="487">
								<p align="justify">
									<font face="Arial, serif">
										<font style="font-size: 12pt" size="3">
											Melaksanakan kaji cepat penanganan bencana <?=$ben->jenisbencanaNama?> ke Dusun <?=$ben->dusunNama?>, Desa <?=$ben->desaNama?>, Kecamatan <?=$ben->kecamatanNama?>,  pada hari <?=$ben->bencanaHari?> tanggal <?php echo date('d', strtotime($ben->bencanaTgl));?> <?php echo $bulan[date('n', strtotime($ben->bencanaTgl))];?> <?php echo date('Y', strtotime($ben->bencanaTgl));?>.
										</font>
									</font>
								</p>
							</td>
						</tr>
						<tr valign="top">
							<td style="border: none; padding: 0in" width="14">
								<p align="justify">
									<font face="Arial, serif">
										<font style="font-size: 12pt" size="3">2.</font>
									</font>
								</p>
							</td>
							<td style="border: none; padding: 0in" width="487">
								<p align="justify">
									<font face="Arial, serif">
										<font style="font-size: 12pt" size="3">
											<span lang="it-IT">
												Melaporkan hasil  pelaksanaan  tugas  kepada  Pejabat Pemberi Tugas.
											</span>
										</font>
									</font>
								</p>
							</td>
						</tr>
						<tr valign="top">
							<td style="border: none; padding: 0in" width="14">
								<p align="justify">
									<font face="Arial, serif">
										<font style="font-size: 12pt" size="3">3.</font>
									</font>
								</p>
							</td>
							<td style="border: none; padding: 0in" width="487">
								<p align="justify">
									<font face="Arial, serif">
										<font style="font-size: 12pt" size="3">
											<span lang="it-IT">
												Melaksanakan perintah ini dengan baik dan penuh rasa tanggungjawab.
											</span>
										</font>
									</font>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</dd>
		</dl>
	</dl>
</dl>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%" lang="it-IT">
	<br>

</p>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%" lang="it-IT">
	<br>

</p>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%">
	<font face="Arial, serif">
		<font style="font-size: 12pt" size="3">
			<span lang="it-IT">Dikeluarkan
				di Kabupaten Wonosobo
			</span>
		</font>
	</font>
</p>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%" align="justify">
	<font face="Arial, serif">
		<font style="font-size: 12pt" size="3">
			<span lang="it-IT">Pada tanggal  <?php echo date('d', strtotime($tgl));?>, <?php echo $bulan[date('n', strtotime($tgl))];?> <?php echo date('Y', strtotime($tgl));?></span>
		</font>
	</font>
</p>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%" lang="nl-NL" align="center">
	<br>

</p>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%" align="center">
	<font face="Arial, serif">
		<font style="font-size: 12pt" size="3">
			<span lang="nl-NL">KEPALA PELAKSANA</span>
		</font>
	</font>
</p>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%" align="center">
	<font face="Arial, serif">
		<font style="font-size: 12pt" size="3">
			<span lang="nl-NL">BADAN PENANGGULANGAN BENCANA DAERAH</span>
		</font>
	</font>
</p>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%" lang="nl-NL" align="center">
	<br>

</p>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%" lang="nl-NL" align="center">
	<br>

</p>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%" lang="nl-NL" align="center">
	<br>

</p>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%" lang="nl-NL" align="center">
	<br>

</p>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%" align="center">
	<font face="Arial, serif">
		<font style="font-size: 12pt" size="3">
			<u><b>______________________</b></u>
		</font>
	</font>
</p>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%" align="center">
	<font face="Arial, serif">
		<font style="font-size: 12pt" size="3"></font>
	</font>
</p>
<p style="margin-left: 3.64in; margin-bottom: 0in; line-height: 100%" align="center">
	<font face="Arial, serif">
		<font style="font-size: 12pt" size="3">NIP </font>
	</font>
</p>


<?php } ?>
</body>
</html>