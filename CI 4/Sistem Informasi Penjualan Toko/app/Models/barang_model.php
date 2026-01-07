<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class barang_model extends Model

{
    protected $table      = 'barang';
    protected $primaryKey = 'id_barang';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // allowedfields adalah fild mana saja yg boleh diisi secara manual
    protected $allowedFields = ['nama_barang', 'barcode_barang', 'kategori_id', 'satuan_id', 'harga_barang', 'stok_barang'];

    protected $useTimestamps = false;


    public function getbarang($id = null)
    {
        $this->db->table('barang');
        $this->join('kategori', 'kategori.id_kategori = barang.kategori_id');
        $this->join('satuan', 'satuan.id_satuan = barang.satuan_id');
        $this->select('barang.*');
        $this->select('kategori.nama_kategori');
        $this->select('satuan.nama_satuan');
        if ($id != null) {
            return $this->where(['id_barang' => $id])->findall();
        } else {
            return $this->findAll();
        }
    }

    public function editbarang($id, $data)

    {
        return $this->db->table($this->table)->update($data, ['id_barang' => $id]);
    }

    public function updatestok($id, $data)

    {
        return $this->db->table($this->table)->update($data, ['id_barang' => $id]);
    }
    public function getbarang_barcode($barcode)
    {
        $this->db->table('barang');
        $this->select('*');
        $this->where('barcode_barang', $barcode);
        return  $this->findall();
    }


    public function penjualan_barang($bulan,$tahun){
        $query = $this->db->query("SELECT  barang.nama_barang,YEAR(penjualan.tanggal_penjualan) ,SUM(keranjang.qty)
         as jumlah_beli  FROM keranjang INNER JOIN penjualan ON penjualan.id_penjualan = keranjang.penjualan_id INNER JOIN barang ON keranjang.barang_id = barang.id_barang
        WHERE MONTH(penjualan.tanggal_penjualan)='$bulan' AND YEAR(penjualan.tanggal_penjualan)='$tahun'   GROUP BY barang.nama_barang");
        return $query->getResultArray();
    }
}