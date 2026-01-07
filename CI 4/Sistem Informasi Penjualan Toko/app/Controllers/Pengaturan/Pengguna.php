<?php

namespace App\Controllers\Pengaturan;

use Config\Validation;
use App\Models\Pengguna_model;
use App\Controllers\BaseController;


class Pengguna extends BaseController
{
   


 



    public function profil_pengguna()
    {

        $id_pengguna = session()->get('id');
        $user_model = new Pengguna_model();
        $user_login = $user_model->getpengguna($id_pengguna);

        $data = [
            'user' => $user_login,
            'judul' => 'Profile Saya'
        ];

        return view('pengguna/profil_pengguna', $data);
    }

    public function edit_profile()
    {
        session();
        $id_pengguna = session()->get('id');
        $user_model = new Pengguna_model();
        $user_login = $user_model->getpengguna($id_pengguna);
        $data = [
            'user' => $user_login,
            'judul' => 'Edit Profile',
            'validation' => \Config\Services::validation()
        ];

        return view('pengguna/edit_profile', $data);
    }

    public function updateprofile()
    {
        $id_pengguna = session()->get('id');
        $user_model = new Pengguna_model();
        $user_login = $user_model->getpengguna($id_pengguna);
        $user_login = $user_login[0];
        $inputusername = $this->request->getPost('username');
      
        if ($inputusername === $user_login['username_pengguna']) {
            $inputusername =  $user_login['username_pengguna'];
        } else if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[pengguna.username_pengguna]',
                'errors' => [
                    'required' => '{field}  harus diisi',
                    'is_unique' => '{field}  sudah ada , harus unik'
                ]
            ]

        ])) {

            return redirect()->to('/myprofile/edit')->withInput();
        }



        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field}  harus diisi'
                ]
            ],
            'telepon' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => '{field}  harus diisi',
                    'integer' => '{field} harus berisi angka'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field}  harus diisi',
                ]
            ]
        ])) {

            return redirect()->to('/myprofile/edit')->withInput();
        } else {

            $nama = $this->request->getPost('nama');
            $alamat = $this->request->getPost('alamat');
            $telepon = $this->request->getPost('telepon');

            $data = [
                'username_pengguna' => $inputusername,
                'nama_pengguna' => $nama,
                'alamat_pengguna' => $alamat,
                'no_telepon_pengguna' => $telepon,
            ];
            $user_model->editprofile($id_pengguna, $data);
            session()->setFlashdata('berhasil', 'Data Berhasil diperbarui');
            return redirect()->to('/myprofil');
        }
    }

    public function ubahpassword()
    {
        $data = [
            'judul' => 'Ubah Password',
            'validation' => \Config\Services::validation()
        ];

        return view('pengguna/ubahpassword', $data);
    }

    public function savepassword()
    {

        if (!$this->validate([
            'passwordlama' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field}  harus diisi',
                    'min_length' => 'password minimal 5 karakter'
                ]
            ], 'passwordbaru' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field}  harus diisi',
                    'min_length' => 'password minimal 5 karakter'

                ]
            ],
            'passwordkonfirmasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password konfirmasi harus diisi',
                ]
            ]
        ])) {
            return redirect()->to('/ubahpassword')->withInput();
        } else {
            $passwordlama = $this->request->getPost('passwordlama');
            $inputpassword = $this->request->getPost('passwordbaru');
            $passwordkonfirmasi = $this->request->getPost('passwordkonfirmasi');
            $id = session()->get('id');
            $model_pengguna = new pengguna_model();
            $password_db = $model_pengguna->select('password_pengguna')->where('id_pengguna', $id)->find();
            $password = $password_db[0]['password_pengguna'];


            if (sha1($passwordlama) !== $password) {
                session()->setFlashdata('gagal', 'Password yang anda masukkan salah');
                return redirect()->to('/ubahpassword');
            } else if ($inputpassword !== $passwordkonfirmasi) {
                session()->setFlashdata('gagal', 'password konfirmasi tidak sama');
                return redirect()->to('/ubahpassword');
            } else {
                $passwordbaru = sha1($inputpassword);
                $model_pengguna->updatepassword($id, $passwordbaru);
                $session = session();
                $sess_data = [
                    'logged_in'=> false
                ];
                $session->set($sess_data);
                $session->setFlashdata('berhasil', 'password berhasil diperbarui');
                return redirect()->to('/login');
            }
        }
    }
}