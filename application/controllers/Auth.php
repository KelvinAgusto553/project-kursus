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

    function login()
    {
        $username = $this->input->post('username');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $password = $this->input->post('password');

        $validasi_email = $this->m_login->cek_login($username, $password);
        if($validasi_email->num_rows() > 0) {
            $validate_ps = $this->m_login->cek_password($username, $password);
            $x = $validate_ps->row_array();
            if($x['status'] == '1') {
                $this->session->set_userdata('logged', TRUE);
                $this->session->set_userdata('username', $username);
                $id=$x['id'];
                if($x['role'] == 'admin') {
                    $username = $x['username'];
                    $nama_lengkap = $x['nama_lengkap'];
                    $this->session->set_userdata('id', $id);
                    $this->session->set_userdata('username', $username);
                    $this->session->set_userdata('nama_lengkap', $nama_lengkap);
                    redirect('admin');
                } 
            } else {
                $url=base_url('auth');
                echo $this->session->set_flashdata->messageAlert('error');
                redirect($url);
            }
        } else {
            $url=base_url('auth');
                echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Uupps!</h3>
                    <p>Password yang kamu masukan salah.</p>');
                redirect($url);
        }
    }
}