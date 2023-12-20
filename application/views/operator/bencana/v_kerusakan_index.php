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
          <b><?=$ben->jenisbencanaNama?></b><br>
          <b><?=$ben->dusunNama?>, <?=$ben->desaNama?>, <?=$ben->kecamatanNama?></b><br>
          <b><?=$ben->bencanaHari?>, <?php echo date('d/m/Y', strtotime($ben->bencanaTgl));?> <?=$ben->bencanaWaktu?></b>

        </div>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>

      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
            <a href="<?php echo site_url($module.'add_kerusakan/'.$ben->idbencana)?>" class="btn btn-success" ><i class="fa fa-plus"></i> Tambah Data</a>
            </div>
          <?php } ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped data-table">
                <thead>
                  <tr>
                    <th>Properti</th>
                    <th>Lokasi Properti</th>
                    <th>Nama Pemilik</th>
                    <th>Kerugian</th>                    
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($kerusakan as $rsk) {?>
                <tr>
                  <td>
                    <?php echo $rsk->kerusakan_propertiNama . "<br />( <span class='text-danger'>" .$rsk->kerusakan_tingkat_rusakNama ."</span>)";?>
                  </td>
                  <td><?php echo $rsk->dusunNama; ?>, <?php echo $rsk->desaNama; ?>, <?php echo $rsk->kecamatanNama; ?></td>
                  <td><?php echo "<strong>" . $rsk->kerusakanNamaPemilik . "</strong><br />Alamat : " . $rsk->kerusakanAlamatPemilik . "<br />Kontak : " . $rsk->kerusakanKontakPemilik; ?></td>               
                  <td style="text-align:right;">Rp <?php echo number_format($rsk->kerusakanKerugian,0); ?></td>                                      
                  <td> 
                  <?php foreach ($bencana as $ben) {?>
                      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?php echo $rsk->idkerusakan?>" title="Hapus"><i class="fa fa-trash"></i></button>   
                          <!-- modal  -->
                          <div class="modal fade" id="modal-hapus<?php echo $rsk->idkerusakan?>">
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
                                  <a href="<?php echo base_url($module.'delete_kerusakan?bencana='.$ben->idbencana.'&kerusakan='.$rsk->idkerusakan)?>" type="button" class="btn btn-danger">Hapus</a>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>                                            
                      <?php } ?>   
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
<?php if( null != $this->uri->segment(5) && $this->uri->segment(5) == "sukses" ){ ?>        
<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("section.content-header h1 span").attr("onclick", "window.location.href='<?php echo site_url( $module . "detail/" . $this->uri->segment(4) ); ?>';");
  });
</script>
<?php } ?>