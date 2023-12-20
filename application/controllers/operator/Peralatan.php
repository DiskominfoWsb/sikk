<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peralatan extends Operator_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('operator/m_peralatan');
        $this->data['module'] = "operator/Peralatan/";
    }



	public function index()
	{
            $this->page_title->push(lang('menu_peralatan'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['modal_title'] = 'Tambah Peralatan';

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->data['peralatan'] = $this->m_peralatan->get_data();
            /* Load Template */
            $this->template->operator_render('operator/referensi/v_peralatan_index', $this->data);
	}

  public function add(){
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('jml', 'Jumlah', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'peralatanNama'               => $this->input->post('nama'),
                  'peralatanJml'                => $this->input->post('jml'),
                  'peralatanPemilik'            => $this->input->post('pemilik'),
                  'peralatanPenanggungJawab'    => $this->input->post('penanggungjawab'),
                  'peralatanKontak'             => $this->input->post('kontak'),
               );        

              $proses = $this->m_peralatan->add($data);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push(lang('menu_peralatan'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['modal_title'] = 'Tambah Peralatan';
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['Peralatan'] = $this->m_peralatan->get_data();
            $this->data['subtitle'] = "Tambah Peralatan";
            $this->template->operator_render('operator/referensi/v_peralatan_add', $this->data);
      }

    }

  public function edit($id){
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('jml', 'Jumlah', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'peralatanNama'               => $this->input->post('nama'),
                  'peralatanJml'                => $this->input->post('jml'),
                  'peralatanPemilik'            => $this->input->post('pemilik'),                  
                  'peralatanPenanggungJawab'    => $this->input->post('penanggungjawab'),                  
                  'peralatanKontak'            => $this->input->post('kontak'),                  
               );        

              $proses = $this->m_peralatan->update($data,$id);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push(lang('menu_peralatan'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['peralatan'] = $this->m_peralatan->get_detail($id);
            $this->data['subtitle'] = "Edit Peralatan";

            $this->template->operator_render('operator/referensi/v_peralatan_edit', $this->data);
      }

    }

    public function delete($id){
        $proses = $this->m_peralatan->delete($id);
        if ($proses) {
              $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
        }else{
              $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));            
        }
          redirect('operator/Peralatan');
    }

}
