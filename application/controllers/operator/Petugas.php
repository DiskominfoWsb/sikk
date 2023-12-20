<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends Operator_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('operator/m_petugas');
        $this->data['module'] = "operator/petugas/";
    }



	public function index()
	{
            $this->page_title->push(lang('menu_petugas'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['modal_title'] = 'Tambah petugas';

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->data['petugas'] = $this->m_petugas->get_data();

            /* Load Template */
            $this->template->operator_render('operator/referensi/v_petugas_index', $this->data);
	}

  public function add(){
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'petugasNama'               => $this->input->post('nama'),
                  'petugasNip'                => $this->input->post('nip'),
                  'petugasPangkat'                => $this->input->post('pangkat'),
                  'petugasGolongan'                => $this->input->post('golongan'),                                    
                  'petugasJabatan'            => $this->input->post('jabatan'),
                  'petugasNohp'            => $this->input->post('nomerhp'),
               );        

              $proses = $this->m_petugas->add($data);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push(lang('menu_petugas'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['modal_title'] = 'Tambah petugas';
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['petugas'] = $this->m_petugas->get_data();
            $this->data['subtitle'] = "Tambah petugas";
            $this->template->operator_render('operator/referensi/v_petugas_add', $this->data);
      }

    }

  public function edit($id){
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('nip', 'NIP', 'required');
      $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'petugasNama'               => $this->input->post('nama'),
                  'petugasNip'                => $this->input->post('nip'),
                  'petugasPangkat'                => $this->input->post('pangkat'),
                  'petugasGolongan'                => $this->input->post('golongan'),                                    
                  'petugasJabatan'            => $this->input->post('jabatan'),
                  'petugasNohp'            => $this->input->post('nomerhp'),
               );      

              $proses = $this->m_petugas->update($data,$id);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push(lang('menu_petugas'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['petugas'] = $this->m_petugas->get_detail($id);
            $this->data['subtitle'] = "Edit petugas";

            $this->template->operator_render('operator/referensi/v_petugas_edit', $this->data);
      }

    }

    public function delete($id){
        $proses = $this->m_petugas->delete($id);
        if ($proses) {
              $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
        }else{
              $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));            
        }
          redirect('operator/petugas');
    }

}
