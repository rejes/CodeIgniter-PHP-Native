<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GaleriModel;
use App\Models\KategoriFotoModel;

class KategoriFoto extends BaseController
{   
    protected $kategoriFotoModel, $galeriModel;

    public function __construct()
    {
        $this->kategoriFotoModel = new KategoriFotoModel();
        $this->galeriModel = new GaleriModel();
    }

    public function index()
    {
        if(session()->get('role_level') != 1) {
            return redirect()->back();
        }

        $data = [
            'title' => 'Daftar Kategori Foto',
            'kategori' => $this->kategoriFotoModel->findAll()
        ];

        return view('/dashboard/kategori-foto/index', $data);
    }

    public function create()
    {
        if(session()->get('role_level') != 1) {
            return redirect()->back();
        }

        $data = [
            'title' => 'Tambah Kategori Foto',
            'validation' => \Config\Services::validation()
        ];

        return view('/dashboard/kategori-foto/create', $data);
    }

    public function save()
    {
        if(!$this->validate([
            'nama_kategori' => [
				'rules' => 'required|max_length[100]|min_length[3]|alpha_space',
				'errors' => [
					'required' => 'Nama kategori wajib diisi',
                    'max_length' => 'Nama kategori tidah boleh lebih dari 100 karakter',
                    'min_length' => 'Nama kategori setidaknya harus berisi 3 karakter',
                    'alpha_space' => 'Nama kategori hanya boleh berisi alphabet dan spasi'
				]
			],
        ])) {
            return redirect()->to('/dashboard/kategori-foto/tambah')->withInput();
        };

        $this->kategoriFotoModel->save([
			'nama_kategori' => ucwords($this->request->getPost('nama_kategori')),
            'slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($this->request->getPost('nama_kategori')))
		]);

		session()->setFlashdata('success', 'Kategori foto berhasil ditambahkan');
        return redirect()->to('/dashboard/kategori-foto/tambah');
    }

    public function edit($id)
    {
        if(session()->get('role_level') != 1) {
            return redirect()->back();
        }
        
        $data = [
            'title' => 'Edit Kategori Foto',
            'kategori' => $this->kategoriFotoModel->where('id', $id)->first(),
            'validation' => \Config\Services::validation()
        ];

        return view('/dashboard/kategori-foto/edit', $data);
    }

    public function update($id)
    {
        if(!$this->validate([
            'nama_kategori' => [
				'rules' => 'required|max_length[100]|min_length[3]|alpha_space|is_unique[kategori_foto.nama_kategori,id,' . $id .']',
				'errors' => [
					'required' => 'Nama kategori wajib diisi',
                    'is_unique' => 'Nama kategori sudah terpakai',
                    'max_length' => 'Nama kategori tidah boleh lebih dari 100 karakter',
                    'min_length' => 'Nama kategori setidaknya harus berisi 3 karakter',
                    'alpha_space' => 'Nama kategori hanya boleh berisi alphabet dan spasi'
				]
			],
        ])) {
            return redirect()->back()->withInput();
        };

        $this->kategoriFotoModel->set('nama_kategori', ucwords($this->request->getPost('nama_kategori')));
        $this->kategoriFotoModel->set('slug', preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($this->request->getPost('nama_kategori'))));
        $this->kategoriFotoModel->where('id', $id);
        $this->kategoriFotoModel->update();

        session()->setFlashdata('success', 'Kategori foto berhasil diubah');
        return redirect()->to('/dashboard/kategori-foto/' . $id);
    }

    public function delete($id)
    {
        foreach($this->galeriModel->where('kategori_id', $id)->findAll() as $foto) {
            unlink("assets/images/galeri/" . $foto['foto']);
        }

        $this->galeriModel->where('kategori_id', $id)->delete();
        $this->kategoriFotoModel->delete($id);
        session()->setFlashdata('success', 'Kategori Foto berhasil dihapus');
        return redirect()->to('/dashboard/kategori-foto');
    }
}
