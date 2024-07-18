<?php
defined("BASEPATH") or exit("No direct script access allowed");

class M_kursus extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    function tampil_data_kursus()
    {
        return $this->db->get('data_kursus')->result_array();
    }

    function insert_kursus($data)
    {
        return $this->db->insert('data_kursus', $data);
    }

    function uploadImage() {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '4000';
        $config['remove_space'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('upload_image')) {
            return array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
        }else{
            return array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
        }
    }
}