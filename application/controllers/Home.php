<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        if (empty($this->session->userdata('user_id'))) {
            redirect(site_url(), 'refresh');
        }
    }



    public function index()
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['active'] = $this->db->get_where('user', ['id' => 4])->row_array();
        $this->db->select('user.id,name,username,is_active,user_role.role');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        $this->db->where('user.id !=', 9); //hilangkan adam dari list
        $this->db->where('role_id >=', 3); //tampilkan hanya DTDC
        // $this->db->where('role_id =', 4); //tampilkan hanya DTDC

        $data['menu'] = $this->db->get('user')->result_array(); //array banyak

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        // $user_id = "1";
        $user_id = $this->input->post('userId');
        $username = $this->input->post('userName');
        $is_active = $this->input->post('activeId');
        // var_dump($is_active);
        // die;
        if ($is_active == 0) {

            $this->db->set('is_active', 1);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">Access User ' . ucfirst($username) . ' Activated! </div>');
        } else {

            $this->db->set('is_active', 0);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">Access User ' . ucfirst($username) . ' Deactivated! </div>');
        }
        $this->db->where('id', $user_id);
        $this->db->update('user');
        redirect(base_url('Home'), 'refresh');
    }
}
