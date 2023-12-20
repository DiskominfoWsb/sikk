<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

	private $data = array();

	public function __construct(){
		parent::__construct();
		$this->load->model("operator/M_informasi");
	}

	public function index( $id = null){
		if( isset($id) ){
			$this->data['informasi'] = $this->M_informasi->getDetail($id);
			$this->load->view("public/informasi", $this->data);
		} else {
			redirect( site_url() );
		}
	}

}

/* End of file Informasi.php */
/* Location: ./application/controllers/Informasi.php */