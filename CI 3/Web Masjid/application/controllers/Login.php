<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('m_user');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function proses_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->m_user->cek_login($username);

		if($user->num_rows()>0){
			$user = $user->row_array();

			if($user['password'] == $password){

				if($user['id_user_level'] == 1){

					$this->session->set_userdata('logged_in', true);
					$this->session->set_userdata('id_user', $user['id_user']);
					$this->session->set_userdata('username', $user['username']);
					$this->session->set_userdata('id_user_level', $user['id_user_level']);
					
					$this->session->set_flashdata('success_login','success_login');
					redirect('Dashboard/view_admin');
	
				}else if($user['id_user_level'] == 2){
	
					$this->session->set_userdata('logged_in', true);
					$this->session->set_userdata('id_user', $user['id_user']);
					$this->session->set_userdata('username', $user['username']);
					$this->session->set_userdata('id_user_level', $user['id_user_level']);
	
					$this->session->set_flashdata('success_login','success_login');
					redirect('Dashboard/view_bendahara');
	
				}else if($user['id_user_level'] == 3){
	
					$this->session->set_userdata('logged_in', true);
					$this->session->set_userdata('id_user', $user['id_user']);
					$this->session->set_userdata('username', $user['username']);
					$this->session->set_userdata('id_user_level', $user['id_user_level']);
	
					$this->session->set_flashdata('success_login','success_login');
					redirect('Dashboard/view_anggota');
	
				}else{
					$this->session->set_flashdata('loggin_err_no_access','loggin_err_no_access');
					redirect('Login/index');
				}

			}else{

			$this->session->set_flashdata('loggin_err_pass','loggin_err_pass');
			redirect('Login/index');

			}
		}else{
			$this->session->set_flashdata('loggin_err_no_user','loggin_err_no_user');
			redirect('Login/index');
		}


	}

	public function log_out()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id_user');
        $this->session->set_flashdata('success_log_out','success_log_out');
            redirect('Login/index');
	}
	
}