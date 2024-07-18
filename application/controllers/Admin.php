<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('m_dashboard');
        $this->load->model('m_user');
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

        $data['keyword'] = $this->input->get('keyword');
        $data['search_result'] = $this->m_user->search($data['keyword']);

        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/navbar');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/menu/menu_user', $data);
        $this->load->view('admin/layout/footer');
    }


    public function logout() {
        $this->session->sess_destroy();
        redirect('dashboard');
    }
}