<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('username') !== null) {
            redirect(base_url().'auth');
        }
        $this->load->model('m_login');
    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function messageAlert($type, $title) {
        $messageAlert = "
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
    
        Toast.fire({
            type: '".$type."',
            title: '".$title."'
        });
        ";
        return $messageAlert;
    }

    public function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        if ($username && $password) {
            $loginKaryawan = $this->m_login->cek_login($username, $password);
            if ($loginKaryawan[0]->id !== null) {
                $getDataUser = $this->m_login->getDataUserByName($username);
                $this->session->set_userdata('id', $getDataUser[0]->id_user);
                $this->session->set_userdata('name', $getDataUser[0]->name);
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('role', $loginKaryawan[0]->role);
                redirect('admin');
            }else{
                $this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'Login gagal'));
                redirect();
            }
        }else{
            $this->session->set_flashdata('messageAlert', $this->messageAlert('error', 'Login gagal'));
            redirect();
        }
    }
}