<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getMainGraph()
    {
        $this->db->select('count(id) as total, date_created');
        $this->db->from('lks_dtdc');
        $this->db->where('lks_dtdc.user_id', $this->session->userdata('user_id'));
        $this->db->group_by('date_created');
        $this->db->order_by('date_created', 'ASC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function getTotalDaftar()
    {
        $this->db->select('count(lks_dtdc.noktp) as totaldaftar');
        $this->db->from('lks_dtdc');
        $this->db->where('lks_dtdc.user_id', $this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotalDpt()
    {
        $this->db->select('count(dpt.id) as totaldpt');
        $this->db->from('dpt');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPencapaian()
    {
        $this->db->select('lks_dtdc.id, dpt.noktp, dpt.nama, dpt.alamat, namakel, namakec, rt, rw, tps, count(lks_dtdc.noktp) as total');
        $this->db->from('dpt');
        $this->db->join('lks_dtdc', 'lks_dtdc.dpt_id = dpt.id');
        $this->db->where('lks_dtdc.user_id', $this->session->userdata('user_id'));
        $this->db->group_by('namakec');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLksDtdc()
    {
        $this->db->select('lks_dtdc.id, dpt.noktp, dpt.nama, dpt.alamat, namakel, namakec, rt, rw, tps, lks_dtdc.nohp, image');
        $this->db->from('dpt');
        $this->db->join('lks_dtdc', 'lks_dtdc.dpt_id = dpt.id');
        $this->db->where('lks_dtdc.user_id', $this->session->userdata('user_id'));
        $this->db->order_by('lks_dtdc.id', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }
}
