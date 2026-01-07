<?php

namespace App\Controllers\Stok;

use Config\Validation;
use App\Controllers\BaseController;
use App\Models\barang_model;
use App\Models\Item_model;
use App\Models\Kategori_model;
use App\Models\Satuan_model;
use App\Models\Supplier_model;
use App\Models\stokkeluar_model;
use App\ThirdParty\FPDF;


class stokkeluar extends BaseController
{

    public function index()

    {
        $stokkeluarmodel = new stokkeluar_model();
        $stokkeluar = $stokkeluarmodel->getstokkeluar();





        $data = [
            'stokkeluar' => $stokkeluar,
            'judul' => 'Stok Produk',
            'validation' => \Config\Services::validation()
        ];

        return view('stok/stokkeluar', $data);
    }


    public function formkurangstok()
    {
        $barangmodel = new barang_model();
        $barang = $barangmodel->getbarang();
    
        $data = [
            'barang' => $barang,
            'judul' => 'Stok Produk',
            'validation' => \Config\Services::validation()
        ];

        return view('stok/kurangstok', $data);
    }

    public function kurangstok()
    {

        if (!$this->validate([
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jumlah stok harus diisi '
                ]
            ],

            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal stok harus diisi'
                ]
            ],
            'barcode_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'barcode stok harus diisi',

                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'keterangan harus diisi',

                ]
            ]
        ])) {
            return redirect()->to('/stokkeluar/kurangstok')->withInput();
        } else {
            $barangmodel = new barang_model();
            $inputbarcode = $this->request->getPost('barcode_barang');
            $barang = $barangmodel->where('barcode_barang', $inputbarcode)->find();
            if ($barang) {
              
                $jumlah = $this->request->getPost('jumlah');
                 $stokbarang = $barang[0]['stok_barang'];
               if ($jumlah > $stokbarang){
                session()->setFlashdata('gagal', 'jumlah stok yang  ingin dikeluarkan melebihi stok item yang tersedia');
                return redirect()->to('/stokkeluar/kurangstok')->withInput();
               }else{
                   
               
                $keterangan = $this->request->getPost('keterangan');
                $tanggal = $this->request->getPost('tanggal');
                $id_barang = $this->request->getPost('barang_id');
             


                $barang = $barangmodel->where('id_barang', $id_barang)->find();
                $stokbarang = $barang[0]['stok_barang'];
                $kurangbarang = $stokbarang -  $jumlah;
                $data = [
                    'stok_barang' => $kurangbarang
                ];

                $updatestok = $barangmodel->updatestok($id_barang, $data);
                if ($updatestok) {
                    $data = [
                        'keterangan_stokkeluar' => $keterangan,
                        'jumlah_stokkeluar' => $jumlah,
                        'barang_id' => $id_barang,
                        'tanggal_stokkeluar' => $tanggal,
                    ];
                    $stokkeluar = new stokkeluar_model();
                    $save = $stokkeluar->save($data);
                    if ($save) {
                        session()->setFlashdata('berhasil', 'Stok berhasil dikurangkan');
                        return redirect()->to('/Stokkeluar');
                    }
                }
            }
            } else {
                session()->setFlashdata('barcode_gagal', 'Barcode tidak ditemukan');
                return redirect()->to('/stokkeluar/stokkeluar');
            }
        }
    }

    public function batalstokkeluar()
    {


        $id_barang = $this->request->getPost('id_barang_batal');
        $id_stokkeluar = $this->request->getPost('id_stokkeluar_batal');
        $jumlah = $this->request->getPost('jumlah_batal');

        $barangmodel = new barang_model();
        $barang = $barangmodel->where('id_barang', $id_barang)->find();
        $stokbarang = $barang[0]['stok_barang'];
        $kurangbarang = $stokbarang + $jumlah;
        $data = [
            'stok_barang' => $kurangbarang
        ];

        $updatestok = $barangmodel->updatestok($id_barang, $data);
        if ($updatestok) {
            $stokkeluar = new stokkeluar_model();

            $hapus = $stokkeluar->delete($id_stokkeluar);
            if ($hapus) {
                session()->setFlashdata('berhasil', 'Stok keluar berhasil dibatalkan');
                return redirect()->to('/Stokkeluar');
            }
        }
    }

    public function hapusstokkeluar()
    {


     
        $id_stokkeluar = $this->request->getPost('id_stokkeluar_hapus'); 
            $stokkeluar = new stokkeluar_model();

            $hapus = $stokkeluar->delete($id_stokkeluar);
            if ($hapus) {
                session()->setFlashdata('berhasil', 'Stok keluar berhasil dihapus');
                return redirect()->to('/Stokkeluar');
            }
        
    }

    public function laporanstokkeluar(){
        
        $awal = $this->request->getPost('tanggalmulai');
        $akhir = $this->request->getPost('tanggalakhir');
        if($awal != null && $akhir != null){
           $modelstokkeluar = new stokkeluar_model();
        $stokkeluar = $modelstokkeluar->getstokkeluar($awal,$akhir);
        if($stokkeluar){
            
        
        
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
    $pdf->Cell(85,7,'Waktu Cetak : NP-'.gmdate('d-m-Y / H:i:s a', $timezone),0,0);
    $pdf->Cell(85,7,'LAPORAN  BARANG RUSAK',0,1,'R');
    $pdf->Cell(80,7,'Periode: '.$awal.' s/d '.$akhir ,0,1);
    $pdf->Cell(80,7,'Dicektak Oleh: '.session()->get('nama_pengguna'),0,1);
    
    $pdf->Cell(7,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,7,'NO',1,0,'C');
        $pdf->Cell(50,7,'TANGGAL',1,0,'C');
        $pdf->Cell(60,7,'ITEM',1,0,'C');
        $pdf->Cell(50,7,'JUMLAH',1,1,'C');
    
       
        $no=1;
        foreach ($stokkeluar as $n) :
            $pdf->Cell(30,7, $no++,1,0,'C');
            $pdf->Cell(50,7,$n['tanggal_stokkeluar'],1,0,'C');
            $pdf->Cell(60,7,$n['nama_barang'],1,0,'C');
            $pdf->Cell(50,7,$n['jumlah_stokkeluar'],1,1,'C');
           
        endforeach;
     
        $pdf->Output();
    
    }else{
        session()->setFlashdata('gagal', 'Data laporan stok barang keluar pada periode '.$awal.' sampai '.$akhir.' tidak tersedia');
    return redirect()->to('/Stokkeluar');
    }
        }else{
            session()->setFlashdata('gagal', 'Silahkan untuk mengisi tanggal periode laporan terlebih dahulu');
            return redirect()->to('/Stokkeluar');

    }
}
}