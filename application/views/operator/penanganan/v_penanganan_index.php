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
      <?php foreach ($bencana as $ben) {?>
          <b><?php echo $ben->jenisbencanaNama?></b><br>
          <b><?php echo $ben->dusunNama?>, <?php echo $ben->desaNama?>, <?php echo $ben->kecamatanNama?></b><br>
          <b><?php echo $ben->bencanaHari?>, <?php echo date('d/m/Y', strtotime($ben->bencanaTgl));?> <?php echo $ben->bencanaWaktu?></b>
          <br><br>
          <a href="<?php echo base_url($module.'export_laporan/'.$ben->idbencana)?>"  class="btn bg bg-maroon collor-pallete pull-left" style="margin-right: 5px;">
            <i class="fa fa-file-word-o"></i> Export Laporan
          </a>           
        </div>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>

      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
            <a href="<?php echo site_url($module.'add/'.$ben->idbencana)?>" class="btn btn-success" >Tambah Data</a>
            </div>
          <?php } ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped data-table">
                <thead>
                  <tr>
                    <th>Waktu</th>
                    <th>Judul</th>
                    <th>Instansi/Lembaga</th>
                    <th>Penanganan</th>
                    <th>Keterangan</th>
                    <th>Foto</th>
                    <th style="width: 60px;">Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($penanganan as $pen) {?>
                <tr>
                    <td><?php echo $pen->penangananDateTime; ?></td>
                    <td><?php echo $pen->penangananJudul; ?></td>
                    <td><?php echo $pen->penangananInstaLem . "<br />Oleh : " . $pen->penangananPic . "<br />(" . $pen->penangananKontak . ")"; ?></td>
                    <td><?php
                      $penanganan = $this->m_penanganan->getPenanganan();
                      $pen->penangananOpd = ( $pen->penangananOpd ) ? $pen->penangananOpd : 0 ;
                      echo $penanganan[$pen->penangananOpd];
                    ?></td>                                        
                    <td><?php echo $pen->penangananTeks?></td>
                    <td>
                    <?php if ($pen->penangananImg!=null) {?>
                  <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-foto<?php echo $pen->idpenanganan?>">Lihat</button>
                    <?php }else{
                        echo "Tidak ada foto";
                      }?>   
                          <!-- modal  -->
                          <div class="modal fade" id="modal-foto<?php echo $pen->idpenanganan?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Foto Penanganan</h4>
                                </div>
                                <div class="modal-body">
                                  <img width="100%" src="<?php echo base_url('upload/foto_penanganan/'.$pen->penangananImg)?>">
                                </div>
                                <div class="modal-footer">
                                  
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>                      

                    </td>
                  <td> 
                      <a class="btn btn-sm btn-success" href="<?php echo site_url($module . "edit/" . $pen->idpenanganan); ?>"><i class="fa fa-edit"></i></a>   
                      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?php echo $pen->idpenanganan?>"><i class="fa fa-trash"></i></button>   
                          <!-- modal  -->
                          <div class="modal fade" id="modal-hapus<?php echo $pen->idpenanganan ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Hapus data?</h4>
                                </div>
                                <div class="modal-body">
                                  <p>Apa anda yakin ingin menghapus data ini?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                                  <a href="<?php echo base_url($module.'delete?bencana='.$ben->idbencana.'&penanganan='.$pen->idpenanganan)?>" type="button" class="btn btn-danger">Hapus</a>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>   
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<!-- modal -->
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="modal-hapus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus data?</h4>
              </div>
              <div class="modal-body">
                <p>Apa anda yakin ingin menghapus data ini?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <a href="#" type="button" class="btn btn-danger">Hapus</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>        