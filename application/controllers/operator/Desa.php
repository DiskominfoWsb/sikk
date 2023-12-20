<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends Operator_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('operator/m_desa');
        $this->data['module'] = "operator/desa/";         
    }



	public function index()
	{
            $this->page_title->push(lang('menu_data_desa'));
            $this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            $this->data['desa'] = $this->m_desa->get_data();


            /* Load Template */
            $this->template->operator_render('operator/referensi/v_desa_index', $this->data);
	}

  public function add(){
      $this->form_validation->set_rules('desa', 'Desa', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
        $array = explode(',', $this->input->post('desa'));
            for ($i=0; $i <count($array) ; $i++) { 
              $data = array(
                      'desaNama'               => $array[$i],
                      'desaIdKecamatan'        => $this->input->post('idkecamatan')
                   );        
              if ($data['desaNama']!=null) {
                  $proses = $this->m_desa->add($data);
              }
            }

                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push(lang('menu_data_desa'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['modal_title'] = 'Tambah desa';
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->load->model('operator/m_chain_wilayah');
            $this->data['kecamatan'] = $this->m_chain_wilayah->get_kecamatan();            
            $this->data['desa'] = $this->m_desa->get_data();
            $this->data['subtitle'] = "Tambah desa";
            $this->template->operator_render('operator/referensi/v_desa_add', $this->data);
      }

    }

  public function edit($id){
      $this->form_validation->set_rules('desa', 'Desa', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'desaNama'               => $this->input->post('nama'),
               );        

              $proses = $this->m_desa->update($data,$id);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push(lang('menu_data_desa'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['desa'] = $this->m_desa->get_detail($id);
            $this->data['subtitle'] = "Edit desa";

            $this->template->operator_render('operator/referensi/v_desa_edit', $this->data);
      }

    }

    public function delete($id){
        $proses = $this->m_desa->delete($id);
        if ($proses) {
              $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
        }else{
              $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));            
        }
          redirect('operator/desa');
    }

}
