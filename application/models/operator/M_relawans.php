<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_relawans extends CI_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table = 'relawan';
    }


    public function get_data()
    {
        $query = $this->db->query('SELECT
                      r.*,
                      d.`dusunNama`,
                      de.`desaNama`,
                      k.`kecamatanNama`,
                      pend.`refPendNama`,
                      ro.`orgNama`
                    FROM
                      relawan AS r
                      LEFT JOIN ref_pendidikan AS pend
                        ON r.`relIdPend` = pend.`idRefPend`
                      LEFT JOIN dusun AS d
                        ON d.`iddusun` = r.`relIdDusun`
                      LEFT JOIN desa AS de
                        ON de.`iddesa` = r.`relIdDesa`
                      LEFT JOIN kecamatan AS k
                        ON k.`idkecamatan` = r.`relIdKec`
                      LEFT JOIN rel_organisasi AS ro 
                        ON ro.`idOrg` = r.`relIdOrg`
                      -- LIMIT 100
                      ');

        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }
    public function get_pend()
    {
        $query = $this->db->order_by('idRefPend','asc')->get('ref_pendidikan');

        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }
    public function get_keahlian()
    {
        $query = $this->db->order_by('idKeahlian','asc')->get('ref_keahlian');

        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }    
    public function get_org()
    {
        $query = $this->db->order_by('idOrg','asc')->get('rel_organisasi');

        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }        
        public function get_detail($id)
    {
       $query = $this->db->query('SELECT
                      r.*,
                      d.`dusunNama`,
                      de.`desaNama`,
                      k.`kecamatanNama`,
                      pend.`refPendNama`,
                      ro.`orgNama`,
                      GROUP_CONCAT(refk.`keahlianNama`) AS keahlian
                    FROM
                      relawan AS r
                      LEFT JOIN ref_pendidikan AS pend
                        ON r.`relIdPend` = pend.`idRefPend`
                      LEFT JOIN dusun AS d
                        ON d.`iddusun` = r.`relIdDusun`
                      LEFT JOIN desa AS de
                        ON de.`iddesa` = r.`relIdDesa`
                      LEFT JOIN kecamatan AS k
                        ON k.`idkecamatan` = r.`relIdKec`
                      LEFT JOIN rel_organisasi AS ro 
                        ON ro.`idOrg` = r.`relIdOrg`
                      LEFT JOIN rel_keahlian AS rk
                        ON rk.`idRel` = r.`idrel`
                      LEFT JOIN ref_keahlian AS refk
                        ON refk.`idKeahlian` = rk.`idKeahlian`
                        WHERE r.`idrel`= '.$id.'
                    GROUP BY r.`idrel`;



                            ');

        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }
    public function add($data){
        $this->db->insert($this->table, $data);
        return true;
    }

    public function update($data, $id){
        $this->db->where('idpetugas',$id)->update($this->table, $data);
        return true;
    }    
    public function delete($id){
        $this->db->where('idrel',$id)->delete($this->table);
        return true;
    }  

    function get_keahlianRelawan( $id ){
      return $this->db->where("idRel", $id)->get("rel_keahlian")->result();
    }  

    function getPendidikanId( $name ){
      if( $name == "Aliyah" || $name == "SLTA" || $name == "SMK" || $name == "SLTA/SEDERAJAT" ){
        $name = "SMA";
      }
      if( $name == "SLTP" || $name == "SLTP/SEDERAJAT" ){
        $name = "SMP";
      }
      if( $name == "TAMAT SD/SEDERAJAT" ){
        $name = "SD";
      }
      if( strtolower($name) == "sarjana" ){
        $name = "S1";
      }
      if( $name == "D IV" || strpos($name, "DIPLOMA IV") || $name = "Diploma IV" ){
        $name = "D4";
      }
      if( strpos($name, "DIPLOMA III") ){
        $name = "D3";
      }
      if( strpos($name, "DIPLOMA II") ){
        $name = "D2";
      }
      if( strpos($name, "DIPLOMA I") ){
        $name = "D1";
      }
      return $this->db->like("refPendNama", $name)->limit(1)->get("ref_pendidikan")->result();
    } 

    function getKeahlianRelawan( $idrel ){
      $result = "";
      $keahlian = $this->db->join("ref_keahlian", "ref_keahlian.idKeahlian=rel_keahlian.idkeahlian", "LEFT")
                 ->where("idRel", $idrel)->get("rel_keahlian")->result();
      if( count($keahlian) > 0 ){
        foreach( $keahlian as $ahli ){
          if($ahli->keahlianNama != ""){
            $result .= $ahli->keahlianNama . ", ";
          } else {
            $result .= "";
          }
        }
      } else {
        $result = "Kosong";
      }
      if( $result == "" ){
        $result = "Kosong";
      }
      return $result;
    }       

}
