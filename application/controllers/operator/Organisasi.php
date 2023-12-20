<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisasi extends Operator_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('operator/m_organisasi');
        $this->data['module'] = "operator/organisasi/";
    }



	public function index()
	{
            $this->page_title->push("Data Organisasi Relawan");
            $this->data['pagetitle'] = $this->page_title->show();
            // $this->data['modal_title'] = 'Tambah organisasi';

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->data['organisasi'] = $this->m_organisasi->get_data();

            /* Load Template */
            $this->template->operator_render('operator/referensi/v_organisasi_index', $this->data);
	}

  public function add(){
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'orgNama'               => $this->input->post('nama'),
                  'orgTelp'                => $this->input->post('telp')
               );        

              $proses = $this->m_organisasi->add($data);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push(lang('menu_organisasi'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['modal_title'] = 'Tambah organisasi';
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['organisasi'] = $this->m_organisasi->get_data();
            $this->data['subtitle'] = "Tambah organisasi";
            $this->template->operator_render('operator/referensi/v_organisasi_add', $this->data);
      }

    }

  public function edit($id){
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'orgNama'               => $this->input->post('nama'),
                  'orgTelp'                => $this->input->post('telp')
               );      

              $proses = $this->m_organisasi->update($data,$id);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push(lang('menu_organisasi'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['organisasi'] = $this->m_organisasi->get_detail($id);
            $this->data['subtitle'] = "Edit organisasi";

            $this->template->operator_render('operator/referensi/v_organisasi_edit', $this->data);
      }

    }

    public function delete($id){
        $proses = $this->m_organisasi->delete($id);
        if ($proses) {
              $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
        }else{
              $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));            
        }
          redirect('operator/organisasi');
    }

}
