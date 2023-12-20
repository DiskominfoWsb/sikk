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
         <?php foreach ($bencana as $b) {?>
          <form class="form-horizontal" action="<?php echo site_url($module.'add_kerusakan/'.$b->idbencana)?>" method="post"> 
          <?php } ?>
<!-- <form class="form-horizontal" action="http://127.0.0.1/ci_tes/index.php/welcome/add_bencana" method="post">  -->

              <div class="box-body">

              <br>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Properti</label>

                  <div class="col-sm-10">
                      <select name="properti" class="form-control">
                        <?php foreach ($properti as $prop) {
                          echo '<option value="'.$prop->idkerusakan_properti.'">'.$prop->kerusakan_propertiNama.'</option>';
                        }?>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tingkat_rusak" class="col-sm-2 control-label">Tingkat Kerusakan</label>

                  <div class="col-sm-10">
                      <select name="tingkat_rusak" id="tingkat_rusak" class="form-control">
                        <?php foreach ($tingkat_rusak as $tgrsk) {
                          echo '<option value="'.$tgrsk->idkerusakan_tingkat_rusak.'">'.$tgrsk->kerusakan_tingkat_rusakNama.'</option>';
                        }?>
                      </select>
                  </div>
                </div>   
                <div class="form-group">
                  <label for="kerugian" class="col-sm-2 control-label">Kerugian</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon">Rp</span>
                      <input name="kerugian" value="0" class="form-control" id="kerugian" type="number" />
                    </div>
                  </div>
                </div>             
                <div class="box-header with-border">
                  <h3 class="box-title">Lokasi Properti</h3>
                </div>
                <br>                    
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
                <div class="box-header with-border">
                  <h3 class="box-title">Identitas Pemilik</h3>
                </div>
                <br>                                    
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                      <input type="text" name="nama_pemilik" class="form-control" required="required">
                  </div>
                </div>                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                  <textarea name="alamat_pemilik" class="form-control" required="required"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kontak</label>

                  <div class="col-sm-10">
                    <input type="text" name="kontak_pemilik" class="form-control">  
                  </div>
                </div>   
  
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url($module)?>"  class="btn btn-default">Batal</a>
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



