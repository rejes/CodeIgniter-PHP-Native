<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class Kategori_model extends Model

{
    protected $table      = 'kategori';
    protected $primaryKey = 'id_kategori';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // allowedfields adalah fild mana saja yg boleh diisi secara manual
    protected $allowedFields = ['nama_kategori'];

    protected $useTimestamps = false;


    public function getkategori($id = null)
    {
        if ($id != null) {
            return $this->where(['id_kategori' => $id])->first();
        } else {
            return $this->findAll();
        }
    }
    public function updatekategori($id, $nama)
    {
        $query = $this->set('nama_kategori', $nama);
        $query = $this->where('id_kategori', $id);
        $query = $this->update();
        return $query;
    }
    public function pencarian($keyword)
    {
        $builder = $this->table('kategori');
        $builder->like('nama', $keyword);
        return $builder->find();
    }
}