<?php

class M_kematian extends CI_Model
{

    public function insert_kematian($tanggal_kematian, $jam_kematian, $usia, $id_user)
    {
        $this->db->trans_start();

       $this->db->query("INSERT INTO kematian(tanggal_kematian, jam_kematian, usia, id_user) VALUES ('$tanggal_kematian','$jam_kematian', '$usia', '$id_user')");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function update_kematian($tanggal_kematian, $jam_kematian, $usia, $id_kematian)
    {
        $this->db->trans_start();

       $this->db->query("UPDATE kematian SET tanggal_kematian='$tanggal_kematian', jam_kematian='$jam_kematian', usia='$usia' WHERE id_kematian='$id_kematian'");

       $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function delete_kematian($id_kematian)
    {
        $this->db->trans_start();

        $this->db->query("DELETE FROM kematian WHERE id_kematian='$id_kematian'");
 
        $this->db->trans_complete();
         if($this->db->trans_status()==true)
             return true;
         else
             return false;
    }

    public function count_anggota_kematian()
    {

        $hasil=$this->db->query("SELECT count(id_kematian) as total_anggota_kematian FROM kematian");
        return $hasil;

    }

}