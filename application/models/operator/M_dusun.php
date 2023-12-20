<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dusun extends CI_Model {

  public function __construct()
  {
    parent::__construct();

    $this->table = 'dusun';
  }


  public function get_data()
  {
    $query = $this->db->select('*')
    ->from('desa')
    ->join('dusun','dusunIdDesa=iddesa')
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
    ->from('desa')
    ->join('dusun','dusunIdDesa=iddesa')
    ->where('iddusun',$id)
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
    $this->db->where('iddusun',$id)->update($this->table, $data);
    return true;
  }    
  public function delete($id){
    $this->db->where('iddusun',$id)->delete($this->table);
    return true;
  }   

  function getDusunIdByName( $name, $desaId ){
    if( is_numeric($desaId)){
      $this->db->where("dusunIdDesa", $desaId);
    }
    return $this->db->select("iddusun")->where("dusunNama", $name)->get("dusun")->result();
  }     

}
