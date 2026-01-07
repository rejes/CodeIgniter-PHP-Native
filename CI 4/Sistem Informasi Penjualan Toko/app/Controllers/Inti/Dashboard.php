<?php

namespace App\Controllers\Inti;

use App\Controllers\BaseController;
use App\Models\barang_model;
use App\Models\Supplier_model;
use App\Models\Pengguna_model;

class Dashboard extends BaseController
{

    public function index()
    {

        $modelbarang = new barang_model();
        $model_pengguna = new Pengguna_model();
        $supplier = new Supplier_model();
        $datakasir = $model_pengguna->getkasir();
        $barang = count($modelbarang->findAll());

        $timezone = time() + (60 * 60 * 7);
        $bulan = gmdate('m',$timezone);
      $tahun = gmdate('Y',$timezone);
     
       
      $barangjual = $modelbarang->penjualan_barang($bulan ,$tahun );
     
     
   
        $kasir = count($model_pengguna->getkasir());
        $supplier = count($supplier->findAll());


        $data = [
            'barang' => $barang,
            'datakasir'=> $datakasir,
            'kasir' => $kasir,
            'supplier' => $supplier,
            'barangjual'=>$barangjual

        ];
        return view('inti/dashboard', $data);
    }
}