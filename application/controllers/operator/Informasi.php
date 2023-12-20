<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends Operator_Controller {

  public function __construct()
  {
    parent::__construct();

    /* Load :: Common */
    $this->load->helper('number');
    $this->load->model('operator/m_informasi');
    $this->data['module'] = "operator/informasi/";         
  }



  public function index()
  {
    $this->page_title->push(lang('menu_informasi'));
    $this->data['pagetitle'] = $this->page_title->show();

    /* Breadcrumbs */
    $this->data['breadcrumb'] = $this->breadcrumbs->show();


    $this->data['informasi'] = $this->m_informasi->get_data();

    /* Load Template */
    $this->template->operator_render('operator/referensi/v_informasi', $this->data);
  }

  public function add(){
    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('content', 'Konten', 'required');
    $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');

    if (true == $this->form_validation->run()){                  
      $datainsert = array(
        'judul' => $this->input->post("judul"),
        'content' => $this->input->post("content"),
      );

      $proses = $this->db->insert("informasi", $datainsert);

      if ($proses) {
        $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
      }else{
        $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));            
      }
      redirect($this->data['module']);
    }else{

      $this->page_title->push(lang('menu_informasi'));
      $this->data['pagetitle'] = $this->page_title->show();
      $this->data['modal_title'] = 'Tambah Informasi';
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->data['subtitle'] = "Tambah Informasi";
      $this->template->operator_render('operator/referensi/v_informasi_add', $this->data);
    }

  }

  public function edit($id){
    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('content', 'Isi', 'required');
    $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');

    if (true == $this->form_validation->run()){                  
      $dataupdate = array(
        'judul' => $this->input->post("judul"),
        'content' => $this->input->post("content"),
      );      

      $proses = $this->db->update("informasi", $dataupdate, array("idinformasi" => $id));
      if ($proses) {
        $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
      }else{
        $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));            
      }
      redirect($this->data['module']);
    }else{

      $this->page_title->push(lang('menu_informasi'));
      $this->data['pagetitle'] = $this->page_title->show();
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->data['informasi'] = $this->m_informasi->get_detail($id);
      $this->data['subtitle'] = "Edit Informasi";

      $this->template->operator_render('operator/referensi/v_informasi_edit', $this->data);
    }

  }

  public function delete($id){
    $proses = $this->m_informasi->delete($id);
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
    }else{
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));            
    }
    redirect('operator/informasi');
  }

}
