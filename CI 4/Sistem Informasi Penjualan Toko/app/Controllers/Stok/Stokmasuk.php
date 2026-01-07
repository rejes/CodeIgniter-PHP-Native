<?php

namespace App\Controllers\Stok;

use Config\Validation;
use App\Controllers\BaseController;
use App\Models\barang_model;
use App\Models\Kategori_model;
use App\Models\Satuan_model;
use App\Models\Supplier_model;
use App\Models\stokmasuk_model;
use App\ThirdParty\FPDF;


class stokmasuk extends BaseController
{

    public function index()

    {

      
        $stokmasukmodel = new stokmasuk_model();
        $stokmasuk = $stokmasukmodel->getstokmasuk();





        $data = [
            'stokmasuk' => $stokmasuk,
            'judul' => 'Stok Produk',
            'validation' => \Config\Services::validation()
        ];

        return view('stok/stokmasuk', $data);
    }


    public function formtambahstok()
    {
        $barangmodel = new barang_model();
        $barang = $barangmodel->getbarang();
        $suppliermodel = new Supplier_model();
        $supplier = $suppliermodel->getsupplier();

        $data = [
            'barang' => $barang,
            'judul' => 'Stok Produk',
            'supplier' => $supplier,
            'validation' => \Config\Services::validation()
        ];

        return view('stok/tambahstok', $data);
    }

    public function tambahstok()
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
            'supplier' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'supplier harus diisi',

                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'supplier harus diisi',

                ]
            ],
        ])) {
            return redirect()->to('/stokmasuk/tambahstok')->withInput();
        } else {
            $barangmodel = new barang_model();
            $inputbarcode = $this->request->getPost('barcode_barang');
            $barang = $barangmodel->where('barcode_barang', $inputbarcode)->findall();
            if ($barang) {
               
                $jumlah = $this->request->getPost('jumlah');
                $supplier_id = $this->request->getPost('supplier');
                $keterangan = $this->request->getPost('keterangan');
                $tanggal = $this->request->getPost('tanggal');
                $id_barang = $this->request->getPost('barang_id');
             
               


                $barang = $barangmodel->where('id_barang',$id_barang)->find();
               
                $stokbarang = $barang[0]['stok_barang'];
                $tambahbarang = $jumlah + $stokbarang;
                $data = [
                    'stok_barang' => $tambahbarang
                ];

                $updatestok = $barangmodel->updatestok($id_barang, $data);
                if ($updatestok) {
                    $data = [
                        'keterangan_stokmasuk' => $keterangan,
                        'jumlah_stokmasuk' => $jumlah,
                        'supplier_id' => $supplier_id,
                        'barang_id' => $id_barang,
                        'tanggal_stokmasuk' => $tanggal,
                    ];
                    $stokmasuk = new stokmasuk_model();
                    $save = $stokmasuk->save($data);
                    if ($save) {
                        session()->setFlashdata('berhasil', 'Stok berhasil di tambahkan');
                        return redirect()->to('/Stokmasuk');
                    }
                }
            } else {
                session()->setFlashdata('barcode_gagal', 'Barcode tidak ditemukan');
                return redirect()->to('/stokmasuk/tambahstok');
            }
        }
    }

    public function batalstokmasuk()
    {


        $id_barang = $this->request->getPost('id_barang_batal');
        $id_stokmasuk = $this->request->getPost('id_stokmasuk_batal');
        $jumlah = $this->request->getPost('jumlah_batal');

      

        $barangmodel = new barang_model();
        $barang = $barangmodel->where('id_barang', $id_barang)->find();
        $stokbarang = $barang[0]['stok_barang'];
        $kurangbarang = $stokbarang - $jumlah;
        $data = [
            'stok_barang' => $kurangbarang
        ];

        $updatestok = $barangmodel->updatestok($id_barang, $data);
        if ($updatestok) {
            $stokmasuk = new stokmasuk_model();

            $hapus = $stokmasuk->delete($id_stokmasuk);
            if ($hapus) {
                session()->setFlashdata('berhasil', 'Stok masuk berhasil dibatalkan');
                return redirect()->to('/Stokmasuk');
            }
        }
    }
    public function hapusstokmasuk()
    {
 
        $id_stokmasuk = $this->request->getPost('id_stokmasuk_hapus');
       
            $stokmasuk = new stokmasuk_model();

            $hapus = $stokmasuk->delete($id_stokmasuk);
            if ($hapus) {
                session()->setFlashdata('berhasil', 'Stok Masuk berhasil dihapus');
                return redirect()->to('/Stokmasuk');
            }
        }
    


    public function laporanstokmasuk(){

        $awal = $this->request->getPost('tanggalmulai');
        $akhir = $this->request->getPost('tanggalakhir');
        if($awal != null && $akhir != null){
           $modelstokmasuk = new stokmasuk_model();
        $stokmasuk = $modelstokmasuk->getstokmasuk($awal ,$akhir);

        if($stokmasuk){
 
    
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
$pdf->Cell(85,7,'LAPORAN  BARANG MASUK',0,1,'R');
$pdf->Cell(80,7,'Periode: '.$awal.' s/d '.$akhir ,0,1);
$pdf->Cell(80,7,'Dicektak Oleh: '.session()->get('nama_pengguna'),0,1);

$pdf->Cell(7,7,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,7,'NO',1,0,'C');
    $pdf->Cell(40,7,'TANGGAL',1,0,'C');
    $pdf->Cell(50,7,'SUPPLIER',1,0,'C');
    $pdf->Cell(50,7,'ITEM',1,0,'C');
    $pdf->Cell(30,7,'JUMLAH',1,1,'C');

   
    $no=1;
    foreach ($stokmasuk as $n) :
        $pdf->Cell(20,7, $no++,1,0,'C');
        $pdf->Cell(40,7,$n['tanggal_stokmasuk'],1,0,'C');
        $pdf->Cell(50,7, $n['nama_supplier'],1,0,'C');
        $pdf->Cell(50,7,$n['nama_barang'],1,0,'C');
        $pdf->Cell(30,7,$n['jumlah_stokmasuk'],1,1,'C');
       
    endforeach;
 
    $pdf->Output();
}else{
    session()->setFlashdata('gagal', 'Data laporan stok barang masuk pada periode '.$awal.' sampai '.$akhir.' tidak tersedia');
    return redirect()->to('/Stokmasuk');
}

        }else{
            session()->setFlashdata('gagal', 'Silahkan untuk mengisi tanggal periode laporan terlebih dahulu');
            return redirect()->to('/Stokmasuk');

        }
    }
}