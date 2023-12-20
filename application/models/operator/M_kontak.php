<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kontak extends CI_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table = 'kontak';
    }


    public function get_data()
    {
        $query = $this->db->get($this->table);

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
        $query = $this->db->where('idkontak',$id)->get($this->table);

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
        $this->db->where('idkontak',$id)->update($this->table, $data);
        return true;
    }    
    public function delete($id){
        $this->db->where('idkontak',$id)->delete($this->table);
        return true;
    }        

}
