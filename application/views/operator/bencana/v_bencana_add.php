<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php echo $pagetitle; ?>
    <?php echo $breadcrumb; ?>
  </section>

  <!-- Main content -->
  <section class="content">
    <?php echo $dashboard_alert_file_install; ?>
    <?php if ($this->session->flashdata('msg')) { ?>
      <div class="alert alert-<?php echo $msgclass ?>">
        <strong>Info:</strong> <?php echo $this->session->flashdata('msg'); ?>
      </div>
    <?php } ?>
    <div class="row">
      <div class="box  col-md-12">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $subtitle ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--            <form class="form-horizontal" action="<?php echo base_url($module . 'add_bencana') ?>" method="post">  -->
            <?php echo form_open_multipart($module . 'add_bencana/',  array('class' => 'form-horizontal')); ?>

            <div class="box-body">


              <!-- info awal -->
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Jenis Bencana</label>

                <div class="col-sm-10">
                  <select name="jenis" class="form-control">
                    <?php foreach ($jen_ben as $jb) { ?>
                      <option value="<?= $jb->idjenisbencana ?>"><?= $jb->jenisbencanaNama ?></option>
                    <?php } ?>
                  </select>
                  <?php echo form_error('jenis'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>

                <div class="col-sm-10">
                  <input type="text" id="datemask" name="tanggal" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask>
                  <?php echo form_error('tanggal'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Waktu</label>

                <div class="col-sm-10">
                  <input type="text" id="timemask" name="waktu" class="form-control" data-inputmask="'alias': 'hh:mm'" data-mask>
                  <?php echo form_error('waktu'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>

                <div class="col-sm-10">
                  <input type="file" name="foto">
                </div>
              </div>



              <!-- lokasi bencana -->
              <div class="box-header with-border">
                <h3 class="box-title">Lokasi Bencana</h3>
              </div>
              <br>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Kecamatan</label>

                <div class="col-sm-10">
                  <?php
                  $style_kecamatan = 'class="form-control input-sm" id="idkecamatan"  onChange="tampilDesa()" name="kecamatan"';
                  echo form_dropdown('idkecamatan', $kecamatan, '', $style_kecamatan);
                  ?>
                  <?php echo form_error('idkecamatan'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Desa</label>

                <div class="col-sm-10">
                  <?php
                  $style_desa = 'class="form-control input-sm" id="iddesa" onChange="tampilDusun()" name="desa"';
                  echo form_dropdown("iddesa", array('Pilih Desa' => '- Pilih Desa -'), '', $style_desa);
                  ?>
                  <?php echo form_error('iddesa'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Dusun</label>

                <div class="col-sm-10">
                  <?php
                  $style_dusun = 'class="form-control input-sm" id="iddusun"  name="dusun"';
                  echo form_dropdown("iddusun", array('Pilih Dusun' => '- Pilih Dusun -'), '', $style_dusun);
                  ?>
                  <?php echo form_error('iddusun'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Kampung</label>
                <div class="col-sm-10">
                  <input type="text" name="namakampung" id="namakampung" class="form-control" placeholder="Isikan nama kampung jika ada" />
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Bujur (X)</label>
                <div class="col-sm-10">
                  <input type="text" name="bujur" id="lng" class="form-control" />
                  <?php echo form_error('bujur'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Lintang (Y)</label>
                <div class="col-sm-10">
                  <input type="text" name="lintang" id="lat" class="form-control" />
                  <?php echo form_error('lintang'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Temukan lokasi di peta</label>
                <div class="col-sm-10">
                  <hr><a data-toggle="collapse" href="#collapselocationmap" aria-expanded="false" aria-controls="collapselocationmap" class="btn btn-info btn-block">Buka Peta</a><br>
                  <div class="collapse" id="collapselocationmap">
                    <div class="card card-body">

                      <?php include 'v_findcoordinate.php'; ?>

                    </div>
                  </div>
                </div>
              </div>

              <div class="box-header with-border">
                <h3 class="box-title">Identitas Pelapor</h3>
              </div>
              <br>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                <div class="col-sm-10">
                  <input type="text" name="nama_pelapor" class="form-control" placeholder="wajib diisi" required="required">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Telp.</label>

                <div class="col-sm-10">
                  <input type="text" name="telp_pelapor" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Instansi</label>

                <div class="col-sm-10">
                  <input type="text" name="instansi_pelapor" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">No Surat</label>

                <div class="col-sm-10">
                  <input type="text" name="no_surat_pelapor" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tgl Surat</label>

                <div class="col-sm-10">
                  <input type="text" id="datemask2" name="tanggal_surat_pelapor" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask>
                </div>
              </div>

              <div class="alert alert-info fade in">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
                <strong>Informasi:</strong>, Setelah mengklik tombol simpan, Anda dapat melengkapi informasi bencana melalui detail/update pada indeks bencana.
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url($module) ?>" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
            </div>
            <!-- /.box-footer -->
            </form>
            <!-- </div> -->
          </div>
        </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>