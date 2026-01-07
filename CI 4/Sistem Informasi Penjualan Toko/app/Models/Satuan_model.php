<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class Satuan_model extends Model

{
    protected $table      = 'satuan';
    protected $primaryKey = 'id_satuan';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // allowedfields adalah fild mana saja yg boleh diisi secara manual
    protected $allowedFields = ['nama_satuan'];

    protected $useTimestamps = false;


    public function getsatuan($id = null)
    {
        if ($id != null) {
            return $this->where(['id_satuan' => $id])->first();
        } else {
            return $this->findAll();
        }
    }
    public function updatesatuan($id, $nama)
    {
        $query = $this->set('nama_satuan', $nama);
        $query = $this->where('id_satuan', $id);
        $query = $this->update();
        return $query;
    }
    public function pencarian($keyword)
    {
        $builder = $this->table('satuan');
        $builder->like('nama_satuan', $keyword);
        return $builder->findall();
    }
}