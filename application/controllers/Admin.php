<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('m_dashboard');
        $this->load->model('m_user');
        $this->load->model('m_kursus');
    }

    public function index()
    {
        $data['total_user'] = $this->m_dashboard->jumlah_user();

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
    }

    public function user()
    {
        $data['users'] = $this->m_user->tampil_data_user();
        $data['data_user'] = $this->m_user->tampil_data_user();

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/menu/menu_user', $data);
        $this->load->view('admin/layout/footer');
    }

    public function tambah_user()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/menu/tambah_user');
        $this->load->view('admin/layout/footer');
    }

    public function insert_user()
    {
        $username = $this->input->post('username', true);
        $password = md5($this->input->post('password', true));
        $role = $this->input->post('role', true);
        $image = $this->m_user->uploadImage();

        $data = array(
            'username' => $username,
            'password' => $password,
            'role' => $role,
            'image' => $image['file']['file_name']
        );
        $this->m_user->insert_user($data);
        redirect('admin/user');
    }

    public function kursus()
    {
        $data['kursuss'] = $this->m_kursus->tampil_data_kursus();

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/menu_kursus/kursus', $data);
        $this->load->view('admin/layout/footer');
    }


    public function logout() {
        $this->session->sess_destroy();
        redirect('dashboard');
    }
}