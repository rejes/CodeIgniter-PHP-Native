<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lengkapi_Data extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function view_anggota()
	{
		if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 3) {
			$data['anggota_data'] = $this->m_user->read_all_anggota_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['anggota'] = $this->m_user->read_all_anggota_by_id_user($this->session->userdata('id_user'))->row_array();

			$this->load->view('anggota/lengkapi_data', $data);
		}else{

			$this->session->set_flashdata('loggin_err','loggin_err');
			redirect('Login/index');

		}
	}
	
	public function proses_anggota()
	{
		$nama_lengkap = $this->input->post('nama_lengkap');
		$jabatan = $this->input->post('jabatan');
		$no_kk = $this->input->post('no_kk');
		$no_ktp = $this->input->post('no_ktp');
		$jabatan = "Anggota Biasa";
		$id_status_verifikasi = 2;
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$agama = $this->input->post('agama');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$num = rand(1, 9999);
		$id_user =  $this->input->post('id_user');
		$foto_name = md5($nama_lengkap.$alamat.$no_hp.$id_user.$num);
		
		$path = './assets/foto/';

		$this->load->library('upload');
		$config['upload_path'] = './assets/foto';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '2048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $foto_name.'_kk';
		$this->upload->initialize($config);
		$foto_kk_upload = $this->upload->do_upload('foto_kk');
		
		if($foto_kk_upload){
			$foto_kk = $this->upload->data();
		}else{
			
			$this->session->set_flashdata('error_file_kk','error_file_kk');
			redirect('Lengkapi_Data/view_anggota');
		}

		$hasil = $this->m_user->update_user_detail($id_user, $nama_lengkap, $jabatan, $no_kk, $no_ktp, $jenis_kelamin, $agama, $no_hp, $alamat, $tempat_lahir, $tanggal_lahir, $foto_kk['file_name'], $id_status_verifikasi);

		

			if($hasil==false){

          	$this->session->set_flashdata('eror_input','eror_input');
          	redirect('Lengkapi_Data/view_anggota');

			}else{
            @unlink($path.$this->input->post('foto_kk_old'));
			$this->session->set_flashdata('input','input');
       	  	redirect('Lengkapi_Data/view_anggota');
        
			}
	}
    
   
	
}