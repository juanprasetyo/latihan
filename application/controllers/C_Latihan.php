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


	//  Mirroring data admin-buyer
	public function mirroring_data(){
		$id_user = $this->M_Login->get_data_byData('email', $this->session->userdata('email'))->row_array()['user_id'];
		print_r($id_user);

		$isAdmin = $this->M_Latihan->get_admin_byId($id_user);
		$isKoor	 = $this->M_Latihan->get_koor_byId($id_user);

		if(count($isAdmin) > 0){
			$data = $isAdmin['id_buyer'];
			echo "Admin";
		} else if (count($isKoor) > 0){
			$data = $isKoor['id_buyer'];
			echo "Koordinator";
		} else {
			$data = "User ini hanyalah buyer";
		}

		echo "<pre>";
		print_r($data);
		die;
	}

	public function edit_user_mirroring(){
		$data = [
            'title'		=> 'Edit Mirroring',
            'account' 	=> $this->M_Login->get_data_byData('email', $this->session->userdata('email'))->row_array(),
        ];

		$this->load->view('layouts/V_Header'		,$data);
		$this->load->view('layouts/V_Sidebar'		,$data);
		$this->load->view('pages/V_EditMirroring'	,$data);
		$this->load->view('layouts/V_Footer'		,$data);
	}

	public function get_user_admin(){
		$data = $this->M_Latihan->get_all_admin()->result();
		
		echo json_encode($data);
	}
	
	public function get_user_koor(){
		$data  = $this->M_Latihan->get_all_koor()->result();

		echo json_encode($data);
	}

	public function add_user_admin(){
		$data = [
			'id'	   => '',
			'id_admin' => $this->input->post('adminId'),
			'id_buyer' => $this->input->post('buyerId'),
		];

		// echo "<pre>";
		// print_r($data);
		// die;

		$affected = $this->M_Latihan->save_user_mirroring('admin_buyer', $data);
		
		if ($affected > 0) {
			echo json_encode('success');
		} else {
			echo json_encode('failed');
		}
	}

	public function edit_user_admin(){
		$id	  = $this->input->post('id');
		$data = [
			'id_admin'	=> $this->input->post('adminId'),
			'id_buyer'	=> $this->input->post('buyerId')
		];
		
		$affected = $this->M_Latihan->update_user_mirroring('admin_buyer', $data, $id);

		if($affected > 0){
			echo json_encode('success');
		} else {
			echo json_encode('failed');
		}
	}

	public function add_user_koor(){
		$data = [
			'id' 		=> '',
			'id_koor'	=> $this->input->post('koorId'),
			'id_buyer'	=> $this->input->post('buyerId')
		];

		$affected = $this->M_Latihan->save_user_mirroring('koor_buyer', $data);

		if($affected > 0){
			echo json_encode('success');
		} else {
			echo json_encode('failed');
		}
	}

	public function edit_user_koor(){
		$id = $this->input->post('id');
		$data = [
			'id_koor'	=> $this->input->post('koorId'),
			'id_buyer'	=> $this->input->post('buyerId')
		];

		$affected = $this->M_Latihan->update_user_mirroring('koor_buyer', $data, $id);

		if($affected > 0){
			echo json_encode('success');
		} else {
			echo json_encode('failed');
		}
	}

	public function delete_user_admin(){
		$id = $this->input->post('id');
		$affected = $this->M_Latihan->delete_user_admin($id);

		if($affected > 0) {
			echo json_encode('success');
		} else {
			echo json_encode('failed');
		}
	}

	public function delete_user_koor(){
		$id = $this->input->post('id');
		$affected = $this->M_Latihan->delete_user_koor($id);

		if($affected > 0){
			echo json_encode('success');
		} else {
			echo json_encode('failed');
		}
	}
}