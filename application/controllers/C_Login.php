<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Login extends CI_Controller
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
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email'
		);
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('pages/V_Login');
		} else {
			$email = $this->input->post('email');
			if (
				$this->M_Login->get_data_byData('email', $email)->num_rows() > 0
			) {
				echo "email benar";
				$pass = $this->input->post('password');
				$data = $this->M_Login
					->get_data_byData('email', $email)
					->row_array();
				if (password_verify($pass, $data['password'])) {
					$this->session->set_userdata('status', 'login');
					$this->session->set_userdata('email', $email);
					$this->session->set_userdata('role_id', $data['role_id']);
					if ($data['role_id'] == 1) {
						redirect(base_url('user'));
					} else {
						redirect(base_url('admin'));
					}
				} else {
					$this->session->set_flashdata(
						'error',
						'Password anda salah!'
					);
					redirect(base_url('login'));
				}
			} else {
				$this->session->set_flashdata('error', 'Email anda salah!');
				redirect(base_url('login'));
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'Anda telah Logout');
		redirect(base_url('login'));
	}

	public function forgot_password()
	{
		$this->load->library('phpmail');

		$mail = $this->phpmail->load();

		$email = "";
		$emailTo = "";
		// SMTP Configuration
		$mail->isSMTP();
		$mail->Host 	= 'ssl://smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = $email;
		$mail->Password = '****';
		$mail->SMTPSecure = 'ssl';
		$mail->Port 	= 465;

		$mail->setFrom($email, 'Click Bait.com');
		$mail->addReplyTo($email);

		$mail->addAddress($emailTo);
		$mail->isHTML(true);

		$bodyMessage = "<h1>Halo Pak</h1>";
		$mail->Body = $bodyMessage;

		if(! $mail->send()){
			echo "Mailer error " . $mail->ErrorInfo;
		} else {
			echo "Email has been sent";
		}
	}
}