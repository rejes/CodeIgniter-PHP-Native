<?php

namespace App\Controllers\Master;

use Config\Validation;
use App\Controllers\BaseController;
use App\Models\barang_model;
use App\Models\Kategori_model;
use App\Models\Satuan_model;
use App\ThirdParty\FPDF;




class Barang extends BaseController
{
    protected $barangmodel;

    public function __construct()
    {
        session();
        $this->barangmodel = new barang_model();
    }

    public function index()
    {
        $satuanmodel = new satuan_model();
        $satuan = $satuanmodel->getsatuan();

        $modelkategori = new Kategori_model();
        $kategori = $modelkategori->getkategori();
        $barang = $this->barangmodel->getbarang();




        $data = [
            'satuan' => $satuan,
            'kategori' => $kategori,
            'barang' => $barang,
            'judul' => 'List barang',
            'validation' => \Config\Services::validation()
        ];

        return view('master/listbarang', $data);
    }

    public function tambahbarang()
    {
        $satuanmodel = new satuan_model();
        $satuan = $satuanmodel->getsatuan();

        $modelkategori = new Kategori_model();
        $kategori = $modelkategori->getkategori();

        $data = [
            'satuan' => $satuan,
            'kategori' => $kategori,
            'judul' => 'Tambah barang',
            'validation' => \Config\Services::validation()
        ];

        return view('master/tambahbarang', $data);
    }

    public function simpanbarang()
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama barang haru diisi '
                ]
            ],
            'barcode' => [
                'rules' => 'required|min_length[5]|max_length[13]|alpha_numeric',
                'errors' => [
                    'required' => 'kode barcode harus diisi '
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kategori barang harus diisi '
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'harga barang harus diisi'
                ]
            ],
            'satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'satuan barang haru diisi '
                ]
            ],
            'stok_awal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'satuan barang haru diisi '
                ]
            ],
        ])) {
            return redirect()->to('/barang/tambahbarang')->withInput();
        } else {
            $barangmodel = new barang_model();
            $inputbarcode = $this->request->getPost('barcode');
            $barang = $barangmodel->where('barcode_barang', $inputbarcode)->findall();
            if ($barang) {
                session()->setFlashdata('gagal_barcode', 'barcode sudah terdaftar');
                return redirect()->to('/barang/tambahbarang');
            } else {

                $kategori = $this->request->getPost('kategori');
                $nama = $this->request->getPost('nama');
                $satuan = $this->request->getPost('satuan');
                $harga = $this->request->getPost('harga');
                $barcode = $this->request->getPost('barcode');
                $kategori = $this->request->getPost('kategori');
                $stok_awal = $this->request->getPost('stok_awal');

                $data = [
                    'kategori_id' => $kategori,
                    'nama_barang' => $nama,
                    'satuan_id' => $satuan,
                    'harga_barang' => $harga,
                    'barcode_barang' => $barcode,
                    'stok_barang'=>$stok_awal
                ];
                $save = $this->barangmodel->save($data);
                if ($save) {
                    session()->setFlashdata('berhasil', 'barang berhasil di tambahkan');
                    return redirect()->to('/Barang');
                }
            }
        }
    }

    public function hapusbarang()
    {

        $id = $this->request->getPost('id_barang');

        $hapus = $this->barangmodel->delete($id);
        if ($hapus) {
            session()->setFlashdata('berhasil', 'barang berhasil dihapus');
            return redirect()->to('/Barang');
        }
    }


    public function editbarang($id_imput)
    {
        $id = $id_imput;
        $barang = $this->barangmodel->getbarang($id);
        $modelketegori = new Kategori_model();
        $modelsatuan = new Satuan_model();
        $kategori = $modelketegori->findAll();
        $satuan = $modelsatuan->findAll();

        $data = [
            'satuan' => $satuan,
            'kategori' => $kategori,
            'barang' => $barang,
            'judul' => 'List barang',
            'validation' => \Config\Services::validation()
        ];

        return view('master/editbarang', $data);
    }

    public function updatebarang()
    {
        $id = $this->request->getPost('id');
        $barcode_input = $this->request->getPost('barcode');
        $barang = $this->barangmodel->select('barcode_barang')->where('id_barang', $id)->find();
        $barcode_db = $barang[0]['barcode_barang'];

        if ($barcode_input === $barcode_db) {
            $barcode = $barcode_input;
        } else if (!$this->validate([
            'barcode' => [
                'rules' => 'required|is_unique[barang.barcode_barang]|min_length[5]|max_length[13]|alpha_numeric',
                'errors' => [
                    'required' => 'barcode harus diisi ',
                    'is_unique' => 'barcode sudah terdaftar ',
                    'min_length' => 'kode barcode minimal 10 karakter'
                ]
            ]

        ])) {


            return redirect()->to('/Master/barang/editbarang/' . $id)->withInput();
        } else {

            $barcode = $this->request->getPost('barcode');
        }

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama barang harus diisi '
                ]
            ],

            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kategori barang harus diisi '
                ]
            ],
            'harga' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'harga barang harus diisi '
                ]
            ],

            'satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'satuan barang harus diisi '
                ]
            ],
        ])) {

            return redirect()->to('/Master/barang/editbarang/' . $id)->withInput();
        } else {

            $kategori = $this->request->getPost('kategori');
            $satuan = $this->request->getPost('satuan');
            $harga = $this->request->getPost('harga');
            $nama = $this->request->getPost('nama');


            $data = [
                'kategori_id' => $kategori,
                'satuan_id' => $satuan,
                'harga_barang' => $harga,
                'nama_barang' => $nama,
                'barcode_barang' => $barcode,

            ];

            $update = $this->barangmodel->editbarang($id, $data);
            if ($update) {
                session()->setFlashdata('berhasil', 'Data barang Berhasil diperbarui');
                return redirect()->to('/Barang');
            }
        }
    }
    public function barcode($kode)
    {
      
        $data = [
          
            'judul' => 'barcode barang',
            'kode' => $kode
        ];
        return view('master/barcode', $data);
    }

    public function laporanstok(){

        $barang = $this->barangmodel->getbarang();

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
    
        $pdf->SetFont('Arial','B',16);
    
        $pdf->Cell(190,7,'TOKO ADITFANS',0,1,'C');
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(190,7,' Jl. Tanjung No.47, RT.002/RW.013, Kunciran Indah',0,1,'C');
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(190,7,' Kec. Pinang, Kota Tangerang, Banten 15144',0,1,'C');
        $pdf->Cell(190,7,'Telp : 081296456033',0,1,'C');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(190,7,'---------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,1,'C');
        $timezone = time() + (60 * 60 * 7);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
    $pdf->Cell(85,7,'Waktu Cetak : '.gmdate('d-m-Y / H:i:s a', $timezone),0,0);
    $pdf->Cell(85,7,'LAPORAN STOK BARANG ',0,1,'R');
    $pdf->Cell(80,7,'Dicetak Oleh: '.session()->get('nama_pengguna'),0,1);
    
    $pdf->Cell(7,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,7,'NO',1,0,'C');
        $pdf->Cell(50,7,'BARCODE',1,0,'C');
        $pdf->Cell(30,7,'KATEGORI',1,0,'C');
        $pdf->Cell(40,7,'NAMA',1,0,'C');
        $pdf->Cell(20,7,'STOK',1,0,'C');
        $pdf->Cell(30,7,'SATUAN',1,1,'C');
    
       
        $no=1;
        foreach ($barang as $i) :
            if ($i['stok_barang'] === null) {
               $s ="Belum diisi";
            } else if ($i['stok_barang'] == 0) {
                $s= "Habis";
            } else {
                $s= $i['stok_barang'];
            }

            $pdf->Cell(20,7, $no++,1,0,'C');
            $pdf->Cell(50,7, $i['barcode_barang'],1,0,'C');
            $pdf->Cell(30,7,$i['nama_kategori'],1,0,'C');
            $pdf->Cell(40,7,$i['nama_barang'],1,0,'C');
            $pdf->Cell(20,7,$s,1,0,'C');
            $pdf->Cell(30,7,$i['nama_satuan'],1,1,'C');
           
        endforeach;
     
        $pdf->Output();
      

       
    }

    public function cetakbarcode(){
        $barang = $this->barangmodel->getbarang();

       

        $data = [
            'barang'=> $barang,
            'judul'=> 'BARCODE BARANG'

        ];

        return view('laporan/barcode_barang',$data);

    }
}