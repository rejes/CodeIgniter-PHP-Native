<?php

namespace App\Controllers\Laporan;

use Config\Validation;
use App\Controllers\BaseController;
use App\Models\keranjang_model;
use App\Models\penjualan_model;
use App\ThirdParty\FPDF;

class Penjualan extends BaseController
{


    public function index()
    {

        $penjualanmodel = new penjualan_model();

        $penjualan = $penjualanmodel->getpenjualan();
       
       
     
        $data = [
            'penjualan' => $penjualan
        ];

        return view('laporan/penjualan', $data);
    }

    public function getkeranjang(){

        $id = $this->request->getPost('id_penjualan');

        $modelkeranjang = new keranjang_model();
        $keranjang = $modelkeranjang->getkeranjang($id);
            $data = [
                'keranjang' => $keranjang
            ];
                    return $this->response->setJSON($data);
     }


     public function laporanpenjualan(){
        $awal = $this->request->getPost('tanggalmulai');
        $akhir = $this->request->getPost('tanggalakhir');
        if($awal != null && $akhir != null){
           $modelpenjualan = new penjualan_model();
        $penjualan = $modelpenjualan->laporan_penjualan($awal,$akhir);
   
   

    if($penjualan){
 
    
        $pdf = new FPDF('l','mm','A4');
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
    $pdf->Cell(85,7,'LAPORAN PENJUALAN',0,1,'R');
    $pdf->Cell(80,7,'Periode: '.$awal.' s/d '.$akhir ,0,1);
    $pdf->Cell(80,7,'Dicektak Oleh: '.session()->get('nama_pengguna'),0,1);
    
    $pdf->Cell(7,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,7,'NO',1,0,'C');
        $pdf->Cell(30,7,'TANGGAL',1,0,'C');
        $pdf->Cell(40,7,'ITEM',1,0,'C');
        $pdf->Cell(40,7,'HARGA',1,0,'C');
        $pdf->Cell(20,7,'JUMLAH',1,0,'C');
        $pdf->Cell(40,7,'HARGA TOTAL',1,1,'C');
    
       
        $no=1;
        $grandtotal = 0;
        foreach ($penjualan as $p) :
            $grandtotal = $grandtotal + ($p['jumlah'] * $p['harga_barang']);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,7,$no++,1,0,'C');
            $pdf->Cell(30,7,$p['tanggal_penjualan'],1,0,'C');
            $pdf->Cell(40,7, $p['nama_barang'],1,0,'C');
            $pdf->Cell(40,7,$p['harga_barang'],1,0,'C');
            $pdf->Cell(20,7,$p['jumlah'],1,0,'C');
            $pdf->Cell(40,7,'Rp.'.format_rupiah($p['total_harga']),1,1,'C');
        endforeach;
        $pdf->Cell(190,7,'Total Pendapatan : Rp.'.format_rupiah($grandtotal),1,0,'R');
     
        $pdf->Output();
    }else{
        session()->setFlashdata('gagal', 'Data laporan penjualan pada periode '.$awal.' sampai '.$akhir.' tidak tersedia');
        return redirect()->to('/Penjualan');
    }

        }else{
            session()->setFlashdata('gagal', 'Silahkan untuk mengisi tanggal periode terlebih dahulu');
    
            return redirect()->to('/Penjualan');
     }
    }
}