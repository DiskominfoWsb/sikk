  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>
      <?php if($this->session->flashdata('message_form')){ //pesan alert proses
         $msg = $this->session->flashdata('message_form');
         ?>
         <div class="alert alert-<?php echo $msg['status']; ?> fade in">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button"></button>
            <strong><?php echo $msg['title']; ?></strong>, <?php echo $msg['message']; ?>
         </div>   
      <?php } ?>

    <!-- Main content -->
    <?php foreach ($bencana as $key) {?>

    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-map"></i> Form Surat Pernyataan Bencana
            <small class="pull-right"></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
      <form action="<?php echo base_url($module.'export_surat/'.$idbencana)?>">
        <div class="col-sm-3 invoice-col">
          <strong>No Surat:</strong>
          <address>
            <input required="required" type="text" class="form-control" name="no_surat_pernyataan" value="<?=$key->bencanaNoSuratPernyataan?>">
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
          <strong>Tanggal:</strong>
          <address>
          <input required="required" type="text" id="datemask" name="tanggal_pernyataan" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask value="<?=$key->bencanaTglPernyataan?>">
          </address>
        </div>
        <div class="col-sm-3 invoice-col">
          <strong>Masa Darurat:</strong>
          <address>
          <input required="required" type="text" name="masa_darurat" class="form-control" value="<?=$key->bencanaMasaDarurat?>">
          </address>
        </div>        
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
        <strong>Surat:</strong> 

        <address>
          <button  type="submit" class="btn btn-warning pull-left" style="margin-right: 5px;">
            <i class="fa fa-file-word-o"></i> Export Surat
          </button>
        </address>
        </form>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>



    <?php } ?>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>