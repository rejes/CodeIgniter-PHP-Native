<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaporanKeuanganModel;

class LaporanKeuangan extends BaseController
{
    protected $laporanKeuanganModel;

    public function __construct()
	{
        $this->laporanKeuanganModel = new LaporanKeuanganModel();

        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }
    }
    
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

        helper('tgl');

        $tanggal = '';
        if($this->request->getVar('tglLaporan') || $this->request->getGet('tglLaporan')) {
            $tanggal = tgl_reqLaporan($this->request->getVar('tglLaporan')) ?? tgl_reqLaporan($this->request->getGet('tglLaporan'));
        } else {
            $tanggal = tgl_laporan(date('Y/m/d'));
        }

        $laporanByTanggal = [];
        for($i = 0; $i < count($this->laporanKeuanganModel->findAll()); $i++) {
            if(tgl_contLaporan($this->laporanKeuanganModel->findAll()[$i]['tanggal']) == $tanggal) {
                array_push($laporanByTanggal, $this->laporanKeuanganModel->findAll()[$i]);
            }
        }

        $data = [
            'title' => 'Laporan Keuangan',
            'laporan' => $laporanByTanggal,
            'tanggalJudul' => $tanggal,
            'tanggalPicker' => $this->request->getVar('tglLaporan') ?? ''
        ];

        return view('dashboard/laporan-keuangan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Laporan Keuangan',
            'validation' => \Config\Services::validation()
        ];

        return view('dashboard/laporan-keuangan/create', $data);
    }

    public function save()
    {  
        if(!$this->validate([
			'tglLaporan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tanggal laporan wajib diisi',
				]
			],
			'keterangan' => [
				'rules' => 'required|min_length[3]|max_length[100]|alpha_numeric_space',
				'errors' => [
					'required' => '{field} wajib diisi',
                    'is_unique' => '{field} sudah dipakai',
                    'alpha_space' => '{field} hanya boleh berisi alphabet, angka, dan spasi',
                    'max_length' => '{field} tidah boleh lebih dari 100 karakter',
                    'min_length' => '{field} setidaknya harus berisi 3 karakter',
				]
			],
			'pemasukkan' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => '{field} wajib diisi',
                    'numeric' => '{field} hanya boleh berisi angka',
				]
			],
			'pengeluaran' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => '{field} wajib diisi',
                    'numeric' => '{field} hanya boleh berisi angka',
				]
			]
		])) {
			return redirect()->to('/dashboard/laporan-keuangan/tambah-laporan')->withInput();
		}

        $this->laporanKeuanganModel->save([
			'tanggal' => $this->request->getVar('tglLaporan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'pemasukkan' => $this->request->getVar('pemasukkan'),
            'pengeluaran' => $this->request->getVar('pengeluaran'),
		]);

		session()->setFlashdata('success', 'Data berhasil ditambahkan');

        return redirect()->back();
    }

    public function delete($id)
	{
        $this->laporanKeuanganModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->back();
	}
}
