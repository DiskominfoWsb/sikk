<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b><?php echo lang('footer_version'); ?></b> 1.0
                </div>
                <strong><?php echo lang('footer_copyright'); ?> &copy; 2020 <a href="https://bpbd.wonosobokab.go.id/" target="_blank">BPBD Kab. Wonosobo</a> &amp; Developed by <a href="http://sinaugis.com" target="_blank">sinaugis.com</a>.</strong> <?php echo lang('footer_all_rights_reserved'); ?>.
            </footer>
        </div>






        
       <!-- datatables -->
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js');?>"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script> 
        <script type="text/javascript" src="<?php echo base_url($frameworks_dir . '/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url($plugins_dir . '/slimscroll/slimscroll.min.js'); ?>"></script>
        <!-- input mask -->
        <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js');?>"></script>
        <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js');?>"></script>
        <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js');?>"></script>  
        <!-- end input mask -->

        <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
        <!-- date picker -->
        <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js');?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
        

<?php if ($mobile == TRUE): ?>
        <script src="<?php echo base_url($plugins_dir . '/fastclick/fastclick.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($admin_prefs['transition_page'] == TRUE): ?>
        <script src="<?php echo base_url($plugins_dir . '/animsition/animsition.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'users' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script src="<?php echo base_url($plugins_dir . '/pwstrength/pwstrength.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($this->router->fetch_class() == 'groups' && ($this->router->fetch_method() == 'create' OR $this->router->fetch_method() == 'edit')): ?>
        <script src="<?php echo base_url($plugins_dir . '/tinycolor/tinycolor.min.js'); ?>"></script>
        <script src="<?php echo base_url($plugins_dir . '/colorpickersliders/colorpickersliders.min.js'); ?>"></script>
<?php endif; ?>
        <script src="<?php echo base_url($frameworks_dir . '/adminlte/js/adminlte.min.js'); ?>"></script>
        <script src="<?php echo base_url($frameworks_dir . '/domprojects/js/dp.min.js'); ?>"></script>
    
        <script src="<?php echo base_url('assets/plugins/select2/select2.full.min.js');?>"></script>

  <script type="text/javascript" >
  $(function () {
    $("#example1").DataTable();
    $("#tajaxpetugas").DataTable();    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });


</script>

<!-- start bencana -->
<?php if ($module=='operator/bencana/' || $module=='operator/relawans/' ) {?>
<script type="text/javascript">


      $('.getJenBen').select2({

        placeholder: '--- Pilih Jenis Bencana ---',

        ajax: {

          url: '<?php echo base_url('')?>data_source/index.php/ref_jenis_bencana/get_jenis',

          dataType: 'json',

          delay: 250,

          processResults: function (data) {

            return {

              results: data

            };

          },

          cache: true,

        }

      });

</script>

<script>
function tampilDesa()
 {
   idkecamatan = document.getElementById("idkecamatan").value;
   $.ajax({
     url:"<?php echo site_url();?>operator/bencana/pilih_desa/"+idkecamatan+"",
     success: function(response){
     $("#iddesa").html(response);
     },
     dataType:"html"
   });
   return false;
 }

 function tampilDusun()
 {
   iddesa = document.getElementById("iddesa").value;
   $.ajax({
     url:"<?php echo site_url();?>operator/bencana/pilih_dusun/"+iddesa+"",
     success: function(response){
     $("#iddusun").html(response);
     },
     dataType:"html"
   });
   return false;
 }


 function setLokasiToMaps(){
  idDusun = document.getElementById("iddusun").value;
    $.ajax({
     url:"<?php echo site_url();?>operator/bencana/setLocToMaps/"+idDusun+"",
     success: function(response){
      fullLoc = val(data.dusunNama)+', '+ val(data.desaNama)+ ', '+ val(data.kecamatanNama);
     $("#address").fullLoc;
     },
     dataType:"html"
   });
   return false; 
 }

</script>

<!-- detail bencana -->
<script type="text/javascript">

// petugas
  function ajaxPetugas()
   {
     $.ajax({
       url:"<?php echo site_url();?>operator/bencana/ajax?tampil=petugas",
       success: function(response){
       $("#tampilpetugas").html(response);
       },
       dataType:"html"
     });
     return false;
   }

</script>

<script>
  // $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('textckeditor1');
    //bootstrap WYSIHTML5 - text editor
    // $(".textarea").wysihtml5();
  // });
</script>
<?php } ?>
<!-- end modul bencana -->

<script type="text/javascript">
      //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
</script>


<script type="text/javascript">
        $("#datemask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
        $("#datemask2").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
        $("#timemask").inputmask("hh:mm", {"placeholder": "hh:mm"});        
</script>

<!-- getKec,getDes -->
<?php if ($module=='operator/desa/') {?>
<script type="text/javascript">


      $('.getKec').select2({

        placeholder: '--- Pilih Kecamatan ---',

        ajax: {

          url: '<?php echo site_url('')?>data_source/index.php/ref_wilayah/get_kecamatan',

          dataType: 'json',

          delay: 250,

          processResults: function (data) {

            return {

              results: data

            };

          },

          cache: true,

        }

      });

</script>

<?php } ?>
<?php if ($module=='operator/dusun/') {?>
<script type="text/javascript">

  function tampilDesa()
   {
     idkecamatan = document.getElementById("idkecamatan").value;
     $.ajax({
       url:"<?php echo site_url();?>operator/bencana/pilih_desa/"+idkecamatan+"",
       success: function(response){
       $("#iddesa").html(response);
       },
       dataType:"html"
     });
     return false;
   }

</script>

<?php } ?>
