<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\kasir_model;
use App\Models\Pengguna_model;
use CodeIgniter\Validation\Rules;


class Login extends BaseController
{

    public function index()
    {


        $data = [
            // cara untuk menangkap pemberitahuan validasi dari metode Save
            'validation' => \Config\Services::validation()
        ];

        return view('auth/login', $data);
    }

    //--------------------------------------------------------------------

    public function proses()
    {
        //
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' Username harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ]
        ])) {
            return redirect()->to('/login')->withInput();
        } else {
            $session = session();
            $model = new Pengguna_model();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $data = $model->where('username_pengguna', $username)->first();
            if ($data) {
                $pass = $data['password_pengguna'];
                $passinput = sha1($password);

                if ($passinput === $pass) {
                    $ses_data = [
                        'id'       => $data['id_pengguna'],
                        'username'     => $data['username_pengguna'],
                        'role_id'     => $data['role_id'],
                        'nama_pengguna'     => $data['nama_pengguna'],
                        'logged_in'     => TRUE
                    ];

                    $session->set($ses_data);
                    return redirect()->to('/');
                } else {
                    $session->setFlashdata('msg', 'Password yang dimasukkan salah');
                    return redirect()->to('/login');
                }
            } else {
                $session->setFlashdata('msg', 'Username yang dimasukkan tidak ditemukan');
                return redirect()->to('/login');
            }
        }
    }
}