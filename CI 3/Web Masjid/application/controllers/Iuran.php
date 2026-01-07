<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iuran extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_kematian');
		$this->load->model('m_iuran');
	}

	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {
			$data['anggota'] = $this->m_user->read_all_anggota()->result_array();
			$data['anggota_iuran'] = $this->m_user->read_all_anggota_iuran()->result_array();
			$this->load->view('admin/iuran', $data);
		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}
	
	public function tambah_data_admin()
	{
		$id_user = $this->input->post('id_user');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$tanggal_iuran = $this->input->post('tanggal_iuran');
		$jumlah_iuran = $this->input->post('jumlah_iuran');

		// echo var_dump($id_user);
		// echo var_dump($bulan);
		// echo var_dump($tahun);
		// echo var_dump($tanggal_iuran);
		// echo var_dump($jumlah_iuran);
		// die();

		$hasil = $this->m_iuran->insert_iuran($bulan, $tahun, $tanggal_iuran, $jumlah_iuran, $id_user);

        if($hasil==false){
                $this->session->set_flashdata('eror_input','eror_input');
                redirect('Iuran/view_admin');
        }else{
          		$this->session->set_flashdata('input','input');
         		 redirect('Iuran/view_admin');
        }

	}

	public function ubah_data_admin()
	{
		$id_iuran = $this->input->post('id_iuran');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$tanggal_iuran = $this->input->post('tanggal_iuran');
		$jumlah_iuran = $this->input->post('jumlah_iuran');

		// echo var_dump($id_user);
		// echo var_dump($bulan);
		// echo var_dump($tahun);
		// echo var_dump($tanggal_iuran);
		// echo var_dump($jumlah_iuran);
		// die();

		$hasil = $this->m_iuran->update_iuran($bulan, $tahun, $tanggal_iuran, $jumlah_iuran, $id_iuran);

        if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Iuran/view_admin');
        }else{
          		$this->session->set_flashdata('edit','edit');
         		 redirect('Iuran/view_admin');
        }

	}

	public function hapus_data_admin()
	{
		$id_iuran = $this->input->post('id_iuran');

		// echo var_dump($id_user);
		// echo var_dump($bulan);
		// echo var_dump($tahun);
		// echo var_dump($tanggal_iuran);
		// echo var_dump($jumlah_iuran);
		// die();

		$hasil = $this->m_iuran->delete_iuran($id_iuran);

        if($hasil==false){
                $this->session->set_flashdata('eror_delete','eror_delete');
                redirect('Iuran/view_admin');
        }else{
          		$this->session->set_flashdata('delete','delete');
         		 redirect('Iuran/view_admin');
        }
	}
    
    public function view_bendahara()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 2) {
			$data['anggota'] = $this->m_user->read_all_anggota()->result_array();
			$data['anggota_iuran'] = $this->m_user->read_all_anggota_iuran()->result_array();
			$this->load->view('bendahara/iuran', $data);
		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}
	
	public function tambah_data_bendahara()
	{
		$id_user = $this->input->post('id_user');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$tanggal_iuran = $this->input->post('tanggal_iuran');
		$jumlah_iuran = $this->input->post('jumlah_iuran');

		// echo var_dump($id_user);
		// echo var_dump($bulan);
		// echo var_dump($tahun);
		// echo var_dump($tanggal_iuran);
		// echo var_dump($jumlah_iuran);
		// die();

		$hasil = $this->m_iuran->insert_iuran($bulan, $tahun, $tanggal_iuran, $jumlah_iuran, $id_user);

        if($hasil==false){
                $this->session->set_flashdata('eror_input','eror_input');
                redirect('Iuran/view_bendahara');
        }else{
          		$this->session->set_flashdata('input','input');
         		 redirect('Iuran/view_bendahara');
        }

	}

	public function ubah_data_bendahara()
	{
		$id_iuran = $this->input->post('id_iuran');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$tanggal_iuran = $this->input->post('tanggal_iuran');
		$jumlah_iuran = $this->input->post('jumlah_iuran');

		// echo var_dump($id_user);
		// echo var_dump($bulan);
		// echo var_dump($tahun);
		// echo var_dump($tanggal_iuran);
		// echo var_dump($jumlah_iuran);
		// die();

		$hasil = $this->m_iuran->update_iuran($bulan, $tahun, $tanggal_iuran, $jumlah_iuran, $id_iuran);

        if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Iuran/view_bendahara');
        }else{
          		$this->session->set_flashdata('edit','edit');
         		 redirect('Iuran/view_bendahara');
        }

	}

	public function hapus_data_bendahara()
	{
		$id_iuran = $this->input->post('id_iuran');

		// echo var_dump($id_user);
		// echo var_dump($bulan);
		// echo var_dump($tahun);
		// echo var_dump($tanggal_iuran);
		// echo var_dump($jumlah_iuran);
		// die();

		$hasil = $this->m_iuran->delete_iuran($id_iuran);

        if($hasil==false){
                $this->session->set_flashdata('eror_delete','eror_delete');
                redirect('Iuran/view_bendahara');
        }else{
          		$this->session->set_flashdata('delete','delete');
         		 redirect('Iuran/view_bendahara');
        }
	}
    
    public function view_anggota()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {
			$data['anggota'] = $this->m_user->read_all_anggota_by_id_user($this->session->userdata('id_user'))->row_array();
			$data['anggota_iuran'] = $this->m_user->read_all_anggota_iuran()->result_array();
			$this->load->view('anggota/iuran', $data);

				
		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}
	
}