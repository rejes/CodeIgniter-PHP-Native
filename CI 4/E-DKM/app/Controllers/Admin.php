<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Admin extends BaseController
{
    protected $userModel;

	public function __construct()
	{
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

        if(session()->get('role_level') != 1) {
            return redirect()->back();
        }

		$this->userModel = new UsersModel();
	}

    public function index()
    {
        if(session()->get('role_level') != 1) {
            return redirect()->back();
        }

        if (!session()->get('logged_in')) {
            return redirect()->back();
        }
        
        $data = [
            'title' => 'Kelola Admin',
            'admin' => $this->userModel->getUser()
        ];

        return view('/dashboard/admin/index', $data);
    }

    public function security_add()
    {
        $password = $this->request->getVar('password');

        if (password_verify($password, session()->get('password'))) {
            session()->set([
                'security_add' => TRUE
            ]);

            return redirect()->to('/dashboard/admin/create');
        } else {
            session()->setFlashdata('error', 'Password salah');
            return redirect()->to('/dashboard/admin');
        }
    }

    public function create()
    {
        if (!session()->get('security_add')) {
            return redirect()->to('/dashboard/admin');
        }

        $data = [
            'title' => 'Tambah Admin',
            'validation' => \Config\Services::validation()
        ];

        return view('/dashboard/admin/create', $data);
    }

    public function save()
    {
        if(!$this->validate([
			'name' => [
				'rules' => 'required|max_length[100]|min_length[3]|alpha_space',
				'errors' => [
					'required' => 'nama wajib diisi',
                    'max_length' => 'nama tidah boleh lebih dari 100 karakter',
                    'min_length' => 'nama setidaknya harus berisi 3 karakter',
                    'alpha_space' => 'nama hanya boleh berisi alphabet dan spasi'
				]
			],
			'username' => [
				'rules' => 'required|is_unique[users.username]|min_length[3]|max_length[100]|alpha_dash',
				'errors' => [
					'required' => '{field} wajib diisi',
                    'is_unique' => '{field} sudah dipakai',
                    'alpha_dash' => '{field} tidak boleh ada spasi',
                    'max_length' => '{field} tidah boleh lebih dari 100 karakter',
                    'min_length' => '{field} setidaknya harus berisi 3 karakter',
				]
			],
			'role_level' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Role wajib dipilih',
				]
			],
			'password' => [
				'rules' => 'required|min_length[5]',
				'errors' => [
					'required' => '{field} wajib diisi',
                    'min_length' => '{field} setidaknya harus berisi 5 karakter',
				]
			],
			'confpassword' => [
				'rules' => 'matches[password]',
				'errors' => [
					'matches' => 'Password dan Konfirmasi password tidak sama',
				]
			],
		])) {
			return redirect()->to('/dashboard/admin/create')->withInput();
		}
        $this->userModel->save([
			'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'level' => $this->request->getVar('role_level'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
		]);

		session()->setFlashdata('success', 'Data berhasil ditambahkan');

        session()->remove('security_add');
        return redirect()->to('/dashboard/admin');
    }
    
    public function delete()
	{   
        $idAdmin = $this->request->getVar('idAdmin');
        $password = $this->request->getVar('password');

        if (password_verify($password, session()->get('password'))) {
            $this->userModel->delete($idAdmin);
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to('/dashboard/admin');
        } else {
            session()->setFlashdata('error', 'Password salah');
            return redirect()->to('/dashboard/admin');
        }
	}

    // Edit profile for role super admin
    public function edit($username)
	{
		$data = [
			'title' => 'Form edit user',
			'validation' => \Config\Services::validation(),
			'admin' => $this->userModel->getUser($username)
		];
        
		return view('/dashboard/admin/edit', $data);
	}
    
    public function update($id)
    {
        if(!$this->validate([
			'name' => [
				'rules' => 'required|max_length[100]|min_length[3]|alpha_space',
				'errors' => [
					'required' => 'nama wajib diisi',
                    'max_length' => 'nama tidah boleh lebih dari 100 karakter',
                    'min_length' => 'nama setidaknya harus berisi 3 karakter',
                    'alpha_space' => 'nama hanya boleh berisi alphabet dan spasi'
				]
			],
			'username' => [
				'rules' => 'required|is_unique[users.username,id,' . $id .']|min_length[3]|max_length[100]|alpha_dash',
				'errors' => [
					'required' => '{field} wajib diisi',
                    'is_unique' => '{field} sudah dipakai',
                    'alpha_dash' => '{field} tidak boleh ada spasi',
                    'max_length' => '{field} tidah boleh lebih dari 100 karakter',
                    'min_length' => '{field} setidaknya harus berisi 3 karakter',
				]
			],
            'role_level' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Role wajib dipilih',
				]
			],
			'password' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib diisi',
				]
			],
		])) {
			return redirect()->to('/dashboard/admin/edit/' . $this->request->getVar('oldUsername'))->withInput();
		}

        $admin = $this->userModel->find($id);
        $password = $this->request->getVar('password');
        if (password_verify($password, session()->get('password'))) {
            $this->userModel->save([
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
                'level' => $this->request->getVar('role_level')
            ]);
    
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/dashboard/admin');
        } else {
            session()->setFlashdata('error', 'Password salah');
            return redirect()->to('/dashboard/admin/edit/' . $this->request->getVar('oldUsername'));
        }
    }

     // Edit profile for role admin
    public function editProfile()
    {
        if(session()->get('role_level') == 1) {
            return redirect()->back();
        }

        $usermodel = new UsersModel();
        $data = [
            'title' => 'Form edit profile',
            'validation' => \Config\Services::validation(),
            'admin' => $usermodel->getUser(session()->get('username'))
        ];
        
        return view('/dashboard/admin/edit', $data);
    }

    public function updateProfile($id)
    {
        if(session()->get('role_level') == 1) {
            return redirect()->back();
        }

        if(!$this->validate([
			'name' => [
				'rules' => 'required|max_length[100]|min_length[3]|alpha_space',
				'errors' => [
					'required' => 'nama wajib diisi',
                    'max_length' => 'nama tidah boleh lebih dari 100 karakter',
                    'min_length' => 'nama setidaknya harus berisi 3 karakter',
                    'alpha_space' => 'nama hanya boleh berisi alphabet dan spasi'
				]
			],
			'username' => [
				'rules' => 'required|is_unique[users.username,id,' . $id .']|min_length[3]|max_length[100]|alpha_dash',
				'errors' => [
					'required' => '{field} wajib diisi',
                    'is_unique' => '{field} sudah dipakai',
                    'alpha_dash' => '{field} tidak boleh ada spasi',
                    'max_length' => '{field} tidah boleh lebih dari 100 karakter',
                    'min_length' => '{field} setidaknya harus berisi 3 karakter',
				]
			],
			'password' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib diisi',
				]
			],
		])) {
			return redirect()->to('/dashboard/admin/edit-profile')->withInput();
		}

        $usermodel = new UsersModel();
        $password = $this->request->getVar('password');
        if (password_verify($password, session()->get('password'))) {
            $usermodel->save([
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
            ]);
    
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect()->to('/dashboard/admin/edit-profile');
        } else {
            session()->setFlashdata('error', 'Password salah');
            return redirect()->to('/dashboard/admin/edit-profile');
        }
    }

    public function changePassword()
    {
        $data = [
            'title' => 'Ubah password akun',
            'validation' => \Config\Services::validation(),
        ];

        return view('/dashboard/admin/change-password', $data);
    }

    public function savePassword()
    {
        if(!$this->validate([
			'oldPassword' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Password lama wajib diisi',
				]
			],
			'newPassword' => [
				'rules' => 'required|min_length[5]',
				'errors' => [
					'required' => 'Password baru wajib diisi',
                    'min_length' => 'Password setidaknya mempunyai panjang 5 karakter'
				]
			],
			'confPassword' => [
				'rules' => 'required|matches[newPassword]',
				'errors' => [
					'required' => 'Konfirmasi password wajib diisi',
                    'matches' => 'Password baru dan konfirmasi password baru tidak sama'
				]
			],
		])) {
			return redirect()->to('/dashboard/change-password')->withInput();
		}

        $oldPassword = $this->request->getVar('oldPassword');

        if (password_verify($oldPassword, session()->get('password'))) {
            $this->userModel->set('password', password_hash($this->request->getVar('newPassword'), PASSWORD_DEFAULT));
            $this->userModel->where('username', session()->get('username'));
            $this->userModel->update();

            session()->setFlashdata('success', 'Password berhasil diubah');
            return redirect()->to('/dashboard/change-password');
        } else {
            session()->setFlashdata('error', 'Password lama yang anda masukkan salah');
            return redirect()->to('/dashboard/change-password');
        }
    }
}
