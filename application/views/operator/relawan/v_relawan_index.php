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
            <i class="fa fa-map"></i> Form Surat Perintah Pengerahan Relawan
            <small class="pull-right"></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
      <form action="<?php echo base_url($module.'export_surat/'.$idbencana)?>">
        <div class="col-sm-4 invoice-col">
          <strong>No Surat:</strong>
          <address>
            <input required="required" type="text" class="form-control" name="no_surat_relawan" value="<?=$key->bencanaNoPengRelawan?>">
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong>Tanggal:</strong>
          <address>
          <input required="required" type="text" id="datemask" name="tanggal_relawan" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask value="<?=$key->bencanaTglPengRelawan?>">
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <strong>Surat:</strong> 

        <address>
          <button  type="submit" class="btn bg bg-purple collor-pallete pull-left" style="margin-right: 5px;">
            <i class="fa fa-file-word-o"></i> Export Surat
          </button>
        </address>
        </form>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


    <!-- laporan -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-map"></i> Form Laporan Pengerahan Relawan
            <small class="pull-right"></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
      <form class="form-horizontal" action="<?php echo base_url($module.'export_laporan/'.$idbencana)?>" method="post">
              <div class="box-body">
            
            <div class="box-header with-border">
              <h3 class="box-title">Pelaksanaan Pengerahan Relawan</h3>
            </div>
            <br>              
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>

                  <div class="col-sm-10">
                    <input required="required" type="text" id="datemask2" name="tanggal_pengerahan" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask value="<?=$key->bencanaTglPengRelawan?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Lokasi</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputPassword3" required="required" type="text" name="lokasi_pengerahan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Komunitas</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="inputPassword3" required="required" type="text" name="komunitas">
                  </div>
                </div>  
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jumlah</label>

                  <div class="col-sm-10">
                    <input class="form-control" required="required" id="inputPassword3" required="required" type="number" name="jml_pengerahan">
                  </div>
                </div>                              
                <div class="box-header with-border">
                  <h3 class="box-title">Laporan</h3>
                </div>
                <br>                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Laporan Pengerahan</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="laporan_pengerahan"></textarea>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <button  type="submit" class="btn bg bg-purple collor-pallete pull-right" style="margin-right: 5px;">
            <i class="fa fa-file-word-o"></i> Export Laporan
              </button>
              </div>

        </form>
        <!-- </div> -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <?php } ?>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>