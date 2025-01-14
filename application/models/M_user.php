<?php
defined("BASEPATH") or exit("No direct script access allowed");

class M_user extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    function tampil_data_user()
    {
        return $this->db->get('user')->result_array();
    }

    function insert_user($data)
    {
        return $this->db->insert('user', $data);
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
