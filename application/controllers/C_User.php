<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_User extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();

		// Load Model
		$this->load->model('M_Login');

		// Load Library
		$this->load->library('session');
		$this->load->library('form_validation');

		//Load Helper
		$this->load->helper('form');
		
		is_logged_in();
		if ($this->session->userdata('role_id') !== '1') {
			show_404();
		}
	}
	public function index()
	{
		$data = [
			'account' => $this->M_Login->get_data_byData('email', $this->session->userdata('email'))->row_array(),
			'title' => 'Dashboard'
		];

		$this->load->view('layouts/V_Header', $data);
		$this->load->view('layouts/V_Sidebar', $data);
		$this->load->view('pages/V_Dashboard', $data);
		$this->load->view('layouts/V_Footer');
	}
}