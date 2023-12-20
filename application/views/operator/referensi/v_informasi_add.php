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
          <div class="col-md-12">
            <div class="box-info">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $subtitle?></h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" action="<?php echo base_url($module.'add')?>" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label for="judul" class="col-sm-2 control-label">Judul</label>

                    <div class="col-sm-10">
                      <input class="form-control" name="judul" id="judul" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="content" class="col-sm-2 control-label">Isi</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" name="content" id="content"></textarea>
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

    <script src='<?php echo base_url("bower_components/tinymce/tinymce.min.js"); ?>'></script>
    <script type="text/javascript">
      $(function(){
        tinymce.init({
          selector: '#content'
        });
      });
    </script>


