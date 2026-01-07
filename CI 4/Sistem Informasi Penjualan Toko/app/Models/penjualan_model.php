<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class penjualan_model extends Model

{
    protected $table      = 'penjualan';
    //  protected $primaryKey = 'id_penjualan';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // allowedfields adalah fild mana saja yg boleh diisi secara manual
    protected $allowedFields = ['id_penjualan', 'pengguna_id','tanggal_penjualan'];
    protected $useTimestamps = false;

    public function get_id_penjualan()
    {
        $query = $this->db->query("SELECT MAX(id_penjualan) as id_penjualan from penjualan");
        return $query->getRow();
    }

    public function getpenjualan()
    {

        $this->db->table('penjualan');
        $this->join('pengguna', 'pengguna.id_pengguna = penjualan.pengguna_id'); 
        $this->select('penjualan.*');
        $this->select('pengguna.nama_pengguna');
      
    

        return $this->findAll();
    }

    public function laporan_penjualan($awal = null ,$akhir = null){
        $query = $this->db->query("SELECT penjualan.tanggal_penjualan, barang.nama_barang,barang.harga_barang  ,SUM(keranjang.qty) as jumlah ,(SUM(keranjang.qty) * barang.harga_barang) AS total_harga FROM keranjang INNER JOIN penjualan ON keranjang.penjualan_id = penjualan.id_penjualan INNER JOIN barang ON keranjang.barang_id = barang.id_barang
        WHERE penjualan.tanggal_penjualan >='$awal' AND penjualan.tanggal_penjualan <='$akhir' GROUP BY keranjang.barang_id ");
        // if($awal && $akhir){
        //     $this->where('penjualan.tanggal_penjuala >=', $awal);
        //     $this->where('penjualan.tanggal_penjuala <=', $akhir);
        // }
        return $query->getResultArray();
    }
}