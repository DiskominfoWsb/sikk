              <table id="tajaxpetugas" class="table table-bordered table-striped data-table">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>NIP</th>
                  <th>Jabatan</th>
                  <th>Pilihan</th>                  
                </tr>
                </thead>
                <tbody>
                <?php foreach($petugas as $key) {?>
                <tr>
                  <td><?=$key->petugasNama?></td>
                  <td><?=$key->petugasNip?></td>
                  <td><?=$key->petugasJabatan?></td>                  <td>
                      <a href="<?php echo base_url('operator/bencana/updatepetugas/'.$key->idpetugas)?>" class="btn btn-sm btn-primary">Pilih</a>                     
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>