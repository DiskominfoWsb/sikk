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
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
            <a href="<?php echo base_url($module.'add')?>" class="btn btn-success">Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped data-table">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Pangkat/Golongan</th>
                  <th>Jabatan</th>
                  <th>No. HP</th>
                  <th width="100px"><center>Pilihan</center></th>
                </tr>
                </thead>
                <tbody>
                <?php if ($petugas!=null) {?>
                <?php foreach ($petugas as $key) {?>
                  <tr>
                    <td><?=$key->petugasNama?></td>
                      <td><?=$key->petugasNip?></td>
                      <td><?=$key->petugasPangkat?>/<?=$key->petugasGolongan?></td>                               
                    <td><?=$key->petugasJabatan?></td>
                    <td><?=$key->petugasNohp?></td>         
                    <td>
                        <a href="<?php echo base_url($module.'edit/'.$key->idpetugas)?>" class="btn btn-sm btn-warning">Edit</a> 
                        
                          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?php echo $key->idpetugas?>">Hapus</button>   
                          <!-- modal  -->
                          <div class="modal fade" id="modal-hapus<?php echo $key->idpetugas?>">
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
                                  <a href="<?php echo base_url($module.'delete/'.$key->idpetugas)?>" type="button" class="btn btn-danger">Hapus</a>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>          

                    </td>
                  </tr>
                <?php } }?>
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



