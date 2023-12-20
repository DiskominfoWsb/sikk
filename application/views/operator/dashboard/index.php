<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <?php echo $dashboard_alert_file_install; ?>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-maroon"><i class="fa fa-bar-chart"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Data Kejadian Bencana</span>
                                    <br>
                                    <span class="info-box-number"></span>
                                    <button class="btn btn-sm btn-default bg-maroon" data-toggle="modal" data-target="#modal-lokasi">Lihat</button>
                    
                          <!-- modal  -->
                          <div class="modal fade" id="modal-lokasi">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Data Kejadian Bencana</h4>
                                </div>
                                <div class="modal-body">
                                  <iframe width="100%" height="400" src="<?php echo base_url('TabelKejadian')?>" frameborder="0"></iframe>
								  <!-- img width="100%" src=""-->
                                </div>
                                <div class="modal-footer">
                                  
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-bar-chart"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Info Grafis</span>
                                    <br>
                                    <span class="info-box-number"></span>
                                <button class="btn btn-sm btn-default bg-green" data-toggle="modal" data-target="#modal-jalan">Lihat</button>
                    
                          <!-- modal  -->
                          <div class="modal fade" id="modal-jalan">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Info Grafis</h4>
                                </div>
                                <div class="modal-body">
                                  <iframe width="100%" height="400" src="<?php echo base_url('Chart')?>" frameborder="0"></iframe>
                                </div>
                                <div class="modal-footer">
                                  
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div> 

                                </div>
                            </div>
                        </div>

                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Users</span>
                                    <span class="info-box-number"><?php echo $count_users; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-shield"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Security groups</span>
                                    <span class="info-box-number"><?php echo $count_groups; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
<?php
/*
if ($url_exist) {
    echo 'OK';
} else {
    echo 'KO';
}
*/
?>
                        </div>

                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Sistem Informasi Kebencanaan Kabupaten</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-left"><strong>BPBD Kabupaten Wonosobo &copy; 2020</strong></p>
                                            <p>
                                                Sistem Informasi Kebencanaan Kabupaten dibangun untuk dapat digunakan sebagai media pengelolaan respon bencana di wilayah Kabupaten Wonosobo.
                                            </p>
                                            <p>
                                                
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
