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
       <?php echo form_open_multipart($module.'add/'.$b->idbencana);?>
<!-- <form class="form-horizontal" action="http://127.0.0.1/ci_tes/index.php/welcome/add_bencana" method="post">  -->

              <div class="box-body">

              <br>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>

                  <div class="col-sm-10">
                      <input type="text" name="judul" class="form-control" placeholder="wajib diisi" required="required">
                  </div>
                </div><br><br>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Instansi</label>

                  <div class="col-sm-10">
                      <input type="text" name="instalem" class="form-control">
                  </div>
                </div><br><br>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Penanggung Jawab</label>

                  <div class="col-sm-10">
                      <input type="text" name="pic" class="form-control">
                  </div>
                </div><br><br>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kontak</label>

                  <div class="col-sm-10">
                      <input type="text" name="kontak" class="form-control">
                  </div>
                </div><br><br>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Penanganan</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="cek_opd">
                      <?php
                        $penanganan = $this->m_penanganan->getPenanganan();
                        foreach( $penanganan as $key => $value){
                          echo "<option value='".$key."'>".$value."</option>";
                        }
                      ?>                   
                    </select>
                  </div>
                </div><br><br>                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-10">
                      <textarea name="teks" class="form-control"></textarea>
                  </div>
                </div><br><br>               
                    
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>

                  <div class="col-sm-10">
                      <input type="file" name="foto">
                  </div>
                </div>        <br><br> 
               <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url($module.$b->idbencana)?>"  class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
            </div>
              <!-- /.box-footer -->
            </form>
          <?php } ?>
            <!-- </div> -->
          </div>
          </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>



