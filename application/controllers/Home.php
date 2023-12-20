<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("operator/m_informasi");
        //         $this->load->helper('number');
        // $this->load->model('operator/m_dusun');
        // $this->data['module'] = "operator/dusun/";   
    }


	public function index()
	{
//             $this->page_title->push(lang('menu_data_dusun'));
//             $this->data['pagetitle'] = $this->page_title->show();

//             /* Breadcrumbs */
//             $this->data['breadcrumb'] = $this->breadcrumbs->show();

// $this->data['subtitle'] = "Tambah dusun";
//             $this->data['dusun'] = $this->m_dusun->get_data();
		// $this->template->operator_render('operator/referensi/v_tes', $this->data);
        $this->load->view('public/home');

	}


    
}
