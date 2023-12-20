  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $dashboard_alert_file_install; ?>    
      <?php if($this->session->flashdata('message_form')){ //pesan alert proses
         $msg = $this->session->flashdata('message_form');
         ?>
         <div class="alert alert-<?php echo $msg['status']; ?> fade in">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
            <strong><?php echo $msg['title']; ?></strong>, <?php echo $msg['message']; ?>
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
            <p><font color="red"><strong>Info:</strong> Anda dapat menambahkan beberapa data sekaligus dengan menggunakan koma (,) sebagai separator / pemisah.</font></p>
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Desa</label>

                  <div class="col-sm-10">
                     <select class="getDesa form-control" style="width:500px" name="desa"></select>
                  </div>
                </div>

               
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Dusun</label>

                  <div class="col-sm-10">
                    <input class="form-control" name="dusun" required="required" placeholder="data1, data2, data3, ..., dataN" type="text">
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
