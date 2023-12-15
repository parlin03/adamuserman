<?php

use Symfony\Component\Yaml\Dumper;

defined('BASEPATH') or exit('No direct script access allowed');

class Dtdc_model extends CI_Model
{
    private $table = 'lks_dtdc';
    private $tbl_dpt = 'dpt';


    public function __construct()
    {
        parent::__construct();
    }



    public function rules()
    {
        return [
            [
                'field' => 'noktp',  //samakan dengan atribute name pada tags input
                'label' => 'Noktp',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from mahasiswa where IdMhsw='$id'
    }

    //menampilkan semua data mahasiswa
    public function getAll()
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->from($this->table);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from mahasiswa order by IdMhsw desc
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

    public function search($keyword)
    {
        if (!$keyword) {
            return null;
        }
        $this->db->like('noktp', $keyword);
        $query = $this->db->get($this->tbl_dpt);

        return $query->result_array();
    }
    //menampilkan data mahasiswa berdasarkan id mahasiswa
    //menyimpan data mahasiswa
    public function save()
    {
        $data = [
            'nik'       => $this->input->post('nik'),
            'nama'      => $this->input->post('nama'),
            'alamat'    => $this->input->post('alamat'),
            'namakel' => $this->input->post('kelurahan'),
            'namakec' => $this->input->post('kecamatan'),
            'nohp'      => $this->input->post('nohp'),
            'tanggapan' => $this->input->post('tanggapan'),
            'user_id'   => $this->session->userdata('user_id')
        ];
        return $this->db->insert($this->table, $data);
    }

    //edit data mahasiswa
    public function update()
    {
        $data = [
            'nik'       => $this->input->post('nik'),
            'nama'      => $this->input->post('nama'),
            'alamat'    => $this->input->post('alamat'),
            'namakel' => $this->input->post('kelurahan'),
            'namakec' => $this->input->post('kecamatan'),
            'nohp'      => $this->input->post('nohp'),
            'tanggapan' => $this->input->post('tanggapan'),
            'user_id'   => $this->session->userdata('user_id')
        ];
        return $this->db->update($this->table, $data, ['id' => $this->input->post('id')]);
    }

    //hapus data mahasiswa
    public function delete($id)
    {
        return $this->db->delete($this->table, ["id" => $id]);
    }
}
