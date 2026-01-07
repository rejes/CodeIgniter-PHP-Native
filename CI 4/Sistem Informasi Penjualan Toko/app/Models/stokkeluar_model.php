<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class stokkeluar_model extends Model

{
    protected $table      = 'stok_keluar';
    protected $primaryKey = 'id_stokkeluar';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // allowedfields adalah fild mana saja yg boleh diisi secara manual
    protected $allowedFields = ['id_stokkeluar', 'barang_id',  'keterangan_stokkeluar', 'tanggal_stokkeluar', 'jumlah_stokkeluar'];

    protected $useTimestamps = false;


    public function getstokkeluar($awal = null , $akhir =null)
    {

        $this->db->table('stok_keluar');
       
      
        $this->join('barang', 'barang.id_barang = stok_keluar.barang_id');
        $this->select('stok_keluar.*');
        $this->select('barang.nama_barang');
        if($awal && $akhir){
            $this->where('tanggal_stokkeluar >=', $awal);
            $this->where('tanggal_stokkeluar <=', $akhir);
        }
       
        return  $this->findall();
    }
}