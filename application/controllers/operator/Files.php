<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Files extends Operator_Controller
{

  public function __construct()
  {
    parent::__construct();

    /* Title Page :: Common */
    $this->page_title->push(lang('menu_files'));
    $this->data['pagetitle'] = $this->page_title->show();

    /* Breadcrumbs :: Common */
    $this->breadcrumbs->unshift(1, lang('menu_files'), 'operator/files');
    $this->load->model('operator/m_files');
    $this->data['module'] = "operator/files/";
  }


  public function index()
  {
    $this->data['pagetitle'] = $this->page_title->show();

    /* Breadcrumbs */
    $this->data['breadcrumb'] = $this->breadcrumbs->show();

    $this->data['files'] = $this->m_files->get_data();

    /* Load Template */
    $this->template->operator_render('operator/files/v_files_index', $this->data);
  }


  public function do_upload()
  {

    /* Conf */
    $config['upload_path']      = './upload/files/';
    $config['allowed_types']    = 'jpeg|jpg|png|doc|docx|xls|pdf|xlsx';
    $config['max_size']         = 10000;
    // $config['max_width']        = 1024;
    // $config['max_height']       = 1024;
    $config['file_ext_tolower'] = TRUE;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan. Error:' . $this->upload->display_errors()));
      redirect(base_url('operator/files'));
    } else {
      /* Data */
      $this->data['upload_data'] = $this->upload->data();
      $data = array(
        'filesNama' => $this->upload->data('file_name'),
        'filesSize' => $this->upload->data('file_size'),
        'filesType' => $this->upload->data('file_ext'),
        'filesPath' => base_url('upload/files/' . $this->upload->data('file_name'))
      );
      $this->m_files->add($data);
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
      redirect(base_url('operator/files'));
    }
  }

  public function delete($id)
  {
    $proses = $this->m_files->delete($id);
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));
    }
    redirect('operator/files');
  }
}
