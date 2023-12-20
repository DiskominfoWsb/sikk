<?php
 header("Content-Type: application/vnd.ms-word");
        header("Expires: 0");
        header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
        header("Content-disposition: attachment; filename=Laporan-Penanganan-Darurat-Bencana.doc");
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

<?php foreach ($bencana as $ben) {?>


    
    
    
    <style type="text/css">p { margin-bottom: 0.1in; direction: ltr; line-height: 120%; text-align: left; }p.western { font-family: "Times New Roman",serif; font-size: 12pt; }p.cjk { font-family: "Batang"; font-size: 12pt; }p.ctl { font-size: 12pt; }a:link { color: rgb(0, 0, 255); }</style>


<p class="western" style="margin-bottom: 0in; line-height: 150%" align="center">
<font face="Trebuchet MS, serif"><span lang="id-ID"><b>LAPORAN
</b></span></font><font face="Trebuchet MS, serif"><b>PENANGANAN
DARURAT BENCANA</b></font><font face="Trebuchet MS, serif"><span lang="id-ID"><b>
</b></span></font>
</p>
<p class="western" style="margin-bottom: 0in; line-height: 150%" align="center">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><b>BPBD</b></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><b>KABUPATEN
WONOSOBO</b></font></font></p>
<p class="western" style="margin-bottom: 0in; line-height: 150%" align="center">
<hr><br>

                         
</p>
<ol type="I"><li>
<p class="western" style="margin-bottom: 0in; line-height: 100%">
    <font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><b>Kejadian
    Bencana</b></span></font></font></p>
</li></ol>
<ol type="a"><li>
<p style="margin-bottom: 0in; line-height: 100%"><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">Jenis
    Bencana     :
    <?=$ben->jenisbencanaNama;?></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
    </li><li>
<p style="margin-bottom: 0in; line-height: 100%"><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">Tanggal
    Kejadian    :
    <?php echo date('d', strtotime($ben->bencanaTgl));?> <?php echo $bulan[date('n', strtotime($ben->bencanaTgl))];?> <?php echo date('Y', strtotime($ben->bencanaTgl));?></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
    </li><li>
<p style="margin-bottom: 0in; line-height: 100%"><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">    Waktu
    Kejadian    :
    <?=$ben->bencanaWaktu;?></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
    </li><li>
<p style="margin-bottom: 0in; line-height: 100%"><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">    Lokasi
    Kejadian    :
    </span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
</li></ol>
<p style="margin-left: 0.49in; margin-bottom: 0in; line-height: 100%">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">Dusun           : <?=$ben->dusunNama;?> </font></font>
</p>
<p style="margin-left: 0.49in; margin-bottom: 0in; line-height: 100%">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">Desa            : <?=$ben->desaNama;?></font></font></p>
<p style="margin-left: 0.49in; margin-bottom: 0in; line-height: 100%">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">Kecamatan       : <?=$ben->kecamatanNama;?></font></font></p>
<p style="margin-left: 0.49in; margin-bottom: 0in; line-height: 100%">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">Koordinat       :
<?=$ben->bencanaBt;?> BT <?=$ben->bencanaLs;?> LS</font></font></p>
<ol start="5" type="a"><li>
<p style="margin-bottom: 0in; line-height: 100%"><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">Penyebab
    Bencana :
    <?=$ben->bencanaPenyebab;?></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
</li></ol>
<p class="western" style="margin-left: 0.25in; margin-bottom: 0in; line-height: 100%">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">                
 </font></font>
</p>
<ol start="2" type="I"><li>
<p class="western" style="margin-bottom: 0in; line-height: 100%">
    <font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><b>Dampak
    Bencana </b></span></font></font>
    </p>
</li></ol>
<ol type="a"><li>
<p class="western" style="margin-bottom: 0in; line-height: 100%">
    <font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">Korban
    Jiwa        : </span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><?php echo $jml_md['0']['jml'];?></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">
    </font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">(MD),
    …<?php echo $jml_lb['0']['jml'];?></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">
    </font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">(LB),
    </span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><?php echo $jml_lr['0']['jml'];?></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">
    </font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">(LR),
    </span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><?php echo $jml_hl['0']['jml'];?></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">
    </font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">(Hilang)</span></font></font></p>
    </li><li>
<p class="western" style="margin-bottom: 0in; line-height: 100%">
    <font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">Kerusakan</font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">      :
    </span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">
        <?php foreach ($kerusakan as $rsk) {?>
        <br> - 
        Kerusakan <?=$rsk->kerusakan_propertiNama?> (<?=$rsk->kerusakan_tingkat_rusakNama?>) milik <?=$rsk->kerusakanNamaPemilik?> yang berlokasi di <?=$rsk->dusunNama?>, <?=$rsk->desaNama?>, <?=$rsk->kecamatanNama?>
        <?php } ?>
    </span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
    </li><li>
<p class="western" style="margin-bottom: 0in; line-height: 100%">
    <font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">Pengungsi        :
    </span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">
        <?php foreach ($pengungsi as $ungsi) {?>
        <br> - 
        <?=$ungsi->pengungsiNama?> (<?=$ungsi->pengungsiJk?>)(<?=$ungsi->pengungsiUsia?>), alamat <?=$ungsi->dusunNama?>, <?=$ungsi->desaNama?>, <?=$ungsi->kecamatanNama?>, mengungsi di <?=$ungsi->pengungsiLokasi?> 
        <?php } ?>
    </span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
</li></ol>
<p class="western" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%" lang="id-ID">
<br>

</p>
<ol start="3" type="I"><li>
<p class="western" style="margin-bottom: 0in; line-height: 100%">
    <font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><b>Kronologi            :</b></font></font></p>
</li></ol>
<p class="western" style="margin-left: 0.25in; margin-bottom: 0in; line-height: 100%">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><?=$ben->bencanaKronologi?></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
<ol start="4" type="I"><li>
<p class="western" style="margin-bottom: 0in; line-height: 100%">
    <font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><b>Laporan Kaji Cepat            :</b></font> Hari: <?php echo $hari[date('N', strtotime($ben->bencanaTglKajiCepat))] ?> Tanggal: <?php echo date('d', strtotime($ben->bencanaTglKajiCepat));?> <?php echo $bulan[date('n', strtotime($ben->bencanaTglKajiCepat))];?> <?php echo date('Y', strtotime($ben->bencanaTglKajiCepat));?></font></p>
</li></ol>

<ol type="a"><li>
<p style="margin-bottom: 0in; line-height: 100%"><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">   </font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">Kegiatan/Assesment/Upaya
    Penanganan Darurat  : </span></font></font>
    </p>
</li></ol>
<p style="margin-left: 0.49in; margin-bottom: 0in; line-height: 100%">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">
    <?php foreach ($penanganan as $pen) {?>
        <br> - 
        <?=$pen->penangananJudul?> oleh <?=$pen->penangananInstaLem?>
        <?php } ?>
</span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
<ol start="2" type="a"><li>
<p style="margin-bottom: 0in; line-height: 100%"><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">Kendala/Kebutuhan
    Mendesak/Potensi Bencana Susulan</span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">       </font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID">:
    </span></font></font>
    </p>
</li></ol>
<p style="margin-left: 0.49in; margin-bottom: 0in; line-height: 100%">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><?=$ben->bencanaKendala;?></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"></span></font></font></p>
<p class="western" style="margin-left: 0.5in; margin-bottom: 0in; line-height: 100%" lang="id-ID">
<br>

</p>
<ol start="5" type="I"><li>
<p class="western" style="margin-bottom: 0in; line-height: 100%">
    <font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><b>Laporan Pengerahan Relawan :</b></font> Hari: <?php echo $hari[date('N', strtotime($ben->bencanaTglPengRelawan))] ?> Tanggal: <?php echo date('d', strtotime($ben->bencanaTglPengRelawan));?> <?php echo $bulan[date('n', strtotime($ben->bencanaTglPengRelawan))];?> <?php echo date('Y', strtotime($ben->bencanaTglPengRelawan));?></font></p>
</li></ol>
<p style="margin-left: 0.25in; margin-bottom: 0in; line-height: 100%" align="justify">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><?=$ben->bencanaLapPengRelawan?></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font></p>
<p style="margin-bottom: 0in; line-height: 100%" align="justify"><br>

</p>
<ol start="6" type="I"><li>
<p class="western" style="margin-bottom: 0in; line-height: 100%">
    <font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><b>Surat
    Pernyataan Bencana Bupati :</b></font></font></p>
</li></ol>
<p class="western" style="margin-left: 0.25in; margin-bottom: 0in; line-height: 100%">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">Nomor
: <?=$ben->bencanaNoSuratPernyataan?></font></font>
</p>
<p class="western" style="margin-left: 0.25in; margin-bottom: 0in; line-height: 100%">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">Tanggal
: <?php echo date('d', strtotime($ben->bencanaTglPernyataan));?> <?php echo $bulan[date('n', strtotime($ben->bencanaTglPernyataan))];?> <?php echo date('Y', strtotime($ben->bencanaTglPernyataan));?></font></font></p>
<p class="western" style="margin-left: 0.25in; margin-bottom: 0in; line-height: 100%">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">Masa
Darurat : <?=$ben->bencanaMasaDarurat?></font></font></p>
<p class="western" style="margin-left: 0.25in; margin-bottom: 0in; line-height: 100%">
<br>

</p>
<ol start="7" type="I"><li>
<p class="western" style="margin-bottom: 0in; line-height: 100%">
    <font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><b>Penanganan
    Darurat Yang Telah Dilaksanakan :</b></font></font></p>
</li></ol>
<p class="western" style="margin-left: 0.25in; margin-bottom: 0in; line-height: 100%">
<br>

</p>
<?php
$no_pen = 1;
 foreach ($penanganan as $pen) {?>
<ol type="I"><ol start="<?php echo $no_pen;?>" type="a"><li>

<p class="western" style="margin-bottom: 0in; line-height: 100%">
    <font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2">
<?php if ($pen->penangananOpd==1) {
  echo "OPD";
}else{
  echo "Lembaga/Komunitas";
}?> <?=$pen->penangananInstaLem;?>      
    </font></font></p>
    </li></ol></ol>
<p style="margin-left: 0.49in; margin-bottom: 0in; line-height: 100%">
<font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"><span lang="id-ID"><?=$pen->penangananJudul;?> : <?=$pen->penangananTeks;?></span></font></font><font face="Trebuchet MS, serif"><font style="font-size: 11pt" size="2"></font></font></p>
<p style="margin-left: 0.49in; margin-bottom: 0in; line-height: 100%">
<br>

</p>
<?php } ?>


<?php } ?>
</body>
</html>