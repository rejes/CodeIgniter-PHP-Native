<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_berita');
		$this->load->model('m_user');
	}

	public function view_admin()
	{
		$data['berita'] = $this->m_berita->read_all_berita()->result_array();
		$this->load->view('admin/berita', $data);
    }
	
	public function tambah_data_admin()
	{
		$judul_berita = $this->input->post('judul_berita');
		$isi_berita = $this->input->post('isi_berita');
		$num = rand(1, 9999);
		$foto_name = md5($judul_berita.$isi_berita.$num);

		
		$path = './assets/gambar/';

		$this->load->library('upload');
		$config['upload_path'] = './assets/gambar';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '2048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $foto_name;
		$this->upload->initialize($config);
		$gambar_berita_upload = $this->upload->do_upload('gambar_berita');
		
		if($gambar_berita_upload){
			$gambar_berita = $this->upload->data();
		}else{
			
			$this->session->set_flashdata('error_file_gambar_berita','error_file_gambar_berita');
			redirect('Berita/view_admin');
		}

		$hasil = $this->m_berita->insert_berita($judul_berita, $isi_berita, $gambar_berita['file_name']);

			if($hasil==false){

				$this->session->set_flashdata('eror','eror');
				redirect('Berita/view_admin');

			}else{
                
				$this->session->set_flashdata('input','input');
				redirect('Berita/view_admin');
        
			}




	}

	public function ubah_data_admin()
	{
		$id_berita = $this->input->post('id_berita');
		$judul_berita = $this->input->post('judul_berita');
		$isi_berita = $this->input->post('isi_berita');
		$num = rand(1, 9999);
		$foto_name = md5($judul_berita.$isi_berita.$num);

		
		$path = './assets/gambar/';

		$this->load->library('upload');
		$config['upload_path'] = './assets/gambar';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '2048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $foto_name;
		$this->upload->initialize($config);
		$gambar_berita_upload = $this->upload->do_upload('gambar_berita');
		
		if($gambar_berita_upload){
			$gambar_berita = $this->upload->data();
		}else{
			
			$this->session->set_flashdata('error_file_gambar_berita','error_file_gambar_berita');
			redirect('Berita/view_admin');
		}

		$hasil = $this->m_berita->update_berita($judul_berita, $isi_berita, $gambar_berita['file_name'], $id_berita);

			if($hasil==false){

				$this->session->set_flashdata('eror_edit','eror_edit');
				redirect('Berita/view_admin');

			}else{

                @unlink($path.$this->input->post('gambar_berita_old'));
				$this->session->set_flashdata('edit','edit');
				redirect('Berita/view_admin');
        
			}




	}

	public function hapus_data_admin()
	{
		$id_berita = $this->input->post('id_berita');

		$hasil = $this->m_berita->delete_berita($id_berita);

		
		$path = './assets/gambar/';

			if($hasil==false){

				$this->session->set_flashdata('eror_delete','eror_delete');
				redirect('Berita/view_admin');

			}else{

                @unlink($path.$this->input->post('gambar_berita_old'));
				$this->session->set_flashdata('delete','delete');
				redirect('Berita/view_admin');
        
			}
	}

	public function view_anggota()
	{
		$data['berita'] = $this->m_berita->read_all_berita()->result_array();
		$data['anggota'] = $this->m_user->read_all_anggota_by_id_user($this->session->userdata('id_user'))->row_array();
		$this->load->view('anggota/berita', $data);
    }
   
	
}