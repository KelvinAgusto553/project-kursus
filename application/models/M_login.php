<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_login extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function cek_login($username, $password) {
        return $this->db->where('username', $username)->where('password', $password)->get('user')->result();
    }

    public function getDataUserByName($username) {
        return $this->db->get_where('data_user', array('username' => $username))->result();
    }
}