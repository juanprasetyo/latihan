<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Account extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function save_edit_account($id, $name, $image)
    {  
        $query = "UPDATE account SET name='$name', image='$image' WHERE id='$id'";
        print_r($name);
        $this->db->query($query);
    }
}