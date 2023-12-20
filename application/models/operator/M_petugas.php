<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_petugas extends CI_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table = 'petugas';
    }


    public function get_data()
    {
        $query = $this->db->order_by('idpetugas','desc')->get($this->table);

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
        $query = $this->db->where('idpetugas',$id)->get($this->table);

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
        $this->db->where('idpetugas',$id)->delete($this->table);
        return true;
    }            

}
