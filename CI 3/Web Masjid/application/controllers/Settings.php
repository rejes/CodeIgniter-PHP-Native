<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

    public function view_admin()
    {

        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

            $this->load->view('admin/settings');

        }else{

            $this->session->set_flashdata('loggin_err','loggin_err');
            redirect('Login/index');

        }

    }

    public function view_bendahara()
    {
        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {
            $this->load->view('bendahara/settings');
        }else{

            $this->session->set_flashdata('loggin_err','loggin_err');
            redirect('Login/index');

        }
    }

    public function view_anggota()
    {

        if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {
            $data['anggota'] = $this->m_user->read_all_anggota_by_id_user($this->session->userdata('id_user'))->row_array();
            $this->load->view('anggota/settings', $data);

        }else{

            $this->session->set_flashdata('loggin_err','loggin_err');
            redirect('Login/index');

        }
    
    }

    public function settings_account_admin()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$re_password = $this->input->post("re_password");

		// echo var_dump($id);
		// echo var_dump($username);
		// echo var_dump($password);
		// echo var_dump($re_password);
		// die();

		if($password == $re_password)
        {
            $hasil = $this->m_user->update_user_settings($id, $username, $password);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Settings/view_admin');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Settings/view_admin');
			}
			
        }else{
            $this->session->set_flashdata('password_err','password_err');
			redirect('Settings/view_admin');
        }
	}


    public function settings_account_anggota()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$re_password = $this->input->post("re_password");

		// echo var_dump($id);
		// echo var_dump($username);
		// echo var_dump($password);
		// echo var_dump($re_password);
		// die();

		if($password == $re_password)
        {
            $hasil = $this->m_user->update_user_settings($id, $username, $password);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Settings/view_anggota');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Settings/view_anggota');
			}
			
        }else{
            $this->session->set_flashdata('password_err','password_err');
			redirect('Settings/view_anggota');
        }
	}

    public function settings_account_bendahara()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$re_password = $this->input->post("re_password");

		// echo var_dump($id);
		// echo var_dump($username);
		// echo var_dump($password);
		// echo var_dump($re_password);
		// die();

		if($password == $re_password)
        {
            $hasil = $this->m_user->update_user_settings($id, $username, $password);

            if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Settings/view_bendahara');
			}else{
				$this->session->set_flashdata('edit','edit');
				redirect('Settings/view_bendahara');
			}
			
        }else{
            $this->session->set_flashdata('password_err','password_err');
			redirect('Settings/view_bendahara');
        }
	}
}