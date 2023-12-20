<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_files extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->table = 'files';
    }


    public function get_data()
    {
        $query = $this->db->order_by('idfiles', 'desc')->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return true;
    }


    public function delete($id)
    {
        // $this->db->where('idfiles', $id)->delete($this->table);
        $_id = $this->db->where('idfiles', $id)->get('files')->row();
        $this->db->delete('files', ['idfiles' => $id]);
        unlink("upload/files/" . $_id->filesNama);
        return true;
    }
}
