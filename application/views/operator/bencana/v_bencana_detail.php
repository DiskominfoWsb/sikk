  <style>
    .mb-1 {
      margin-bottom: 12px;
      height: auto;
      overflow: hidden;
    }
  </style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
      </section>
      <?php if ($this->session->flashdata('message_form')) { //pesan alert proses
        $msg = $this->session->flashdata('message_form');
      ?>
        <div class="alert alert-<?php echo $msg['status']; ?> fade in">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
          <strong><?php echo $msg['title']; ?></strong>, <?php echo $msg['message']; ?>
        </div>
      <?php } ?>

      <!-- Main content -->
      <?php foreach ($bencana as $key) { ?>

        <section class="invoice">
          <!-- title row -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="<?php echo site_url('operator/Kaji_cepat/form/' . $key->idbencana) ?>" class="btn btn-warning pull-left" style="margin-right: 5px;">
                <i class="fa fa-file-word-o"></i> Kaji Cepat
              </a>
              <a href="<?php echo site_url('operator/Relawan/form/' . $key->idbencana) ?>" type="button" class="btn bg bg-purple collor-pallete pull-left" style="margin-right: 5px;">
                <i class="fa fa-file-word-o"></i> Pengerahan Relawan
              </a>
              <a href="<?php echo site_url('operator/Pernyataan/form/' . $key->idbencana) ?>" type="button" class="btn btn-primary pull-left" style="margin-right: 5px;">
                <i class="fa fa-file-word-o"></i> Pernyataan Bencana
              </a>
              <a href="<?php echo site_url('operator/penanganan/index/' . $key->idbencana) ?>" type="button" class="btn bg bg-maroon collor-pallete pull-left" style="margin-right: 5px;">
                <i class="fa fa-file-word-o"></i> Penanganan
              </a>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-map"></i> <?= $key->jenisbencanaNama; ?>
                <small class="pull-right">Terjadi Hari: <?= $key->bencanaHari ?>, Tanggal: <?= $key->bencanaTgl ?>, Waktu: <?= $key->bencanaWaktu ?></small>
              </h2>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <strong>Lokasi Bencana: <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-lokasi">Update</button></strong>
              <!-- modal lokasi bencana -->
              <div class="modal fade" id="modal-lokasi">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Update Lokasi</h4>
                    </div>
                    <div class="modal-body">
                      <!-- modal konten -->
                      Kec. <?= $key->kecamatanNama ?>, Desa <?= $key->desaNama ?>, Dusun <?= $key->dusunNama ?>
                      <form action="<?php echo site_url($module . 'update_lokasi/' . $key->idbencana) ?>" method="post">
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Kecamatan</label>

                          <div class="col-sm-10">
                            <?php
                            $style_kecamatan = 'class="form-control input-sm" id="idkecamatan"  onChange="tampilDesa()" name="kecamatan"';
                            echo form_dropdown('idkecamatan', $kecamatan, '', $style_kecamatan);
                            ?>
                          </div>
                        </div><br>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Desa</label>

                          <div class="col-sm-10">
                            <?php
                            $style_desa = 'class="form-control input-sm" id="iddesa" onChange="tampilDusun()" name="desa"';
                            echo form_dropdown("iddesa", array('Pilih Desa' => '- Pilih Desa -'), '', $style_desa);
                            ?>
                          </div>
                        </div><br>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Dusun</label>

                          <div class="col-sm-10">
                            <?php
                            $style_dusun = 'class="form-control input-sm" id="iddusun"  name="dusun"';
                            echo form_dropdown("iddusun", array('Pilih Dusun' => '- Pilih Dusun -'), '', $style_dusun);
                            ?>
                          </div>
                        </div><br>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Kampung</label>
                          <div class="col-sm-10">
                            <input type="text" name="namakampung" id="namakampung" class="form-control" value="<?= $key->bencanaNamaKampung ?>" />
                          </div>
                        </div><br>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">X</label>

                          <div class="col-sm-10">
                            <input type="text" name="bujur" id="lng" class="form-control" value="<?= $key->bencanaBt ?>" />
                          </div>
                        </div><br>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Y</label>

                          <div class="col-sm-10">
                            <input type="text" name="lintang" id="lat" class="form-control" value="<?= $key->bencanaLs ?>" />
                          </div>
                        </div><br>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Lokasi dari peta</label>

                          <div class="col-sm-10">
                            <?php include 'v_findcoordinate.php'; ?>
                          </div>
                        </div><br>

                        <!-- end modal konten -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- end modal lokasi bencana -->
              <address>
                Kampung: <?php if (!empty($key->bencanaNamaKampung)) {
                            echo $key->bencanaNamaKampung;
                          } else {
                            echo '-';
                          } ?><br>
                Dusun: <?= $key->dusunNama ?><br>
                Desa: <?= $key->desaNama ?><br>
                Kecamatan: <?= $key->kecamatanNama ?><br>
                Koordinat: <?= $key->bencanaBt ?>, <?= $key->bencanaLs ?>
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <strong>Penyebab:</strong><button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-penyebab">Update</button>
              <!-- modal penyebab -->
              <!-- modal  -->
              <div class="modal fade" id="modal-penyebab">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Update penyebab bencana</h4>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo site_url($module . 'update_penyebab/' . $key->idbencana) ?>" method="post">
                        <textarea class="form-control" name="penyebab" placeholder="Penyebab bencana"><?php if ($key->bencanaPenyebab != null) {
                                                                                                        echo $key->bencanaPenyebab;
                                                                                                      } ?></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                  </div>
                  </form>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- end modal penyebab -->
              <address>
                <p>
                  <?php if ($key->bencanaPenyebab == null) {
                    echo '<font color="red">Data belum diisi.</font>';
                  } else {
                    echo $key->bencanaPenyebab;
                  } ?>
                </p>
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <strong>Identitas Pelapor:</strong>
              <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pelapor">Update</button>
              <!-- modal pelapor -->
              <div class="modal fade" id="modal-pelapor">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Update pelapor</h4>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo site_url($module . 'update_pelapor/' . $key->idbencana) ?>" method="post">

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                          <div class="col-sm-10">
                            <input type="text" name="nama_pelapor" class="form-control" <?php if ($key->bencanaLaporNama != "") {
                                                                                          echo 'value="' . $key->bencanaLaporNama . '"';
                                                                                        } ?>>
                          </div>
                        </div><br>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Telp.</label>

                          <div class="col-sm-10">
                            <input type="text" name="telp_pelapor" class="form-control" <?php if ($key->bencanaLaporTelp != "") {
                                                                                          echo 'value="' . $key->bencanaLaporTelp . '"';
                                                                                        } ?>>
                          </div>
                        </div><br>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Instansi</label>

                          <div class="col-sm-10">
                            <input type="text" name="instansi_pelapor" class="form-control" <?php if ($key->bencanaLaporInstansi != "") {
                                                                                              echo 'value="' . $key->bencanaLaporInstansi . '"';
                                                                                            } ?>>
                          </div>
                        </div><br>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">No Surat</label>

                          <div class="col-sm-10">
                            <input type="text" name="no_surat_pelapor" readonly="readonly" class="form-control" <?php if ($key->bencanaLaporNoSurat != "") {
                                                                                                                  echo 'value="' . $key->bencanaLaporNoSurat . '"';
                                                                                                                } ?>>
                          </div>
                        </div><br>
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Tgl Surat</label>

                          <div class="col-sm-10">
                            <input type="text" name="tanggal_surat_pelapor" readonly="readonly" class="form-control" <?php if ($key->bencanaLaporTglSurat != "") {
                                                                                                                        echo 'value="' . $key->bencanaLaporTglSurat . '"';
                                                                                                                      } ?>>
                          </div>
                        </div><br>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                  </div>
                  </form>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- end modal pelapor -->
              <address>
                <table>
                  <tr>
                    <td width="70px">Nama</td>
                    <td width="20px">:</td>
                    <td><?= $key->bencanaLaporNama ?></td>
                  </tr>
                  <tr>
                    <td width="70px">Telp.</td>
                    <td width="20px">:</td>
                    <td><?= $key->bencanaLaporTelp ?></td>
                  </tr>
                  <tr>
                    <td width="70px">Instansi</td>
                    <td width="20px">:</td>
                    <td><?= $key->bencanaLaporInstansi ?></td>
                  </tr>
                  <tr>
                    <td width="70px">No surat</td>
                    <td width="20px">:</td>
                    <td><?= $key->bencanaLaporNoSurat ?></td>
                  </tr>
                  <tr>
                    <td width="70px">Tgl Surat</td>
                    <td width="20px">:</td>
                    <td><?= $key->bencanaLaporTglSurat ?></td>
                  </tr>
                </table>
              </address>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <hr>
          <h3>DAMPAK BENCANA</h3>
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <h4><strong>Korban Jiwa:</strong> <a href="<?php echo site_url('operator/bencana/korban_jiwa/' . $key->idbencana) ?>" class="btn btn-default btn-xs">Update</a></h4>
              <?php if (count($korban) != 0) { ?>

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Usia</th>
                      <th>JK</th>
                      <th>Alamat</th>
                      <th>Kondisi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($korban as $kor) { ?>
                      <tr>
                        <td><?= $kor->korbanNama ?></td>
                        <td><?= $kor->korbanUsia ?></td>
                        <td><?= $kor->korbanJk ?></td>
                        <td><?= $kor->dusunNama ?>, <?= $kor->desaNama ?>, <?= $kor->kecamatanNama ?></td>
                        <td><?php
                            if ($kor->korbanKondisi == 1) {
                              echo "Meninggal Dunia";
                            } elseif ($kor->korbanKondisi == 2) {
                              echo "Luka Berat";
                            } elseif ($kor->korbanKondisi == 3) {
                              echo "Luka Ringan";
                            } else {
                              echo "Hilang";
                            }
                            ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              <?php } else {
                echo '<font color="red">Tidak ada korban jiwa / Belum ada data korban jiwa ditambahkan.</font>';
              } ?>
            </div>
            <!-- /.col -->
          </div>

          <div class="row">
            <div class="col-xs-12 table-responsive">
              <form action="<?php echo site_url($module . 'kerusakan/' . $key->idbencana) ?>" method="post">
                <h4><strong>Kerusakan:</strong><button type="submit" class="btn btn-default btn-xs">Update</button></h4>
                <?php
                if ($this->session->flashdata('kerusakan')) {
                  echo '<font color="green">Data telah diperbarui.<br></font>';
                }
                ?>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Properti</th>
                      <th style="width:150px;">Rusak Berat</th>
                      <th style="width:150px;">Rusak Sedang</th>
                      <th style="width:150px;">Rusak Ringan</th>
                      <th style="width:150px;">Terancam</th>
                      <th style="width:10px;"></th>
                      <th style="width:150px;">Kerugian (Rp)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $kerugian = 0;
                    $sum = array();
                    foreach ($properties as $prop) {
                      echo "<tr>";
                      echo "<td>" . $prop->kerusakan_propertiNama . "</td>";
                      echo "<td>" . $this->m_bencana->getKerusakanCount($key->idbencana, $prop->idkerusakan_properti, 1) . "</td>";
                      echo "<td>" . $this->m_bencana->getKerusakanCount($key->idbencana, $prop->idkerusakan_properti, 2) . "</td>";
                      echo "<td>" . $this->m_bencana->getKerusakanCount($key->idbencana, $prop->idkerusakan_properti, 3) . "</td>";
                      echo "<td>" . $this->m_bencana->getKerusakanCount($key->idbencana, $prop->idkerusakan_properti, 4) . "</td>";
                      echo "<td>Rp</td>";
                      echo "<td class='text-right'>" . number_format($this->m_bencana->getKerugianSum($key->idbencana, $prop->idkerusakan_properti), 0) . "</td>";
                      echo "</tr>";
                      $sum[1] = !isset($sum[1]) ? $this->m_bencana->getKerusakanCount($key->idbencana, $prop->idkerusakan_properti, 1) : $sum[1] + $this->m_bencana->getKerusakanCount($key->idbencana, $prop->idkerusakan_properti, 1);
                      $sum[2] = !isset($sum[2]) ? $this->m_bencana->getKerusakanCount($key->idbencana, $prop->idkerusakan_properti, 2) : $sum[2] + $this->m_bencana->getKerusakanCount($key->idbencana, $prop->idkerusakan_properti, 2);
                      $sum[3] = !isset($sum[3]) ? $this->m_bencana->getKerusakanCount($key->idbencana, $prop->idkerusakan_properti, 3) : $sum[3] + $this->m_bencana->getKerusakanCount($key->idbencana, $prop->idkerusakan_properti, 3);
                      $sum[4] = !isset($sum[4]) ? $this->m_bencana->getKerusakanCount($key->idbencana, $prop->idkerusakan_properti, 4) : $sum[4] + $this->m_bencana->getKerusakanCount($key->idbencana, $prop->idkerusakan_properti, 4);
                      $kerugian += $this->m_bencana->getKerugianSum($key->idbencana, $prop->idkerusakan_properti);
                    }
                    echo "<tr>";
                    echo "<th class='bg-danger'>Total</th>";
                    echo "<th class='bg-danger'>" . $sum[1] . "</th>";
                    echo "<th class='bg-danger'>" . $sum[2] . "</th>";
                    echo "<th class='bg-danger'>" . $sum[3] . "</th>";
                    echo "<th class='bg-danger'>" . $sum[4] . "</th>";
                    echo "<th class='bg-danger'>Rp</th>";
                    echo "<th class='bg-danger text-right'>" . number_format($kerugian, 0) . "</th>";
                    echo "</tr>";
                    ?>
                  </tbody>
                </table>
              </form>
              <strong>Lain-lain: <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-lain">Tambah</button></strong>
              <div class="modal fade" id="modal-lain">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="<?php echo site_url($module . 'add_lainnya/' . $key->idbencana) ?>" method="post">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Kerusakan Lainnya</h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group mb-1">
                          <label for="nama" class="col-sm-2 control-label">Nama</label>
                          <div class="col-sm-10">
                            <input required type="text" name="nama" id="nama" placeholder="cth:Tower Menara" class="form-control" />
                          </div>
                        </div>
                        <div class="form-group mb-1">
                          <label for="satuan" class="col-sm-2 control-label">Satuan</label>
                          <div class="col-sm-10">
                            <input required type="text" name="satuan" id="satuan" placeholder="cth:3 tiang" class="form-control" />
                          </div>
                        </div>
                        <div class="form-group mb-1">
                          <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                          <div class="col-sm-10">
                            <textarea required type="text" name="keterangan" id="keterangan" placeholder="Tulis penjelasan" class="form-control"></textarea>
                          </div>
                        </div>
                        <div class="form-group mb-1">
                          <label for="kerugian" class="col-sm-2 control-label">Kerugian</label>
                          <div class="col-sm-10">
                            <div class="input-group">
                              <div class="input-group-addon">Rp</div>
                              <input required type="number" name="kerugian" id="kerugian" placeholder="cth:10000" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                      </div>
                  </div>
                  </form>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <table class="table table-bordered">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Satuan</th>
                  <th>Keterangan</th>
                  <th>Kerugian</th>
                  <th>Delete</th>
                </tr>
                <?php
                $seq = 1;
                $kerugian = 0;
                foreach ($lainnya as $lain) { ?>
                  <tr>
                    <td><?php echo $seq; ?></td>
                    <td><?php echo $lain->nama; ?></td>
                    <td><?php echo $lain->satuan; ?></td>
                    <td><?php echo $lain->keterangan; ?></td>
                    <td class="text-right"><?php echo number_format($lain->kerugian, 0); ?></td>
                    <td><a href="<?php echo site_url($module . "delete_kerusakan_lain/" . $lain->idkerusakan_lain); ?>" class="del-lain"><i class="fa fa-trash"></i></a></td>
                  </tr>
                <?php $kerugian += $lain->kerugian;
                  $seq++;
                } ?>
                <tr>
                  <th colspan="4">Total</th>
                  <th class="text-right"><?php echo number_format($kerugian, 0); ?></th>
                </tr>

              </table>
            </div>
            <script type="text/javascript">
              $(document).ready(function() {
                $(".del-lain").click(function() {
                  var url = $(this).attr("href");
                  bootbox.confirm("Apakah akan menghapus data ini ?", function(e) {
                    if (e == true) {
                      window.location.href = url;
                    }
                  });
                  return false;
                });
              });
            </script>
            <!-- /.col -->
          </div>
          <br>
          <!-- /.row -->

          <!-- pengungsi -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <h4><strong>Pengungsi:</strong> <a href="<?php echo site_url($module . 'pengungsi/' . $key->idbencana) ?>" class="btn btn-default btn-xs">Update</a></h4>
              <?php if (count($pengungsi) == 0) {
                echo '<font color="red">Tidak ada pengungsi/ Data pengungsi belum diisi.</font>';
              } else { ?>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Usia</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Lokasi Pengungsian</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pengungsi as $peng) { ?>
                      <tr>
                        <td><?= $peng->pengungsiNama ?></td>
                        <td><?= $peng->pengungsiUsia ?></td>
                        <td><?= $peng->pengungsiJk ?></td>
                        <td><?= $peng->dusunNama ?>, <?= $peng->desaNama ?>, <?= $peng->kecamatanNama ?></td>
                        <td><?= $peng->pengungsiLokasi ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              <?php } ?>
            </div>
            <!-- /.col -->
          </div>

          <!-- pengungsi -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <h4>
                <strong>Total Kerugian:</strong>
                <a href="#" data-toggle="modal" data-target="#kerugianModal" class="btn btn-default btn-xs">Update</a>
                <a href="<?php echo site_url($module . "hitungKerugian/" . $key->idbencana); ?>" class="btn btn-default btn-xs">Hitung</a>
              </h4>
              <h2>Rp <?php echo number_format($key->bencanaTotalKerugian, 0, ",", "."); ?></h2>

              <!-- Modal -->
              <div class="modal fade" id="kerugianModal" tabindex="-1" role="dialog" aria-labelledby="kerugianModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="kerugianModalLabel">Masukkan Total Kerugian</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <input type="number" name="totalKerugian" id="totalKerugian" class="form-control" value="<?php echo $key->bencanaTotalKerugian; ?>" />
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" onclick="saveKerugian();" id="saveTotalKerugian">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
              <script type="text/javascript">
                function saveKerugian() {
                  var target = "<?php echo site_url($module . "/updateKerugian/" . $key->idbencana); ?>";
                  var datapost = {
                    value: $("#totalKerugian").val()
                  }
                  $.post(target, datapost, function(r) {
                    if (r == "ok") {
                      location.reload();
                    } else {
                      alert(e);
                    }
                  });
                }
              </script>
            </div>
            <!-- /.col -->
          </div>

          <h4><strong>Kronologi Kejadian:</strong> <button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-kronologi">Update</button></h4>

          <!-- modal kronologi -->
          <div class="modal fade" id="modal-kronologi">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title">Update kronologi bencana</h4>
                </div>
                <form action="<?php echo site_url($module . 'update_kronologi/' . $key->idbencana) ?>" method="post">
                  <div class="modal-body">
                    <textarea class="form-control" placeholder="Kronologi bencana" name="kronologi"><?php if ($key->bencanaKronologi != "") {
                                                                                                      echo $key->bencanaKronologi;
                                                                                                    } ?></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- modal kronologi -->
          <p>
            <?php if ($key->bencanaKronologi == null) {
              echo '<font color="red">Kronologi bencana belum ditambahkan.</font>';
            } else {
              echo $key->bencanaKronologi;
            } ?>
          </p>
          <br>
          <h4><strong>Kendala/Kebutuhan Mendesak/Potensi Bencana Susulan:</strong><button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-kendala">Update</button></h4>
          <!-- modal kendala -->
          <div class="modal fade" id="modal-kendala">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Update Kendala/Kebutuhan Mendesak/Potensi Bencana Susulan</h4>
                </div>
                <div class="modal-body">
                  <form action="<?php echo site_url($module . 'update_kendala/' . $key->idbencana) ?>" method="post">
                    <textarea class="form-control" placeholder="Ketik disini" name="kendala"><?php if ($key->bencanaKendala != "") {
                                                                                                echo $key->bencanaKendala;
                                                                                              } ?></textarea>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-success">Simpan</button>
                </div>
              </div>
              </form>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- end modal kendala -->
          <p>
            <?= $key->bencanaKendala ?>
          </p>
          <br>
          <div class="col-md-6">
            <h4><strong>Petugas:</strong><button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-petugas">Tambah</button></h4>
            <!-- modal petugas -->
            <!-- modal  -->
            <div class="modal fade" id="modal-petugas">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Pilih Petugas</h4>
                  </div>
                  <div class="modal-body">
                    <table id="tajaxpetugas" class="table table-bordered table-striped data-table">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>NIP</th>
                          <th>Jabatan</th>
                          <th>No. HP</th>
                          <th>Pilihan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($mdl_petugas as $md_alat) { ?>

                          <tr>
                            <td><?= $md_alat->petugasNama ?></td>
                            <td><?= $md_alat->petugasNip ?></td>
                            <td><?= $md_alat->petugasJabatan ?></td>
                            <td><?= $md_alat->petugasNohp ?></td>
                            <td>
                              <center> <a href="<?php echo site_url('operator/bencana/update_petugas?idbencana=' . $key->idbencana . '&idpetugas=' . $md_alat->idpetugas) ?>" class="btn btn-sm btn-primary">Tambah</a></center>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
                </form>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- end modal petugas -->
            <table>
              <?php if (count($petugas) == 0) {
                echo '<font color="red">Data belum diisi.</font>';
              } ?>

              <?php foreach ($petugas as $ptg) { ?>

                <tr>
                  <td rowspan="5" width="40px">
                    <a href="<?php echo site_url('operator/bencana/delete_petugas?idbencana=' . $key->idbencana . '&idpetugas=' . $ptg->idpetugas) ?>" class="btn btn-xs btn-danger fa fa-trash"></a>
                  </td>
                </tr>
                <tr>
                  <td width="70px">Nama</td>
                  <td width="20px">:</td>
                  <td> <?php if ($ptg->petugasNama == null) {
                          echo '<font color="red">Data belum diisi.</font>';
                        } else {
                          echo $ptg->petugasNama;
                        } ?></td>
                </tr>
                <tr>
                  <td width="70px">NIP</td>
                  <td width="20px">:</td>
                  <td><?php if ($ptg->petugasNip == null) {
                        echo '<font color="red">Data belum diisi.</font>';
                      } else {
                        echo $ptg->petugasNip;
                      } ?></td>
                </tr>
                <tr>
                  <td width="70px">Jabatan</td>
                  <td width="20px">:</td>
                  <td><?php if ($ptg->petugasNama == null) {
                        echo '<font color="red">Data belum diisi.</font>';
                      } else {
                        echo $ptg->petugasJabatan;
                      } ?></td>
                </tr>
                <tr>
                  <td width="70px">No. HP</td>
                  <td width="20px">:</td>
                  <td><?php if ($ptg->petugasNama == null) {
                        echo '<font color="red">Data belum diisi.</font>';
                      } else {
                        echo $ptg->petugasNohp;
                      } ?></td>
                </tr>
                <tr>
                  <td colspan="4">
                    <hr>
                  </td>
                </tr>
                <!-- <hr> -->
              <?php } ?>
            </table>
          </div>
          <div class="col-md-6">
            <h4><strong>Foto:</strong><button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-foto">Tambah</button></h4>
            <!-- modal foto -->
            <div class="modal fade" id="modal-foto">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Foto Bencana</h4>
                  </div>
                  <div class="modal-body">
                    <?php echo form_open_multipart($module . 'add_foto/' . $key->idbencana); ?>
                    <input type="file" name="foto">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                  </div>
                </div>
                </form>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- end modal foto -->
            <div class="box-footer">
              <ul class="mailbox-attachments clearfix">
                <?php if (count($foto) == 0) {
                  echo '<font color="red">Belum ada foto ditambahkan.</font>';
                } else {

                  foreach ($foto as $f) {
                ?>

                    <li>
                      <span class="mailbox-attachment-icon has-img"><img src="<?= $f->foto_bencanaPath ?>"></span>

                      <div class="mailbox-attachment-info">
                        <a target="_blank" href="<?= $f->foto_bencanaPath ?>" class="mailbox-attachment-name"><?= $f->foto_bencanaNama ?></a>
                        <span class="mailbox-attachment-size">
                          <?= $f->foto_bencanaSize ?> KB
                          <a href="<?php echo site_url('operator/bencana/delete_foto/' . $f->idfoto_bencana) ?>?nama_gambar=<?= $f->foto_bencanaNama; ?>&bencana=<?= $key->idbencana ?>" class="btn btn-xs btn-danger fa fa-trash"></a>
                        </span>
                      </div>
                    </li>
                <?php }
                } ?>
              </ul>
            </div>
          </div>
          <br>


          <div class="row">
            <div class="col-xs-12 table-responsive">
              <h4><strong>Peralatan:</strong><button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-peralatan">Tambah</button></h4>

              <!-- modal peralatan -->
              <div class="modal fade" id="modal-peralatan">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Pilih Alat</h4>
                    </div>
                    <div class="modal-body">
                      <table id="tajaxpetugas" class="table table-bordered table-striped data-table">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Jumlah Tersedia</th>
                            <th>Jumlah Tambah</th>
                            <th>Pilihan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($mdl_peralatan as $md_alat) { ?>
                            <form action="<?php echo site_url($module . 'add_peralatan') ?>" method="post">
                              <tr>
                                <td><?= $md_alat->peralatanNama ?></td>
                                <td><?= $md_alat->peralatanJml ?></td>
                                <td><input type="number" class="form-control" name="jml_tambah"><input type="hidden" name="idbencana" value="<?= $key->idbencana ?>"><input type="hidden" name="idperalatan" value="<?= $md_alat->idperalatan ?>"></td>
                                <td>
                                  <center> <button type="submit" class="btn btn-primary">Tambah</button></center>
                                </td>
                            </form>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                  </form>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- end modal peralatan -->
              <?php if (count($peralatan) == 0) {
                echo '<font color="red">Tidak ada peralatan / Data belum diisi.</font>';
              } else { ?>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Nama alat</th>
                      <th>Jumlah Dimiliki</th>
                      <th>Jumlah Dibutuhkan/Digunakan</th>
                      <th>Hapus?</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($peralatan as $alat) { ?>
                      <tr>
                        <td><?= $alat->peralatanNama ?></td>
                        <td><?= $alat->peralatanJml ?></td>
                        <td><?= $alat->bpJml ?></td>
                        <td><a href="<?php echo site_url('operator/bencana/delete_peralatan?idbencana=' . $key->idbencana . '&idperalatan=' . $alat->idperalatan) ?>" class="btn btn-xs btn-danger fa fa-trash"></a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              <?php } ?>
            </div>
            <!-- /.col -->
          </div>
          <hr />
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <h4><strong>Dampak & Ancaman:</strong><button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-ancaman">Update</button></h4>
              <?php if ($key->bencanaAncaman == "") {
                echo '<font color="red">Ancaman bencana belum diisikan.</font>';
              } else {
                echo trim(nl2br($key->bencanaAncaman));
              } ?>
            </div>
            <div class="modal fade" id="modal-ancaman">
              <div class="modal-dialog">
                <form method="post" action="<?php echo site_url($module . 'update_ancaman/' . $key->idbencana) ?>">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Update Ancaman Bencana</h4>
                    </div>
                    <div class="modal-body">
                      <textarea name="bencanaAncaman" class="form-control"><?php echo trim($key->bencanaAncaman); ?></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-success pull-right">Simpan</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </form>
              </div>
            </div>
            <!-- /.modal-dialog -->
          </div>

          <!-- /.row -->
          <hr />
          <!-- this row will not appear when printing -->

        </section>

      <?php } ?>
      <!-- /.content -->
      <div class="clearfix"></div>
  </div>