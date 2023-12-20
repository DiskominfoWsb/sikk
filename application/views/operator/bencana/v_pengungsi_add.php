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
          <form class="form-horizontal" action="<?php echo base_url($module.'add_pengungsi/'.$b->idbencana)?>" method="post"> 
          <?php } ?>
<!-- <form class="form-horizontal" action="http://127.0.0.1/ci_tes/index.php/welcome/add_bencana" method="post">  -->

              <div class="box-body">

              <br>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                      <input type="text" name="nama" class="form-control" placeholder="wajib diisi" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Usia (tahun)</label>

                  <div class="col-sm-10">
                      <input type="number" name="usia" class="form-control" placeholder="wajib diisi" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>

                  <div class="col-sm-10">
                      <select name="jk" class="form-control">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>                        
                      </select>
                  </div>
                </div>                
                    
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Lokasi Pengungsian</label>

                  <div class="col-sm-10">
                    <textarea name="lokasi" class="form-control"></textarea>
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
                                             

                 <div class="alert alert-info fade in">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
                    <strong>Informasi:</strong>, Setelah mengklik tombol simpan, Anda dapat melengkapi informasi bencana melalui detail/update pada indeks bencana.
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



