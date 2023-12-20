<table class="table2excel" data-tableName="Test Table 2" border="1" cellpadding="5" cellspacing="0" style="border-collapse:collapse;">
  <thead>
  	<tr>
			<th colspan="7">
				<h3><?php echo $title; ?></h3>
			</th>
  	</tr>
    <tr>
      <th class="col-md-2">Bencana</th>
      <th class="col-md-2">Waktu</th>
      <th class="col-md-1">Dusun</th>
      <th class="col-md-1">Desa</th>
      <th class="col-md-1">Kecamatan</th>
      <th class="col-md-1">Penyebab</th>
      <th>Kronologi</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $month = array(
        1 => "Januari",
        2 => "Februari",
        3 => "Maret",
        4 => "April",
        5 => "Mei",
        6 => "Juni",
        7 => "Juli",
        8 => "Agustus",
        9 => "September",
        10 => "Oktober",
        11 => "November",
        12 => "Desember"
      );
      $no = 1;
      foreach($bencana as $b){
        echo "<tr>
          <td>".$b->jenisbencanaNama."</td>
          <td>".$b->bencanaHari."<br />".date("d ",strtotime($b->bencanaTgl)) . $month[date("n",strtotime($b->bencanaTgl))] . date(" Y",strtotime($b->bencanaTgl)) ."<br />".$b->bencanaWaktu."</td>
          <td>".$b->dusunNama."</td>
          <td>".$b->desaNama."</td>
          <td>".$b->kecamatanNama."</td>
          <td>".$b->bencanaPenyebab."</td>
          <td>".$b->bencanaKronologi."</td>
        </tr>";
        $no++;
      }
    ?>
  </tbody>
</table>
<script
			  src="https://code.jquery.com/jquery-2.2.4.min.js"
			  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
			  crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url("assets/plugins/table2excel/jquery.table2excel.js"); ?>"></script>

<script type="text/javascript">
	$(function() {
		$(".table2excel").table2excel({
			name: "<?php echo $title; ?>",
			// filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
			filename: "<?php echo $title; ?>",
			fileext: ".xls",
			exclude_img: true,
			exclude_links: true,
			exclude_inputs: true
		});
		history.back();
	});
</script>