<?php
defined("BASEPATH") or exit("No direct script access allowed");

class M_user extends CI_Model
{
    // public function __construct() {
    //     parent::__construct();
    // }

    function tampil_data_user()
    {
        return $this->db->get('data_user')->result_array();
    }

    function search($keyword)
    {
        if (!$keyword) {
            return null;
        }
        $this->db->like('nama_lengkap', $keyword);
        $this->db->or_like('username', $keyword);
        $query = $this->db->get('data_user')->result_array();
        return $query->result();
    }

    public function getDataUserByName($username)
    {
        return $this->db->get_where('data_user', array('username' => $username))->result();
    }
}
