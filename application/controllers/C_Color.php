<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Color extends CI_Controller
{
    function __construct(){
        parent::__construct();

        $this->load->model('M_Login');
        $this->load->model('M_color');

        $this->load->library('session');
        is_logged_in();
    }

    public function index(){
        $data = [
			'account' => $this->M_Login->get_data_byData('email', $this->session->userdata('email'))->row_array(),
			'title' => 'Example Color'
		];

        $this->load->view('layouts/V_Header', $data);
        $this->load->view('layouts/V_Sidebar', $data);
        $this->load->view('pages/V_Color', $data);
        $this->load->view('layouts/V_Footer', $data);
    }

    public function get_color(){
        $data = $this->M_color->get_all();
        echo json_encode($data);
    }
}