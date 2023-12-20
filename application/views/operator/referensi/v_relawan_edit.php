  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $dashboard_alert_file_install; ?>    
      <?php if ($this->session->flashdata('msg')) {?>
        <div class="alert alert-<?php echo $msgclass?>">
          <strong>Info:</strong> <?php echo $this->session->flashdata('msg');?>
        </div>
      <?php } ?>
      <div class="row">
          <div class="box  col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <div class="box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $subtitle?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php 
            foreach ($relawan as $key) {?>
            <form class="form-horizontal" action="<?php echo base_url($module.'edit/'.$key->idrel)?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3"  class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input class="form-control" value="<?=$key->relNama?>" name="nama" required="required" placeholder="Nama Lengkap" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIK</label>

                  <div class="col-sm-10">
                  <input type="text" name="nik" required="required" value="<?=$key->relNik?>" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" required="required"><?=$key->relAlamat?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">RT/RW</label>

                  <div class="col-sm-10">
                  <input type="text" name="rtrw" class="form-control" value="<?=$key->relRtRw?>">
                  </div>
                </div>                                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kecamatan</label>

                  <div class="col-sm-10">
                    <?php
                    $style_kecamatan='class="form-control input-sm" id="idkecamatan" data-value="'.$key->relIdKec.'" onChange="tampilDesa()" name="kecamatan"';
                    echo form_dropdown('idkecamatan',$kecamatan,$key->relIdKec,$style_kecamatan);
                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Desa</label>

                  <div class="col-sm-10">
                    <?php
                      $style_desa='class="form-control input-sm" id="iddesa" data-value="'.$key->relIdDesa.'" onChange="tampilDusun()" name="desa"';
                      echo form_dropdown("iddesa",array('Pilih Desa'=>'- Pilih Desa -'),'',$style_desa);
                      ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Dusun</label>

                  <div class="col-sm-10">
                    <?php
                      $style_dusun='class="form-control input-sm" id="iddusun" data-value="'.$key->relIdDusun.'" name="dusun"';
                      echo form_dropdown("iddusun",array('Pilih Dusun'=>'- Pilih Dusun -'),'',$style_dusun);
                      ?>
                  </div>
                </div>   
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telp</label>

                  <div class="col-sm-10">
                  <input type="text" name="telp" class="form-control"  value="<?=$key->relTelp?>">
                  </div>
                </div>                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pendidikan</label>

                  <div class="col-sm-10">
                     <select name="pend" class="form-control">
                        <?php foreach ($pendidikan as $p) {?>
                          <option <?php if ($p->idRefPend==$key->relIdPend): ?>
                            selected="selected"
                          <?php endif ?> value="<?=$p->idRefPend?>"><?=$p->refPendNama?></option>
                        <?php } ?>
                     </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Organisasi</label>

                  <div class="col-sm-10">
                     <select name="org" class="form-control">
                        <?php foreach ($organisasi as $org) {?>
                          <option <?php if ($org->idOrg==$key->relIdOrg): ?>
                            selected="selected"
                          <?php endif ?> value="<?=$org->idOrg?>"><?=$org->orgNama?></option>
                        <?php } ?>
                     </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keahlian</label>

                  <div class="col-sm-10">
                        <?php 
                        $relk = array();
                        foreach($relKeahlian as $rk){
                          $relk[] = $rk->idKeahlian;
                        }

                          foreach ($keahlian as $k) {

                            $checked = in_array($k->idKeahlian, $relk) ? "checked" : null;
                        ?>
                          <input type="checkbox" <?php echo $checked; ?> name="keahlian[]"  value="<?=$k->idKeahlian?>"> <?=$k->keahlianNama?><br>
                          <small><i><font color="red"><?=$k->keahlianKet?></font></i></small><br>
                        <?php } ?>
                  </div>
                </div>                
                <?php } ?>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url($module)?>"  class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
            </div>
              <!-- /.box-footer -->
            </form>
            <!-- </div> -->
          </div>
          </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
    $(function(){
      $("#idkecamatan").trigger("change");
      setTimeout("$('#iddesa').val( $('#iddesa').attr('data-value'));",500);
      setTimeout("$('#iddesa').trigger('change');",500);
      setTimeout("$('#iddusun').val( $('#iddusun').attr('data-value'));",700);
    });
  </script>



