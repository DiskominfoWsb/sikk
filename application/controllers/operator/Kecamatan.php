<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends Operator_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('operator/m_kecamatan');
        $this->data['module'] = "operator/kecamatan/";        
    }



	public function index()
	{
            $this->page_title->push(lang('menu_data_kecamatan'));
            $this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->data['kecamatan'] = $this->m_kecamatan->get_data();

            /* Load Template */
            $this->template->operator_render('operator/referensi/v_kecamatan_index', $this->data);
	}

  public function add(){
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
        $array_kec = explode(',', $this->input->post('nama'));
            for ($i=0; $i <count($array_kec) ; $i++) { 
              $data = array(
                      'kecamatanNama'               => $array_kec[$i],
                   );        
              if ($data['kecamatanNama']!=null) {
                  $proses = $this->m_kecamatan->add($data);
              }
            }

                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push(lang('menu_data_kecamatan'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['modal_title'] = 'Tambah kecamatan';
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['kecamatan'] = $this->m_kecamatan->get_data();
            $this->data['subtitle'] = "Tambah kecamatan";
            $this->template->operator_render('operator/referensi/v_kecamatan_add', $this->data);
      }

    }

  public function edit($id){
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'kecamatanNama'               => $this->input->post('nama'),
               );        

              $proses = $this->m_kecamatan->update($data,$id);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push(lang('menu_data_kecamatan'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['kecamatan'] = $this->m_kecamatan->get_detail($id);
            $this->data['subtitle'] = "Edit kecamatan";

            $this->template->operator_render('operator/referensi/v_kecamatan_edit', $this->data);
      }

    }

    public function delete($id){
        $proses = $this->m_kecamatan->delete($id);
        if ($proses) {
              $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
        }else{
              $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));            
        }
          redirect('operator/kecamatan');
    }

}
