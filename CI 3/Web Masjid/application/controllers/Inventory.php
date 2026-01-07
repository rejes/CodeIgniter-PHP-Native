<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_inventory');
		$this->load->model('m_user');
	}

	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

			$data['inventory'] = $this->m_inventory->read_all_inventory()->result_array();

			$this->load->view('admin/inventory', $data);

		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}

	}
	
	public function tambah_inventory()
	{
		$nama_inventory= $this->input->post('nama_inventory');
		$merk= $this->input->post('merk');
		$satuan= $this->input->post('satuan');
		$jumlah= $this->input->post('jumlah');
		$kondisi_barang= $this->input->post('kondisi_barang');
		$tanggal_masuk= $this->input->post('tanggal_masuk');

		// echo var_dump($nama_inventory);
		// echo var_dump($merk);
		// echo var_dump($satuan);
		// echo var_dump($jumlah);
		// echo var_dump($kondisi_barang);
		// echo var_dump($tanggal_masuk);
		// die();
		$hasil = $this->m_inventory->insert_inventory($nama_inventory, $merk, $satuan, $jumlah, $kondisi_barang, $tanggal_masuk);

        if($hasil==false){
                $this->session->set_flashdata('eror_input','eror_input');
                redirect('Inventory/view_admin');
        }else{
          		$this->session->set_flashdata('input','input');
         		 redirect('Inventory/view_admin');
        }

	}

	public function ubah_inventory()
	{
		$id_inventory= $this->input->post('id_inventory');
		$nama_inventory= $this->input->post('nama_inventory');
		$merk= $this->input->post('merk');
		$satuan= $this->input->post('satuan');
		$jumlah= $this->input->post('jumlah');
		$kondisi_barang= $this->input->post('kondisi_barang');
		$tanggal_masuk= $this->input->post('tanggal_masuk');

		// echo var_dump($id_inventory);
		// echo var_dump($nama_inventory);
		// echo var_dump($merk);
		// echo var_dump($satuan);
		// echo var_dump($jumlah);
		// echo var_dump($kondisi_barang);
		// echo var_dump($tanggal_masuk);
		// die();

		$hasil = $this->m_inventory->update_inventory($nama_inventory, $merk, $satuan, $jumlah, $kondisi_barang, $tanggal_masuk, $id_inventory);

        if($hasil==false){
                $this->session->set_flashdata('eror_edit','eror_edit');
                redirect('Inventory/view_admin');
        }else{
          		$this->session->set_flashdata('edit','edit');
         		 redirect('Inventory/view_admin');
        }
	}

	public function hapus_inventory()
	{
		$id_inventory = $this->input->post('id_inventory');

		
		$hasil = $this->m_inventory->delete_inventory($id_inventory);

        if($hasil==false){
                $this->session->set_flashdata('eror_delete','eror_delete');
                redirect('Inventory/view_admin');
        }else{
          		$this->session->set_flashdata('delete','delete');
         		 redirect('Inventory/view_admin');
        }
	}

    public function view_anggota()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {
			$data['anggota'] = $this->m_user->read_all_anggota_by_id_user($this->session->userdata('id_user'))->row_array();
			$data['inventory'] = $this->m_inventory->read_all_inventory()->result_array();

			$this->load->view('anggota/inventory', $data);
			
		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
    }
	
}