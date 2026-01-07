<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class Pengguna_model extends Model

{
    protected $table      = 'pengguna';
    protected $primaryKey = 'id_pengguna';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // allowedfields adalah fild mana saja yg boleh diisi secara manual
    protected $allowedFields = ['username_pengguna', 'nama_pengguna', 'password_pengguna', 'alamat_pengguna', 'no_telepon_pengguna', 'role_id'];

    protected $useTimestamps = false;


    public function getkasir($id = null)
    {
        $this->db->table('pengguna');
        $this->select('*');
        $this->where('role_id',2);
        if ($id != null) {
            return $this->where(['id_pengguna' => $id])->first();
        } else {
            return $this->findAll();
        }
    }

    public function getpengguna($id)
    {
        $this->db->table('pengguna');
      
        $this->select('*');
        $this->select('pengguna_role.nama_role');
        $this->join('pengguna_role', 'pengguna_role.id_role = pengguna.role_id');
        $this->where('id_pengguna ', $id);
        return $this->findAll();
    }




    public function login($username, $password)
    {
        return $this->where(['username_pengguna' => $username, 'password_pengguna', sha1($password)])->first();
    }

    public function savedata($data)
    {
        $query = $this->insert($data);
        return $query;
    }

    public function updaterole($id, $role)
    {
        $query = $this->set('role_pengguna', $role);
        $query = $this->where('id_pengguna', $id);
        $query = $this->update();



        return $query;
    }

    public function updatepassword($id_pengguna, $passwordbaru)
    {
        $query = $this->set('password_pengguna', $passwordbaru);
        $query = $this->where('id_pengguna', $id_pengguna);
        $query = $this->update();
        return $query;
    }

    public function editprofile($id_pengguna, $data)

    {
        return $this->db->table($this->table)->update($data, ['id_pengguna' => $id_pengguna]);
    }
}