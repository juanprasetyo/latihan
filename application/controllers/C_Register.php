<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_Login');
	}
	public function index()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[account.email]',
			[
				'is_unique' => 'Your email has been registered!'
			]
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|min_length[4]',
			[
				'min_length' => 'Password is to short!'
			]
		);
		$this->form_validation->set_rules(
			'password2',
			'Password2',
			'matches[password]',
			[
				'matches' => "Password doesn't match!"
			]
		);

		if ($this->form_validation->run() == false) {
			$this->load->view('pages/V_Register');
		} else {
			$data = [
				'id' => '',
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => password_hash(
					$this->input->post('password'),
					PASSWORD_DEFAULT
				),
				'role_id' => 1,
				'image' => 'default.png',
				'date_created' => strtotime("now")
			];
			$this->M_Login->save_account($data);
			$this->session->set_flashdata('msg', 'Account berhasil dibuat!');
			$this->session->set_flashdata('color', 'success');
			redirect(base_url('login'));
		}
	}
}