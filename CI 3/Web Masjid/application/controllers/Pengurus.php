<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function view_admin()
	{

	if ($this->session->userdata('logged_in') == true AND $this->session->userdata('id_user_level') == 1) {

		$data['pengurus'] = $this->m_user->read_all_pengurus()->result_array();
		$this->load->view('admin/pengurus', $data);

	}else{

		$this->session->set_flashdata('loggin_err','loggin_err');
		redirect('Login/index');

	}

	}
	
	public function tambah_data_admin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$jabatan = $this->input->post('jabatan');
		$no_kk = $this->input->post('no_kk');
		$no_ktp = $this->input->post('no_ktp');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$agama = $this->input->post('agama');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$num = rand(1, 9999);
		$id_user = md5($nama_lengkap.$alamat.$no_hp.$num);
		$foto_name = md5($nama_lengkap.$alamat.$no_hp.$id_user);
		$id_user_level = 3;
		$id_status_verifikasi = 1;

		// echo var_dump($username);
		// echo var_dump($password);
		// echo var_dump($email);
		// echo var_dump($nama_lengkap);
		// echo var_dump($jabatan);
		// echo var_dump($no_kk);
		// echo var_dump($no_ktp);
		// echo var_dump($jenis_kelamin);
		// echo var_dump($agama);
		// echo var_dump($no_hp);
		// echo var_dump($alamat);
		// echo var_dump($tempat_lahir);
		// echo var_dump($tanggal_lahir);

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
			redirect('Pengurus/view_admin');
		}

		$hasil = $this->m_user->insert_user($id_user, $username, $password, $email, $id_user_level, $nama_lengkap, $jabatan, $no_kk, $no_ktp, $jenis_kelamin, $agama, $no_hp, $alamat, $tempat_lahir, $tanggal_lahir, $foto_kk['file_name'], $id_status_verifikasi);

		

			if($hasil==false){

          	$this->session->set_flashdata('eror','eror');
          	redirect('Pengurus/view_admin');

			}else{
                
			$this->session->set_flashdata('input','input');
       	  	redirect('Pengurus/view_admin');
        
			}


	}

	public function edit_data_admin()
	{
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$jabatan = $this->input->post('jabatan');
		$no_kk = $this->input->post('no_kk');
		$no_ktp = $this->input->post('no_ktp');
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
			redirect('Pengurus/view_admin');
		}

		$hasil = $this->m_user->update_user($id_user, $username, $password, $email, $nama_lengkap, $jabatan, $no_kk, $no_ktp, $jenis_kelamin, $agama, $no_hp, $alamat, $tempat_lahir, $tanggal_lahir, $foto_kk['file_name']);

		

			if($hasil==false){

          	$this->session->set_flashdata('eror_edit','eror_edit');
          	redirect('Pengurus/view_admin');

			}else{
            @unlink($path.$this->input->post('foto_kk_old'));
			$this->session->set_flashdata('edit','edit');
       	  	redirect('Pengurus/view_admin');
        
			}

	}

	public function hapus_data_admin()
	{
		$id_user =  $this->input->post('id_user');

		$path = './assets/foto/';

		$hasil = $this->m_user->delete_user($id_user);

	
			if($hasil==false){

				$this->session->set_flashdata('eror_delete','eror_delete');
				redirect('Pengurus/view_admin');

			}else{

				@unlink($path.$this->input->post('foto_kk_old'));
				$this->session->set_flashdata('delete','delete');
				redirect('Pengurus/view_admin');
        
			}
	}
    
	
}