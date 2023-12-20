<tr>
                  <td><?=$key->idbencana?></td>
                  <td><?=$key->jenisbencanaNama?></td>
                  <td><?=$key->bencanaHari?></td>
                  <td><?php echo date('d/m/Y', strtotime($key->bencanaTgl));?></td>
                  <td><?=$key->bencanaWaktu?></td>
                  <td><?=$key->dusunNama?>, <?=$key->desaNama?>, <?=$key->kecamatanNama?></td>
                  <td>
                      <a href="<?php echo base_url('operator/bencana/detail/'.$key->idbencana)?>" class="btn btn-sm btn-primary">Detail & Pembaruan</a>                       
                      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?php echo $key->idbencana?>">Hapus</button>   
                          <!-- modal  -->
                          <div class="modal fade" id="modal-hapus<?php echo $key->idbencana?>">
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
                                  <a href="<?php echo base_url($module.'delete/'.$key->idbencana)?>" type="button" class="btn btn-danger">Hapus</a>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>                  
                  </td>
                </tr>