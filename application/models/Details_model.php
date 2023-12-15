<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Details_model extends CI_Model
{
    public function rules()
    {
        return [
            ['field' => 'nik', 'label' => 'Nik', 'rules' => 'required'],
            ['field' => 'nama', 'label' => 'Nama', 'rules' => 'required'],
            ['field' => 'alamat', 'label' => 'Alamat', 'rules' => 'required'],
            ['field' => 'program', 'label' => 'Program', 'rules' => 'required'],
            ['field' => 'tanggapan', 'label' => 'Tanggapan', 'rules' => 'required']
        ];
    }
    function getKecamatan()
    {

        $this->db->select('lks_dtdc.id, dpt.noktp, dpt.nama, dpt.alamat, dpt.namakel, dpt.namakec, dpt.rt, dpt.rw, dpt.tps, lks_dtdc.nohp, image');
        $this->db->from('dpt');
        $this->db->join('lks_dtdc', 'lks_dtdc.dpt_id = dpt.id');
        $this->db->where('lks_dtdc.user_id', $this->session->userdata('user_id'));
        $this->db->order_by('lks_dtdc.id', 'DESC');
        $query = $this->db->get();
        // var_dump($query);
        // die;
        return $query->result_array();
    }

    // function getKelurahan($postData)
    // {

    //     $response = array();

    //     // Select record
    //     $this->db->select('iddesa,namakel');
    //     $this->db->where('idkec', $postData['namakec']);
    //     $q = $this->db->get('kel');
    //     $response = $q->result_array();

    //     return $response;
    // }

    function getKelurahan($idkec)
    {
        //ambil data kabupaten berdasarkan id provinsi yang dipilih
        $this->db->where('idkec', $idkec);
        $this->db->order_by('idkel', 'ASC');
        $query = $this->db->get('kel');

        $output = '<option value="">-- Pilih Kabupaten --</option>';

        //looping data
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        //return data kabupaten
        return $output;
    }
}
