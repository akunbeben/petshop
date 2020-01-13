<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model
{

    public function get($param = null)
    {
        $this->db->from('users');
        $this->db->where('username', $param);
        return $this->db->get();
    }
}