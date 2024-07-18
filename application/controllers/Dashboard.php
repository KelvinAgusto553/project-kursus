<?php 
defined("BASEPATH") OR exit("No direct script access allowed");

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model('m_dashboard');
        $this->load->model('m_login');
    }

    public function index()
    {

        $this->load->view('home/layout/header');
        $this->load->view('home/layout/navbar');
        $this->load->view('home/dashboard/dashboard');
        $this->load->view('home/layout/footer');
    }
}