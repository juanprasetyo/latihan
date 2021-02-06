<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_color extends CI_Model
{
    function __construct(){
        parent::__construct();

        $this->load->database();
    }

    public function get_all(){
        return $this->db->get('color')->result_array();
    }
}