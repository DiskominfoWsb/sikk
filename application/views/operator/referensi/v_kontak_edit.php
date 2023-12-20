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
              <?php foreach ($kontak as $key) {?>
            <form class="form-horizontal" action="<?php echo base_url($module.'edit/'.$key->idkontak)?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input name="nama" value="<?=$key->kontakNama?>" class="form-control" id="inputEmail3" placeholder="Nama" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kontak Jenis</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="jenis">
                        <option value="1"
                          <?php
                            if ($key->kontakJenis==1) {
                              echo "selected";
                            }
                          ?>
                        >Instansi</option>
                        <option value="2"
                        <?php
                            if ($key->kontakJenis==2) {
                              echo "selected";
                            }
                          ?>
                        >Personil</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Instansi/ Lembaga</label>

                  <div class="col-sm-10">
                    <input name="lembaga" value="<?=$key->kontakLem?>" class="form-control" id="inputEmail3"  type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keahlian</label>

                  <div class="col-sm-10">
                    <input name="keahlian" value="<?=$key->kontakKeahlian?>" class="form-control" id="inputEmail3" type="text">
                  </div>
                </div>                 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No. Kontak</label>

                  <div class="col-sm-10">
                    <input  class="form-control" value="<?=$key->kontakNomor?>" name="nomor" placeholder="No HP/Telp" type="text">
                  </div>
                  <?php echo form_error('kontak'); ?>
                </div>
              </div>
              <?php } ?>
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



