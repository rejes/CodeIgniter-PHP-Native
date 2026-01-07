<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kematian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_kematian');
	}

	public function view_admin()
	{

		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {
			
			$data['anggota_not_kematian'] = $this->m_user->read_all_anggota_not_kematian()->result_array();
			$data['anggota_kematian'] = $this->m_user->read_all_anggota_kematian()->result_array();
			
			// echo var_dump($data);
			// die();
			$this->load->view('admin/kematian', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}

	} 
	
	public function tambah_data_admin()
	{
		$id_user = $this->input->post('id_user');
		$tanggal_kematian = $this->input->post('tanggal_kematian');
		$jam_kematian = $this->input->post('jam_kematian');
		$usia = $this->input->post('usia');



		// echo var_dump($id_user);
		// echo var_dump($tanggal_kematian);
		// die();

		$hasil = $this->m_kematian->insert_kematian($tanggal_kematian, $jam_kematian, $usia, $id_user);

        if($hasil==false){
                $this->session->set_flashdata('eror_input','eror_input');
                redirect('Kematian/view_admin');
        }else{
          		$this->session->set_flashdata('input','input');
         		 redirect('Kematian/view_admin');
        }
	}

	public function ubah_data_admin()
	{
		$id_kematian = $this->input->post('id_kematian');
		$tanggal_kematian = $this->input->post('tanggal_kematian');
		$jam_kematian = $this->input->post('jam_kematian');
		$usia = $this->input->post('usia');

		$hasil = $this->m_kematian->update_kematian($tanggal_kematian, $jam_kematian, $usia, $id_kematian);

        if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Kematian/view_admin');
        }else{
          		$this->session->set_flashdata('edit','edit');
         		 redirect('Kematian/view_admin');
        }
	}

	public function hapus_data_admin()
	{
		$id_kematian = $this->input->post('id_kematian');

		$hasil = $this->m_kematian->delete_kematian($id_kematian);

        if($hasil==false){
                $this->session->set_flashdata('eror_delete','eror_delete');
                redirect('Kematian/view_admin');
        }else{
          		$this->session->set_flashdata('delete','delete');
         		 redirect('Kematian/view_admin');
        }

	}

	public function view_anggota()
	{

		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {
			
			$data['anggota'] = $this->m_user->read_all_anggota_by_id_user($this->session->userdata('id_user'))->row_array();
			$data['anggota_not_kematian'] = $this->m_user->read_all_anggota_not_kematian()->result_array();
			$data['anggota_kematian'] = $this->m_user->read_all_anggota_kematian()->result_array();
			
			// echo var_dump($data);
			// die();
			$this->load->view('anggota/kematian', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}

	} 
	
}