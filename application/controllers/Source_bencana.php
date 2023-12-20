<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Source_bencana extends Public_Controller
{

  public function __construct()
  {
    parent::__construct();

    /* Load :: Common */
    $this->load->helper('number');
    $this->load->model(array('operator/m_bencana', 'operator/m_penanganan'));
    $this->data['module'] = "operator/bencana/";
  }


  public function all()
  {
    $get_jenis_bencana = $this->db->get('jenisbencana')->result_array();
    $this->load->model('operator/m_chain_wilayah');
    $this->data['kecamatan'] = $this->m_chain_wilayah->get_kecamatan();
    // datamodal
    $this->load->model('operator/m_petugas');
    $this->data['mdl_petugas'] = $this->m_petugas->get_data();
    $this->load->model('operator/m_peralatan');
    $this->data['mdl_peralatan'] = $this->m_peralatan->get_data();        

    $geojson = array(
      'type'      => 'FeatureCollection',
      'features'  => array()
    );

    for ($i = 0; $i < count($get_jenis_bencana); $i++) {
      $get_bencana[$i] = $this->m_bencana->get_data_last90day($get_jenis_bencana[$i]['idjenisbencana'])->result_array();

      for ($j = 0; $j < count($get_bencana[$i]); $j++) {
        $get_jml_pengungsi[$i][$j] = $this->m_bencana->jml_pengungsi($get_bencana[$i][$j]['bencanaIdJenisBencana'], $get_bencana[$i][$j]['idbencana'])->result_array();
        $get_jml_korban[$i][$j] = $this->m_bencana->jml_korban($get_bencana[$i][$j]['bencanaIdJenisBencana'], $get_bencana[$i][$j]['idbencana'])->result_array();

        $properties = $this->m_bencana->getProperty();
        foreach ($properties as $prop) {
            $get_kerusakan_property[str_replace(' ', '_', $prop->kerusakan_propertiNama)]['berat'] = $this->m_bencana->getKerusakanCount($get_bencana[$i][$j]['idbencana'], $prop->idkerusakan_properti, 1);
            $get_kerusakan_property[str_replace(' ', '_', $prop->kerusakan_propertiNama)]['sedang'] = $this->m_bencana->getKerusakanCount($get_bencana[$i][$j]['idbencana'], $prop->idkerusakan_properti, 2);
            $get_kerusakan_property[str_replace(' ', '_', $prop->kerusakan_propertiNama)]['ringan'] = $this->m_bencana->getKerusakanCount($get_bencana[$i][$j]['idbencana'], $prop->idkerusakan_properti, 3);
            $get_kerusakan_property[str_replace(' ', '_', $prop->kerusakan_propertiNama)]['terancam'] = $this->m_bencana->getKerusakanCount($get_bencana[$i][$j]['idbencana'], $prop->idkerusakan_properti, 4);
        }

        if (!empty($get_jml_korban[$i][$j][0])) {
          $params_jml_korban[$i][$j] = array(
            'luka_ringan' => $get_jml_korban[$i][$j][0]['luka_ringan'],
            'luka_berat' => $get_jml_korban[$i][$j][0]['luka_berat'],
            'meninggal_dunia' => $get_jml_korban[$i][$j][0]['meninggal_dunia'],
            'hilang' => $get_jml_korban[$i][$j][0]['hilang']
          );
        } else {
          $params_jml_korban[$i][$j] = array(
            'luka_ringan' => "-",
            'luka_berat' => "-",
            'meninggal_dunia' => "-",
            'hilang' => "-"
          );
        }
        $nama_foto[$i][$j] = $this->m_bencana->nama_foto($get_bencana[$i][$j]['bencanaIdJenisBencana'], $get_bencana[$i][$j]['idbencana'])->result_array();
        if (!empty($nama_foto[$i][$j])) {
          $namafoto = $nama_foto[$i][$j][0]['foto_bencanaNama'];
        } else {
          $namafoto = "";
        }
        $path_foto[$i][$j] = $this->m_bencana->path_foto($get_bencana[$i][$j]['bencanaIdJenisBencana'], $get_bencana[$i][$j]['idbencana'])->result_array();
        if (!empty($path_foto[$i][$j])) {
          $foto = $path_foto[$i][$j][0]['foto_bencanaPath'];
        } else {
          $foto = "";
        }
        if (!empty($get_bencana[$i][$j]['bencanaNamaKampung'])) {
          $namakampung = $get_bencana[$i][$j]['bencanaNamaKampung'];
        } else {
          $namakampung = "";
        }
        if (!empty($get_bencana[$i][$j]['bencanaRskJembatan'])) {
          $jembatanrusak = $get_bencana[$i][$j]['bencanaRskJembatan'];
        } else {
          $jembatanrusak = "-";
        }
        if (!empty($get_bencana[$i][$j]['bencanaRskJalan'])) {
          $jalanrusak = $get_bencana[$i][$j]['bencanaRskJalan'];
        } else {
          $jalanrusak = "-";
        }
        if (!empty($get_bencana[$i][$j]['bencanaRskSawah'])) {
          $sawahrusak = $get_bencana[$i][$j]['bencanaRskSawah'];
        } else {
          $sawahrusak = "-";
        }
        if (!empty($get_bencana[$i][$j]['bencanaRskKebun'])) {
          $kebunrusak = $get_bencana[$i][$j]['bencanaRskKebun'];
        } else {
          $kebunrusak = "-";
        }
        if (!empty($get_bencana[$i][$j]['bencanaRskKolam'])) {
          $kolamrusak = $get_bencana[$i][$j]['bencanaRskKolam'];
        } else {
          $kolamrusak = "-";
        }
        if (!empty($get_bencana[$i][$j]['bencanaRskIrigasi'])) {
          $irigasirusak = $get_bencana[$i][$j]['bencanaRskIrigasi'];
        } else {
          $irigasirusak = "-";
        }
        if (!empty($get_bencana[$i][$j]['bencanaPenyebab'])) {
          $penyebab = $get_bencana[$i][$j]['bencanaPenyebab'];
        } else {
          $penyebab = "-";
        }
        if (!empty($get_bencana[$i][$j]['bencanaKronologi'])) {
          $kronologi = $get_bencana[$i][$j]['bencanaKronologi'];
        } else {
          $kronologi = "-";
        }
        if (!empty($get_bencana[$i][$j]['bencanaKendala'])) {
          $kendala = $get_bencana[$i][$j]['bencanaKendala'];
        } else {
          $kendala = "-";
        }
        if (!empty($get_bencana[$i][$j]['bencanaMasaDarurat'])) {
          $masadarurat = $get_bencana[$i][$j]['bencanaMasaDarurat'];
        } else {
          $masadarurat = "-";
        }
        $penanganan[$i][$j] = $this->m_penanganan->get_data_result_array($get_bencana[$i][$j]['idbencana'])->result_array();
        if (!empty($penanganan[$i][$j])) {
          $params_penangananan[$i][$j] = array(
            'penanganan_judul' => $penanganan[$i][$j][0]['penangananJudul'],
            'penananganan_teks' => $penanganan[$i][$j][0]['penangananTeks'],
            'penananganan_instansi_lembaga' => $penanganan[$i][$j][0]['penangananInstaLem'],
            'penananganan_status' => $penanganan[$i][$j][0]['penangananOpd'],
            'penananganan_foto' => $penanganan[$i][$j][0]['penangananImg']
          );
        } else {
          $params_penangananan[$i][$j] = array(
            'penanganan_judul' => '',
            'penananganan_teks' => '',
            'penananganan_instansi_lembaga' => '',
            'penananganan_status' => '',
            'penananganan_foto' => ''
          );
        }

        $kerusakanproperti[$i][$j] = $this->m_bencana->get_kerusakan1($get_bencana[$i][$j]['idbencana']);
        // if (!empty($kerusakanproperti[$i][$j])) {
        //   $params_kerusakanproperti[$i][$j] = array('idkerusakan_properti' => $kerusakanproperti[$i][$j][0]['idkerusakan'] ,
        //     'kerusakan_nama_pemilik' => $kerusakanproperti[$i][$j][0]['kerusakanNamaPemilik'] ,
        //     'kerusakan_alamat_pemilik' => $kerusakanproperti[$i][$j][0]['kerusakanAlamatPemilik'],
        //     'kerusakan_jenis_properti' => $kerusakanproperti[$i][$j][0]['kerusakanProperti'],
        //     'kerusakan_tingkatrusak_properti' => $kerusakanproperti[$i][$j][0]['kerusakanTingkatRusak']
        //    );
        //  }
        // else{
        // $params_kerusakanproperti[$i][$j] = array('idkerusakan_properti' => '-' ,
        //     'kerusakan_nama_pemilik' => '-' ,
        //     'kerusakan_alamat_pemilik' => '-' ,
        //     'kerusakan_jenis_properti' => '-' ,
        //     'kerusakan_tingkatrusak_properti' => '-'
        //    );
        // }

        $feature = array(
          'type' => 'Feature',
          'geometry' => array(
            'type' => 'Point',
            'coordinates' => array(
              $get_bencana[$i][$j]['x'], $get_bencana[$i][$j]['y']
            )
          ),
          'properties' => array(
            'idJenisBencana' => $get_bencana[$i][$j]['bencanaIdJenisBencana'],
            'idBencana' => $get_bencana[$i][$j]['idbencana'],
            'nama_bencana' => $get_bencana[$i][$j]['bencanaNama'],
            'hari' => $get_bencana[$i][$j]['bencanaHari'],
            'tgl' => $get_bencana[$i][$j]['bencanaTgl'],
            'waktu' => $get_bencana[$i][$j]['bencanaWaktu'],
            'kampung' => $namakampung,
            'dusun' => $get_bencana[$i][$j]['dusunNama'],
            'desa' => $get_bencana[$i][$j]['desaNama'],
            'kecamatan' => $get_bencana[$i][$j]['kecamatanNama'],
            'penyebab' => $penyebab,
            'jml_rusak_jembatan' => $jembatanrusak,
            'jml_rusak_jalan' => $jalanrusak,
            'jml_rusak_sawah' => $sawahrusak,
            'jml_rusak_kebun' => $kebunrusak,
            'jml_rusak_kolam' => $kolamrusak,
            'jml_rusak_irigasi' => $irigasirusak,
            'kronologi' => $kronologi,
            'kendala' => $kendala,
            'masa_darurat' => $masadarurat,
            'jml_korban' => $params_jml_korban[$i][$j],
            'jml_pengungsi' => $get_jml_pengungsi[$i][$j][0]['jml_pengungsi'],
            'nama_foto' => $namafoto,
            'path_foto' => $foto,
            'penanganan' => $params_penangananan[$i][$j],
            'jml_kerusakan_properti' => $get_kerusakan_property
          )
        );

        array_push($geojson['features'], $feature);
      }
    }

    header('Content-type: application/json; charset=utf-8');
    header('Cache-Control: no-cache, must-revalidate');
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header('Access-Control-Allow-Origin: *');

    echo json_encode($geojson, JSON_NUMERIC_CHECK);
  }

  public function hariini()
  {
    $get_jenis_bencana = $this->db->get('jenisbencana')->result_array();
    $this->load->model('operator/m_chain_wilayah');
    $this->data['kecamatan'] = $this->m_chain_wilayah->get_kecamatan();
    // datamodal
    $this->load->model('operator/m_petugas');
    $this->data['mdl_petugas'] = $this->m_petugas->get_data();
    $this->load->model('operator/m_peralatan');
    $this->data['mdl_peralatan'] = $this->m_peralatan->get_data();

    $geojson = array(
      'type'      => 'FeatureCollection',
      'features'  => array()
    );

    for ($i = 0; $i < count($get_jenis_bencana); $i++) {




      $get_bencana[$i] = $this->m_bencana->get_data_last1day($get_jenis_bencana[$i]['idjenisbencana'])->result_array();


      for ($j = 0; $j < count($get_bencana[$i]); $j++) {
        $get_jml_pengungsi[$i][$j] = $this->m_bencana->jml_pengungsi($get_bencana[$i][$j]['bencanaIdJenisBencana'], $get_bencana[$i][$j]['idbencana'])->result_array();
        $get_jml_korban[$i][$j] = $this->m_bencana->jml_korban($get_bencana[$i][$j]['bencanaIdJenisBencana'], $get_bencana[$i][$j]['idbencana'])->result_array();
        $nama_foto[$i][$j] = $this->m_bencana->nama_foto($get_bencana[$i][$j]['bencanaIdJenisBencana'], $get_bencana[$i][$j]['idbencana'])->result_array();
        if (!empty($nama_foto[$i][$j])) {
          $namafoto = $nama_foto[$i][$j][0]['foto_bencanaNama'];
        } else {
          $namafoto = "";
        }
        $path_foto[$i][$j] = $this->m_bencana->path_foto($get_bencana[$i][$j]['bencanaIdJenisBencana'], $get_bencana[$i][$j]['idbencana'])->result_array();
        if (!empty($path_foto[$i][$j])) {
          $foto = $path_foto[$i][$j][0]['foto_bencanaPath'];
        } else {
          $foto = "";
        }
        $penanganan[$i][$j] = $this->m_penanganan->get_data_result_array($get_bencana[$i][$j]['idbencana'])->result_array();
        if (!empty($penanganan[$i][$j])) {
          $params_penangananan[$i][$j] = array(
            'penanganan_judul' => $penanganan[$i][$j][0]['penangananJudul'],
            'penanganan_teks' => $penanganan[$i][$j][0]['penangananTeks'],
            'penanganan_instansi_lembaga' => $penanganan[$i][$j][0]['penangananInstaLem'],
            'penanganan_status' => $penanganan[$i][$j][0]['penangananOpd'],
            'penanganan_foto' => $penanganan[$i][$j][0]['penangananImg']
          );
        } else {
          $params_penangananan[$i][$j] = array(
            'penanganan_judul' => '-',
            'penanganan_teks' => '-',
            'penanganan_instansi_lembaga' => '-',
            'penanganan_status' => '-',
            'penanganan_foto' => '-'
          );
        }

        $feature = array(
          'type' => 'Feature',
          'geometry' => array(
            'type' => 'Point',
            'coordinates' => array(
              $get_bencana[$i][$j]['x'], $get_bencana[$i][$j]['y']
            )
          ),
          'properties' => array(
            'idJenisBencana' => $get_bencana[$i][$j]['bencanaIdJenisBencana'],
            'idBencana' => $get_bencana[$i][$j]['idbencana'],
            'nama_bencana' => $get_bencana[$i][$j]['bencanaNama'],
            'hari' => $get_bencana[$i][$j]['bencanaHari'],
            'tgl' => $get_bencana[$i][$j]['bencanaTgl'],
            'waktu' => $get_bencana[$i][$j]['bencanaWaktu'],
            'kampung' => $get_bencana[$i][$j]['bencanaNamaKampung'],
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
            'nama_foto' => $namafoto,
            'path_foto' => $foto,
            'penanganan' => $params_penangananan[$i][$j]

          )
        );

        array_push($geojson['features'], $feature);
      }
    }

    header('Content-type: application/json; charset=utf-8');
    header('Cache-Control: no-cache, must-revalidate');
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header('Access-Control-Allow-Origin: *');

    echo json_encode($geojson, JSON_NUMERIC_CHECK);
  }
}
