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
               <?php echo form_open_multipart($module.'edit/'.$penanganan->idpenanganan);?>
               <!-- <form class="form-horizontal" action="http://127.0.0.1/ci_tes/index.php/welcome/add_bencana" method="post">  -->

                <div class="box-body">

                  <br>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>

                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $penanganan->penangananJudul; ?>" name="judul" class="form-control" placeholder="wajib diisi" required="required">
                    </div>
                  </div><br><br>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Instansi</label>

                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $penanganan->penangananInstaLem; ?>" name="instalem" class="form-control">
                    </div>
                  </div><br><br>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Penanggung Jawab</label>

                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $penanganan->penangananPic; ?>" name="pic" class="form-control">
                    </div>
                  </div><br><br>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kontak</label>

                    <div class="col-sm-10">
                      <input type="text" value="<?php echo $penanganan->penangananKontak; ?>" name="kontak" class="form-control">
                    </div>
                  </div><br><br>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Penanganan</label>

                    <div class="col-sm-10">
                      <select class="form-control" name="cek_opd">
                        <?php
                        $png = $this->m_penanganan->getPenanganan();
                        $selected = "";
                        foreach( $png as $key => $value){
                          $selected = ($key == $penanganan->penangananOpd ) ? "selected" : null;
                          echo "<option ".$selected." value='".$key."'>".$value."</option>";
                        }
                        ?>                   
                      </select>
                    </div>
                  </div>
                  <br><br>    
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <input type="file" name="foto" class="form-control" />
                        <span class="input-group-addon text-danger">* Kosongi tanpa update foto</span>
                      </div>
                    </div>
                  </div>        
                  <br /><br />             
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>

                    <div class="col-sm-10">
                      <textarea name="teks" class="form-control"><?php echo $penanganan->penangananTeks; ?></textarea>
                    </div>
                  </div>
                  <br><br>                

                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="<?php echo site_url($module."index/".$penanganan->penangananIdBencana)?>"  class="btn btn-default">Batal</a>
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



