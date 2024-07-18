<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_login extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    function cek_login($username)
    {
       $result = $this->db->query("SELECT * FROM user WHERE username='$username' LIMIT 1");
       return $result;
    }

    function cek_password($username, $password)
    {
        $result = $this->db->query("SELECT * FROM user WHERE username='$username' AND password=md5('$password') LIMIT 1");
        return $result;
    }

    public function getDataUserByName($username) {
        return $this->db->get_where('data_user', array('username' => $username))->result();
    }
}