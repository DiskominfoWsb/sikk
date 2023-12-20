<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relawan extends Operator_Controller {

    public function __construct()
    {
        parent::__construct();
                $this->load->helper('number');
        $this->load->model('operator/m_bencana');
        $this->data['module'] = "operator/relawan/";   
    }


	public function form($id)
	{
            $this->page_title->push(lang('relawan'));
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
            $this->template->operator_render('operator/relawan/v_relawan_index', $this->data);

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

        $this->load->model('operator/m_bencana');

        $no_surat = $this->input->get('no_surat_relawan');
        $tgl = $this->input->get('tanggal_relawan');   
        $params = array('bencanaTglPengRelawan' => $tgl , 'bencanaNoPengRelawan'=> $no_surat );
        $this->db->where('idbencana',$idbencana)->update('bencana',$params);
        $this->data['title'] = "Surat Pengerahan Relawan";
        $this->data['no_surat'] = $no_surat;
        $this->data['tgl'] = $tgl;
        $this->data['petugas'] = $this->m_bencana->get_petugas($idbencana);
        $this->data['bencana'] = $this->m_bencana->get_detail($idbencana);        
        $this->load->view('operator/relawan/v_surat',$this->data);

    }
    public function export_laporan($idbencana){
      $this->load->model('operator/m_penanganan');
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
            $hari = array ( 1 =>    'Senin',
                      'Selasa',
                      'Rabu',
                      'Kamis',
                      'Jumat',
                      'Sabtu',
                      'Minggu'
                    );
        $this->load->model('operator/m_bencana');

        $this->data['title'] = "Laporan Pengerahan Relawan";
  
        $this->data['petugas'] = $this->m_bencana->get_petugas($idbencana);
        $this->data['bencana'] = $this->m_bencana->get_detail($idbencana);
        $this->data['kerusakan'] = $this->m_bencana->get_kerusakan($idbencana);
        $this->data['pengungsi'] = $this->m_bencana->get_pengungsi($idbencana); 
        $this->data['penanganan'] = $this->m_penanganan->get_data($idbencana); 
        $this->data['petugas'] = $this->m_bencana->get_petugas($idbencana);  
        $this->data['jml_md'] = $this->db->query('select count(idkorban) as jml from korban where korbanKondisi=1 and korbanIdBencana='.$idbencana)->result_array();
        $this->data['jml_lb'] = $this->db->query('select count(idkorban) as jml from korban where korbanKondisi=2 and korbanIdBencana='.$idbencana)->result_array();        
        $this->data['jml_lr'] = $this->db->query('select count(idkorban) as jml from korban where korbanKondisi=3 and korbanIdBencana='.$idbencana)->result_array();
        $this->data['jml_hl'] = $this->db->query('select count(idkorban) as jml from korban where korbanKondisi=4 and korbanIdBencana='.$idbencana)->result_array();              
    
       $this->data['hari'] = $hari[date('N', strtotime($this->input->post('tanggal_pengerahan')))];
       $this->data['tgl'] = $this->input->post('tanggal_pengerahan');
       $this->data['lokasi'] = $this->input->post('lokasi_pengerahan');
       $this->data['komunitas'] = $this->input->post('komunitas');
       $this->data['jumlah'] = $this->input->post('jml_pengerahan');
       $this->data['laporan'] = $this->input->post('laporan_pengerahan');
       $params = array('bencanaLapPengRelawan' => $this->data['laporan'] ,);
        $this->db->where('idbencana',$idbencana)->update('bencana',$params);                                   
        $this->load->view('operator/relawan/v_laporan',$this->data);
        // print_r($this->data['laporan']);
    } 


    
}
