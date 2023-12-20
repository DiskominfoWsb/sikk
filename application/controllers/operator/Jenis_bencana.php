<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_bencana extends Operator_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('operator/m_jenis_bencana');
        $this->data['module'] = "operator/jenis_bencana/";         
    }



	public function index()
	{
            $this->page_title->push(lang('menu_jenis_bencana'));
            $this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();


            $this->data['jenis_bencana'] = $this->m_jenis_bencana->get_data();

            /* Load Template */
            $this->template->operator_render('operator/referensi/v_jenis_bencana', $this->data);
	}

  public function add(){
      $this->form_validation->set_rules('nama', 'Jenis Bencana', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
        $array = explode(',', $this->input->post('nama'));
            for ($i=0; $i <count($array) ; $i++) { 
              $data = array(
                      'jenisbencanaNama'               => $array[$i],
                   );        
              if ($data['jenisbencanaNama']!=null) {
                  $proses = $this->m_jenis_bencana->add($data);
              }
            }

                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push(lang('menu_jenis_bencana'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['modal_title'] = 'Tambah Jenis Bencana';
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['subtitle'] = "Tambah Jenis Bencana";
            $this->template->operator_render('operator/referensi/v_jenis_bencana_add', $this->data);
      }

    }

  public function edit($id){
      $this->form_validation->set_rules('nama', 'Jenis Bencana', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'jenisbencanaNama'               => $this->input->post('nama'),
               );        

              $proses = $this->m_jenis_bencana->update($data,$id);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push(lang('menu_jenis_bencana'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['jenis_bencana'] = $this->m_jenis_bencana->get_detail($id);
            $this->data['subtitle'] = "Edit jenis bencana";

            $this->template->operator_render('operator/referensi/v_jenis_bencana_edit', $this->data);
      }

    }

    public function delete($id){
        $proses = $this->m_jenis_bencana->delete($id);
        if ($proses) {
              $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
        }else{
              $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));            
        }
          redirect('operator/jenis_bencana');
    }

}
