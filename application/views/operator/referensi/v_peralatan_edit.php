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
            <?php foreach ($peralatan as $key) {?>
            <form class="form-horizontal" action="<?php echo base_url($module.'edit/'.$key->idperalatan)?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="nama" value="<?=$key->peralatanNama?>" required="required" placeholder="Nama Lengkap" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pemilik</label>

                  <div class="col-sm-10">
                    <input class="form-control" value="<?=$key->peralatanPemilik?>" name="pemilik"  type="text">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Penanggung Jawab</label>

                  <div class="col-sm-10">
                    <input class="form-control" value="<?=$key->peralatanPenanggungJawab?>" name="penanggungjawab"  type="text">
                  </div>
                </div>     
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kontak</label>

                  <div class="col-sm-10">
                    <input class="form-control" value="<?=$key->peralatanKontak?>" name="kontak"  type="text">
                  </div>
                </div>                         
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jumlah</label>

                  <div class="col-sm-10">
                  <input type="number" value="<?=$key->peralatanJml?>" required="required" name="jml" class="form-control">
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



