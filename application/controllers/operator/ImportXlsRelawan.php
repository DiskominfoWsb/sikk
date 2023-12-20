<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportXlsRelawan extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->database();
    $this->load->library('excel');

    $this->load->model('operator/m_relawans');
    $this->load->model('operator/m_kecamatan');
    $this->load->model('operator/m_desa');
    $this->load->model('operator/m_dusun');
    $this->load->model('operator/m_organisasi');
  }	

  public	function Import()	{  
    if($this->input->post("delete_all") == "on"){
      $this->db->query("TRUNCATE relawan");
      $this->db->query("TRUNCATE rel_keahlian");
    }
    $config['upload_path'] = FCPATH.'upload/excel/';
    $config['allowed_types'] = 'xls|xlsx|csv';
    $config['max_size'] = '5000';
    $this->load->library('upload', $config);
    $this->upload->do_upload('import_xls');	
    $upload_data = $this->upload->data();

    $file_name = $upload_data['file_name'];
    $extension = $upload_data['file_ext'];

    $inputFileType = PHPExcel_IOFactory::identify($config['upload_path'] . $file_name);
    $objReader= PHPExcel_IOFactory::createReader($inputFileType);

    $objReader->setReadDataOnly(true); 		  
    $objPHPExcel=$objReader->load(FCPATH.'upload/excel/'.$file_name);		 
    $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
    $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                

    $startRow = 6;
    for($i=$startRow;$i<=$totalrows;$i++){
      // Get Wilayah
      $kecamatan = $objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
      $desa = $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
      $dusun = $objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
      
      // Mapping Kecamatan ID
      $kecId = $kecamatan;
      $kec =$this->m_kecamatan->getKecamatanIdByName( $kecamatan );
      if( count($kec) > 0 ){
        $kecId = $kec[0]->idkecamatan;
      }

      // Mapping Desa
      $desaId = $desa;
      $des =$this->m_desa->getDesaIdByName( $desa, $kecId );
      if( count($des) > 0 ){
        $desaId = $des[0]->iddesa;
      }

      // Mapping Dusun
      $dusunId = $dusun;
      $rta = explode("Rt", $dusun);
      $rt = null;
      if( isset($rta[1]) ){
        $rt = substr($rta[1],1);
        $dusun = trim($rta[0]);
      }
      $alamat = $dusunId;
      $dus =$this->m_dusun->getDusunIdByName( $dusun, $desaId );
      if( count($dus) > 0 ){
        $dusunId = $dus[0]->iddusun;
      }

      /* ========================================================== */
      // Translate Organisasi
      $organisasi = $objWorksheet->getCellByColumnAndRow(10,$i)->getValue();
      $orgtelp = $objWorksheet->getCellByColumnAndRow(11,$i)->getValue();
      $orgId = $organisasi;
      $org =$this->m_organisasi->getOrganisasiIdByName( $organisasi );
      if( count($org) > 0 ){
        $orgId = $org[0]->idOrg;
      }
      /* ========================================================== */
      // Translate Pendidikan
      $pendidikan = $objWorksheet->getCellByColumnAndRow(8,$i)->getValue();
      $pendidikanId = $pendidikan;
      $pend = $this->m_relawans->getPendidikanId( $pendidikan );
      if( count($pend) > 0 ){
        $pendidikanId = $pend[0]->idRefPend;
      }

      $keahlian = $objWorksheet->getCellByColumnAndRow(9,$i)->getValue();
      $telpOrg = $objWorksheet->getCellByColumnAndRow(11,$i)->getValue();


      $data = array(
        'relNama' => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(),
        'relNik' => $objWorksheet->getCellByColumnAndRow(2,$i)->getValue(),
        'relJenisKelamin'  => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue(),
        'relIdKec'  => $kecId,
        'relIdDesa'  => $desaId,
        'relIdDusun'  => $dusunId,
        'relTelp'  => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue(),
        'relIdPend'  => $pendidikanId,            
        'relAlamat'  => $alamat,            
        'relRtRw'  => $rt,            
        'relIdOrg'  => $orgId,            
        // 'organisasi'  => $organisasi,            
        // 'orgtelp'  => $orgtelp,            
      );    
      // echo "<pre>";print_r($data);echo "</pre>";
      $this->db->insert('relawan', $data);

      // Keahlian
      $id_rel = $this->db->insert_id();
      $list_keahlian = explode(",",$keahlian);
      for ($j=0; $j < count($list_keahlian); $j++) { 
        $rel_keahlian = array('idRel' => $id_rel , 'idKeahlian' => $list_keahlian[$j]);
        $this->db->insert('rel_keahlian',$rel_keahlian);
      }

      /*
      $input_keahlian = $objWorksheet->getCellByColumnAndRow(10,$i)->getValue();
      $keahlian = explode(",", $input_keahlian);
      for ($j=0; $j < count($keahlian) ; $j++) { 
        $rel_keahlian = array('idRel' => $id_rel , 'idKeahlian' => $keahlian[$j]);
        $this->db->insert('rel_keahlian',$rel_keahlian);
      }
      */

    }

    unlink($config['upload_path'] . $file_name); //File Deleted After uploading in database .			 
    redirect(base_url() . "operator/relawans/");
  }
} 
?>