<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GaleriModel;
use App\Models\KategoriFotoModel;

class Galeri extends BaseController
{
    protected $galeriModel, $kategoriFotoModel;

    public function __construct()
	{
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $this->galeriModel = new GaleriModel();
        $this->kategoriFotoModel = new KategoriFotoModel();
	}

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }

        $data = [
            'title' => 'Kelola Galeri',
            'foto' => $this->galeriModel->join('kategori_foto', 'kategori_foto.id=galeri.kategori_id')->findAll(),
        ];
        return view('dashboard/galeri/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah foto galeri',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategoriFotoModel->findAll()
        ];

        return view('dashboard/galeri/create', $data);
    }

    public function save()
    {
        if(!$this->validate([
			'kategori' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} wajib dipilih',
				]
			],
            'tglKegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal kegiatan wajib diisi'
                ]
            ],
			'foto' => [
				'rules' => 'uploaded[foto]|max_size[foto,2048]|mime_in[foto,image/png,image/jpeg,image/jpg]|is_image[foto]',
				'errors' => [
                    'uploaded' => 'Foto wajib diisi',
					'max_size' => 'Ukuran gambar terlalu besar, max 2MB',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan gambar'
				]
			],
		])) {
			return redirect()->to('/dashboard/galeri/create')->withInput();
		}

        $foto = $this->request->getFile('foto');
        $namaFileFoto = $foto->getRandomName();
        $foto->move('assets/images/galeri', $namaFileFoto);

        $this->galeriModel->save([
            'kategori_id' => $this->request->getVar('kategori'),
            'tgl_kegiatan' => $this->request->getVar('tglKegiatan'),
            'foto' => $namaFileFoto
        ]);

        session()->setFlashdata('success', 'Foto berhasil ditambahkan');
		return redirect()->to('/dashboard/galeri/create');
    }

    public function delete($id)
    {
        $galeri = $this->galeriModel->find($id);
        // Delete file 
        unlink("assets/images/galeri/" . $galeri['foto']);

        $this->galeriModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
		return redirect()->to('/dashboard/galeri');
    }
}
