<?php

namespace App\Controllers\Master;

use Config\Validation;
use App\Controllers\BaseController;
use App\Models\Kategori_model;


class Kategori extends BaseController
{
    protected $kategorimodel;

    public function __construct()
    {
        session();

        $this->kategorimodel = new Kategori_model();
    }

    public function index()
    {


        $kategori = $this->kategorimodel->getkategori();



        $data = [
            'kategori' => $kategori,
            'judul' => 'List Kategori',
            'validation' => \Config\Services::validation()
        ];

        return view('master/listkategori', $data);
    }



    public function tambahkategori()
    {

        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama kategori harus diisi '
                ]
            ]
        ])) {
            session()->setFlashdata('error_tambah', true);
            return redirect()->to('/kategori')->withInput();
        } else {
            $nama = $this->request->getPost('nama_kategori');
            $data = [
                'nama_kategori' => $nama
            ];
            $insert = $this->kategorimodel->save($data);
            if ($insert) {
                session()->setFlashdata('berhasil', 'Data kategori berhasil ditambah');
                return redirect()->to('/kategori');
            }
        }
    }

    public function editkategori()
    {
        if (!$this->validate([
            'kategori_nama_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama kategori harus diisi '
                ]
            ]
        ])) {
            session()->setFlashdata('error_edit', true);
            return redirect()->to('/kategori')->withInput();
        } else {

            $id = $this->request->getPost('kategori_id_edit');
            $nama = $this->request->getPost('kategori_nama_edit');


            $update = $this->kategorimodel->updatekategori($id, $nama);
            if ($update) {
                session()->setFlashdata('berhasil', 'Data kategori berhasil diperbarui');
                return redirect()->to('/kategori');
            }
        }
    }

    public function hapuskategori()
    {

        $id = $this->request->getPost('id_kategori');
        $hapus = $this->kategorimodel->delete($id);
        if ($hapus) {
            session()->setFlashdata('berhasil', 'Data kategori berhasil dihapus');
            return redirect()->to('/kategori');
        }
    }
}