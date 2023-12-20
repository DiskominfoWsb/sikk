  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php echo $pagetitle; ?>
      <?php echo $breadcrumb; ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $dashboard_alert_file_install; ?>
      <?php if ($this->session->flashdata('message_form')) { //pesan alert proses
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
              <a href="<?php echo site_url($module . 'add_bencana') ?>" class="btn btn-success">Tambah Data</a>
              <!-- <button class="btn pull-right btn-warning" data-toggle="modal" data-target="#modal-export"><i class="fa fa-file-word-o"></i> Export Laporan</button>    -->
              <!-- modal  -->
              <!-- <div class="modal fade" id="modal-export">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Filter Laporan</h4>
                                </div>
                              <div class="modal-body">
                              <form action="<?php echo site_url($module . 'export_laporan') ?>" method="post">
                                <select class="form-control" name="bulan">
                                    <option value="">--Pilih Bulan--</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desemer</option>                                    
                                  </select><br>
                                <select class="form-control" name="tahun">
                                    <option value="">--Pilih Tahun--</option>
                                    <?php $thn = $this->db->query('SELECT year(bencanaTgl) as tahun FROM bencana group by tahun')->result();
                                    foreach ($thn as $t) { ?>
                                    <option value="<?php echo $t->tahun; ?>"><?php echo $t->tahun; ?></option>
                                    <?php } ?>
                                  </select>  
                                  <br /> 
                                  <select class="form-control" name="format">
                                    <option value="word">Ms. Word</option>
                                    <option value="excel">Ms. Excel</option>
                                  </select>
                                  </form>                             
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                                   <button type="submit" class="btn btn-warning"><i class="fa fa-file-word-o"></i>Export</button>
                                </div>
                              </div>
                            </div>
                          </div>       -->

              <!-- <button class="btn pull-right btn-primary" data-toggle="modal" data-target="#modal-import"><i class="fa fa-file-excel-o"></i> Import Data (.xls)</button> -->
              <!-- modal  -->
              <div class="modal fade" id="modal-import">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Filter Laporan</h4>
                    </div>
                    <div class="modal-body">
                      <?php echo form_open_multipart(site_url() . '/operator/ExcelDataInsert/ImportBencana'); ?>
                      <input type="file" name="import_xls">
                      <small>Pilih file .xls yang akan di import.</small>
                      <small><strong>PENTING!!</strong> Format import data bencana silahkan unduh <a href="">disini</a>.</small>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-file-excel-o"></i>Import</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped data-table">
                <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Jenis Bencana</th>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Pilihan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($bencana as $key) { ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $key->jenisbencanaNama ?></td>
                      <td><?php echo $key->bencanaHari ?></td>
                      <td><?php echo date('d/m/Y', strtotime($key->bencanaTgl)); ?></td>
                      <td><?php echo $key->bencanaWaktu ?></td>
                      <td><?php echo $key->bencanaNamaKampung ?>, <?php echo $key->dusunNama ?>, <?php echo $key->desaNama ?>, Kec. <?php echo $key->kecamatanNama ?></td>
                      <td><?php echo $this->m_bencana->getLastStatus($key->idbencana); ?></td>
                      <td>
                        <a href="<?php echo site_url('operator/bencana/detail/' . $key->idbencana) ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?php echo $key->idbencana ?>"><i class="fa fa-trash"></i></button>
                        <!-- modal  -->
                        <div class="modal fade" id="modal-hapus<?php echo $key->idbencana ?>">
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
                                <a href="<?php echo site_url($module . 'delete/' . $key->idbencana) ?>" type="button" class="btn btn-danger">Hapus</a>
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