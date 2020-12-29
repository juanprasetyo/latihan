<?php
Defined('BASEPATH') or exit('No Direct Script Access Allowed');

class M_Login extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_data_byData($column, $data)
	{
		return $this->db->get_where('account', [$column => $data]);
	}

	public function save_account($data)
	{
		$this->db->insert('account', $data);
	}
}