<?php

namespace App\Controllers\Master;

use Config\Validation;
use App\Controllers\BaseController;
use App\Models\Supplier_model;


class Supplier extends BaseController
{
    protected $suppliermodel;

    public function __construct()
    {
        session();

        $this->suppliermodel = new Supplier_model();
    }

    public function index()
    {


        $supplier = $this->suppliermodel->getsupplier();

        $data = [
            'supplier' => $supplier,
            'judul' => 'List supplier',
            'validation' => \Config\Services::validation()
        ];

        return view('master/listsupplier', $data);
    }

    public function tambahsupplier()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama supplier berhasil diisi '
                ]
            ],
            'telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nomor telepon supplier harus diisi '
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat supplier harus diisi '
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'keterangan supplier harus diisi '
                ]
            ],
        ])) {
            session()->setFlashdata('error_tambah_supplier', true);
            return redirect()->to('/Supplier')->withInput();
        } else {
            $nama = $this->request->getPost('nama');
            $telepon = $this->request->getPost('telepon');
            $alamat = $this->request->getPost('alamat');
            $keterangan = $this->request->getPost('keterangan');

            $data = [
                'nama_supplier' => $nama,
                'no_telepon_supplier' => $telepon,
                'alamat_supplier' => $alamat,
                'keterangan_supplier' => $keterangan
            ];

            $simpan = $this->suppliermodel->save($data);
            if ($simpan) {
                session()->setFlashdata('berhasil', 'berhasil menambahkan data supplier');
                return redirect()->to('/Supplier');
            }
        }
    }

    public function editsupplier()
    {
        if (!$this->validate([

            'supplier_nama_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Supplier harus diisi '
                ]
            ],
            'supplier_telepon_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No telepon Supplier harus diisi  '
                ]
            ],
            'supplier_alamat_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Supplier harus diisi '
                ]
            ],
            'supplier_keterangan_edit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'keterangan Supplier harus diisi '
                ]
            ],
        ])) {
            session()->setFlashdata('error_edit_supplier', true);
            return redirect()->to('/Supplier')->withInput();
        } else {
            $id = $this->request->getPost('supplier_id_edit');
            $data = [
                'nama_supplier' => $this->request->getPost('supplier_nama_edit'),
                'alamat_supplier' => $this->request->getPost('supplier_alamat_edit'),
                'no_telepon_supplier' => $this->request->getPost('supplier_telepon_edit'),
                'keterangan_supplier' => $this->request->getPost('supplier_keterangan_edit'),
            ];
            $update = $this->suppliermodel->editsupplier($id, $data);
            if ($update) {
                session()->setFlashdata('berhasil', 'data supplier berhasil di perbarui');
                return redirect()->to('/Supplier');
            }
        }
    }

    public function hapussupplier()
    {

        $id = $this->request->getPost('id_supplier');

        $hapus = $this->suppliermodel->delete($id);
        if ($hapus) {
            session()->setFlashdata('berhasil', 'data supplier berhasil dihapus');
            return redirect()->to('/Supplier');
        }
    }
}