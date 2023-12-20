<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dusun extends Operator_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('operator/m_dusun');
        $this->data['module'] = "operator/dusun/";        
    }



	public function index()
	{
            $this->page_title->push(lang('menu_data_dusun'));
            $this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();


            $this->data['dusun'] = $this->m_dusun->get_data();

            /* Load Template */
            $this->template->operator_render('operator/referensi/v_dusun_index', $this->data);
	}
  public function add(){
      $this->form_validation->set_rules('dusun', 'Dusun', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
        $array = explode(',', $this->input->post('dusun'));
            for ($i=0; $i <count($array) ; $i++) { 
              $data = array(
                      'dusunNama'               => $array[$i],
                      'dusunIdDesa'        => $this->input->post('iddesa')
                   );        
              if ($data['dusunNama']!=null) {
                  $proses = $this->m_dusun->add($data);
              }
            }

                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));            
                }
                      redirect($this->data['module']);
      }else{
        $this->load->model('operator/m_chain_wilayah');
            $this->page_title->push(lang('menu_data_dusun'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['modal_title'] = 'Tambah dusun';
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['kecamatan'] = $this->m_chain_wilayah->get_kecamatan();            
            $this->data['desa'] = $this->m_dusun->get_data();
            $this->data['subtitle'] = "Tambah dusun";
            $this->template->operator_render('operator/referensi/v_dusun_add', $this->data);

     
      }

    }

  public function edit($id){
      $this->form_validation->set_rules('dusun', 'Dusun', 'required');
      $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
 
      if (true == $this->form_validation->run()){                  
          $data = array(
                  'dusunNama'               => $this->input->post('dusun'),
               );        

              $proses = $this->m_dusun->update($data,$id);
                if ($proses) {
                      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
                }else{
                      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));            
                }
                      redirect($this->data['module']);
      }else{
      
            $this->page_title->push(lang('menu_data_dusun'));
            $this->data['pagetitle'] = $this->page_title->show();
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['dusun'] = $this->m_dusun->get_detail($id);
            $this->data['subtitle'] = "Edit dusun";

            $this->template->operator_render('operator/referensi/v_dusun_edit', $this->data);
      }

    }

    public function delete($id){
        $proses = $this->m_dusun->delete($id);
        if ($proses) {
              $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
        }else{
              $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));            
        }
          redirect('operator/dusun');
    }


}
