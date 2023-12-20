<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_organisasi extends CI_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table = 'rel_organisasi';
    }


    public function get_data()
    {
        $query = $this->db->order_by('idOrg','desc')->get($this->table);

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
        $query = $this->db->where('idOrg',$id)->get($this->table);

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
        $this->db->where('idOrg',$id)->update($this->table, $data);
        return true;
    }    
    public function delete($id){
        $this->db->where('idOrg',$id)->delete($this->table);
        return true;
    }  

    function getOrganisasiIdByName( $name ){
        return $this->db->select("idOrg")->like("orgNama", $name)->limit(1)->get("rel_organisasi")->result();
    }          

}
