<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penanganan extends Operator_Controller {

  public function __construct()
  {
    parent::__construct();

    /* Load :: Common */
    $this->load->helper('number');
    $this->load->model(array('operator/m_penanganan','operator/m_bencana'));
    $this->data['module'] = "operator/penanganan/";         
  }



  public function index($id)
  {
    $this->page_title->push(lang('penanganan'));
    $this->data['pagetitle'] = $this->page_title->show();

    /* Breadcrumbs */
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->data['bencana'] = $this->m_bencana->get_detail($id);
    $this->data['penanganan'] = $this->m_penanganan->get_data($id);


    /* Load Template */
    $this->template->operator_render('operator/penanganan/v_penanganan_index', $this->data);
  }

  public function add($id){
    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
    if (true == $this->form_validation->run()){                  
      $foto = "";
      if( !empty($_FILES['foto']['name']) ){
        $config['upload_path']      = './upload/foto_penanganan/';
        $config['allowed_types']    = 'jpeg|jpg|png';
        $config['max_size']         = 5000;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ( $this->upload->do_upload('foto')){
          $foto = $this->upload->data('file_name');
        } else {
          $error = array('error' => $this->upload->display_errors());
          print_r($error);
          exit;
        }
      }

      $array = explode(',', $this->input->post('penanganan'));
      for ($i=0; $i <count($array) ; $i++) { 
        $data = array(
          'penangananJudul'     => $this->input->post('judul'),
          'penangananIdBencana' => $id,
          'penangananTeks'      => $this->input->post('teks'),                      
          'penangananImg'       => $foto,
          'penangananInstaLem'  => $this->input->post('instalem'),
          'penangananOpd'       => $this->input->post('cek_opd'),                                                                  
          'penangananPic'       => $this->input->post('pic'),                                                                  
          'penangananKontak'    => $this->input->post('kontak'),                                                                  
        );   
        if(empty($_FILES['foto']['name'])){
          unset($data['penangananImg']);
        }     
        if ($data['penangananJudul']!=null) {
          $proses = $this->m_penanganan->add($data);
        }
      }

      if ($proses==true) {
        $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
      }else{
        $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));            
      }
      redirect($this->data['module'].'index/'.$id);
    }else{

      $this->page_title->push(lang('penanganan'));
      $this->data['pagetitle'] = $this->page_title->show();
      $this->data['modal_title'] = 'Tambah penanganan';
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->data['subtitle'] = "Tambah penanganan";
      $this->data['bencana'] = $this->m_bencana->get_detail($id);            
      $this->template->operator_render('operator/bencana/v_penanganan_add', $this->data);
    }

  }

  /* Add Saddam 31-03-2018 */
  public function edit($id){
      // Get Data Penanganan
    $this->data['penanganan'] = $this->db->where("idpenanganan", $id)->get("penanganan")->result();
    if(count($this->data['penanganan']) == 0 ){
      redirect( site_url() );
    }
    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
    if (true == $this->form_validation->run()){   
      $foto = "";
      if( !empty($_FILES['foto']['name']) ){
        $config['upload_path']      = './upload/foto_penanganan/';
        $config['allowed_types']    = 'jpeg|jpg|png';
        $config['max_size']         = 5000;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);
        
        if ( $this->upload->do_upload('foto')){
          $foto = $this->upload->data('file_name');
        } else {
          $error = array('error' => $this->upload->display_errors());
          print_r($error);
          exit;
        }
      }

      $array = explode(',', $this->input->post('penanganan'));
      for ($i=0; $i < count($array) ; $i++) { 
        $data = array(
          'penangananJudul'       => $this->input->post('judul'),
          'penangananTeks'        => $this->input->post('teks'),                      
          'penangananImg'         => $foto,
          'penangananInstaLem'    => $this->input->post('instalem'),
          'penangananOpd'         => $this->input->post('cek_opd'),                                                                  
          'penangananPic'         => $this->input->post('pic'),                                                                  
          'penangananKontak'         => $this->input->post('kontak'),                                                                  
        );        
        if(empty($_FILES['foto']['name'])){
          unset($data['penangananImg']);
        }
        if ($data['penangananJudul']!=null) {
                  // $proses = $this->m_penanganan->add($data);
          $proses = $this->db->update("penanganan", $data, array("idpenanganan" => $id));
        }
      }
      if ($proses==true) {
        $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
      }else{
        $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));            
      }
      redirect($this->data['module'].'index/'.$this->data['penanganan'][0]->penangananIdBencana);
    }else{

      $this->data['penanganan'] = $this->data['penanganan'][0];
      $this->page_title->push(lang('penanganan'));
      $this->data['pagetitle'] = $this->page_title->show();
      $this->data['modal_title'] = 'Update penanganan';
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->data['subtitle'] = "Update penanganan";
      $this->data['bencana'] = $this->m_bencana->get_detail($this->data['penanganan']->penangananIdBencana);            
      $this->template->operator_render('operator/bencana/v_penanganan_edit', $this->data);
    }

  }
  /* End Add Saddam */


  public function delete(){
    $id = $this->input->get('penanganan');
    $proses = $this->m_penanganan->delete($id);
    if ($proses) {
      if( $this->input->get('img') != ""){
        unlink('./upload/foto_penanganan/'.$this->input->get('img'));
      }
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
    }else{
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));            
    }
    redirect('operator/penanganan/index/'.$this->input->get('bencana'));
  }

  public function export_laporan($idbencana){
    $this->load->model('operator/m_penanganan');
    $bulan = array ( 1 =>    'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $hari = array ( 1 =>    'Senin',
      'Selasa',
      'Rabu',
      'Kamis',
      'Jumat',
      'Sabtu',
      'Minggu'
    );
    $this->load->model('operator/m_bencana');

    $this->data['title'] = "Laporan Penanganan Darurat Bencana";

    $this->data['petugas'] = $this->m_bencana->get_petugas($idbencana);
    $this->data['bencana'] = $this->m_bencana->get_detail($idbencana);
    $this->data['kerusakan'] = $this->m_bencana->get_kerusakan($idbencana);
    $this->data['pengungsi'] = $this->m_bencana->get_pengungsi($idbencana); 
    $this->data['penanganan'] = $this->m_penanganan->get_data($idbencana); 
    $this->data['petugas'] = $this->m_bencana->get_petugas($idbencana);       
        // hitung korban disini aja :D
    $this->data['jml_md'] = $this->db->query('select count(idkorban) as jml from korban where korbanKondisi=1 and korbanIdBencana='.$idbencana)->result_array();
    $this->data['jml_lb'] = $this->db->query('select count(idkorban) as jml from korban where korbanKondisi=2 and korbanIdBencana='.$idbencana)->result_array();        
    $this->data['jml_lr'] = $this->db->query('select count(idkorban) as jml from korban where korbanKondisi=3 and korbanIdBencana='.$idbencana)->result_array();
    $this->data['jml_hl'] = $this->db->query('select count(idkorban) as jml from korban where korbanKondisi=4 and korbanIdBencana='.$idbencana)->result_array();        
    $this->load->view('operator/penanganan/v_laporan',$this->data);
        // print_r($this->data['jml_hl']['0']['jml']);
  }      

}
