<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kas');
		$this->load->model('m_user');
	}

	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {
			$data['kas'] = $this->m_kas->read_all_kas()->result_array();
			$data['kas_kredit'] = $this->m_kas->sum_all_kas_kredit()->row_array();
			$data['kas_debit'] = $this->m_kas->sum_all_kas_debit()->row_array();
			
			$this->load->view('admin/kas', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}
	
	public function tambah_data_admin()
	{

		$jenis_kas = $this->input->post('jenis_kas');
		$nominal = $this->input->post('nominal');
		$keterangan_kas = $this->input->post('keterangan_kas');

		$hasil = $this->m_kas->insert_kas($jenis_kas, $nominal, $keterangan_kas);

        if($hasil==false){
                $this->session->set_flashdata('eror_input','eror_input');
                redirect('Kas/view_admin');
        }else{
          		$this->session->set_flashdata('input','input');
         		 redirect('Kas/view_admin');
        }


	}

	public function ubah_data_admin()
	{
		$id_kas = $this->input->post('id_kas');
		$jenis_kas = $this->input->post('jenis_kas');
		$nominal = $this->input->post('nominal');
		$keterangan_kas = $this->input->post('keterangan_kas');

		$hasil = $this->m_kas->update_kas($jenis_kas, $nominal, $keterangan_kas, $id_kas);

        if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Kas/view_admin');
        }else{
          		$this->session->set_flashdata('edit','edit');
         		 redirect('Kas/view_admin');
        }


	}

	public function hapus_data_admin()
	{
		$id_kas = $this->input->post('id_kas');

		$hasil = $this->m_kas->delete_kas($id_kas);

        if($hasil==false){
                $this->session->set_flashdata('eror_delete','eror_delete');
                redirect('Kas/view_admin');
        }else{
          		$this->session->set_flashdata('delete','delete');
         		 redirect('Kas/view_admin');
        }


	}
    
    public function view_bendahara()
	{

		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {
			
			$data['kas'] = $this->m_kas->read_all_kas()->result_array();
			$data['kas_kredit'] = $this->m_kas->sum_all_kas_kredit()->row_array();
			$data['kas_debit'] = $this->m_kas->sum_all_kas_debit()->row_array();
			$this->load->view('bendahara/kas', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}
	
	public function tambah_data_bendahara()
	{

		$jenis_kas = $this->input->post('jenis_kas');
		$nominal = $this->input->post('nominal');
		$keterangan_kas = $this->input->post('keterangan_kas');

		$hasil = $this->m_kas->insert_kas($jenis_kas, $nominal, $keterangan_kas);

        if($hasil==false){
                $this->session->set_flashdata('eror_input','eror_input');
                redirect('Kas/view_bendahara');
        }else{
          		$this->session->set_flashdata('input','input');
         		 redirect('Kas/view_bendahara');
        }


	}

	public function ubah_data_bendahara()
	{
		$id_kas = $this->input->post('id_kas');
		$jenis_kas = $this->input->post('jenis_kas');
		$nominal = $this->input->post('nominal');
		$keterangan_kas = $this->input->post('keterangan_kas');

		$hasil = $this->m_kas->update_kas($jenis_kas, $nominal, $keterangan_kas, $id_kas);

        if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Kas/view_bendahara');
        }else{
          		$this->session->set_flashdata('edit','edit');
         		 redirect('Kas/view_bendahara');
        }


	}

	public function hapus_data_bendahara()
	{
		$id_kas = $this->input->post('id_kas');

		$hasil = $this->m_kas->delete_kas($id_kas);

        if($hasil==false){
                $this->session->set_flashdata('eror_delete','eror_delete');
                redirect('Kas/view_bendahara');
        }else{
          		$this->session->set_flashdata('delete','delete');
         		 redirect('Kas/view_bendahara');
        }


	}
    
    public function view_anggota()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {
			$data['anggota'] = $this->m_user->read_all_anggota_by_id_user($this->session->userdata('id_user'))->row_array();
			$data['kas'] = $this->m_kas->read_all_kas()->result_array();
			$data['kas_kredit'] = $this->m_kas->sum_all_kas_kredit()->row_array();
			$data['kas_debit'] = $this->m_kas->sum_all_kas_debit()->row_array();
			$this->load->view('anggota/kas', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}
	
}