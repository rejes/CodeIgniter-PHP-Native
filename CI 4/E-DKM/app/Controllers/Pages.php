<?php

namespace App\Controllers;

use App\Models\GaleriModel;
use App\Models\KategoriFotoModel;
use App\Models\PengurusModel;
use App\Models\SumbanganModel;

class Pages extends BaseController
{
    protected $galeriModel, $kategoriFotoModel, $pengurusModel;
    public function __construct()
    {
        $this->galeriModel = new GaleriModel();
        $this->kategoriFotoModel = new KategoriFotoModel();
        $this->pengurusModel = new PengurusModel();
    }

    public function index()
    {
        return view('index');
    }

    public function pengurus()
    {
        
        $data = [
            'title' => 'Pengurus DKM',
            'pengurus' => $this->pengurusModel->getPengurus()
        ];

        return view('/pengurus', $data);
    }

    public function sumbangan()
    {
        $data = [
            'title' => 'Sumbangan',
            'validation' => \Config\Services::validation()
        ];

        return view('/sumbangan', $data);
    }

    public function saveSumbangan()
    {
        if($this->request->getMethod() == 'post') {
            if(!$this->validate([
                'name' => 'required',
                'no_telp' => 'required',
                'pesan' => 'required',
                'jumlahTransfer' => 'required',
                'buktiTransfer' => 'uploaded[buktiTransfer]|max_size[buktiTransfer,2048]|is_image[buktiTransfer]|mime_in[buktiTransfer,image/jpg,image/jpeg,image/png]',
            ])) {
                $response = [
                    'success' => false,
                    'msg' => 'Error'
                ];

                return $this->response->setJSON($response);
            } else {
                $buktiTransfer = $this->request->getFile('buktiTransfer');
                $namaFileBuktiTransfer = $buktiTransfer->getRandomName();

                if($buktiTransfer->move('assets/images/sumbangan', $namaFileBuktiTransfer)) {
                    $sumbanganModel = new SumbanganModel();

                    $data = [
                        'name' => $this->request->getVar('name'),
                        'no_telp' => $this->request->getVar('no_telp'),
                        'pesan' => $this->request->getVar('pesan'),
                        'jumlah' => $this->request->getVar('jumlahTransfer'),
                        'bukti_transfer' => $namaFileBuktiTransfer
                    ];

                    if($sumbanganModel->save($data)) {
                        $response = [
                            'success' => true,
                            'msg' => 'Data created',
                        ];
                    } else {
                        $response = [
							'success' => false,
							'msg' => "Failed to create data",
						];

                    }
                    return $this->response->setJSON($response);
                } else {
                    $response = [
						'success' => false,
						'msg' => "Failed to upload Image",
					];

                    return $this->response->setJSON($response);
                }
            }
        }
    }

    public function galeri()
    {
        $data = [
            'title' => 'Galeri',
            'foto' => $this->galeriModel->findAll(),
            'kategori' => $this->kategoriFotoModel->findAll()
        ];

        return view('/galeri', $data);
    }

    public function galeriByKategori($slug)
    {
        $data = [
            'title' => "Galeri Masjid Ar-Rahman",
            'foto' => $this->galeriModel->join('kategori_foto', 'kategori_foto.id=galeri.kategori_id')->where('slug', $slug)->findAll(),
            'kategori' => $this->kategoriFotoModel->findAll()
        ];

        return view('/galeri', $data);
    }

    public function kontak()
    {
        $data['title'] = 'Kontak';

        return view('/kontak', $data);
    }

    public function profile()
    {
        $data['title'] = 'Profile';

        return view('/profile', $data);
    }
}
