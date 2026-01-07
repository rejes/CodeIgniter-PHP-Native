<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class Supplier_model extends Model

{
    protected $table      = 'supplier';
    protected $primaryKey = 'id_supplier';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // allowedfields adalah fild mana saja yg boleh diisi secara manual
    protected $allowedFields = ['nama_supplier', 'no_telepon_supplier', 'alamat_supplier', 'keterangan_supplier'];
    protected $useTimestamps = false;


    public function getsupplier($id = null)
    {
        if ($id != null) {
            return $this->where(['id_supplier' => $id])->first();
        } else {
            return $this->findAll();
        }
    }

    public function editsupplier($id_supplier, $data)

    {
        return $this->db->table($this->table)->update($data, ['id_supplier' => $id_supplier]);
    }
}