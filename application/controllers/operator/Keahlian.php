<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keahlian extends Operator_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('operator/m_keahlian');
        $this->data['module'] = "operator/keahlian/";
    }



	public function index()
	{
            $this->page_title->push("Data Keahlian Relawan");
            $this->data['pagetitle'] = $this->page_title->show();
            // $this->data['modal_title'] = 'Tambah keahlian';

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->data['keahlian'] = $this->m_keahlian->get_data();

            /* Load Template */
            $this->template->operator_render('operator/referensi/v_keahlian_index', $this->data);
	}

  public function add(){
      $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[ref_keahlian.idKeahlian]');
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'idKeahlian'                 => $this->input->post('kode'),
                  'keahlianNama'               => $this->input->post('nama'),
                  'keahlianKet'                => $this->input->post('ket')
               );        

              $proses = $this->m_keahlian->add($data);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push('Data Keahlian');
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['modal_title'] = 'Tambah keahlian';
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['keahlian'] = $this->m_keahlian->get_data();
            $this->data['subtitle'] = "Tambah keahlian";
            $this->template->operator_render('operator/referensi/v_keahlian_add', $this->data);
      }

    }

  public function edit($id){
      $this->form_validation->set_rules('kode', 'Kode', 'required');
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'idKeahlian'   => $this->input->post('kode'),
                  'keahlianNama' => $this->input->post('nama'),
                  'keahlianKet'  => $this->input->post('ket')
               );      

              $proses = $this->m_keahlian->update($data,$id);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push('Data Keahlian');
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['keahlian'] = $this->m_keahlian->get_detail($id);
            $this->data['subtitle'] = "Edit keahlian";

            $this->template->operator_render('operator/referensi/v_keahlian_edit', $this->data);
      }

    }

    public function delete($id){
        $proses = $this->m_keahlian->delete($id);
        if ($proses) {
              $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
        }else{
              $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));            
        }
          redirect('operator/keahlian');
    }

}
