<?php

namespace App\Controllers\Inti;

use App\Controllers\BaseController;
use App\Controllers\Pengaturan\Pengguna;
use App\Models\barang_model;
use App\Models\Supplier_model;
use App\Models\Pengguna_model;
use App\Models\keranjang_model;
use App\Models\penjualan_model;
use CodeIgniter\HTTP\Response;
use App\ThirdParty\FPDF;

class Transaksi extends BaseController
{




    public function index()
    {
        $session = session();
        $model_penjualan = new penjualan_model();
        $penjualan = $model_penjualan->get_id_penjualan();
        $no_penjualan = $penjualan->id_penjualan;
     


        if ($no_penjualan) {

            // $urutkeranjang = substr($nokeranjang_db, 3);
            // $tambahurutan = (int)$urutkeranjang + 1;
            // dd($tambahurutan);
            $data = [
                'no_penjualan' => $no_penjualan + 1
            ];
            $session->set($data);
        } else {
            $data = [
                'no_penjualan' => 1
            ];
            $session->set($data);
        }

        


    
        $id = session()->get('id');
        $modelpengguna = new Pengguna_model();
        $pengguna = $modelpengguna->getpengguna($id);
        $barangmodel = new barang_model();
        $barang = $barangmodel->getbarang();
        $data = [
            'barang' => $barang,
            'pengguna' => $pengguna,
        

        ];



        return view('inti/transaksi', $data);
    }

    public function getitem()
    {
        $session = session();

        if ($this->request->isAJAX()) {
            $barcode = $this->request->getPost('barcode');
            $qtyinput = $this->request->getPost('qty');
            $barangmodel = new barang_model();

            $data = $barangmodel->getbarang_barcode($barcode);
            if ($data) {
                // if ($session->get('no_keranjang')) {
                //     $no_keranjang1 =  $session->get('no_keranjang');
                // } else {
                //     $no_keranjang1 = 1;
                // }
                $no_penjualan = $session->get('no_penjualan');
                $id_barang = $data[0]['id_barang'];
                $harga_jual = $data[0]['harga_barang'];
                $modelkeranjang = new keranjang_model();
                // 
                $cek = $modelkeranjang->cekbarcode($id_barang, $no_penjualan);
                // 
                if ($cek) {
                    $qty = $cek[0]['qty'];
                    $id_keranjang = $cek[0]['id_keranjang'];
                    $nopenjualan = $cek[0]['penjualan_id'];

                    if ($qtyinput) {
                        $tambahqty = $qty + $qtyinput;
                    } else {
                        $qtyinput = 1;
                        $tambahqty = $qty + $qtyinput;
                    }



                    $stokbarang = $data[0]['stok_barang'];
                    if ($stokbarang < $qtyinput) {

                        $data = [
                            'stoktidakcukup' => 'stok kurang'
                        ];
                        return $this->response->setJSON($data);
                    } else {

                        $stokkurang = $stokbarang - $qtyinput;

                        $data = [
                            'stok_barang' => $stokkurang
                        ];

                        $updatestok = $barangmodel->updatestok($id_barang, $data);
                        if ($updatestok) {
                            $update = $modelkeranjang->updateqty($id_keranjang, $tambahqty);
                            if ($update) {
                                $data = [
                                    'update' => $tambahqty,
                                    'no_penjualan_update' => $nopenjualan,
                                    'qtyinput' => $qtyinput,
                                    'harga_jual'=> $harga_jual,
                                   
                                ];
                                return $this->response->setJSON($data);
                            }
                        }
                    }
                } else {



                    $no_penjualan = $session->get('no_penjualan');
                 
                    if ($qtyinput) {
                        $qtyinput;
                    } else {
                        $qtyinput = 1;
                    }
                
                    $stokbarang = $data[0]['stok_barang'];
                    if ($stokbarang < $qtyinput) {

                        $data = [
                            'stoktidakcukup' => 'Stok Barang yang dipilih sedang tidak tersedia'
                        ];
                        return $this->response->setJSON($data);
                    } else {

                        $stokkurang = $stokbarang - $qtyinput;
                        $data = [
                            'stok_barang' => $stokkurang
                        ];
                        $updatestok = $barangmodel->updatestok($id_barang, $data);
                        if ($updatestok) {

                            $datakeranjang = [
                                'penjualan_id' => $no_penjualan,
                                'barang_id' => $id_barang,
                                'qty' => $qtyinput,
                                'harga_jual' => $harga_jual,
                            ];

                            $save = $modelkeranjang->save($datakeranjang);
                            if ($save) {
                               

                                $data = [

                                    'no_penjualan' => $no_penjualan,
                                    'inputqty' => $qtyinput
                                ];
                              
                                return $this->response->setJSON($data);
                            }
                        }
                    }
                }
            } else {
                $data = [
                    'error' => "barcode tidak ditemukan"
                ];
                return $this->response->setJSON($data);
            }
        }
    }

    public function getkeranjang()
    {

        if ($this->request->isAJAX()) {
            $no_penjualan = $this->request->getpost('no_keranjang');
            $modelkeranjang = new keranjang_model();
            $keranjang = $modelkeranjang->getkeranjang($no_penjualan);

            $data = [
                'keranjang' => $keranjang,

            ];
            return $this->response->setJSON($data);
        }
    }

    public function hapuskeranjang()
    {

        if ($this->request->isAJAX()) {

            $id_keranjang = $this->request->getPost('id_keranjang');
            $model_keranjang =  new keranjang_model();
            $keranjang = $model_keranjang->getkeranjangbyid($id_keranjang);
            $no_keranjang = $keranjang[0]['penjualan_id'];
            $barang_id = $keranjang[0]['barang_id'];
            $modelbarang = new barang_model();
            $barang = $modelbarang->getbarang($barang_id);
            $stokbarang = $barang[0]['stok_barang'];
            $qty = $keranjang[0]['qty'];

            $stoktambah = $stokbarang + $qty;

            $data = [
                'stok_barang' => $stoktambah
            ];
            $updatebarang = $modelbarang->updatestok($barang_id, $data);
            if ($updatebarang) {
                $hapus = $model_keranjang->delete($id_keranjang);
                if ($hapus) {
                    $data = [
                        'berhasil' => ' data berhasiil dibatalkan',
                        'no_keranjang_hapus' => $no_keranjang

                    ];
                    return $this->response->setJSON($data);
                }
            }
        }
    }


    public function minusqty()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getPost('id_keranjang');
            $barang_id = $this->request->getPost('barang_id');


            $modelkeranjang = new keranjang_model();
            $keranjang = $modelkeranjang->getkeranjangbyid($id);
            $nopenjualan = $keranjang[0]['penjualan_id'];
            $qtykeranjang = $keranjang[0]['qty'];
            if($qtykeranjang == 1){
                $data = [
                    'no_penjualan' => $nopenjualan
                ];
                return $this->response->setJSON($data);

            }else{
            $qtyminus = $qtykeranjang - 1;
            $updatekeranajng = $modelkeranjang->updateqty($id, $qtyminus);
            if ($updatekeranajng) {
                $barangmodel = new barang_model();
                $barang = $barangmodel->getbarang($barang_id);
                $qtybarang = $barang[0]['stok_barang'];
                $qtyitetambah = $qtybarang + 1;

                $data = [
                    'stok_barang' => $qtyitetambah
                ];
                $updatebarang = $barangmodel->updatestok($barang_id, $data);

                if ($updatebarang) {
                    $data = [
                        'no_penjualan' => $nopenjualan
                    ];
                    return $this->response->setJSON($data);
                }
            }
        }
        }
    }
    public function plusqty()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getPost('id_keranjang');
            $barang_id = $this->request->getPost('barang_id');


            $modelkeranjang = new keranjang_model();
            $keranjang = $modelkeranjang->getkeranjangbyid($id);
            $nokeranjang = $keranjang[0]['penjualan_id'];
            $qtykeranjang = $keranjang[0]['qty'];
            $modelbarang = new barang_model();
            $barang = $modelbarang->getbarang($barang_id);
            $qtybarang = $barang[0]['stok_barang'];

            if($qtybarang == 0){
                $data = [
                    'no_keranjang' => $nokeranjang
                ];
                return $this->response->setJSON($data);
            }else{

            $qtytambah = $qtykeranjang + 1;
            $updatekeranajng = $modelkeranjang->updateqty($id, $qtytambah);
            if ($updatekeranajng) {
               
                $qtyitekurang = $qtybarang - 1;

                $data = [
                    'stok_barang' => $qtyitekurang
                ];
                $updatebarang = $modelbarang->updatestok($barang_id, $data);

                if ($updatebarang) {
                    $data = [
                        'no_keranjang' => $nokeranjang,
                       
                    ];
                    return $this->response->setJSON($data);
                }
            }
        }
        }
    }

    public function penjualan()
    {
        $session = session();
      
        $nopenjualan = $session->get('no_penjualan');
      
      

        $kasir = session()->get('id');
        $timezone = time() + (60 * 60 * 7);
        $tanggal =   gmdate('y-m-d', $timezone);


        $data = [
            'pengguna_id' => $kasir,
            'tanggal_penjualan' => $tanggal,
            'id_penjualan' => $nopenjualan
        ];

        $penjualan_model = new penjualan_model();
        $save = $penjualan_model->save($data);
        if ($save) {
            return redirect()->to('/transaksi');
        }
    }

    public function nota_penjualan()
    {

        if ($this->request->isAJAX()) {
           
            $no_penjualan = $this->request->getPost('no_penjualan');
            $keranjangmodel = new keranjang_model();
            $keranjang = $keranjangmodel->getkeranjang($no_penjualan);

            $data = [
        
                'keranjang' => $keranjang,
    
            ];
            return $this->response->setJSON($data);
        }
    }

    public function no_penjualan()
    {
        if ($this->request->isAJAX()) {
            $no_penjualan = session()->get('no_penjualan');
            $data = [
                'no_penjualan' => $no_penjualan
            ];
            return $this->response->setJSON($data);
        }
    }


    public function totaltagihan(){

        $no_penjualan = session()->get('no_penjualan');
        $modelkeranjang = new keranjang_model();
        $keranjang = $modelkeranjang->getkeranjang($no_penjualan);
        $grandtotal = 0;
        foreach($keranjang as $k){
        $total = $k['qty'] * $k['harga_barang'];

        $grandtotal = $grandtotal + $total;
            
        }
        $data = [
            'grandtotal' => $grandtotal
        ];
        return $this->response->setJSON($data);
        


    }

    public function cetak_notapenjualan()
    {

        $session = session();
        $no_penjualan = $session->get('no_penjualan');
      
        
      
      
      
       

        $keranjangmodel = new keranjang_model();
        $keranjang = $keranjangmodel->getkeranjang($no_penjualan);

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
    
        $pdf->SetFont('Arial','B',16);

        $pdf->Cell(190,7,'TOKO ADITFANS',0,1,'C');
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(190,7,' Jl. Tanjung No.47, RT.002/RW.013, Kunciran Indah',0,1,'C');
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(190,7,' Kec. Pinang, Kota Tangerang, Banten 15144',0,1,'C');
        $pdf->Cell(190,7,'Telp  081296456033',0,1,'C');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(190,7,'---------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,1,'C');
        $timezone = time() + (60 * 60 * 7);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
  $pdf->Cell(85,7,'Kode Nota : NP-'.session()->get('no_penjualan'),0,0);
  $pdf->Cell(85,7,'NOTA PENJUALAN',0,1,'R');
  $pdf->Cell(80,7,'Waktu: '.gmdate('d-m-Y / H:i:s a', $timezone) ,0,1);
  $pdf->Cell(80,7,'KASIR: '.session()->get('nama_pengguna'),0,1);

  $pdf->Cell(7,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(60,7,'NAMA ITEM',1,0,'C');
        $pdf->Cell(60,7,'HARGA SATUAN',1,0,'C');
        $pdf->Cell(30,7,'QTY',1,0,'C');
        $pdf->Cell(40,7,'TOTAL HARGA',1,1,'C');

        $grandtotal = 0;
        foreach ($keranjang as $k) :
            $pdf->Cell(60,7, $k['nama_barang'],1,0,'C');
            $pdf->Cell(60,7,'Rp.'.format_rupiah($k['harga_barang']),1,0,'C');
            $pdf->Cell(30,7, $k['qty'],1,0,'C');
            $pdf->Cell(40,7,'Rp.'.format_rupiah($k['qty'] * $k['harga_barang']),1,1,'C');
            $grandtotal = $grandtotal + ($k['qty'] * $k['harga_barang']);
           
        endforeach;
        $pdf->Cell(190,7, 'Grandtotal : Rp.'.format_rupiah($grandtotal),1,0,'R');
        $pdf->Output();




  
    }
}