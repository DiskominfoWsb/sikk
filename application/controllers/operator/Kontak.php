<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends Operator_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('operator/m_kontak');
        $this->data['module'] = "operator/kontak/";
    }



	public function index()
	{
            $this->page_title->push(lang('menu_kontak'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['modal_title'] = 'Tambah Kontak';

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->data['kontak'] = $this->m_kontak->get_data();

            /* Load Template */
            $this->template->operator_render('operator/referensi/v_kontak_index', $this->data);
	}

  public function add(){
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('jenis', 'Jenis Kontak', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'kontakNama'               => $this->input->post('nama'),
                  'kontakJenis'                => $this->input->post('jenis'),
                  'kontakNomor'                 => $this->input->post('nomor'),
                  'kontakLem'                 => $this->input->post('lembaga'),
                  'kontakKeahlian'                 => $this->input->post('keahlian'),                                    
               );        

              $proses = $this->m_kontak->add($data);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));            
                }
                      redirect('operator/kontak');
      }else{
      
            $this->page_title->push(lang('menu_kontak'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['modal_title'] = 'Tambah Kontak';
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['kontak'] = $this->m_kontak->get_data();
            $this->data['subtitle'] = "Tambah Kontak";
            $this->data['module'] = "operator/kontak/";
            $this->template->operator_render('operator/referensi/v_kontak_add', $this->data);
      }

    }

  public function edit($id){
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('jenis', 'Jenis Kontak', 'required');
      $this->form_validation->set_rules('nomor', 'Nomor kontak', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'kontakNama'               => $this->input->post('nama'),
                  'kontakJenis'                => $this->input->post('jenis'),
                  'kontakNomor'                 => $this->input->post('nomor'),
                  'kontakLem'                 => $this->input->post('lembaga'),
                  'kontakKeahlian'                 => $this->input->post('keahlian'),                                    
               );    

              $proses = $this->m_kontak->update($data,$id);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));            
                }
                      redirect('operator/kontak');
      }else{
      
            $this->page_title->push(lang('menu_kontak'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['kontak'] = $this->m_kontak->get_detail($id);
            $this->data['subtitle'] = "Edit Kontak";

            $this->template->operator_render('operator/referensi/v_kontak_edit', $this->data);
      }

    }

    public function delete($id){
        $proses = $this->m_kontak->delete($id);
        if ($proses) {
              $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
        }else{
              $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));            
        }
          redirect('operator/kontak');
    }
// end
}
