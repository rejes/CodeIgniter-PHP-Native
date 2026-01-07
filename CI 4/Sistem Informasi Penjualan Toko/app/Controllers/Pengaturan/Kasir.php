<?php

namespace App\Controllers\Pengaturan;

use Config\Validation;
use App\Models\Pengguna_model;
use App\Controllers\BaseController;


class Kasir extends BaseController
{
    public function index()
    {
        $model_pengguna = new Pengguna_model();
        $kasir = $model_pengguna->getkasir();
      


        $data = [
            'kasir' => $kasir,
            'judul' => 'List kasir'
        ];

        return view('pengguna/listkasir', $data);
    }


    public function tambahkasir()
    {
        session();

        $data = [
            'judul' => 'Tambah Pengguna',
            'validation' => \Config\Services::validation()
        ];

        return view('pengguna/tambahkasir', $data);
    }


    public function simpan()
    {

        if (!$this->validate([


            'username' => [
                'rules' => 'required|is_unique[pengguna.username_pengguna]',
                'errors' => [
                    'required' => 'username  harus diisi',
                    'is_unique' => 'username  sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama pengguna  harus diisi'
                ]
            ],
            'telepon' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'nomor pengguna harus diisi',
                    'integer' => 'nomor telepon harus berisi angka'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat penggua harus diisi',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'password pengguna harus diisi',
                    'min_length' => 'password harus minimal 5 karakter'
                ]
            ]
        ])) {

            return redirect()->to('/kasir/tambahkasir')->withInput();
        } else {
            $username = $this->request->getPost('username');
            $nama = $this->request->getPost('nama');
            $alamat = $this->request->getPost('alamat');
            $telepon = $this->request->getPost('telepon');
            $password = $this->request->getPost('password');


            $model_user = new Pengguna_model();
            $model_user->save([
                'username_pengguna' => $username,
                'nama_pengguna' => $nama,
                'alamat_pengguna' => $alamat,
                'no_telepon_pengguna' => $telepon,
                'role_id' => 2,
                'password_pengguna' => sha1($password)
            ]);

            session()->setFlashdata('berhasil', 'Data pengguna Berhasil ditambahkan');
            return redirect()->to('/Kasir');
        }
    }




    public function hapuskasir()
    {
        $id = $this->request->getPost('id_pengguna');
        $model_pengguna = new Pengguna_model();
        $model_pengguna->delete($id);
        session()->setFlashdata('berhasil', 'Data Berhasil dihapus');
        return redirect()->to('/Kasir');
    }


//   
}