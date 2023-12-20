<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TabelKejadian extends public_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('number');
    $this->load->model(
      array(
        'operator/m_bencana',
        'operator/m_penanganan',
        'operator/m_peralatan',
        'operator/m_chain_wilayah',
        'operator/m_petugas'
      )
    );
    $this->data['module'] = "operator/bencana/";
  }


  public function index(){
    $data['dateFrom'] = ( null != $this->input->post("dateFrom") ) ? $this->input->post("dateFrom") : date("Y-m-01");
    $data['dateTo'] = ( null != $this->input->post("dateTo") ) ? $this->input->post("dateTo") : date("Y-m-d");
    $data['bencana'] = $this->m_bencana->getPublicBencana( $data['dateFrom'], $data['dateTo']);
    $this->load->view('public/datakejadian',$data);
  }

}
