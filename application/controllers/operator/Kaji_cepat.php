<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kaji_cepat extends Operator_Controller {

  private $bulan = array();
  private $hari = array();

  public function __construct(){
    parent::__construct();
    $this->load->helper('number');
    $this->load->model('operator/m_bencana');
    $this->data['module'] = "operator/Kaji_cepat/";   
    $this->bulan = array ( 
      1 => 'Januari',
      2 => 'Februari',
      3 => 'Maret',
      4 => 'April',
      5 => 'Mei',
      6 => 'Juni',
      7 => 'Juli',
      8 => 'Agustus',
      9 => 'September',
      10 => 'Oktober',
      11 => 'November',
      12 => 'Desember'
    );
    $this->hari = array ( 
      1 => 'Senin',
      2 => 'Selasa',
      3 => 'Rabu',
      4 => 'Kamis',
      5 => 'Jumat',
      6 => 'Sabtu',
      7 => 'Minggu'
    );
  }


  public function form($id){
    $this->page_title->push(lang('kaji_cepat'));
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
    $this->template->operator_render('operator/kaji_cepat/v_kaji_cepat_index', $this->data);

  }

  public function export_surat($idbencana){
    $bulan = $this->bulan;
    $this->data['bulan'] = $this->bulan;
    $this->load->model('operator/m_bencana');
    $no_surat = $this->input->get('no_surat_kaji_cepat');
    $tgl = $this->input->get('tanggal_kaji_cepat');   
    $params = array('bencanaTglKajiCepat' => $tgl , 'bencanaNoSuratKajiCepat'=> $no_surat );
    $this->db->where('idbencana',$idbencana)->update('bencana',$params);
    $this->data['title'] = "Surat Perintah Kaji Cepat";
    $this->data['no_surat'] = $no_surat;
    $this->data['tgl'] = $tgl;
    $this->data['petugas'] = $this->m_bencana->get_petugas($idbencana);
    $this->data['bencana'] = $this->m_bencana->get_detail($idbencana);        
    $this->load->view('operator/kaji_cepat/v_surat',$this->data);
  }

  public function export_laporan($idbencana){
    $this->load->model('operator/m_penanganan');
    $this->load->model('operator/m_bencana');

    $bulan = $this->bulan;
    $this->data['bulan'] = $this->bulan;
    $hari = $this->hari;

    $bt = $this->input->get('bt');
    $ls = $this->input->get('ls');        
    $tgl = $this->input->get('tgl');   

    $this->data['title'] = "Laporan Kaji Cepat";
    $this->data['bt'] = $bt;
    $this->data['ls'] = $ls;
    if ($bt!="" && $ls !="") {
      $params = array('bencanaBt' => $bt, 'bencanaLs' => $ls );
      $this->db->where('idbencana',$idbencana)->update('bencana',$params);
    }        
    $this->data['tgl'] = $tgl;
    $this->data['hari_pel'] = $hari[date('N', strtotime($tgl))];
    $this->data['petugas'] = $this->m_bencana->get_petugas($idbencana);
    $this->data['bencana'] = $this->m_bencana->get_detail($idbencana);
    $this->data['kerusakan'] = $this->m_bencana->get_kerusakan($idbencana);
    $this->data['pengungsi'] = $this->m_bencana->get_pengungsi($idbencana); 
    $this->data['penanganan'] = $this->m_penanganan->get_data($idbencana); 
    $this->data['petugas'] = $this->m_bencana->get_petugas($idbencana);       
        // hitung korban disini aja :D
    $this->data['jml_md'] = $this->db->query('select count(idkorban) as jml from korban where korbanKondisi=1 and korbanIdBencana='.$idbencana)->result_array();
    $this->data['jml_lb'] = $this->db->query('select count(idkorban) as jml from korban where korbanKondisi=2 and korbanIdBencana='.$idbencana)->result_array();        
    $this->data['jml_lr'] = $this->db->query('select count(idkorban) as jml from korban where korbanKondisi=3 and korbanIdBencana='.$idbencana)->result_array();
    $this->data['jml_hl'] = $this->db->query('select count(idkorban) as jml from korban where korbanKondisi=4 and korbanIdBencana='.$idbencana)->result_array();        
    $this->load->view('operator/kaji_cepat/v_laporan',$this->data);
        // print_r($this->data['jml_hl']['0']['jml']);
  }    



}
