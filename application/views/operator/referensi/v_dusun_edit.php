  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $dashboard_alert_file_install; ?>    
    
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
            <?php foreach ($dusun as $key) {?>
            <form class="form-horizontal" action="<?php echo base_url($module.'edit/'.$key->iddusun)?>" method="post">
            <p><font color="red"><strong>Info:</strong> Anda dapat menambahkan beberapa data sekaligus dengan menggunakan koma (,) sebagai separator / pemisah.</font></p>
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Desa</label>

                  <div class="col-sm-10">
                     <!-- <select class="getDesa form-control" style="width:500px" name="desa"></select> -->
                    <input class="form-control" value="<?=$key->desaNama?>" name="dusun" required="required" placeholder="data1, data2, data3, ..., dataN" type="text" readonly="readonly" > 
                  </div>
                </div>

               
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Dusun</label>

                  <div class="col-sm-10">
                    <input class="form-control" value="<?=$key->dusunNama?>" name="dusun" required="required" placeholder="data1, data2, data3, ..., dataN" type="text">
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





