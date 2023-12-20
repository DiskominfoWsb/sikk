<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('operator/m_bencana');   
    }


	public function index()
	{
        $data['dateFrom'] = ( null != $this->input->post("dateFrom") ) ? $this->input->post("dateFrom") : date("Y-m-01");
        $data['dateTo'] = ( null != $this->input->post("dateTo") ) ? $this->input->post("dateTo") : date("Y-m-d");
        
        $data['bencana'] = $this->m_bencana->getRecapBencana($data['dateFrom'], $data['dateTo']);
        $data['korbans'] = $this->m_bencana->getRecapKorban($data['dateFrom'], $data['dateTo']);
        $month = array(
            1 => "Januari",
            2 => "Februari",
            3 => "Maret",
            4 => "April",
            5 => "Mei",
            6 => "Juni",
            7 => "Juli",
            8 => "Agustus",
            9 => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Desember"
          ); 
        $data['dateFrom'] = date("d ", strtotime($data['dateFrom'])) . $month[date("n", strtotime($data['dateFrom']))] . date(" Y", strtotime($data['dateFrom']));
        $data['dateTo'] = date("d ", strtotime($data['dateTo'])) . $month[date("n", strtotime($data['dateTo']))] . date(" Y", strtotime($data['dateTo']));
        $data['dateFromTo'] = $data['dateFrom'] . " s/d " . $data['dateTo']; 
        $this->load->view('public/v_chart',$data);

	}


    
}
