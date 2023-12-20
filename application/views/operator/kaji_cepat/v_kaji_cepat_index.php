  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
        <!-- <span class="btn btn-warning" onClick="history.back();">Kembali</span> -->
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
      <br>
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Kejadian</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                <i class="fa fa-times"></i></button>
              </div>
            </div>    
            <div class="box-body">
              <div class="col-sm-4 invoice-col">
                <b><?=$key->jenisbencanaNama?></b><br>
                <b><?=$key->dusunNama?>, <?=$key->desaNama?>, <?=$key->kecamatanNama?></b><br>
                <b><?=$key->bencanaHari?>, <?php echo date('d/m/Y', strtotime($key->bencanaTgl));?> <?=$key->bencanaWaktu?></b>
              </div>
            </div>
          </div>
          <section class="invoice">
            <!-- title row -->
            <div class="row">
              <div class="col-xs-12">
                <h2 class="page-header">
                  <i class="fa fa-map"></i> Form Surat Perintah Kaji Cepat
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
                    <input required="required" type="text" class="form-control" name="no_surat_kaji_cepat" value="<?=$key->bencanaNoSuratKajiCepat;?>">
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <strong>Tanggal:</strong>
                  <address>
                    <input required="required" type="text" id="datemask" name="tanggal_kaji_cepat" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask value="<?=$key->bencanaTglKajiCepat;?>">
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
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


          <!-- laporan -->
          <section class="invoice">
            <!-- title row -->
            <div class="row">
              <div class="col-xs-12">
                <h2 class="page-header">
                  <i class="fa fa-map"></i> Form Laporan Kaji Cepat
                  <small class="pull-right"></small>
                </h2>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <form action="<?php echo base_url($module.'export_laporan/'.$idbencana)?>">
                <div class="col-sm-4 invoice-col">
                  <strong>Koordinat:</strong>
                  <address>
                    <div class="col-sm-6">
                      <input required="required" type="text" class="form-control" name="bt" placeholder="BT" 
                      <?php if ($key->bencanaBt!="") {
                        echo 'value="'.$key->bencanaBt.'"';
                      }?>
                      >BT
                    </div>
                    <div class="col-sm-6">
                      <input required="required" type="text" class="form-control" name="ls" placeholder="LS"
                      <?php if ($key->bencanaLs!="") {
                        echo 'value="'.$key->bencanaLs.'"';
                      }?>
                      >LS
                    </div>            
                    
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <strong>Tanggal Pelaksanaan:</strong>
                  <address>
                    <input required="required" type="text" id="datemask2" name="tgl" class="form-control" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask value="<?=$key->bencanaTglKajiCepat;?>">
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <strong>Surat:</strong> 

                  <address>
                    <button  type="submit" class="btn btn-warning pull-left" style="margin-right: 5px;">
                      <i class="fa fa-file-word-o"></i> Export Laporan
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