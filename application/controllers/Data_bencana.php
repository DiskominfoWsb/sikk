<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_bencana extends Public_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model(array('operator/m_bencana','operator/m_penanganan'));
        $this->data['module'] = "operator/bencana/";         
    }


    public function all(){
            $get_jenis_bencana = $this->db->get('jenisbencana')->result_array();         
            $this->load->model('operator/m_chain_wilayah');
            $this->data['kecamatan'] = $this->m_chain_wilayah->get_kecamatan(); 
            // datamodal
            $this->load->model('operator/m_petugas');
            $this->data['mdl_petugas'] = $this->m_petugas->get_data();
            $this->load->model('operator/m_peralatan');
            $this->data['mdl_peralatan'] = $this->m_peralatan->get_data();  

            /*      $geojson = array(
                     'type'      => 'FeatureCollection',
                     'features'  => array()
                  );    */

            for ($i=0; $i < count($get_jenis_bencana) ; $i++) { 

                $get_bencana[$i] = $this->m_bencana->get_data_last30day($get_jenis_bencana[$i]['idjenisbencana'])->result_array();

                for ($j=0; $j < count($get_bencana[$i]) ; $j++) { 
                $get_jml_pengungsi[$i][$j] = $this->m_bencana->jml_pengungsi($get_bencana[$i][$j]['bencanaIdJenisBencana'],$get_bencana[$i][$j]['idbencana'])->result_array();
                $get_jml_korban[$i][$j] = $this->m_bencana->jml_korban($get_bencana[$i][$j]['bencanaIdJenisBencana'],$get_bencana[$i][$j]['idbencana'])->result_array();
                $path_foto[$i][$j] = $this->m_bencana->path_foto($get_bencana[$i][$j]['bencanaIdJenisBencana'],$get_bencana[$i][$j]['idbencana'])->result_array();
                if (!empty($path_foto[$i][$j])) {
                             $foto = $path_foto[$i][$j][0]['foto_bencanaPath'];
                }else{ $foto = "";}
                $penanganan[$i][$j] = $this->m_penanganan->get_data_result_array($get_bencana[$i][$j]['idbencana'])->result_array();  
					if (!empty($penanganan[$i][$j])) {
					$params_penangananan[$i][$j] = array('penanganan_judul' => $penanganan[$i][$j][0]['penangananJudul'] ,
					  'penanganan_teks' => $penanganan[$i][$j][0]['penangananTeks'] ,
					  'penanganan_instansi_lembaga' => $penanganan[$i][$j][0]['penangananInstaLem']
					 );
					}
					else{
					$params_penangananan[$i][$j] = array('penanganan_judul' => '-',
					  'penanganan_teks' => '-' ,
					  'penanganan_instansi_lembaga' => '-'
					 );
					}                            

					
					
					  /* $properties = array(
						  'idJenisBencana' => $get_bencana[$i][$j]['bencanaIdJenisBencana'],
						  'idBencana' => $get_bencana[$i][$j]['idbencana'],
						  'nama_bencana' => $get_bencana[$i][$j]['bencanaNama'],
						  'hari' => $get_bencana[$i][$j]['bencanaHari'],
						  'tgl' => $get_bencana[$i][$j]['bencanaTgl'],
						  'waktu' => $get_bencana[$i][$j]['bencanaWaktu'],
						  'dusun' => $get_bencana[$i][$j]['dusunNama'],
						  'desa' => $get_bencana[$i][$j]['desaNama'],
						  'kecamatan' => $get_bencana[$i][$j]['kecamatanNama'],               
						  'penyebab' => $get_bencana[$i][$j]['bencanaPenyebab'],
						  'jml_rusak_jembatan' => $get_bencana[$i][$j]['bencanaRskJembatan'],
						  'jml_rusak_jalan' => $get_bencana[$i][$j]['bencanaRskJalan'],
						  'jml_rusak_sawah' => $get_bencana[$i][$j]['bencanaRskSawah'],
						  'jml_rusak_kebun' => $get_bencana[$i][$j]['bencanaRskKebun'],
						  'jml_rusak_kolam' => $get_bencana[$i][$j]['bencanaRskKolam'],   
						  'jml_rusak_irigasi' => $get_bencana[$i][$j]['bencanaRskIrigasi'],
						  'kronologi' => $get_bencana[$i][$j]['bencanaKronologi'],
						  'kendala' => $get_bencana[$i][$j]['bencanaKendala'],
						  'jml_rusak_sawah' => $get_bencana[$i][$j]['bencanaRskSawah'],
						  'masa_darurat' => $get_bencana[$i][$j]['bencanaMasaDarurat'],
						  'jml_korban' => $get_jml_korban[$i][$j][0],
						  'jml_pengungsi' => $get_jml_pengungsi[$i][$j][0]['jml_pengungsi'],
						  'path_foto' => $foto,
						  'penanganan' => $params_penangananan[$i][$j]                               

						) */
					echo "<head><title>Kejadian Bencana</title>
					        <style>
					            body, table {
                                    font-family: arial, sans-serif;
                                    border-collapse: collapse;
                                    font-size: 12;
                                }
                                
                                td, th {
                                    border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 3px;
                                }

                                #kecil {
                                    width: 90px;
                                }
                                #sedang {
                                    width: 175px;
                                }
                                #besar {
                                    width: 600px;
                                }
                                
					        </style>
					       </head>
					       <body>
					       <table><tr>
					        <td id='kecil'>".$get_bencana[$i][$j]['bencanaNama']."</td>
					        <td id='kecil'>".$get_bencana[$i][$j]['bencanaHari']."</td>
					        <td id='kecil'>".$get_bencana[$i][$j]['bencanaTgl']."</td>
					        <td id='kecil'>".$get_bencana[$i][$j]['bencanaWaktu']."</td>
					        <td id='kecil'>".$get_bencana[$i][$j]['dusunNama']."</td>
					        <td id='kecil'>".$get_bencana[$i][$j]['desaNama']."</td>
					        <td id='kecil'>".$get_bencana[$i][$j]['kecamatanNama']."</td>
					        <td id='sedang'>".$get_bencana[$i][$j]['bencanaPenyebab']."</td>
					        <td id='besar'>".$get_bencana[$i][$j]['bencanaKronologi']."</td>
					      </tr></table></body>";
                }
            }
			
    }
    
    public function head(){
        echo "<head><title>Kejadian Bencana</title>
            <style>
                body, table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    font-size: 12;
                }
                table {
                    background-color: orange;
                }
                td, th {
                    border: 1px solid #dddddd;
                    
                    padding: 3px;
                }
    
                #kecil {
                    width: 90px;
                }
                #sedang {
                    width: 175px;
                }
                #besar {
                    width: 600px;
                }
                
            </style>
           </head>
           <body>
           <table><tr>
            <th id='kecil'>Bencana</th>
            <th id='kecil'>Hari</th>
            <th id='kecil'>Tanggal</th>
            <th id='kecil'>Waktu</th>
            <th id='kecil'>Dusun</th>
            <th id='kecil'>Desa</th>
            <th id='kecil'>Kecamatan</th>
            <th id='sedang'>Penyebab</th>
            <th id='besar'>Kronologi</th>
        </tr></table></body>";
    }

}
?>