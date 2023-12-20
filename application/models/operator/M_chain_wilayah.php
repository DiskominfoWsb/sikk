<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_chain_wilayah extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function get_kecamatan()
    {
        $query = $this->db->select('*')
            ->from('kecamatan')
            ->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result['-'] = '- Pilih Kecamatan -';
                $result[$row['idkecamatan']] = ucwords(strtolower($row['kecamatanNama']));
            }
            return $result;
        }
    }

    public function get_desa($idkecamatan)
    {
        $query = $this->db->select('*')
            ->from('desa d')
            ->join('kecamatan k', 'k.idkecamatan=d.desaIdKecamatan')
            ->where('idkecamatan', $idkecamatan)
            ->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result['-'] = '- Pilih Desa -';
                $result[$row['iddesa']] = ucwords(strtolower($row['desaNama']));
            }
            return $result;
        }
    }

    public function get_dusun($iddesa)
    {
        $query = $this->db->select('*')
            ->from('dusun du')
            ->join('desa de', 'de.iddesa=du.dusunIdDesa')
            ->where('iddesa', $iddesa)
            ->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result['-'] = '- Pilih Dusun -';
                $result[$row['iddusun']] = ucwords(strtolower($row['dusunNama']));
            }
            return $result;
        }
    }
}
