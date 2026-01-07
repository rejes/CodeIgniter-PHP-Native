<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class keranjang_model extends Model

{
    protected $table      = 'keranjang';
    protected $primaryKey = 'id_keranjang';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // allowedfields adalah fild mana saja yg boleh diisi secara manual
    protected $allowedFields = ['penjualan_id', 'barang_id', 'qty','harga_jual'];

    protected $useTimestamps = false;


    public function getkeranjang($no_penjualan= null)
    {
        $this->db->table('keranjang');
        $this->join('barang', 'barang.id_barang = keranjang.barang_id');
        $this->select('keranjang.*');
        $this->select('barang.*');
        if($no_penjualan){
            $this->where('penjualan_id', $no_penjualan);
        }
        return  $this->findAll();
    }
    public function cekbarcode($id_barang, $sess_nopenjualan)
    {
        $this->db->table('keranjang');
        $this->where('barang_id', $id_barang);
        $this->where('penjualan_id', $sess_nopenjualan);
        return $this->find();
    }
    public function updateqty($id_keranjang, $tambahqty)
    {


        $query = $this->set('qty', $tambahqty);
        $query = $this->where('id_keranjang', $id_keranjang);
        $query = $this->update();
        return $query;
    }

    public function getkeranjangbyid($id_keranjang)
    {
        $this->db->table('keranjang');
        $this->join('barang', 'barang.id_barang = keranjang.barang_id');
        $this->select('keranjang.*');
        $this->select('barang.*');
        $this->where('id_keranjang', $id_keranjang);
        return  $this->findAll();
    }


   
}