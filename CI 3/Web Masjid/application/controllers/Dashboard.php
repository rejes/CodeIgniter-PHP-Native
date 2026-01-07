<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_berita');
		$this->load->model('m_inventory');
		$this->load->model('m_user');
		$this->load->model('m_kas');
		$this->load->model('m_iuran');
		$this->load->model('m_kematian');
	}

	public function view_admin()
	{

		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

			$data['total_berita'] = $this->m_berita->count_all_berita()->row_array();
			$data['total_inventory'] = $this->m_inventory->count_all_inventory()->row_array();
			$data['total_pengurus'] = $this->m_user->count_all_pengurus()->row_array();
			$data['total_anggota'] = $this->m_user->count_all_anggota()->row_array();
			$data['total_anggota_kematian']  =  $this->m_kematian->count_anggota_kematian()->row_array();
			$data['kas'] = $this->m_kas->read_all_kas()->result_array();
			$data['iuran'] = $this->m_iuran->sum_all_iuran()->row_array();
			$data['kas_kredit'] = $this->m_kas->sum_all_kas_kredit()->row_array();
			$data['kas_debit'] = $this->m_kas->sum_all_kas_debit()->row_array();
			
			$this->load->view('admin/dashboard.php', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}

    }
    
	public function view_bendahara()
	
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {

			$data['total_berita'] = $this->m_berita->count_all_berita()->row_array();
			$data['total_inventory'] = $this->m_inventory->count_all_inventory()->row_array();
			$data['total_pengurus'] = $this->m_user->count_all_pengurus()->row_array();
			$data['total_anggota'] = $this->m_user->count_all_anggota()->row_array();
			$data['total_anggota_kematian']  =  $this->m_kematian->count_anggota_kematian()->row_array();
			$data['kas'] = $this->m_kas->read_all_kas()->result_array();
			$data['iuran'] = $this->m_iuran->sum_all_iuran()->row_array();
			$data['kas_kredit'] = $this->m_kas->sum_all_kas_kredit()->row_array();
			$data['kas_debit'] = $this->m_kas->sum_all_kas_debit()->row_array();
			$this->load->view('bendahara/dashboard.php', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
    }
    
    public function view_anggota()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {
			
			$data['anggota'] = $this->m_user->read_all_anggota_by_id_user($this->session->userdata('id_user'))->row_array();
			$data['total_berita'] = $this->m_berita->count_all_berita()->row_array();
			$data['total_inventory'] = $this->m_inventory->count_all_inventory()->row_array();
			$data['total_pengurus'] = $this->m_user->count_all_pengurus()->row_array();
			$data['total_anggota'] = $this->m_user->count_all_anggota()->row_array();
			$data['total_anggota_kematian']  =  $this->m_kematian->count_anggota_kematian()->row_array();
			$data['kas'] = $this->m_kas->read_all_kas()->result_array();
			$data['iuran'] = $this->m_iuran->sum_all_iuran()->row_array();
			$data['kas_kredit'] = $this->m_kas->sum_all_kas_kredit()->row_array();
			$data['kas_debit'] = $this->m_kas->sum_all_kas_debit()->row_array();
			$this->load->view('anggota/dashboard.php', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}
	
}