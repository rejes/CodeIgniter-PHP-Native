<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\UserTokenModel;

class Auth extends BaseController
{
    protected $userModel, $userTokenModel;

    public function __construct()
    {
        $this->userModel = new UsersModel();
        $this->userTokenModel = new UserTokenModel();
    }

    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Login Admin',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/login', $data);
    }

    public function process()
    {
        if(!$this->validate([
			'username' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.',
				]
			],
			'password' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} tidak boleh kosong.',
				]
			],
		])) {
			return redirect()->to('/admin')->withInput();
		}
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $dataUser = $this->userModel->where([
            'username' => $username
        ])->first();

        if($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'username' => $dataUser['username'],
                    'name' => $dataUser['name'],
                    'password' => $dataUser['password'],
                    'role_level' =>  $dataUser['level'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('error', 'Username / Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username / Password Salah');
            return redirect()->back();
        }
    }

    public function lupaPassword()
    {
        $data = [
            'title' => 'Lupa Password',
            'validation' => \Config\Services::validation()
        ]; 

        return view('auth/lupa-password', $data);
    }

    public function postLupaPassword()
    {
        if(!$this->validate([
			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => '{field} tidak boleh kosong.',
					'valid_email' => '{field} yang anda masukkan tidak valid.',
				]
			],
		])) {
			return redirect()->to('/admin/lupa-password')->withInput();
		}

        $to = $this->request->getVar('email');

        $dataUser = $this->userModel->where('email', $to)->first();
        
        if($dataUser) {
            $token = bin2hex(random_bytes(16));

            $message = 'Password reset untuk user <strong>' . $dataUser['name'] . '</strong><br><br>'
                    . 'Klik tombol di bawah untuk menuju ke halaman reset password.<br><br>'
                    . '<a href="' . base_url() . '/admin/reset-password?token=' . $token .'" style="padding: 10px; background-color: #3950a2; color: white; border-radius: 5px; text-decoration: none;">Reset Password</a><br><br>'
                    . 'Token reset password akan expired dalam 30 menit, segera reset!';
            
            
            $email = \Config\Services::email();

            $email->setTo($to);
            $email->setFrom('msjdrrhmnjkt@gmail.com', 'eDKM');
            $email->setSubject('Reset password admin');
            $email->setMessage($message);

            if($email->send()) {
                $this->userTokenModel->save([
                    'email' => $to,
                    'token' => $token,
                    'date_created' => time()
                ]); 

                session()->setFlashdata('success', 'Link reset password sudah dikirim ke email anda.');
                return redirect()->to('/admin/lupa-password');
            } else {
                session()->setFlashdata('error', 'Error!');
                return redirect()->to('/admin/lupa-password');
            }
        } else {
            session()->setFlashdata('error', 'Email tidak ditemukan.');
            return redirect()->to('/admin/lupa-password');
        }
    }

    public function resetPassword()
    {
        $userToken = $this->userTokenModel->where('token', $this->request->getGet('token'))->first();

        if(!$userToken) {
            session()->setFlashdata('error', 'Token invalid.');
            return redirect()->to('/admin');
        }

        $data = [
            'title' => 'Reset Password',
            'token' => $this->request->getGet('token'),
            'validation' => \Config\Services::validation()
        ];

        session()->set(['reset_password' => $userToken['email']]);

        return view('auth/reset-password', $data);
    }
    
    public function postResetPassword($token)
    {
        $user_token = $this->userTokenModel->where('token', $token)->first();
        if($user_token) {
            if(!$this->validate([
                'password' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'Password baru wajib diisi',
                        'min_length' => 'Password setidaknya mempunyai panjang 5 karakter'
                    ]
                ],
                'confPassword' => [
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'Konfirmasi password wajib diisi',
                        'matches' => 'Password baru dan konfirmasi password baru tidak sama'
                    ]
                ],
            ])) {
                return redirect()->back()->withInput();
		    }
            
            if(time() - $user_token['date_created'] < (15 * 60)) {
                $this->userModel->set('password', password_hash($this->request->getVar('password'), PASSWORD_DEFAULT));
                $this->userModel->where('email', session()->get('reset_password'));
                $this->userModel->update();

                session()->remove('reset_password');

                $this->userTokenModel->where('id', $user_token['id']);
                $this->userTokenModel->delete();
                session()->setFlashdata('success', 'Password berhasil diubah');
                return redirect()->to('/admin');
            } else {
                $this->userTokenModel->where('id', $user_token['id']);
                $this->userTokenModel->delete();
                session()->setFlashdata('error', 'Reset password gagal! Token expired.');
                return redirect()->to('/admin');

                session()->remove('reset_password');
            }
        } else {
            session()->setFlashdata('error', 'Token tidak valid / expired.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin');
    }
}
