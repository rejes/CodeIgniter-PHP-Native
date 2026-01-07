<?php

namespace App\Controllers\Master;

use Config\Validation;
use App\Controllers\BaseController;
use App\Models\Satuan_model;


class satuan extends BaseController
{
    protected $satuanmodel;

    public function __construct()
    {
        session();

        $this->satuanmodel = new Satuan_model();
    }

    public function index()
    {


        $satuan = $this->satuanmodel->getsatuan();


        $data = [
            'satuan' => $satuan,
            'judul' => 'List satuan',
            'validation' => \Config\Services::validation()
        ];

        return view('master/listsatuan', $data);
    }



    public function tambahsatuan()
    {

        if (!$this->validate([
            'nama_satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama satuan harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error_tambah_satuan', true);
            return redirect()->to('/satuan')->withInput();
        } else {
            $nama = $this->request->getPost('nama_satuan');
            $data = [
                'nama_satuan' => $nama
            ];
            $insert = $this->satuanmodel->save($data);
            if ($insert) {
                session()->setFlashdata('berhasil', 'data satuan berhasil ditambah');
                return redirect()->to('/Satuan');
            }
        }
    }

    public function editsatuan()
    {
        if (!$this->validate([
            'satuan_nama_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama satuan harus diisi '
                ]
            ]
        ])) {
            session()->setFlashdata('error_edit_satuan', true);
            return redirect()->to('/satuan')->withInput();
        } else {
            $id = $this->request->getPost('satuan_id_edit');
            $nama = $this->request->getPost('satuan_nama_edit');


            $update = $this->satuanmodel->updatesatuan($id, $nama);
            if ($update) {
                session()->setFlashdata('berhasil', 'data satuan berhasil diperbarui');
                return redirect()->to('/Satuan');
            }
        }
    }

    public function hapussatuan()
    {

        $id = $this->request->getPost('id_satuan');
        $hapus = $this->satuanmodel->delete($id);
        if ($hapus) {
            session()->setFlashdata('berhasil', 'data satuan berhasil dihapus');
            return redirect()->to('/Satuan');
        }
    }
}