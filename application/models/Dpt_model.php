<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dpt_model extends CI_Model
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     // $this->load->database();
    //     // $namakec = 'panakukkang';
    // }
    public function getDptKecamatan($limit, $start, $namakec, $keyword = null)
    {
        $this->db->where('namakec', $namakec);

        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('noktp', $keyword);
        }

        return $this->db->get('dpt', $limit, $start)->result_array();
    }

    public function countAllDpt($namakec, $keyword = null)
    {
        $this->db->where('namakec', $namakec);

        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('noktp', $keyword);
        }

        return $this->db->count_all_results('dpt');
    }
}
