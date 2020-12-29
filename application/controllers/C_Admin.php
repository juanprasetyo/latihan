<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        // Load Model
		$this->load->model('M_Latihan');
        $this->load->model('M_Login');
        
        // Load Library
        $this->load->library('session');
        $this->load->library('form_validation');

		is_logged_in();
		if ($this->session->userdata('role_id') !== '2') {
			show_404();
		}
    }
    public function index()
    {
        $data = [
            'account' => $this->M_Login->get_data_byData('email', $this->session->userdata('email'))->row_array(),
            'title' => 'Dashboard',
			'users' => $this->M_Latihan->get_all_data()
        ];
            
        $this->load->view('layouts/V_Header', $data);
        $this->load->view('layouts/V_Sidebar', $data);
        $this->load->view('pages/Admin/V_Dashboard', $data);
        $this->load->view('layouts/V_Footer', $data);
	}
	public function get_user()
	{
		$data_user = $this->M_Latihan->make_datatables();
		
		$data = [];
		foreach ($data_user as $key => $value) {
			// print_r($key);
			$no = $key + 1;
			$sub_array = [];
			$sub_array[] = '<center>'. $no .'</center>';
			$sub_array[] = $value['name'];
			$sub_array[] = $value['email'];
			$sub_array[] = $value['address'];
			$sub_array[] = '<center>
				<button class="btn btn-danger btn-del-data" data-id="' . $value["id"] .'"><i class="fa fa-trash"></i></button>
				<a href="' . base_url("edit/") . $value["id"] . '" class="btn btn-success btn-edit-data"><i class="fa fa-edit"></i></a>
			</center>';

			$data[] = $sub_array;
		}
		// echo "<pre>";
		// print_r($data);
		// die;

		$output = [
			"draw"				=> intval($_POST["draw"]),
			"recordsTotal"		=> $this->M_Latihan->get_all_data(),
			"recordsFiltered"	=> $this->M_Latihan->get_filtered_data(),
			"data"				=> $data
		];
		echo json_encode($output);
	}
	public function tambah_user()
	{
		$data = [
			'account' 	=> $this->M_Login->get_data_byData('email', $this->session->userdata('email'))->row_array(),
			'title' 	=> 'Tambah User'
		];

		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Nama harus diisi',
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', [
			'required' => 'Email harus diisi',
			'valid_email' => 'Masukkan email yang benar',
			'is_unique' => 'Email yang dimasukkan telah terdaftar',
		]);
		$this->form_validation->set_rules('address', 'Address', 'required', [
			'required' => 'Alamat harus diisi',
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/V_Header', $data);
			$this->load->view('layouts/V_Sidebar', $data);
			$this->load->view('pages/V_Tambah', $data);
			$this->load->view('layouts/V_Footer', $data);
		} else {
			$data = [
				'id' => '',
				'name' => htmlspecialchars($this->input->post('name')),
				'email' => htmlspecialchars($this->input->post('email')),
				'address' => htmlspecialchars($this->input->post('address')),
				// 'create_at' => Date('Y-m-d'),
			];

			$this->M_Latihan->save_new_user($data);
			redirect(base_url());
		}
	}

	public function save()
	{
		// Ambil data dari input di V_Tambah
		$data = [
			'id' => '',
			'name' => htmlspecialchars($this->input->post('name')),
			'email' => htmlspecialchars($this->input->post('email')),
			'address' => htmlspecialchars($this->input->post('address')),
		];

		$this->M_Latihan->save_new_user($data);
		redirect(base_url());
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$this->M_Latihan->delete_data($id);
	}

	public function view_edit($id)
	{
		$data = [
			'account' => $this->M_Login->get_data_byData('email', $this->session->userdata('email'))->row_array(),
			'title' => 'View Edit',
			'user' => $this->M_Latihan->get_user_by_id($id)
		];

		$this->load->view('layouts/V_Header', $data);
		$this->load->view('layouts/V_Sidebar', $data);
		$this->load->view('pages/V_Edit', $data);
		$this->load->view('layouts/V_Footer', $data);
	}

	public function save_edit()
	{
		$id = $this->input->post('id');
		$data = [
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
		];

		$this->M_Latihan->update_edit_data($id, $data);
	}
}