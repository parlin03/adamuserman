<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('user_id')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect(base_url("home"));
            } elseif ($this->session->userdata('role_id') == 2) {
                redirect(base_url("home"));
            } else {
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('email');
                $this->session->unset_userdata('role_id');
                $this->session->unset_userdata('user_id');

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">You are not authorize!</div>');
                redirect('auth');
            }
        }


        // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $wherecond = " ( username ='" . $email . "' OR email='" . $email . "')  ";
        $this->db->where($wherecond);
        $user = $this->db->get('user')->row_array();

        // $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // var_dump($user);
        // die;
        // jika user ada
        if ($user) {
            //jika user aktif
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'user_id' => $user['id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect(base_url());
                    } elseif ($user['role_id'] == 2) {
                        redirect(base_url());
                    } else {
                        $this->session->unset_userdata('username');
                        $this->session->unset_userdata('email');
                        $this->session->unset_userdata('role_id');
                        $this->session->unset_userdata('user_id');

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">You are not authorize!</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">This email ' . $email . ' has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('user_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">You have been logged out!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
