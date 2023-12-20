<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ExcelDataInsert extends CI_Controller
{

public function __construct() {
        parent::__construct();
                $this->load->library('excel');//load PHPExcel library 
            		// $this->load->model('upload_model');//To Upload file in a directory
                $this->load->model('operator/m_bencana');
}	
	
public	function ImportBencana()	{  
//Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)	 
         $config['upload_path'] = FCPATH.'upload/excel/';
         $config['allowed_types'] = 'xls|xlsx|csv';
         $config['max_size'] = '5000';
         $this->load->library('upload', $config);
         $this->upload->do_upload('import_xls');	
         $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.



         $file_name = $upload_data['file_name']; //uploded file name
    		 $extension=$upload_data['file_ext'];    // uploded file extension
		
//$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
       $objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 	  
          //Set to read only
          $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load(FCPATH.'upload/excel/'.$file_name);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
          for($i=5;$i<=$totalrows;$i++)
          {
          $data = array(
                  'bencanaIdJenisBencana'               => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue(),
                  'bencanaHari' => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(),
                  'bencanaTgl'  => date('Y-m-d', strtotime($objWorksheet->getCellByColumnAndRow(2,$i)->getValue())),
                  'bencanaWaktu' => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue(),
                  'bencanaIdKecamatan' => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue(),
                  'bencanaIdDesa' => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue(),
                  'bencanaIdDusun' => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue(),
                  'bencanaPenyebab' => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue(),

                  'bencanaRskJembatan' => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(),
                  'bencanaRskJalan' => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(),
                  'bencanaRskSawah' => $objWorksheet->getCellByColumnAndRow(10,$i)->getValue(),
                  'bencanaRskKebun' => $objWorksheet->getCellByColumnAndRow(11,$i)->getValue(),
                  'bencanaRskKolam' => $objWorksheet->getCellByColumnAndRow(12,$i)->getValue(),
                  'bencanaRskIrigasi' => $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(),

                  'bencanaRskJembatanKet' => $objWorksheet->getCellByColumnAndRow(14,$i)->getValue(),                  
                  'bencanaRskJalanKet' => $objWorksheet->getCellByColumnAndRow(15,$i)->getValue(),                  
                  'bencanaRskSawahKet' => $objWorksheet->getCellByColumnAndRow(16,$i)->getValue(),                  
                  'bencanaRskKebunKet' => $objWorksheet->getCellByColumnAndRow(17,$i)->getValue(),                  
                  'bencanaRskKolamKet' => $objWorksheet->getCellByColumnAndRow(18,$i)->getValue(),                  
                  'bencanaRskIrigasiKet' => $objWorksheet->getCellByColumnAndRow(19,$i)->getValue(),                  
                                                                                                        

                  'bencanaLaporNama' => $objWorksheet->getCellByColumnAndRow(20,$i)->getValue(),
                  'bencanaLaporTelp' => $objWorksheet->getCellByColumnAndRow(21,$i)->getValue(),
                  'bencanaLaporTglSurat' => $objWorksheet->getCellByColumnAndRow(22,$i)->getValue(),

                  'bencanaKronologi' => $objWorksheet->getCellByColumnAndRow(23,$i)->getValue(),              
                  'bencanaKendala' => $objWorksheet->getCellByColumnAndRow(24,$i)->getValue(),                                      

                  'bencanaBt'     => $objWorksheet->getCellByColumnAndRow(25,$i)->getValue(),
                  'bencanaLs'     => $objWorksheet->getCellByColumnAndRow(26,$i)->getValue(),
                  'bencanaTglKajiCepat' => $objWorksheet->getCellByColumnAndRow(27,$i)->getValue()                  

                  // lapor
               );         
        			  $this->m_bencana->import($data);
          
              
						  
          }
             unlink('././upload/excel/'.$file_name); //File Deleted After uploading in database .			 
             redirect(base_url() . "operator/bencana/");
	           
       
     }

public  function ImportRelawan()  {  
//Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)  
         $config['upload_path'] = FCPATH.'upload/excel/';
         $config['allowed_types'] = 'xls|xlsx|csv';
         $config['max_size'] = '5000';
         $this->load->library('upload', $config);
         $this->upload->do_upload('import_xls');  
         $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.



         $file_name = $upload_data['file_name']; //uploded file name
         $extension=$upload_data['file_ext'];    // uploded file extension
    
//$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
       $objReader= PHPExcel_IOFactory::createReader('Excel2007'); // For excel 2007     
          //Set to read only
          $objReader->setReadDataOnly(true);      
        //Load excel file
     $objPHPExcel=$objReader->load(FCPATH.'upload/excel/'.$file_name);     
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
         #loop from first data untill last data
          // for($i=5;$i<=$totalrows;$i++)
          // {
          // $data = array(
          //         'relNama'               => $objWorksheet->getCellByColumnAndRow(0,$i)->getValue(),
          //         'relNik' => $objWorksheet->getCellByColumnAndRow(1,$i)->getValue(),
          //         'relAlamat'  => date('Y-m-d', strtotime($objWorksheet->getCellByColumnAndRow(2,$i)->getValue())),
          //         'relRtRw' => $objWorksheet->getCellByColumnAndRow(3,$i)->getValue(),
          //         'relIdKecamatan' => $objWorksheet->getCellByColumnAndRow(4,$i)->getValue(),
          //         'relIdDesa' => $objWorksheet->getCellByColumnAndRow(5,$i)->getValue(),
          //         'relIdDusun' => $objWorksheet->getCellByColumnAndRow(6,$i)->getValue(),
          //         'relTelp' => $objWorksheet->getCellByColumnAndRow(7,$i)->getValue(),

          //         'relIdPend' => $objWorksheet->getCellByColumnAndRow(8,$i)->getValue(),
          //         'relIdOrg' => $objWorksheet->getCellByColumnAndRow(9,$i)->getValue(),               
          //         // lapor
          //      );    
            // $this->db->insert('relawan',$data);
            // $id_rel = $this->db->insert_id();
            //    $input_keahlian = $objWorksheet->getCellByColumnAndRow(10,$i)->getValue();
            //    $keahlian = explode(",", $input_keahlian);
            //    for ($i=0; $i < count($keahlian) ; $i++) { 
            //      $rel_keahlian = array('idRel' => $id_rel , 'idKeahlian' => $keahlian[$i]);
            //      $this->db->insert('rel_keahlian',$rel_keahlian);
            //    }

          
              
              
          // }
          print_r($totalrows);
             unlink('././upload/excel/'.$file_name); //File Deleted After uploading in database .      
             // redirect(base_url() . "operator/relawans/");
             
       
     }     
	
}
?>