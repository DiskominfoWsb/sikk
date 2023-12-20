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
            <div class="btn-group pull-right">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-import"><i class="fa fa-file-excel-o"></i> Import Data (.xls)</button>   
            </div>
            <!-- modal  -->
            <div class="modal fade" id="modal-import">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <form action="<?php echo site_url().'/operator/ImportXlsRelawan/import'; ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Import Relawan</h4>
                      </div>
                      <div class="modal-body">
                        <input type="file" name="import_xls">  
                        <input type="checkbox" name="delete_all" /><strong class='text-danger'>Delete Data Sebelumnya</strong>
                        <br /><br />
                        <small>Pilih file .xls yang akan di import.</small>
                        <small><strong>PENTING!!</strong> Format import data relawan silahkan unduh <a href="#">disini</a>.</small>                 
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-file-excel-o"></i>Import</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>                       
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row" style="margin-bottom: 12px;">
                <div class="col-md-4">
                  <label>Keahlian : </label>
                  <select name="keahlian" class="form-control" id="keahlian">
                    <option value="">--Semua Keahlian--</option>
                    <?php 
                    foreach($keahlian as $ahli){
                      $selected = ($selected_keahlian == $ahli->idKeahlian) ? "selected" : null;
                      echo "<option ".$selected." value='".$ahli->idKeahlian."'>".$ahli->keahlianNama."</option>"; 
                    } ?>
                  </select>
                </div>
              </div>
              <script type="text/javascript">
                $(function(){
                  $("#keahlian").on("change", function(){
                    var idKeahlian = $(this).val();
                    // alert(idKeahlian);
                    window.location.href= "<?php echo site_url($module); ?>/index/" + $(this).val();
                  });
                });
              </script>
              <table id="dataTable" class="table table-bordered table-striped data-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>Pendidikan</th>
                    <th>Organisasi</th>
                    <th>Keahlian</th>
                    <th>Telp.</th>
                    <th width="100px"><center>Pilihan</center></th>
                  </tr>
                </thead>
                <tbody>
                <?php /*
                <?php if ($relawan!=null) {?>
                  <?php 
                  $no = 1;
                  foreach ($relawan as $key) {
                    $keahlian = $this->m_relawans->getKeahlianRelawan($key->idrel);
                  ?>
                    <tr>
                      <td><?php echo $no; ?>.</td>
                      <td><?php echo $key->relNama?></td>
                      <td>'<?php echo $key->relNik?></td>
                      <td><?php echo $key->relAlamat?>, <?php echo $key->dusunNama?>, <?php echo $key->desaNama?>, <?php echo $key->kecamatanNama?></td>
                      <td><?php echo $key->refPendNama?></td>
                      <td><?php echo $key->orgNama?></td>                                                     
                      <td><?php echo $keahlian; ?></td>
                      <td>'<?php echo $key->relTelp?></td>         
                      <td>
                        <a href="<?php echo base_url($module.'edit/'.$key->idrel)?>" class="btn btn-sm btn-warning">Edit</a> 
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?php echo $key->idrel?>">Hapus</button>   
                        <!-- modal  -->
                        <div class="modal fade" id="modal-hapus<?php echo $key->idrel?>">
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
                                  <a href="<?php echo base_url($module.'delete/'.$key->idrel)?>" type="button" class="btn btn-danger">Hapus</a>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>          

                        </td>
                      </tr>
                    <?php $no++; } }?>
                    */ ?>
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

    <script type="text/javascript" src="<?php echo base_url("bower_components/js-xlsx/dist/xlsx.core.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("bower_components/file-saverjs/FileSaver.min.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("bower_components/tableexport.js/dist/js/tableexport.min.js"); ?>"></script>   
  <script type="text/javascript">
    <?php
    $columns = "";
    $columns.='{ "data": "seq", "orderable": false, "searchable": false },';
    $columns.='{ "data": "relNama", "orderable": true },';
    $columns.='{ "data": "relNik", "orderable": true },';
    $columns.='{ "data": "relAlamat", "orderable": true },';
    $columns.='{ "data": "refPendNama", "orderable": true },';
    $columns.='{ "data": "orgNama", "orderable": true },';
    $columns.='{ "data": "keahlian", "orderable": true },';
    $columns.='{ "data": "relTelp", "orderable": true },';
    $columns.='{ "data": "action", "orderable": false, "searchable": false }';
    ?>
    $(function(){
      $("#dataTable").DataTable( {
        "processing": false,
        "serverSide": true,
        "ajax": {
          url : "<?php echo site_url( $this->router->fetch_directory() . $this->router->fetch_class() ); ?>/getData/<?php echo $selected_keahlian; ?>",
          type : "POST",
              // error: function (xhr, error, thrown) {
              //   bootbox.alert(xhr.responseText);
              // }
            },
            "columns": [
              <?php echo $columns; ?>
            ],
            "autoWidth": false,
            "dom": "Bflrtip",
            "buttons": [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                    }
                },
            ]
            });
    });
  </script>


