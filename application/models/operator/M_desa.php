<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_desa extends CI_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table = 'desa';
    }


    public function get_data()
    {
        $query = $this->db->select('*')
                        ->from('desa d')
                        ->join('kecamatan k','k.idkecamatan=d.desaIdKecamatan')
                        ->get();

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
        $query = $this->db->select('*')
                        ->from('desa d')
                        ->join('kecamatan k','k.idkecamatan=d.desaIdKecamatan')
                        ->where('iddesa',$id)
                        ->get();

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
        $this->db->where('iddesa',$id)->update($this->table, $data);
        return true;
    }    
    public function delete($id){
        $this->db->where('iddesa',$id)->delete($this->table);
        return true;
    }

    function getDesaIdByName( $name, $kecId ){
      if( is_numeric($kecId)){
        $this->db->where("desaIdKecamatan", $kecId);
      }
      return $this->db->select("iddesa")->where("desaNama", $name)->get("desa")->result();
    }                 

}
