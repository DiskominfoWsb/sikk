<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penanganan extends CI_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table = 'penanganan';
    }


    public function get_data($id)
    {
        $query = $this->db->select('penanganan.*')
                        ->from($this->table)
                        ->join('bencana','idbencana=penangananIdBencana')
                        ->where('penangananIdBencana',$id)                   
                        ->order_by('penangananOpd')                   
                        ->get();

        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return $query->result();
        }
    }

    public function get_data_result_array($id)
    {
        $query = $this->db->select('penanganan.*')
                        ->from($this->table)
                        ->join('bencana','idbencana=penangananIdBencana')
                        ->where('penangananIdBencana',$id)                   
                        ->get();

        if ($query->num_rows() > 0)
        {
            return $query;
        }
        else
        {
            return $query;
        }
    }     

    public function add($data){
        $this->db->insert($this->table, $data);
        return true;
    }

    public function update($data, $id){
        $this->db->where('idpenanganan',$id)->update($this->table, $data);
        return true;
    }    
    public function delete($id){
        $this->db->where('idpenanganan',$id)->delete($this->table);
        return true;
    }    

    /* Update Saddam */
    public function getPenanganan(){
      return array(
        0 => "Belum Terkondisi",
        1 => "Tahap Penanganan",
        2 => "Terkondisi"
      );
    } 

    /* End Update Saddam */    

}
