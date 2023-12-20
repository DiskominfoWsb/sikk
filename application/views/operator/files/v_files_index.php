<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>


<div class="content-wrapper">

  <section class="content-header">
    <?php echo $pagetitle; ?>
    <?php echo $breadcrumb; ?>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
    <?php if($this->session->flashdata('message_form')){ //pesan alert proses
     $msg = $this->session->flashdata('message_form');
     ?>
     <div class="alert alert-<?php echo $msg['status']; ?> fade in">
      <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
      <strong><?php echo $msg['title']; ?></strong>, <?php echo $msg['message']; ?>
    </div>   
  <?php } ?>                       
  <div class="box">
    <?php echo form_open_multipart('operator/files/do_upload');?>
    <div class="box-header with-border">
      <h3 class="box-title">Upload file</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-3">
          <p class="text-center"><input type="file" name="userfile"></p>
          <button class="btn btn-success">Upload</button>
        </div>
      </form>
      <div class="col-md-9">
        <p class="text-center text-uppercase"></p>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php echo $dashboard_alert_file_install; ?>

<div class="row">
  <?php if ($files !=null) {?>                    
    <?php foreach ($files as $key) {?>
      <div class="col-md-4">
        <div class="info-box">
          <?php 
          $icon = "fa-file-image-o";
          if ($key->filesType=='.png'||$key->filesType=='.jpg'||$key->filesType=='.jpeg') {
            $icon = "fa-file-image-o";
          }else if ($key->filesType=='.pdf') {
            $icon = "fa-file-pdf-o";
          }elseif ($key->filesType=='.xls') {
            $icon = "fa-file-excel-o";
          }else if ($key->filesType=='.doc'||$key->filesType=='.docx') {
            $icon = "fa-file-word-o";
          }else{
            $icon = "fa-file";
          }?>
          <span class="info-box-icon bg-grey"><i class="fa <?php echo $icon; ?>"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><?=$key->filesNama?></span>
            <p><?=$key->filesSize?> kB</p>
            <a href="<?=$key->filesPath?>" target="_blank" class="btn btn-default btn-sm">Download</a>
            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?php echo $key->idfiles?>">Hapus</button>   
            <!-- modal  -->
            <div class="modal fade" id="modal-hapus<?php echo $key->idfiles?>">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Hapus data?</h4>
                    </div>
                    <div class="modal-body">
                      <p>Apa anda yakin ingin menghapus file ini?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                      <a href="<?php echo base_url($module.'delete/'.$key->idfiles)?>" type="button" class="btn btn-danger">Hapus</a>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>                                       
            </div>
          </div>
        </div>

      <?php } } ?>                        


      <div class="clearfix visible-sm-block"></div>

    </div>

    <div class="row">
      <div class="col-md-12">
        <?php
/*
if ($url_exist) {
echo 'OK';
} else {
echo 'KO';
}
*/
?>
</div>


</div>
</section>
</div>
