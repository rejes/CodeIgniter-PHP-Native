<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class stokmasuk_model extends Model

{
    protected $table      = 'stok_masuk';
    protected $primaryKey = 'id_stokmasuk';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // allowedfields adalah fild mana saja yg boleh diisi secara manual
    protected $allowedFields = ['id_stokmasuk', 'barang_id', 'supplier_id', 'keterangan_stokmasuk', 'tanggal_stokmasuk', 'jumlah_stokmasuk'];

    protected $useTimestamps = false;


    public function getstokmasuk($awal = null ,$akhir = null)
    {

        $this->db->table('stok_masuk');
       
        $this->join('supplier', 'supplier.id_supplier = stok_masuk.supplier_id');
        $this->join('barang', 'barang.id_barang = stok_masuk.barang_id');
        $this->select('stok_masuk.*');
        $this->select('barang.nama_barang');
        $this->select('supplier.nama_supplier');
        if($awal && $akhir){
            $this->where('tanggal_stokmasuk >=', $awal);
            $this->where('tanggal_stokmasuk <=', $akhir);
        }
        return  $this->findall();
    }
}