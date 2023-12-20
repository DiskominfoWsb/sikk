<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pernyataan extends Operator_Controller {

    public function __construct()
    {
        parent::__construct();
                $this->load->helper('number');
        $this->load->model('operator/m_bencana');
        $this->data['module'] = "operator/pernyataan/";   
    }


	public function form($id)
	{
            $this->page_title->push(lang('pernyataan'));
            $this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['bencana'] = $this->m_bencana->get_detail($id);
            $this->data['idbencana'] = $id;
            $this->data['pengungsi'] = $this->m_bencana->get_pengungsi($id);
            $this->data['petugas'] = $this->m_bencana->get_petugas($id);             
            $this->data['peralatan'] = $this->m_bencana->get_peralatan($id);   
            $this->data['korban'] = $this->m_bencana->get_korban($id);
            $this->load->model('operator/m_chain_wilayah');
            $this->data['kecamatan'] = $this->m_chain_wilayah->get_kecamatan(); 
            // datamodal
            $this->load->model('operator/m_petugas');
            $this->data['mdl_petugas'] = $this->m_petugas->get_data();            
            $this->template->operator_render('operator/pernyataan/v_pernyataan_index', $this->data);

	}

    public function export_surat($idbencana){

      $bulan = array ( 1 =>    'Januari',
                      'Februari',
                      'Maret',
                      'April',
                      'Mei',
                      'Juni',
                      'Juli',
                      'Agustus',
                      'September',
                      'Oktober',
                      'November',
                      'Desember'
                    );
        $params = array(
          'bencanaNoSuratPernyataan' => $this->input->get('no_surat_pernyataan'), 
          'bencanaTglPernyataan' => $this->input->get('tanggal_pernyataan'),
          'bencanaMasaDarurat' => $this->input->get('masa_darurat'),           
          );
            $this->db->where('idbencana',$idbencana)->update('bencana',$params);

                
        $this->load->model('operator/m_bencana');
        $this->data['title'] = "Surat Perintah Tugas Pengerahan pernyataan";
        $this->data['petugas'] = $this->m_bencana->get_petugas($idbencana);
        $this->data['kerusakan'] = $this->m_bencana->get_kerusakan($idbencana);
        $this->data['bencana'] = $this->m_bencana->get_detail($idbencana);        
        $this->load->view('operator/pernyataan/v_export_pernyataan',$this->data);

    }


    
}
