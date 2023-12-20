<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_bencana extends CI_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->table = 'bencana';
  }


  public function get_data()
  {
    $query = $this->db->select('*')
      ->from($this->table)
      ->join('jenisbencana', 'idjenisbencana=bencanaIdJenisBencana')
      ->join('kecamatan', 'idkecamatan=bencanaIdKecamatan')
      ->join('desa', 'iddesa=bencanaIdDesa')
      ->join('dusun', 'iddusun=bencanaIdDusun')
      ->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return $query;
    }
  }

  public function get_data_last90day($idjenisbencana)
  {
    $query = $this->db->query('SELECT
      bencanaBt AS x, jenisbencanaNama as bencanaNama, bencanaLs AS y,bencana.*, kecamatan.*, desa.*, dusun.*
      FROM
      bencana
      JOIN jenisbencana
      ON idjenisbencana = bencanaIdJenisBencana
      JOIN kecamatan
      ON idkecamatan = bencanaIdKecamatan
      JOIN desa
      ON iddesa = bencanaIdDesa
      JOIN dusun
      ON iddusun = bencanaIdDusun
      WHERE bencanaTgl >= (CURDATE() - INTERVAL 90 DAY) AND bencanaidjenisbencana = ' . $idjenisbencana . '
      ORDER BY bencanaTgl DESC');
    if ($query->num_rows() > 0) {

      return $query;
    } else {
      return $query;
    }
  }

  public function get_data_last1day($idjenisbencana)
  {
    $query = $this->db->query('SELECT
      bencanaBt AS x, jenisbencanaNama as bencanaNama, bencanaLs AS y,bencana.*, kecamatan.*, desa.*, dusun.*
      FROM
      bencana
      JOIN jenisbencana
      ON idjenisbencana = bencanaIdJenisBencana
      JOIN kecamatan
      ON idkecamatan = bencanaIdKecamatan
      JOIN desa
      ON iddesa = bencanaIdDesa
      JOIN dusun
      ON iddusun = bencanaIdDusun
      WHERE bencanaTgl >= (CURDATE() - INTERVAL 1 DAY) AND bencanaidjenisbencana = ' . $idjenisbencana . '
      ORDER BY bencanaTgl DESC');
    if ($query->num_rows() > 0) {

      return $query;
    } else {
      return $query;
    }
  }

  // public
  public function jml_bencana($idjenisbencana)
  {
    $query = $this->db->query('SELECT
      COUNT(idbencana) AS jml
      FROM
      bencana
      JOIN jenisbencana
      ON idjenisbencana = bencanaIdJenisBencana
      JOIN kecamatan
      ON idkecamatan = bencanaIdKecamatan
      JOIN desa
      ON iddesa = bencanaIdDesa
      JOIN dusun
      ON iddusun = bencanaIdDusun
      WHERE bencanaTgl >= (CURDATE() - INTERVAL 90 DAY)
      AND bencanaidjenisbencana = ' . $idjenisbencana . '
      ORDER BY bencanaTgl DESC');
    if ($query->num_rows() > 0) {

      return $query;
    } else {
      return $query;
    }
  }



  public function jml_korban($idjenisbencana, $idbencana)
  {
    $query = $this->db->query('SELECT
    IFNULL( SUM(
      CASE
      WHEN korbanKondisi = 3
      THEN 1
      ELSE 0
      END), " - ") AS luka_ringan,
    IFNULL(SUM(
      CASE
      WHEN korbanKondisi = 2
      THEN 1
      ELSE 0
      END) , " - ")AS luka_berat,
    IFNULL( SUM(
      CASE
      WHEN korbanKondisi = 1
      THEN 1
      ELSE 0
      END), " - ") AS meninggal_dunia,
    IFNULL( SUM(
      CASE
      WHEN korbanKondisi = 4
      THEN 1
      ELSE 0
      END), " - ") AS hilang

      FROM
      korban
      JOIN bencana
      ON idbencana = korbanIdBencana
      JOIN jenisbencana
      ON idjenisbencana = bencanaIdJenisBencana
      WHERE bencanaTgl >= (CURDATE() - INTERVAL 90 DAY)
      AND bencanaidjenisbencana = ' . $idjenisbencana . '
      AND idbencana =' . $idbencana . '
      ORDER BY bencanaTgl DESC;

      ');
    if ($query->num_rows() > 0) {

      return $query;
    } else {
      return $query;
    }
  }

  public function jml_pengungsi($idjenisbencana, $idbencana)
  {
    $query = $this->db->query('SELECT
      COUNT(idpengungsi) AS jml_pengungsi
      FROM
      pengungsi
      JOIN bencana ON idbencana = pengungsiIdBencana
      JOIN jenisbencana ON idjenisbencana = bencanaIdJenisBencana
      WHERE bencanaTgl >= (CURDATE() - INTERVAL 90 DAY)
      AND bencanaidjenisbencana = ' . $idjenisbencana . '
      AND idbencana = ' . $idbencana . '
      ORDER BY bencanaTgl DESC');
    if ($query->num_rows() > 0) {

      return $query;
    } else {
      return $query;
    }
  }

  public function nama_foto($idjenisbencana, $idbencana)
  {
    $query = $this->db->query('SELECT
      foto_bencanaNama
      FROM
      foto_bencana
      JOIN bencana
      ON idbencana = foto_bencanaIdBencana
      JOIN jenisbencana
      ON idjenisbencana = bencanaIdJenisBencana
      WHERE bencanaTgl >= (CURDATE() - INTERVAL 90 DAY)
      AND bencanaidjenisbencana = ' . $idjenisbencana . '
      AND idbencana = ' . $idbencana . '
      ORDER BY bencanaTgl DESC');
    if ($query->num_rows() > 0) {
      return $query;
    } else {
      return $query;
    }
  }

  public function path_foto($idjenisbencana, $idbencana)
  {
    $query = $this->db->query('SELECT
      foto_bencanaPath
      FROM
      foto_bencana
      JOIN bencana
      ON idbencana = foto_bencanaIdBencana
      JOIN jenisbencana
      ON idjenisbencana = bencanaIdJenisBencana
      WHERE bencanaTgl >= (CURDATE() - INTERVAL 90 DAY)
      AND bencanaidjenisbencana = ' . $idjenisbencana . '
      AND idbencana = ' . $idbencana . '
      ORDER BY bencanaTgl DESC');
    if ($query->num_rows() > 0) {

      return $query;
    } else {
      return $query;
    }
  }

  public function delete($id)
  {
    $this->db->where('idbencana', $id)->delete($this->table);
    // $this->db->where('bpIdBencana',$id)->delete('bencana_peralatan');        
    // $this->db->where('bpidbencana',$id)->delete('bencana_petugas');
    // $this->db->where('foto_bencanaIdBencana',$id)->delete('foto_bencana');
    // $this->db->where('pengangananIdBencana',$id)->delete('penanganan');
    // $this->db->where('pengungsiIdBencana',$id)->delete('pengungsi');
    // $this->db->where('foto_bencanaIdBencana',$id)->delete('foto_bencana');                        
    return true;
  }
  public function get_detail($id)
  {
    $query = $this->db->select('*')
      ->from($this->table)
      ->join('jenisbencana', 'idjenisbencana=bencanaIdJenisBencana')
      ->join('kecamatan', 'idkecamatan=bencanaIdKecamatan')
      ->join('desa', 'iddesa=bencanaIdDesa')
      ->join('dusun', 'iddusun=bencanaIdDusun')
      // ->join('petugas','idpetugas=bencanaIdPetugas','left')
      // ->join('bencana_petugas','bpidbencana=idbencana','right')
      // ->join('petugas','idpetugas=bpidpetugas','')     
      ->where('idbencana', $id)
      ->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return $query;
    }
  }

  public function get_pengungsi($id)
  {
    $query = $this->db->select('pengungsi.*, kecamatanNama, desaNama, dusunNama')
      ->from('pengungsi')
      ->join('bencana', 'idbencana=pengungsiIdBencana')
      ->join('kecamatan', 'idkecamatan=pengungsiIdKecamatan')
      ->join('desa', 'iddesa=pengungsiIdDesa')
      ->join('dusun', 'iddusun=pengungsiIdDusun')
      ->where('pengungsiIdBencana', $id)
      ->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return $query->result();
    }
  }
  public function get_foto($id)
  {
    $query = $this->db->select('foto_bencana.*')
      ->from('foto_bencana')
      ->join('bencana', 'idbencana=foto_bencanaIdBencana')
      ->where('foto_bencanaIdBencana', $id)
      ->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return $query->result();
    }
  }

  public function get_petugas($id)
  {
    $query = $this->db->select('petugas.*')
      ->from('petugas')
      ->join('bencana_petugas', 'bpidpetugas=idpetugas')
      ->join('bencana', 'idbencana=bpidbencana')
      ->where('bpidbencana', $id)
      ->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return $query->result();
    }
  }

  public function get_peralatan($id)
  {
    $query = $this->db->select('peralatan.*,bpJml')
      ->from('peralatan')
      ->join('bencana_peralatan', 'bpIdPeralatan=idperalatan')
      ->join('bencana', 'idbencana=bpIdBencana')
      ->where('idbencana', $id)
      ->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return $query->result();
    }
  }

  public function get_kerusakan($id)
  {
    $query = $this->db->select('*')
      ->from('kerusakan')
      ->join('bencana', 'idbencana=kerusakanIdBencana')
      ->join('kerusakan_properti', 'idkerusakan_properti=kerusakanProperti')
      ->join('kerusakan_tingkat_rusak', 'idkerusakan_tingkat_rusak=kerusakanTingkatRusak')
      ->join('kecamatan', 'idkecamatan=kerusakanIdKecamatan')
      ->join('desa', 'iddesa=kerusakanIdDesa')
      ->join('dusun', 'iddusun=kerusakanIdDusun')
      ->where('kerusakanIdBencana', $id)
      ->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return $query->result();
    }
  }

  public function get_kerusakan1($id)
  {
    $query = $this->db->select('*')
      ->from('kerusakan')
      ->join('kerusakan_properti', 'idkerusakan_properti=kerusakanProperti')
      ->join('kerusakan_tingkat_rusak', 'idkerusakan_tingkat_rusak=kerusakanTingkatRusak')
      ->where('kerusakanIdBencana', $id)
      ->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return $query->result();
    }
  }

  public function get_properti()
  {
    return $this->db->get('kerusakan_properti')->result();
  }
  public function get_tingkat_rusak()
  {
    return $this->db->get('kerusakan_tingkat_rusak')->result();
  }

  public function get_korban($id)
  {
    $query = $this->db->select('korban.*, kecamatanNama, desaNama, dusunNama')
      ->from('korban')
      ->join('bencana', 'idbencana=korbanIdBencana')
      ->join('kecamatan', 'idkecamatan=korbanIdKecamatan')
      ->join('desa', 'iddesa=korbanIdDesa')
      ->join('dusun', 'iddusun=korbanIdDusun')
      ->where('korbanIdBencana', $id)
      ->get();

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return $query->result();
    }
  }

  public function add_kerusakan($data)
  {
    $this->db->insert('kerusakan', $data);
    return true;
  }
  public function add_foto($data)
  {
    $this->db->insert('foto_bencana', $data);
    return true;
  }

  // proses tambah
  public function add($data)
  {
    $this->db->insert($this->table, $data);
    $insert_id = $this->db->insert_id();
    return $insert_id;
  }
  public function update($data, $id)
  {
    $this->db->where('idbencana', $id)->update($this->table, $data);
    return true;
  }


  // korban jiwa

  public function add_korban($data)
  {
    $this->db->insert('korban', $data);
    return true;
  }
  public function add_pengungsi($data)
  {
    $this->db->insert('pengungsi', $data);
    return true;
  }
  public function update_korban($data, $id)
  {
    $this->db->where('idkorban', $id)->update('korban');
    return true;
  }


  public function get_by_month($bln, $thn)
  {
    $query = $this->db->select('*')
      ->from($this->table)
      ->join('jenisbencana', 'idjenisbencana=bencanaIdJenisBencana')
      ->join('kecamatan', 'idkecamatan=bencanaIdKecamatan')
      ->join('desa', 'iddesa=bencanaIdDesa')
      ->join('dusun', 'iddusun=bencanaIdDusun')
      ->where('month(bencanaTgl)', $bln)
      ->where('year(bencanaTgl)', $thn)
      ->get();
    // $que = $this->db->query('SELECT *  FROM db_bpbd.bencana where month(bencanaTgl)="'.$bln.'" and year(bencanaTgl)="'.$thn.'"')->result();
    return $query->result();
  }

  // end

  // chart
  public function chart_bencana_last90day()
  {
    $query = $this->db->query('SELECT
      jenisBencanaNama,
      COUNT(idbencana) AS jumlah
      FROM
      bencana
      JOIN jenisbencana ON idjenisbencana = bencanaIdJenisBencana
      WHERE bencanaTgl >= (CURDATE() - INTERVAL 90 DAY)
      GROUP BY bencanaIdJenisBencana');

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $data) {
        $hasil[] = $data;
      }
      return $hasil;
    }
  }
  public function chart_korban_last90day()
  {
    $query = $this->db->query('SELECT
      korbanKondisi,
      COUNT(idkorban) AS jumlah
      FROM
      korban
      JOIN bencana ON idbencana = korbanIdBencana
      WHERE bencanaTgl >= (CURDATE() - INTERVAL 90 DAY)
      GROUP BY korbanKondisi');

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $data) {
        $hasil[] = $data;
      }
      return $hasil;
    }
  }

  /* Tambahan Saddam */

  function getPublicBencana($dateFrom, $dateTo)
  {
    $bencana = $this->db->select("
      bencanaHari, bencanaTgl, bencanaWaktu, kecamatanNama, bencanaNamaKampung,
      desaNama, dusunNama, jenisbencanaNama,
      bencanaPenyebab, bencanaKronologi, bencanaBt, bencanaLs
      ")
      ->where("bencanaTgl >=", $dateFrom)
      ->where("bencanaTgl <=", $dateTo)
      ->join("kecamatan", "bencanaIdKecamatan=idkecamatan")
      ->join("desa", "bencanaIdDesa=iddesa")
      ->join("dusun", "bencanaIdDusun=iddusun")
      ->join("jenisbencana", "bencanaIdJenisBencana=idjenisbencana")
      ->order_by("bencanaTgl", "ASC")
      ->get("bencana")
      ->result();
    return $bencana;
  }

  function getRecapBencana($dateFrom, $dateTo)
  {
    $bencana = $this->db->select("jenisbencanaNama, COUNT(idbencana) as jumlah")
      ->where("bencanaTgl >=", $dateFrom)
      ->where("bencanaTgl <=", $dateTo)
      ->join("jenisbencana", "bencanaIdJenisBencana=idjenisbencana")
      ->group_by("idjenisbencana")
      ->order_by("idjenisbencana")
      ->get("bencana")
      ->result();
    return $bencana;
  }

  function getRecapKorban($dateFrom, $dateTo)
  {
    // $dateFrom = "2018-01-01";
    // $dateTo = date("Y-m-d");
    $korban = $this->db->select("korbanKondisi, COUNT(idkorban) as jumlah")
      ->where("bencanaTgl >=", $dateFrom)
      ->where("bencanaTgl <=", $dateTo)
      ->join("bencana", "korbanIdBencana=idbencana")
      ->group_by("korbanKondisi")
      ->get("korban")
      ->result();
    return $korban;
  }

  function getProperty()
  {
    return $this->db->get("kerusakan_properti")->result();
  }

  function getKerusakanCount($idbencana, $properti, $tingkat)
  {
    $data = $this->db->select("IFNULL(COUNT(idkerusakan),0) as TOT_KERUSAKAN")->where("kerusakanIdBencana", $idbencana)
      ->where("kerusakanProperti", $properti)
      ->where("kerusakanTingkatRusak", $tingkat)
      ->get("kerusakan")->result();
    return $data[0]->TOT_KERUSAKAN;
  }

  function getKerugianSum($idbencana, $properti)
  {
    $data = $this->db->select("IFNULL(SUM(kerusakanKerugian),0) as TOT_KERUGIAN")->where("kerusakanIdBencana", $idbencana)
      ->where("kerusakanProperti", $properti)
      ->get("kerusakan")->result();
    return $data[0]->TOT_KERUGIAN;
  }

  function getLastStatus($idbencana)
  {
    $data = $this->db->select("IFNULL(MAX(penangananOpd),0) as status")->where("penangananIdBencana", $idbencana)->get("penanganan")->result();
    $status = array(
      0 => "<span class='label label-danger'>Belum Terkondisi</span>",
      1 => "<span class='label label-warning'>Tahap Penaganan</span>",
      2 => "<span class='label label-success'>Terkondisi</span>"
    );
    return $status[$data[0]->status];
  }

  function get_lainnya($id)
  {
    return $this->db->where("bencana", $id)->get("kerusakan_lain")->result();
  }
}
