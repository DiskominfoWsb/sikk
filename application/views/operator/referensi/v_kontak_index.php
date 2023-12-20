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
            <a href="<?php echo base_url('operator/kontak/add')?>" class="btn btn-success" >Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped data-table">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Nomor Kontak</th>
                  <th>Jenis</th>
                  <th>Instansi/Lembaga</th>
                  <th>Keahlian</th>
                  <th width="100px"><center>Pilihan</center></th>
                </tr>
                </thead>
                <tbody>
                <?php if ($kontak!=null) {?>
                <?php foreach ($kontak as $key) {?>
                  <tr>
                    <td><?=$key->kontakNama?></td>
                    <td><?=$key->kontakNomor?></td>         
                      <td><?php
                      if ($key->kontakJenis==1) {
                        echo "Instansi";
                      }else{
                        echo "Personil";
                      }
                      ?></td>
                    <td><?=$key->kontakLem?></td>
                    <td><?=$key->kontakKeahlian?></td>                                                   
                    <td>
                        <a href="<?php echo base_url($module.'edit/'.$key->idkontak)?>" class="btn btn-sm btn-warning" >Edit</a>  
                          <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?php echo $key->idkontak?>">Hapus</button>     
                                  <div class="modal fade" id="modal-hapus<?php echo $key->idkontak?>">
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
                                <a href="<?php echo base_url($module.'delete/'.$key->idkontak)?>" type="button" class="btn btn-danger">Hapus</a>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>  
                        
                    </td>
                  </tr>
                <?php } 
                  }
                  ?>
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

<!-- modal  -->
      