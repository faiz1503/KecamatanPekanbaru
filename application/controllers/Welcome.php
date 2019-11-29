<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if ($this->session->userdata('status')) {
			redirect(site_url('kecamatan'));
		}
			$this->load->view('login');
	}
	public function cek_login()
	{
		$username_user = $this->input->post('username_user');
		$password_user = md5($this->input->post('password_user'));
		$this->load->model('User_Model');
		$cek = $this->User_Model->cek_login($username_user, $password_user);
		if(empty($cek)){
			$this->session->set_flashdata('error', 'Username atau Password Salah...');
			redirect(base_url());
		}else{
			$this->session->set_userdata('status', 'login');
			$this->session->set_userdata('nama_user', $cek->nama_user);
			redirect(site_url('/Kecamatan'));

		}
	}
	public function logout()
	{
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('nama_user');
		redirect(base_url());
	}
	
}
