<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Latihan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Load Model
		$this->load->model('M_Latihan');
		$this->load->model('M_Login');
		$this->load->model('M_Account');

		// Load Library
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('M_pdf');

		//Load Helper
		$this->load->helper('form');
		
		is_logged_in();
	}

	public function view_profile()
	{
		$data = [
			'account' => $this->M_Login->get_data_byData('email', $this->session->userdata('email'))->row_array(),
			'title' => 'View Profile'
		];

		$this->load->view('layouts/V_Header', $data);
		$this->load->view('layouts/V_Sidebar', $data);
		$this->load->view('pages/V_Profile', $data);
		$this->load->view('layouts/V_Footer');
	}

	public function edit_profile()
	{
		$data = [
			'account' => $this->M_Login->get_data_byData('email', $this->session->userdata('email'))->row_array(),
			'title' => 'Edit Profile'
		];

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email');
		
		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/V_Header', $data);
			$this->load->view('layouts/V_Sidebar', $data);
			$this->load->view('pages/V_EditProfile', $data);
			$this->load->view('layouts/V_Footer');
		} else {
			$id = $this->input->post('id');
			$name = $this->input->post('name');
			$email = $data['account']['email'];
			
			if($_FILES['profile-image']['name'] == NULL) {
				$image = $this->input->post('old-image');
				print_r($image);
				$this->M_Account->save_edit_account($id, $name, $image);
				redirect(base_url('editProfile'));
			} else {
				$image = $_FILES['profile-image']['name'];
				$ext = strtolower(end((explode(".", $image))));
			
				if (!($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png')) {
					$this->output
							->set_status_header(400)
							->set_content_type('application/json')
							->set_output(json_encode("File yang anda masukkan salah"));
				} else {
					$config['upload_path']          = './assets/upload/profile/' . $email;
					$config['allowed_types']        = 'jpeg|jpg|png';
					$config['max_size']             = 2048;
					$config['overwrite']            = TRUE;
					$config['file_name']			= $id;
				
					$this->load->library('upload', $config);
				
					$dir_exist = true;
					if(!is_dir("assets/upload/profile/". $email)){
						mkdir('./assets/upload/profile/' . $email, 0777, true);
						$dir_exist = false;
					}
					if (!$this->upload->do_upload('profile-image'))
					{
						if(!$dir_exist){
							rmdir('./assets/upload/profile/' . $email, 0777, true);
						}
						$error = array('error' => $this->upload->display_errors());
						redirect(base_url('editProfile'));
						print_r($error);
					}
					else
					{
						$file = array('upload_data' => $this->upload->data());
						$image = $file['upload_data']['orig_name'];
						print_r($file['upload_data']['orig_name']);
						$this->M_Account->save_edit_account($id, $name, $email.'/'.$image);
						redirect(base_url('editProfile'));
					}
					$this->output
								->set_status_header(200)
								->set_content_type('application/json')
								->set_output(json_encode("File yang anda masukkan benar"));
				}
			}
		}
	}

	public function cetakSurat()
	{
		$pdf = $this->m_pdf->load();
		$pdf = new mPDF('utf-8','f4', 0, '', 3, 13, 0, 5, 0, 0);
		$html = $this->load->view('DataBarang/V_SuratBarang', [], true);
		$pdf->WriteHTML($html); 

		$pdf->Output("nana.pdf", "I");
	}
}