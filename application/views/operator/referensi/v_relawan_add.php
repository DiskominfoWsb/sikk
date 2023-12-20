  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $dashboard_alert_file_install; ?>    
      <?php if ($this->session->flashdata('msg')) {?>
        <div class="alert alert-<?php echo $msgclass?>">
          <strong>Info:</strong> <?php echo $this->session->flashdata('msg');?>
        </div>
      <?php } ?>
      <div class="row">
          <div class="box  col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <div class="box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $subtitle?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo base_url($module.'add')?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="nama" required="required" placeholder="Nama Lengkap" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIK</label>

                  <div class="col-sm-10">
                  <input type="text" name="nik" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="alamat"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">RT/RW</label>

                  <div class="col-sm-10">
                  <input type="text" name="rtrw" class="form-control">
                  </div>
                </div>                                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kecamatan</label>

                  <div class="col-sm-10">
                    <?php
                    $style_kecamatan='class="form-control input-sm" id="idkecamatan"  onChange="tampilDesa()" name="kecamatan"';
                    echo form_dropdown('idkecamatan',$kecamatan,'',$style_kecamatan);
                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Desa</label>

                  <div class="col-sm-10">
                    <?php
                      $style_desa='class="form-control input-sm" id="iddesa" onChange="tampilDusun()" name="desa"';
                      echo form_dropdown("iddesa",array('Pilih Desa'=>'- Pilih Desa -'),'',$style_desa);
                      ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Dusun</label>

                  <div class="col-sm-10">
                    <?php
                      $style_dusun='class="form-control input-sm" id="iddusun"  name="dusun"';
                      echo form_dropdown("iddusun",array('Pilih Dusun'=>'- Pilih Dusun -'),'',$style_dusun);
                      ?>
                  </div>
                </div>                 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telp</label>

                  <div class="col-sm-10">
                  <input type="text" name="telp" class="form-control">
                  </div>
                </div>                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pendidikan</label>

                  <div class="col-sm-10">
                     <select name="pend" class="form-control">
                        <?php foreach ($pendidikan as $p) {?>
                          <option value="<?=$p->idRefPend?>"><?=$p->refPendNama?></option>
                        <?php } ?>
                     </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Organisasi</label>

                  <div class="col-sm-10">
                     <select name="org" class="form-control">
                        <?php foreach ($organisasi as $org) {?>
                          <option value="<?=$org->idOrg?>"><?=$org->orgNama?></option>
                        <?php } ?>
                     </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keahlian</label>

                  <div class="col-sm-10">
                        <?php foreach ($keahlian as $k) {?>
                          <input type="checkbox" name="keahlian[]" value="<?=$k->idKeahlian?>"> <?=$k->keahlianNama?><br>
                          <small><i><font color="red"><?=$k->keahlianKet?></font></i></small><br>
                        <?php } ?>
                  </div>
                </div>                
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url($module)?>"  class="btn btn-default">Batal</a>
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



