<?php

class M_user extends CI_Model
{
    public function pendaftaran_user($id, $username, $email, $password, $id_user_level, $id_status_verifikasi)
    {
       $this->db->trans_start();

       $this->db->query("INSERT INTO user(id_user,username,password,email,id_user_level, id_user_detail) VALUES ('$id','$username','$password','$email','$id_user_level','$id')");
       $this->db->query("INSERT INTO user_detail(id_user_detail, id_status_verifikasi, tanggal_registered) VALUES ('$id', '$id_status_verifikasi', NOW())");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function update_user_settings($id, $username, $password)
    {
       $this->db->trans_start();

       $this->db->query("UPDATE user SET username='$username', password='$password' WHERE id_user='$id'");
      
       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function cek_login($username)
    {
        
        $hasil=$this->db->query("SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE username='$username'");
        return $hasil;
        
    }

    public function read_all_anggota()
    {

        $hasil=$this->db->query("SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_user_level=3 AND nama_lengkap IS NOT NULL");
        return $hasil;

    }

    public function read_all_anggota_by_id_user($id_user)
    {

        $hasil=$this->db->query("SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_user_level=3 AND id_user='$id_user'");
        return $hasil;

    }

    public function count_all_anggota()
    {

        $hasil=$this->db->query("SELECT count(id_user) as total_anggota FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_user_level=3 AND nama_lengkap IS NOT NULL");
        return $hasil;

    }

    public function read_all_pengurus()
    {

        $hasil=$this->db->query("SELECT * FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_user_level=3 AND nama_lengkap IS NOT NULL AND jabatan !='Anggota Biasa'");
        return $hasil;

    }

    public function count_all_pengurus()
    {

        $hasil=$this->db->query("SELECT count(id_user) as total_pengurus FROM user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_user_level=3 AND nama_lengkap IS NOT NULL AND jabatan !='Anggota Biasa'");
        return $hasil;

    }

    public function read_all_anggota_not_kematian()
    {

        $hasil=$this->db->query("SELECT nama_lengkap, user_detail.id_user_detail FROM user 
        JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail
        LEFT JOIN kematian ON user.id_user = kematian.id_user WHERE id_user_level=3 AND nama_lengkap IS NOT NULL AND kematian.id_user IS NULL");
        return $hasil;

    }

    public function read_all_anggota_kematian()
    {

        $hasil=$this->db->query("SELECT * FROM user 
        JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail
        JOIN kematian ON user.id_user = kematian.id_user WHERE id_user_level=3 AND nama_lengkap IS NOT NULL AND kematian.id_user IS NOT NULL");
        return $hasil;

    }


    public function insert_user($id, $username, $password, $email, $id_user_level, 
    $nama_lengkap, $jabatan, $no_kk, $no_ktp, $jenis_kelamin, $agama, $no_hp, $alamat,
     $tempat_lahir, $tanggal_lahir, $foto_kk, $id_status_verifikasi)
    {
        $this->db->trans_start();

        $this->db->query("INSERT INTO user(id_user,username,password,email,id_user_level, id_user_detail) 
        VALUES ('$id','$username','$password','$email','$id_user_level','$id')");
        $this->db->query("INSERT INTO user_detail(id_user_detail, nama_lengkap, jabatan, no_kk, no_ktp, 
        jenis_kelamin, agama, no_hp, alamat,tempat_lahir, tanggal_lahir, foto_kk, id_status_verifikasi, tanggal_registered) 
        VALUES ('$id','$nama_lengkap','$jabatan','$no_kk','$no_ktp','$jenis_kelamin','$agama','$no_hp','$alamat','$tempat_lahir',
        '$tanggal_lahir','$foto_kk','$id_status_verifikasi', NOW())");
 
        $this->db->trans_complete();
         if($this->db->trans_status()==true)
             return true;
         else
             return false;
    }

    public function update_user($id_user, $username, $password, $email, $nama_lengkap, $jabatan, $no_kk, $no_ktp, $jenis_kelamin, $agama, $no_hp, $alamat, $tempat_lahir, $tanggal_lahir, $foto_kk)
    {
        $this->db->trans_start();

        $this->db->query("UPDATE user SET username='$username', password='$password', email='$email' WHERE id_user='$id_user'");
        $this->db->query("UPDATE user_detail SET nama_lengkap='$nama_lengkap', jabatan='$jabatan', no_kk='$no_kk', no_ktp='$no_ktp', jenis_kelamin='$jenis_kelamin', agama='$agama', no_hp='$no_hp', alamat='$alamat', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', foto_kk='$foto_kk' WHERE id_user_detail='$id_user'");
 
        $this->db->trans_complete();
         if($this->db->trans_status()==true)
             return true;
         else
             return false;
    }

    public function read_all_anggota_iuran()
    {

        $hasil=$this->db->query("SELECT * FROM user 
        JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail
        JOIN iuran ON user.id_user = iuran.id_user WHERE id_user_level=3 AND nama_lengkap IS NOT NULL");
        return $hasil;

    }

    public function read_all_anggota_iuran_by_id($id_iuran)
    {

        $hasil=$this->db->query("SELECT * FROM user 
        JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail
        JOIN iuran ON user.id_user = iuran.id_user WHERE id_user_level=3 AND nama_lengkap IS NOT NULL AND iuran.id_iuran='$id_iuran'");
        return $hasil;

    }

    public function update_user_detail($id_user, $nama_lengkap, $jabatan, $no_kk, $no_ktp, $jenis_kelamin, $agama, $no_hp, $alamat, $tempat_lahir, $tanggal_lahir, $foto_kk, $id_status_verifikasi)
    {
        $this->db->trans_start();

        $this->db->query("UPDATE user_detail SET nama_lengkap='$nama_lengkap', jabatan='$jabatan', no_kk='$no_kk', no_ktp='$no_ktp', jenis_kelamin='$jenis_kelamin', agama='$agama', no_hp='$no_hp', alamat='$alamat', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', foto_kk='$foto_kk', id_status_verifikasi='$id_status_verifikasi' WHERE id_user_detail='$id_user'");
 
        $this->db->trans_complete();
         if($this->db->trans_status()==true)
             return true;
         else
             return false;
    }

    public function delete_user($id_user)
    {
        $this->db->trans_start();

        $this->db->query("DELETE FROM user WHERE id_user='$id_user'");
        $this->db->query("DELETE FROM user_detail WHERE id_user_detail='$id_user'");
 
        $this->db->trans_complete();
         if($this->db->trans_status()==true)
             return true;
         else
             return false;
    }

    public function update_user_status_verifikasi($id_status_verifikasi, $id_user)
    {
        
        $this->db->trans_start();

        $this->db->query("UPDATE user_detail SET  id_status_verifikasi='$id_status_verifikasi' WHERE id_user_detail='$id_user'");
 
        $this->db->trans_complete();
         if($this->db->trans_status()==true)
             return true;
         else
             return false;

    }
}